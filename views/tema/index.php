<?php require_once 'views/layout/header.php'; ?>

    <h2>Bienvenido al Foro de Fórmula 1</h2>


    <a href="<?= BASE_URL ?>index.php?controller=tema&action=crear" class="btn btn-red">➕ Nuevo tema</a>

    <h2>Temas del Foro de Fórmula 1</h2>

    <div class="categoria-filtros">
        <a href="<?= BASE_URL ?>index.php?controller=tema&action=index&categoria=Todos" class="badge badge-general">Todos</a>
        <a href="<?= BASE_URL ?>index.php?controller=tema&action=index&categoria=General" class="badge badge-general">General</a>
        <a href="<?= BASE_URL ?>index.php?controller=tema&action=index&categoria=Noticias" class="badge badge-noticias">Noticias</a>
        <a href="<?= BASE_URL ?>index.php?controller=tema&action=index&categoria=Rumores" class="badge badge-rumores">Rumores</a>
        <a href="<?= BASE_URL ?>index.php?controller=tema&action=index&categoria=Carreras" class="badge badge-carreras">Carreras</a>
        <a href="<?= BASE_URL ?>index.php?controller=tema&action=index&categoria=Técnica" class="badge badge-tecnica">Técnica</a>
    </div>


<?php if ($temas && $temas->num_rows > 0): ?>
    <ul>
        <?php while($tema = $temas->fetch_assoc()): ?>
            <div class="tema-box">
                <!-- Categoría del tema -->
                <span class="badge badge-<?= strtolower($tema['categoria']) ?>">
            <?= htmlspecialchars($tema['categoria']) ?>
        </span>

                <a href="<?= BASE_URL ?>index.php?controller=tema&action=ver&id=<?= $tema['id_tema'] ?>">
                    <h3 style="margin-bottom: 10px;"><?= htmlspecialchars($tema['titulo']) ?></h3>
                </a>
                <p><?= nl2br(htmlspecialchars($tema['descripcion'])) ?></p>
                <small><em>Creado por <?= htmlspecialchars($tema['autor']) ?> el <?= $tema['fecha_creacion'] ?></em></small>
            </div>
        <?php endwhile; ?>


    </ul>
<?php else: ?>
    <p>No hay temas todavía.</p>
<?php endif; ?>


    <a href="<?= BASE_URL ?>index.php?controller=usuario&action=logout" class="btn btn-gray">🔒 Cerrar sesión</a>


<?php require_once 'views/layout/footer.php'; ?>