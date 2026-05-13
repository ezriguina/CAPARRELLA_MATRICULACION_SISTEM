<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Matricula Estudis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
.stepper-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
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
    z-index: 0;
}

.step {
    text-align: center;
    position: relative;
    z-index: 1;
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
    margin: 0 auto 8px auto;
    transition: 0.3s ease;
}

.step-label {
    font-size: 14px;
    font-weight: 500;
    color: #64748b;
}

.step.active .step-circle {
    background: #0d6efd;
}

.step.active .step-label {
    color: #0d6efd;
    font-weight: 600;
}

.step.completed .step-circle {
    background: #16c172;
}

.step.completed .step-label {
    color: #16c172;
}

</style>
<body class="bg-light">

<nav class="navbar navbar-dark white">
    <div class="container">

        <a class="navbar-brand d-flex align-items-center" href="#">

            <img 
                src="<?= base_url('img/logo-removebg-preview.png') ?>" 
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
        <div class="step-label">Datos Alumno</div>
    </div>

    <div class="step active">
        <div class="step-circle">2</div>
        <div class="step-label">Datos Curso</div>
    </div>

    <div class="step">
        <div class="step-circle">3</div>
        <div class="step-label">Pago</div>
    </div>
</div>  
      <div class="tandada-actual">
  <span class="label">Tandada actual:</span>
  <strong class="value">
    <?= esc($Tand['nom_tandada']); ?>
  </strong>
</div>
        <div class="card-body p-5">
            <h4 class="mb-4 text-primary">Dades de l'alumne/a</h4>

            <form action="<?= base_url('matricula/datos_alumne') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field();?> 

            <?=  validation_list_errors() ?> 
            
                <div class="accordion mb-4" id="accordionAlumno">

    <div class="accordion-item border-0 shadow-sm rounded-3">

        <h2 class="accordion-header">
            <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAlumno">
                <i class="bi bi-person-vcard me-2"></i> Dades de l'alumne/a
            </button>
        </h2>

        <div id="collapseAlumno" class="accordion-collapse collapse show">

            <div class="accordion-body">
                 
                <h6 class="text-primary mb-3">
                    <i class="bi bi-person"></i> Informació bàsica
                </h6>

                <div class="row g-3 mb-4">
                    <div class="col-md-8">
                        <label class="form-label fw-semibold">Cognoms</label>
                        <input type="text" class="form-control form-control-lg" name="cognom_alumne" value="<?= old('cognom_alumne'); ?>"><br>
                        <label class="form-label fw-semibold">Nom</label>
                        <input type="text" class="form-control form-control-lg" name="nom_alumne" value="<?= old('nom_alumne'); ?>">  
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">DNI,NIE,PASSAPORTE</label>
                        <input type="text" class="form-control form-control-lg" name="dni" value="<?= old('dni'); ?>">
                    </div>
                </div>

                <h6 class="text-primary mb-3">
                    <i class="bi bi-heart-pulse"></i> Sistema sanitari
                </h6>

                <div class="mb-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input class="form-control form-control-lg" type="text" name="TSI" placeholder="TSI" value="<?= old('TSI'); ?>">
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="mutua" value="Mutua">
                                <label class="form-check-label">Mútua</label>
                            </div>
                        </div>
                    </div>
                </div>

                <h6 class="text-primary mb-3">
                    <i class="bi bi-card-image"></i> Documents DNI
                </h6>

                <div class="row g-4 mb-4">

    <div class="col-md-6 text-center">
        <label class="form-label fw-bold">DNI (anvers)</label>

        <div class="border rounded p-3 shadow-sm">
            <img id="previewFront" src="<?= base_url('img/1.png') ?>" 
                 class="img-fluid mb-2" style="max-height:200px; object-fit:cover;">

            <input type="file" class="form-control" name="dni_f" accept="image/*" onchange="previewImage(event, 'previewFront')">

            <small class="text-muted">
                Formats permesos: JPG, PNG • Max 2MB
            </small>
        </div>
    </div>

    <div class="col-md-6 text-center">
        <label class="form-label fw-bold">DNI (revers)</label>

        <div class="border rounded p-3 shadow-sm">
            <img id="previewBack" src="<?= base_url('img/2.png') ?>" 
                 class="img-fluid mb-2" style="max-height:200px; object-fit:cover;">

            <input type="file" class="form-control" name="dni_b" accept="image/*" onchange="previewImage(event, 'previewBack')">

            <small class="text-muted">
                Formats permesos: JPG, PNG • Max 2MB
            </small>
        </div>
    </div>

