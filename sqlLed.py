import pymysql
import RPi.GPIO as GPIO
#import the necessary libraries/repositories

x=1
while x == 1:
#while loop to have code running and updating constantly and checking if light is on or off
	
# Open database connection
	db = pymysql.connect("localhost","root","posiulai123","database" )

# prepare a cursor object using cursor() method
	cursor = db.cursor()

	cursor.execute("SELECT * FROM Lights")

	myresult = cursor.fetchall()

	if myresult[0] == (1,):
		GPIO.setmode(GPIO.BCM)
		GPIO.setwarnings(False)
		GPIO.setup(26,GPIO.OUT)
		print ("LED on")
		GPIO.output(26,GPIO.HIGH)
	
	else:
		GPIO.setmode(GPIO.BCM)
		GPIO.setwarnings(False)
		GPIO.setup(26,GPIO.OUT)
		print ("LED off")
		GPIO.output(26,GPIO.LOW)
# if else statement with GPIO python commands that give led power(if myresult[0] == (1,)) and turns it off (else)

print(myresult)
print(type(myresult[0]))
#printing out the my result truple to determine what to put into the if else staement
