<?php
mysql_set_charset($conexion, "utf8");

$usuario = $_SESSION['usuario'];

$titulomod = $_GET['titulomod'];
$subtitulomod = $_GET['subtitulomod'];
$textomod = $_GET['textomod'];
$colormod = $_GET['colormod'];
$utcmod = $_GET['utc'];

/*Hemos creado una variable para el campo input oculto para pasar el valor utc y usarlo como identificador, pero sin que llegue a mostrase al usuario*/

    echo"
            <h2>Modificar nota</h2>                           
                 <form action='includes/modificarnota.php' method='post'>
                    <div class='form-group'>
                        <h3><input type='text' class='form-control'  name='titulopostactualizar' value='".$titulomod."'></h3>
                        <h4><input type='text' name='subtitulopostactualizar' class='form-control' value='".$subtitulomod."'></h4>
                    </div>
                     <div class='form-group'>
                        <label for='colornota'>Elige el color de tu nota</label>
                            <select name='colorpostactualizar'>
                                <option value='blanco' class='text-center blanco'>Blanco</option>
                                <option value='gris' class='text-center gris'>Gris</option>
                                <option value='verde' class='text-center verde'>Verde</option>
                                <option value='azul' class='text-center azul'>Azul</option>
                                <option value='amarillo' class='text-center amarillo'>Amarillo</option>
                                <option value='naranja' class='text-center naranja'>Naranja</option>
                                <option value='".$colormod."' selected>".$colormod."</option>
                            </select>
                            <br>
                        <label class='control-label'>Texto del post</label>
                        <textarea name='textopostactualizar' class='form-control' rows='12'>".$textomod."</textarea>
                    </div>
                    <input type='hidden' name='utcact' value='".$utcmod."'>
                    <input type='submit' value='Enviar'>
                 </form>
              </div>  
       ";   



/*Los valores titulomod subtitulo mod y texto mod vienen del post en el que se ha hecho click en en el¡nlace modificar del archivo posts.php*/
?>