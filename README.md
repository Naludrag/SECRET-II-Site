# SECRET II : Secure Environment for automatic test grading, part 2 - Web Site

> Travail de Bachelor 2020-2021
>
> Auteur : Stéphane Teixeira Carvalho
>
> Basé sur le travail de : Caroline Monthoux
>
> Date : 30.07.2021

Ce document va expliquer l'utilité des différents fichiers et du résultat graphique de ceux-ci si cela est le cas.
Le projet va utiliser ce site pour mettre à disposition une multitude de fonctionnalités regroupée à un seul endroit qui sera http://localhost.

## Dossier Images
Dossier contenant les images qui seront utilisées pour le site web.

## Page index.html
Page d'accueil du site web. Elle va contenir des liens vers les différentes fonctionnalités du serveur.

![index](./imagesREADME/index.PNG)

## Page block_sites.php
Page utilisée pour créer et démarrer la fonctionnalité de blocage de site. Sur la gauche, un formulaire servira à générer un fichier de configuration. Puis, sur la droite vous trouverez un texte expliquant comment lancer un script permettant de démarrer mitmproxy correctement.

Les sites web indiqués seront ceux non accessibles pendant la durée du test.

Pour le formulaire, vous pouvez ajouter des sites web à une liste. Celle-ci s'agrandira au fur et à mesure et ensuite, une fois ceux-ci choisis, vous devez entrer le nom du fichier. Lorsque le tout est rempli, le bouton _**Download config file**_ va télécharger le fichier en local sur la machine.

![block_sites](./imagesREADME/block_sites.PNG)

Pour plus d'information sur le script veuilliez vous référer au dépôt https://github.com/Naludrag/SECRET-II-Installation contenant un fichier `Annexe B - Utilisation Script Python` dans le dossier `Installation/Annexe`.

## Page files.php
Page servant à envoyer des dossiers aux élèves ou à télécharger des fichiers de ceux-ci. Elle contient donc deux fonctionnalités qui seront expliquées séparément. Par défaut, c'est **Get Tests** qui est affichée, mais vous pouvez changer de méthode en cliquant sur les boutons en bas de page.

![files](./imagesREADME/files.PNG)

### Get Tests
Permets de créer un zip contenant tous les documents du dossier _tests_ des élèves. Une liste déroulante sera mise à disposition pour choisir ceux pour lesquels il faut télécharger des fichiers. Une fonction de recherche est également disponible si la liste est trop longue pour les retrouver.

Il est possible de spécifier un dossier à l'intérieur de _tests_ si tous les élèves l'ont créé dans l'entrée utilisteur en fin de formulaire. Lorsque le bouton _**Search for the tests**_ est cliqué un résultat sera affiché sur la droite de la page et vous pourrez télécharger un zip.

![get_tests](./imagesREADME/Get_Tests.PNG)

### Send Files
Cette deuxième partie permet d'envoyer des fichiers aux élèves. Le formulaire sera très similaire à celui montrer précédemment. Le seul changement se situera à la fin de celui-ci. Au lieu d'avoir une entrée utilisateur, un bouton _Choose a file_ sera maintenant disponible pour choisir le fichier à envoyer.

Une fois le choix effectué, lorsque le bouton _**Send files to students**_ sera pressé le résultat sera affiché sur la droite de la page.

## Fichier functions_for_files.php
Ce fichier ne sera pas une page comme les 2 précédents. Il contient toutes les fonctions php qui seront utilisées par la page _files.php_. Il permet donc à _files.php_ de fonctionner de manière désirée.
