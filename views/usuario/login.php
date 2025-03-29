<?php require_once 'views/layout/header.php'; ?>
    <h2>Iniciar sesión</h2>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST" action="">
        <input type="email" name="email" placeholder="Correo" required><br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <input type="submit" value="Entrar">
    </form>

    <a href="<?= BASE_URL ?>index.php?controller=usuario&action=registro">Registrarme</a>

<?php require_once 'views/layout/footer.php'; ?>