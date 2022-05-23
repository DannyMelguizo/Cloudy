import mysql.connector
import os

conn = mysql.connector.connect(user='root', password='', host='127.0.0.1', db='cloudy')

cur = conn.cursor()

consulta = 'SELECT ruta FROM archivos'
 
cur.execute(consulta)

for archivo in cur.fetchall():

    nombre = archivo[0]

    ruta = os.path.splitext(nombre)

    nuevaCadena = nombre.find(ruta[1])

    final_name = nombre[:nuevaCadena]

    cloudy = '-cloudy-official'

    final_name += cloudy

    final_name += ruta[1]
    
    query = f"UPDATE archivos SET ruta='{final_name}' WHERE ruta='{nombre}'"

    cur.execute(query)

    conn.commit()

    os.rename(f'archivos/{nombre}',f'archivos/{final_name}')



conn.close()
