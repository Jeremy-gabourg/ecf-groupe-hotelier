
# Le Projet Groupe Hôtelier

Dans le cadre de l'ECF pour le **titre professionnel développeur web et web mobile**, un sujet d'évaluation a été mis à notre disposition.
Ce fichier décrit comment le lancer en local et comment le déployer.


## Fonctionnement en local

Cloner le projet github

```bash
  git clone https://github.com/Jeremy-gabourg/symfony_groupe_hotelier.git
```

Rentrer dans le dossier fraichement téléchargé 

```bash
  cd symfony_groupe_hotelier
```
Rentrer dans Mysql en local
```bash
  mysql -uroot -p
```
Créer une base de données vierge avec le nom déjà utilisé dans le fichier .env
```bash
  CREATE DATABASE symfony_groupe_hotelier
```
Quitter Mysql
```bash
  quit
```
Restaurer la sauvegarde de base de données
```bash
  mysql -uroot -p symfony_groupe_hotelier < backup.sql
```
Installer les dépendances npm

```bash
  npm install
```
Installer les dépendances composer

```bash
  composer install
```
Générer les fichiers CSS et Javascipt avec webpack

```bash
  npm run watch
```

- Démarrez le serveur Apache avec XAMPP, WAMPP ou tout autre distributeur Apache.

- Rendez vous sur la page web associé à votre serveur local (localhost par exemple).

**_Le site est servi en local!_**




## Déploiement

Pour déployer ce projet sur Heroku à partir du dossier racine de la copie local:

Se connecter à un compte Heroku
```bash
  heroku login
```
Lier/créer un remote Heroku :
- pour la création

```bash
  heroku create -a example-app
```
- pour l'ajout d'un remote existant
```bash
  heroku git:remote -a example-app
```
Configurer Heroku avec une variable de production
```bash
heroku config:set SYMFONY_ENV=prod
```
- Installer l'add-on JawsDB MySQL sur Heroku
- Récupérer les informations de connexion de la base de donnée dans le dashboard de JawsDB

Envoyer la sauvegarde de la base de données du projet (nommée 'backup.sql' dans le dossier) vers la base Heroku en ligne liée au remote
```bash
mysql -h NEWHOST -u NEWUSER -pNEWPASS NEWDATABASE < backup.sql
```
Configurer les variables d'environnement en production
```bash
  composer dump-env prod
```
```bash
  export APP_ENV=prod
```
Mettre la variable APP_SECRET d'Heroku à jour avec celle indiquée dans le fichier .env.local.php fraichement créé
```bash
  heroku config:set APP_SECRET=coller_la_valeur_de_variable
```
Mettre à jour la liste des dépendances en supprimant celles qui sont dédiées à l'enviromment de développement
```bash
  composer install --no-dev --optimize-autoloader
```
- Mettre à jour le fichier .env.local.php avec les informations de la base de données ('connection string' dans le dashboard de JawsDB)

Vider le cache symfony
```bash
APP_ENV=prod APP_DEBUG=0 php bin/console cache:clear
```
Installer le buildpack NodeJs d'Heroku pour la génération des fichiers avec webpack
```bash
heroku buildpacks:set heroku/nodejs --index 2
```
Vérifier que le buildpack s'est bien ajouté à celui de PHP
```bash
heroku buildpacks
```
Si PHP n'apparait pas dans la liste obtenue, ajouter la prise en compte de PHP également
```bash
heroku buildpacks:set heroku/php --index 1
```
Pousser le code sur le remote Heroku
```bash
git push heroku main
```
**_Le site est déployé sur Heroku!_**
## Auteur

Jérémy GABOURG


