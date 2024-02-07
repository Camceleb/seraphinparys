<?php

class ProfilModele extends Modele
{
    private $parametre = []; // $_REQUEST

    public function __construct($parametre)
    {

        $this->parametre = $parametre;
    }

    public function getListeProfil()
    {

        $sql = 'SELECT * FROM vendeur WHERE codev = ?';

        $idRequete = $this->executeRequete($sql, [
            $_SESSION['codev'],
        ]);

        // Création du tableau d'objets
        $unProfil = $idRequete->fetch(PDO::FETCH_ASSOC);

        $leProfil = new ProfilTable($unProfil);

        return $leProfil;

    }

    public function editProfil(ProfilTable $leProfil)
    {
        $sql = 'UPDATE vendeur SET adresse = ?, cp = ?, ville = ?, telephone = ? WHERE codev = ?';
        $idRequete = $this->executeRequete($sql, [
            $leProfil->getAdresse(),
            $leProfil->getCp(),
            $leProfil->getVille(),
            $leProfil->getTelephone(),
            $leProfil->getCodev(),
        ]);
        if ($idRequete) {
            ProfilTable::setMessageSucces("Modification effectuée avec succès.");
        }
    }


    public function editMotdepasse()
    {

        $sql = 'SELECT motdepasse FROM vendeur WHERE codev = ?';
        $idRequete = $this->executeRequete($sql, [
            $this->parametre['codev'],
        ]);

        $leProfil = new ProfilTable($idRequete->fetch(PDO::FETCH_ASSOC));

        return $leProfil;
    }
}