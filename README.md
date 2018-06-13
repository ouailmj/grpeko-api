EKO Project
========

Groupe EKO.

# Installation
* Créer une base de données napier_db dans votre MySQL.

* Cloner le projet dans votre répertoire de travail
```
 git clone https://github.com/multiinfo/groupeeko-api.git
```
* Installer les dépendances
```
 cd sobek && composer install
```
* Initialiser la base de données

```
 php app/console doctrine:schema:update --force
 php app/console doctrine:fixtures:load -n
```

* Lancer le serveur
```
 php app/console server:run
```

Vous pouvez maintenant accéder à l'application à l'adresse http://localhost:8000

Si vous avez des problèmes vous pouvez créer un issue https://github.com/multiinfo/groupeeko-api/issues/new pour expliquer votre problème.
