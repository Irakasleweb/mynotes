<?php
/*Creamos una variable para controlar lo que mostramos a un usuario que no se haya logeado, si lavariable se ha establecido, osea que se ha hecho login, entonces todo ok, pero si no, nosotros le aplicamos el valor no, para más adelante elegir no mostrar la parte de modificar ni eliminar*/
            $conexion = mysql_connect("localhost","user1","sanaila4to");
            if(!$conexion){
            die('No he podido conectar: '.mysql_error());
            }

 //selecciono la base
mysql_select_db("mynotes",$conexion);
//el utf8 es para que aplique los acentos, ñ , etc
$consulta = "SELECT * FROM notas WHERE usuario = '".$_SESSION['usuariotemporal']."' ORDER BY utc DESC LIMIT 6 ";
/*Ordeno por utc (cantidad de segundos que han pasado desde el inicio de la era unix, si lo hiciesemos por fecha, tendriamos que pasar todos los parametros de la fecha, año,mes,ect) descendiente , de numero mayor (fecha mas alta, implica mas reciente) ademas limito la cantidad de post mostrados a 4 para que la pagina sea mas usable*/
$resultado = mysql_query($consulta,$conexion);

while($fila = mysql_fetch_array($resultado)){

    echo"          
          <div class='col-xs-12 col-sm-6 notas ".$fila['color']."'>
                  <p class=''><time>".$fila['dia']."-".$fila['mes']."-".$fila['anio']."</time></p>
                <h3 class=''>".$fila['titulo']."</h3>
                <h4 class='subt'>".$fila['subtitulo']."</h4>
                <p class='altura_notas'>".$fila['texto']."</p>
                <a class='btn btn-danger' href='includes/eliminar.php?utc=".$fila['utc']."' class='text-danger'>Eliminar</a>   
                <a class='btn btn-primary' href='index.php?titulomod=".$fila['titulo']."&subtitulomod=".$fila['subtitulo']."&textomod=".$fila['texto']."&colormod=".$fila['color']."&editando=yes&utc=".$fila['utc']."' class='text-info'>Modificar</a>
            </div>
        ";
 
    /*Se han puesto dos enlaces de eliminar que llevan a dos archivos para eliminar y modificar, a los que les pasammos como parametros la variable que almacena el tiempo utc que es único para cada post (sería raro publicar dos notas en el mismo segundo) en cambio el título podría estar repetido y podría eliminar varios
    
    Por otro lado, en el enlace de modificar, cargaré la misma pagina index, pero cargare con valor yes la variable editando, lo que implica que solo se me mostrara el formulario para editar el post (formactualizar.php) que he seleccionado con este enlace(pues le estoy pasando los valores de titulo, subtitulo y texto como get)
    */
    }
//Cerrar la conexion-----------------------------
mysql_close($conexion);

?>

          