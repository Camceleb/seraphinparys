<?php
class ProfilControleur{
    private $parametre = []; // $_REQUEST
    private $oVue; // objet
    private $oModele; // objet

    public function __construct($parametre)
    {

        $this->parametre = $parametre;

        $this->oModele = new ProfilModele($this->parametre);

        $this->oVue = new ProfilVue($this->parametre);
    }

    public function lister()
    {

        $profil = $this->oModele->getListeProfil();

        $this->oVue->genererAffichageFiche($profil);
    }



    public function modifier()
    {

        $controleProfil = new ProfilTable($this->parametre);

        if ($controleProfil->getAutorisationBD() == false) {

            $this->oVue->genererAffichageFiche($controleProfil);

        } else {

            $this->oModele->editProfil($controleProfil);

            $this->lister();
        }
    }


    public function valider()
    {

        $controleProfil = new ProfilTable($this->parametre);

        if ($controleProfil->getAutorisationBD() == false) {

            $this->oVue->genererAffichageFiche($controleProfil);

        } else {

            $this->oModele->editMotdepasse($controleProfil);

            $this->lister();
        }
    }

}