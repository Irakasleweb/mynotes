<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
/*Si ningún usuario ha iniciado sessión le doy valor a una variable de sesión para que ya haya iniciado sesión un usuario de prueba(asumiendo que ya se ha puesto la contraseña y no tengo que pasarla luego..) si ya ha iniciado sesion recogo el valor de la variable de sesión usuario actuial que creé login php para asignarle a usuario temporal ese valor */
/*Además, en las recargas manuales de las páginas, ocasionalmente muestra la noticia de que no se conoce usuarioactual(al no venir directamente desede login.php o registronuevo.php) por lo que para evitar el mensaje, si no se conoce usuarioactual, le asigno el valor user_uno*/
if(isset($_SESSION['usuariotemporal'])){
    if(isset($_SESSION['usuarioactual'])){$_SESSION['usuariotemporal'] = $_SESSION['usuarioactual'];}else{$_SESSION['usuarioactual'] = 'user_uno';}
}else{
    $_SESSION['usuariotemporal'] = 'user_uno';}
/*Exista el usuario temporal o no, a las variables de usuario se asignará un valor, que será específico para cada usuario, con lo que mostraré los post específicos de cada usuario*/
include "includes/variablesdeusuario.php";
/*Creamos una variable que nos permitirá modificar un post desde esta misma página, pero si esta variable no existe tendremos un mensaje de error en el navegador, as que para que no aparezca, hacemos que sólo se guarde si ha sido establecida*/
if(isset($_GET['editando'])){
$editando = $_GET['editando'];
}else{$editando = "no";}
/*Creamos una variable que nos permitira mostrar una nota de el archivo de posts, que haya sido clickado por el usuario,pero si esta variable no existe tendremos un mensaje de error en el navegador, así que para que no aparezca, hacemos que sólo se guarde si ha sido establecida*/
if(isset($_GET['nota'])){
$nota = $_GET['nota'];
}else{$nota = "no";}
/*Creamos otra variable para controlar lo que mostramos a un usuario que no se haya logeado, si lavariable se ha establecido, osea que se ha hecho logino, entonces todo ok, pero sino, nosotros le aplicamos el valor no, para mas adelante elegir no mostrar la parte de modificar, eliminar ni crear posts. Cuidado con los signos de == dobles que son para comparar y = simples que son para asignar*/
if(isset($_SESSION['login'])){}else{$_SESSION['login'] = "no";}
/*Creamos una variable que nos permitira mostrar un bloque para registrar un blogero*/
if(isset($_GET['registronuevo'])){
$registronuevo = $_GET['registronuevo'];
}else{$registronuevo = "no";}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>MyNotes</title>
    <link rel="shortcut icon" href="img/logo_nota.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">

    <!--[if IE]>
        <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--Sustituyo valores estaticos por dinamicos-->
                <a class="navbar-brand" href="#"><img class="img-responsive" src="img/logo_nota.png" alt="foto usuario"></a>
            </div>

            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">MyNotes<span class="sr-only">(current)</span></a></li>
                <li><a href="https://github.com/Irakasleweb/mynotes">Documentación</a></li>
                  <li><a href="http://www.imobach.es">Contacto</a></li>
              </ul>
                  <?php
    //Si se ha hecho login no mostraré el enlace para registrarse
                   if($_SESSION['login'] == "no"){
                        echo'
                        <h4 class="text-right crear_notas"><a href="index.php?registronuevo=yes" >Crea tus notas online</a></h4>';
                    }else{}
                ?>
            </div><!--.nav-collapse -->
        </div>
    </nav>


    <div class="container-fluid">

      <div>
        <h1 class="text-center text-lead text-info">MyNotes</h1>
        <h2 class="text-center text-lead text-info sub">Tus notas online siempre disponibles</h2>
      </div>

      <div class="row">

         <div class="col-sm-3"><!-- Bloque lateral -->
         <?php

