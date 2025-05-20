<div class="container registro">

  <div class="row form-registro">
    <div class="col-md-6">
      <div class="bg-verde-form p-4 rounded w-100 shadow">
        <h2>Unite a nuestra comunidad</h2>

        <?php if(!empty($validation)): ?>
        <div class="mi-alerta" role="alert">
          <ul>
            <?php foreach ($validation as $error) : ?>
              <li> <?= esc($error) ?> </li>
              <?php endforeach ?>
          </ul>
        </div>
        <?php endif ?>

        <?php if(session('mensaje')){
          echo session('mensaje');
        } ?>

        <?php echo form_open('registro') ?>
        <form class="formulario">
          <div class="mb-3">
            <label class="form-label">Nombre</label>
             <?php echo form_input (['name' => "nombre", 'id' => 'nombre', 'type' => 'text', 'class' => "form-control", 'placeholder' => "Nombre", 'value'=> set_value('nombre_usuario')]); ?>
          </div>
          <div class="mb-3">
            <label class="form-label">Apellido</label>
             <?php echo form_input (['name' => "apellido", 'id' => 'apellido', 'type' => 'text', 'class' => "form-control", 'placeholder' => "Apellido", 'value'=> set_value('apellido_usuario')]); ?>
          </div>
          <div class="mb-3">
            <label class="form-label">Usuario</label>
             <?php echo form_input (['name' => "usuario", 'id' => 'usuario', 'type' => 'text', 'class' => "form-control", 'placeholder' => "Usuario", 'value'=> set_value('usuario')]); ?>
          </div>
          <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <?php echo form_password (['name' => "contraseña", 'id' => 'contraseña', 'type' => 'text', 'class' => "form-control", 'placeholder' => "Contraseña", 'value'=> set_value('contraseña_usuario')]); ?>
          </div>
          <div class="mb-3">
            <label class="form-label">Confirmar Contraseña</label>
            <?php echo form_password (['name' => "confirmar_contraseña", 'id' => 'confirmar_contraseña', 'type' => 'text', 'class' => "form-control", 'placeholder' => "Repita la contraseña", 'value'=> set_value('contraseña_conf_usuario')]); ?>
          </div>
           <?php echo form_submit('Usuario', 'Registrarse', "class= 'btn btn-outline-light w-100'"); ?>
        </form> 
      </div>
         <?php echo form_close(); ?>
    </div>
  </div>
</div> 


