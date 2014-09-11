<div class="container">

   <div class="page-header" id="banner">
      <div class="row">
         <div class="col-lg-8 col-md-7 col-sm-6">
            <h2>Administra tus grupos</h2>
         </div>
      </div>
      
      <?php 
         $attributes = array('class' => 'form-horizontal', 'id' => 'grupos');
         echo form_open('c_admin_grupos/mostrar_grupos', $attributes);
       ?>
      <div class="col-sm-7">
          <div class="list-group">


            <a href="#" class="list-group-item active">
              <h4 class="list-group-item-heading">Inteligencia artificial</h4>
              <p class="list-group-item-text">Este grupo esta relacionado a la materia IA</p>
            </a>
            <a href="#" class="list-group-item">
              <h4 class="list-group-item-heading">Ing de software</h4>
              <p class="list-group-item-text">Diseño, implementacion de soft</p>
            </a>
            <a href="#" class="list-group-item">
              <h4 class="list-group-item-heading">Investigacion operativa</h4>
              <p class="list-group-item-text">Esta materia es impartida en la emi para...</p>
            </a>
        </div>
      <div class="form-group">
                     <div class="col-lg-10 col-lg-offset-4">
                        <a href="/aula-virtual/index.php/c_admin_grupos/crear_grupo" class="btn btn-primary">Crear &raquo;</a>
                     </div>
      </div>
      <?php echo form_close();?>
   
   </div>
