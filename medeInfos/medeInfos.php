<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../centrale/centraleStyle.css">
    <link rel="stylesheet" href="../home/homeC.css">
    <link rel="stylesheet" href="medeInfosStyle.css">
    <title> <?= "Les informations sur le médicament" ?></title>
</head>
<?php require_once '../header/header.php'; ?>
<body>
    <div class="divBody">
    <div class="divContInfosM">
        <div class="div_2">
            <h4 class="title">Historique du médicament</h4>
        </div>
        <div class="div_B">
            <div class="div_1">
                <div class="divTitInfos">
                    <h4 class="titleB">Les informations du médicament</h4>    
                </div>
                <div class="divMesPara">
                    <div class="divA">
                        <p class="paraN">Numéro</p>
                        <p class="paraP">Produit</p>
                        <p class="paraF">Forme</p>
                        <p class="paraD">Dosage</p>
                        <p class="paraC">Conditionnement</p>
                    </div>
                    <div class="divB">
                        <p class="paraNN"><?= $_GET['idM'] ?></p>
                        <p class="paraPP"><?= $_GET['produit'] ?></p>
                        <p class="paraFF"><?= $_GET['forme'] ?></p>
                        <p class="paraDD"><?= $_GET['dose'] ?></p>
                        <p class="paraCC"><?= $_GET['cond'] ?></p>
                    </div>
                </div>
                <div class="divBtnMod">
                    <div class="divModMal">
                        <div class="divDel">
                            <!-- <button class="btnEdit">
                                <img src="../img/png/edit_file_50px.png" class="imgMod">
                                <p class="parBtnSup">Modifier</p>
                            </button> -->
                            <button class="btnSupp">
                                <img src="../img/png/delete_bin_50px.png" class="imgDel">
                                <p class="parBtnSup">Supprimer</p>
                            </button>
                            <button class="btnImp">
                                <img src="../img/png/print_50px.png" class="imgPrin">
                                <p class="parBtnSup">Imprimer</p>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divRecusition">
                <h4 class="titleC">La réquisition de médicament</h4>
                <form action="" method="post" class="formModi">
                    <div>
                        <input type="text" placeholder="Num lot" class="numL" name="numL">
                    </div>
                    <div>
                        <input type="date" title="Date d'entrée" class="dateE" name="dateE">
                    </div>
                    <div>
                        <input type="date" title="Date de péremption" class="dateP" name="dateP">
                    </div>
                    <div>
                        <input type="text" placeholder="Societé d'origine" class="socD" name="socD">
                    </div>
                    <div>
                        <input type="text" placeholder="Quantité réçue" class="qtteMedi" name="qtteMedi">
                    </div>
                    <div>
                        <p class="paraI"></p>
                    </div>
                    <div>
                        <input type="submit" class="btnValRec" value="Valider la récéption">
                    </div>
                </form>
            </div>
            <div class="divContSort">
                <h4 class="titleC">La sortie du médicament</h4>
                <form action="" method="POST" class="formSortie_">
                    <div>
                        <select name="dele" class="serv_">
                            <optgroup label="Séléctionne le délégué concerné" class="serv">
                            </optgroup>
                        </select>
                    </div>
                    <div>
                        <input type="date" name="dateS" class="dateS" title="La date de sortie">
                    </div>
                    <div>
                        <input type="text" class="qtteSort" name="qtteSort" placeholder="Quantité sortie" maxlength="10">
                    </div>
                    <div>
                        <p class="paraResultat2"></p>
                        <input type="submit" class="btnSort" value="Sortie">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>
<?php require_once '../footer/footer.php'; ?>
<script src="../centrale/centraleScipt.js"></script>
<script src="medeInfos.js"></script>
</html>
