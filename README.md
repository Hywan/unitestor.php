![DevLog JDév'](http://devlog.cnrs.fr/lib/tpl/devlog/images/logo.png)

Les [Journées du DEVeloppement](http://devlog.cnrs.fr/jdev2013) logiciel de
l'Enseignement Supérieur et de la Recherche se tiendront les 4, 5 et 6 septembre
2013 à l’Ecole Polytechnique à Palaiseau (Essonne).

Tous les acteurs de la communauté ESR qui interviennent sur les différents
aspects du développement et du cycle de vie du logiciel sont potentiellement
intéressés. Cette manifestation est également ouverte aux industriels.

# UniTestor.php

`UniTestor.php` est le projet pour l'[atelier
T6.A4](http://devlog.cnrs.fr/jdev2013/t6.a4).

## Outils à votre disposition

Ce projet utilise [atoum](http://atoum.org), un framework xUnit pour PHP, et
[Hoa](http://hoa-project.net), un ensemble de bibliothèques PHP.

Une machine virtuelle est mise à votre disposition pour l'atelier dans laquelle
tout est pré-installé. Quelques commandes à connaître (dans un terminal) :

  * `bigpull` pour mettre à jour tous les outils dont nous dépendons ;
  * `gosource` pour aller dans le dossier `Source/Unitestor/` du projet ;
  * `gotest` pour aller dans le dossier `Test/Unitestor/` du projet.

## Exemples d'utilisation

Éditer un fichier peut se faire via vim (`vi`) ou PHPStorm (`phpstorm`) :

    $ gosource
    $ vi Robot.php

Exécuter les tests de `Robot.php` :

    $ gotest
    $ atoum Robot.php

Exécuter tous les tests :

    $ gotest
    $ atoum --test-all