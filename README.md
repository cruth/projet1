Projet1 - Filmothèque
=======

A Symfony project created on March 27, 2016, 4:37 pm.

* Générer le bundle Filmotheque
    * php app/console generate:bundle
* Générer les entités Categorie, Acteur et Film
    * php app/console doctrine:generate:entity FilmothequeBundle:Categorie
    * php app/console doctrine:generate:entity FilmothequeBundle:Acteur
    * php app/console doctrine:generate:entity FilmothequeBundle:Film
* Modifier les annotations des entités générées
* Valider les schémas des entités
    * php app/console doctrine:schema:validate
* Générer la base de données
    * php app/console doctrine:database:create
* Générer les tables
    * php app/console doctrine:schema:create
* Installer le bundle Doctrine
    * php composer.phar doctrine/doctrine-fixtures
* Créer les data fixtures LoadCategorieData, LoadActeurData et LoadFilmData
    * Ajouter et utiliser des références
* Charger les data fixtures
    * php app/console doctrine:fixtures:load
* Générer les vues (liste et formulaires)
    * php app/console doctrine:generate:crud
* Ajouter la méthode __toString dans les entités Acteur, Categorie et Film