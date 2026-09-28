<?php
declare(strict_types=1);
$pageTitle = $pageTitle ?? 'Sistema Solar';
$pageDescription = $pageDescription ?? 'Explora los planetas del Sistema Solar.';
$activePage = $activePage ?? '';
$planets = [
    ['slug' => 'mercurio', 'name' => 'Mercurio', 'image' => 'mercurio1.jpg'],
    ['slug' => 'venus', 'name' => 'Venus', 'image' => 'venus1.jpg'],
    ['slug' => 'latierra', 'name' => 'La Tierra', 'image' => 'latierra1.jpg'],
    ['slug' => 'marte', 'name' => 'Marte', 'image' => 'marte1.jpg'],
    ['slug' => 'jupiter', 'name' => 'Júpiter', 'image' => 'jupiter1.jpg'],
    ['slug' => 'saturno', 'name' => 'Saturno', 'image' => 'saturno1.jpg'],
    ['slug' => 'urano', 'name' => 'Urano', 'image' => 'urano1.jpg'],
    ['slug' => 'neptuno', 'name' => 'Neptuno', 'image' => 'neptuno1.jpg'],
    ['slug' => 'pluton', 'name' => 'Plutón', 'image' => 'pluton1.jpg'],
];
?><!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= e($pageDescription) ?>">
    <title><?= e($pageTitle) ?> · Sistema Solar</title>
    <link rel="stylesheet" href="styles.css">
    <?php if (!empty($includeValidator)): ?><script src="validator.js" defer></script><?php endif; ?>
</head>
<body>
<a class="skip-link" href="#contenido">Saltar al contenido</a>
<div class="site-shell">
    <header class="site-header">
        <a class="brand" href="principal.php" aria-label="Inicio del Sistema Solar">
            <img src="imagenes/planetas.jpg" alt="Ilustración del Sistema Solar" width="873" height="150">
            <span><strong>Sistema Solar</strong><small>Una mirada a nuestros mundos vecinos</small></span>
        </a>
    </header>
    <nav class="site-nav" aria-label="Navegación principal">
        <a class="nav-home <?= $activePage === 'inicio' ? 'active' : '' ?>" href="principal.php">Inicio</a>
        <div class="planet-links">
        <?php foreach ($planets as $navPlanet): ?>
            <a class="planet-link <?= $activePage === $navPlanet['slug'] ? 'active' : '' ?>" href="<?= e($navPlanet['slug']) ?>.php">
                <img src="imagenes/<?= e($navPlanet['image']) ?>" alt="" width="40" height="40" loading="lazy">
                <span><?= e($navPlanet['name']) ?></span>
            </a>
        <?php endforeach; ?>
        </div>
        <a class="nav-contact <?= $activePage === 'contacto' ? 'active' : '' ?>" href="contactar.php">Deja tu opinión</a>
    </nav>
    <main id="contenido">

