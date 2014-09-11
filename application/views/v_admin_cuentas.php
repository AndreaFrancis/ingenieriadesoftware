<div class="container">

   <div class="page-header" id="banner">
      <div class="row">
         <div class="col-lg-8 col-md-7 col-sm-6">
            <h2>Crea tu cuenta</h2>
         </div>
      </div>
      <div class="jumbotron">
      <?php 
         $attributes = array('class' => 'form-horizontal', 'id' => 'login');
         echo form_open('c_admin_cuentas/registrar_cuentas', $attributes);

         if ($mensaje == 1) 
         {
         ?>
            <div class="alert alert-dismissable alert-danger">
               <button type="button" class="close" data-dismiss="alert">×</button>
               <h4><strong>Alerta!</strong></h4>
               <h5>Todos los campos deben ser llenados para poder tener un registro correcto.</h5>
            </div>
         <?php
         }  
         else if ($mensaje == 2) 
         {
            ?>
            <div class="alert alert-dismissable alert-success">
               <button type="button" class="close" data-dismiss="alert">×</button>
               <h4><strong>Registro exitoso!</strong></h4>
               <h5>Su registro fue realizado exitosamente.</h5>
            </div>
            <?php
         }
         else if ($mensaje == 3) 
         {
            ?>
            <div class="alert alert-dismissable alert-danger">
               <button type="button" class="close" data-dismiss="alert">×</button>
               <h4><strong>Alerta!</strong></h4>
               <h5>Las contraseñas ingresadas no coinciden.</h5>
            </div>
            <?php
         }
         ?>
         <div class="row">
         <form class="form-horizontal">
            <div class="col-lg-6">
               <fieldset>
                  <legend style= "text-align:Left;">Datos Personales</legend>

                  <div class="form-group">
                     <label for="inputEmail" class="col-lg-2 control-label">Nombre(s):</label>
                     <div class="col-lg-10">
                        <?php 
                           $attributes = array('class'=>'form-control', 'name'=>'txtnombre', 'id'=>'inputUser', 'placeholder'=>'Nombre(s) de la persona', 'type'=>'text',  'onkeypress'=>"javascript:return validarLetras(event)");
                           echo form_input($attributes);
                        ?>
                     </div>
                  </div>

                  <div class="form-group">
                     <label for="inputEmail" class="col-lg-2 control-label">Apellido(s):</label>
                     <div class="col-lg-10">
                        <?php 
                           $attributes = array('class'=>'form-control', 'name'=>'txtapellido', 'id'=>'inputUser', 'placeholder'=>'Apellido(s) de la persona', 'type'=>'text',  'onkeypress'=>"javascript:return validarLetras(event)");
                           echo form_input($attributes);
                        ?>
                     </div>
                  </div>

                  <div class="form-group">
                     <label for="inputEmail" class="col-lg-2 control-label">E-Mail:</label>
                     <div class="col-lg-10">
                        <?php 
                           $attributes = array('class'=>'form-control', 'name'=>'txtemail', 'id'=>'inputUser', 'placeholder'=>'Direccion de correo electronico', 'type'=>'text',  'onkeypress'=>"javascript:return validarEmail(event)");
                           echo form_input($attributes);
                        ?>
                     </div>
                  </div>

               </fieldset>
            </div>

            <div class="col-lg-6">
              <fieldset>
                  <legend style= "text-align:Left;"><br></legend>
                   
                  <div class="form-group">
                     <label for="inputEmail" class="col-lg-2 control-label">Usuario:</label>
                     <div class="col-lg-10">
                        <?php 
                           $attributes = array('class'=>'form-control', 'name'=>'txtlogin', 'id'=>'inputUser', 'placeholder'=>'Nombre de usuario', 'type'=>'text',  'onkeypress'=>"javascript:return validarAlfanumerico(event)");
                           echo form_input($attributes);
                        ?>
                     </div>
                  </div>

                  <div class="form-group">
                     <label for="inputPassword" class="col-lg-2 control-label">Contraseña:</label>
                     <div class="col-lg-10">
                        <?php 
                           $attributes = array('class'=>'form-control', 'name'=>'txtpassword', 'id'=>'inputPassword', 'placeholder'=>'Contraseña minimo de 8 caracteres.', 'type'=>'password',  'onkeypress'=>"javascript:return validarAlfanumerico(event)");
                           echo form_input($attributes);
                        ?>
                     </div>
                  </div>

                  <div class="form-group">
                     <label for="inputPassword" class="col-lg-2 control-label">Verificar contraseña:</label>
                     <div class="col-lg-10">
                        <?php 
                           $attributes = array('class'=>'form-control', 'name'=>'txtpassword2', 'id'=>'inputPassword', 'placeholder'=>'Vuelva a ingresar la contraseña', 'type'=>'password',  'onkeypress'=>"javascript:return validarAlfanumerico(event)");
                           echo form_input($attributes);
                        ?>
                     </div>
                  </div>

                  <div class="form-group">
                     <div class="col-lg-10 col-lg-offset-4">
                        <?php 
                           $attributes = array('id' => 'boton','name' => 'btoIngresar', 'class' => 'btn btn-primary');
                           echo form_submit($attributes,'Registrarse');
                           echo "&nbsp;&nbsp;&nbsp;";                       
                        ?>
                        <a href="/aula-virtual/index.php/" class="btn btn-default">Cancelar</a>
                     </div>
                  </div>
                 </fieldset>
               </div>
            </form>
         </div>         
      <?php echo form_close();?>
      </div>
	</div>