</div>

                <h6 class="text-primary mb-3">
                    <i class="bi bi-calendar"></i> Dades personals
                </h6>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <input type="text" class="form-control form-control-lg" name="Poblacio" placeholder="Població" value="<?= old('Poblacio'); ?>">
                    </div>
                    <div class="col-md-6">
                        <input type="date" class="form-control form-control-lg" name="data_nacimiento" value="<?= old('data_nacimiento'); ?>">
                    </div>
                </div>

                <h6 class="text-primary mb-3">
                    <i class="bi bi-house"></i> Domicili
                </h6>

                <div class="row g-3 mb-4">
                    <div class="col-md-8">
                        <input type="text" class="form-control form-control-lg" name="domicili" placeholder="Direcció" value="<?= old('domicili'); ?>">
                    </div>
                    <div class="col-md-4">
                        <input type="tel" class="form-control form-control-lg" name="tlf_familiar" placeholder="Telèfon familiar" value="<?= old('tlf_familiar'); ?>">
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-8">
                        <input type="text" class="form-control form-control-lg" name="municipi" placeholder="Municipi" value="<?= old('municipi'); ?>">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control form-control-lg" name="codi_postal" placeholder="Codi postal" value="<?= old('codi_postal'); ?>">
                    </div>
                </div>

                <h6 class="text-primary mb-3">
                    <i class="bi bi-telephone"></i> Contacte
                </h6>

                <div class="row g-3">
                    <div class="col-md-6">
                        <input type="tel" class="form-control form-control-lg" name="tlf_alumne" placeholder="Telèfon alumne" value="<?= old('tlf_alumne'); ?>">
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control form-control-lg" name="email_alumne" placeholder="Email alumne" value="<?= old('email_alumne'); ?>">
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<div class="accordion mt-4">
<div class="accordion-item border-0 shadow-sm rounded-3">

<div class="accordion-body">

<h5 class="text-secondary mb-3">Dades del tutor legal</h5>

<div class="mb-3">
    <label class="form-label">Tipo de tutor</label>
    <select class="form-select" name="tipo_tutor">
        <option value="">Seleccione</option>
        <option value="padre">Padre</option>
        <option value="madre">Madre</option>
        <option value="tutor_legal">Tutor legal</option>
        <option value="otro">Otro</option>
    </select>
</div>

<div class="row g-3 mb-3">
    <div class="col-md-6">
        <input type="text" class="form-control" name="tutor_nombre" placeholder="Nombre" value="<?= old('tutor_nombre'); ?>">
    </div>
    <div class="col-md-6">
        <input type="text" class="form-control" name="tutor_apellidos" placeholder="Apellidos" value="<?= old('tutor_apellidos'); ?>">
    </div>
</div>

<div class="row g-3 mb-3">
    <div class="col-md-4">
        <input type="text" class="form-control" name="tutor_dni" placeholder="DNI" value="<?= old('tutor_dni'); ?>">
    </div>
    <div class="col-md-4">
        <input type="tel" class="form-control" name="tutor_telefono" placeholder="Teléfono" value="<?= old('tutor_telefono'); ?>">
    </div>
    <div class="col-md-4">
        <input type="email" class="form-control" name="tutor_email" placeholder="Email" value="<?= old('tutor_email'); ?>">
    </div>
</div>


                <div class="text-end">
                    <button type="submit" class="btn btn-primary btn-lg px-5 rounded-3">
                        SEGUIENTE
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>
<script>
document.getElementById("fechaNacimiento").addEventListener("change", function () {
    const fecha = new Date(this.value);
    const hoy = new Date();

    let edad = hoy.getFullYear() - fecha.getFullYear();
    const m = hoy.getMonth() - fecha.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < fecha.getDate())) {
        edad--;
    }

    const bloque = document.getElementById("bloqueTutor");

    if (edad < 18) {
        bloque.style.display = "block";
    } else {
        bloque.style.display = "none";
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>