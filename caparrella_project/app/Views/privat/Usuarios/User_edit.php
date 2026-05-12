<?= $this->extend('/privat/layout') ?>

<?= $this->section('content') ?>

<div class="container py-5">

    <div class="mb-4">
        <a href="<?= base_url('/privat/Users/list') ?>" class="btn btn-outline-secondary">← Volver</a>
    </div>

    <div class="card shadow-sm p-4">
        
        <h2 class="mb-4">Editar usuario</h2>

        <form action="<?= base_url('privat/Users/edit/' . $user['id']) ?>" method="post">
        <?= csrf_field(); ?> 

        <div style="color: red;">
            <?= validation_list_errors() ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" value="<?= esc($user['name']) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?= esc($user['email']) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Nueva contraseña</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Rol</label>
            <select name="role" class="form-select">
                <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>Usuario</option>
                <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Administrador</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Estado</label>
            <select name="active" class="form-select">
                <option value="1" <?= $user['active'] == 1 ? 'selected' : '' ?>>Activo</option>
                <option value="0" <?= $user['active'] == 0 ? 'selected' : '' ?>>Inactivo</option>
            </select>
        </div>

        <div class="d-grid mt-4">
            <button type="submit" class="btn btn-primary">
                Guardar cambios
            </button>
        </div>

        </form>

    </div>

</div>

<?= $this->endSection() ?>