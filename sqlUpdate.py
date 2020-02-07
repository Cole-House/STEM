import MySQLdb
#Open database connection
db =  MySQLdb.connect (host="localhost",user="User",passwd="password",db="school")
#prep a cursor object using cursor() method; cursor is like a navigation method
db.autocommit(True)
cursor = db.cursor(MySQLdb.cursors.DictCursor)

name='Kainoa'
age=15
gradeLevel=10

sql = "UPDATE students SET age=16 WHERE name='Kainoa'"
cursor.execute(sql)

cursor.close()
db.close()
