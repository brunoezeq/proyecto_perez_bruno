<h1 class="text-center my-4">Cargar Producto</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body">

                    <!-- Validaciones -->
                    <?php if (!empty($validation)) : ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach ($validation as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endif ?>

                    <!-- Mensaje Flash -->
                    <?php if (session('mensaje')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session('mensaje'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                        </div>
                    <?php endif ?>

                    <?= form_open_multipart('cargarProducto') ?>

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Producto</label>
                        <?= form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control', 'placeholder' => 'Ingrese el nombre del producto', 'value' => set_value('nombre')]) ?>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción del Producto</label>
                        <?= form_input(['name' => 'descripcion', 'id' => 'descripcion', 'class' => 'form-control', 'placeholder' => 'Ingrese la descripción del producto', 'value' => set_value('descripcion')]) ?>
                    </div>

                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen del Producto</label>
                        <?= form_input(['name' => 'imagen', 'id' => 'imagen', 'class' => 'form-control', 'type' => 'file']) ?>
                    </div>

                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <?php
                            $lista['0'] = 'Seleccione la categoría';
                            foreach ($categoria as $row) {
                                $lista[$row['id_categoria']] = $row['descripcion_categoria'];
                            }
                            echo form_dropdown('categoria', $lista, '0', 'class="form-select" id="categoria"');
                        ?>
                    </div>

                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <?= form_input(['name' => 'precio', 'id' => 'precio', 'class' => 'form-control', 'placeholder' => 'Ingrese el precio del producto', 'value' => set_value('precio')]) ?>
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <?= form_input(['name' => 'stock', 'id' => 'stock', 'class' => 'form-control', 'placeholder' => 'Ingrese el stock del producto', 'value' => set_value('stock')]) ?>
                    </div>

                    <div class="d-grid">
                        <?= form_submit('Agregar', 'Agregar Producto', "class='btn btn-verde'") ?>
                    </div>

                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
