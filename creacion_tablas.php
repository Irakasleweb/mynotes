<?php 
/*Creo cuatro tablas  y creo contenido de prueba para ellas, para cada operación abro y cierro la conexión y creo consultas para cada una, esto podría realizarlo con una sola operación pero de esta manera puedo realizar cambios en cualquiera de las partes sin que afecte al resto*/
//Crear tabla usuarios=======================================
//Conexión------------------------------------------------------------------------
            $conexion = mysql_connect("localhost","user1","sanaila4to");
            if(!$conexion){
            die('No he podido conectar: '.mysql_error());
            }
            mysql_set_charset($conexion, "utf8");
 //selecciono la base
mysql_select_db("mynotes",$conexion)
//el primer campo sera la clave primaria y sera un n entero autoincremental
$consulta = "CREATE TABLE usuarios
(
id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
usuario varchar(40) NOT NULL,
password varchar(40) NOT NULL,
nombre varchar(40),
apellidouno varchar(40),
apellidodos varchar(40),
webpersonal varchar(80),
email varchar(80),
permisos int
)";
//ejecuto
$resultado = mysql_query($consulta,$conexion);
if(!$resultado){
echo 'Consulta no valida: ' . mysql_error();
}
//Cerrar la conexion-----------------------------
mysql_close($conexion);




//Insertar campos de prueba en la tabla usuarios===================================
//conexion------------------------------------------------------------------------
            $conexion = mysql_connect("localhost","user1","sanaila4to");
            if(!$conexion){
            die('No he podido conectar: '.mysql_error());
            }
            mysql_set_charset($conexion, "utf8");
 //selecciono la base
mysql_select_db("mynotes",$conexion)
$consulta = "INSERT INTO usuarios VALUES ('','user_uno','my_password','useruno','apuno','apdos','http://www.user_uno.com','info@useruno.com',1)";
//ejecuto
$resultado = mysql_query($consulta,$conexion);
if(!$resultado){
echo 'Consulta no válida: ' . mysql_error();
}
//Cerrar la conexion-----------------------------
mysql_close($conexion);




//Crear tabla config usuarios===============================
//conexion------------------------------------------------------------------------
            $conexion = mysql_connect("localhost","user1","sanaila4to");
            if(!$conexion){
            die('No he podido conectar: '.mysql_error());
            }
            mysql_set_charset($conexion, "utf8");
 //selecciono la base
mysql_select_db("mynotes",$conexion)
$consulta = "CREATE TABLE configusuarios
(
id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
usuario varchar(40) NOT NULL,
piel varchar(40),
respuestas varchar(40)
)";
//ejecuto
$resultado = mysql_query($consulta,$conexion);
if(!$resultado){
echo 'Consulta no válida: ' . mysql_error();
}
//Cerrar la conexion-----------------------------
mysql_close($conexion);




//Insertar campos de prueba en la tabla config usuarios=======================================
//conexion------------------------------------------------------------------------
            $conexion = mysql_connect("localhost","user1","sanaila4to");
            if(!$conexion){
            die('No he podido conectar: '.mysql_error());
            }
            mysql_set_charset($conexion, "utf8");
 //selecciono la base
mysql_select_db("mynotes",$conexion)
$consulta = "INSERT INTO configusuarios VALUES ('','user_uno','default','si')";
//ejecuto
$resultado = mysql_query($consulta,$conexion);
if(!$resultado){
echo 'Consulta no válida: ' . mysql_error();
}

//Cerrar la conexion-----------------------------
mysql_close($conexion);




//Crear tabla notas=========================================================
//conexion------------------------------------------------------------------------
            $conexion = mysql_connect("localhost","user1","sanaila4to");
            if(!$conexion){
            die('No he podido conectar: '.mysql_error());
            }
            mysql_set_charset($conexion, "utf8");
 //selecciono la base
mysql_select_db("mynotes",$conexion)
$consulta = "CREATE TABLE notas
(
id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
utc int NOT NULL,
anio int,
mes int,
dia int,
hora int,
minuto int,
segundo int,
usuario varchar(80),
titulo char(120),
subtitulo varchar(200),
texto varchar(4000),
color char(40)
)";
//ejecuto
$resultado = mysql_query($consulta,$conexion);
if(!$resultado){
echo 'Consulta no válida: ' . mysql_error();
}
//Cerrar la conexion-----------------------------
mysql_close($conexion);


//Insertar campos de prueba en la tabla notas==========================================
//conexion------------------------------------------------------------------------
            $conexion = mysql_connect("localhost","user1","sanaila4to");
            if(!$conexion){
            die('No he podido conectar: '.mysql_error());
            }
            mysql_set_charset($conexion, "utf8");
 //selecciono la base
mysql_select_db("mynotes",$conexion)
$consulta = "INSERT INTO notas VALUES ('',00000000,2015,3,23,18,40,30,'user_uno','Primera nota','Subtitulo','Texto primera nota','green')";
//ejecuto
$resultado = mysql_query($consulta,$conexion);
if(!$resultado){
echo 'Consulta no válida: ' . mysql_error();
}
//Cerrar la conexion-----------------------------
mysql_close($conexion);


//Crear tabla logs==============================================================
//conexion------------------------------------------------------------------------
            $conexion = mysql_connect("localhost","user1","sanaila4to");
            if(!$conexion){
            die('No he podido conectar: '.mysql_error());
            }
            mysql_set_charset($conexion, "utf8");
 //selecciono la base
mysql_select_db("mynotes",$conexion)

$consulta = "CREATE TABLE logs
(
id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
utc int NOT NULL,
anio int,
mes int,
dia int,
hora int,
minuto int,
segundo int,
ip varchar(80),
navegador varchar(3000),
usuario varchar(80),
operacion varchar(80)
)";
//ejecuto
$resultado = mysql_query($consulta,$conexion);
if(!$resultado){
echo 'Consulta no válida: ' . mysql_error();
}
//Cerrar la conexion-----------------------------
mysql_close($conexion);


//Insertar campos de prueba en la tabla logs=================================
//conexion------------------------------------------------------------------------
            $conexion = mysql_connect("localhost","user1","sanaila4to");
            if(!$conexion){
            die('No he podido conectar: '.mysql_error());
            }
            mysql_set_charset($conexion, "utf8");
 //selecciono la base
mysql_select_db("mynotes",$conexion)
$consulta = "INSERT INTO logs VALUES ('',00000000,2015,3,23,18,40,30,'127.0.0.1','firefox','user_uno','crear')";
//ejecuto
$resultado = mysql_query($consulta,$conexion);
if(!$resultado){
echo 'Consulta no válida: ' . mysql_error();
}
//Cerrar la conexion-----------------------------
mysql_close($conexion);
?>
