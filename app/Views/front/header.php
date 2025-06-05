<!DOCTYPE html>  
<html>  
<head>  
<title><?php echo $titulo ?> </title>                                     
<meta name="viewport" content="width=device-width, initialscale=1,  
shrink-to-fit=no"> 
<link href="assets/css/bootstrap.min.css" rel="stylesheet"> <!-- enlace boostrap-->
<link href="assets/css/estilo.css" rel="stylesheet" > <!-- enlace hoja de estilos-->
<link rel="icon" type="image/png" href="assets/img/icono.png"> <!-- enlace icono -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"> <!-- enlace iconos boostrap-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>  <!-- enlace iconos boostrap-->
</head>  

<body>  

<!-- Menú -->
<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary p-0 m-0">
    <div class="container-fluid">
      <!-- <a class="navbar-brand" href= "<?php echo base_url("principal");?>"><img src="assets/img/logo.png" alt="logo"></a> -->
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
<!--           <li class="nav-item">
            <a class="nav-link " href= "<?php echo base_url("comercializacion");?>">Comercialización</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href= "<?php echo base_url("terminos_y_usos");?>">Términos y Usos</a>
          </li> -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Servicios
            </a>
            <ul class="dropdown-menu">
            <li class="nav-item">
              <a class="nav-link " href= "<?php echo base_url("comercializacion");?>">Comercialización</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href= "<?php echo base_url("terminos_y_usos");?>">Términos y Usos</a>
            </li>
            </ul>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href= "<?php echo base_url("catalogo");?>">Catálogo</a>
          </li>
          <?php if(session('logueado')) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="#"> <i class="bi bi-person"></i> <?php echo session("usuario_usuario"); ?></a>
                </li>
                <li class="nav-item">
                      <a class="nav-link" href= "<?php echo base_url("carrito");?>"><i class="bi bi-cart"></i> </a>
                </li>
                <li class="nav-item">
                      <a class="nav-link" href= "<?php echo base_url("logout");?>"> <i class="bi bi-box-arrow-right"></i> </a>
                </li>
          <?php } else{ ?>
            <li class="nav-item">
                      <a class="nav-link" href= "<?php echo base_url("registro");?>">Registrarse</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href= "<?php echo base_url("login");?>">Iniciar Sesión</a>
                    </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>

