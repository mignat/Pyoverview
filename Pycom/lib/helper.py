import socket



class failSafeCreator():
    def __init__(self, val1):
    	self.recoveryFile = val1

    def saveState(self, val1):
    	x = open(self.recoveryFile,"w+")
    	print("[I] [failSafeCreator] Saving current state")
    	x.write(val1)
        x.close()

    def delState(self):
    	import os
    	print("[I] [failSafeCreator] Removing recovery file")
    	os.remove(str(self.recoveryFile))

    def loadRecovery(self):
    	x = open(self.recoveryFile,"r+").read()
    	print("[I] [failSafeCreator] Loading recovery value form file")
    	return x

    def stateExists(self):
    	try:
            x = open(self.recoveryFile)
            print ("[I] [failSafeCreator] Recovery file found !")
            print ("[I] [failSafeCreator] Saved value: %s "%str(x.read()))
            x.close()
            return True

        except:
            print ("[I] [failSafeCreator] Recovery file not found !")
            return False
            

class serverConnector():
	def __init__(self, station, host="10.0.0.1", port = 80, debug=0):
		self.debug = debug
		self.stationName = station
		self.host = host
		self.port = port
		self.hostStr = 'HOST: %s:%s\r\n'%(str(host),str(port))
		self.contentTypeStr = 'Content-Type: application/json\r\n'
		
		connection = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
		try:
			connection.connect((self.host, self.port))
			if (debug == 1):
				print ("[I] [serverConnector] Initiating connection to server")
		except:
			print ("[!] [serverConnector] Connection to server Failed !")
		

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