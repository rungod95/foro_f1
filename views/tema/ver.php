
<?php
require_once 'views/layout/header.php'; ?>

<h2><?= htmlspecialchars($tema['titulo']) ?></h2>
<?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 'admin'): ?>
    <form method="POST" action="<?= BASE_URL ?>index.php?controller=tema&action=eliminar" style="display:inline;">
        <input type="hidden" name="id_tema" value="<?= $tema['id_tema'] ?>">
        <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar este tema?')">🗑 Eliminar tema</button>
    </form>
<?php endif; ?>
<p><?= nl2br(htmlspecialchars($tema['descripcion'])) ?></p>
<p><em>Creado por <?= htmlspecialchars($tema['autor']) ?> el <?= $tema['fecha_creacion'] ?></em></p>

<hr>
<h3>Comentarios</h3>

<?php if ($comentarios->num_rows > 0): ?>
    <?php while ($comentario = $comentarios->fetch_assoc()): ?>
        <div class="comment-box">
            <div style="float:left; margin-right:10px; width:40px; height:40px; background:#cc0000; color:white; text-align:center; line-height:40px; border-radius:50%;">
                <?= strtoupper(substr($comentario['autor'], 0, 1)) ?>
            </div>
            <p><?= nl2br(htmlspecialchars($comentario['contenido'])) ?></p>
            <small><em><?= htmlspecialchars($comentario['autor']) ?> - <?= $comentario['fecha'] ?></em></small>
        </div>


            <?php if (
                isset($_SESSION['usuario']) &&
                ($_SESSION['usuario']['id_usuario'] == $comentario['id_usuario'] || $_SESSION['usuario']['rol'] == 'admin')
            ): ?>
            <form method="POST" action="<?= BASE_URL ?>index.php?controller=comentario&action=eliminar" style="display:inline;">
                <input type="hidden" name="id_comentario" value="<?= $comentario['id_comentario'] ?>">
                <input type="hidden" name="id_tema" value="<?= $tema['id_tema'] ?>">
                <button type="submit" class="btn-mini" onclick="return confirm('¿Eliminar este comentario?')">🗑</button>
            </form>

            <?php if ($_SESSION['usuario']['id_usuario'] == $comentario['id_usuario']): ?>
                <a href="<?= BASE_URL ?>index.php?controller=comentario&action=editar&id=<?= $comentario['id_comentario'] ?>&tema=<?= $tema['id_tema'] ?>" class="btn-mini">✏️</a>
            <?php endif; ?>

                    <?php endif; ?>

        </div>

    <?php endwhile; ?>
<?php else: ?>
    <p>No hay comentarios aún.</p>
<?php endif; ?>
<hr style="margin: 50px 0; border: none; border-top: 2px dashed #ccc;">

<?php if (isset($_SESSION['usuario'])): ?>
    <h4>Añadir comentario</h4>
    <form method="POST" action="<?= BASE_URL ?>index.php?controller=comentario&action=guardar">
        <textarea name="contenido" rows="4" cols="50" required></textarea><br>
        <input type="hidden" name="id_tema" value="<?= $tema['id_tema'] ?>">
        <input type="submit" value="Comentar">
    </form>
<?php else: ?>
    <p><a href="<?= BASE_URL ?>index.php?controller=usuario&action=login">Inicia sesión</a> para comentar.</p>
<?php endif; ?>

<a href="<?= BASE_URL ?>index.php?controller=tema&action=index" class="btn btn-white">⬅️ Volver</a>


<?php require_once 'views/layout/footer.php'; ?>