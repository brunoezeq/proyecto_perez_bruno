<!DOCTYPE html>  
<html>  
<head>  
<title>XPRESSO</title>  
<meta name="viewport" content="width=device-width, initialscale=1,  
shrink-to-fit=no"> 
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/estilo.css" rel="stylesheet" > 
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">
</head>  
<body>  

<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary p-0 m-0">
    <div class="container-fluid">
      <a class="navbar-brand" href= "<?php echo base_url("principal");?>"><img src="assets/img/logo.png" alt="logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> 
          <li class="nav-item">
            <a class="nav-link " href= "<?php echo base_url("quienes_somos");?>">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href= "<?php echo base_url("contacto");?>">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href= "<?php echo base_url("comercializacion");?>">Comercialización</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href= "<?php echo base_url("terminos_y_usos");?>">Términos y Usos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
