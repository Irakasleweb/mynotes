<?php 
            $conexion = mysql_connect("localhost","user1","sanaila4to");
            if(!$conexion){
            die('No he podido conectar: '.mysql_error());
            }

 //selecciono la base
mysql_select_db("mynotes",$conexion);

$codigoutc = $_GET['utc'];

//consulta
$consulta = "DELETE FROM notas WHERE utc='".$codigoutc."' ";
//ejecuto
$resultado = mysql_query($consulta,$conexion);
if(!$resultado){
die('Hubo un error: '.mysql_error());
}
//Cerrar la conexion-----------------------------
mysql_close($conexion);
//Devuelvo al index tras procesar (ojo que de he salir de un directorio para poder llegar a él)
echo'
    <html>
    <head>
        <meta http-equiv="refresh" content="0; url=../index.php">
    </head>
</html>
';
?>
<p>
<span><a href="">Buenas</a></span>
<a href="#">Hola</a>
</p>
<a href="#">Adios</a>
