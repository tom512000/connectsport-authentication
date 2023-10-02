<?php

declare(strict_types=1);

namespace Authentication;

use Authentication\Exception\AuthenticationException;
use Authentication\Exception\ParameterException;
use Entity\Exception\EntityNotFoundException;
use Entity\User;

class UserAuthentication
{
    private const LOGIN_INPUT_NAME = 'login';
    private const PASSWORD_INPUT_NAME = 'password';

    public function loginForm(string $action, string $submitText = 'OK'): string
    {
        $html = <<<HTML
    <form name="loginForm" action="$action" method="post">
        <label class="login" for="login">IDENTIFIANT</label><br>
        <input class="login" type="text" name="login" placeholder="Entrez l'identifiant" required><br>
        <label class="password" for="password">MOT DE PASSE</label><br>
        <input class="password" type="password" name="password" placeholder="Entrez le mot de passe" required><br>
        <input class="button" type="submit" name="submit" value="SE CONNECTER">
    </form>
    HTML;
        return $html;
    }

    /**
     * @throws EntityNotFoundException
     */
    public function getUserFromAuth(): User
    {
        try {
            User::findByCredentials($_POST['login'], $_POST['password']);
        } catch (AuthenticationException) {
        }

        return User::findByCredentials($_POST['login'], $_POST['password']);
    }

    public function signForm(string $action, string $submitText = 'OK'): string
    {
        return "
        <form name=\"ArtistForm\" action='$action' method='post'>
            <div class='ajout'>
                <label for='login'>Login :</label>
                <input type='text' name='login' id='login' placeholder='login' required> 
            </div>
            <div class='ajout'>
                <label for='password'>Mot de Passe :</label>
                <input type='password' name='password' id='password' placeholder='password' required> 
            </div>
             <div class='ajout'>
                <label for='firstName'>Prénom :</label>
                <input type='text' class='firstName' name='firstName' id='firstName' placeholder='Prénom' required>          
            </div>
            <div class='ajout'>
                <label for='lastName'>Nom :</label>
                <input type='text' name='lastName' id='lastName' placeholder='Nom' required> 
            </div>
            <div class='ajout'>
                <label for='phone'>Tel :</label>
                <input type='text' name='phone' id='phone' placeholder='00 00 00 00 00' required> 
            </div>
            <div class='ajout'>
                <label for='mail'>E-Mail :</label>
                <input type='text' name='mail' id='mail' placeholder='adresse.mail@exemple.com' required>
            </div>
            <div class='button'>
                <button type='submit'>Enregistrer</button>
            </div>

        </form>
        ";
    }

    /**
     * @throws ParameterException
     */
    public function setEntityFromQueryString(): void
    {
        if (ctype_digit(intval($_POST['id']))) {
            $id = intval($_POST['id']);
        } else {
            $id = null;
        }
        if ('' == $_POST['login'] or '' == $_POST['password'] or '' == $_POST['firstName'] or '' == $_POST['lastName'] or '' == $_POST['phone'] or '' == $_POST['mail']) {
            throw new ParameterException('Paramètre invalide');
        }
        $login = $_POST['login'];
        $password = $_POST['password'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $phone = $_POST['phone'];
        $mail = $_POST['mail'];
        User::create($login, $password, $firstName, $lastName, $phone, $mail, $id);
    }
}
