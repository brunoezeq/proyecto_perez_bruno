<h1 class="text-center my-4" style="color: #143d33;">Ventas</h1>

<div class="container">
    <div class="table-responsive">
        <table id="mytable" class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>N° de Venta</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Ver Detalle</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($venta) && is_array($venta)) : ?>
                    <?php foreach ($venta as $row) : ?>
                       <tr>
                            <td><?= $row['id_venta'] ?></td>
                            <td><?= $row['nombre_usuario'] . ' ' . $row['apellido_usuario'] ?></td>
                            <td><?= $row['fecha_venta'] ?></td>
                            <td><a href="<?= site_url('verDetalle' . $row['id_venta']) ?>" class="btn btn-verde align-center">Ver detalle </a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="8" class="text-center alert alert-warning">No hay ventas para mostrar</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>