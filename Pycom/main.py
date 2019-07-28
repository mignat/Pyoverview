from lib.helper import *
import machine
import ujson



config = ujson.loads(open("settings.json").read())
stationName = config["STATION"]["name"]
Rpi = serverConnector(stationName)
Rpi.enrollStation()

#------------------------------------------------------------------------------


# Attempting to create table
#Rpi.runScript("createStation.php")

pin = machine.Pin("G0",machine.Pin.IN, pull=machine.Pin.PULL_UP)

try:
    while True:
        if not wlan.isconnected():
            time.sleep(1)
            machine.reset()
        if ( pin() == 1 ):
            startTime = Rpi.getTime()
            while pin() == 1:
                
                time.sleep(1)
            if pin() == 0:
                stopTime= Rpi.getTime()
                
                print ("[I] [Main] Checking enrollment status....")
                Rpi.enrollStation()
                print ("Sending Operation Cicle : [" + startTime +"] --> [" + stopTime +"]" )
                Rpi.sendData(startTime,stopTime)

            time.sleep(1)
        else:
            time.sleep(1)
except OSError:
    time.sleep(2)
    machine.reset()
