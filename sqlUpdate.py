import MySQLdb
#Open database connection
db =  MySQLdb.connect (host="localhost",user="User",passwd="password",db="school")
#prep a cursor object using cursor() method; cursor is like a navigation method
db.autocommit(True)
cursor = db.cursor(MySQLdb.cursors.DictCursor)

name='Kainoa'
age=15
gradeLevel=10
#student info
sql = "UPDATE students SET age=16 WHERE name='Kainoa'"
cursor.execute(sql)
#update the age of Kainoa to 16 in the students table

cursor.close()
db.close()
