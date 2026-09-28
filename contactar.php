<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/bootstrap.php';
$provincias = ['A Coruña', 'Lugo', 'Ourense', 'Pontevedra'];
$edades = [1 => '0–20', 2 => '20–40', 3 => '40–60', 4 => '60–100'];
$values = ['nombre' => '', 'apellidos' => '', 'provincia' => '', 'correo' => '', 'edad' => '', 'opinion' => ''];
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($values as $key => $_) $values[$key] = trim((string) ($_POST[$key] ?? ''));
    if (!valid_csrf($_POST['csrf_token'] ?? null)) $errors[] = 'La sesión del formulario ha caducado. Recarga la página.';
    if (!preg_match('/^[\p{L} .\'-]{2,60}$/u', $values['nombre'])) $errors[] = 'El nombre debe tener entre 2 y 60 letras.';
    if (!preg_match('/^[\p{L} .\'-]{2,100}$/u', $values['apellidos'])) $errors[] = 'Los apellidos no son válidos.';
    if (!in_array($values['provincia'], $provincias, true)) $errors[] = 'Selecciona una provincia válida.';
    if (!filter_var($values['correo'], FILTER_VALIDATE_EMAIL) || strlen($values['correo']) > 254) $errors[] = 'El correo electrónico no es válido.';
    if (!array_key_exists((int) $values['edad'], $edades)) $errors[] = 'Selecciona un intervalo de edad.';
    if (mb_strlen($values['opinion']) < 10 || mb_strlen($values['opinion']) > 1000) $errors[] = 'La opinión debe tener entre 10 y 1000 caracteres.';
    if (!$errors) {
        $statement = $pdo->prepare('INSERT INTO opiniones (nombre, apellidos, provincia, correo, edad, opinion) VALUES (:nombre, :apellidos, :provincia, :correo, :edad, :opinion)');
        $statement->execute([':nombre' => $values['nombre'], ':apellidos' => $values['apellidos'], ':provincia' => $values['provincia'], ':correo' => $values['correo'], ':edad' => (int) $values['edad'], ':opinion' => $values['opinion']]);
        flash('success', 'Tu opinión se ha guardado correctamente. ¡Gracias por participar!');
        header('Location: contactar.php', true, 303); exit;
    }
}
$flash = take_flash();
$totalOpiniones = (int) $pdo->query('SELECT COUNT(*) FROM opiniones')->fetchColumn();
$opinionesRecientes = $pdo->query('SELECT nombre, opinion, created_at FROM opiniones ORDER BY id DESC LIMIT 3')->fetchAll();
$pageTitle = 'Contacto'; $pageDescription = 'Formulario seguro para enviar una opinión sobre el Sistema Solar.'; $activePage = 'contacto'; $includeValidator = true;
require __DIR__ . '/includes/header.php';
?>
<section class="form-page"><p class="eyebrow">Participa</p><h1>Deja tu opinión</h1><p class="lead">Los campos se validan en el navegador y en el servidor. El servidor usa consultas preparadas para guardar los datos en SQLite.</p>
<?php if ($flash): ?><div class="alert success" role="status"><?= e($flash['message']) ?></div><?php endif; ?>
<?php if ($errors): ?><div class="alert error" role="alert"><strong>Revisa el formulario:</strong><ul><?php foreach ($errors as $error): ?><li><?= e($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
<form id="contactForm" class="contact-form" method="post" action="contactar.php" novalidate><input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>"><div class="form-grid">
<label for="nombre">Nombre<input id="nombre" name="nombre" type="text" maxlength="60" autocomplete="given-name" value="<?= e($values['nombre']) ?>" required></label>
<label for="apellidos">Apellidos<input id="apellidos" name="apellidos" type="text" maxlength="100" autocomplete="family-name" value="<?= e($values['apellidos']) ?>" required></label>
<label for="correo">Correo electrónico<input id="correo" name="correo" type="email" maxlength="254" autocomplete="email" value="<?= e($values['correo']) ?>" required></label>
<label for="provincia">Provincia<select id="provincia" name="provincia" required><option value="">Selecciona…</option><?php foreach ($provincias as $provincia): ?><option value="<?= e($provincia) ?>" <?= $values['provincia'] === $provincia ? 'selected' : '' ?>><?= e($provincia) ?></option><?php endforeach; ?></select></label></div>
<fieldset><legend>Edad</legend><?php foreach ($edades as $id => $label): ?><label class="choice"><input type="radio" name="edad" value="<?= $id ?>" <?= (int) $values['edad'] === $id ? 'checked' : '' ?> required><?= e($label) ?></label><?php endforeach; ?></fieldset>
<label for="opinion">Opinión<textarea id="opinion" name="opinion" rows="7" maxlength="1000" required><?= e($values['opinion']) ?></textarea><small>Entre 10 y 1000 caracteres.</small></label><p id="form-errors" class="field-errors" role="alert" aria-live="polite"></p><button class="button" type="submit">Guardar opinión</button></form></section>
<section class="intro-card" aria-labelledby="opiniones-title"><h2 id="opiniones-title">Opiniones recibidas <small>(<?= $totalOpiniones ?>)</small></h2>
<?php if (!$opinionesRecientes): ?><p>Aún no hay opiniones. Sé la primera persona en participar.</p><?php else: ?><div class="reviews"><?php foreach ($opinionesRecientes as $opinion): ?><article><p><?= e($opinion['opinion']) ?></p><footer>— <?= e($opinion['nombre']) ?> · <?= e($opinion['created_at']) ?> UTC</footer></article><?php endforeach; ?></div><?php endif; ?></section>
<?php require __DIR__ . '/includes/footer.php'; ?>

