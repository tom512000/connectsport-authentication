<?php

declare(strict_types=1);

use Entity\Exception\EntityNotFoundException;
use Entity\User;
use Html\AppWebPage;
use Html\Helper\Dumper;
use Html\UserProfile;

$p = new AppWebPage('Test rapide des classes User et UserProfile');

try {
    $user1 = User::findByCredentials('guesso01', 'monmdpdefou');
} catch (EntityNotFoundException $e) {
}

$p->appendContent(Dumper::dump($user1));

$user1Profile = new UserProfile($user1);
$p->appendContent($user1Profile->toHTML());

try {
    User::findByCredentials('NOT-ESSAI', 'TOTO');
    $p->appendContent('<div style="color:red;">EntityNotFoundException?</div>');
} catch (EntityNotFoundException) {
    $p->appendContent('<div>User `NOT-ESSAI` not found: <span style="color:green;">great!</span></div>');
}

echo $p->toHTML();
