<!DOCTYPE html>  
<html>  
<head>  
<title><?= $titulo ?> </title>  
<meta name="viewport" content="width=device-width, initialscale=1,  
shrink-to-fit=no"> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
<link href="assets/css/estilo.css" rel="stylesheet" > 
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">
</head>  

<body>
  <img class="img-fluid" src="assets/img/bienvenida.png" alt="cartel-bienvenida">   
  
  <div class= "prod-destacados"> 
    
    <h2>Productos Destacados</h2>

    <div class="container text-center">
    <div class="row">

    <div class="col">
      <div class="card" style="width: 18rem;" >
      <img src="assets/img/bolsa_cafe_colombia.png" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card" style="width: 18rem;">
      <img src="assets/img/bolsa_cafe_kenya.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card" style="width: 18rem;">
      <img src="assets/img/bolsa_cafe_guatemala.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>

  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner container-fluid">
    <div class="carousel-item active">
      <img src="assets/img/CARRUSEL_1.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/img/CARRUSEL_2.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/img/CARRUSEL_3.png" class="d-block w-100" alt="...">
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

  <div class="container text-center info-cafe">
  <h2>Descubrí la mejor preparación para vos</h2>
  <div class="row">
    <div class="col-lg-4 col-md-12 col-sm-12">
      <img src="assets/img/cafe_latte.jpeg" alt="">
      <p>El café late es la mejor ...</p>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12">
    <img src="assets/img/cafe_expreso.jpeg" alt="">
    <p>El café espreso es la mejor ...</p>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12">
    <img src="assets/img/cafe_cortado.jpeg" alt="">
    <p>El café cortado es la mejor ...</p>
    </div>
  </div>
</div>


</div>
</body>  
</html>



