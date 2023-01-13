<?php

require_once "../sys/asAjax.php";
require_once "verifyUser.php";
require_once "../sys/Connection.php";

if (asAjax())
{
    class User extends Connection
    {
        // Déclaration
        private $nom;
        private $prenom;
        private $adrMail;
        private $motDP;
        private $confMDP;
        //expression régulières
        private $reg1;
        private $regNUeMDP;
        public function __construct() {
            // initialisation
            $this->nom = $_POST['champN'];
            $this->prenom = $_POST['champP'];
            $this->adrMail = $_POST['champM'];
            $this->motDP = $_POST['champMDP'];
            $this->confMDP = $_POST['champConfMDP'];

            //expression régulières
            $this->reg1 = "#^[a-zA-Zéèçà]+$#";
            $this->regNUeMDP = "#^[a-zA-Z0-9éèïîÉÈÎÏ\_\-\#\$]+$#";
        }
            // nom
        public function getNom() 
            {
                if ((isset($this->nom)) && (!empty($this->nom)) && preg_match($this->reg1, $this->nom) && (strlen($this->nom) <= 30))
                {
                    return $this->nom;
                }
            }

        public function setNom(string $n)
            {
                if ((isset($n)) && (!empty($n)) && preg_match($this->reg1, $n) && (strlen($n) <= 30))
                {
                    return $this->nom = $n;
                }
            }
            // prenom
        public function getPrenom()
            {
                if ((isset($this->prenom)) && (!empty($this->prenom)) && preg_match($this->reg1, $this->prenom) && (strlen($this->prenom) <= 30))
                {
                    return $this->prenom;
                }
            }

        public function setPrenom(string $p)
            {
                if ((isset($p)) && (!empty($p)) && preg_match($this->reg1, $p) && (strlen($p) <= 30))
                {
                    return $this->prenom = $p;
                }
            }
            // adresse mail
        public function getMail()
            {
                if ((isset($this->adrMail)) && (!empty($this->adrMail)) && (filter_var($this->adrMail, FILTER_VALIDATE_EMAIL)))
                {
                    return $this->adrMail;
                }
            }

        public function setMail(string $ad)
            {
                if ((isset($this->adrMail)) && (!empty($this->adrMail)) && (filter_var($this->adrMail, FILTER_VALIDATE_EMAIL)))
                {
                    return $this->adrMail = $ad;
                }
            }
            // le mot de passe
        public function getMotDePasse()
            {
                if ((isset($this->motDP)) && (!empty($this->motDP)) && preg_match($this->regNUeMDP, $this->motDP) && (strlen($this->motDP) >= 4  && strlen($this->motDP) <= 16))
                {
                    return $this->motDP;
                }
            }

        public function setMotDePasse(string $mdp)
            {
                if ((isset($mdp)) && (!empty($mdp)) && preg_match($this->regNUeMDP, $mdp) && (strlen($mdp) >= 4  && strlen($mdp) <= 16))
                {
                    return $this->motDP = $mdp;
                }
            }
            // la confirmation du mot de passe
        public function getConfMotDePasse()
            {
                if ((isset($this->confMDP)) && (!empty($this->confMDP)) && preg_match($this->regNUeMDP, $this->confMDP) && (strlen($this->confMDP) >= 4  && strlen($this->confMDP) <= 16))
                {
                    return $this->confMDP;
                }
            }

        public function setConfMotDePasse(string $cmdp)
            {
                if ((isset($cmdp)) && (!empty($cmdp)) && preg_match($this->regNUeMDP, $cmdp) && (strlen($cmdp) >= 4  && strlen($cmdp) <= 16))
                {
                    return $this->confMDP = $cmdp;
                }
            }
        public function validationMotDePasse()
            {
                if  ($this->getMotDePasse() === $this->getConfMotDePasse())
                {
                    return password_hash($this->getConfMotDePasse(), PASSWORD_DEFAULT);
                }
            }
            // Enregistrement des informations
        public function saveUser()
            {
                if ($this->getNom() && $this->getPrenom() && $this->getMail() && $this->validationMotDePasse())
                {
                    $this->reponse = Connection::connection_bd()->prepare('INSERT INTO utilisateur(idUser, nomU, preU, adMU, mdpU) VALUES (:idUser, :nomU, :preU, :adMU, :mdpU)');
                    $this->reponse->execute(array(
                    'idUser' => NULL,
                    'nomU' =>  $this->getNom(),
                    'preU' => $this->getPrenom(),
                    'adMU' => $this->getMail(),
                    'mdpU' => $this->validationMotDePasse()
                ));
                echo "succé";
                } else {}
            }
    }
    $v = new User();
    if (!$unicUser->VeriUti())
    {
        $v->saveUser();
    } else {
        echo "échec";
    }
} else {
    while(1){}
}
