# Mini HelpDesk

Mini HelpDesk est une application de gestion de tickets simple, basée sur Laravel, pour gérer les demandes de support. Elle offre une interface légère pour créer des tickets, consulter leurs détails, ajouter des commentaires et filtrer les tickets par statut.

## Fonctionnalités

- Créer, modifier et consulter des tickets de support
- Suivre le statut et la priorité des tickets
- Ajouter des commentaires aux tickets
- Filtrer les tickets par statut ouvert ou résolu
- Libellés de l’interface en français et formatage des dates localisé
- Authentification et actions de base adaptées aux administrateurs

## Stack technique

- Laravel 12
- PHP 8.2+
- Templates Blade
- Configuration de base de données compatible MySQL / SQLite
- Vite pour les assets frontend

## Installation

1. Cloner le dépôt
   ```bash
   git clone https://github.com/Marshall-IronSide/helpdesk.git
   cd helpdesk
   ```

2. Installer les dépendances PHP
   ```bash
   composer install
   ```

3. Installer les dépendances frontend
   ```bash
   npm install
   ```

4. Créer le fichier d’environnement
   ```bash
   cp .env.example .env
   ```

5. Générer la clé de l’application
   ```bash
   php artisan key:generate
   ```

6. Exécuter les migrations
   ```bash
   php artisan migrate
   ```

7. Compiler les assets
   ```bash
   npm run build
   ```

8. Démarrer le serveur de développement
   ```bash
   php artisan serve
   ```

## Utilisation

- Ouvrir l’application dans votre navigateur
- S’inscrire ou se connecter
- Créer un nouveau ticket depuis le tableau de bord
- Gérer le statut des tickets et les commentaires

## Tests

Exécuter la suite de tests avec :

```bash
php artisan test
```

## Licence

Ce projet est open source et disponible sous licence MIT.
