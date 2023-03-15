#pip install beautifulsoup4
#pip install lxml
#pip install html5lib

import requests
import argparse
from bs4 import BeautifulSoup

parser=argparse.ArgumentParser()
parser.add_argument("-u","--url", help="Indicar la URL de la DAE")
args = parser.parse_args()
if args.url:
    # print("Se necesita una URL :" + args.url)
    url = args.url
    #url = "https://servicios.dae.ipn.mx/vrced/?h=243689bea3c26dce4c147c9911117f8aed2c63f62e3718e478194ada873de7"
    req = requests.get(url)
    soup = BeautifulSoup(req.text, "lxml")
    src_img = soup.find_all("div",{"class": "pic"})[1].img['src']

    nombre = soup.find_all("div",{"class": "nombre"})[0].string
    boleta = soup.find_all("div",{"class":"boleta"})[0].string 
    carrera = soup.find_all("div",{"class":"carrera"})[0].string
    escuela = soup.find_all("div",{"class":"escuela"})[0].string
    cred = soup.find_all("div",{"class":"cred cok"})[0].string
    alumno ='{"nombre" : "'+ nombre +'", "boleta" : "'+ boleta + '", "carrera" : "'+ carrera +'", "escuela" : "'+ escuela +'","cred" : "' + cred + '", "src_img" : "'+ src_img +'" }'

    print(alumno)  
    # https://servicios.dae.ipn.mx/vcred/?h=5d5fb568d6e4baad9f68be2641a12acebd1fd8fda7a6379580110bfb423f5b8