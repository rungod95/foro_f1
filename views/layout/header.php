<?php
define('BASE_URL', '/foro-f1/');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Foro F1</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/estilo.css">
</head>
<body>
<header>
    <h1>
        <?php if (isset($_SESSION['usuario'])): ?>
            <a href="<?= BASE_URL ?>index.php?controller=tema&action=index" class="logo-link">🏁 Foro Fórmula 1</a>
        <?php else: ?>
            🏁 Foro Fórmula 1
        <?php endif; ?>
    </h1>



    <nav>
        <?php if (isset($_SESSION['usuario'])): ?>
            <span>Bienvenido, <strong><?= htmlspecialchars($_SESSION['usuario']['nombre']) ?></strong></span> |
            <a href="<?= BASE_URL ?>index.php?controller=usuario&action=historial">Mi historial</a> |
            <?php if ($_SESSION['usuario']['rol'] === 'admin'): ?>
                <a href="<?= BASE_URL ?>index.php?controller=admin&action=usuarios">Panel de usuarios</a> |
            <?php endif; ?>
            <a href="<?= BASE_URL ?>index.php?controller=usuario&action=logout">Cerrar sesión</a>
        <?php else: ?>
            <a href="<?= BASE_URL ?>index.php?controller=usuario&action=login">Login</a> |
            <a href="<?= BASE_URL ?>index.php?controller=usuario&action=registro">Registro</a>
        <?php endif; ?>
    </nav>
</header>
<main>
