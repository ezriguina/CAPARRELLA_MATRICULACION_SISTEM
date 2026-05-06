<?= $this->extend('privat/layout') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="container py-4">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h2 class="fw-bold mb-1">Matrículas</h2>
            <p class="text-muted mb-0">Gestión de matrículas del sistema</p>
        </div>

        <a href="<?= base_url('privat/Matriculas/create') ?>" class="btn btn-primary shadow-sm">
            <i class="fa fa-plus me-1"></i> Nueva Matrícula
        </a>
    </div>
    <div class="card mb-3 shadow-sm border-0">
        <div class="col-md-6">
        <form method="get" action="<?= base_url('privat/Matriculas/searchMatricula') ?>">
            <input type="text" name="keyword" class="form-control"
                   placeholder="Buscar alumno..."
                   value="<?= esc($keyword ?? '') ?>">
        </form>
    </div>
    <div class="card-body">

        <form method="get" class="row g-3 align-items-end">

            <div class="col-md-4">
                   <label for="id_curs">Filtrar per Curs</label>
    <select id="id_curs" name="id_curs"
        class="w3-select w3-border w3-margin-bottom"
        onchange="document.getElementById('filtrarForm').submit()">

        <option value="" <?= empty($cursoSeleccionado) ? 'selected' : '' ?>>
            Tots els cursos
        </option>

        <?php foreach ($curs as $c): ?>
            <option value="<?= $c['id_curs'] ?>"
                <?= ($cursoSeleccionado == $c['id_curs']) ? 'selected' : '' ?>>
                <?= esc($c['Nom_curs']) ?>
            </option>
        <?php endforeach; ?>
    </select>
            </div>

            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">
                    Filtrar
                </button>
            </div>

            <div class="col-md-3">
                <a href="<?= base_url('privat/Matriculas/listado') ?>" class="btn btn-secondary w-100">
                    Limpiar
                </a>
            </div>

        </form>  

    </div>
</div>
    
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Alumno</th>
                            <th>Curso</th>
                            <th>Estado</th>
                            <th>Pagado</th>
                            <th>Fecha</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($matriculas as $m): ?>
                        <tr>
                            <td><?= esc($m['Nom_alumne']) ?> </td>
                        
                            <td><?=  esc($m['Nom_curs']) ?> </td>
                             
                            <td>
                          <?php if ($m['estado'] == 1): ?>
                             <span style="color:green;">VALIDADA</span>

                              <?php elseif ($m['estado'] == 2): ?>
                              <span style="color:red;">CANCELADA</span>

                              <?php else: ?>
                             <span style="color:orange;">PENDIENTE</span>

                             <?php endif; ?>
                              </td>

                            <td>
                                <?php if ($m['pagado'] == 1): ?>
                                    <span style="color:green;">Sí</span>
                                <?php else: ?>
                                    <span style="color:red;">No</span>
                                <?php endif; ?>
                            </td>

                            <td><?= esc($m['created_at']) ?></td>
         <td class="text-center">

        <a href="<?= base_url('privat/Matriculas/matricula/validar/' . esc($m['id_matricula'])) ?>" 
           class="btn btn-sm btn-success">
            Validar
        </a>
        

    <button 
        onclick="document.getElementById('modal-<?= esc($m['id_matricula']) ?>').style.display='block'" 
        class="btn btn-sm btn-outline-primary">
        Ver
    </button>

    <a href="<?= base_url('privat/Matriculas/edit/' . esc($m['id_matricula'])) ?>" 
       class="btn btn-sm btn-outline-warning">
        Editar
    </a>

    <form action="<?= base_url('privat/Matriculas/eliminar/' . esc($m['id_matricula'])) ?>" 
          method="post" 
          style="display:inline;">
        <?= csrf_field() ?>
        <button type="submit" 
            class="btn btn-sm btn-outline-danger"
            onclick="return confirm('¿Eliminar matrícula?');">
            Eliminar
        </button>
    </form>
    
</td>
                        </tr>

                        <div id="modal-<?= esc($m['id_matricula']) ?>" 
                            class="w3-modal" 
                            style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.5);">

                            <div class="w3-modal-content w3-animate-top w3-card-4" 
                                style="margin:auto; margin-top:10%; width:50%; padding:20px; border-radius:10px; background:#fff;">

                                <header class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="mb-0">Detalle Matrícula</h4>

                                    <button 
                                        onclick="document.getElementById('modal-<?= esc($m['id_matricula']) ?>').style.display='none'" 
                                        class="btn btn-sm btn-danger">
                                        ✕
                                    </button>
                                </header>

                                <hr>

                                <p><strong>ID:</strong> <?= esc($m['id_matricula']) ?></p>
                                <p><strong>Alumno:</strong> <?= esc($m['alumno_nombre'] ?? $m['id_alumne']) ?></p>
                                <p><strong>Curso:</strong> <?= esc($m['curso_nombre'] ?? $m['id_curs']) ?></p>

                                <p>
                                    <strong>Estado:</strong>
                                    <?= $m['estado'] == 1 ? '<span style="color:green;">Activa</span>' : '<span style="color:orange;">Pendiente</span>' ?>
                                </p>
                                
                                <p>
                                    <strong>Pagado:</strong>
                                    <?= $m['pagado'] == 1 ? '<span style="color:green;">Sí</span>' : '<span style="color:red;">No</span>' ?>
                                </p>

                                <p><strong>Creado:</strong> <?= esc($m['created_at']) ?></p>
                                <p><strong>Actualizado:</strong> <?= esc($m['updated_at']) ?></p>

                            </div>
                        </div>

                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>

        </div>
    </div>
    <div class="d-flex justify-content-center mb-5">
    <?= $pager->links() ?>
    </div>
</div>

<?= $this->endSection() ?>