<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
       body {
    height: 100vh;
    margin: 0;
    background: linear-gradient(135deg, #bdc8d8, #0b5ed7);
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Capa blur encima del fondo */
body::before {
    content: "";
    position: absolute;
    inset: 0;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
}

.login-card {
    position: relative;
    z-index: 1;
    width: 100%;
    max-width: 400px;
    border-radius: 15px;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border: 1px solid rgba(255,255,255,0.2);
    box-shadow: 0 8px 32px rgba(0,0,0,0.2);
}
        .logo {
            max-width: 160px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
        }

        .btn-primary {
            border-radius: 8px;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">

    <div class="card login-card shadow-lg border-0 text-center p-4">

        <div class="mb-3">
            <img src="<?= base_url('img/logo-removebg-preview.png') ?>" class="logo" alt="Company Logo">
        </div>

        <h5 class="mb-3">Iniciar sesión</h5>

        <form action="<?= base_url('Admin/Auth/Login') ?>" method="post">
            <?= csrf_field(); ?>
            <?= validation_list_errors() ?>

            <div class="mb-3 text-start">
                <label class="form-label">Usuari</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" name="email" class="form-control" placeholder="correo" >
                </div>
            </div>

            <div class="mb-3 text-start">
                <label class="form-label">Contrasenya</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="••••••" >
                </div>
            </div>
     
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger text-center">
                    <?= session('error') ?>
                </div>
            <?php endif; ?>

            <div class="d-grid mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-box-arrow-in-right"></i> Entrar
                </button>
            </div>

        </form>

        <div class="mt-3 small text-muted">
            © <?= date('Y') ?> instut caparrella
        </div>

    </div>

</body>
</html>