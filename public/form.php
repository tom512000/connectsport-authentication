<?php

declare(strict_types=1);

use Authentication\UserAuthentication;
use Html\AppWebPage;

// Création de l'authentification
$authentication = new UserAuthentication();

$p = new AppWebPage('Authentification');

// Production du formulaire de connexion
$form = $authentication->loginForm('auth.php');
$p->appendContent(<<<HTML
    <div class="form_bloc">
        <h1>Connexion</h1>
        {$form}
        <p>Exemple : guesso01 / monmdpdefou</p>
    </div>
HTML
);

echo $p->toHTML();
