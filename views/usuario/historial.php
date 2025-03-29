<?php require_once 'views/layout/header.php'; ?>

<h2>Historial de actividad</h2>

<h3>Temas creados</h3>
<?php if ($temas->num_rows > 0): ?>
    <ul>
        <?php while ($tema = $temas->fetch_assoc()): ?>
            <li>
                <a href="<?= BASE_URL ?>index.php?controller=tema&action=ver&id=<?= $tema['id_tema'] ?>">
                    <?= htmlspecialchars($tema['titulo']) ?>
                </a> - <?= $tema['fecha_creacion'] ?>
            </li>
        <?php endwhile; ?>
    </ul>
<?php else: ?>
    <p>No ha creado ningún tema.</p>
<?php endif; ?>

<h3>Comentarios realizados</h3>
<?php if ($comentarios->num_rows > 0): ?>
    <ul>
        <?php while ($comentario = $comentarios->fetch_assoc()): ?>
            <li>
                En tema <strong><?= htmlspecialchars($comentario['titulo']) ?></strong>:
                <?= nl2br(htmlspecialchars($comentario['contenido'])) ?> - <?= $comentario['fecha'] ?>
            </li>
        <?php endwhile; ?>
    </ul>
<?php else: ?>
    <p>No ha comentado aún.</p>
<?php endif; ?>

<a href="<?= BASE_URL ?>index.php?controller=tema&action=index">⬅ Volver</a>

<?php require_once 'views/layout/footer.php'; ?>
