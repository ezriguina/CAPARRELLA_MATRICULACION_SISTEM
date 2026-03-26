<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<title>Requisitos de Matrícula</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background: #e2e8f0;
min-height:100vh;
font-family:"Segoe UI",Arial,sans-serif;
display:flex;
flex-direction:column;
}

.navbar{
background: #e2e8f0;
box-shadow:0 2px 10px rgba(0,0,0,0.05);
}

.main-card{
max-width:950px;
border-radius:16px;
overflow:hidden;
box-shadow:0 20px 40px rgba(0,0,0,0.15);
}

.left-panel{
background:linear-gradient(135deg,#0a4fbf,#1f75ff);
color:white;
display:flex;
flex-direction:column;
justify-content:center;
align-items:center;
padding:40px;
text-align:center;
}

.left-panel img{
max-width:150px;
margin-bottom:20px;
}

.left-panel h4{
font-weight:600;
}

.form-panel{
background:white;
padding:50px;
}

.form-check{
margin-bottom:15px;
}

.btn-primary{
padding:12px;
font-weight:600;
border-radius:8px;
}

.footer-text{
font-size:12px;
color:#9aa4b2;
}

</style>

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar">
<div class="container">

<a class="navbar-brand d-flex align-items-center" href="#">

<img
src="<?= base_url('img/logo-removebg-preview.png') ?>"
alt="Logo Instituto"
height="40"
class="me-2">

<strong>Proceso de Matrícula</strong>

</a>

</div>
</nav>

<!-- CONTENIDO -->

<div class="container d-flex justify-content-center align-items-center flex-grow-1">

<div class="card main-card w-100">

<div class="row g-0">

<!-- PANEL IZQUIERDO -->

<div class="col-md-5 left-panel">

<img src="<?= base_url('img/logo-removebg-preview.png') ?>" alt="logo">

<h4>Requisitos de matrícula</h4>

<p class="mt-3">
Antes de iniciar el proceso de matrícula asegúrese
de disponer de la documentación necesaria.
</p>

</div>

<!-- PANEL DERECHO -->

<div class="col-md-7 form-panel">

<h4 class="mb-4">Comprobación de documentación</h4>

<form action="<?= base_url('matricula') ?>" method="post">

<?= csrf_field(); ?>

<?= validation_list_errors() ?>

<div class="form-check">

<input class="form-check-input" type="checkbox" id="check1" name="check1">

<label class="form-check-label" for="check1">
Tengo la fotografía del DNI (anverso y reverso)
</label>

</div>

<div class="form-check">

<input class="form-check-input" type="checkbox" id="check2" name="check2">

<label class="form-check-label" for="check2">
Dispongo de documentación de familia numerosa
</label>

</div>

<div class="form-check">

<input class="form-check-input" type="checkbox" id="check3" name="check3">

<label class="form-check-label" for="check3">
Tengo certificado de discapacidad (si aplica)
</label>

</div>

<div class="form-check mb-4">

<input class="form-check-input" type="checkbox" id="check4" name="check4">

<label class="form-check-label" for="check4">
Dispongo de la documentación académica requerida
</label>

</div>

<div class="d-grid">

<button class="btn btn-primary btn-lg">
Empezar matriculación
</button>

</div>

</form>

<div class="footer-text mt-4">
© 2026 · Instituto Educativo · Todos los derechos reservados
</div>

</div>

</div>

</div>

</div>

</body>

</html>