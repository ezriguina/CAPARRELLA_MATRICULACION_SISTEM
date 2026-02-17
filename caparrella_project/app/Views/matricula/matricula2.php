<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>matricula dades curs</title>
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
<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <span class="navbar-brand mb-0 h1">Proces de Matricula</span>
    </div>
</nav>

<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-5">
            <h4 class="mb-4 text-primary">Dades del curs </h4>

            <form action="<?= base_url('matricula/datos_alumne') ?>" method="post">
            <?= csrf_field();?>
            <?=  validation_list_errors() ?> 

                <div class="row g-3 mb-4">
                    <div class="col-md-8">
                        <label for="">Tipo de matricula </label>
                        <select name="curs_tipo" id="curs_tipo">
                            <option value=" MATRICULA CONTINUIDAD ">DAW</option>
                            <option value=" MATRICULA NORMAL ">DAM</option>
                            <option value="">ASIX</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">curso </label>
                        <select name="curs_tipo" id="curs_tipo">
                            <option value="  "></option>
                            <option value=" ">MATRICULA NORMAL</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold d-block">Sistema sanitari</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="TSI" value="TSI">
                        <label class="form-check-label">TSI (Seguretat Social)</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="mutua" value="Mutua">
                        <label class="form-check-label">Mutua</label>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Poblacio de naixement</label>
                        <input type="text" class="form-control form-control-lg" name="Poblacio">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Data de naixement</label>
                        <input type="date" class="form-control form-control-lg" name="data_nacimiento">
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-8">
                        <label class="form-label fw-semibold">Domicili familiar</label>
                        <input type="text" class="form-control form-control-lg" name="domicili">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Telefon familiar </label>
                        <input type="tel" class="form-control form-control-lg" name="tlf_familiar">
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-8">
                        <label class="form-label fw-semibold">Municipi</label>
                        <input type="text" class="form-control form-control-lg" name="municipi">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Codi Postal</label>
                        <input type="text" class="form-control form-control-lg" name="codi_postal">
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Telefon alumne/a</label>
                        <input type="tel" class="form-control form-control-lg" name="tlf_alumne">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Correu electronic alumne/a</label>
                        <input type="email" class="form-control form-control-lg" name="email_alumne">
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

</body>
</html>