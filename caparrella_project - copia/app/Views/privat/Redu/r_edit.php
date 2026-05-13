<?= $this->extend('privat/layout') ?>
<?= $this->section('content') ?>

<div class="container py-4">

<h2>Editar Reducción</h2>

<form method="post" enctype="multipart/form-data"
action="<?= base_url('privat/Reducciones/update/'.$reduccion['id_reduccion']) ?>">

<input type="text" name="nombre" class="form-control mb-2"
value="<?= esc($reduccion['nombre']) ?>">

<input type="number" name="precio" class="form-control mb-2"
value="<?= esc($reduccion['precio']) ?>">

<input type="file" name="documento" class="form-control mb-2">

<button class="btn btn-success">Actualizar</button>

</form>

</div>

<?= $this->endSection() ?>