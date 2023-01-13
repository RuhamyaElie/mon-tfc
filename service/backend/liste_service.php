<?php
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . 'asAjax.php';
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . 'Connection.php';
if (asAjax())
{
    class liste_service
    {
        public function funListeService()
        {
            $liste_service = Connection::connection_bd()->query('SELECT UPPER(service.nomS), delegue.nomD, delegue.prenomD FROM service, delegue WHERE service.idS = delegue.idD');
            while ($chaque_service = $liste_service->fetch()) {
                echo "<div class=\"divContServ_\">
                        <div class=\"divContInfos\">
                            <div>
                                <img src=\"../img/png/service_50px.png\" class=\"imgServ___\">
                            </div>
                            <div>
                                <h2 class=\"title_service\">{$chaque_service['UPPER(service.nomS)']}</h2>
                                <p class=\"nom_Delegue\">{$chaque_service['nomD']} {$chaque_service['prenomD']}</p>
                            </div>
                        </div>
                        <div class=\"divListeServ\">
                            <div>
                                <p class=\"btn_modi\">{$chaque_service['UPPER(service.nomS)']}
                                    <img src=\"../img/png/edit_file_50px.png\" class=\"imgModi\">
                                </p>
                            </div>
                            <div class=\"divSupp\">
                                <p class=\"btn_supp\">{$chaque_service['UPPER(service.nomS)']}
                                    <img src=\"../img/png/delete_bin_50px.png\" class=\"imgSuppr\">
                                </p>
                            </div>
                        </div>
                    </div>";
            }   
        }
    }
    $liste_service = new liste_service();
    $liste_service->funListeService();
} else {
    while (1) {}
}