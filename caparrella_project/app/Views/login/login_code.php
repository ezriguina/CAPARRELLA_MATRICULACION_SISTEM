<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<title>Acceso con código</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:linear-gradient(135deg,#0a4fbf,#16c172);
min-height:100vh;
font-family:"Segoe UI",Arial,sans-serif;
display:flex;
flex-direction:column;
}

.navbar{
background:white;
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

.form-control{
padding:12px;
border-radius:8px;
}

.btn-primary{
padding:12px;
font-weight:600;
border-radius:8px;
}

.btn-secondary{
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

<h4>Acceso con código</h4>

<p class="mt-3">
Solo los alumnos que han realizado la preinscripción
pueden acceder al proceso de matrícula utilizando
el código proporcionado por el instituto.
</p>

</div>

<!-- PANEL DERECHO -->

<div class="col-md-7 form-panel">

<h4 class="mb-4">Acceso a matrícula</h4>

<form action="<?= base_url('public/login_code') ?>" method="post">

<?= csrf_field(); ?>

<?= validation_list_errors() ?>

<div class="mb-3">

<label class="form-label">Código de acceso</label>

<input
type="password"
class="form-control"
name="code_pass"
placeholder="Introduce tu código"
required>

</div>

<div class="mb-4">

<a class="btn btn-secondary w-100"
href="<?= base_url('public/recibir_codigo') ?>">

Obtener nuevo código de acceso

</a>

</div>

<div class="d-grid">

<button class="btn btn-primary btn-lg">
Acceder al sistema
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