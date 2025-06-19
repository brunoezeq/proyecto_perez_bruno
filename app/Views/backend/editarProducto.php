<h1 class="text-center my-4">Editar Producto</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6"> 
            <div class="card shadow-sm">
                <div class="card-body">
 
                    
                    <?php if (session('errors')): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach (session('errors') as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?= form_open(base_url('actualizar')) ?>

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Producto</label>
                        <?= form_input([
                            'name' => 'nombre',
                            'id' => 'nombre',
                            'class' => 'form-control',
                            'value' => $producto['nombre_producto']
                        ]) ?>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción del Producto</label>
                        <?= form_input([
                            'name' => 'descripcion',
                            'id' => 'descripcion',
                            'class' => 'form-control',
                            'value' => $producto['descripcion_producto']
                        ]) ?>
                    </div>

                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <?php
                            $lista['0'] = 'Seleccione la categoría';
                            foreach ($categoria as $row) {
                                $lista[$row['id_categoria']] = $row['descripcion_categoria'];
                            }
                            $sel = $producto['categoria_producto'];
                            echo form_dropdown('categoria', $lista, $sel, 'class="form-select" id="categoria"');
                        ?>
                    </div>

                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <?= form_input([
                            'name' => 'precio',
                            'id' => 'precio',
                            'class' => 'form-control',
                            'value' => $producto['precio_producto']
                        ]) ?>
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <?= form_input([
                            'name' => 'stock',
                            'id' => 'stock',
                            'class' => 'form-control',
                            'value' => $producto['stock_producto']
                        ]) ?>
                    </div>

                    <?= form_hidden('id', $producto['id_producto']) ?>

                    <div class="d-grid">
                        <?= form_submit('Modificar', 'Modificar', "class='btn btn-verde'") ?>
                    </div>

                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
