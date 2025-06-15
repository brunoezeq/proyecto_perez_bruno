<?php $cart = \Config\Services::cart(); ?>
 
<div class="container my-5">
    <h2 class="text-center mb-4">Carrito de Compras</h2>

    <div class="d-flex justify-content-between mb-3">
        <a href="<?= base_url('catalogo') ?>" class="btn btn-verde">Continuar comprando</a>
    </div>

    <?php if (empty($cart->contents())): ?>
        <div class="alert alert-danger text-center">
            El carrito está vacío
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $total = 0;
                        $i = 1;
                        foreach ($cart->contents() as $item): 
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= esc($item['name']) ?></td>
                            <td>$<?= esc(number_format($item['price'], 2)) ?></td>
                            <td><?= esc($item['qty']) ?></td>
                            <td>$<?= esc(number_format($item['subtotal'], 2)) ?></td>
                            <td>
                                <a href="<?= base_url('eliminarItem/'.$item['rowid']) ?>" class="btn btn-sm btn-danger">
                                    Eliminar
                                </a>
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

        <div class="d-flex justify-content-between flex-wrap gap-2 mt-4">
            <a href="<?= base_url('vaciarCarrito') ?>" class="btn btn-warning">
                Vaciar carrito
            </a>
            <a href="<?= base_url('ventas') ?>" class="btn btn-primary">
                Confirmar compra
            </a>
        </div>
    <?php endif; ?>
</div>
