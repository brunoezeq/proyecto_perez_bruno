<h1 class="text-center">Productos Cargados</h1>

<div class="container">
    <table id="mytable" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Editar</th>
                <th>Activar/Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($producto) && is_array($producto)) : ?>
                <?php foreach ($producto as $row) : ?>
                    <tr>
                        <td><?= esc($row['nombre_producto'] ?? '') ?></td>
                        <td><?= esc($row['descripcion_producto'] ?? '') ?></td>
                        <td><?= esc($row['descripcion_categoria'] ?? '') ?></td>
                        <td><img src="<?php echo base_url('public/assest/img/'.$row['imagen_producto']);?>" height="100" width="100"></td>
                        <td><?= esc($row['precio_producto'] ?? '') ?></td>
                        <td><?= esc($row['stock_producto'] ?? '') ?></td>
                        <td>
                            <a class="btn btn-success" href="<?= base_url('editarProducto/'.$row['id_producto']); ?>">Editar</a>
                        </td>
                        <td>
                            <?php if (($row['estado_producto'] ?? 0) == 1): ?>
                                <a class="btn btn-danger" href="<?= base_url('ProductoController/eliminarProducto/' . $row['id_producto']) ?>">Eliminar</a>
                            <?php else: ?>
                                <a class="btn btn-primary" href="<?= base_url('ProductoController/activarProducto/' . $row['id_producto']) ?>">Activar</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="7" class="text-center">No hay productos para mostrar</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


 