<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "Connection.php";
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "asAjax.php";
if (asAjax())
{
    class deleteUser
    {
        private $mdpU;
        private $Confmdp;


        public function __construct()
        {
            if (isset($_POST['mdpU']) && isset($_POST['Confmdp']))
            {
                $this->mdpU = $_POST['mdpU'];
                $this->Confmdp = $_POST['Confmdp'];
            }
            $this->reg1 = "#[a-zA-Z0-9éèïîÉÈÎÏ\_\-\#\$]+$#";
            $this->reg1Dose = "#[a-zA-Z0-9\,\.]+$#";
            $this->reg1Cond = "#[a-zA-Z0-9]+$#";
        }
        public function fundeleteUser()
        {
            if ($this->mdpU && $this->Confmdp)
            {
                if ($this->mdpU === $this->Confmdp)
                {
                    return $this->Confmdp;
                }
            }
        }
        public function verifyDatas()
        {
            $datas_ = Connection::connection_bd()->query('SELECT mdpU FROM utilisateur WHERE idUser=1');
            while ($donnees = $datas_->fetch()) {
                return password_verify($this->fundeleteUser(), $donnees['mdpU']);
            }
        }
        public function valid_sup()
        {
            if ($this->verifyDatas())
            {
                $delete = Connection::connection_bd()->query('TRUNCATE utilisateur');
                echo "succès";
            }
        }
    }
    $Utilisateur = new deleteUser();
    $Utilisateur->valid_sup();
} else {
    while (1) {}
}