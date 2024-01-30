<?php
session_start();
// Absolument RIEN au-dessus de session_start
require_once 'include/configuration.php';

// Appel de l'autoloader

Autoloader::chargerClasse();
if (!isset($_SESSION['login'])) {
    $_REQUEST['gestion'] = 'authentification';
} elseif (!isset($_REQUEST['gestion'])) {
    /// Ouverture par défault
    $_REQUEST['gestion'] = 'accueil';
}

//var_dump($_REQUEST);

// Création d'un objet instance routeur appelé
$oRouter = new $_REQUEST['gestion']($_REQUEST);

$oRouter->choixAction();




// login : mbaudot || sfillard
//mdp : sowhat


