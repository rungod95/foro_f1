<?php require_once 'views/layout/header.php'; ?>

<h2>Bienvenido al Foro de Fórmula 1</h2>



<h2>Temas del Foro de Fórmula 1</h2>

<?php if ($temas && $temas->num_rows > 0): ?>
    <ul>
        <?php while($tema = $temas->fetch_assoc()): ?>
            <li>
                <strong><?= htmlspecialchars($tema['titulo']) ?></strong><br>
                <?= nl2br(htmlspecialchars($tema['descripcion'])) ?><br>
                <em>Creado por <?= htmlspecialchars($tema['autor']) ?> el <?= $tema['fecha_creacion'] ?></em>
            </li>
        <?php endwhile; ?>
    </ul>
<?php else: ?>
    <p>No hay temas todavía.</p>
<?php endif; ?>


<a href="index.php?controller=usuario&action=logout">Cerrar sesión</a>

<?php require_once 'views/layout/footer.php'; ?>
