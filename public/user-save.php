<?php

declare(strict_types=1);

use Authentication\UserAuthentication;

header('Location: ../auth.php');

$form = new UserAuthentication();
try {
    $form->setEntityFromQueryString();
} catch (\Authentication\Exception\ParameterException $e) {
}
session_start();
$_SESSION['login'] = $form->getUserFromAuth()->getLoginUser();
$_SESSION['lastName'] = $form->getUserFromAuth()->getLastName();
$_SESSION['firstName'] = $form->getUserFromAuth()->getFirstName();
$_SESSION['phone'] = $form->getUserFromAuth()->getPhone();
$_SESSION['mail'] = $form->getUserFromAuth()->getMail();
$_SESSION['status'] = $form->getUserFromAuth()->getStatus();