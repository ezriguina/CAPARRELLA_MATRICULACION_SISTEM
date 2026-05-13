<?= $this->extend('privat/layout') ?>
<?= $this->section('content') ?>

<div class="container py-4">

<h2>Reducciones</h2>

<a href="<?= base_url('privat/Reducciones/create') ?>" class="btn btn-primary mb-3">
    Nueva Reducción
</a>

<table class="table">
<tr>
<th>Nombre</th>
<th>Precio</th>
<th>Documento</th>
<th></th>
</tr>

<?php foreach($reducciones as $r): ?>
<tr>
<td><?= esc($r['nombre']) ?></td>
<td><?= esc($r['precio']) ?></td>
<td>
<?php if($r['documento']): ?>
<a href="<?= base_url('uploads/reducciones/'.$r['documento']) ?>" target="_blank">Ver</a>
<?php endif; ?>
</td>
<td>
<a href="<?= base_url('privat/Reducciones/view/'.$r['id_reduccion']) ?>">Ver</a>
<a href="<?= base_url('privat/Reducciones/edit/'.$r['id_reduccion']) ?>">Editar</a>
<a href="<?= base_url('privat/Reducciones/delete/'.$r['id_reduccion']) ?>">Eliminar</a>
</td>
</tr>
<?php endforeach; ?>

</table>

<?= $this->endSection() ?>