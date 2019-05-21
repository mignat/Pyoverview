import machine, sys
from network import WLAN
import pycom
import network
import time
pycom.heartbeat(False)

print("")
print("")


wifi_ssid = 'Mens2018'
Wifi_pass = 'fitnesspower'

wlan = WLAN(mode=WLAN.STA)

wlan.connect(wifi_ssid, auth=(WLAN.WPA2, Wifi_pass))
print ("[WIFI] Attempting Connection to %s"%wifi_ssid)
while not wlan.isconnected():
    pycom.rgbled(0x7f7f00) # yellow
print('[WIFI] Connected!!!')
pycom.rgbled(0x007f00) # green
config = wlan.ifconfig()

print ("======== Network Configuration =======")
print("         IP: " + config[0])
print("         NetMask: " + config[1])
print("         Default Gateway: " + config[2])
print("========================================")

pycom.heartbeat(True)