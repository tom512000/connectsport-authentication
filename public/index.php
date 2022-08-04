<?php

declare(strict_types=1);

use Html\AppWebPage;

$webPage = new AppWebPage('Gestion des données de session - authentification');

$webPage->appendContent(
    <<<HTML
    <h2>Tests</h2>
    <ul>
        <li><a href="test-user.php">Classe « <code>User</code> »</a>
    </ul>
    <h2>Connexion</h2>
    <ul>
        <li><a href="form.php">Formulaire de connexion</a>
    </ul>
    <h2>Pages</h2>
    <ul>
        <li><a href="connected.php">Zone membre connecté</a>
        <li><a href="authenticated.php">Zone membre utilisateur</a>
    </ul>
HTML
);

echo $webPage->toHTML();
