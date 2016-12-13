import os
import glob
import psycopg2
from SimpleCV import *

#Settings
#my_images_path = "/temp/cars/" #put your image path here if you want to override current directory
#extension = "*.png"

#Program


### DB connection
conn = psycopg2.connect("dbname=test2 user=ni????? password=an??????")
# Open a cursor to perform database operations
cur = conn.cursor()
cur.execute("SELECT * FROM parkingarea")
print ("Testing database connections: " + str(cur.fetchone()))


# First gets the latest picture!
newest = max(glob.iglob('pics/*.[Pp][Nn][Gg]'), key=os.path.getctime)

parkingAreaPic = Image(newest).scale(1000,650)
parkingAreaPic.show()
os.system('pause')

print('going through slots!!')
slotpxvalues = []
countOfCars = 0

# Main loop that goes through every slot and saves the into the list slotpxvalue
for x in range(0,5):
	slotPic = parkingAreaPic.crop(40+(x*205),400,140,251)
	slotPic.show()
	os.system('pause')
	slotPic = slotPic.edges(130,160) # To find the edges
	slotPic.show()
	slotPic_matrix = slotPic.getNumpy().flatten() # From the example - what does this actually do?
	print('Pixel count slotPic: ' + str(cv2.countNonZero(slotPic_matrix)))
	slotpxvalues.append(cv2.countNonZero(slotPic_matrix)) # append the list	
	os.system('pause') # waits for any key
	
print slotpxvalues

# Loop to count cars from the list values

for slot in slotpxvalues:
	if slot > 7500:
		countOfCars += 1
		
print('# of slots occupied = ' + str(countOfCars))
	
# Send the amount of cars to the database?
cur.execute("UPDATE parkingarea SET pslotstaken = %s WHERE pareaid = 1;", str(countOfCars))
cur.execute("SELECT pslotstaken FROM parkingarea")
print (cur.fetchone())
conn.commit()

# Closing DB connection
cur.close()
conn.close()