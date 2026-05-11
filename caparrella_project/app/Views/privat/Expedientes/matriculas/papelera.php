<?= $this->extend('privat/layout') ?>
<?= $this->section('content') ?>

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold"> Papelera de Matrículas</h2>

        <a href="<?= base_url('privat/Matriculas/listado') ?>" class="btn btn-secondary">
            ← Volver al listado
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="table-dark">
                        <tr>
                            <th>Alumno</th>
                            <th>Curso</th>
                            <th>Fecha eliminación</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($matriculas as $m): ?>
                        <tr>
                            <td><?= esc($m['id_alumne']) ?></td>
                            <td><?= esc($m['id_curs']) ?></td>
                            <td><?= esc($m['deleted_at']) ?></td>

                            <td class="text-center">

                                <form action="<?= base_url('privat/Matriculas/restaurar/' . $m['id_matricula']) ?>" 
                                      method="post" 
                                      style="display:inline;">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-success btn-sm">
                                         Restaurar
                                    </button>
                                </form>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

<?= $this->endSection() ?>