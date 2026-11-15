<?php

/** @var string $contentHTML */
/** @var \Framework\Auth\AppUser $user */
/** @var \Framework\Support\LinkGenerator $link */

$aktivna = $_GET['c'] ?? 'home';
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= App\Configuration::APP_NAME ?></title>
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $link->asset('favicons/favicon-32x32.png') ?>">
    <link rel="stylesheet" href="<?= $link->asset('css/style.css') ?>">
    <link rel="stylesheet" href="<?= $link->asset('css/katalog.css') ?>">
    <link rel="stylesheet" href="<?= $link->asset('css/sprava.css') ?>">
</head>
<body>

<header class="hlavicka">
    <a href="<?= $link->url('home.index') ?>" class="logo">
        <span class="logo-obrazok">Logo</span>
        PCshop
    </a>

    <nav class="navigacia">
        <ul>
            <li><a href="<?= $link->url('home.index') ?>" class="<?= $aktivna === 'home' ? 'aktivna' : '' ?>">Domov</a></li>
            <li><a href="<?= $link->url('katalog.index') ?>" class="<?= $aktivna === 'katalog' ? 'aktivna' : '' ?>">Katalóg</a></li>
            <li><a href="#">Moje objednávky</a></li>
            <li><a href="<?= $link->url('pocitac.index') ?>" class="<?= $aktivna === 'pocitac' ? 'aktivna' : '' ?>">Správa</a></li>
            <li><a href="<?= $link->url('komponent.index') ?>" class="<?= $aktivna === 'komponent' ? 'aktivna' : '' ?>">Komponenty</a></li>
        </ul>
    </nav>

    <div class="ucet">
        <a href="#" class="tlacidlo">Košík (0)</a>
        <a href="#" class="tlacidlo">Účet</a>
    </div>
</header>

<main>
    <?= $contentHTML ?>
</main>

<footer class="pata">
    <p>&copy; 2026 PCshop</p>
    <ul>
        <li><a href="#">Kontakt</a></li>
        <li><a href="#">Obchodné podmienky</a></li>
    </ul>
</footer>

</body>
</html>