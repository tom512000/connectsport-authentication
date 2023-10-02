<?php

declare(strict_types=1);

use Html\AppWebPage;

$webPage = new AppWebPage('ConnectSport - authentification');

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
    <h2>Inscription</h2>
    <ul>
        <li><a href="form2.php">Formulaire d'inscription</a></li>
</ul>
HTML
);

echo $webPage->toHTML();
