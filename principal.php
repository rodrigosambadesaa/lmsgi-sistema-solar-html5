<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/bootstrap.php';
$pageTitle = 'Inicio';
$pageDescription = 'Descubre los planetas del Sistema Solar en una web semántica y responsive.';
$activePage = 'inicio';
require __DIR__ . '/includes/header.php';
?>
<section class="hero">
    <p class="eyebrow">Lenguajes de marcas · HTML5 + CSS3 + PHP</p>
    <h1>Un viaje por el Sistema Solar</h1>
    <p class="lead">Explora nuestros mundos vecinos, aprende sus características y comparte tu opinión sobre la web.</p>
    <a class="button" href="#planetas">Explorar planetas</a>
</section>
<section class="intro-card" aria-labelledby="intro-title"><h2 id="intro-title">Nuestro vecindario cósmico</h2><p>El Sistema Solar está formado por el Sol y todos los cuerpos que orbitan a su alrededor: planetas, satélites, asteroides y cometas. Esta versión transforma la práctica original en una experiencia accesible, responsive y preparada para PHP.</p></section>
<section id="planetas" class="planet-grid" aria-labelledby="planets-title"><h2 id="planets-title" class="visually-hidden">Planetas</h2>
<?php foreach (require __DIR__ . '/data/planets.php' as $slug => $planet): ?><article class="planet-card"><img src="imagenes/<?= e($planet['image']) ?>" alt="<?= e($planet['name']) ?>" width="300" height="300" loading="lazy"><div><p class="eyebrow">Planeta</p><h3><?= e($planet['name']) ?></h3><p><?= e($planet['summary']) ?></p><a href="<?= e($slug) ?>.php">Conocer <?= e($planet['name']) ?></a></div></article><?php endforeach; ?>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>

