<?= $this->extend('privat/layout') ?>
<?= $this->section('content') ?>

<div class="container py-4">

<h2>Crear Bonificación</h2>

<form method="post" action="<?= base_url('privat/Bonificaciones/post') ?>">

<input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre">

<input type="number" name="precio" class="form-control mb-2" placeholder="Precio">

<select name="id_curso" class="form-control mb-2">
<?php foreach($cursos as $c): ?>
<option value="<?= $c['id_curs'] ?>"><?= $c['Nom_curs'] ?></option>
<?php endforeach; ?>
</select>

<button class="btn btn-success">Guardar</button>

</form>

</div>

<?= $this->endSection() ?>