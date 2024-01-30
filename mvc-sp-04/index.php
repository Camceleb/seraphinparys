<?php

require_once 'include/configuration.php';

// Appel de l'autoloader

Autoloader::chargerClasse();

if (!isset($_REQUEST['gestion'])) {
    /// Ouverture par défault
    $_REQUEST['gestion'] = 'accueil';
}


// Création d'un objet instance routeur appelé
$oRouter = new $_REQUEST['gestion']($_REQUEST);

$oRouter->choixAction();






