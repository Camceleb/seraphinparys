<?php

class AccueilControleur{

    private $parametre = []; // Un tableau associatif contenant le tableau $_REQUEST

    private $oVue; // Objet

    public function __construct($parametre){
        // Initialisation de la propriété $parametre ($_Request)
        $this->parametre = $parametre;
        // Chargement du script accueilVue.php
        require_once 'mod_accueil/vue/accueilVue.php';
        // Insertion de la classe AccueilVue
        $this->oVue = new AccueilVue($this->parametre);
    }

}
