<?php

class Profil
{
    private $parametre = []; // Tableau = $_REQUEST

    private $oControleur; // objet

    public function __construct($parametre)
    {

        $this->parametre = $parametre;

        $this->oControleur = new ProfilControleur($this->parametre);
    }

    public function choixAction()
    {
        if (isset($this->parametre['action'])) {
            switch ($this->parametre['action']) {

                case 'modifier' :

                    $this->oControleur->modifier();
                    break;

                case 'valider' :

                    $this->oControleur->valider();
                    break;
            }
        } else {


            $this->oControleur->lister();
        }
    }
}