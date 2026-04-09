<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<title>Requisitos de Matrícula · Matrícula Segura</title>
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

/* NAVBAR */
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

/* CARD */
.glass-card{
border-radius:2rem;
background:rgba(255,255,255,0.45);
backdrop-filter:blur(20px);
border:1px solid rgba(255,255,255,0.5);
box-shadow:0 20px 45px rgba(0,0,0,0.2);
overflow:hidden;
}

/* LEFT */
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

/* RIGHT */
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
             
/* CHECKBOXES BONITOS */
.form-check{
background:white;
border-radius:1rem;
padding:0.8rem 1rem;
margin-bottom:12px;
border:1px solid #e5e7eb;
transition:0.2s;
}

.form-check:hover{
border-color:#3b82f6;
box-shadow:0 0 0 3px rgba(59,130,246,0.1);
}

/* BOTÓN */
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

<!-- CONTENIDO -->
<div class="container d-flex justify-content-center align-items-center flex-grow-1 py-5">

<div class="glass-card w-100" style="max-width:1000px;">

<div class="row g-0">

<!-- IZQUIERDA -->
<div class="col-md-5 hero-side">

<img src="<?= base_url('img/logo-removebg-preview.png') ?>">

<h4>Requisitos de matrícula</h4>

<p class="mt-3">
Verifica que dispones de toda la documentación necesaria antes de iniciar el proceso.
</p>

</div>

<!-- DERECHA -->
<div class="col-md-7 form-side">

<div class="form-title">
<i class="bi bi-check2-square"></i> Comprobación de documentación
</div>

<form action="<?= base_url('matricula') ?>" method="post">

<?= csrf_field(); ?>
<?= validation_list_errors() ?>

<div class="form-check">
<input class="form-check-input" type="checkbox" id="check1" name="check1">
<label class="form-check-label" for="check1">
Fotografía del DNI (anverso y reverso)
</label>
</div>

<div class="form-check">
<input class="form-check-input" type="checkbox" id="check2" name="check2">
<label class="form-check-label" for="check2">
Documentación de familia numerosa
</label>
</div>

<div class="form-check">
<input class="form-check-input" type="checkbox" id="check3" name="check3">
<label class="form-check-label" for="check3">
Certificado de discapacidad (si aplica)
</label>
</div>

<div class="form-check mb-4">
<input class="form-check-input" type="checkbox" id="check4" name="check4">
<label class="form-check-label" for="check4">
Documentación académica requerida
</label>
</div>

<div class="d-grid">
<button class="btn btn-gradient btn-lg">
<i class="bi bi-arrow-right-circle me-2"></i> Empezar matriculación
</button>
</div>

</form>

<!-- 🔹 ACCESO ZONA PRIVADA -->
<div class="text-center mt-3">
<a href="<?= base_url('privat/education') ?>" class="text-decoration-none text-primary fw-semibold">
<i class="bi bi-lock-fill"></i> Acceder a zona privada
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