<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../centrale/centraleStyle.css">
    <link rel="stylesheet" href="../home/homeC.css">
    <link rel="stylesheet" href="profile.css">
    <title><?= "Le profile de ma page" ?></title>
</head>
<body>
<div class="divBody">
<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'header' . DIRECTORY_SEPARATOR . 'header.php'; ?>
    <div class="divConte">
        <div class="divGa">
            <div class="divContGauche">
                <div class="divImgPr">
                    <img src="../img/svg/undraw_profile_pic_ic5t.svg" class="imgPr">
                    <!-- <img src="../img/png/camera_50px.png" class="imgPhoto"> -->
                </div>
            </div>
        </div>
        <div class="divDr">
            <div class="divMenu">
                <div class="divImg">
                    <img src="../img/svg/undraw_Profile_re_4a55.svg" class="imgProfi">
                </div>
                <div class="divPara">
                    <p class="para">En utilisant ce menu, vous pouvez pesonnaliser les informations de l'utilisateur.</p>
                </div>
                <div>
                    <button class="btnInfosASavoir">Informations à savoir</button>
                    <button class="btnModi">Modifier</button>
                    <button class="btnSuppr">Supprimer</button>
                    <button class="btnDeco">Déconnection</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <?php require_once '../footer/footer.php'; ?> -->
</body>
<script src="../centrale/centraleScipt.js"></script>
<script src="profile.js"></script>
</html>