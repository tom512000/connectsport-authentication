<?php

declare(strict_types=1);

use Authentication\UserAuthentication;
use Html\AppWebPage;

// Création de l'authentification
$authentication = new UserAuthentication();

$webpage = new AppWebPage('Inscription');

// Production du formulaire de connexion
$form = $authentication->signForm('user-save.php');
$webpage->appendContent(<<<HTML
    {$form}
HTML
);


echo $webpage->toHTML();
