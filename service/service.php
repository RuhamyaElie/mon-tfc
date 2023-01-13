<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../centrale/centraleStyle.css">
    <link rel="stylesheet" href="../home/homeC.css">
    <link rel="stylesheet" href="serviceStyle.css">
    <title><?= "Les informations sur chaque service" ?></title>
</head>
<body>
<?php require_once '../header/header.php'; ?>
<div class="divBody">
    <div class="divG">
        <div class="divIndiServ">
            <div class="divImgIndi">
                <img src="../img/svg/undraw_medicine_b1ol.svg" class="imgIndi">
            </div>
            <div class="divParaServ">
                <p class="paraServ">
                Le temps change et on crois à l'évolution.
                Bien que les services de l'hôpital générale sont limités, 
                cette partie présente une possibilité d'augmenter plusieurs 
                services ainsi que leurs délégués en vue du bonne utilisation.
                </p>
            </div>
        </div>
    </div>
    <div class="divD">
        <div class="divService">
            <div class="divImgServ">
                <img src="../img/svg/undraw_medicine_b1ol.svg" class="imgServ">
            </div>
            <div class="divParaServ">
                <p class="paraServ">
                Remplissez le formulaire ci-bas pour ajouter un service et son unique délégué.
                </p>
            </div>
            <div class="divTitle">
            </div>
            <form action="" method="post" class="formServ">
                <div class="divNomS">
                    <input type="text" class="nomS" placeholder="Nom du service" name="nomS">
                </div>
                <p class="paraAlert"></p>
                <input type="submit" class="btnValidServ" value="Valider l'enregistrement">
            </form>
        </div>
    </div>
</div>
<!-- <?php require_once '../footer/footer.php'; ?> -->
</body>
<script src="../centrale/centraleScipt.js"></script>
<script src="serviceJs.js"></script>
</html>