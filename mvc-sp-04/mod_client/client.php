<?php

class Client
{

    private $parametre = []; // Tableau = $_REQUEST

    private $oControleur; // objet

    public function __construct($parametre)
    {

        $this->parametre = $parametre;

        $this->oControleur = new ClientControleur($this->parametre);
    }

    public function choixAction()
    {
        // Si variable (clef) action existe alors structure switch
        // Sinon par défaut lister()
        if (isset($this->parametre['action'])) {
            switch ($this->parametre['action']) {

                case 'form_consulter':
                    $this->oControleur->form_consulter();
                    break;
            }
        } else {
            $this->oControleur->lister();
        }
    }
}