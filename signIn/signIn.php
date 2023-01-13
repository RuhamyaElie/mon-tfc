<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../centrale/centraleStyle.css">
    <link rel="stylesheet" href="signIn.css">
    <title>L'enregistrement des informations</title>
</head>
<body>
    <div class="divBody">
        <div class="divBodyB">
            <div class="divCont">
                <div class="divProf">
                    <img src="../img/svg/undraw_profile_pic_ic5t.svg" class="imgP">
                </div>
                <div class="divChamps">
                    <form id="formUti" action="../home/home.html" method="POST">
                        <div class="divEtape1">
                            <div class="divN">
                                <img src="../img/png/customer_50px.png" class="imgPn">
                                <input type="text" placeholder="Nom" class="champN" name="champN" required="required">
                            </div>
                            <p class="paraN"></p>
                            <div class="divPre">
                                <img src="../img/png/customer_50px.png" class="imgPn">
                                <input type="text" placeholder="Prenom" class="champP" name="champP"  required="required">
                            </div>
                            <p class="paraP"></p>
                        </div>
                        <div class="divEtape2">
                            <div class="divM">
                                <img src="../img/png/gmail_50px.png" class="imgPn">
                                <input type="mail" placeholder="e-mail" class="champM" name="champM" required="required">
                            </div>
                            <p class="paraM"></p>
                        </div>
                        <div class="divEtape3">
                            <div class="divMotDP">
                                <img src="../img/png/lock_50px.png" class="imgPn">
                                <input type="password" placeholder="Mot de passe" class="champMDP" maxlength="16" name="champMDP"  required="required">
                                <img src="../img/png/cbs_50px.png" class="imgPna">
                            </div>
                            <p class="paraMDP"></p>
                            <div class="divConfMDP">
                                <img src="../img/png/lock_50px.png" class="imgPn">
                                <input type="password" placeholder="Confirmation" class="champConfMDP" maxlength="16" name="champConfMDP"  required="required">
                                <img src="../img/png/cbs_50px.png" class="imgPnb">
                            </div>
                            <p class="paraConfMDP"></p>
                        </div>
                        <div class="divContResuI"></div>
                        <div class="divBtnSub">
                            <input type="submit" class="btnSub" value="Envoyer">
                            <a href="../logIn/logIn.php" class="lienLog">connexion</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="signIn.js"></script>
</body>
</html>
