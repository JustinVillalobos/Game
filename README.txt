***************************** Requerimientos para poner en produccion *************************

* Servidor Apache PHP >=v7.*

***************************** Archivos a modificar ************************************
* data/config.php
-- En este archivo se encuentra la conexión a base de datos, es necesario cambiar las variables por las credenciales de la base de datos del servidor donde se vaya a subir:
    var $dbhost = "localhost";
    var $username = "root";
    var $password = "";
    var $dbname = "db_game";


* .htaccess
-- Modificar url de archivos de error por el dominio correcto.
	#Redireccion a errores mas comunes del lado
	#de servidor
	ErrorDocument 504 http://localhost:8085/Game/error500.php
	ErrorDocument 500 http://localhost:8085/Game/error500.php

	#Redireccion a errores mas comunes del lado
	#de cliente
	ErrorDocument 404 http://localhost:8085/Game/error400.php
	ErrorDocument 403 http://localhost:8085/Game/error400.php