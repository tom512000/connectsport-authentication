# Authentifier des utilisateurs et simuler un mode connecté

## Auteur(s)
- Camille BOURGA (bour0087)
- Valentin CLADEL (clad0006)
- Baptiste SIMON (simo0170)
- Tom SIKORA (siko0001)

## Installation / Configuration

### Installation par `Composer`

Lancer `composer install` pour installer [PHP Coding Standards Fixer](https://cs.symfony.com/) et le configurer dans PhpStorm (le fichier `.php-cs-fixer.php` contient les règles personnalisées basées sur la recommandation [Symfony](https://symfony.com/doc/current/contributing/code/standards.html))

### Configurer PhpStorm

Configurer l'intégration de PHP Coding Standards Fixer dans PhpStorm en fixant le jeu de règles sur `Custom` et en désignant `.php-cs-fixer.php` comme fichier de configuration de règles de codage. 

### Base de données

Copier le fichier `.mypdo.ini.dist` en `.mypdo.ini` et modifier `.mypdo.ini` pour ajuster la configuration du serveur de base de données.

## Serveur Web local

### Sur Linux

Lancez le serveur Web local avec cette commande :
```bash
composer start
```

### Sur Windows

Lancez le serveur Web local avec cette commande :
```bash
composer start:w
```

### Accès au serveur Web
Naviguez alors à partir de cette adresse : <http://localhost:8000/>

## Style de codage

Le code suit la recommandation [Symfony](https://symfony.com/doc/current/contributing/code/standards.html) :
- il peut être contrôlé avec `composer test:cs`
- il peut être reformaté automatiquement avec `composer fix:cs`