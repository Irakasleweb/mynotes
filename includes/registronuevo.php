            <h2>Registro en la plataforma</h2>
             <div class='col-sm-8'>
              
              <div class='media-body input-group'>
                 <form action='includes/procesarusuario.php' method='post'>
                    <div class='form-group'>
                        <h4>Usuario<input type='text' class='form-control'  name='usuario' placeholder='Introduce tu nombre de usuario'></h4>
                        <h4>Contraseña<input type='password' name='password' class='form-control' placeholder='Introduce tu contraseña'></h4>
                        <h4>Nombre<input type='text' class='form-control'  name='nombre' placeholder='Introduce tu nombre '></h4>
                        <h4>Apellido<input type='text' name='apellidouno' class='form-control' placeholder='Introduce tu primer apellido'></h4>
                        <h4>Apellido<input type='text' class='form-control'  name='apellidodos' placeholder='Introduce tu segundo apellido'></h4>
                        <h4>Profesión<input type='text' name='titulo' class='form-control' placeholder='Introduce tu profesión'></h4>
                        <h4>Web<input type='url' name='webpersonal' class='form-control' placeholder='Tu sitio web'></h4>
                        <h4>email<input type='email' name='email' class='form-control' placeholder='Introduce tu email'></h4>
                        
                    </div>

                    <input type='hidden' name='permisos' value='".$utcmod."'>
                    <input type='submit' value='Registrarme'>
                 </form>
              </div>
              
            </div>
