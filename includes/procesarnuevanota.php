<?php 
session_start();
$usuario = utf8_decode($_SESSION['usuario']);
$tituloform = utf8_decode($_POST['titulonota']);
$subtituloform = utf8_decode($_POST['subtitulonota']);
$textoform = utf8_decode($_POST['textonota']);
$colorform = utf8_decode($_POST['colornota']);

$postutc = date('U');
$anio= date('Y');
$mes = date('m');
$dia = date('d');
$hora = date('H');
$minuto = date('i');
$segundo = date('s');

//Proceso
            $conexion = mysql_connect("localhost","user1","sanaila4to");
            if(!$conexion){
            die('No he podido conectar: '.mysql_error());
            }

 //selecciono la base
mysql_select_db("mynotes",$conexion)
//consulta
$consulta = "INSERT INTO notas VALUES ('','$postutc','$anio','$mes','$dia','$hora','$minuto ','$segundo','$usuario','$tituloform','$subtituloform','$textoform','$colorform') ";

//ejecuto
$resultado = mysql_query($consulta,$conexion);
if(!$resultado){
die('Hubo un error: '.mysql_error());
}
//Cerrar la conexion-----------------------------
mysql_close($conexion);
//Devuelvo al index tras procesar (ojo que de he salir de un directorio para poder llegar a el)
echo'
    <html>
    <head>
        <meta http-equiv="refresh" content="0; url=../index.php">
    </head>
</html>
';

?>
