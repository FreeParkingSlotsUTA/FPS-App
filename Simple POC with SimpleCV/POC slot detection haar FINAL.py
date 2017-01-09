import os
import glob
import simplejson as json
import requests
import time
import urllib2
from SimpleCV import *

"""
Program for Free Parking Slots in the Campus -project.

Gets image file from directory (my_images_path + parking area id, for example "pics/1/"), 
counts cars in file and sends the amount of cars and parkid to the server.

Parkids should be given as list and corresponding folder structure for image files should be constructed.

Infinite loop until Ctrl-c/Ctrl-break stroked!

Haar Cascades classifier file was trained with 91 positive and 500 negative pictures.

These files were used in training: http://www.mediafire.com/file/1aq02tpidk105fv/dasar_haartrain.rar

"""

#Settings
my_images_path = "pics/" #put your image path here if you want to override current directory
extension = "*.[Pp][Nn][Gg]" #change here image format
haarfile = "C:\\Users\\niittto\\Documents\\coding projects\\FPS-App\\Simple POC with SimpleCV\\haar\\myhaarFINAL.xml" #path and name of the haar cascades file
parkidList = [1,2,3] #list of park ids
sleepTime = 60 #set time interval to process images (in seconds)
showpics = False #set to true if you want to see the processed images (for debugging...)
posturl = "http://name.of.the.site" #Url to send json to
posturl2 = "http://fpsapp.sis.uta.fi/data/input/index.php?p"

#Program

def countAndSendMatches():
		
	for parkid in parkidList:
	
		matches = 0

		# First get the latest picture!
		newest = max(glob.iglob(my_images_path + str(parkid) + "/" + extension), key=os.path.getctime)
		
		parkingAreaPic = Image(newest).scale(1000,650) # 
		parkingAreaPic = parkingAreaPic.grayscale()
		
		if showpics: #if showpics is set to True
			parkingAreaPic.show() 
			os.system('pause')
	
		# find haar features
		cars = parkingAreaPic.findHaarFeatures(haarfile, scale_factor = 1.02, min_neighbors = 9, use_canny = True, min_size = (40, 40))
		#cars = parkingAreaPic.findHaarFeatures(haarfile, scale_factor = 1.05, min_neighbors = 9, use_canny = True)

		cars = cars.filter((cars.y() < 480) | (cars.y() > 540))
		#cars = cars.filter((cars.area() > 2100) & (cars.area() < 8000))
		
		# counts the found haar features
		matches = len(cars) #amount of cars found

		if showpics: #if showpics is set to True
			cars.draw(width = 3)
			parkingAreaPic.show()
			for c in cars:
				print "Found at " + str(c.coordinates()) + ", size: " + str(c.area())
			print "matches: " + str(matches)
			os.system('pause')
		
		"""
		# matches and parkid as json and posting json
		cars_amount = {"cars": matches, "parkId": parkid}
		carsjson = json.dumps(cars_amount)
		print carsjson #uncomment to print json
		post_cars = requests.post(url=posturl, data=carsjson) #uncomment to post json
		"""
		# matches and parkid to server with urllib2 
		urlToOpen = posturl2 + str(parkid) + "=" + str(matches)
		print "Accessing: " + urlToOpen
		openURL = urllib2.urlopen(urlToOpen)
		openURL.close()
			
	print "Waiting for " + str(sleepTime) + " seconds until next image processing! Hit Ctrl-c/Ctrl-Break to abort!"
	time.sleep(sleepTime)

def main():	
	try:
		print "Hit Ctrl-c/Ctrl-Break to abort"
		while True:
			countAndSendMatches()
	except KeyboardInterrupt:
		pass

if __name__ == "__main__":
    main()