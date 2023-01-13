
    <?php 
    require_once "Connection.php";
    require_once "asAjax.php";
    function infinite()
    {
        while (1) {}
    }
    
    if (isset($_SESSION['unic_user'][0]) && (isset($_SESSION['unic_user'][1])))
    {
        if (!empty($_SESSION['unic_user'][0]) && !empty($_SESSION['unic_user'][1]))
        {
            $rep = Connection::connection_bd()->query('SELECT nomU, mdpU FROM utilisateur WHERE 1');
            while ($don = $rep->fetch()) 
            {
                if ($don['nomU'] === $_SESSION['unic_user'][0] && password_verify($_SESSION['unic_user'][1], $don['mdpU']))
                {
                    // echo "";
                } else {
                    // infinite();
                    echo 'erreur';
                }
            }
        } else {
            // infinite();
            echo 'erreur';
        }
    } else {
        // infinite();
        echo 'erreur';
    }
?>