/*Si el usuario se está registrando no muestro el formulario de login ni el enlace de cerrar sessión. Ojo, que en un if lo que hacemos es comparar (==) no asignar valor (=): Si se ha hecho login (implica que es igual a yes) entonces mostraremos enlace para cerrar sesion, en cambio si no, mostramos formulario de login*/
   if($registronuevo == "no"){
         if($_SESSION['login'] == "yes"){
             //Le saludo al usuario que ha iniciado sesion obteniendo la variable de sesion que cree en login.php
                echo "<h4>Hola ".$_SESSION['usuarioactual']."</h4><a href='includes/cerrarsesion.php'><h4>Cerrar sesión</h4></a>";
                 }else{
                echo"
                     <form action='includes/login.php' method='post' id='#iniciar_sesion'>
                   <h3>Iniciar sesion</h3>
                    <div class='form-group'>
                        <input type='text' class='form-control'  name='usuario' placeholder='Usuario'>
                        <input type='password' name='password' class='form-control' placeholder='Contraseña'>
                    </div>
                    <input type='submit' value='Enviar'>
                 </form>";
         }
   }else{}
 ?>
<?php
      /* Si la variable registronuevo es igual a no mostraré el resto pero si es yes mostraré formulario de registro */
   if($registronuevo == "no"){
    /* Si la variable nota (que el usuario haya seleccionado una nota del archivo) es igual a yes no mostraré el resto pero si la nota del archivo seleccionado por el usuario*/
    if($nota == "no"){
   /* Si estoy editando una nota no voy a querer crear otra nueva ni visualizar el resto, así que no las muestro pero sí mostrare el formulario para actualizarla.*/
                            if($editando == "yes"){}
                            else
                            {
                     /*Si el usuario no ha hecho login, no le mostraré el formularaio para crear un nuevo post*/
                            if($_SESSION['login'] == "yes"){include "includes/crearnuevanota.php";}else{}

                            }
                         }else{}
}else{ }


        ?>

        <!-- Aqui va el archivo de notas que se muestran a menos que este editando o no se haya logeado-->
       <?php
/*Si el usuario se está registrando no muestro el bloque de archivo de notas*/
if($_SESSION['login'] == "yes"){
        if($registronuevo == "no")
        {
            if($editando == 'no')
            {include('includes/archivo.php');}else{};
        }else{};
}else{};
       ?>
</div><!--Bloque lateral----->

        <div class="col-sm-9"><!-----Bloque de notas-------->
          <?php
      /*Si el usuario se ha logeado, le mostraré el archivo de sus notas, un formulario para crear nuevas notas y sus notas junto con enlaces para modificar y eliminarlas y el archivo de sus notas.En el bloque de notas lo siguiente: Si la variable registronuevo es igual a no mostraré el resto pero si es yes mostraré formulario de registro */
   if($registronuevo == "no"){
    /* Si la variable nota (que el usuario haya seleccionado una nota del archivo) es igual a yes no mostraré el resto pero si la nota del archivo seleccionado por el usuario*/
    if($nota == "no"){
   /* Si estoy editando una nota no voy a querer crear otra nueva ni visualizar el resto, así que no las muestro pero sí mostrare el formulario para actualizarla.*/
                            if($editando == "yes"){include "includes/formactualizar.php";}
                            else
                            {
                     /*Si el usuario no ha hecho login, no le mostraré el formularaio para crear un nuevo post*/
                            include "includes/notas.php";
                            }
                         }else{include "includes/nota.php";}
}else{  include "includes/registronuevo.php";}
          ?>
          </div><!-----Fin Bloque de notas-------->
      </div><!-- /.row -->

    </div><!-- /.container -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script>
        /*Contar el número de veces que el usuario ha visitado el sitio*/
        if(localStorege.pagecount){localStorege.pagecount = Number(localStorege.pagecount)+1;}else{localStorege.pagecount = 1}
        document.write("Has visitado mi página " + localStorege.pagecount = + " veces");
    </script>
</body>
</html>
