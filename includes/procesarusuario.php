<?php 
header('Content-Type: text/html; charset=UTF-8');
$contador = 0;
//Recibo variables
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$apellidouno = $_POST['apellidouno'];
$apellidodos = $_POST['apellidodos'];
$webpersonal = $_POST['titulo'];
$email = $_POST['email'];
            $conexion = mysql_connect("localhost","user1","sanaila4to");
            if(!$conexion){
            die('No he podido conectar: '.mysql_error());
            }

 //selecciono la base
mysql_select_db("mynotes",$conexion);

$consulta = "SELECT * FROM usuarios;";
$resultado = mysql_query($consulta,$conexion);

//ejecuto
$resultado = mysql_query($consulta,$conexion);
if(!$resultado){
die('Hubo un error: '.mysql_error());
}
/*Si el usuario ya existe la variable valdra 1 y no 0*/
while($fila = mysql_fetch_array($resultado)){
                   if($fila['usuario'] == $usuario){$contador++;}else{}
}
        //Cerrar la conexion-----------------------------
mysql_close($conexion); 
/*Creo nuevo usuario(lo inserto en la base) si el contador = 0 implica que el usuario no existe*/
if($contador == 0){
    $conexion = mysql_connect("localhost","user1","sanaila4to"); 
    if(!$conexion){
    die('No he podido conectar: '.mysql_error());
    }
    //selecciono la base
mysql_select_db("mynotes",$conexion);
    //Agrego el usuario, el primer valor vacio es para el autoincremental que existe en la tabla usuarios
    $consulta = "INSERT INTO usuarios VALUES ('','".$usuario."','".$password."','".$nombre."','".$apellidouno."','".$apellidodos."','".$webpersonal."','".$email."',3)";

    //ejecuto
    $resultado = mysql_query($consulta,$conexion);
    if(!$resultado){
    die('Hubo un error: '.mysql_error());
    }
     //Cerrar la conexion-----------------------------
    mysql_close($conexion);
echo'
    <html>
    <head>
        <meta http-equiv="refresh" content="0; url=../index.php">
    </head>
</html>
';
}else{
    echo 
    '
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bolg PHP mysql</title>
    <link rel="shortcut icon" href="img/user.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css"><h2 class="text-center text-danger">El usuario elegido ya existe</h2>
    <a href="../index.php">
        <h4 class="text-center text-info">Volver a la página principal</h4>
    </a>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>

    ';
     }

?>
