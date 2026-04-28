<?= $this->extend('privat/layout') ?>

<?= $this->section('content') ?>

<div class="container py-4">

    <div class="mb-4">
        <h2 class="fw-bold">Crear Usuario</h2>
        <p class="text-muted">Añadir un nuevo usuario al sistema</p>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form action="<?= base_url('privat/Users/create') ?>" method="post">
                <?= csrf_field() ?>

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Rol</label>
                        <select name="role" class="form-select" required>
                            <option value="user">Usuario</option>
                            <option value="admin">Administrador</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Estado</label>
                        <select name="active" class="form-select">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>

                </div>

                <div class="mt-4 d-flex justify-content-between">
                    <a href="<?= base_url('privat/Users/list') ?>" class="btn btn-secondary">
                        Volver
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save me-1"></i> Guardar Usuario
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

<?= $this->endSection() ?>