<?= $this->extend('privat/layout') ?>

<?= $this->section('content') ?>

<div class="container py-4">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h2 class="fw-bold mb-1">Tandadas <?= date('Y') ?></h2>
            <p class="text-muted mb-0">Gestión y seguimiento de tandadas</p>
        </div>

        <a href="<?= base_url('/privat/Tandada/create') ?>" class="btn btn-primary shadow-sm">
            <i class="fa fa-plus me-1"></i> Nueva Tandada 
        </a>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">    
            <form action="<?= base_url('/admin/galeria/searchGaleriaCrud') ?>" method="GET">
                <div class="row g-2 justify-content-center">
                    <div class="col-md-6">
                        <input 
                            type="text" 
                            name="keyword" 
                            value="<?= esc($keyword ?? '') ?>" 
                            placeholder="Buscar tandada..." 
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
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($tandada as $tandada) :?>
                            <tr> 
                                <th><?= esc($tandada['id_tandada']) ?></th>
                                <th><?= esc($tandada['nom_tandada']) ?></th>
                                <th><?= esc($tandada['fecha_inici']) ?></th>
                                <th><?= esc($tandada['fecha_fin']) ?></th>
                                <?php if ($tandada['estado'] == 1): ?>
                               <th style="color: green;">Active</th>
                               <?php elseif ($tandada['estado'] == 0): ?>
                               <th style="color: red;">Desactivado</th>
                               <?php endif; ?><th>
    <?= esc($tandada['id_tandada']) ?>

    <a href="/tandada/ver/<?= esc($tandada['id_tandada']) ?>" 
       class="btn btn-sm btn-primary">
        Ver
    </a>
    
    <a href="/tandada/editar/<?= esc($tandada['id_tandada']) ?>" 
       class="btn btn-sm btn-warning">
        Editar
    </a>

    <a href="/tandada/eliminar/<?= esc($tandada['id_tandada']) ?>" 
       class="btn btn-sm btn-danger"
       onclick="return confirm('¿Seguro que quieres eliminar?');">
        Eliminar
    </a>
</th>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

        </div>
    </div>

</div>

<?= $this->endSection() ?>
