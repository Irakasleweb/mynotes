<?php
header('Content-Type: text/html; charset=UTF-8');
$titulo = $_POST['titulopostactualizar'];
$subtitulo = $_POST['subtitulopostactualizar'];
$texto = $_POST['textopostactualizar'];
$color = $_POST['colorpostactualizar'];
$utcact = $_POST['utcact'];

            $conexion = mysql_connect("localhost","user1","sanaila4to");
            if(!$conexion){
            die('No he podido conectar: '.mysql_error());
            }
 //selecciono la base
mysql_select_db("mynotes",$conexion)

$consulta = "UPDATE notas SET titulo ='".$titulo."', subtitulo ='".$subtitulo."', texto ='".$texto."', color ='".$color."' WHERE utc='".$utcact."' ";

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