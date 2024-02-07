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
        // Création d'une instance (objet) de type AccueilControleur
        $this->oControleur = new AccueilControleur($parametre);
    }

    public function choixAction()
    {
        // Structure switch : ajouter, modifier, supprimer, ... (Pour une orientation en écriture BD)
        // form_ajouter, frm_modifier, form_consulter, ...
        // Par défaut, si aucune action précisée, alors => lister()
        $this->oControleur->lister();


    }
}
