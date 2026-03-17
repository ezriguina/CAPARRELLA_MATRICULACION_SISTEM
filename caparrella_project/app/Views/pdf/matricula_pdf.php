<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
/* Fuente general */
body {
    font-family: DejaVu Sans, Arial, sans-serif;
    margin: 30px;
    color: #333;
}

/* Cabecera con logo */
.header {
    display: flex;
    align-items: center;
    margin-bottom: 30px;
}

/* Logo */
.logo {
    width: 120px;
    height: auto;
}

/* Título principal */
.title {
    font-size: 26px;
    font-weight: bold;
    margin-left: 20px;
    color: #0056b3; /* color del logo principal */
}

/* Tabla de información */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
}

/* Celdas */
td {
    padding: 12px 15px;
    border: 1px solid #ddd;
}

/* Etiquetas de la tabla */
.label {
    background-color: #f0f4f8; /* color suave acorde al logo */
    font-weight: bold;
    width: 40%;
}

/* Texto del cuerpo */
p {
    font-size: 15px;
    line-height: 1.5;
}

/* Botón descargar */
.btn {
    display: inline-block;
    padding: 10px 18px;
    background-color: #0056b3; /* color principal del logo */
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 20px;
    font-weight: bold;
}

.btn:hover {
    background-color: #003d80; /* color más oscuro para hover */
}
</style>
</head>
<body>

<div class="header">
    <img src="<?= base_url('img/logo-removebg-preview.png') ?>" alt="Logo" class="logo">
    <div class="title">Confirmación de Matrícula</div>
</div>

<p><strong>Fecha:</strong> <?= date('d/m/Y') ?></p>

<table>
<tr>
    <td class="label">Alumno</td>
    <td><?= esc($alumne['Nom_alumne']) ?></td>
</tr>
<tr>
    <td class="label">Correo</td>
    <td><?= esc($alumne['correo_alumne']) ?></td>
</tr>
<tr>
    <td class="label">Curso</td>
    <td><?= esc($curs['Nom_curs']) ?></td>
</tr>
<tr>
    <td class="label">Código curso</td>
    <td><?= esc($curs['codigo_curs']) ?></td>
</tr>
<tr>
    <td class="label">Precio</td>
    <td><?= esc($curs['precio']) ?> €</td>
</tr>
</table>

<p>Este documento confirma que el alumno ha realizado el proceso de matrícula.</p>

<a class="btn" href="<?= base_url('matricula/pago/pdf')?>" target="_blank">
    Descargar justificante de matrícula
</a>

</body>
</html>