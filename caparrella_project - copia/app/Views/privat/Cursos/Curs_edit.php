<?= $this->extend('privat/layout') ?>

<?= $this->section('content') ?>

<div class="container py-4">

    <div class="mb-4">
        <h2 class="fw-bold mb-1">Editar Curso</h2>
        <p class="text-muted mb-0">Modifica los datos del curso</p>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form method="post" action="<?= base_url('privat/cursos/update/'.$curso['id_curs']) ?>">
                
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input 
                        type="text" 
                        name="Nom_curs" 
                        class="form-control"
                        value="<?= esc($curso['Nom_curs']) ?>" 
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Código</label>
                    <input 
                        type="text" 
                        name="codigo_curs" 
                        class="form-control"
                        value="<?= esc($curso['codigo_curs']) ?>" 
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Precio (€)</label>
                    <input 
                        type="number" 
                        name="precio" 
                        class="form-control"
                        value="<?= esc($curso['precio']) ?>" 
                        step="0.01"
                        required>
                </div>

                <div class="d-flex justify-content-between mt-4">

                    <a href="<?= base_url('privat/cursos') ?>" class="btn btn-secondary">
                        Volver
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Actualizar Curso
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

<?= $this->endSection() ?>