<h1 class="text-center my-4">Productos Cargados</h1>

<div class="container">
    <div class="table-responsive">
        <table id="mytable" class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
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
                            <td class="text-center"><?= esc($row['nombre_producto'] ?? '') ?></td>
                            <td class="text-center"><?= esc($row['descripcion_producto'] ?? '') ?></td>
                            <td class="text-center"><?= esc($row['descripcion_categoria'] ?? '') ?></td>
                            <td class="text-center">
                                <img src="<?= base_url('public/assest/img/'.$row['imagen_producto']) ?>" class="img-fluid rounded" style="max-width: 100px; height: auto;">
                            </td>
                            <td class="text-center">$<?= esc($row['precio_producto'] ?? '') ?></td>
                            <td class="text-center"><?= esc($row['stock_producto'] ?? '') ?></td>
                            <td class="text-center">
                                <a class="btn btn-success btn-sm" href="<?= base_url('editarProducto/'.$row['id_producto']); ?>">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
                            </td>
                            <td class="text-center">
                                <?php if (($row['estado_producto'] ?? 0) == 1): ?>
                                    <a href="<?= base_url('eliminarProducto/'.$row['id_producto']) ?>" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </a>
                                <?php else: ?>
                                    <a href="<?= base_url('activarProducto/'.$row['id_producto']) ?>" class="btn btn-primary btn-sm">
                                        <i class="bi bi-check-circle"></i> Activar
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="8" class="text-center alert alert-warning">No hay productos para mostrar</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>



 