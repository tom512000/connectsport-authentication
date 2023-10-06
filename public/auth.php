<?php

use Authentication\Exception\AuthenticationException;
use Authentication\UserAuthentication;
use Html\AppWebPage;

$authentication = new UserAuthentication();

$p = new AppWebPage('Authentification');

if ($_POST) {
    try {
        // Tentative de connexion
        $user = $authentication->getUserFromAuth();
        // Si connexion réussie, affichage du profil
        $p->appendContent(<<<HTML
        <h1>Mon Profil</h1>
        <div>Identifiant : {$user->getLoginUser()}</div>
        <div>Prenom : {$user->getFirstName()}</div>
        <div>Nom : {$user->getLastName()}</div>
        <div>Numero de Telephone : {$user->getPhone()}</div>
        <div>E-Mail : {$user->getMail()}</div>
        <div>Statut : {$user->getStatus()}</div>
    HTML
        );
    } catch (AuthenticationException $e) {
        // Récupération de l'exception si connexion échouée
        $p->appendContent("Échec d'authentification&nbsp;: {$e->getMessage()}");
    } catch (Exception $e) {
        $p->appendContent("Un problème est survenu&nbsp;: {$e->getMessage()}");
    }
} else {
    session_start();
    $p->appendContent(<<<HTML
        <h1>Mon Profil</h1>
        <div>Identifiant : {$_SESSION['login']}</div>
        <div>Prenom : {$_SESSION['lastName']}</div>
        <div>Nom : {$_SESSION['firstName']}</div>
        <div>Numero de Telephone : {$_SESSION['phone']}</div>
        <div>E-Mail : {$_SESSION['mail']}</div>
        <div>Statut : {$_SESSION['status']}</div>
    HTML
    );
}
// Envoi du code HTML au navigateur du client
echo $p->toHTML();
