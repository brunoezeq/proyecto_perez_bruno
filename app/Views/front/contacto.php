<div class="container my-5">
  <div class="row g-4 align-items-stretch">

    <!-- Formulario -->
    <div class="col-md-6">
      <div class="bg-verde-form p-4 rounded text-white h-100 shadow">
        <h2 class="fw-bold text-white mb-4">Contactate con nosotros</h2>

        <?php echo form_open('consulta') ?>

        <?php if (!empty($validation)): ?>
          <div class="mi-alerta" role="alert">
            <ul>
              <?php foreach ($validation as $error): ?>
                <li><?= esc($error) ?></li>
              <?php endforeach ?>
            </ul>
          </div>
        <?php endif ?>

        <?php if (session('mensaje_consulta')) {
          echo session('mensaje_consulta');
        } ?>

        <div class="mb-3">
          <label for="nombre" class="form-label text-white">Nombre</label>
          <?= form_input(['name' => "nombre", 'id' => 'nombre', 'type' => 'text', 'class' => "form-control", 'placeholder' => "Nombre", 'value' => set_value('nombre_consulta')]) ?>
        </div>

        <div class="mb-3">
          <label class="form-label text-white">Email</label>
          <?= form_input(['name' => "mail", 'id' => 'mail', 'type' => 'text', 'class' => "form-control", 'placeholder' => "ejemplo@gmail.com", 'value' => set_value('mail_consulta')]) ?>
        </div>

        <div class="mb-3">
          <label class="form-label text-white">Asunto</label>
          <?= form_input(['name' => "asunto", 'id' => 'asunto', 'type' => 'text', 'class' => "form-control", 'placeholder' => "Asunto", 'value' => set_value('asunto_consulta')]) ?>
        </div>

        <div class="mb-3">
          <label class="form-label text-white">Consulta</label>
          <?= form_textarea(['name' => "consulta", 'id' => 'consulta', 'class' => "form-control", 'placeholder' => "Escribí tu consulta...",  'rows' => 5, 'value' => set_value('consulta')]) ?>
        </div>

        <?= form_submit('Consulta', 'Enviar', "class='btn btn-outline-light w-100'") ?>

        <?= form_close(); ?>
      </div>
    </div>

    <!-- Información de contacto + Mapa -->
    <div class="col-md-6">
      <div class="bg-white p-4 rounded shadow h-100 text-black d-flex flex-column justify-content-between">
        <div>
          <p class="text-dark">
            Somos <strong>Neighbourhood Café S.R.L.</strong>, a cargo de Bruno Pérez. Nuestro objetivo es ofrecer una experiencia cálida y auténtica, donde cada taza cuente una historia y cada cliente se sienta como en casa.
          </p>

          <div class="row row-cols-1 row-cols-md-2 g-3 mt-3">

            <div class="col d-flex align-items-start">
              <i class="bi bi-telephone-fill fs-4 me-3 icono-verde"></i>
              <div>
                <h6 class="fw-bold mb-1">Teléfono</h6>
                <p class="mb-0 text-dark">+54 11 1234 5678</p>
              </div>
            </div>

            <div class="col d-flex align-items-start">
              <i class="bi bi-envelope-fill fs-4 me-3 icono-verde"></i>
              <div>
                <h6 class="fw-bold mb-1">Email</h6>
                <p class="mb-0 text-dark">info@neighbourhoodcafe.com</p>
              </div>
            </div>

            <div class="col d-flex align-items-start">
              <i class="bi bi-whatsapp fs-4 me-3 icono-verde"></i>
              <div>
                <h6 class="fw-bold mb-1">WhatsApp</h6>
                <p class="mb-0 text-dark">+54 9 11 8765 4321</p>
              </div>
            </div>

            <div class="col d-flex align-items-start">
              <i class="bi bi-geo-alt-fill fs-4 me-3 icono-verde"></i>
              <div>
                <h6 class="fw-bold mb-1">Ubicación</h6>
                <p class="mb-0 text-dark">Av. 9 de Julio 1449, Corrientes</p>
              </div>
            </div>

          </div>
        </div>

        <!-- Mapa -->
        <div class="mt-4">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.090215350972!2d-58.83478922525127!3d-27.46645061656643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca6d24ec0c9%3A0xb92ce3fedb0d7729!2sFacultad%20de%20Ciencias%20Exactas%20y%20Naturales%20y%20Agrimensura!5e0!3m2!1ses-419!2sar!4v1744890477040!5m2!1ses-419!2sar"
            width="100%" height="250" style="border:0;" allowfullscreen></iframe>
        </div>
      </div>
    </div>

  </div>
</div>


 


