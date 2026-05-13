<?= $this->extend('privat/layout') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
     
    <button 
    onclick="document.getElementById('modal-<?= esc($tandada['id_tandada']) ?>').style.display='block'" 
    class="btn btn-sm btn-outline-primary">
    <i class="fa fa-eye"></i> Ver
</button>
    
    <a href="<?=base_url('privat/Tandada/edit/' .esc($tandada['id_tandada']))  ?>" 
       class="btn btn-sm btn-outline-warning">
        Editar
    </a>

    <form action="<?= base_url('privat/tandada/eliminar/'. esc($tandada['id_tandada'])) ?>" method="post" style="display:inline;">
    <?= csrf_field() ?>
    <button type="submit" 
        class="btn btn-sm btn-outline-danger"
        onclick="return confirm('¿Seguro que quieres eliminar esta tandada?');">
        <i class="fa fa-trash">Eliminar</i>
    </button>
</form>
</th>
                            </tr>  

                            <div id="modal-<?= esc($tandada['id_tandada']) ?>" 
     class="w3-modal" 
     style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.5);">

    <div class="w3-modal-content w3-animate-top w3-card-4" 
         style="margin:auto; margin-top:10%; width:50%; padding:20px; border-radius:10px; background:#fff;">

        <header class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Detalle de Tandada</h4>

            <button 
                onclick="document.getElementById('modal-<?= esc($tandada['id_tandada']) ?>').style.display='none'" 
                class="btn btn-sm btn-danger">
                ✕
            </button>
        </header>

        <hr>

        <p><strong>ID:</strong> <?= esc($tandada['id_tandada']) ?></p>
        <p><strong>Nombre:</strong> <?= esc($tandada['nom_tandada']) ?></p>
        <p><strong>Fecha inicio:</strong> <?= esc($tandada['fecha_inici']) ?></p>
        <p><strong>Fecha fin:</strong> <?= esc($tandada['fecha_fin']) ?></p>

        <p>
            <strong>Estado:</strong>
            <?php if ($tandada['estado'] == 1): ?>
                <span style="color:green;">Activa</span>
            <?php else: ?>
                <span style="color:red;">Desactivada</span>
            <?php endif; ?>
        </p>

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
