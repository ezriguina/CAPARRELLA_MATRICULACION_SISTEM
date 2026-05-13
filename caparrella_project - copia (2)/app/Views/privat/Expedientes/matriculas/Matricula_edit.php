<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Matrícula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-5">

            <h3 class="text-primary mb-4">Editar Matricula</h3>

            <?= validation_list_errors() ?>

            <form action="<?= base_url('privat/Matriculas/Manual/edit/'.$matricula['id_matricula']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <h5 class="text-secondary mb-3">Datos Alumno</h5>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <input type="text" name="nom_alumne" class="form-control" value="<?= $alumno['Nom_alumne'] ?>">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="cognom_alumne" class="form-control" value="<?= $alumno['Cognom_alumne'] ?>">
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <input type="text" name="dni" class="form-control" value="<?= $alumno['Dni_alumne'] ?>">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="TSI" class="form-control" value="<?= $alumno['tsi'] ?>">
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="data_nacimiento" class="form-control" value="<?= $alumno['data_naixement'] ?>">
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <input type="text" name="Poblacio" class="form-control" value="<?= $alumno['poblacio'] ?>">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="municipi" class="form-control" value="<?= $alumno['municipi'] ?>">
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-8">
                        <input type="text" name="domicili" class="form-control" value="<?= $alumno['domicili'] ?>">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="codi_postal" class="form-control" value="<?= $alumno['codi_postal'] ?>">
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <input type="tel" name="tlf_familiar" class="form-control" value="<?= $alumno['tlf_familiar'] ?>">
                    </div>
                    <div class="col-md-4">
                        <input type="tel" name="tlf_alumne" class="form-control" value="<?= $alumno['tlf_alumne'] ?>">
                    </div>
                    <div class="col-md-4">
                        <input type="email" name="email_alumne" class="form-control" value="<?= $alumno['correo_alumne'] ?>">
                    </div>
                </div>

                <h6 class="text-secondary mb-2">Documentos actuales</h6>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <p>DNI Frente actual:</p>
                        <img src="<?= base_url('uploads/'.$alumno['foto_documento_frente']) ?>" class="img-fluid mb-2" style="max-height:150px;">
                        <input type="file" name="dni_f" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <p>DNI Reverso actual:</p>
                        <img src="<?= base_url('uploads/'.$alumno['foto_documento_reverso']) ?>" class="img-fluid mb-2" style="max-height:150px;">
                        <input type="file" name="dni_b" class="form-control">
                    </div>
                </div>

                <hr>

                <h5 class="text-secondary mb-3">Tutor</h5>

                
                <hr>

                <h5 class="text-secondary mb-3">Curso</h5>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <select name="id_curs" class="form-select">
                            <?php foreach($cursos as $c): ?>
                                <option value="<?= $c['id_curs'] ?>" <?= $c['id_curs']==$matricula['id_curs']?'selected':'' ?>>
                                    <?= $c['Nom_curs'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <select name="id_bonificacion" class="form-select">
                            <option value="">Sin bonificacion</option>
                            <?php foreach($bonificaciones as $b): ?>
                                <option value="<?= $b['id_bonificacion'] ?>" <?= $b['id_bonificacion']==$matricula['id_bonificacion']?'selected':'' ?>>
                                    <?= $b['nombre'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <select name="tipo_matricula" class="form-select">
                            <option value="normal" <?= $matricula['tipo_matricula']=='normal'?'selected':'' ?>>Normal</option>
                            <option value="continuidad" <?= $matricula['tipo_matricula']=='continuidad'?'selected':'' ?>>Continuidad</option>
                        </select>
                    </div>

                    
                </div>

                <hr>

                <h5 class="text-secondary mb-3">Pago</h5>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <select name="estado" class="form-select">
                            <option value="confirmada" <?= $matricula['estado']=='confirmada'?'selected':'' ?>>Confirmada</option>
                            <option value="pendiente" <?= $matricula['estado']=='pendiente'?'selected':'' ?>>Pendiente</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <select name="pagado" class="form-select">
                            <option value="1" <?= $matricula['pagado']==1?'selected':'' ?>>Pagado</option>
                            <option value="0" <?= $matricula['pagado']==0?'selected':'' ?>>No pagado</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label>Nuevo comprobante (opcional)</label>
                    <input type="file" name="comprov_pago" class="form-control">
                </div>

                <div class="text-end">
                    <button class="btn btn-primary btn-lg">
                        Guardar cambios
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>