<?php
require_once '../sys/Connection.php';
require_once '../sys/asAjax.php';
if (asAjax())
{
    class Recover_ extends Connection
    {
        private $nomUtili;
        private $mdp;
        public function VerificationDonnees()
        {
            if ((isset($_POST["nom"])) && (isset($_POST["mdpUti"])))
            {
                if ((!empty($_POST["nom"])) && (!empty($_POST["mdpUti"])))
                {
                    $this->nomUtili = $_POST['nom'];
                    $this->mdp = $_POST['mdpUti'];
                    $reponse = Connection::connection_bd()->query('SELECT nomU, mdpU FROM utilisateur WHERE 1');
                    while ($donnees = $reponse->fetch())
                    {
                        if ($donnees['nomU'] === $this->nomUtili && password_verify($this->mdp, $donnees['mdpU']))
                        {
                            return 1;
                        }
                    }
                }
            }
        }
    }
    $Utilisateur = new Recover_();
    echo ($Utilisateur->VerificationDonnees());
} else {
    while (1) {}
}