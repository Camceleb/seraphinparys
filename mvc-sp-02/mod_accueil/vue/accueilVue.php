<?php

class AccueilVue
{

    private $parametre = []; // Un tableau associatif contenant le tableau $_REQUEST

    private $tpl; // Objet de type Smarty

    public function __construct($parametre)
    {
        // Initialisation de la propriété $parametre ($_Request)
        $this->parametre = $parametre;

        $this->tpl = new Smarty();
        $tabBord = 'Ici le tableau de bord';

        $this->tpl->assign('titrePrincipal', "Séraphin PARYS");

        $this->tpl->assign('deconnexion', "Déconnexion");

        $this->tpl->assign('login', "Ici le nom du vendeur connecté");

        $this->tpl->assign('tabBord', $tabBord);

        $this->tpl->display('mod_accueil/vue/accueilVue.tpl');

//        $titrePrincipal = "Séraphin PARYS";
//
//        require_once 'mod_accueil/vue/vue.php';
    }

}
