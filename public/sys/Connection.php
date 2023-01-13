<?php
class Connection
{
    static function connection_bd()
    {
        try {
            $bd = new PDO('mysql:host=localhost; dbname=tfc', 'root', '');
            // echo "connecté";
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return $bd;
    }
}