<?php

class Authentification
{
    private $parametre = []; // Un tableau associatif contenant le tableau $_REQUEST

    private $oControleur; // Objet instance du controleur

    public function __construct($parametre)
    {
        // Initialisation de la propriété $parametre ($_Request)
        $this->parametre = $parametre;

        // Création d'une instance (objet) de type AccueilControleur
        $this->oControleur = new AuthentificationControleur($parametre);
    }

    public function choixAction()
    {
        if (isset($this->parametre['action'])) {

            switch ($this->parametre['action']) {

                case 'authentifier':

                    $this->oControleur->authentifier();
                    break;

                case 'deconnecter':

                    $this->oControleur->deconnecter();
                    break;
            }

        } else {

            $this->oControleur->form_authentification();
        }
    }
}