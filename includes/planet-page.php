<?php
declare(strict_types=1);
require_once __DIR__ . '/bootstrap.php';
$slug = $slug ?? '';
$planetsData = require __DIR__ . '/../data/planets.php';
if (!isset($planetsData[$slug])) {
    http_response_code(404);
    $slug = 'mercurio';
}
$planet = $planetsData[$slug];
$pageTitle = $planet['name'];
$pageDescription = $planet['summary'];
$activePage = $slug;
require __DIR__ . '/header.php';
?>
<article class="planet-page">
    <div class="planet-hero">
        <div>
            <p class="eyebrow">Exploración planetaria</p>
            <h1><?= e($planet['name']) ?>: <?= e($planet['title']) ?></h1>
            <p class="lead"><?= e($planet['summary']) ?></p>
        </div>
        <img class="planet-image" src="imagenes/<?= e($planet['image']) ?>" alt="Imagen de <?= e($planet['name']) ?>" width="300" height="300">
    </div>
    <section class="planet-copy" aria-labelledby="datos-title">
        <h2 id="datos-title">Datos destacados</h2>
        <ul class="fact-list">
        <?php foreach ($planet['facts'] as $fact): ?><li><?= e($fact) ?></li><?php endforeach; ?>
        </ul>
        <p>Consulta también la información de los demás mundos del Sistema Solar desde la navegación superior y comparte tu opinión sobre esta práctica.</p>
        <a class="button" href="contactar.php">Dejar una opinión</a>
    </section>
</article>
<?php require __DIR__ . '/footer.php'; ?>

