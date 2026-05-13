<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Matricula Estudis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .stepper-wrapper {
            display: flex;
            justify-content: space-between;
            position: relative;
        }

        .stepper-wrapper::before {
            content: "";
            position: absolute;
            top: 22px;
            left: 0;
            width: 100%;
            height: 3px;
            background: #e2e8f0;
        }

        .step {
            text-align: center;
            width: 33%;
        }

        .step-circle {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #cbd5e1;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin: auto;
        }

        .step.active .step-circle {
            background: #0d6efd;
        }

        .step.completed .step-circle {
            background: #16c172;
        }
    </style>
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="<?= base_url('img/logo-removebg-preview.png') ?>" 
                 alt="Logo Instituto"
                 height="40"
                 class="me-2">
            Proceso de Matrícula
        </a>
    </div>
</nav>

<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-4">

        <div class="stepper-wrapper mb-5">
            <div class="step completed">
                <div class="step-circle">1</div>
                <div>Datos Alumno</div>
            </div>

            <div class="step active">
                <div class="step-circle">2</div>
                <div>Datos Curso</div>
            </div>

            <div class="step">
                <div class="step-circle">3</div>
                <div>Pago</div>
            </div>
        </div>

        <div class="card-body p-5">

            <h4 class="text-primary mb-4">Datos del Curso</h4>

            <form action="<?= base_url('matricula/datos_curs') ?>" method="post" enctype="multipart/form-data">

                <?= csrf_field() ?>
                <?= validation_list_errors() ?>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Ciclo formativo</label>
                        <select class="form-select" name="Nom_curs">
                            <option value="">Seleccione</option>
                            <?php foreach($curso as $curs): ?>
                            <option value="<?= $curs['Nom_curs']; ?> "> <?= $curs['Nom_curs']; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Tipo matrícula</label>
                        <select class="form-select" name="tipo_matricula">
                            <option value="normal">Normal</option>
                            <option value="continuidad">Continuidad</option>
                        </select>
                    </div>
                </div>

                <hr class="my-4">

                <h5 class="text-secondary mb-3">Bonificaciones</h5>

                <div class="mb-3">
                    <label class="form-label">Seleccione bonificación</label>
                    <select class="form-select" name="bonif">
                            <option value="">Seleccione</option>
                            <?php foreach($bonif as $b): ?>
                            <option value="<?= $b['nombre']; ?> "> <?= $b['nombre']; ?> </option>
                            <?php endforeach; ?>
                        </select>
                </div>

                <h5 class="text-secondary mb-3">Reducciones</h5>

                <div class="mb-3">
                    <label class="form-label">Seleccione reducción</label>
                    <select class="form-select" name="reduccion" id="reduccionSelect">
                        <option value="">Ninguna</option>
                        <option value="familia_numerosa">Familia Numerosa</option>
                        <option value="hermanos">Descuento por hermanos (15%)</option>
                    </select>
                </div>

                <div class="mb-3" id="archivoContainer" style="display:none;">
                    <label class="form-label">Subir documentación justificativa</label>
                    <input type="file" class="form-control" name="documento_reduccion" accept=".pdf,.jpg,.png">
                    <small class="text-muted">Formatos permitidos: PDF, JPG, PNG</small>
                </div>

                <div class="text-end">
                    <button class="btn btn-primary btn-lg">
                        Continuar al pago
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
    const select = document.getElementById('reduccionSelect');
    const archivo = document.getElementById('archivoContainer');

    select.addEventListener('change', function () {
        if (this.value === "familia_numerosa" || this.value === "hermanos") {
            archivo.style.display = "block";
        } else {
            archivo.style.display = "none";
        }
    }); 

</script>

</body>
</html>