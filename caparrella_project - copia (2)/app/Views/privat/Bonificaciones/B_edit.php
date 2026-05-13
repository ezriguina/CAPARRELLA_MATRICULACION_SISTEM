<?= $this->extend('privat/layout') ?>
<?= $this->section('content') ?>

<div class="container py-4">

<h2>Editar Bonificación</h2>

<form method="post" action="<?= base_url('privat/Bonificaciones/update/'.$bonificacion['id_bonificacion']) ?>">

<input type="text" name="nombre" class="form-control mb-2"
value="<?= esc($bonificacion['nombre']) ?>">

<input type="number" name="precio" class="form-control mb-2"
value="<?= esc($bonificacion['precio']) ?>">

<select name="id_curso" class="form-control mb-2">
<?php foreach($cursos as $c): ?>
<option value="<?= $c['id_curs'] ?>"
<?= $bonificacion['id_curso'] == $c['id_curs'] ? 'selected' : '' ?>>
<?= $c['Nom_curs'] ?>
</option>
<?php endforeach; ?>
</select>

<button class="btn btn-success">Actualizar</button>

</form>

</div>

<?= $this->endSection() ?>