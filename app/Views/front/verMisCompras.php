<div class="container py-5">
    <h2 class="mb-4 text-center"><?= esc($titulo) ?></h2>

     <form method="get" action="<?= base_url('verMisCompras') ?>" class="row g-3 mb-4 justify-content-center">
        <div class="col-md-3">
            <label for="fecha_inicio" class="form-label text-dark">Desde</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" value="<?= esc($fecha_inicio) ?>" class="form-control" required>
        </div>
        <div class="col-md-3">
            <label for="fecha_fin" class="form-label text-dark">Hasta</label>
            <input type="date" name="fecha_fin" id="fecha_fin" value="<?= esc($fecha_fin) ?>" class="form-control" required>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn btn-verde w-100">Filtrar</button>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <a href="<?= base_url('verMisCompras') ?>" class="btn btn-verde w-100">Limpiar filtro</a>
        </div>
    </form>

    <?php if (empty($ventas)): ?>
        <div class="alert alert-info">Aún no has realizado ninguna compra.</div>
    <?php else: ?>
        <?php foreach ($ventas as $venta): ?>
            <div class="card mb-4 shadow-sm">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <strong>Pedido #<?= esc($venta['id_venta']) ?></strong>
                    </div>
                    <div>
                        Fecha: <?= esc($venta['fecha_venta']) ?>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Detalles del pedido:</h5>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio unitario</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; ?>
                                <?php foreach ($venta['detalles'] as $item): ?>
                                    <?php $subtotal = $item['detalle_precio'] * $item['detalle_cantidad']; ?>
                                    <?php $total += $subtotal; ?>
                                    <tr>
                                        <td><?= esc($item['nombre_producto']) ?></td>
                                        <td><?= esc($item['detalle_cantidad']) ?></td>
                                        <td>$<?= number_format($item['detalle_precio'], 2) ?></td>
                                        <td>$<?= number_format($subtotal, 2) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr class="table-secondary">
                                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                    <td><strong>$<?= number_format($total, 2) ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

