<?php

class ProfilVue
{
    private $parametre = []; // $_REQUEST

    private $tpl; // Objet

    public function __construct($parametre)
    {

        $this->parametre = $parametre;

        $this->tpl = new Smarty();
    }

    public function chargementPrincipal()
    {
        $this->tpl->assign('titrePrincipal', "Séraphin PARYS");

        $this->tpl->assign('deconnexion', "Déconnexion");

        $this->tpl->assign('login', $_SESSION['prenomnom']);
    }

    public function genererAffichageFiche($profil)
    {
        $this->chargementPrincipal();

        $this->tpl->assign('titrePage', 'Profil utilisateur');

        $this->tpl->assign('profil', $profil);

        $this->tpl->display('mod_profil/vue/profilListeVue.tpl');
    }

}