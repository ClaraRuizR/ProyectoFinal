from flask import Flask,jsonify,request

import sys

sys.path.append("..")

from Modelo.mascotasModelo import MascotasModelo

app = Flask("app")

@app.route('/listaMascotas/<string:filtro>/<string:textoFiltro>')
def buscarConFiltro(filtro, textoFiltro):

    listaMascotas = MascotasModelo.obtener(filtro, textoFiltro)

    return listaMascotas

if __name__ == "__main__":
    app.run()