<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<title>Acceso a matrícula</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background: linear-gradient(135deg,#0a4fbf,#16c172);
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
alt="Logo"
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

<h4>Bienvenido</h4>

<p class="mt-3">
Acceda al sistema de matrícula introduciendo su correo electrónico
y su documento de identificación.
</p>

</div>

<!-- PANEL DERECHO -->

<div class="col-md-7 form-panel">

<h4 class="mb-4">Acceso al sistema</h4>

<form action="<?= base_url('public/login') ?>" method="post">

<?= csrf_field(); ?>

<?= validation_list_errors() ?>

<div class="mb-3">

<label class="form-label">Correo electrónico</label>

<input
type="email"
class="form-control"
name="email"
placeholder="nombre@correo.com"
required>

</div>

<div class="mb-4">

<label class="form-label">DNI / NIE / PASSPORT</label>

<input
type="text"
class="form-control"
name="code_pass"
placeholder="Introduce tu documento"
required>

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