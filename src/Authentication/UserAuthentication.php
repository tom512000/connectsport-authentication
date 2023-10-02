<?php

declare(strict_types=1);

namespace Authentication;

class UserAuthentication
{
    private const LOGIN_INPUT_NAME = 'login';
    private const PASSWORD_INPUT_NAME = 'password';

    public function loginForm(string $action, string $submitText = 'OK'): string
    {
        $html= <<<HTML
    <form name="loginForm" action="$action" method="post">
        <div>
            <label for="login">Login :</label>
            <input type="text" name="login" value="LOGIN"></br>
            <label for="password">Password :</label>
            <input type="password" name="password" value="PASSWORD"></br>
            <input type="submit" name="submit" value="OK">
        </div>
    </form>
    HTML;
        return $html;
    }
}
