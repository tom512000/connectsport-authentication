<?php

declare(strict_types=1);

use Html\AppWebPage;

$webPage = new AppWebPage('Connect Sport');
$webPage->appendCss('<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">');

$webPage->appendContent(
    <<<HTML
            <div class="menu_bloc">
                <h2>Tests</h2>
                <div class="ligne"></div>
                <p>Classe « <code>User</code> »</p>
                <a href="test-user.php">
                    <i class='bx bxs-caret-up-circle'></i>
                </a>
            </div>
            <div class="menu_bloc">
                <h2>Connexion</h2>
                <div class="ligne"></div>
                <p>Formulaire de connexion</p>
                <a href="form.php">
                    <i class='bx bxs-caret-up-circle'></i>
                </a>
            </div>
            <div class="menu_bloc">
                <h2>Inscription</h2>
                <div class="ligne"></div>
                <p>Formulaire d'inscription</p>
                <a href="form2.php">
                    <i class='bx bxs-caret-up-circle'></i>
                </a>
            </div>
HTML
);

echo $webPage->toHTML();
