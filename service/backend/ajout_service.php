<?php 
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . 'asAjax.php';
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . 'Connection.php';
if (asAjax())
{
    class ajout_service
    {
        private $service;
        private $success;
        private $danger;
        public function __construct()
        {
            if (isset($_POST['nomS']))
            {
                $this->service = $_POST['nomS'];
                $this-> success = null;
                $this-> danger = null;
            }
            $this->regServ = "#[a-zA-ZéèïîÉÈÎÏ\_\-\#]+$#";
        }
        public function getNomS()
        {
            if ((isset($this->service)) && (!empty($this->service)) && preg_match($this->regServ, $this->service) && (strlen($this->service) <= 40))
            {
                return $this->service;
            }
        }
        public function funAddServ()
        {
            $donnes_service = Connection::connection_bd()->query('SELECT nomS FROM service WHERE 1');
            while ($non_redondance = $donnes_service->fetch()) {
                if ($this->getNomS() == $non_redondance['nomS'])
                {
                    $this->success = "existe";
                } else {
                    $this->danger = "enregistre";
                }
            }

            if ($this->success == "existe")
            {
                $this->success = "existe";
                echo $this->success;
            } else {
                $add_service = Connection::connection_bd()->prepare('INSERT INTO service (idS,nomS) VALUES (:idS,:nomS)');
                $add_service->execute(array(
                    'idS' => NULL,
                    'nomS' => $this->getNomS()
                ));
            }
        }
    }
    $add_ = new ajout_service();
    $add_->funAddServ();
} else {
    while (1) {}
}