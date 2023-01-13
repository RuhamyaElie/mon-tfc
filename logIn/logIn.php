<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="logIn.css">
    <link rel="stylesheet" href="../centrale/centraleStyle.css">
    <title><?= "LogIn de ma paga web" ?></title>
</head>
<?php
    session_start();
    if (isset($_POST['nom']) && isset($_POST['mdpUti']))
    {
        if (!empty($_POST['nom']) && !empty($_POST['mdpUti']))
        {
            $_SESSION["unic_user"] = [$_POST['nom'], $_POST['mdpUti']];
        }
    }
?>
<body>
    <div class="divBody">
        <div class="divBodyB">
            <div class="divContLogIn">
            <div class="divImg2">
                <img src="../img/svg/undraw_profile_pic_ic5t.svg" class="imgLogIn">
            </div>
            <div class="divVisible">
                <div class="divChamps">
                    <form id="formValid" action="../home/home.php" method="POST">
                        <div class="divChamNom">
                            <img src="../img/png/customer_50px.png" class="imgLog">
                            <input type="text" placeholder="Nom d'utilisateur" class="champNom" name="nom" maxlength="16">
                        </div>
                        <p class="paraNom"></p>
                        <div class="divChamMDP">
                            <img src="../img/png/lock_50px.png" class="imgLog1">
                            <input type="password" placeholder="Mot de passe" class="champMDP" maxlength="16" name="mdpUti">
                            <img src="../img/png/cbs_50px.png" class="imgLog2">
                        </div>
                        <p class="paraMDP"></p>
                        <div class="divBtnValide">
                            <input type="submit" class="btnValid" value="Conexion">
                        </div>
                    <form>
                    <p class="paraN">Nouveau compte? <a href="../signIn/signIn.php" class="lienNouvUti">clique-moi.</a></p>
                    </div>
                </div>
            </div>
        <script src="logIn.js"></script>
        </div>
    </div>
</body>
</html>