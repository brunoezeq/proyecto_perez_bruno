<div class="container py-5">

  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="bg-verde-form p-4 rounded text-white w-100 shadow">
        <h2 class="fw-bold text-white mb-4 text-center">Iniciar Sesión</h2>

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

        <?php echo form_open('verificarUsuario') ?>
          <div class="mb-3">
            <label class="form-label">Usuario</label>
            <?php echo form_input (['name' => "usuario", 'id' => 'usuario', 'type' => 'text', 'class' => "form-control", 'placeholder' => "Ingrese su usuario", 'value'=> set_value('usuario_usuario')]); ?>
          </div>
          <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <?php echo form_password (['name' => "contraseña", 'id' => 'contraseña', 'type' => 'text', 'class' => "form-control", 'placeholder' => "Ingrese su contraseña", 'value'=> set_value('contraseña_usuario')]); ?>
          </div>
           <?php echo form_submit('submit', 'Iniciar Sesión', "class= 'btn btn-outline-light w-100'"); ?>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
