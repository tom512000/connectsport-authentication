<?php

declare(strict_types=1);

namespace Authentication;

use Authentication\Exception\ParameterException;
use Entity\Exception\EntityNotFoundException;
use Entity\User;

class UserAuthentication
{
    private const LOGIN_INPUT_NAME = 'login';
    private const PASSWORD_INPUT_NAME = 'password';

    public function loginForm(string $action, string $submitText = 'OK'): string
    {
        return <<<HTML
    <form name="loginForm" action="$action" method="post">
        <label class="login" for="login">IDENTIFIANT</label><br>
        <input class="login" type="text" name="login" placeholder="Entrez l'identifiant" required><br>
        <label class="password" for="password">MOT DE PASSE</label><br>
        <input class="password" type="password" name="password" placeholder="Entrez le mot de passe" required><br>
        <input class="button" type="submit" name="submit" value="SE CONNECTER">
    </form>
    HTML;
    }

    /**
     * @throws EntityNotFoundException
     */
    public function getUserFromAuth(): User
    {
        try {
            User::findByCredentials($_POST['login'], $_POST['password']);
        } catch (EntityNotFoundException) {
        }

        return User::findByCredentials($_POST['login'], $_POST['password']);
    }

    public function signForm(string $action, string $submitText = 'OK'): string
    {
        return <<<HTML
        <form name="{ArtistForm}" action='$action' method='post'>
            <div class='ajout'>
                <label class='insc' for='login'>IDENTIFIANT</label><br>
                <input class="insc" type='text' name='login' id='login' placeholder="Entrez l'identifiant" required> 
            </div>
            <div class='ajout'>
                <label class='insc' for='password'>MOT DE PASSE</label><br>
                <input class="insc" type='password' name='password' id='password' placeholder='Entrez le mot de passe' required> 
            </div>
             <div class='ajout'>
                <label class='insc' for='firstName'>PRENOM</label><br>
                <input class="insc" type='text' class='firstName' name='firstName' id='firstName' placeholder='Entrez le prénom' required>          
            </div>
            <div class='ajout'>
                <label class='insc' for='lastName'>NOM</label><br>
                <input class="insc" type='text' name='lastName' id='lastName' placeholder='Entrez le nom' required> 
            </div>
            <div class='ajout'>
                <label class='insc' for='phone'>NUMERO DE TELEPHONE</label><br>
                <input class="insc" type='text' name='phone' id='phone' placeholder='Entrez le numéro de téléphone' required> 
            </div>
            <div class='ajout'>
                <label class='insc' for='mail'>E-MAIL</label><br>
                <input class="insc" type='text' name='mail' id='mail' placeholder="Entrez l'e-mail" required>
            </div>
            <div class='button'>
                <input class="button" type="submit" name="submit" value="S'INSCRIRE">
            </div>

        </form>
        HTML;
    }

    /**
     * @throws ParameterException
     */
    public function setEntityFromQueryString(): void
    {
        if ('' == $_POST['login'] or '' == $_POST['password'] or '' == $_POST['firstName'] or '' == $_POST['lastName'] or '' == $_POST['phone'] or '' == $_POST['mail']) {
            throw new ParameterException('Paramètre invalide');
        }
        $login = $_POST['login'];
        $password = $_POST['password'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $phone = $_POST['phone'];
        $mail = $_POST['mail'];
        User::create($login, $password, $firstName, $lastName, $phone, $mail);
    }
}
