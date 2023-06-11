import mysql.connector
from flask import Flask,jsonify,request
#import json

class MascotasModelo:

    def obtener(filtro, textoFiltro):

        cnx = mysql.connector.connect(user='Clara', password='2223',
                                    host='127.0.0.1',
                                    database='veterinaria')

        cursor = cnx.cursor()

        consulta1 = "SELECT ID, pasaporte, nombre, id_titular, especie, raza, sexo, color, codigo_chip, fecha_nacimiento, operado, fecha_alta FROM T_Mascota WHERE " + filtro + " = '" + textoFiltro + "'"

        consulta2 = "SELECT ID, pasaporte, nombre, id_titular, especie, raza, sexo, color, codigo_chip, fecha_nacimiento, operado, fecha_alta FROM T_Mascota"

        if(filtro == 0 and textoFiltro == 0):
            cursor.execute(consulta2)
        else:
            cursor.execute(consulta1)

        columns = [column[0] for column in cursor.description]

        results = cursor.fetchall()
 
        data = []
        
        for row in results:
            data.append(dict(zip(columns, row)))

        cnx.close()

        return data
    

