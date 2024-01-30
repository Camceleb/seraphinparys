<?php

class Autoloader
{

    public static function chargerClasse()
    {

        spl_autoload_register([__CLASS__, 'autoload']);

    }

    private static function autoload($maClasse)
    {
        // $maClasse contient le nom de la classe appelée
        // Accueil, AccueilControleur, AccueilVue, ClientControleur, ...
        // Transformation avec le nom de la classe en minuscule (première lettre)
        $maClasse = lcfirst($maClasse);

        // Créer un tableau avec l'arborescence des modules
        // contenant les classes pouvant être appelées
        $repertoires = [
            'mod_accueil/',
            'mod_accueil/controleur/',
            'mod_accueil/modele/',
            'mod_accueil/vue/',
            'mod_client/',
            'mod_client/controleur/',
            'mod_client/modele/',
            'mod_client/vue/',
            'mod_authentification/',
            'mod_authentification/controleur/',
            'mod_authentification/modele/',
            'mod_authentification/vue/',
        ];

        foreach ($repertoires as $repertoire) {
            // Vérification si fichier attendu existe
            // accueil.php, accueilControleur.php, clientControleur.php
            // clientModele.php, ...
            if (file_exists($repertoire.$maClasse.'.php')){
                require_once ($repertoire.$maClasse.'.php');
                return;
            };
        }
    }

}