<?php

class AuthentificationTable
{

    private $login = "";
    private $motdepasse = "";

    private $autorisationSession = true;

    private static $messageErreur = "";


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

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getMotdepasse(): string
    {
        return $this->motdepasse;
    }

    public function getAutorisationSession(): bool
    {
        return $this->autorisationSession;
    }

    public static function getMessageErreur(): string
    {
        return self::$messageErreur;
    }


    public function setLogin(string $login): void
    {
        if (empty($login) || ctype_space($login)) {
            self::setMessageErreur("Vous devez saisir votre identifiant.");
            $this->setAutorisationSession(false);
        }
        $this->login = $login;
    }

    public function setMotdepasse(string $motdepasse): void
    {
        if (!ctype_space($motdepasse) && !empty($motdepasse)) {
            // Technique de salage du mot de passe
            $gauche = "ar30&y%";
            $droite = "tk!@";
            $this->motdepasse = hash('ripemd128', "$gauche$motdepasse$droite");

        } else {

            self::setMessageErreur("Vous devez saisir un mot de passe.");
            $this->setAutorisationSession(false);
            $this->motdepasse = "";
        }


    }

    public function setAutorisationSession(bool $autorisationSession): void
    {
        $this->autorisationSession = $autorisationSession;
    }

    public static function setMessageErreur(string $messageErreur): void
    {
        self::$messageErreur = self::$messageErreur . $messageErreur . '<br>';
    }


}
