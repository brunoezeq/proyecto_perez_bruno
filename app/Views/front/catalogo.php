<!-- Vista catalogo.php -->

<div class="container mt-5">
  <div class="row">

    <!-- FILTROS -->
    <div class="col-md-3 mb-4">
      <h5>Filtrar por precio</h5>

      <!-- Formulario con método GET -->
      <form method="get" action="<?= base_url('catalogo') ?>">

        <div class="form-check">
          <input class="form-check-input" type="radio" name="precio" id="menos20" value="menos20"
            <?= (isset($precioSeleccionado) && $precioSeleccionado === 'menos20') ? 'checked' : '' ?>>
          <label class="form-check-label" for="menos20">Menos de $20.000</label>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="radio" name="precio" id="mas20" value="mas20"
            <?= (isset($precioSeleccionado) && $precioSeleccionado === 'mas20') ? 'checked' : '' ?>>
          <label class="form-check-label" for="mas20">Más de $20.000</label>
        </div>

        <hr>

        <h5>Filtrar por categoría</h5>
        <select class="form-select" name="categoria">
          <option value="">Todas</option>
          <option value="1" <?= (isset($categoriaSeleccionada) && $categoriaSeleccionada == 1) ? 'selected' : '' ?>>Café</option>
          <option value="2" <?= (isset($categoriaSeleccionada) && $categoriaSeleccionada == 2) ? 'selected' : '' ?>>Té</option>
          <option value="3" <?= (isset($categoriaSeleccionada) && $categoriaSeleccionada == 3) ? 'selected' : '' ?>>Accesorios</option>
        </select>

        <button type="submit" class="btn btn-verde mt-3">Aplicar filtros</button>
        <a href="<?= base_url('catalogo') ?>" class="btn btn-verde mt-3">Limpiar filtros</a>
      </form>
    </div>

    <!-- CATÁLOGO DE PRODUCTOS -->
    <div class="col-md-9 catalogo">
      <h2>Conoce nuestros productos</h2>

       <?php if(session('mensaje')): ?>
        <div class="alert alert-info">
            <?= session('mensaje') ?>
        </div>
        <?php endif; ?>

      <div class="container mt-4">
        <div class="row">
          <?php if (empty($producto)): ?>
            <p>No se encontraron productos con los filtros seleccionados.</p>
          <?php endif; ?>

          <?php foreach($producto as $producto1): ?>
            <div class="col-md-6 mb-4">
              <div class="card h-100">
                <img src="<?= base_url('public/assest/img/'.$producto1['imagen_producto']) ?>" class="card-img-top" alt="<?= esc($producto1['nombre_producto']) ?>">
                <hr>
                <div class="card-body text-center">
                  <h5 class="card-title"><?= esc($producto1['nombre_producto']) ?></h5>
                  <p class="card-text"><?= esc($producto1['descripcion_producto']) ?></p>
                  <p class="card-text"><strong>Stock:</strong><?= esc($producto1['stock_producto']) ?></p>
                  <p class="card-text"><strong>Precio:</strong> $<?= esc($producto1['precio_producto']) ?></p>

                  <?php if(session('logueado')): ?>
                    <?= form_open('agregarAlCarrito') ?>
                      <?= form_hidden('id', $producto1['id_producto']) ?>
                      <?= form_hidden('nombre', $producto1['nombre_producto']) ?>
                      <?= form_hidden('precio', $producto1['precio_producto']) ?>
                      <?= form_submit('comprar', 'Agregar al carrito', "class='btn btn-verde mt-2'") ?>
                    <?= form_close() ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    
  </div>
</div>



