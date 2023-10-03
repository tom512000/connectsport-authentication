<?php

declare(strict_types=1);

namespace Entity;

use Database\MyPdo;
use Entity\Exception\EntityNotFoundException;

class User
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $loginUser;
    private string $mail;
    private string $phone;
    private int $status;

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getLoginUser(): string
    {
        return $this->loginUser;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @throws EntityNotFoundException
     */
    public static function findByCredentials(string $login, string $password): self
    {
        $stmt = MyPDO::getInstance()->prepare(
            <<<'SQL'
        SELECT ID_user,lastName,firstName,loginUser,mail,phone,status
        FROM Utilisateur
        WHERE loginUser= ?
        AND sha512pass=SHA2(?,512)
       SQL
        );
        $stmt->setFetchMode(MyPDO::FETCH_CLASS, User::class);
        $stmt->execute([$login, $password]);
        if (!($user = $stmt->fetch())) {
            throw new EntityNotFoundException('Invalid Credentials');
        } else {
            return $user;
        }
    }
}
