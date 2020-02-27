import mysql.connector

db = mysql.connector.connect( host="eventosfatec.dsicari.com.br",
                              user="eventosfatec",
                              port=6033,
                              password="Fatec2019!",
                              database="eventosfatec")
cursor = db.cursor()

query = ("SELECT * FROM entradaevento where DAY(datahora) = DAY('2019-10-21 09:00:01') AND pessoa_id=9967")
cursor.execute(query)

rslt = cursor.fetchall()

if(len(rslt) > 0):
  print("Validado!")
else:
  print("Nao validado!")

# for x in rslt:
#   print("Nome=" + x[0])

cursor.close()
db.close()