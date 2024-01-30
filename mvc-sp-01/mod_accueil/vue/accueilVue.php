<?php

class AccueilVue
{

    private $parametre = []; // Un tableau associatif contenant le tableau $_REQUEST

    public function __construct($parametre)
    {
        // Initialisation de la propriété $parametre ($_Request)
        $this->parametre = $parametre;

        $titrePrincipal = "Séraphin PARYS";

        require_once 'mod_accueil/vue/vue.php';
    }

}
