<?php

class Accueil
{

    private $parametre = []; // Un tableau associatif contenant le tableau $_REQUEST

    private $oControleur; // Objet instance du controleur

    public function __construct($parametre)
    {
        // Initialisation de la propriété $parametre ($_Request)
        $this->parametre = $parametre;
        // Chargement du script accueilControleur.php
        require_once 'mod_accueil/controleur/accueilControleur.php';
        // Création d'une instance
        $this->oControleur = new AccueilControleur($parametre);
    }


}
