<?php 
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . 'asAjax.php';
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . 'Connection.php';
if (asAjax())
{
    class SupprimerService
    {
        private $nom_serv;
        // private $idSer;
        // private $idDel;
        public function __construct()
        {
            $this->nom_serv = $_POST['nom_serv'];
            // $this->idSer = null;
            // $this->idDel = null;
        }
        private function get_nom_serv()
        {
            if (isset($this->nom_serv) && isset($this->nom_serv)) {
                return $this->nom_serv;
            }
        }
        public function fun_suppimer_service()
        {
            $rep_supp = Connection::connection_bd()->prepare('DELETE FROM `service` WHERE nomS=:nomS LIMIT 1');
            $rep_supp->execute(array(
                'nomS' => trim($this->get_nom_serv())
            ));
            echo "supprimer";
        }
    }
    $supprimer_service = new SupprimerService();
    $supprimer_service->fun_suppimer_service();
} else {
    while (1) {}
}