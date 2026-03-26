<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <title>Pago Matrícula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        .stepper-wrapper{
            display:flex;
            justify-content:space-between;
            position:relative;
            margin-bottom:40px;
        }

        .stepper-wrapper::before{
            content:"";
            position:absolute;
            top:22px;
            left:0;
            width:100%;
            height:3px;
            background:#e2e8f0;
            z-index:0;
        }

        .step{
            text-align:center;
            z-index:1;
            width:33%;
        }

        .step-circle{
            width:45px;
            height:45px;
            border-radius:50%;
            background:#cbd5e1;
            color:white;
            display:flex;
            align-items:center;
            justify-content:center;
            margin:auto;
            font-weight:bold;
        }

        .step.active .step-circle{
            background:#0d6efd;
        }

        .step.completed .step-circle{
            background:#16c172;
        }

        .qr-img{
            width:180px;
        }

    </style>

</head>

<body class="bg-light">

<nav class="navbar navbar-dark white">
    <div class="container">

        <a class="navbar-brand d-flex align-items-center" href="#">

            <img 
                src="<?= base_url('img/logo-removebg-preview.png') ?>" 
                alt="Logo Instituto"
                height="40"
                class="me-2">Proceso de Matrícula</a>
    </div>
</nav>


<div class="container py-5">

    <div class="card shadow-lg border-0 rounded-4">

        <div class="card-body p-5">

            <div class="stepper-wrapper">

                <div class="step completed">
                    <div class="step-circle">1</div>
                    <div>Datos Alumno</div>
                </div>

                <div class="step completed">
                    <div class="step-circle">2</div>
                    <div>Curso</div>
                </div>

                <div class="step active">
                    <div class="step-circle">3</div>
                    <div>Pago</div>
                </div>

            </div>


            <h4 class="text-primary mb-4">
                Confirmación y pago
            </h4>


            <div class="card mb-4 border-0 bg-light">

                <div class="card-body">

                    <h5 class="mb-3">
                        Resumen de matrícula
                    </h5>

                    <ul class="list-group">

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Alumno</span>
                            <strong><?= esc($alumne['Nom_alumne']) ?></strong>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Email</span>
                            <strong><?= esc($alumne['correo_alumne']) ?></strong>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Curso</span>
                            <strong><?= esc($curs['Nom_curs']) ?></strong>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Código curso</span>
                            <strong><?= esc($curs['codigo_curs']) ?></strong>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total a pagar</span>
                            <strong class="text-success fs-5">
                                <?= esc($curs['precio']) ?> €
                            </strong>
                        </li>

                    </ul>

                </div>

            </div>


            <div class="card mb-4 border-0 bg-light">

                <div class="card-body">

                    <h5 class="mb-3">
                        Datos para realizar el pago
                    </h5>

                    <ul class="list-group">

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Código entidad</span>
                            <strong>0415876</strong>
                        </li>
  
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Concepto</span>
                            <strong>INGRESSOS ALUMNES</strong>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Alumno</span>
                            <strong><?= esc($alumne['Nom_alumne']) ?></strong>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Curso</span>
                            <strong><?= esc($curs['Nom_curs']) ?></strong>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Importe</span>
                            <strong class="text-success">
                                <?= esc($curs['precio']) ?> €
                            </strong>
                        </li>

                    </ul>

                </div>

            </div>


            <div class="row mb-4">


                <div class="col-md-6">

                    <div class="card h-100">

                        <div class="card-body">

                            <h6 class="text-primary">
                                Clients de CaixaBank
                            </h6>

                            <ol>
                                <li>Comptes i targetes</li>
                                <li>Transferències</li>
                                <li>Altres opcions</li>
                                <li>Pagar rebut</li>
                                <li>A una entitat (Pagament a tercers)</li>
                                <li>Introduir codi: <strong>0415876</strong></li>
                                <li>Continuar</li>
                                <li>Imprimir justificant</li>
                            </ol>

                        </div>

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="card h-100">

                        <div class="card-body text-center">

                            <h6 class="text-primary">
                                NO clients de CaixaBank
                            </h6>

                            <ol class="text-start">
                                <li>
                                    Entrar a 
                                    <a href="http://ja.cat/2526" target="_blank">
                                        ja.cat/2526
                                    </a>
                                </li>
                                <li>Introduir codi entitat: <strong>0415876</strong></li>
                                <li>Indicar import, nom alumne i curs</li>
                                <li>Imprimir justificant</li>
                            </ol>

                            <h6 class="mt-3">
                                Pagar con QR
                            </h6>

                            <img class="qr-img"  src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=http://ja.cat/2526"  alt="QR Pago">
                            <p class="text-muted mt-2">
                                Escanea el código para acceder al pago
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
      <form action="<?= base_url('matricula/pago')?>" method="post">

<?= csrf_field() ?>

<div class="d-grid mt-4">

<button class="btn btn-success btn-lg">
Confirmar La Matricula 
</button>

</div>

</form>
</div>

</body>
</html>