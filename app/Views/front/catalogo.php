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

      <div class="row row-cols-1 row-cols-md-2 g-4">
        <!-- Producto 1 -->
        <div class="col productos-catalogo">
          <div class="card h-100 text-center">
            <img src="assets/img/gorra2.jpg" class="img-catalogo" alt="Café 1">
            <div class="card-body">
              <h5 class="card-title">Medium Roast</h5>
              <p class="card-text">$20.000</p>
              <button class="btn btn-verde">Agregar al carrito</button>
            </div>
          </div>
        </div>

        <!-- Producto 2 -->
        <div class="col">
          <div class="card h-100 text-center">
            <img src="assets/img/totebag3.jpg" class="img-catalogo" alt="Café 2">
            <div class="card-body">
              <h5 class="card-title">Dark Roast</h5>
              <p class="card-text">$22.000</p>
              <button class="btn btn-verde">Agregar al carrito</button>
            </div>
          </div>
        </div>

        <!-- Producto 3 -->
        <div class="col">
          <div class="card h-100 text-center">
            <img src="assets/img/remera1.jpg" class="img-catalogo" alt="Café 2">
            <div class="card-body">
              <h5 class="card-title">Dark Roast</h5>
              <p class="card-text">$22.000</p>
              <button class="btn btn-verde">Agregar al carrito</button>
            </div>
          </div>
        </div>

        <!-- Producto 4 -->
        <div class="col">
          <div class="card h-100 text-center">
            <img src="assets/img/paraguas.jpg" class="img-catalogo" alt="Café 2">
            <div class="card-body">
              <h5 class="card-title">Dark Roast</h5>
              <p class="card-text">$22.000</p>
              <button class="btn btn-verde">Agregar al carrito</button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
