import socket,time,machine,ujson,os
import lib.urequests as requests
from network import WLAN
wlan = WLAN(mode=WLAN.STA)



class serverConnector():
    def __init__(self, station, host=wlan.ifconfig()[2], port = 80, debug=1):
        self.debug = debug
        self.enrollment = False
        self.enrollUUID = ""
        self.stationName = station
        self.host = host
        self.port = port
        self.hostStr = 'HOST: %s:%s\r\n'%(str(host),str(port))
        self.contentTypeStr = 'Content-Type: application/json\r\n'
        self.rpi_connection = False
        connection = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
        retry_conunter = 0

        while True:
            try:
                connection.connect((self.host, self.port))
                if (debug == 1):
                    print ("[I] [serverConnector] Initiating connection to server")
            except:
                connection.close()
                print ("[!] [serverConnector] Connection to server Failed! Rebooting...")
                machine.reset()
            else:
                print("[I] [serverConnector] Connection established ! ")
                break
    
    def getTime(self):
        r = requests.get("http://%s/lib/be_connections.php?operation=timestamp"%self.host)
        currentTime = r.text.rstrip("\n")
        r.close()
        return (currentTime)

    def enrollStation(self):
        

        if (len([item for item in os.listdir("/flash") if "enroll.state"==item])>0):

            enrollState = open("../enroll.state","r")
            self.enrollUUID = enrollState.read()
            enrollState.close()
            req = requests.get("http://%s/lib/enroll_device.php?verify_uuid=%s"%(self.host,self.enrollUUID))
            
            if (req.text.rstrip("\n") == self.stationName) :
                print ("[I] [serverConnector] Enrolment status: OK")
                self.enrollment = True
            else:
                print("[E] [serverConnector] Enrolment status: INVALID")
                print("[E] [serverConnector] Removing Enrolment File...")
                os.remove('../enroll.state')
                self.enrollStation()
        else:
            print ("[I] [serverConnector] Enrolment status: Not Enrolled!")
            print ("[I] [serverConnector] Enrolling Device...")
            j = ujson.loads(open("../settings.json").read())
            r = requests.post("http://%s/lib/enroll_device.php"%self.host,json=j)
            if r.text != "" :
                enrollState = open("../enroll.state","w+")
                enrollState.write(r.text.rstrip("\n"))
                enrollState.close()
                print ("[I] [serverConnector] UUID: [" + open("../enroll.state").read() + "]" )
                print ("[I] [serverConnector] Enrollment complete !")
                self.enrollment = True
            else:
                print ("[E] [serverConnector] Enrollment Failed (No Response from RPI)")

    def sendData(self,start,stop):
        j = '{"station":"%s","start":"%s","stop":"%s"}'%(self.enrollUUID,start,stop)
        j = ujson.loads(j)
        requests.post("http://%s/lib/data_acquisition.php"%(self.host),json=j)

    
        

    def runScript(self,destination):
        postStr = 'POST /%s HTTP/1.1\r\n'%(destination)
        contentStr = '{"Station" : "%s"}'%self.stationName
        contentLengthStr = 'Content-Length: %s\r\n\r\n'%str(len(contentStr))
        payload = postStr + self.hostStr + self.contentTypeStr + contentLengthStr +contentStr
        connection = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
        connection.connect((self.host, self.port))
        connection.send(payload.encode())
        if (self.debug == 1):
            svrResponse = connection.recv(4096).decode()
            print (svrResponse)
        connection.close()

    def sendValue(self,destination,val1):
        postStr = 'POST /%s HTTP/1.1\r\n'%(destination)
        contentStr = '{"Station" : "%s", "Value" : "%s"}'%(self.stationName,val1)
        contentLengthStr = 'Content-Length: %s\r\n\r\n'%str(len(contentStr))
        connection = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
        connection.connect((self.host, self.port))
        payload = postStr + self.hostStr + self.contentTypeStr + contentLengthStr +contentStr
        print("[I] [serverConnector.sendValue] Sending value [%s] to [%s]"%(val1,destination))
        connection.send(payload.encode())
        if (self.debug == 1):
            svrResponse = connection.recv(4096).decode()
            print (svrResponse)
        connection.close()
