<?php 
    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "header" . DIRECTORY_SEPARATOR . "header.php";
    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "Form.php";
    // require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "changeInfos.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="homeC.css">
    <link rel="stylesheet" href="../centrale/centraleStyle.css">
    <title> <?= "Ma page principale" ?></title>
</head>
<?php
// require_once (__DIR__ . dirname( DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "sys"  . DIRECTORY_SEPARATOR . "Form.php"));
session_start();
// var_dump($_SESSION["unic_user"]);
// $_SESSION['unic_user'] = ["elie", "elie_"];
// require_once '../public/sys/verifySession.php';
?>

<body>
    <div class="divBody">
        <div class="divContMedi">
            <div class="divG">
                <form action="" method="POST" id="formRecherche">
                    <div class="divRec">
                        <input type="text" placeholder="Recherche du médicament" class="champRec" name="champRec">
                        <button type="submit" class="btnRec"> 
                            <img src="../img/png/search_50px.png" class="imgRec"> 
                        </button>
                    </div>
                </form>
            <div class="divContMediAll">
                <div class="divImgVide">
                    <img src="../img/svg/undraw_empty_xct9.svg" class="imgVide">
                    <div class="divParaVide">
                        <p class="paraListe">La liste des médicaments est totalement vide, remplissez ce formulaire à droite.</p>
                    </div>
                    </div>
                </div>
            </div>
            <div class="divD">
                <div class="divContEnr">
                    <div class="divImgAjout">
                        <img src="../img/svg/undraw_science_fqhl.svg" class="imgAjoutMedi">
                    </div>
                    <form action="home.php" method="POST" class="formMedi">
                        <div>
                            <?= Form::input("text", "produit", "Nom du produit", "produit", 60, "autofocus"); ?>
                        </div>
                        <div>
                            <?= Form::input("text", "forme", "Forme", "forme", 60, null); ?>
                        </div>
                        <div>
                            <?= Form::input("text", "dose", "Le dosage", "dose", 60, null); ?>
                        </div>
                        <div>
                            <?= Form::input("text", "cond", "Conditionnement", "cond", 60, null); ?>
                        </div>
                        <div>
                            <?= Form::input("text", "numL", "Num lot", "numL", 60, null); ?>
                        </div>
                        <div>
                            <?= Form::input("date", "dateE", null, "dateE", null, "La date de d'entrée"); ?>
                        </div>
                        <div>
                            <?= Form::input("date", "dateP", null, "dateP", null, "La date de péremption"); ?>
                        </div>
                        <div>
                            <?= Form::input("text", "socD", "Societé d'origine", "socD", 60, null); ?>
                        </div>
                        <div>
                            <?= Form::input("text", "qttRec", "Quantité", "qttRec", 10, null); ?>
                        </div>
                        <div>
                            <p class="paraResultat"></p>
                            <input type="submit" class="btnEnr" value="Enregistrer">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "footer" . DIRECTORY_SEPARATOR . "footer.php"; ?>
<script src="homeJ.js"></script>
</html>