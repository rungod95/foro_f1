<?php require_once 'views/layout/header.php'; ?>
<h2>Registro</h2>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="POST" action="">

    <input type="text" name="nombre" placeholder="Nombre" required><br>
    <input type="email" name="email" placeholder="Correo" required><br>
    <input type="password" name="password" placeholder="Contraseña" required><br>
    <input type="submit" value="Registrarse">
</form>

<a href="index.php?controller=usuario&action=login">Ya tengo cuenta</a>
<?php require_once 'views/layout/footer.php'; ?>
