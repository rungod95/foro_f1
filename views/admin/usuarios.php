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

            <td>
                <form method="POST" action="<?= BASE_URL ?>index.php?controller=admin&action=cambiarRol" style="display: inline-block;">
                    <input type="hidden" name="id_usuario" value="<?= $u['id_usuario'] ?>">
                    <select name="rol">
                        <option value="usuario" <?= $u['rol'] == 'usuario' ? 'selected' : '' ?>>usuario</option>
                        <option value="admin" <?= $u['rol'] == 'admin' ? 'selected' : '' ?>>admin</option>
                    </select>
                    <input type="submit" class="btn-mini" value="Guardar">
                </form>

                <br>

                <a href="<?= BASE_URL ?>index.php?controller=usuario&action=historial&id=<?= $u['id_usuario'] ?>" class="btn-mini">📜 Historial</a>

                <?php if ($_SESSION['usuario']['id_usuario'] != $u['id_usuario']): ?>
                    <form method="POST" action="<?= BASE_URL ?>index.php?controller=admin&action=eliminarUsuario" onsubmit="return confirm('¿Seguro que deseas eliminar a <?= htmlspecialchars($u['nombre']) ?>?')" style="display:inline-block; margin-top: 5px;">
                        <input type="hidden" name="id_usuario" value="<?= $u['id_usuario'] ?>">
                        <input type="submit" class="btn-mini" value="🗑">
                    </form>
                <?php else: ?>
                    <br><em style="font-size: 0.8em;">No puedes eliminarte a ti mismo</em>
                <?php endif; ?>
            </td>
        </tr>

    <?php endwhile; ?>
</table>

<a href="<?= BASE_URL ?>index.php?controller=tema&action=index" class="btn btn-white">⬅️ Volver</a>


<?php require_once 'views/layout/footer.php'; ?>
