<?php
    class ChangeInfos
    {
        static function funChange(string $p)
        {
            if (isset($_GET[$p]))
            {
                echo $_GET[$p];
            } else 
            {
                echo "";
            }
        }
    }
    ChangeInfos::funChange("produit");
?>