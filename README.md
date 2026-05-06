# 📦 Mon Application Fullstack

## 🚀 Lancement de l'application

### ✅ Prérequis

Assure-toi d’avoir installé :

- PHP ≥ 8.1 et [Composer](https://getcomposer.org/)
- Node.js ≥ 16 et [npm](https://www.npmjs.com/)
- Une base de données fonctionnelle (ex : MySQL)
- Le fichier `.env` de l'appication laravel doit être configuré dans `/src`.

---

## 🔧 Installation et démarrage avec MAMP

# Installer les dépendances PHP

composer install

# Copier et configurer le fichier d'environnement

1. Se déplacer dans le dossier SRC
   cd src

2. cp .env.example .env

Remarque: Le fichier .env doit être créer dans le dossier src

# Générer la clé d'application

php artisan key:generate

# Configurer la base de données dans le .env, puis exécuter les migrations

php artisan migrate

# Lancer le serveur de développement Laravel

php artisan serve

```

```

## 🔧 Installation et démarrage avec docker

docker exec php sh -c "composer install"

docker exec php sh -c "php artisan key:generate"

docker exec php sh -c "php artisan migrate"

docker exec php sh -c "php artisan serve"

## Créer un controller

Entrer dans le container PHP

docker exec -it php sh
Depuis le terminal du container:

php artisan make:controller <nom du conbtroller>

## Créer une view

Entrer dans le container PHP
docker exec -it php sh

php artisan make:view <nom de la view>

## Créer un model

Entrer dans le container PHP
docker exec -it php sh

php artisan make:model <nom du modele>

## Créer une migration

Entrer dans le container PHP
docker exec -it php sh

php artisan make:migration <nom de la migration>

## Migrer les modifications de schema vers la base de données
