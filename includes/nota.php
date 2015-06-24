<?php

$utcnota = $_GET['utc'];

            $conexion = mysql_connect("localhost","user1","sanaila4to");
            if(!$conexion){
            die('No he podido conectar: '.mysql_error());
            }

 //selecciono la base
mysql_select_db("mynotes",$conexion)
                /*consulta*/
$consulta = "SELECT * FROM notas WHERE utc='".$utcnota."' ORDER BY utc DESC LIMIT 1 ;";
                //ejecuto
$resultado = mysql_query($consulta,$conexion);
if(!$resultado){
die('Hubo un error: '.mysql_error());
}

while($fila = mysql_fetch_array($resultado)){
        echo"          
          <div class='col-xs-12'>
                  <p class='blog-post-meta'><time>".$fila['dia']."-".$fila['mes']."-".$fila['anio']."</time></p>

                <h3 class='media-heading'>".$fila['titulo']."</h3>
                <h4>".$fila['subtitulo']."</h4>
                <p>".$fila['texto']."</p>
                <a class='btn btn-danger' href='includes/eliminar.php?utc=".$fila['utc']."' class='text-danger'>Eliminar</a>   
                <a class='btn btn-primary' href='index.php?titulomod=".$fila['titulo']."&subtitulomod=".$fila['subtitulo']."&textomod=".$fila['texto']."&colormod=".$fila['color']."&editando=yes&utc=".$fila['utc']."' class='text-info'>Modificar</a>
            </div>
        ";
}

//Cerrar la conexion-----------------------------
mysql_close($conexion);
?>
