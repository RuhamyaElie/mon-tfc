
<?php
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "asAjax.php";
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "Connection.php";
if (asAjax())
{
    class Modifier
    {
        private $idM;
        private $produit;
        private $forme;
        private $dosage;
        private $condi;
        public function __construct()
        {
            $this->idM = $_POST['idM'];
            $this->produit = $_POST['produit'];
            $this->forme = $_POST['forme'];
            $this->dosage = $_POST['dose'];
            $this->condi = $_POST['cond'];
            
            $this->reg1 = "#[a-zA-Z0-9éèïîÉÈÎÏ\_\-\#\$]+$#";
            $this->reg1Dose = "#[a-zA-Z0-9\,\.]+$#";
            $this->reg1Cond = "#[a-zA-Z0-9]+$#";
        }
        public function setProduit() {
            if ((isset($this->produit)) && (!empty($this->produit)) && preg_match($this->reg1, $this->produit) && (strlen($this->produit) <= 40))
            {
                return $this->produit;
            }
        }
        public function setForme() {
            if ((isset($this->forme)) && (!empty($this->forme)) && preg_match($this->reg1, $this->forme) && (strlen($this->forme) <= 40))
            {
                return $this->forme;
            }
        }
        public function setDosage() {
            if ((isset($this->dosage)) && (!empty($this->dosage)) && preg_match($this->reg1Dose, $this->dosage) && (strlen($this->dosage) <= 10))
            {
                return $this->dosage;
            }
        }
        public function setCondi() {
            if ((isset($this->condi)) && (!empty($this->condi)) && preg_match($this->reg1Cond, $this->condi) && (strlen($this->condi) <= 10))
            {
                return $this->condi;
            }
        }
        public function funModifier()
        {
            if ($this->setProduit() && $this->setForme() && $this->setDosage() && $this->setCondi())
            {
                $modifier = Connection::connection_bd()->prepare('UPDATE medicament,requisition SET
                produit=:setProduit,forme=:setForme,dose=:setDosage,cond=:setCondi
                WHERE idM=:idM');
                $modifier->execute(array(
                    'setProduit' => $this->setProduit(),
                    'setForme' => $this->setForme(),
                    'setDosage' => $this->setDosage(),
                    'setCondi' => $this->setCondi(),
                    'idM' => $this->idM
                ));
                return "succès";
            }
        }
    }
    $modifier = new Modifier();
    echo $modifier->funModifier();
} else {
    while (1) {}
}