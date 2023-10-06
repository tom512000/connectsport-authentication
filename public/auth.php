<?php

use Authentication\Exception\AuthenticationException;
use Authentication\UserAuthentication;
use Html\AppWebPage;

$authentication = new UserAuthentication();

$p = new AppWebPage('Mon profil');

if ($_POST) {
    try {
        // Tentative de connexion
        $user = $authentication->getUserFromAuth();
        // Si connexion réussie, affichage du profil
        $p->appendContent(
            <<<HTML
        <div class="profile">
            <h1>Mon Profil</h1>
            <p class="title">IDENTIFIANT</p>
            <p class="respo">{$user->getLoginUser()}</p>
            <p class="title">PRENOM</p>
            <p class="respo">{$user->getFirstName()}</p>
            <p class="title">NOM</p>
            <p class="respo">{$user->getLastName()}</p>
            <p class="title">NUMERO DE TELEPHONE</p>
            <p class="respo">{$user->getPhone()}</p>
            <p class="title">E-MAIL</p>
            <p class="respo">{$user->getMail()}</p>
            <p class="title">STATUT</p>
            <p class="respo">{$user->getStatus()}</p>
        </div>
        HTML
        );
    } catch (AuthenticationException $e) {
        // Récupération de l'exception si connexion échouée
        $p->appendContent(
            <<<HTML
        <div class="error">
            <h1>Erreur</h1>
            <p>Échec d'authentification.</p>
            <code>{$e->getMessage()}</code>
        </div>
        HTML
        );
    } catch (Exception $e) {
        $p->appendContent(
            <<<HTML
        <div class="error">
            <h1>Erreur</h1>
            <p>Échec d'authentification.</p>
            <code>{$e->getMessage()}</code>
        </div>
        HTML
        );

    }
} else {
    session_start();
    $p->appendContent(
        <<<HTML
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
