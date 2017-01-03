# whoplaystonight


////////////////////////////////////////////////////////////////////////////////
                          CUESTIONES A TENER EN CUENTA:
////////////////////////////////////////////////////////////////////////////////


*******************************DESARROLLO EN LOCAL******************************

Para trabajar con la aplicacion en local hay que realizar los siguientes cambios:

  1).Cambiar la ruta que retorna la funcion amigable en main.js (servidor VPS) por
  la de localhost: return "https://localhost/whoplaystonight" + link;

  2).Cambiar el resto de rutas https://plastmagysl.com/* por
  https://localhost/whoplaystonight/*

  3).Dar permisos de nuevo a todos los ficheros para evitar posible denegacion de
  acceso: sudo chmod -R 757 /var/www/html



********************************************************************************


*******************************DEPLIEGUE****************************************

Para subir la aplicacion al VPS hay que cambiar la ruta que retorna la funcion
amigable por la ruta del VPS. La que hay de origen es la del servidor local por
https.

  return "https://plastmagysl.com/whoplaystonight" + link;

********************************************************************************
