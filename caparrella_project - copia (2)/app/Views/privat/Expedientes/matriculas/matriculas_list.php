<?= $this->extend('privat/layout') ?>

<?= $this->section('content') ?>

<style>
.mat-avatar {
    width: 32px; height: 32px; border-radius: 50%;
    background: #E6F1FB; color: #185FA5;
    display: inline-flex; align-items: center; justify-content: center;
    font-size: 11px; font-weight: 600; flex-shrink: 0;
}
.mat-badge {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 3px 10px; border-radius: 20px; font-size: 11.5px; font-weight: 500;
}
.mat-badge-dot {
    width: 6px; height: 6px; border-radius: 50%; display: inline-block;
}
.mat-badge-validada  { background: #EAF3DE; color: #3B6D11; }
.mat-badge-cancelada { background: #FCEBEB; color: #A32D2D; }
.mat-badge-pendiente { background: #FAEEDA; color: #854F0B; }
.mat-badge-dot-green  { background: #639922; }
.mat-badge-dot-red    { background: #E24B4A; }
.mat-badge-dot-amber  { background: #BA7517; }
</style>

<div class="container-fluid py-4 px-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-semibold mb-0">Matrículas</h5>
            <small class="text-muted">Gestión de matrículas del sistema</small>
        </div>
        <a href="<?= base_url('admin/matricula/create') ?>" class="btn btn-primary btn-sm">
            <i class="fa fa-plus me-1"></i> Nueva matrícula
        </a>
    </div>
      
    <div class="card border-0 shadow-sm mb-3">
        <div class="card-body pb-2">
            <div class="row g-2 align-items-end">

                <div class="col-md-4">
                    <form method="get" action="<?= base_url('privat/Matriculas/searchMatricula') ?>">
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="fa fa-search text-muted"></i>
                            </span>
                            <input type="text" name="keyword" class="form-control border-start-0 ps-0"
                                   placeholder="Buscar alumno…"
                                   value="<?= esc($keyword ?? '') ?>">
                        </div>
                    </form>
                </div>

                <div class="col-md-3">
                    <form id="filtrarForm" method="get" action="<?= base_url('privat/Matriculas/listado') ?>">
                        <select id="id_curs" name="id_curs" class="form-select form-select-sm"
                                onchange="document.getElementById('filtrarForm').submit()">
                            <option value="" <?= empty($cursoSeleccionado) ? 'selected' : '' ?>>
                                Todos los cursos
                            </option>
                            <?php foreach ($curs as $c): ?>
                                <option value="<?= $c['id_curs'] ?>"
                                    <?= ($cursoSeleccionado == $c['id_curs']) ? 'selected' : '' ?>>
                                    <?= esc($c['Nom_curs']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </form>
                </div>

                <div class="col-auto">
                    <a href="<?= base_url('privat/Matriculas/listado') ?>" class="btn btn-outline-secondary btn-sm">
                        <i class="fa fa-rotate-left me-1"></i> Limpiar
                    </a>
                </div>

                <div class="col-auto ms-auto">
                    <a href="<?= base_url('privat/Matriculas/papelera') ?>" class="btn btn-outline-dark btn-sm">
                        <i class="fa fa-trash me-1"></i> Papelera
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" style="font-size:13.5px;">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3 text-uppercase fw-semibold" style="font-size:11px;letter-spacing:.04em;">Alumno</th>
                            <th class="text-uppercase fw-semibold" style="font-size:11px;letter-spacing:.04em;">Curso</th>
                            <th class="text-uppercase fw-semibold" style="font-size:11px;letter-spacing:.04em;">Tandada</th>
                            <th class="text-uppercase fw-semibold" style="font-size:11px;letter-spacing:.04em;">Estado</th>
                            <th class="text-uppercase fw-semibold" style="font-size:11px;letter-spacing:.04em;">Fecha</th>
                            <th class="text-uppercase fw-semibold text-end pe-3" style="font-size:11px;letter-spacing:.04em;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($matriculas as $m): ?>

                        <?php
                            $nom = esc($m['Nom_alumne']);
                            $partes = explode(' ', trim($nom));
                            $inicials = strtoupper(substr($partes[0] ?? '', 0, 1) . substr($partes[1] ?? '', 0, 1));
                        ?>

                        <tr>
                            <td class="ps-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="mat-avatar"><?= $inicials ?></div>
                                    <span><?= $nom ?></span>
                                </div>
                            </td>
                            <td><?= esc($m['Nom_curs']) ?></td>
                            <td><?= esc($m['Nom_Tanda']) ?></td>
                            <td>
                                <?php if ($m['estado'] == 1): ?>
                                    <span class="mat-badge mat-badge-validada">
                                        <span class="mat-badge-dot mat-badge-dot-green"></span>Validada
                                    </span>
                                <?php elseif ($m['estado'] == 2): ?>
                                    <span class="mat-badge mat-badge-cancelada">
                                        <span class="mat-badge-dot mat-badge-dot-red"></span>Cancelada
                                    </span>
                                <?php else: ?>
                                    <span class="mat-badge mat-badge-pendiente">
                                        <span class="mat-badge-dot mat-badge-dot-amber"></span>Pendiente
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="text-muted"><?= esc($m['created_at']) ?></td>
                            <td class="text-end pe-3">
                                <div class="d-flex justify-content-end gap-1">

                                    <a href="<?= base_url('privat/Matriculas/matricula/validar/' . esc($m['id_matricula'])) ?>"
                                       class="btn btn-outline-success btn-sm">
                                        <i class="fa fa-check me-1"></i> Validar
                                    </a>

                                    <button type="button"
                                        onclick="document.getElementById('modal-<?= esc($m['id_matricula']) ?>').style.display='flex'"
                                        class="btn btn-outline-secondary btn-sm">
                                        <i class="fa fa-eye">Ver</i>
                                    </button>

                                    <a href="<?= base_url('privat/Matriculas/Manual/edit/' . esc($m['id_matricula'])) ?>"
                                       class="btn btn-outline-warning btn-sm">
                                        <i class="fa fa-pen">Editar</i>
                                    </a>

                                    <form action="<?= base_url('privat/Matriculas/eliminar/' . esc($m['id_matricula'])) ?>"
                                          method="post" class="d-inline">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-outline-danger btn-sm"
                                            onclick="return confirm('¿Eliminar matrícula?');">
                                            <i class="fa fa-trash">Borrar</i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>

                        <div id="modal-<?= esc($m['id_matricula']) ?>"
                             style="display:none; position:fixed; inset:0; z-index:9999; background:rgba(0,0,0,.45); align-items:center; justify-content:center;">
                            <div style="background:#fff; border-radius:12px; width:420px; max-width:95vw; padding:1.5rem; box-shadow:0 8px 32px rgba(0,0,0,.18);">

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="fw-semibold mb-0">Detalle matrícula</h6>
                                    <button onclick="document.getElementById('modal-<?= esc($m['id_matricula']) ?>').style.display='none'"
                                            class="btn-close" aria-label="Cerrar"></button>
                                </div>

                                <hr class="my-2">

                              
                                <div class="d-flex justify-content-between py-2 border-bottom" style="font-size:13px;">
                                    <span class="text-muted">Estado</span>
                                    <?php if ($m['estado'] == 1): ?>
                                        <span class="mat-badge mat-badge-validada"><span class="mat-badge-dot mat-badge-dot-green"></span>Validada</span>
                                    <?php elseif ($m['estado'] == 2): ?>
                                        <span class="mat-badge mat-badge-cancelada"><span class="mat-badge-dot mat-badge-dot-red"></span>Cancelada</span>
                                    <?php else: ?>
                                        <span class="mat-badge mat-badge-pendiente"><span class="mat-badge-dot mat-badge-dot-amber"></span>Pendiente</span>
                                    <?php endif; ?>
                                </div>

                                <div class="d-flex justify-content-between py-2" style="font-size:13px;">
                                    <span class="text-muted">Pagado</span>
                                    <?php if ($m['pagado'] == 1): ?>
                                        <span class="mat-badge mat-badge-validada"><span class="mat-badge-dot mat-badge-dot-green"></span>Sí</span>
                                    <?php else: ?>
                                        <span class="mat-badge mat-badge-cancelada"><span class="mat-badge-dot mat-badge-dot-red"></span>No</span>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4 mb-5">
        <?= $pager->links() ?>
    </div>

</div>

<?= $this->endSection() ?>
