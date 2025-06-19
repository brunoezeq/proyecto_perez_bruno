<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-lg border-0 rounded-4" style="max-width: 800px; width: 100%;">
        <div class="card-body p-4">
            <h3 style="color: #143d33;" class="card-title text-center mb-4" >Detalle de Venta #<?= $venta['id_venta'] ?></h3>

            <div class="mb-3">
                <p class="text-dark"><strong>Cliente:</strong> <?= esc($venta['nombre_usuario'] . ' ' . $venta['apellido_usuario']) ?></p>
                <p class="text-dark"><strong>Documento:</strong> <?= esc($venta['dni_cliente']) ?></p>
                <p class="text-dark"><strong>Domicilio:</strong> <?= esc($venta['domicilio_cliente']) ?></p>
                <p class="text-dark"><strong>Celular:</strong> <?= esc($venta['celular_cliente']) ?></p>                
                <p class="text-dark"><strong>Fecha:</strong> <?= esc($venta['fecha_venta']) ?></p>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle text-center border rounded-3 overflow-hidden">
                    <thead class="table-primary">
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        <?php foreach ($detalle as $item): ?>
                            <?php 
                                $subtotal = $item['detalle_precio'] * $item['detalle_cantidad'];
                                $total += $subtotal;
                            ?>
                            <tr>
                                <td><?= esc($item['nombre_producto']) ?></td>
                                <td><?= esc($item['detalle_cantidad']) ?></td>
                                <td>$<?= number_format($item['detalle_precio'], 2) ?></td>
                                <td>$<?= number_format($subtotal, 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr class="table-light">
                            <td colspan="3" class="text-end"><strong>Total de la Venta:</strong></td>
                            <td><strong>$<?= number_format($total, 2) ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




