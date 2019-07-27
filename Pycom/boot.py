import machine, sys
from network import WLAN
import pycom
import network
import time
import ujson
pycom.heartbeat(False)

print("")
print("")

config = ujson.loads(open("settings.json").read())

wlan = WLAN(mode=WLAN.STA)

wlan.connect(config["WIFI"]["ssid"], auth=(WLAN.WPA2, config["WIFI"]["password"]))
print ("[WIFI] Attempting Connection to %s"%config["WIFI"]["ssid"])
while not wlan.isconnected():
    pycom.rgbled(0x7f7f00) # yellow

print('[WIFI] Connected!!!')
gpio21 = machine.Pin("G28", mode=machine.Pin.OUT, pull=None, alt=-1) # pin used to sense wifi status
gpio21(True)
pycom.rgbled(0x007f00) # green
config = wlan.ifconfig()
gateway = config[2]

print ("======== Network Configuration =======")
print("         IP: " + config[0])
print("         NetMask: " + config[1])
print("         Default Gateway: " + config[2])
print("======================================")

pycom.heartbeat(True)