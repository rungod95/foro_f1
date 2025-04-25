<?php require_once 'views/layout/header.php'; ?>
    <div class="form-container">
        <h2>Iniciar sesión</h2>

        <?php if (isset($error)) echo "<p class='form-error'>$error</p>"; ?>

        <form method="POST" action="">
            <input type="email" name="email" placeholder="Correo" required><br>
            <input type="password" name="password" placeholder="Contraseña" required><br>
            <input type="submit" value="Entrar" class="btn btn-red">
        </form>

        <a href="<?= BASE_URL ?>index.php?controller=usuario&action=registro" class="btn btn-white">Registrarme</a>
    </div>

<?php require_once 'views/layout/footer.php'; ?>