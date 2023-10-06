<?php

declare(strict_types=1);

use Authentication\UserAuthentication;
use Html\AppWebPage;

// Création de l'authentification
$authentication = new UserAuthentication();

$webpage = new AppWebPage('Inscription');

// Production du formulaire de connexion
$form = $authentication->signForm('user-save.php');
$webpage->appendContent(
    <<<HTML
    <div class="insc_bloc">
        <h1>INSCRIPTION</h1>
        {$form}
    </div>
HTML
);


echo $webpage->toHTML();
