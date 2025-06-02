<h1 class="text-center">Edición de libros</h1>
<div class="container">
    <div class="w-50 mx-auto">
        <?php echo form_open("ProductoController/actualizarProducto"); ?>

        <div class="form-group">
            <label for="nombre">Nombre del Producto</lebel>
            <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => $producto['producto_nombre']]); ?>
        </div>
        <div>
            <label for="descripcion">Descripción del Producto</lebel>
            <?php echo form_input(['name' => 'descripcion', 'id' => 'descripcion', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => $producto['producto_descripcion']]); ?>
        </div>
        <div class="form-group">
            <label for="categoria">Categoría</lebel>
            <?php 
                $lista['0'] = 'Seleccione la categoria'; 
                foreach ($categoria as $row){
                    $categoria[$row['id_categoria']] = $row[$descripcion_categoria];
                }
                $sel = $producto['producto_categoria']; 
                echo form_dropdown('categoria', $lista, $sel, 'class = "form-control"');
                ?>
        </div>
        <div class="form-group">
            <label for="precio">Precio</lebel>
            <?php echo form_input(['name' => 'precio', 'id' => 'precio', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => $producto['producto_precio']]); ?>
        </div>
        <div class="form-group">
            <label for="stock">Stock</lebel>
            <?php echo form_input(['name' => 'stock', 'id' => 'stock', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => $producto['producto_stock']]); ?>
        </div>
        <?php echo form_hidden('id', $producto['producto_id']); ?>     
         <div class="form-group">
            <?php echo form_submit('Modificar', 'Modificar', "class='btn btn-verde'"); ?>
        </div>
        <?php echo form_close();?>
    </div>
</div>