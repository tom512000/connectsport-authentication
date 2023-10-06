<?php

declare(strict_types=1);

use Entity\Exception\EntityNotFoundException;
use Entity\User;
use Html\AppWebPage;
use Html\Helper\Dumper;
use Html\UserProfile;

$p = new AppWebPage('Test (User et UserProfile)');

try {
    $user1 = User::findByCredentials('guesso01', 'monmdpdefou');
} catch (EntityNotFoundException $e) {
}

$p->appendContent(
    <<<HTML
    <div class="test">
        <h1>Test</h1>
    HTML
);

$p->appendContent(Dumper::dump($user1));

try {
    User::findByCredentials('NOT-ESSAI', 'TOTO');
    $p->appendContent('<p>Utilisateur introuvable (EntityNotFoundException) : <span style="color:red;">BAD!</span></p>');
} catch (EntityNotFoundException) {
    $p->appendContent('<p>Utilisateur `NOT-ESSAI` introuvable : <span style="color:green;">GOOD!</span></p>');
}

$p->appendContent(
    <<<HTML
        </div>
    HTML
);

echo $p->toHTML();
