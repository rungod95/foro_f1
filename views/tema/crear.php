<?php require_once 'views/layout/header.php'; ?>

    <h2>Crear nuevo tema</h2>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST" action="<?= BASE_URL ?>index.php?controller=tema&action=guardar">
        <label for="categoria">Categoría</label><br>
        <select name="categoria" required>
            <option value="General">General</option>
            <option value="Noticias">Noticias</option>
            <option value="Rumores">Rumores</option>
            <option value="Carreras">Carreras</option>
            <option value="Técnica">Técnica</option>
        </select>
        <br>
        <input type="text" name="titulo" placeholder="Título del tema" required><br>
        <textarea name="descripcion" placeholder="Escribe el contenido aquí..." rows="5" cols="40" required></textarea><br>
        <input type="submit" value="Publicar tema">
    </form>

    <a href="<?= BASE_URL ?>index.php?controller=tema&action=index" class="btn btn-white">⬅️ Volver</a>



<?php require_once 'views/layout/footer.php'; ?>