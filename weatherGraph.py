import sys
import Adafruit_DHT
import pymysql
#imports necessary libraries


db = pymysql.connect("192.168.0.214","humid","password","humidity")
cursor = db.cursor()
db.autocommit(True)
while True:
    
    humidity, temperature = Adafruit_DHT.read_retry(11, 18)
    print ((' Temp: {0:0.1f} C  Humidity: {1:0.1f} %').format(temperature, humidity))
    #reading of the GPIO pins get outputted into temperature and humidity format
    sql = (f"INSERT INTO temperatureData( humidity, temperature) VALUES ( {humidity}, {temperature})")
    cursor.execute(sql)
    #inserting the readins into the database and appropriate rows

