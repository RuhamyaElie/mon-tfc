<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../centrale/centraleStyle.css">
    <link rel="stylesheet" href="../home/homeC.css">
    <title><?= "La page d'acueil" ?></title>
</head>
<?php require_once '../header/header.php'; ?>
<body>
    <div class="divBody">
        <div class="divBox1">
            <div class="divBox1Part1">
                <img src="../img/svg/undraw_medicine_b1ol.svg" class="imgAccueil1">
            </div>
            <div class="divBox1Part2">
                <div class="divHautB2">
                    <h1>Un logiciel au service des Pharmaciens à L'Hôpital Provinciale Générale de Référence de Bukavu.</h1>
                    <p class="paraVue1">Une pertinence a été soulevée face à la gestion temps ainsi que l'aisance de la manipulation des données. Des analyses ont étés faites, une vue critique a été poussée face au présent système et voici la concrétisation du travail.</p>
                </div>
                <div class="divBtnB2">
                    <button class="btnVue">A propos</button>
                </div>
            </div>
        </div>
        <div class="divBox2">
            <div class="divBox2Part1">
                <div class="divHaut2B2">
                    <h1>Smart & simple pour son utilisation.</h1>
                    <p class="paraVue2">Grâce aux multiples fonctionnalités que présente un logiciel sur-mesure. L'utilisateur fait face aux erreurs non voulu, la difficulté d'apporter la maintenance ainsi que l'incapacité a gérer les données.</p>
                </div>
                <div class="divBtnExp">
                    <button class="btnExp">Guide d'utilisation</button>
                </div>
            </div>
            <div class="divBox2Part2">
                <img src="../img/svg/undraw_Co_working_re_y4cx.svg" class="imgAccueil2">
            </div>
        </div>
        <div class="divBtnLancez">
            <button class="btnLancez">Lancez-vous!</button>
        </div>
    </div>
</body>
<?php require_once '../footer/footer.php'; ?>
<script src="../centrale/centraleScipt.js"></script>
<script src="receptionScript.js"></script>
</html>