<!-- Banner bienvenida -->

<div class="container-fluid p-0">
  <section class="custom-banner position-relative">
    <img src="assets/img/barista.jpg" alt="Banner Café" class="img-fluid w-100 banner-bg">

    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-5">
            <div class="text-content text-dark">
              <h2 class="fw-bold">NEIGHBOURHOOD</h2>
              <p>encontra el mejor café para vos</p>
              <a href="#" class="btn btn-dark mt-2">Ver Más</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


<!-- Productos destacados -->
<div class="container my-5">
  <h2 class="text-center mb-4 titulo-seccion">Productos Destacados</h2>

  <div class="row justify-content-center">
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="assets/img/cafe_colombia.jpg" class="card-img-top" alt="café variedad colombia">
        <div class="card-body text-center">
          <h5 class="card-title">Café Colombia</h5>
          <p class="text-black">Suave, con notas dulces y un aroma floral, el café colombiano es reconocido por su equilibrio y calidad inigualable.</p>
          <a href= "<?php echo base_url("proximamente");?>" class="btn btn-verde">Comprar</a>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="assets/img/cafe_nicaragua.jpg" class="card-img-top" alt="café variedad nicaragua">
        <div class="card-body text-center">
          <h5 class="card-title">Café Nicaragua</h5>
          <p class="text-black">Con cuerpo medio y un sabor achocolatado, el café de Nicaragua destaca por su dulzura natural y suavidad.</p>
          <a href= "<?php echo base_url("proximamente");?>" class="btn btn-verde">Comprar</a>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="assets/img/cafe_costarica.jpg" class="card-img-top" alt="café variedad costa rica">
        <div class="card-body text-center">
          <h5 class="card-title">Café Costa Rica</h5>
          <p class="text-black">Vibrante y con acidez brillante, el café costarricense ofrece sabores cítricos y un perfil muy aromático.</p>
          <a href= "<?php echo base_url("proximamente");?>" class="btn btn-verde">Comprar</a>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Carrusel -->

<div class="container my-4">
  <div id="carouselExampleAutoplaying" class="carousel slide rounded overflow-hidden mx-auto" style="max-width: 1500px;" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/img/carrusel1.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="assets/img/.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="assets/img/" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>


<!-- Información cafés -->
<div class="container my-5">
  <h2 class="mb-4 text-center titulo-seccion">Nuestros Cafés</h2>
  
  <div class="row g-4 justify-content-center">
    <div class="col-md-4">
      <div class="card h-100">
        <img src="assets/img/cafe_expreso.jpeg" class="card-img-top" alt="Café Expreso">
        <div class="card-body">
          <h6 class="card-title">Café Expreso</h6>
          <p class="text-black">Fuerte e intenso, ideal para los amantes del sabor puro.</p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card h-100">
        <img src="assets/img/cafe_latte.jpeg" class="card-img-top" alt="Café Latte">
        <div class="card-body">
          <h6 class="card-title titulo-cafe">Café Latte</h6>
          <p class="text-black">Suave y cremoso, con un toque de leche perfecto.</p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card h-100">
        <img src="assets/img/cafe_cortado.jpeg" class="card-img-top" alt="Café Cortado">
        <div class="card-body">
          <h6 class="card-title">Café Cortado</h6>
          <p class="text-black">Equilibrado y sutil, combina expreso con un poco de leche.</p>
        </div>
      </div>
    </div>
  </div>
</div>





