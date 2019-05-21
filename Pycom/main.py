from lib.helper import *
import machine

##################################### CONFIG ##################################

stationName = "Lopy_3"

#------------------------------------------------------------------------------

Rpi = serverConnector(stationName)
tempSave = failSafeCreator("temp.recover")




gpio32 = machine.Pin("P19", mode=Pin.OUT) # pin used to sense wifi status 

#------------------------------------------------------------------------------


# Attempting to create table 
Rpi.runScript("createStation.php")

pin = machine.Pin("G0",machine.Pin.IN, pull=machine.Pin.PULL_UP)

if tempSave.stateExists():
    temp = tempSave.loadRecovery()
    Rpi.sendValue("insertSQL.php",temp)
    tempSave.delState()
else:
    temp = pin()

try:
    while True:
        if wlan.isconnected():
            gpio32(True)
        else:
            gpio32(False)
            tempSave.saveState(str(temp))
            time.sleep(2)
            machine.reset()

        if ( pin() != temp ):
            temp = pin()
            Rpi.sendValue("insertSQL.php",temp)
            time.sleep(1)
        else:
            time.sleep(1)
except OSError:
    tempSave.saveState(str(temp))
    time.sleep(2)
    machine.reset()