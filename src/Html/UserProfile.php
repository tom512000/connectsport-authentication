<?php

declare(strict_types=1);

namespace Html;

use Entity\User;

class UserProfile
{
    use StringEscaper;

    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    public function toHtml(): string
    {
        $html = <<<HTML
            <a>Nom : {$this->user->getFirstName()}</a>
            <a>Prenom : {$this->user->getLastName()}</a>
            <a>Login : {$this->user->getLogin()}</a>
            <a>Mail : {$this->user->getMail()}</a>
            <a>Telephone : {$this->user->getPhone()}</a>
        HTML;

        return $html;
    }
}
