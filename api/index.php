<?php
require __DIR__ . '/secciones/sobre-mi.php';
require __DIR__ . '/secciones/mis-experiencias.php';
require __DIR__ . '/secciones/gustos-intereses.php';
require __DIR__ . '/secciones/metas-suenos.php';
function e(string $value): string { return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }
$fotoRuta = (string)($sobreMi['foto'] ?? '');
// Mostrar la foto directamente: en Vercel los archivos estáticos se publican por separado del runtime PHP.
$fotoValida = str_starts_with($fotoRuta, '/assets/img/') && !str_contains($fotoRuta, '..');
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="theme-color" content="#080e1c"><meta name="description" content="Conoce a Edison Paredes: experiencias, gustos, intereses, metas y sueños.">
<title>Edison Paredes | Mi espacio personal</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/styles.css"><script defer src="/assets/script.js"></script>
</head>
<body>
<a class="skip" href="#contenido">Saltar al contenido</a>
<header class="header"><div class="container navwrap"><a class="logo" href="#inicio">Edison<b>.</b></a><button class="menu-btn" type="button" data-menu aria-expanded="false" aria-controls="nav">☰ Menú</button><nav class="navlinks" id="nav" data-nav aria-label="Navegación principal"><a href="#sobre-mi">Sobre mí</a><a href="#experiencias">Mis experiencias</a><a href="#gustos">Gustos e intereses</a><a href="#metas">Metas y sueños</a></nav></div></header>
<main id="contenido">
<section class="hero" id="inicio"><div class="container hero-grid"><div><span class="eyebrow">Bienvenido a mi espacio personal</span><h1>¡Hola! Soy <span>Edison Paredes.</span></h1><p class="lead">Un rincón para compartir las experiencias que me han marcado, las cosas que disfruto y los sueños que me motivan a seguir adelante.</p><div class="actions"><a class="btn btn-primary" href="#sobre-mi">Conóceme un poco más ↗</a><a class="btn btn-outline" href="#experiencias">Mis experiencias</a></div><div class="hero-facts"><span>🎓 <?= e($sobreMi['ciclo']) ?></span><span>📍 Perú</span><span>✨ Siempre aprendiendo</span></div></div><div class="portrait-shell"><div class="portrait-inner"><span class="initials" data-initials>EP</span><?php if ($fotoValida): ?><img src="<?= e($fotoRuta) ?>" alt="Fotografía de Edison Paredes" width="300" height="300" fetchpriority="high" data-profile-photo onerror="this.hidden=true" onload="this.previousElementSibling.hidden=true"><?php endif; ?></div><span class="portrait-caption">✦ Un poco de mi historia</span></div></div></section>
<section class="section" id="sobre-mi"><div class="container"><div class="section-head"><span class="eyebrow">01 / Mi historia</span><h2><?= e($sobreMi['titulo']) ?></h2><p class="section-desc">Más allá de lo que estudio, estas son algunas de las cosas que forman parte de mí.</p></div><div class="about-layout"><div class="glass"><p><?= e($sobreMi['descripcion']) ?></p><p><?= e($sobreMi['mensaje']) ?></p><div class="tags"><span class="tag">🎓 <?= e($sobreMi['ciclo']) ?></span><span class="tag">🏫 <?= e($sobreMi['universidad']) ?></span></div></div><div class="glass objective"><span class="objective-icon" aria-hidden="true">✦</span><div><strong>Una frase que me inspira</strong><p class="personal-quote">“<?= e($sobreMi['frase']) ?>”</p></div></div></div></div></section>
<section class="section" id="experiencias"><div class="container"><div class="section-head"><span class="eyebrow">02 / Recorridos y aprendizajes</span><h2>Mis <span class="gradient">experiencias</span></h2><p class="section-desc">Lugares, oportunidades y momentos que han ampliado mi manera de ver el mundo.</p></div><div class="grid"><?php foreach ($experiencias as $experiencia): ?><article class="card experience-card"><div class="interest-icon" aria-hidden="true"><?= e($experiencia['icono']) ?></div><span class="pill"><?= e($experiencia['etiqueta']) ?></span><h3><?= e($experiencia['titulo']) ?></h3><p class="place-label"><?= e($experiencia['lugar']) ?></p><p><?= e($experiencia['descripcion']) ?></p></article><?php endforeach; ?></div></div></section>
<section class="section" id="gustos"><div class="container"><div class="section-head"><span class="eyebrow">03 / Lo que disfruto</span><h2>Mis gustos e <span class="gradient">intereses</span></h2><p class="section-desc">Algunas ideas iniciales sobre las actividades y momentos que disfruto en mi día a día.</p></div><div class="grid interests-grid"><?php foreach ($gustos as $gusto): ?><article class="card"><div class="interest-icon" aria-hidden="true"><?= e($gusto['icono']) ?></div><h3><?= e($gusto['titulo']) ?></h3><p><?= e($gusto['descripcion']) ?></p></article><?php endforeach; ?></div></div></section>
<section class="section" id="metas"><div class="container"><div class="section-head"><span class="eyebrow">04 / Mirando al futuro</span><h2>Mis metas y <span class="gradient">sueños</span></h2><p class="section-desc">Pequeños y grandes objetivos que dan sentido a lo que quiero construir con el tiempo.</p></div><div class="grid interests-grid"><?php foreach ($metas as $meta): ?><article class="card"><div class="interest-icon" aria-hidden="true"><?= e($meta['icono']) ?></div><h3><?= e($meta['titulo']) ?></h3><p><?= e($meta['descripcion']) ?></p></article><?php endforeach; ?></div><p class="closing-note">No se trata solamente de llegar a una meta, sino también de disfrutar el camino. ✨</p></div></section>
</main>
<footer class="footer"><div class="container footer-inner"><span>© <?= date('Y') ?> <b>Edison Paredes</b>.</span><span>Hecho con cariño · Mi espacio personal</span></div></footer>
</body></html>
