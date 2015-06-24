<?php 
session_start();
$usuarioenviado = $_POST['usuario'];
$passwordenviado = $_POST['password'];
            $conexion = mysql_connect("localhost","user1","sanaila4to");
            if(!$conexion){
            die('No he podido conectar: '.mysql_error());
            }

 //selecciono la base
mysql_select_db("mynotes",$conexion)
//el utf8_encode antes de cada variable es para que aplique los acentos y ñ 
$consulta = "SELECT * FROM usuarios WHERE usuario = '".$usuarioenviado."';  ";
$resultado = mysql_query($consulta,$conexion);

//ejecuto
$resultado = mysql_query($consulta,$conexion);
if(!$resultado){
die('Hubo un error: '.mysql_error());
}
while($fila = mysql_fetch_array($resultado)){
                   if($usuarioenviado == $fila['usuario'] & $passwordenviado == $fila['password']){
                       /*Si el nombre de ususrio y contraseña que se ha escrito existe en a base de datos entonces le asignamos a la variablñelogin el valor yes y le devolvemos al index, psandole además el valor en otra variable de sesión  $_SESSION['usuarioactual'] para usarla mostrándole un saludo al usuario en el index. Ojo que asignamos valor con = simple, no comparamos (==)*/
    $_SESSION['login']  = "yes";   
                       /*creo variable sesion para meter el valor del login usuario pasado por post desde el formulario index.php*/
    $_SESSION['usuarioactual'] = $usuarioenviado;
    echo'
    <html><head><meta http-equiv="refresh" content="0;url=\'../index.php\'"></head></html>
    ';
}
    else{
      $_SESSION['login']  = "no";   
    echo'
    <html><head><meta http-equiv="refresh" content="0;url=\'../index.php\'"></head></html>
    ';
    }
}
//Cerrar la conexion-----------------------------
mysql_close($conexion);  
?>