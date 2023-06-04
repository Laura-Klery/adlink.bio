# Adlink.bio

Création d'un CMS permettant de générer une landing page customisable par utilisateur avec Symfony. Projet fictif.

## Le CMS comporte : 

* Un **espace administrateur** permettant de gérer l'ensemble des comptes clients.
* Chaque client a un **espace membre** pour gérer uniquement sa landing page.

## Les cinq sections de la landing page : 

* Upload d'un **logo** et renseignement d'un **titre** et d'une **baseline**
* Possibilité d'intégrer une **vidéo Youtube**
* Affichier des **codes promos**
* Spécifier des **liens vers des ressources** externes (blog, boutiques, évènements...)
* Sécifier des **liens vers ses réseaux sociaux** (Dans un premier temps : Instagram, Facebook, Tiktok, Twitter, Github, Youtube)

La landing page publique est accessible à l'URL suivante : `https://adlink.bio/{slug-client}`

Il est également possible de customer l'interface en y définissant globalement une **typographie** et en fonction de la section, il sera faisable de changer les **couleurs**. L'utilisateur pourra également définir si une section sera **visible** ou non.


### Procédure de lancement du projet :
1. `composer install`

2. `composer update`

3. `npm install`

4. `symfony console doctrine:database:create`

5. `symfony console make:migration`

6. `symfony console doctrine:migrations:migrate`

7. Importer la base de données **adlinklocal.sql** dans la base de données présente dans **phpMyAdmin**

8. `symfony server:start -d`

9. `npm run watch`

#### Pour fermer le server symfony

1. contrôle C
2. `symfony server:stop`
