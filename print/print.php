<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../centrale/centraleStyle.css">
    <link rel="stylesheet" href="print.css">
    <title><?= "L'impression du document" ?></title>
</head>
<body>
    <div class="divConteneur">
        <div class="divPartieHaut">
            <div class="divHaut">
                <div class="divTitle">
                    <div>
                        <h4 class="tit">RÉPUBLIQUE DÉMOCRATIQUE DU CONGO</h4>
                    </div>
                    <div>
                        <h4 class="tit">ARHCIDIOCÈSE DE BUKAVU</h4>
                    </div>
                        <div>
                            <h4 class="tit">HÔPITAL PROVINCIAL GÉNÉRAL DE RÉFÉRENCE DE BUKAVU "HPGRG"</h4>
                        </div>
                    <div>
                        <h4 class="tit">SERVICE DE PHARMACIE</h4>
                    </div>
                </div>
            </div>
            <div class="divTitle_">
                <h2 class="tit_fiche">PV DE RÉCEPTION & CONSOMMATION VERS LES SERVICES</h2>
            </div>
            <div class="divIfosMedi">
                <div class="divG">
                    <p class="p">Produit </p>
                    <p class="p">Forme </p>
                    <p class="p">Dosage </p>
                    <p class="p">Conditionnement </p>
                </div>
                <div class="divD">
                    <p> : </p>
                    <p> : </p>
                    <p> : </p>
                    <p> : </p>
                </div>
                <div class="divD">
                    <p class="pr"><?= $_GET['produit']?></p>
                    <p class="fr"><?= $_GET['forme']?></p>
                    <p class="ds"><?= $_GET['dosage']?></p>
                    <p class="cn"><?= $_GET['conditionnement'] ?></p>
                </div>
            </div>
        </div>
        <div class="divPartieBas">
            <div class="divCont">
                <div class="divTitle__">
                    <div class="de">
                        <p class="pde">Date d’entrée</p>
                    </div>
                    <div class="nl">
                        <p class="pnl">Num. du lot</p>
                    </div>
                    <div class="dp">
                        <p class="pdp">Date de péremption</p>
                    </div>
                    <div class="so">
                        <p class="pso">Société d’origine</p>
                    </div>
                    <div class="qs">
                        <p class="pqs">Quantité du stock</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="divBtn">
        <div>
            <img src="../img/png/print_50px.png" class="imgIm">
        </div>
        <div>
            <img src="../img/png/synchronize_50px.png" class="imgAct">
        </div>
        <!-- <div>
            <img src="../img/png/delete_50px.png" class="imgAn">
        </div> -->
    </div>
</body>
<script src="print.js"></script>
</html>
