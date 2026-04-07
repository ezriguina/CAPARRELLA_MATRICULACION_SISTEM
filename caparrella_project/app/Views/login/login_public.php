<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Portal de Acceso · Matrícula Segura</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap 5 + Iconos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: radial-gradient(circle at 10% 30%, #f0f4ff, #e0e8ff);
            font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar más premium */
        .navbar-premium {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.03), 0 1px 0 rgba(0, 0, 0, 0.02);
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.7);
        }

        .brand-logo {
            transition: transform 0.2s ease;
        }
        .brand-logo:hover {
            transform: scale(1.02);
        }
        .brand-text {
            font-weight: 700;
            background: linear-gradient(135deg, #1e3a8a, #2563eb);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            letter-spacing: -0.3px;
        }

        /* Glassmorphism principal */
        .glass-card {
            border-radius: 2rem;
            background: rgba(255, 255, 255, 0.45);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 20px 45px -12px rgba(0, 0, 0, 0.2), inset 0 1px 0 rgba(255,255,255,0.6);
            overflow: hidden;
            transition: all 0.2s;
        }

        /* Panel izquierdo con imagen y gradiente moderno */
        .hero-side {
            background: linear-gradient(125deg, #1e2b6e, #2563eb);
            padding: 2.8rem 2rem;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            z-index: 1;
        }
        .hero-side::before {
            content: "";
            position: absolute;
            inset: 0;
            background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI4MCIgaGVpZ2h0PSI4MCIgdmlld0JveD0iMCAwIDQwIDQwIj48cGF0aCBmaWxsPSIjZmZmIiBmaWxsLW9wYWNpdHk9IjAuMDYiIGQ9Ik0wIDBoNDB2NDBIMHoiLz48cGF0aCBkPSJNMjAgMnY0TTIgMjBoNE0zNiAyMGg0TTIwIDM2djQiLz48L3N2Zz4=');
            opacity: 0.2;
            pointer-events: none;
        }
        .hero-side img {
            max-width: 110px;
            filter: drop-shadow(0 8px 12px rgba(0,0,0,0.2));
            margin-bottom: 1.5rem;
            background: rgba(255,255,255,0.1);
            border-radius: 60px;
            padding: 0.5rem;
        }
        .hero-side h4 {
            font-weight: 700;
            font-size: 1.8rem;
            letter-spacing: -0.3px;
        }
        .hero-side p {
            font-weight: 400;
            opacity: 0.9;
            max-width: 85%;
            margin-top: 0.8rem;
        }

        /* Panel formulario más limpio */
        .form-side {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(8px);
            padding: 2.8rem 2.2rem;
        }

        .form-title {
            font-weight: 700;
            color: #0f2b4d;
            margin-bottom: 1.8rem;
            font-size: 1.7rem;
            letter-spacing: -0.2px;
            border-left: 5px solid #2563eb;
            padding-left: 1rem;
        }

        /* Inputs con diseño más fresco */
        .custom-input {
            border-radius: 1.2rem;
            padding: 0.8rem 1.2rem;
            border: 1px solid #e2e8f0;
            background: white;
            transition: all 0.2s;
            font-size: 0.95rem;
        }
        .custom-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59,130,246,0.15);
            outline: none;
        }

        .input-icon-group {
            position: relative;
        }
        .input-icon-group .form-control {
            padding-left: 2.6rem;
        }
        .input-icon-group i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1.1rem;
        }

        /* Botón elegante */
        .btn-gradient {
            background: linear-gradient(95deg, #1e40af, #3b82f6);
            border: none;
            border-radius: 1.8rem;
            padding: 0.8rem;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.25s;
            box-shadow: 0 4px 8px rgba(37,99,235,0.2);
        }
        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 20px -8px rgba(37,99,235,0.4);
            background: linear-gradient(95deg, #1e3a8a, #2563eb);
        }

        /* Alertas de validación (respetan funcionalidad) */
        .validation-errors {
            background: rgba(220, 38, 38, 0.1);
            backdrop-filter: blur(4px);
            border-left: 4px solid #dc2626;
            padding: 0.7rem 1rem;
            border-radius: 1rem;
            font-size: 0.85rem;
            color: #991b1b;
            margin-bottom: 1rem;
        }
        .footer-note {
            font-size: 0.75rem;
            color: #4b5563;
            text-align: center;
            border-top: 1px solid rgba(0,0,0,0.05);
            padding-top: 1.2rem;
            margin-top: 1rem;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-side {
                padding: 2rem 1.5rem;
            }
            .form-side {
                padding: 2rem 1.5rem;
            }
            .form-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

<!-- NAVBAR MEJORADA - SIN AFECTAR FUNCIONALIDAD -->
<nav class="navbar-premium">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2 brand-logo text-decoration-none" href="#">
            <img src="<?= base_url('img/logo-removebg-preview.png') ?>" alt="Logo institucional" height="44" class="me-1">
            <span class="fw-bold brand-text fs-5">Matrícula <span style="color:#1e3a8a;">Inteligente</span></span>
        </a>
        <div class="d-none d-md-block">
            <span class="badge bg-light text-dark rounded-pill px-3 py-2 shadow-sm"><i class="bi bi-shield-check"></i> Entorno seguro</span>
        </div>
    </div>
</nav>

<!-- CONTENEDOR PRINCIPAL -->
<div class="container d-flex justify-content-center align-items-center flex-grow-1 py-4 py-md-5">
    <div class="glass-card w-100" style="max-width: 1100px;">
        <div class="row g-0">
            
            <!-- Panel izquierdo - Bienvenida visual -->
            <div class="col-md-5 hero-side">
                <img src="<?= base_url('img/logo-removebg-preview.png') ?>" alt="Logo academia">
                <h4>Bienvenido de nuevo</h4>
                <p>Accede al ecosistema de matrícula con tus credenciales institucionales. Seguro, rápido y sin complicaciones.</p>
                <div class="mt-3 d-flex gap-2 justify-content-center">
                    <span class="badge bg-white text-primary rounded-pill px-3"></span>
                    <span class="badge bg-white text-primary rounded-pill px-3"></span>
                </div>
            </div>

            <div class="col-md-7 form-side">
                <div class="form-title">
                    <i></i> Inicio de sesión
                </div>

                <form action="<?= base_url('public/login') ?>" method="post">
                    <?= csrf_field(); ?>

                   
                   <?= validation_list_errors() ?>  
                    <div class="mb-4">
                        <label class="form-label fw-semibold text-secondary"><i class="bi bi-envelope"></i> Correo electrónico</label>
                        <div class="input-icon-group">
                            <i class="bi bi-envelope-fill"></i>
                            <input type="email" 
                                   class="form-control custom-input" 
                                   name="email" 
                                   id="email" 
                                   placeholder="nombre@correo.com"
                                   >
                        </div>
                        <div class="form-text">Usa tu correo institucional o personal registrado.</div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-secondary"><i class="bi bi-card-text"></i> DNI / NIE / PASSPORT</label>
                        <div class="input-icon-group">
                            <i class="bi bi-person-badge"></i>
                            <input type="text" 
                                   class="form-control custom-input" 
                                   name="code_pass" 
                                   id="code_pass" 
                                   placeholder="Ej: 12345678A / X1234567L"
                                   >
                        </div>
                        <div class="form-text">Documento de identidad oficial.</div>
                    </div>

                    <div class="d-grid mt-4">
                        <button class="btn btn-gradient btn-lg" type="submit">
                            <i class="bi bi-key-fill me-2"></i> Acceder al sistema
                        </button>
                    </div>
                    
                </form>

                <div class="footer-note">
                    <i class="bi bi-shield-lock-fill me-1"></i> Plataforma validada · 
                    © <?= date('Y') ?> Instituto Caparrella · Todos los derechos reservados
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (opcional, solo para interacciones visuales sin afectar backend) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>