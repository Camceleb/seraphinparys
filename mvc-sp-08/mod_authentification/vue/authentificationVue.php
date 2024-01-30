<?php

class AuthentificationVue
{
    private $parametre = []; // $_REQUEST

    private $tpl; // Objet

    public function __construct($parametre)
    {

        $this->parametre = $parametre;

        $this->tpl = new Smarty();
    }

    public function genererAffichage($unVendeur)
    {
        $this->tpl->assign('titreVue', 'Séraphin PARYS');
        $this->tpl->assign('action', 'authentifier');
        $this->tpl->assign('unVendeur', $unVendeur);
        $this->tpl->display('mod_authentification/vue/authentificationVue.tpl');
    }
}