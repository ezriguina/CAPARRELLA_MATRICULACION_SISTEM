<?php // Layout mejorado con sidebar moderno ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panel Privado</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      min-height: 100vh;
      background-color: #f8f9fa;
    }

    #sidebar {
      width: 260px;
      background: #111827;
      color: #fff;
    }

    #sidebar .nav-link {
      color: #cbd5e1;
      border-radius: 8px;
      padding: 10px 15px;
      transition: all 0.2s ease;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    #sidebar .nav-link:hover {
      background-color: #1f2937;
      color: #fff;
    }

    #sidebar .nav-link.active {
      background-color: #0d6efd;
      color: #fff;
      font-weight: 500;
    }

    #sidebar .logo img {
      max-width: 140px;
    }

    .topbar {
      background: #fff;
      border-bottom: 1px solid #dee2e6;
      padding: 10px 20px;
    }

    .content {
      padding: 25px;
    }
  </style>
</head>

<body>
<div class="d-flex">

  <!-- SIDEBAR -->
  <nav id="sidebar" class="vh-100 p-3 d-flex flex-column">
    
    <div class="logo text-center mb-4">
      <a href="<?= base_url('privat/Dashboard/Instiut-Caparrella') ?>">
      <img src="<?= base_url('img/logo-removebg-preview.png') ?>" alt="Logo">
      </a>
    </div>
     
    <ul class="nav nav-pills flex-column mb-auto">
      
      <li class="nav-item mb-2">
        <a class="nav-link" href="<?= base_url('privat/education') ?>">
          <i class="bi bi-diagram-3"></i> Estructuras
        </a>
      </li>

      <li class="nav-item mb-2">
        <a class="nav-link" href="<?= base_url('privat/historial') ?>">
          <i class="bi bi-clock-history"></i> Historial
        </a>
      </li>

      <li class="nav-item mb-2">
        <a class="nav-link" href="<?= base_url('privat/expedientes') ?>">
          <i class="bi bi-folder"></i> Expedientes
        </a>
      </li>

      <li class="nav-item mb-2">
        <a class="nav-link" href="<?= base_url('privat/validados') ?>">
          <i class="bi bi-check-circle"></i> Validados
        </a>
      </li>

      <li class="nav-item mb-2">
        <a class="nav-link" href="<?= base_url('privat/Tandada') ?>">
          <i class="bi bi-gear"></i> Gestión de Tandadas
        </a>
      </li>

      <li class="nav-item mb-2">
        <a class="nav-link" href="<?= base_url('privat/mensatges') ?>">
          <i class="bi bi-chat-dots"></i> Mensajes
        </a>
      </li>

    </ul>

    <div class="mt-auto small text-center text-secondary">
      © <?= date('Y') ?>
    </div>

  </nav>

  <div class="flex-grow-1 d-flex flex-column">

    <div class="topbar d-flex justify-content-between align-items-center">
      <h6 class="mb-0">Panel Privado</h6>

      <div class="d-flex align-items-center gap-3">
        <span class="text-muted">Usuario</span>
        <a href="<?= base_url('logout') ?>" class="btn btn-sm btn-outline-danger">
          <i class="bi bi-box-arrow-right"></i>
        </a>
      </div>
    </div>

    <main class="content">
      <?= $this->renderSection('content') ?>
    </main>

  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>