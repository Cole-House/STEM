import MySQLdb
#Open database connection
db =  MySQLdb.connect (host="localhost",user="User",passwd="password",db="school")
#prep a cursor object using cursor() method; cursor is like a navigation method
cursor = db.cursor(MySQLdb.cursors.DictCursor)
