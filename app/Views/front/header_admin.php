<!DOCTYPE html>  
<html>  
<head>  
<title></title>                                     
<meta name="viewport" content="width=device-width, initialscale=1,  
shrink-to-fit=no"> 
<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/css/estilo.css') ?>" rel="stylesheet">
  <link rel="icon" type="image/png" href="<?= base_url('assets/img/icono.png') ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>  

<!-- Menú Administador -->
<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary p-0 m-0 nav_admin">
    <div class="container-fluid na">
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> 
          <li class="nav-item">
            <a class="nav-link " href= "<?php echo base_url("cargarProducto");?>">Cargar Producto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href= "<?php echo base_url("gestionarProducto");?>">Gestionar Producto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href= "<?php echo base_url("listarProducto");?>">Ver Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href= "<?php echo base_url("#");?>">Ver Consultas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href= "<?php echo base_url("#");?>">Ver Ventas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-person"></i> <?php echo session("usuario_usuario"); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href= "<?php echo base_url("logout");?>">	<i class="bi bi-box-arrow-right"></i> </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>