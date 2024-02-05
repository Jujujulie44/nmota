# nmota

Projet 11 - Créez un site WordPress complexe pour une photographe freelance (du parcours "Développeur WordPress" avec OpenClassrooms)

Mission de ce projet
La mission est de développer le site sous WordPress, du photographe Nathalie Mota, pour se faire connaître et pour partager les séries de photos avec ses clients.

Déroulement du projet
01 - Installation de WordPress.<br>
02 - Initialisation d'un thème personnalisé avec création de la structure de base.<br>
03 - Creation dans WorPress des pages vierges : "A propos", "Mentions légales", "Vie privée" et "Tous droits réservés".<br>
04 - Ajout la gestion des menus avec le thème depuis WordPress et création des menus avec les liens des pages qui seront gérées par WordPress.<br>
05 - Création de Header.php et Footer.php.<br>
06 - Ajout par Hook du bouton contact et création de la gestion de la popup contact avec jQuery.<br>
07 - Ajout d'un shortcode d'un autre bouton contact qui sera présent dans les pages des descriptions des photos.<br>
08 - Récupération de la référence de la photo avec jQuery pour la réinjecter dans le formulaire de contact.<br>
09 - Ajout du lien du post précédent et du post suivant avec les images en miniature.<br>
10 - Création de la première version de la page d'accueil avec présentation des 8 premières photos.<br>
11 - La taxonomie (pour les catégories et les formats) a été initialement configurée dans CPT. Transfert dans ACF et mise en place de la création des fichiers de sauvegarde / exportation json dans le thème.<br>
12 - Mise en place de l'affichage de 2 photos communes à la photo principale dans la page de détail.<br>
13 - Mise en place du hero avec une image aleatoire sur la page d'accueil.<br>
14 - Ajout de l'apparition au survol de la souris, des icones open lightbox et detail photo sur les photos (en fonction de leur emplacement) et de l'effet d'assombrissement de la photo.<br>
15 - Mise en place des filtres (par encore opérationnel) mais ils s'ajustent déjà en fonction des données qu'il y a dans WordPress.<br>
16 - Configuration des pages A PROPOS, MENTIONS LEGALES et VIE PRIVEE.<br>
17 - Ajout avec un hook de la mention "TOUS DROITS RESERVES" dans le footer.<br>
18 - Modification du lien Contact pour pouvoir l'intégrer directement dans le menu dans WP et suppression de son ajout par Hook.<br>
19 - Activation du fonctionnements des filtres avec gestion par GET.<br>
20 - Mise en place d'une lightbox pour les photos avec JS et CSS (source grafikart.fr).<br>
21 - Mise en place de la gestion des flèches avec JS sur les filtres.<br>
22 - Mise ne place du padding des photos sur la page d'accueil avec gestion des filtres<br>
23 - Création du bouton pour le menu hambuger<br>
24 - Mise en place du passage automatique du menu classique au menu hambuger en fonction de la largeur<br>
25 - Création du menu pour mobile<br>
26 - Mise en place de la gestion des flèches photo précédente et photo suivante + affichage des informations demandées (nom, années et catégorie)<br>
27 - Mise en place de la gestion du scrolling horizontal des filtres avec l'aide de Swiper<br>
28 - Modification de la gestion des filtres avec gestion par Ajax pour ne pas avoir la page qui se recharge à chaque fois<br>
29 - Mise en place d'url dynamique pour les requettes Ajax<br>
30 - Ajout de contrôles pour les requettes ajax et éviter les injections SQL<br>