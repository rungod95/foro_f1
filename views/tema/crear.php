<?php require_once 'views/layout/header.php'; ?>

    <h2>Crear nuevo tema</h2>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST" action="<?= BASE_URL ?>index.php?controller=tema&action=guardar">
    <input type="text" name="titulo" placeholder="Título del tema" required><br>
        <textarea name="descripcion" placeholder="Escribe el contenido aquí..." rows="5" cols="40" required></textarea><br>
        <input type="submit" value="Publicar tema">
    </form>

    <a href="../../index.php">Volver al listado</a>

<?php require_once 'views/layout/footer.php'; ?>