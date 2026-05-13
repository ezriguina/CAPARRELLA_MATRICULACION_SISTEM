<?= $this->extend('privat/layout') ?>
<?= $this->section('content') ?>

<div class="container py-4">

<h2>Crear Reducción</h2>

<form method="post" enctype="multipart/form-data"
action="<?= base_url('privat/Reducciones/post') ?>">

<input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre">

<input type="number" name="precio" class="form-control mb-2" placeholder="Precio">

<input type="file" name="documento" class="form-control mb-2">

<button class="btn btn-success">Guardar</button>

</form>

</div>

<?= $this->endSection() ?>