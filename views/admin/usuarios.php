<?php require_once 'views/layout/header.php'; ?>

<h2>Gestión de usuarios</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Cambiar rol</th>
    </tr>
    <?php while ($u = $usuarios->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($u['nombre']) ?></td>
            <td><?= htmlspecialchars($u['email']) ?></td>
            <td>
    <span class="<?= $u['rol'] == 'admin' ? 'rol-admin' : 'rol-usuario' ?>">
        <?= $u['rol'] ?>
    </span>
            </td>

            <!-- Cambiar rol -->
                <form method="POST" action="<?= BASE_URL ?>index.php?controller=admin&action=cambiarRol" style="margin-bottom: 5px;">
                    <input type="hidden" name="id_usuario" value="<?= $u['id_usuario'] ?>">
                    <select name="rol">
                        <option value="usuario" <?= $u['rol'] == 'usuario' ? 'selected' : '' ?>>usuario</option>
                        <option value="admin" <?= $u['rol'] == 'admin' ? 'selected' : '' ?>>admin</option>
                    </select>
                    <input type="submit" value="Guardar"></td>
                    <td>
                        <a href="<?= BASE_URL ?>index.php?controller=usuario&action=historial&id=<?= $u['id_usuario'] ?>">📜 Ver historial</a>
                    </td>
                </form>

                <!-- Eliminar usuario (excepto a sí mismo) -->
                <?php if ($_SESSION['usuario']['id_usuario'] != $u['id_usuario']): ?>
                    <form method="POST" action="<?= BASE_URL ?>index.php?controller=admin&action=eliminarUsuario" onsubmit="return confirm('¿Seguro que deseas eliminar a <?= htmlspecialchars($u['nombre']) ?>?')">
                        <input type="hidden" name="id_usuario" value="<?= $u['id_usuario'] ?>">
                        <input type="submit" value="🗑 Eliminar">
                    </form>
                <?php else: ?>
                    <em>No puedes eliminarte a ti mismo</em>
                <?php endif; ?>
            </td>

        </tr>
    <?php endwhile; ?>
</table>

<a href="<?= BASE_URL ?>index.php?controller=tema&action=index">⬅ Volver</a>

<?php require_once 'views/layout/footer.php'; ?>
