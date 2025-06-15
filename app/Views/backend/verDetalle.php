<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow" style="max-width: 800px; width: 100%;">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Detalle de Venta #<?= $venta['id_venta'] ?></h3>
            
            <p class="text-dark"><strong>Cliente:</strong> <?= esc($venta['nombre_usuario'] . ' ' . $venta['apellido_usuario']) ?></p>
            <p class="text-dark"><strong>Fecha:</strong> <?= esc($venta['fecha_venta']) ?></p>

            <div class="table-responsive">
                <table class="table table-bordered mt-4">
                    <thead class="table-light">
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detalle as $item): ?>
                        <tr>
                            <td><?= esc($item['nombre_producto']) ?></td>
                            <td><?= esc($item['detalle_cantidad']) ?></td>
                            <td>$<?= number_format($item['detalle_precio'], 2) ?></td>
                            <td>$<?= number_format($item['detalle_precio'] * $item['detalle_cantidad'], 2) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



