<?= $this->extend('privat/layout') ?>
<?= $this->section('content') ?>

<div class="container py-4">

    <h2 class="mb-4">Validar Matrícula</h2>

    <div class="card mb-4 shadow-sm">
    <div class="card-header bg-primary text-white">
        Datos completos del Alumno
    </div>

    <div class="card-body">
        <div class="row">

            <div class="col-md-6">
                <p><strong>Nombre:</strong> <?= esc($alumno['Nom_alumne']) ?></p>
                <p><strong>DNI:</strong> <?= esc($alumno['Dni_alumne']) ?></p>
                <p><strong>Email:</strong> <?= esc($alumno['correo_alumne']) ?></p>
                <p><strong>Teléfono alumno:</strong> <?= esc($alumno['tlf_alumne']) ?></p>
                <p><strong>Teléfono familiar:</strong> <?= esc($alumno['tlf_familiar']) ?></p>
            </div>

            <div class="col-md-6">
                <p><strong>Fecha nacimiento:</strong> <?= esc($alumno['data_naixement']) ?></p>
                <p><strong>Domicilio:</strong> <?= esc($alumno['domicili']) ?></p>
                <p><strong>Municipio:</strong> <?= esc($alumno['municipi']) ?></p>
                <p><strong>Población:</strong> <?= esc($alumno['poblacio']) ?></p>
                <p><strong>Código postal:</strong> <?= esc($alumno['codi_postal']) ?></p>
                <p><strong>TSI:</strong> <?= esc($alumno['tsi']) ?></p>

                <br>
                <label for="">Foto Documento 1 </label>
                <img src="<?= base_url('img/'.esc($alumno['foto_documento_frente'])) ?>" alt="">
                <br>
                <label for="">Foto Documento 2 </label>
                <img src="<?= base_url('img/'.esc($alumno['foto_documento_reverso'])) ?>" alt="">
                
            </div>

        </div>
    </div>
    <?php if ($tutor): ?>
<div class="card mb-4 shadow-sm">
    <div class="card-header bg-info text-white">
        Datos del Tutor Legal
    </div>

    <div class="card-body">
        <div class="row">

            <div class="col-md-6">
                <p><strong>Nombre:</strong> <?= esc($tutor['nombre'] ?? '-') ?></p>
                <p><strong>Apellidos:</strong> <?= esc($tutor['apellidos'] ?? '-') ?></p>
                <p><strong>DNI:</strong> <?= esc($tutor['dni'] ?? '-') ?></p>
            </div>

            <div class="col-md-6">
                <p><strong>Telefono:</strong> <?= esc($tutor['telefono'] ?? '-') ?></p>
                <p><strong>Email:</strong> <?= esc($tutor['email'] ?? '-') ?></p>
                <p><strong>Dirección:</strong> <?= esc($tutor['direccion'] ?? '-') ?></p>
                <p><strong>Ciudad:</strong> <?= esc($tutor['ciudad'] ?? '-') ?></p>
                <p><strong>Código Postal:</strong> <?= esc($tutor['codigo_postal'] ?? '-') ?></p>
            </div>

        </div>
    </div>
</div>
<?php else: ?>
    <div class="alert alert-warning">
        Este alumno no tiene tutor asignado
    </div>
<?php endif; ?>
</div>

    <div class="card mb-4 shadow-sm">
    <div class="card-header bg-success text-white">
        Datos completos del Curso
    </div>

    <div class="card-body">
        <div class="row">

            <div class="col-md-6">
                <p><strong>Nombre del curso:</strong> <?= esc($curso['Nom_curs'] ?? '-') ?></p>
                <p><strong>Código:</strong> <?= esc($curso['codigo_curs'] ?? '-') ?></p>
                <p><strong>Precio:</strong> <?= esc($curso['precio'] ?? '-') ?> €</p>
            </div>

            <div class="col-md-6">
                <p><strong>ID:</strong> <?= esc($curso['id_curs'] ?? '-') ?></p>
                <p><strong>Creado:</strong> <?= esc($curso['created_at'] ?? '-') ?></p>
                <p><strong>Actualizado:</strong> <?= esc($curso['updated_at'] ?? '-') ?></p>
            </div>

        </div>
    </div>
</div>

    <div class="card">
        <div class="card-body text-center">

            <form method="post" action="<?= base_url('privat/Matriculas/matricula/validar/'.$matricula['id_matricula']) ?>">
                <?= csrf_field() ?>
              
                <button name="accion" value="validar" class="btn btn-success me-2">
                     Validar
                </button>

                <button name="accion" value="denegar" class="btn btn-danger">
                     Denegar
                </button>

                <a href="<?= base_url('privat/Matriculas/listado') ?>" class="btn btn-secondary ms-2">
                    Volver
                </a>
            </form>

        </div>
    </div>

</div>

<?= $this->endSection() ?>