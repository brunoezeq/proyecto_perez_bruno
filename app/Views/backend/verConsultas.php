<div class="container mt-4">
    <h2 class="text-center">Consultas de Clientes</h2>
    <?php if (session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('mensaje') ?></div>
    <?php endif; ?>

    <form method="get" class="row g-3 mb-4">
        <div class="col-md-4">
            <label for="desde" class="form-label text-dark">Desde</label>
            <input type="date" class="form-control" name="desde" id="desde" value="<?= esc($_GET['desde'] ?? '') ?>">
        </div>
        <div class="col-md-4">
            <label for="hasta" class="form-label text-dark">Hasta</label>
            <input type="date" class="form-control" name="hasta" id="hasta" value="<?= esc($_GET['hasta'] ?? '') ?>">
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <button type="submit" class="btn btn-primary">Filtrar</button>
            <a href="<?= base_url('verConsultas') ?>" class="btn btn-secondary ms-2">Limpiar</a>
        </div>
    </form>

    <?php if (empty($consultas)): ?>
            <div class="alert alert-info">No hay consultas registradas en el período seleccionado.</div>
        <?php else: ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Mensaje</th>
                        <th>Fecha</th>
                        <th>Leído</th>
                        <th>Respondido</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consultas as $consulta): ?>
                        <tr>
                            <td>
                                <?php if (!empty($consulta['nombre_usuario'])): ?>
                                    <?= esc($consulta['nombre_usuario'] . ' ' . $consulta['apellido_usuario']) ?>
                                <?php else: ?>
                                    <?= esc($consulta['nombre_consulta']) ?>
                                <?php endif; ?>
                            </td>
                            <td><?= esc($consulta['consulta']) ?></td>
                            <td><?= esc($consulta['fecha_consulta']) ?></td>
                            <td><?= $consulta['leido'] ? 'Sí' : 'No' ?></td>
                            <td><?= $consulta['respondido'] ? 'Sí' : 'No' ?></td>
                            <td>
                                <?php if (!$consulta['leido']): ?>
                                    <a href="<?= base_url('marcarLeido/' . $consulta['id_consulta']) ?>" class="btn btn-verde">Marcar como leído</a>
                                <?php endif; ?>
                                <?php if (!$consulta['respondido']): ?>
                                    <a href="<?= base_url('marcarRespondido/' . $consulta['id_consulta']) ?>" class="btn btn-verde">Marcar como respondido</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    <?php endif; ?> 
</div>
