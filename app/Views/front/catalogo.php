<div class="container py-5">
  <div class="row">
    <!-- Filtros -->
    <div class="col-md-3 mb-4">
      <h5>Filtrar por precio</h5>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="precio" id="menos20">
        <label class="form-check-label" for="menos20">Menos de $20.000</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="precio" id="mas20">
        <label class="form-check-label" for="mas20">Más de $20.000</label>
      </div>

      <hr>

      <h5>Ordenar por</h5>
      <select class="form-select">
        <option value="featured">Destacados</option>
        <option value="bestselling">Más vendidos</option>
        <option value="priceLow">Menor precio</option>
        <option value="priceHigh">Mayor precio</option>
      </select>
    </div>

    <!-- Catálogo -->
    <div class="col-md-9 catalogo">
      <h2>Conoce nuestros productos</h2>
      <div class="container mt-4">
        <div class="row">
          <?php foreach($producto as $producto): ?>
            <div class="col-md-6 mb-4">
              <div class="card h-100">
                <img src="<?= base_url('public/assest/img/'.$producto['imagen_producto']) ?>" class="card-img-top" alt="<?= esc($producto['nombre_producto']) ?>">
                <hr>
                <div class="card-body text-center">
                  <h5 class="card-title"><?= esc($producto['nombre_producto']) ?></h5>
                  <p class="card-text"><?= esc($producto['descripcion_producto']) ?></p>
                  <p class="card-text"><strong>Precio:</strong> $<?= esc($producto['precio_producto']) ?></p>

                  <?php if(session('logueado')): ?>
                    <?= form_open('agregarAlCarrito') ?>
                      <?= form_hidden('id', $producto['id_producto']) ?>
                      <?= form_hidden('nombre', $producto['nombre_producto']) ?>
                      <?= form_hidden('precio', $producto['precio_producto']) ?>
                      <?= form_submit('comprar', 'Agregar al carrito', "class='btn btn-verde mt-2'") ?>
                    <?= form_close() ?>
                  <?php endif; ?>
                </div> <!-- card-body -->
              </div> <!-- card -->
            </div> <!-- col -->
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>


