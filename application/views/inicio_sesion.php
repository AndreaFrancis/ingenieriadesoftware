<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">

   <title>Aula Virtual</title>

   <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet">
   
</head>
<body class="" style="">
    <div class="container">

      <div class="page-header" id="banner">
        <div class="row">
          <div class="col-lg-8 col-md-7 col-sm-6">
            <h1>Bienvenido!</h1>
            <p class="lead">Este es el programa Aula Virtual</p>
          </div>
        </div>
      </div>

	<div class="jumbotron" width= "50px">
<?php 
                $attributes = array('class' => 'form-horizontal', 'id' => 'login');
                echo form_open('c_sesion/login', $attributes);
?>
					

          <div class="row">
            <div class="col-lg-4">
               <img src="/login.png" />
            </div>
            <div class="col-lg-6">
               <form class="form-horizontal">
                  <fieldset>
                     <legend style= "text-align:Left;">Inicio de sesión</legend>
                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-2 control-label">Usuario</label>
                      <div class="col-lg-10">
                        <?php 
                           $attributes = array('class'=>'form-control', 'name'=>'txtlogin', 'id'=>'inputUser', 'placeholder'=>'Ingrese su nombre de usuario', 'type'=>'text',  'onkeypress'=>"javascript:return validarNombreUsuario(event)");
                           echo form_input($attributes);
                        ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword" class="col-lg-2 control-label">Contraseña</label>
                      <div class="col-lg-10">
                        <?php 
                           $attributes = array('class'=>'form-control', 'name'=>'txtpass', 'id'=>'inputPassword', 'placeholder'=>'Ingrese su contraseña', 'onkeypress'=>"javascript:return validarPassword(event)");
                           echo form_password($attributes);
                        ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-10 col-lg-offset-2">
                        <?php 
                           $attributes = array('id' => 'boton','name' => 'btoIngresar', 'class' => 'btn btn-primary');
                           echo form_submit($attributes,'Ingresar');
                           echo "&nbsp;&nbsp;&nbsp;";
                           $attributes = array('id'=>'boton','name'=>'btoIngresar', 'class'=>'btn btn-default');
                           echo form_submit($attributes,'Cancelar');
                        ?>
                      </div>
                    </div>   


                    <div class="panel panel-default">
                      <div class="panel-body">
                        Si no tienes una cuenta en "Aula Virtual", puedes registrarte de forma gratuita.
                        <a href="/aula-virtual/index.php/c_admin_cuentas/" class="btn btn-success btn-xs">Registrarse</a>
                      </div>
                    </div>

                  </fieldset>
                </form>
            </div>            
            <div class="col-lg-2"></div>
         </div>

		<?php echo form_close();?>
	</div>

    <div class="pie">
      <div class="row">
        <div class="col-lg-12">
          <br>
          <br>        
            <center><p>Copyright © 2014 <a href="http://www.cominfbol.com" rel="nofollow">SORIA-ORTUÑO</a>. Todos los derechos reservados.</p></center>
          </div>
        </div>
    </div>
  </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/1.3.1/lodash.min.js"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
   
</body>
</html>
