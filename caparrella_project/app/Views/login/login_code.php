<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Acceso con código · Matrícula Segura</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap + Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
}

body{
background: radial-gradient(circle at 10% 30%, #f0f4ff, #e0e8ff);
font-family:'Inter',system-ui;
min-height:100vh;
display:flex;
flex-direction:column;
}

/* NAVBAR PREMIUM */
.navbar-premium{
background: rgba(255,255,255,0.85);
backdrop-filter: blur(16px);
box-shadow:0 2px 12px rgba(0,0,0,0.05);
padding:0.7rem 0;
}

.brand-text{
font-weight:700;
background:linear-gradient(135deg,#1e3a8a,#2563eb);
-webkit-background-clip:text;
color:transparent;
}

/* CARD GLASS */
.glass-card{
border-radius:2rem;
background:rgba(255,255,255,0.45);
backdrop-filter:blur(20px);
border:1px solid rgba(255,255,255,0.5);
box-shadow:0 20px 45px rgba(0,0,0,0.2);
overflow:hidden;
}

/* PANEL IZQUIERDO */
.hero-side{
background:linear-gradient(125deg,#1e2b6e,#2563eb);
color:white;
display:flex;
flex-direction:column;
justify-content:center;
align-items:center;
text-align:center;
padding:2.5rem;
}

.hero-side img{
max-width:110px;
margin-bottom:1.2rem;
background:rgba(255,255,255,0.1);
border-radius:60px;
padding:0.5rem;
}

.hero-side h4{
font-weight:700;
}

/* PANEL DERECHO */
.form-side{
background:rgba(255,255,255,0.75);
backdrop-filter:blur(10px);
padding:2.5rem;
}

.form-title{
font-weight:700;
margin-bottom:1.5rem;
border-left:5px solid #2563eb;
padding-left:1rem;
color:#0f2b4d;
}

/* INPUTS */
.custom-input{
border-radius:1rem;
padding:0.8rem 1rem;
border:1px solid #e2e8f0;
}

.custom-input:focus{
border-color:#3b82f6;
box-shadow:0 0 0 4px rgba(59,130,246,0.15);
outline:none;
}

/* BOTONES */
.btn-gradient{
background:linear-gradient(95deg,#1e40af,#3b82f6);
border:none;
border-radius:1.5rem;
padding:0.8rem;
font-weight:600;
color:white;
}

.btn-gradient:hover{
transform:translateY(-2px);
background:linear-gradient(95deg,#1e3a8a,#2563eb);
}

.btn-outline-custom{
border-radius:1.5rem;
font-weight:500;
}

/* FOOTER */
.footer-note{
font-size:0.75rem;
text-align:center;
margin-top:1rem;
color:#4b5563;
}

</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar-premium">
<div class="container">
<a class="navbar-brand d-flex align-items-center gap-2 text-decoration-none" href="#">
<img src="<?= base_url('img/logo-removebg-preview.png') ?>" height="40">
<span class="brand-text">Matrícula Inteligente</span>
</a>
</div>
</nav>

<div class="container d-flex justify-content-center align-items-center flex-grow-1 py-5">

<div class="glass-card w-100" style="max-width:1000px;">

<div class="row g-0">

<div class="col-md-5 hero-side">

<img src="<?= base_url('img/logo-removebg-preview.png') ?>">

<h4>Acceso con código</h4>

<p class="mt-3">
Introduce el código enviado a tu correo para continuar con el proceso de matrícula de forma segura.
</p>

</div>

<div class="col-md-7 form-side">

<div class="form-title">
<i class="bi bi-shield-lock"></i> Verificación de acceso
</div>

<form action="<?= base_url('public/login_code') ?>" method="post">

<?= csrf_field(); ?>
<?= validation_list_errors() ?>

<div class="mb-4">

<label class="form-label fw-semibold">
<i class="bi bi-envelope"></i> Código enviado a <?= $email; ?>
</label>

<input
type="password"
class="form-control custom-input"
name="code_pass"
placeholder="Introduce tu código">

</div>

<div class="d-grid mb-3">

<button class="btn btn-gradient btn-lg">
<i class="bi bi-key-fill me-2"></i> Acceder
</button>

</div>

<div class="d-grid mb-3">

<a href="<?= base_url('public/recibir_codigo') ?>" class="btn btn-outline-secondary btn-outline-custom">
<i class="bi bi-arrow-repeat me-2"></i> Solicitar nuevo código
</a>

</div>

</form>

<div class="text-center mt-3">
<a href="<?= base_url('privat/education') ?>" class="text-decoration-none text-primary fw-semibold">
<i class="bi bi-arrow-right-circle"></i> Acceder directamente a la zona privada
</a>
</div>

<div class="footer-note">
<i class="bi bi-shield-lock-fill"></i>
© <?= date('Y') ?> Instituto Caparrella · Todos los derechos reservados
</div>

</div>

</div>

</div>

</div>

</body>
</html>