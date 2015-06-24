          <div class="col-xs-12">
            <h4>Archivo de notas</h4>
            <p>Listado por orden de antigüedad descendiente</p>
            <h4>Tus notas</h4>
            <ol class="list-unstyled">
             <?php 
            $conexion = mysql_connect("localhost","user1","sanaila4to");
            if(!$conexion){
            die('No he podido conectar: '.mysql_error());
            }

 //selecciono la base
mysql_select_db("mynotes",$conexion)

                /*consulta, el offset es para que no muestre los 6 primeros posts que son los que estoy mostrando en la pagina principal y el limit limita a 20 resultados ojo pues habra de haber mas de 6 posts para que muestre los restantes en este apartado*/
                $consulta = "SELECT * FROM notas WHERE usuario='".$_SESSION['usuariotemporal']."' ORDER BY utc DESC LIMIT 20 OFFSET 6 ";
                //ejecuto
                $resultado = mysql_query($consulta,$conexion);
                if(!$resultado){
                die('Hubo un error: '.mysql_error());
                }
                while($fila = mysql_fetch_array($resultado)){
                    //pasamos la variable articulo= yes de igualmanera que usamos editando=yes antes, para poder mostrar o no algo cuando sigamos el enlace
                    echo" <li><a href='index.php?nota=yes&utc=".$fila['utc']."'><time>".$fila['dia']."-".$fila['mes']."-".$fila['anio']."-".$fila['titulo']."</time></a></li>";
                }
                //Cerrar la conexion-----------------------------
                mysql_close($conexion);   
             ?>
             </ol></div>
             
           