<?= $this->extend('privat/layout') ?>
<?= $this->section('content') ?>

<div class="container py-4">

<h2>Bonificaciones</h2>

<a href="<?= base_url('privat/Bonificaciones/create') ?>" class="btn btn-primary mb-3">
    Nueva Bonificación
</a>

<table class="table table-hover">
<tr>
<th>Nombre</th>
<th>Precio</th>
<th>Curso</th>
<th></th>
</tr>

<?php foreach($bonificaciones as $b): ?>
<tr>
<td><?= esc($b['nombre']) ?></td>
<td><?= esc($b['precio']) ?>€</td>
<td><?= esc($b['Nom_curs']) ?></td>
<td>
<a href="<?= base_url('privat/Bonificaciones/view/'.$b['id_bonificacion']) ?>" class="btn btn-info btn-sm">Ver</a>
<a href="<?= base_url('privat/Bonificaciones/edit/'.$b['id_bonificacion']) ?>" class="btn btn-warning btn-sm">Editar</a>
<a href="<?= base_url('privat/Bonificaciones/delete/'.$b['id_bonificacion']) ?>" class="btn btn-danger btn-sm">Eliminar</a>
</td>
</tr>
<?php endforeach; ?>

</table>

<?= $this->endSection() ?>