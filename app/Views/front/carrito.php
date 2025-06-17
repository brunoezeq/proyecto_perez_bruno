<?php $cart = \Config\Services::cart(); ?>
<div class="container my-5">
    <h2 class="text-center mb-4">Carrito de Compras</h2>

    <?php if(session('mensaje')): ?>
        <div class="alert alert-info">
            <?= session('mensaje') ?>
        </div>
    <?php endif; ?>

    <div class="mb-3">
        <a href="<?= base_url('catalogo') ?>" class="btn btn-verde">Continuar comprando</a>
    </div>

    <?php if (empty($cart->contents())): ?>
        <div class="alert alert-danger text-center">El carrito está vacío</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; $i = 1; foreach ($cart->contents() as $item): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= esc($item['name']) ?></td>
                            <td>$<?= number_format($item['price'], 2) ?></td>
                            <td><?= esc($item['qty']) ?></td>
                            <td>$<?= number_format($item['subtotal'], 2) ?></td>
                            <td>
                                <a href="<?= base_url('eliminarItem/'.$item['rowid']) ?>" class="btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                        <?php $total += $item['subtotal']; ?>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="4" class="text-end"><strong>Total:</strong></td>
                        <td><strong>$<?= number_format($total, 2) ?></strong></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <?= form_open('ventas') ?>
        <div class="row">
            <div class="col-md-6 mb-2">
                <label for="documento">Documento:</label>
                <?= form_input('documento', set_value('documento'), ['class' => 'form-control', 'id' => 'documento']) ?>
            </div>
            <div class="col-md-6 mb-2">
                <label for="celular">Celular:</label>
                <?= form_input('celular', set_value('celular'), ['class' => 'form-control', 'id' => 'celular']) ?>
            </div>
            <div class="col-md-12 mb-2">
                <label for="domicilio">Domicilio:</label>
                <?= form_input('domicilio', set_value('domicilio'), ['class' => 'form-control', 'id' => 'domicilio']) ?>
            </div>
            <div class="col-md-12 mb-3">
                <label for="medio_pago">Medio de Pago:</label>
                <?php
                    $lista[''] = 'Seleccione un medio de pago';
                    foreach ($medio_pago as $row) {
                        $lista[$row['id']] = $row['nombre'];
                    }
                    echo form_dropdown('medio_pago', $lista, set_value('medio_pago'), 'class="form-select" id="medio_pago"');
                ?>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Confirmar compra</button>
        <?= form_close() ?>

        <div class="mt-3">
            <a href="<?= base_url('vaciarCarrito') ?>" class="btn btn-warning">Vaciar carrito</a>
        </div>
    <?php endif; ?>
</div>

