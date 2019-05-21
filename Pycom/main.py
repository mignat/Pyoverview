from lib.helper import *
import machine

##################################### CONFIG ##################################

stationName = "Lopy_3"

#------------------------------------------------------------------------------

Rpi = serverConnector(stationName)
tempSave = failSafeCreator("temp.recover")



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
        if not wlan.isconnected():
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