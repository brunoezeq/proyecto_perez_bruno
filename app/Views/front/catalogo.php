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
      <?php foreach ($producto as $row) {?>
      
<!--    <div class="row row-cols-1 row-cols-md-2 g-4">

        <div class="col productos-catalogo">
          <div class="card h-100 text-center">
              <img class="card-img-top" src="<?php echo base_url('public/assest/img/'.$row['imagen_producto']);?>" height="450" width="150" alt= "imagen_producto">
              <h5 class="card-title"> <?php echo $row['nombre_producto']?>  </h5>
              <p class="card-text"> <?php echo $row['descripcion_producto']?> </p>
              <p class="card-text"> <?php echo "$"; echo $row['precio_producto']?> </p>
              <p class="card-text"> <?php echo "Categoria:"; echo $row['categoria_producto']?> </p>
              <p class="card-text"> <?php echo "Stock:"; echo $row['stock_producto']?> </p>
              <button class="btn btn-verde">Agregar al carrito</button>
            </div>
          </div>
        </div>
        <?php } ?>
      </div> -->

      <div class="container mt-4">
        <div class="row">
            <?php foreach($producto as $producto): ?>
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <img src="<?= base_url('public/assest/img/'.$producto['imagen_producto']) ?>" class="card-img-top" alt="<?= esc($producto['nombre_producto']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($producto['nombre_producto']) ?></h5>
                            <p class="card-text"><?= esc($producto['descripcion_producto']) ?></p>
                            <p class="card-text"><strong>Precio:</strong> $<?= esc($producto['precio_producto']) ?></p>
                            <a href="#" class="btn btn-verde">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
     </div>

    </div>
  </div>
</div>
