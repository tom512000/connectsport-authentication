<?php

declare(strict_types=1);

use Entity\Exception\EntityNotFoundException;
use Entity\User;
use Html\Helper\Dumper;
use Html\UserProfile;

$html = <<<HTML
<!doctype html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Test rapide des classes User et UserProfile</title>
    </head>
    <body>

HTML;

$user1 = User::findByCredentials('essai', 'toto');

$html .= Dumper::dump($user1);

$user1Profile = new UserProfile($user1);
$html .= $user1Profile->toHTML();

try {
    User::findByCredentials('NOT-ESSAI', 'TOTO');
    $html .= '<div style="color:red;">EntityNotFoundException?</div>';
} catch (EntityNotFoundException) {
    $html .= '<div>User `NOT-ESSAI` not found: <span style="color:green;">great!</span></div>';
}

$html .= <<<HTML
    </body>
</html>
HTML;

echo $html;
