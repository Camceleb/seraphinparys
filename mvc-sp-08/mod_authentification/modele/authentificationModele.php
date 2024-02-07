<?php

class AuthentificationModele extends modele
{

    private $parametre = []; // $_REQUEST

    public function __construct($parametre)
    {

        $this->parametre = $parametre;
    }

    public function rechercheVendeur(AuthentificationTable $authentificationEnCours)
    {

        $sql = 'SELECT * FROM vendeur WHERE login = ?';

        $idRequete = $this->executeRequete($sql, [
            $authentificationEnCours->getLogin(),
        ]);

        $authentificationExistant = $idRequete->fetch(PDO::FETCH_ASSOC);

        if ($idRequete->rowCount() == 1 && $authentificationEnCours->getLogin() == $authentificationExistant['login'] &&
            $authentificationEnCours->getMotdepasse() == $authentificationExistant['motdepasse']) {

            $_SESSION['login'] = $authentificationEnCours->getLogin();
            $_SESSION['prenomnom'] = $authentificationExistant['prenom'] . " " . $authentificationExistant['nom'];

            return true;
            // return true évite d'écrire un else
        }

        AuthentificationTable::setMessageErreur("Authentification invalide.");
        return false;

    }
}