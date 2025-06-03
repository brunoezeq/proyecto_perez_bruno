<h1 class="text-center">Editar Producto</h1>
<div class="container">
    <div class="w-50 mx-auto"> 

        <?php if(session('errors')): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach(session('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>


        <?php echo form_open(base_url('actualizar')); ?>

        <div class="form-group">
            <label for="nombre">Nombre del Producto</lebel>
            <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => $producto['nombre_producto']]); ?>
        </div>
        <div>
            <label for="descripcion">Descripción del Producto</lebel>
            <?php echo form_input(['name' => 'descripcion', 'id' => 'descripcion', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => $producto['descripcion_producto']]); ?>
        </div>
        <div class="form-group">
            <label for="categoria">Categoría</lebel>
            <?php 
                $lista['0'] = 'Seleccione la categoria'; 
                foreach ($categoria as $row){
                    $lista[$row['id_categoria']] = $row['descripcion_categoria'];
                }
                $sel = $producto['categoria_producto']; 
                echo form_dropdown('categoria', $lista, $sel, 'class = "form-control"');
                ?>
        </div>
        <div class="form-group">
            <label for="precio">Precio</lebel>
            <?php echo form_input(['name' => 'precio', 'id' => 'precio', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => $producto['precio_producto']]); ?>
        </div>
        <div class="form-group">
            <label for="stock">Stock</lebel>
            <?php echo form_input(['name' => 'stock', 'id' => 'stock', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => $producto['stock_producto']]); ?>
        </div>
        <?php echo form_hidden('id', $producto['id_producto']); ?>     
         <div class="form-group">
            <?php echo form_submit('Modificar', 'Modificar', "class='btn btn-verde'"); ?>
        </div>
        <?php echo form_close();?>
    </div>
</div>