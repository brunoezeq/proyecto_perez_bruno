<h1 class="text-center my-4" style="color: #143d33;">Consultas</h1>

<div class="container">
    <div class="table-responsive">
        <table id="mytable" class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>Usuario</th>
                    <th>Asunto</th>
                    <th>Consulta</th>
                    <th>Leído</th>
                    <th>Contestado</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($consulta) && is_array($consulta)) : ?>
                    <?php foreach ($consulta as $row) : ?>
                        <tr>
                            <td class="text-center"><?= esc($row['nombre_consulta'] ?? '') ?></td>
                            <td class="text-center"><?= esc($row['asunto_consulta'] ?? '') ?></td>
                            <td class="text-center"><?= esc($row['consulta'] ?? '') ?></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="8" class="text-center alert alert-warning">No hay consultas para mostrar</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>