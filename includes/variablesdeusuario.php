<?php 


            $conexion = mysql_connect("localhost","user1","sanaila4to");
            if(!$conexion){
            die('No he podido conectar: '.mysql_error());
            }
 //selecciono la base
mysql_select_db("mynotes",$conexion);
$consulta = "SELECT * FROM usuarios WHERE usuario = '".$_SESSION['usuariotemporal']."' ";
//ejecuto
$resultado = mysql_query($consulta,$conexion);
/*Recorro el array que ha creado la consulta y meto cada valor de cada campo del array en una variable de sessión*/
while ($fila = mysql_fetch_array($resultado)){
$_SESSION['usuario'] = $fila['usuario'];
$_SESSION['password'] = $fila['password'];
$_SESSION['nombre'] = $fila['nombre'];
$_SESSION['apellidouno'] = $fila['apellidouno'];
$_SESSION['apellidodos'] = $fila['apellidodos'];
$_SESSION['webpersonal'] = $fila['webpersonal'];
$_SESSION['email'] = $fila['email'];
$_SESSION['permisos'] = $fila['permisos']; 
}
//Cerrar la conexion-----------------------------
mysql_close($conexion);
?>