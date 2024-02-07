<?php

class ProfilTable
{
    private $codev;
    private $nom;
    private $prenom;
    private $adresse;
    private $cp;
    private $ville;
    private $telephone;
    private $totalVentes;
    private $login;
    private $motdepasse;
    private $confirmation;
    private $autorisationBD = true;
    private static $messageErreur = "";
    private static $messageSucces = "";


    public function hydrater(array $data)
    {
        foreach ($data as $key => $valeur) {
            // Concaténer la lef pour rechercher le setter à appeler
            $setter = 'set' . ucfirst($key);
            if (method_exists($this, $setter)) {
                //Invoquer la méthode
                $this->$setter($valeur);
            }
        }
    }


    public function __construct($data = null)
    {
        if ($data != null) {

            $this->hydrater($data);
        }
    }

    /**
     * @return mixed
     */
    public function getCodev()
    {
        return $this->codev;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @return mixed
     */
    public function getTotalVentes()
    {
        return $this->totalVentes;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return mixed
     */
    public function getMotdepasse()
    {
        return $this->motdepasse;
    }

    /**
     * @param mixed $codev
     */
    public function setCodev($codev): void
    {
        $this->codev = $codev;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        if (empty($nom) || ctype_space($nom)) {
            self::setMessageErreur("Le nom est obligatoire");
            $this->setAutorisationBD(false);
        }

        $this->nom = $nom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        if (empty($prenom) || ctype_space($prenom)) {
            self::setMessageErreur("Le prénom est obligatoire");
            $this->setAutorisationBD(false);
        }

        $this->prenom = $prenom;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse): void
    {
        if (empty($adresse) || ctype_space($adresse)) {
            self::setMessageErreur("L'adresse est obligatoire");
            $this->setAutorisationBD(false);
        }

        $this->adresse = $adresse;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp): void
    {
        if (empty($cp) || ctype_space($cp)) {
            self::setMessageErreur("Le code postal est obligatoire");
            $this->setAutorisationBD(false);
        }

        $this->cp = $cp;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville): void
    {
        if (empty($ville) || ctype_space($ville)) {
            self::setMessageErreur("La ville est obligatoire");
            $this->setAutorisationBD(false);
        }

        $this->ville = $ville;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone): void
    {
        if (empty($telephone) || ctype_space($telephone)) {
            self::setMessageErreur("Le téléphone est obligatoire");
            $this->setAutorisationBD(false);
        }

        $this->telephone = $telephone;
    }

    /**
     * @param mixed $totalVentes
     */
    public function setTotalVentes($totalVentes): void
    {
        $this->totalVentes = $totalVentes;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login): void
    {
        if (empty($login) || ctype_space($login)) {
            self::setMessageErreur("L'identifiant est obligatoire");
            $this->setAutorisationBD(false);
        }

        $this->login = $login;
    }

    /**
     * @param mixed $motdepasse
     */
    public function setMotdepasse($motdepasse): void
    {
        if (empty($motdepasse) || ctype_space($motdepasse)) {
            self::setMessageErreur("Le mot de passe est obligatoire");
            $this->setAutorisationBD(false);
            $this->motdepasse = "";
        }

        $this->motdepasse = $motdepasse;
    }

    /**
     * @return mixed
     */
    public function getConfirmation()
    {
        return $this->confirmation;
    }

    /**
     * @param mixed $confirmation
     */
    public function setConfirmation($confirmation): void
    {
        if (empty($confirmation) || ctype_space($confirmation)) {
            self::setMessageErreur("Le mot de passe est obligatoire");
            $this->setAutorisationBD(false);
            $this->confirmation = "";

        } elseif ($this->motdepasse != $this->confirmation) {

            self::setMessageErreur("Vos mots de passe sont différents");
            $this->setAutorisationBD(false);
            $this->motdepasse = "";
            $this->confirmation = "";

        } else {

            self::setMessageSucces("Votre mot de passe a été modifié");
            var_dump($confirmation);
            die();
        }

    }


    public static function setMessageErreur(string $messageErreur): void
    {
        self::$messageErreur = self::$messageErreur . $messageErreur . '<br>';
    }

    public function getAutorisationBD(): bool
    {
        return $this->autorisationBD;
    }

    public static function getMessageErreur(): string
    {
        return self::$messageErreur;
    }

    public static function getMessageSucces(): string
    {
        return self::$messageSucces;
    }

    public function setAutorisationBD(bool $autorisationBD): void
    {
        $this->autorisationBD = $autorisationBD;
    }

    public static function setMessageSucces(string $messageSucces): void
    {
        self::$messageSucces = $messageSucces;
    }

}