<?php require_once 'views/layout/header.php'; ?>

<div class="form-container">
    <h2>Registro</h2>

    <?php if (isset($error)) echo "<p class='form-error'>$error</p>"; ?>

    <form method="POST" action="">
        <input type="text" name="nombre" placeholder="Nombre" required><br>
        <input type="email" name="email" placeholder="Correo" required><br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <input type="submit" class="btn btn-red" value="Registrarse">
    </form>

    <a href="<?= BASE_URL ?>index.php?controller=usuario&action=login" class="btn btn-white">Ya tengo cuenta</a>
</div>

<?php require_once 'views/layout/footer.php'; ?>
