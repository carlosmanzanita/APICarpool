#pip install beautifulsoup4
#pip install lxml
#pip install html5lib
#pip install htmlentities

import requests
import argparse
import htmlentities
from bs4 import BeautifulSoup

parser=argparse.ArgumentParser()
parser.add_argument("-u","--url", help="Indicar la URL de la DAE")
args = parser.parse_args()
if args.url:
    url = args.url
    
    req = requests.get(url)
    
    soup = BeautifulSoup(req.text, "lxml")
    src_img = soup.find_all("div",{"class": "pic"})[1].img['src']

    nombre = soup.find_all("div",{"class": "nombre"})[0].string
    # htmlentities Para ajustar acentos
    # 'á'   htmlentities  &aquote;
    nombre = htmlentities.encode(nombre)
    boleta = soup.find_all("div",{"class":"boleta"})[0].string 
    boleta = htmlentities.encode(boleta)
    carrera = soup.find_all("div",{"class":"carrera"})[0].string
    carrera = htmlentities.encode(carrera)
    escuela = soup.find_all("div",{"class":"escuela"})[0].string
    escuela = htmlentities.encode(escuela)
    cred = soup.find_all("div",{"class":"cred cok"})[0].string
    cred = htmlentities.encode(cred)
    
    alumno = '{'
    alumno = alumno + '"nombre" : "'+ nombre +'"'
    alumno = alumno + ' , '
    alumno = alumno + '"boleta" : "'+ boleta +'"'
    alumno = alumno + ' , '
    alumno = alumno + '"carrera" : "'+ carrera +'"'
    alumno = alumno + ' , '
    alumno = alumno + '"escuela" : "'+ escuela +'"'
    alumno = alumno + ' , '
    alumno = alumno + '"vigencia" : "'+ cred +'"'
    alumno = alumno + ' , '
    alumno = alumno + '"foto" : "'+ src_img +'"'
    alumno = alumno + '}'
    print(alumno)


    # alumno ='{"nombre" : "'+ nombre +'", "boleta" : "'+ boleta + '", "carrera" : "'+ carrera +'", "escuela" : "'+ escuela +'","cred" : "' + cred + '"}'
    # https://servicios.dae.ipn.mx/vcred/?h=a5a592d479a79d351d325e9544c4bac746db4cb8cac14096b7dd4de42c1257