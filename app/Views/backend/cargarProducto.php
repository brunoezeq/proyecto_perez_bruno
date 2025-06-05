<h1 class="text-center">Cargar Producto</h1>

<div class="container py-5">
    <div class="w-50 mx-auto">
        <?php if(!empty($validation)) :?>
            <div class="alert alert-danger" role="alert">
            <ul>
                <?php foreach($validation as $error): ?>
                    <li><?=esc($error)?></li>
                <?php endforeach ?>
            </ul>
            </div>
        <?php endif ?> 

        <?php if(session('mensaje')){ ?>
            <div>
                <?= session('mensaje'); ?>
            </div>
        <?php } ?>   

        <?php echo form_open_multipart('cargarProducto') ?>
        <div class="form-group">
            <label for="nombre">Nombre del Producto</lebel>
            <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control', 'placeholder' => 'Ingrese el nombre del producto', 'value' => set_value('nombre')]); ?>
        </div>
        <div>
            <label for="descripcion">Descripción del Producto</lebel>
            <?php echo form_input(['name' => 'descripcion', 'id' => 'descripcion', 'class' => 'form-control', 'placeholder' => 'Ingrese la descripción del Producto', 'value' => set_value('descripcion')]); ?>
        </div>
           <div>
            <label for="imagen">Imagen del Producto</lebel>
            <?php echo form_input(['name' => 'imagen', 'id' => 'imagen', 'class' => 'form-control', 'type' => 'file', 'value' => set_value('imagen')]); ?>
        </div>
        <div class="form-group">
            <label for="categoria">Categoría</lebel>
            <?php 
                $lista['0'] = 'Seleccione la categoria'; 
                foreach ($categoria as $row){
                    $id_categoria = $row['id_categoria'];
                    $descripcion_categoria = $row['descripcion_categoria'];
                    $lista[$id_categoria] = $descripcion_categoria;
                }
                echo form_dropdown('categoria', $lista, '0', 'class = "form-control"');
                ?>
        </div>
        <div class="form-group">
            <label for="precio">Precio</lebel>
            <?php echo form_input(['name' => 'precio', 'id' => 'precio', 'class' => 'form-control', 'placeholder' => 'Ingrese el precio del Producto', 'value' => set_value('precio')]); ?>
        </div>
        <div class="form-group">
            <label for="stock">Stock</lebel>
            <?php echo form_input(['name' => 'stock', 'id' => 'stock', 'class' => 'form-control', 'placeholder' => 'Ingrese el stock del Producto', 'value' => set_value('stock')]); ?>
        </div>
        <div class="form-group">
            <?php echo form_submit('Agregar', 'Agregar Producto', "class='btn btn-verde'"); ?>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>