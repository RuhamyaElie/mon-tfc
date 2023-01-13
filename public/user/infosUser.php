<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "Connection.php";
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "asAjax.php";
if (asAjax())
{
    class infosUser
    {
        public function funInfosUser()
        {
            $infos = Connection::connection_bd()->query("SELECT * FROM utilisateur WHERE 1");
            while ($recuperation = $infos->fetch()) {
                echo "<div class=\"divContI\">
                <div class=\"divA\">
                    <p class=\"pp\">Nom</p>
                    <p class=\"pp\">Pre-nom</p>
                    <p class=\"pp\">Adresse mail</p>
                    <p class=\"pp\">Mot de passe</p>
                </div>
                <div class=\"divB\">
                    <p> : </p>
                    <p> : </p>
                    <p> : </p>
                    <p> : </p>
                </div>
                <div class=\"divC\">
                    <p class=\"pp_\"> {$recuperation['nomU']} </p>
                    <p class=\"pp_\"> {$recuperation['preU']}</p>
                    <p class=\"pp_\"> {$recuperation['adMU']}</p>
                    <p class=\"pp_\">********</p>
                </div>
            </div>";
            }
        }
    }
    $Utilisateur = new infosUser();
    $Utilisateur->funInfosUser();
} else {
    while (1) {}
}