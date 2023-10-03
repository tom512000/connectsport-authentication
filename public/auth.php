<?php

use Authentication\Exception\AuthenticationException;
use Authentication\UserAuthentication;
use Html\AppWebPage;

$authentication = new UserAuthentication();

$p = new AppWebPage('Authentification');

try {
    // Tentative de connexion
    $user = $authentication->getUserFromAuth();
    if (3 == $user->getStatus()) {
        header('auth3.php');
    }
    // Si connexion réussie, affichage du profil
    $p->appendContent(<<<HTML
    <h1>Mon Profil</h1>
    <div>Identifiant : {$user->getLoginUser()}</div>
    <div>Prenom : {$user->getFirstName()}</div>
    <div>Nom : {$user->getLastName()}</div>
    <div>Numero de Telephone : {$user->getPhone()}</div>
    <div>E-Mail : {$user->getMail()}</div>
HTML
    );
} catch (AuthenticationException $e) {
    // Récupération de l'exception si connexion échouée
    $p->appendContent("Échec d'authentification&nbsp;: {$e->getMessage()}");
} catch (Exception $e) {
    $p->appendContent("Un problème est survenu&nbsp;: {$e->getMessage()}");
}

// Envoi du code HTML au navigateur du client
echo $p->toHTML();
