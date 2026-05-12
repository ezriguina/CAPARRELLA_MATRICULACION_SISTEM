<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Matrícula Completa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-5">

            <h3 class="text-primary mb-4">Matricula Manual</h3>

            <?= validation_list_errors() ?>

            <form action="<?= base_url('admin/matricula/create') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <h5 class="text-secondary mb-3">Datos Alumno</h5>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <input type="text" name="nom_alumne" class="form-control" placeholder="Nombre" value="<?= old('nom_alumne') ?>">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="cognom_alumne" class="form-control" placeholder="Apellidos" value="<?= old('cognom_alumne') ?>">
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <input type="text" name="dni" class="form-control" placeholder="DNI/NIE">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="TSI" class="form-control" placeholder="TSI">
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="data_nacimiento" class="form-control">
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <input type="text" name="Poblacio" class="form-control" placeholder="Población">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="municipi" class="form-control" placeholder="Municipio">
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-8">
                        <input type="text" name="domicili" class="form-control" placeholder="Dirección">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="codi_postal" class="form-control" placeholder="Código Postal">
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <input type="tel" name="tlf_familiar" class="form-control" placeholder="Teléfono familiar">
                    </div>
                    <div class="col-md-4">
                        <input type="tel" name="tlf_alumne" class="form-control" placeholder="Teléfono alumno">
                    </div>
                    <div class="col-md-4">
                        <input type="email" name="email_alumne" class="form-control" placeholder="Email alumno">
                    </div>
                </div>

                <h6 class="text-secondary mb-2">Documentos</h6>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label>DNI Frente</label>
                        <input type="file" name="dni_f" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>DNI Reverso</label>
                        <input type="file" name="dni_b" class="form-control">
                    </div>
                </div>

                <hr>

                <h5 class="text-secondary mb-3">Tutor</h5>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <select name="tipo_tutor" class="form-select">
                            <option value="">Tipo tutor</option>
                            <option value="padre">Padre</option>
                            <option value="madre">Madre</option>
                            <option value="tutor_legal">Tutor legal</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="tutor_nombre" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="tutor_apellidos" class="form-control" placeholder="Apellidos">
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <input type="text" name="tutor_dni" class="form-control" placeholder="DNI tutor">
                    </div>
                    <div class="col-md-4">
                        <input type="tel" name="tutor_telefono" class="form-control" placeholder="Teléfono">
                    </div>
                    <div class="col-md-4">
                        <input type="email" name="tutor_email" class="form-control" placeholder="Email">
                    </div>
                </div>

                <hr>

                <h5 class="text-secondary mb-3">Curso</h5>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <select name="id_curs" class="form-select">
                            <option value="">Seleccionar curso</option>
                            <?php foreach($cursos as $c): ?>
                                <option value="<?= $c['id_curs'] ?>">
                                    <?= $c['Nom_curs'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <select name="id_bonificacion" class="form-select">
                            <option value="">Bonificación</option>
                            <?php foreach($bonificaciones as $b): ?>
                                <option value="<?= $b['id_bonificacion'] ?>">
                                    <?= $b['nombre'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <select name="tipo_matricula" class="form-select">
                            <option value="normal">Normal</option>
                            <option value="continuidad">Continuidad</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <select name="reduccion" class="form-select">
                            <option value="">Sin reducción</option>
                            <option value="familia_numerosa">Familia numerosa</option>
                            <option value="hermanos">Hermanos</option>
                        </select>
                    </div>
                </div>

                <hr>

                <h5 class="text-secondary mb-3">Pago</h5>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <select name="estado" class="form-select">
                            <option value="confirmada">Confirmada</option>
                            <option value="pendiente">Pendiente</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <select name="pagado" class="form-select">
                            <option value="1">Pagado</option>
                            <option value="0">No pagado</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label>Comprobante de pago</label>
                    <input type="file" name="comprov_pago" class="form-control">
                </div>

                <div class="text-end">
                    <button class="btn btn-success btn-lg">
                        Crear Matrícula Completa
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>