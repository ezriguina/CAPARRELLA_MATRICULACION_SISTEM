<?= $this->extend('privat/layout') ?>

<?= $this->section('content') ?>
<style>
.card {
    transition: all 0.2s ease-in-out;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

</style>
<div class="container py-4">
    <div class="mb-4">
        <img src="<?= base_url('img/logo.jpg') ?>" alt="">
    </div>
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Dashboard <?= date('Y') ?></h2>
        <p class="text-muted">Resumen general del sistema</p>
    </div>
     
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">

                    <div class="mb-2">
                        <i class="fa fa-layer-group fa-2x text-primary"></i>
                    </div>

                    <h5 class="text-muted">Tandadas</h5>

                    <h2 class="fw-bold text-primary">
                        <?= esc($totalTandadas) ?>
                    </h2>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">

                    <div class="mb-2">
                        <i class="fa fa-book fa-2x text-success"></i>
                    </div>

                    <h5 class="text-muted">Cursos</h5>

                    <h2 class="fw-bold text-success">
                        <?= esc($totalCursos) ?>
                    </h2>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">

                    <div class="mb-2">
                        <i class="fa fa-users fa-2x text-warning"></i>
                    </div>

                    <h5 class="text-muted">Usuarios</h5>

                    <h2 class="fw-bold text-warning">
                        0
                    </h2>

                </div>
            </div>
        </div>

    </div>

</div>

<?= $this->endSection() ?>