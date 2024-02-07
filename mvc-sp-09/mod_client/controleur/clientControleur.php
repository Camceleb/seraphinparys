<?php

class ClientControleur
{

    private $parametre = []; // $_REQUEST
    private $oVue; // objet
    private $oModele; // objet

    public function __construct($parametre)
    {

        $this->parametre = $parametre;

        $this->oModele = new ClientModele($this->parametre);

        $this->oVue = new ClientVue($this->parametre);
    }

    public function lister()
    {

        $clients = $this->oModele->getListeClient();

        $this->oVue->genererAffichageListe($clients);
    }

    public function form_consulter()
    {
        $client = $this->oModele->getUnClient();

        $this->oModele->stat01($client);

        $this->oVue->genererAffichageFiche($client);
    }

    public function form_ajouter()
    {
        $prepareClient = new ClientTable();

        $this->oVue->genererAffichageFiche($prepareClient);
    }

    public function form_modifier()
    {
        $client = $this->oModele->getUnClient();

        $this->oModele->stat01($client);

        $this->oVue->genererAffichageFiche($client);
    }


    public function ajouter()
    {
        // Je controle les données envoyées
        // (en provenance du formulaire | Saisie utilisateur)

        // SI problème survient ALORS
        // Retour au formulaire avec les données saisies
        // Ajout également d'un message d'erreur
        // ATTENTION : Aucune écriture en BD
        // SINON
        //Ecriture en BD
        // Retour à la liste des clients
        // Ajout également d'un message de type succès
        // FINSI

        $controleClient = new ClientTable($this->parametre);

        if ($controleClient->getAutorisationBD() == false) {

            $this->oVue->genererAffichageFiche($controleClient);

        } else {

            $this->oModele->addClient($controleClient);

            $this->lister();
        }
    }

    public function modifier()
    {
        // Même algo que pour ajouter

        $controleClient = new ClientTable($this->parametre);

        if ($controleClient->getAutorisationBD() == false) {

            $this->oVue->genererAffichageFiche($controleClient);

        } else {

            $this->oModele->editClient($controleClient);

            $this->lister();
        }
    }

    public function form_supprimer()
    {
        $client = $this->oModele->getUnClient();

        $this->oModele->stat01($client);

        $this->oVue->genererAffichageFiche($client);
    }

    public function supprimer()
    {
        // Un client possédant une commande ne peut pas être supprimé
        // Quel Algo ?
        // Si le codec du client est trouvé dans la table commande alors
        // suppression impossible + message associé
        // Sinon on supprime
        // retour à la liste avec message associé

        $controleSuppression = $this->oModele->suppressionPossible();

        if ($controleSuppression == false) {

            ClientTable::setMessageErreur('Ce client possède déjà une commande, la suppression est impossible.');

            $this->oVue->genererAffichageFiche($this->oModele->getUnClient());

        } else {

            $this->oModele->deleteClient();

            $this->lister();
        }

    }
}
