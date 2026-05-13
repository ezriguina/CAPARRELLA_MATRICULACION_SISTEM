<?= $this->extend('/privat/layout') ?>

<?= $this->section('content') ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tandada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #eef2f7, #f8f9fa);
        }
        .card-custom {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .btn-primary {
            border-radius: 10px;
            padding: 10px 20px;
        }
        .form-control, .form-select {
            border-radius: 10px;
        }
        .header-title {
            font-weight: 600;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <div class="mb-4">
        <a href="<?= base_url('/privat/Tandada') ?>" class="btn btn-outline-secondary"> ← Volver</a>
    </div>

    <div class="card card-custom p-4">
        
        <h2 class="mb-4 header-title">Crear nueva tandada</h2>

        <form action="<?= base_url('privat/Tandada/create') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?> 
        <div style="color: red;">
        <?= validation_list_errors() ?>
        </div>
            <div class="mb-3">
                <label class="form-label">Nombre de la tandada</label>
                <input type="text" name="nom" class="form-control" placeholder="Ej: Tandada Primavera 2026" >
            </div>
        
            <div class="mb-3">
                <label class="form-label">Estado</label>
                <select name="estado" class="form-select" >
                    <option value="" disabled selected>Selecciona estado</option>
                    <option value="1">Activar</option>
                    <option value="0">Desactivar</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Curso</label>
                <select name="curso" class="form-select" >
                    <?php foreach($cursos as $curso) :?>
                    <option value="<?= esc($curso['Nom_curs']) ?>"><?= esc($curso['Nom_curs']) ?></option>
                    
                    <?php endforeach ;?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Subir imágenes</label>
                <input type="file" name="imatge_galeria[]" class="form-control" multiple >
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Fecha inicio</label>
                    <input type="date" name="fecha_inicio" class="form-control" >
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Fecha fin</label>
                    <input type="date" name="fecha_fin" class="form-control" >
                </div>
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary btn-lg">
                    Crear tandada
                </button>
            </div>

        </form>

    </div>

</div>

</body>

<?= $this->endSection() ?>

</html>
