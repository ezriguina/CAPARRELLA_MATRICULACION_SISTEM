<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
body {
    font-family: DejaVu Sans, Arial, sans-serif;
    margin: 30px;
    color: #333;
}


.header {
    display: flex;
    align-items: center;
    margin-bottom: 30px;
}

.logo {
    width: 120px;
    height: auto;
}

.title {
    font-size: 26px;
    font-weight: bold;
    margin-left: 20px;
    color: #0056b3; 
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
}

td {
    padding: 12px 15px;
    border: 1px solid #ddd;
}

.label {
    background-color: #f0f4f8; 
    font-weight: bold;
    width: 40%;
}


p {
    font-size: 15px;
    line-height: 1.5;
}

.btn {
    display: inline-block;
    padding: 10px 18px;
    background-color: #0056b3; 
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 20px;
    font-weight: bold;
}

.btn:hover {
    background-color: #003d80;
}
</style>
</head>
<body>

<div class="header">
    <img src="<?= base_url('img/logo_cp') ?>" alt="Logo" class="logo">
    <div class="title">Confirmación de Matrícula</div>
</div>

<p><strong>Fecha:</strong> <?= date('d/m/Y') ?></p>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Matrícula</title>
</head>
<body>

<h1>Datos del Alumno</h1>

<table border="1" cellpadding="5">
    <tr><td>Nombre</td><td><?= $alumne['Nom_alumne'] ?></td></tr>
    <tr><td>DNI</td><td><?= $alumne['Dni_alumne'] ?></td></tr>
    <tr><td>Email</td><td><?= $alumne['correo_alumne'] ?></td></tr>
    <tr><td>Teléfono</td><td><?= $alumne['tlf_alumne'] ?></td></tr>
    <tr><td>Dirección</td><td><?= $alumne['domicili'] ?></td></tr>
    <tr><td>Población</td><td><?= $alumne['poblacio'] ?></td></tr>
    <tr><td>Municipio</td><td><?= $alumne['municipi'] ?></td></tr>
    <tr><td>Código Postal</td><td><?= $alumne['codi_postal'] ?></td></tr>
    <tr><td>Fecha Nacimiento</td><td><?= $alumne['data_naixement'] ?></td></tr>
</table>

<br><br>

<h1>Datos del Curso</h1>

<table border="1" cellpadding="5">
    <tr><td>Nombre curso</td><td><?= $curs['Nom_curs'] ?></td></tr>
    <tr><td>Código</td><td><?= $curs['codigo_curs'] ?></td></tr>
    <tr><td>Precio</td><td><?= $curs['precio'] ?> €</td></tr>
</table>

</body>
</html>
<p>Este documento confirma que el alumno ha realizado el proceso de matrícula.</p>

<a class="btn" href="<?= base_url('matricula/pago/pdf')?>" target="_blank">
    Descargar justificante de matrícula
</a>

</body>
</html>