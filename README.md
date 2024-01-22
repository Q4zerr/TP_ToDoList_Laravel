# Projet ToDoList

## Prérequis

Avant de commencer, vous devez créer une base de données. Dans ce projet, nous avons utilisé MySQL Workbench pour créer une base de données nommée `Todolist`.

## Configuration

1. Ouvrez le fichier `.env` dans le répertoire racine du projet et mettez à jour les informations de la base de données pour correspondre à votre configuration. Si le fichier `.env` n'existe pas, copiez le fichier `.env.example` et renommez-le en `.env`.

## Démarrage du projet

1. Pour démarrer le projet, ouvrez une invite de commande ou un terminal, naviguez vers le répertoire du projet et exécutez la commande suivante :

`composer install`

Cette commande génère l'autoload et permet de démarrer le projet.

2. Ensuite, exécutez la commande suivante pour initialiser toutes les tables :

`php artisan migrate:fresh`

Vérifiez ensuite que les tables du projet ont bien été créées dans votre base de données `Todolist`.

3. Générez une clé d'application avec la commande suivante :

`php artisan key:generate`

Enregistrez le fichier `.env` pour qu'il soit pris en compte.

## Utilisation

Maintenant, si vous rafraîchissez la page, vous pouvez accéder librement à l'application et utiliser ses fonctionnalités.

**Note :** Les tâches sont personnelles et sont attribuées à l'utilisateur qui les a créées. Cependant, les catégories sont communes. Donc, si un utilisateur crée une catégorie, elle sera visible par tous les autres utilisateurs.
