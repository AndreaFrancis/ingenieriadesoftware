<div class="container">

   <div class="page-header" id="banner">
      <div class="row">
         <div class="col-lg-8 col-md-7 col-sm-6">
            <h2>Crea tu grupo</h2>
         </div>
      </div>
      <div class="jumbotron">
         <div class="row">
            <form class="form-horizontal">
               <div class="col-lg-6">
               <fieldset>
                  <legend style= "text-align:Left;">Datos del grupo</legend>

                  <div class="form-group">
                     <label for="inputEmail" class="col-lg-2 control-label">Nombre:</label>
                     <div class="col-lg-10">
                        <?php 
                           $attributes = array('class'=>'form-control', 'name'=>'txtnombre', 'id'=>'inputUser', 'placeholder'=>'Nombre del grupo', 'type'=>'text',  'onkeypress'=>"javascript:return validarLetras(event)");
                           echo form_input($attributes);
                        ?>
                     </div>
                  </div>

                  <div class="form-group">
                     <label for="inputEmail" class="col-lg-2 control-label">Descripcion:</label>
                     <div class="col-lg-10">
                        <?php 
                           $attributes = array('class'=>'form-control', 'name'=>'txtdescripcion', 'id'=>'inputUser', 'placeholder'=>'Descripcion del grupo', 'type'=>'text',  'onkeypress'=>"javascript:return validarLetras(event)");
                           echo form_input($attributes);
                        ?>
                     </div>
                  </div>
               </fieldset>
               </div>
                <div class="form-group">
                     <div class="col-lg-10 col-lg-offset-4">
                        <?php 
                           $attributes = array('id' => 'boton','name' => 'btoCrear', 'class' => 'btn btn-primary');
                           echo form_submit($attributes,'Crear');
                           echo "&nbsp;&nbsp;&nbsp;";                       
                        ?>
                        <a href="/aula-virtual/index.php/c_admin_grupos" class="btn btn-default">Cancelar</a>
                     </div>
               </div>
            </form>
         </div>
      </div>         
      <?php echo form_close();?>
   </div>
</div>
