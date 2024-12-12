<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="/dist/css/style.css">
</head>
<body>
    <div class="login-container">
        <h1>Iniciar Sesión</h1>
        <?php if (isset($data['error'])): ?>
            <p class="error"><?= $data['error'] ?></p>
        <?php endif; ?>
        <form action="/login/autenticar" method="POST">
            <div>
                <label for="correo">Correo Electrónico</label>
                <input type="email" name="correo" id="correo" required>
            </div>
            <div>
                <label for="contraseña">Contraseña</label>
                <input type="password" name="contraseña" id="contraseña" required>
            </div>
            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</html>
