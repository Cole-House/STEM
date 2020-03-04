#Use the datetime objdct to create and maipulate date and time
#guru99.com/date-time-and-datetime classes-in-python.html

#Import modules needed from datetime
from datetime import time
from datetime import date
from datetime import datetime

#creste a main loop so this module can be imported
# we use a main loop because bring things in one at a time?
def main():
	#create a new date time object that holds current dateTime
	currentTime = datetime.now()
	print(currentTime)
	#print only the time from the datetime object
	print(datetime.time(currentTime))
	#Use strftime to print only the year from the datetime object
	print("Current Year: ",currentTime.strftime("%Y"))
	#We are going to use strftime to print readable date
	print("Current Date: ",currentTime.strftime("%a, %B %d, %Y"))
	

if __name__ == "__main__":
	main()
