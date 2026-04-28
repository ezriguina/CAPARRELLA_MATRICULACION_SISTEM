<?= $this->extend('privat/layout') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="container py-4">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h2 class="fw-bold mb-1">Usuarios</h2>
            <p class="text-muted mb-0">Gestión de usuarios del sistema</p>
        </div>

        <a href="<?= base_url('privat/Users/create') ?>" class="btn btn-primary shadow-sm">
            <i class="fa fa-plus me-1"></i> Nuevo Usuario
        </a>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">    
            <form action="<?= base_url('/privat/user/search') ?>" method="GET">
                <div class="row g-2 justify-content-center">
                    <div class="col-md-6">
                        <input 
                            type="text" 
                            name="keyword" 
                            value="<?= esc($keyword ?? '') ?>" 
                            placeholder="Buscar usuario..." 
                            class="form-control"
                        >
                    </div>
                    <div class="col-md-auto">
                        <button type="submit" class="btn btn-outline-primary w-100">
                            <i class="fa fa-search me-1"></i> Buscar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Fecha creación</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach($usuarios as $user): ?>
                        <tr> 
                            <td><?= esc($user['id']) ?></td>
                            <td><?= esc($user['name']) ?></td>
                            <td><?= esc($user['email']) ?></td>
                            <td><?= esc($user['role']) ?></td>

                            <td>
                                <?php if ($user['active'] == 1): ?>
                                    <span style="color:green;">Activo</span>
                                <?php else: ?>
                                    <span style="color:red;">Inactivo</span>
                                <?php endif; ?>
                            </td>

                            <td><?= esc($user['created_at']) ?></td>

                            <td class="text-center">

                                <button 
                                    onclick="document.getElementById('modal-<?= esc($user['id']) ?>').style.display='block'" 
                                    class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-eye">Ver</i>
                                </button>

                                <a href="<?= base_url('privat/Users/edit/' . esc($user['id'])) ?>" 
                                   class="btn btn-sm btn-outline-warning">
                                    Editar
                                </a>

                                <form action="<?= base_url('privat/Users/eliminar/' . esc($user['id'])) ?>" method="post" style="display:inline;">
                                    <?= csrf_field() ?>
                                    <button type="submit" 
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('¿Eliminar usuario?');">
                                        Eliminar
                                    </button>
                                </form>

                            </td>
                        </tr>

                        <div id="modal-<?= esc($user['id']) ?>" 
                            class="w3-modal" 
                            style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.5);">

                            <div class="w3-modal-content w3-animate-top w3-card-4" 
                                style="margin:auto; margin-top:10%; width:50%; padding:20px; border-radius:10px; background:#fff;">

                                <header class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="mb-0">Detalle Usuario</h4>

                                    <button 
                                        onclick="document.getElementById('modal-<?= esc($user['id']) ?>').style.display='none'" 
                                        class="btn btn-sm btn-danger">
                                        ✕
                                    </button>
                                </header>

                                <hr>

                                <p><strong>ID:</strong> <?= esc($user['id']) ?></p>
                                <p><strong>Nombre:</strong> <?= esc($user['name']) ?></p>
                                <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
                                <p><strong>Rol:</strong> <?= esc($user['role']) ?></p>

                                <p>
                                    <strong>Estado:</strong>
                                    <?php if ($user['active'] == 1): ?>
                                        <span style="color:green;">Activo</span>
                                    <?php else: ?>
                                        <span style="color:red;">Inactivo</span>
                                    <?php endif; ?>
                                </p>

                                <p><strong>Creado:</strong> <?= esc($user['created_at']) ?></p>
                                <p><strong>Actualizado:</strong> <?= esc($user['updated_at']) ?></p>

                            </div>
                        </div>

                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

<?= $this->endSection() ?>