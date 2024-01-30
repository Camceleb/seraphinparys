<?php

class AuthentificationControleur
{
    private $parametre = []; // $_REQUEST
    private $oVue; // objet
    private $oModele; // objet

    public function __construct($parametre)
    {

        $this->parametre = $parametre;

        $this->oModele = new AuthentificationModele($this->parametre);

        $this->oVue = new AuthentificationVue($this->parametre);
    }

    public function form_authentification()
    {

        $prepareAuthentification = new AuthentificationTable();

        $this->oVue->genererAffichage($prepareAuthentification);
    }

    public function authentifier()
    {
        $controleAuthentification = new AuthentificationTable($this->parametre);

        if ($controleAuthentification->getAutorisationSession() == false ||
            $this->oModele->rechercheVendeur($controleAuthentification) == false) {

            $this->oVue->genererAffichage(($controleAuthentification));

        } else {
            header('Location:index.php');

        }
    }

    public function deconnecter(){
        session_destroy();
        $_SESSION = [];
        header('Location:index.php');
    }
}
