<?php

declare(strict_types=1);

namespace Authentication;

use Authentication\Exception\AuthenticationException;
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
        <div>
            <label for="login">Login :</label>
            <input type="text" name="login" placeholder="LOGIN"></br>
            <label for="password">Password :</label>
            <input type="password" name="password" placeholder="PASS"></br>
            <input type="submit" name="submit" value="OK">
        </div>
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
}
