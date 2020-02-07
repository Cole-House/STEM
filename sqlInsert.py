import MySQLdb
#Open database connection
db =  MySQLdb.connect (host="localhost",user="user",passwd="password",db="school")
#prep a cursor object using cursor() method; cursor is like a navigation method
db.autocommit(True)
cursor = db.cursor(MySQLdb.cursors.DictCursor)

name='Kainoa'
age=15
gradeLevel=10
#student info
sql = (f"INSERT INTO students (name,age,gradeLevel) VALUES ('{name}',{age},{gradeLevel})")
cursor.execute(sql) 
#sql insert statement with f string

cursor.close()
db.close()
