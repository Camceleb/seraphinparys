<?php

require_once 'include/configuration.php';

// Appel de l'autoloader

Autoloader::chargerClasse();

if (!isset($_REQUEST['gestion'])) {
    /// Ouverture par défault
    $_REQUEST['gestion'] = 'accueil';
}

// Appel du routeur concerné par la valeur correspondante à la clef gestion
//require_once 'mod_' . $_REQUEST['gestion'] . '/' . $_REQUEST['gestion'] . '.php';

// Création d'un objet instance routeur appelé
$oRouter = new $_REQUEST['gestion']($_REQUEST);

$oRouter->choixAction();






