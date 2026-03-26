<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Código de acceso</title>
</head>
<body style="font-family: Arial; background:#f4f4f4; padding:20px;">

    <div style="max-width:600px; margin:auto; background:white; padding:20px; border-radius:10px;">
                    <img src="<?= base_url('img/logo.jpg') ?>" alt="">
        </div>

        <h2 style="color:#333;">Código de acceso</h2>

        <p>Hola,</p>

        <p>Tu código para acceder es:</p>

        <h1 style="text-align:center; color:#007bff;">
            <?= $code ?>
        </h1>

        <hr>

        <p style="font-size:12px; color:#999;">
            Instituto Caparrella
        </p>

    </div>

</body>
</html>