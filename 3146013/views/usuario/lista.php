<form action="" method="post">
    <input type="text" name="nombre" placeholder="Nombre">
    <input type="email" name="correo" placeholder="correo">
    <input type="text" name="rol" placeholder="rol">
    <input type="text" name="telefono" placeholder="telefono">

    <button type="submit">Guardar</button>
</form>
<?php if (isset($usuarios) && is_array($usuarios)): ?>
    <?php if (count($usuarios) === 0): ?>
        <p>No hay usuarios registrados.</p>
    <?php else: ?>
        <h2>Usuarios</h2>
        <table border="1" cellpadding="6" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $u): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($u['id']); ?></td>
                        <td><?php echo htmlspecialchars($u['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($u['correo']); ?></td>
                        <td><?php echo htmlspecialchars($u['rol']); ?></td>
                        <td><?php echo htmlspecialchars($u['telefono']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
<?php endif; ?>