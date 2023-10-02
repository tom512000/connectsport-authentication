<?php

declare(strict_types=1);

use Authentication\UserAuthentication;
use Html\AppWebPage;

// Création de l'authentification
$authentication = new UserAuthentication();

$webpage = new AppWebPage('Inscription');

// Production du formulaire de connexion
$webpage->appendCSS(<<<CSS
    form input {
        width : 4em ;
    }
CSS
);
$form = $authentication->signForm('user-save.php');
$webpage->appendContent(<<<HTML
    {$form}
HTML
);


echo $webpage->toHTML();
