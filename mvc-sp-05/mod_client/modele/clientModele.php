<?php

class ClientModele extends Modele
{

    private $parametre = []; // $_REQUEST

    public function __construct($parametre)
    {

        $this->parametre = $parametre;
    }


    public function getListeClient()
    {

        $sql = 'SELECT * FROM client';

        $idRequete = $this->executeRequete($sql);

        if ($idRequete->rowCount() > 0) {
            // Création du tableau d'objets
            while ($unCLient = $idRequete->fetch(PDO::FETCH_ASSOC)) {

                $listeClients[] = new ClientTable($unCLient);
            }

            return $listeClients;

        } else {

            return null;
        }
    }

    public function getUnClient()
    {

        $sql = 'SELECT * FROM client WHERE codec = ?';
        $idRequete = $this->executeRequete($sql, [
            $this->parametre['codec'],
        ]);

        $leCLient = new ClientTable($idRequete->fetch(PDO::FETCH_ASSOC));

        return $leCLient;
    }

    public function addClient(ClientTable $unClient){

        $sql = 'INSERT INTO client(nom, adresse, cp, ville, telephone) VALUES (?,?,?,?,?)';
        $idRequete = $this->executeRequete($sql, [
            $unClient->getNom(),
            $unClient->getAdresse(),
            $unClient->getCp(),
            $unClient->getVille(),
            $unClient->getTelephone(),
        ]);
        if($idRequete){
            ClientTable::setMessageSucces("Ajout effectué avec succès.");
        }

    }

}