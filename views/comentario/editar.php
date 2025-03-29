<?php require_once 'views/layout/header.php'; ?>

<h2>Editar comentario</h2>

<form method="POST" action="<?= BASE_URL ?>index.php?controller=comentario&action=actualizar">
    <textarea name="contenido" rows="5" cols="60" required><?= htmlspecialchars($comentario['contenido']) ?></textarea><br>
    <input type="hidden" name="id_comentario" value="<?= $comentario['id_comentario'] ?>">
    <input type="hidden" name="id_tema" value="<?= $_GET['tema'] ?>">
    <input type="submit" value="Guardar cambios">
</form>

<a href="<?= BASE_URL ?>index.php?controller=tema&action=ver&id=<?= $_GET['tema'] ?>">⬅ Volver</a>

<?php require_once 'views/layout/footer.php'; ?>
