<div class="container py-5">
    <h2 class="text-center"><?= esc($titulo) ?></h2>

    <?php if (session('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('actualizarPerfil') ?>" method="post">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control"
                   value="<?= old('nombre', $usuario['nombre_usuario']) ?>" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control"
                   value="<?= old('apellido', $usuario['apellido_usuario']) ?>" required>
        </div>

        <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" class="form-control"
                   value="<?= old('usuario', $usuario['usuario']) ?>" required>
        </div>

        <hr>
        <p class="text-muted">Si no deseas cambiar la contraseña, deja los siguientes campos vacíos.</p>

        <div class="form-group">
            <label for="contraseña">Nueva contraseña</label>
            <input type="password" name="contraseña" id="contraseña" class="form-control">
        </div>

        <div class="form-group">
            <label for="confirmar_contraseña">Confirmar nueva contraseña</label>
            <input type="password" name="confirmar_contraseña" id="confirmar_contraseña" class="form-control">
        </div>

        <button type="submit" class="btn btn-verde mt-3">Guardar Cambios</button>
        <a href="<?= base_url('principal') ?>" class="btn btn-verde mt-3">Cancelar</a>
    </form>
</div>
