<h2>Detalle de Venta #<?= $venta['id_venta'] ?></h2>
<p><strong>Cliente:</strong> <?= $venta['nombre_usuario'] . ' ' . $venta['apellido_usuario'] ?></p>
<p><strong>Fecha:</strong> <?= $venta['fecha_venta'] ?></p>

<table>
    <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Total</th>
    </tr>
    <?php foreach ($detalle as $item): ?>
    <tr>
        <td><?= $item['nombre_producto'] ?></td>
        <td><?= $item['detalle_cantidad'] ?></td>
        <td>$<?= number_format($item['detalle_precio'], 2) ?></td>
        <td>$<?= number_format($item['detalle_precio'] * $item['detalle_cantidad'], 2) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

