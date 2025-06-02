<h1 class="text-center">Listar Productos</h1>
    <div class="container">
        <table id="mytable" class="table table-bordred table-striped table-hover">
            <thead>
                <th>Nombre</th>
                <th>descripción</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Editar</th>
                <th>Activar/Eliminar</th>
            </thead>

            <tbody>
                <?php foreach($producto as $row) {?>
                <tr>
                    <td><?php echo $row['producto_nombre']; ?></td>
                    <td><?php echo $row['producto_descripcion']; ?></td>
                    <td><?php echo $row['producto_categoria']; ?></td>
                    <td><?php echo $row['producto_precio']; ?></td>
                    <td><?php echo $row['producto_stock']; ?></td>
                    <td></td><a class="brn btn-success" href="<?php echo base_url('ProductoController/editarProducto/'.$row['producto_id']);?>">Editar</a></td>
                    <?php
                        if($row['producto_estado'] == 1)
                        { ?>
                            <td><a class="bt btn-danger" href="<?php echo base_url('productoController/eliminarProducto/'.$row[producto_id]);?>">Eliminar</a></td>
                        <?php }else{ ?>
                             <td><a class="bt btn-danger" href="<?php echo base_url('productoController/eliminarProducto/'.$row[producto_id]);?>">Activar</a></td>
                            <?php } ?>
                </tr> 
                    <?php } ?>
            </tbody>
        </table>
    </div>

 