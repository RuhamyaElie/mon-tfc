class MesInformations
{
    static informationsMedicaments() {
        var btnEnr = document.querySelector(".btnEnr")
        var formMedi = document.querySelector(".formMedi")
        var paraResultat = document.querySelector(".paraResultat")
        var divImgVide = document.querySelector(".divImgVide")
        btnEnr.addEventListener("click", function (e) {
        e.preventDefault()
        var inputVide = document.querySelectorAll(".produit, .forme, .dose, .cond, .numL, .dateE, .dateP, .socD, .qttRec")
        if (inputVide[0].value && inputVide[1].value && inputVide[2].value && inputVide[3].value && inputVide[4].value && inputVide[5].value < inputVide[6].value && inputVide[7].value && inputVide[8].value)
        {
            var xhrMedi = new XMLHttpRequest()
            var dataMedi = new FormData(formMedi)
            xhrMedi.onreadystatechange = function () {
                if (xhrMedi.readyState === 4)
                {
                    if (xhrMedi.status === 200)
                    {
                        if (xhrMedi.response)
                        {
                            divImgVide.innerHTML =  `<div class="divBarreInfosMedi">
                                            <h4>N°</h4> 
                                            <h4>Produit</h4>
                                            <h4>Forme</h4>
                                            <h4>Date de péremption</h4>
                                            <h4>Stock</h4>
                                            <h4>__Voir plus__</h4>
                                        </div>`
                            divImgVide.innerHTML += xhrMedi.response
                            paraResultat.textContent = "Informations enregistrée"
                            paraResultat.style.color = "green"
                            inputVide[0].value = ""
                            inputVide[1].value = ""
                            inputVide[2].value = ""
                            inputVide[3].value = ""
                            inputVide[4].value = ""
                            inputVide[5].value = ""
                            inputVide[6].value = ""
                            inputVide[7].value = ""
                            inputVide[8].value = ""
                        }
                        var divInfosMedi = document.querySelectorAll(".divInfosMedi")
                        for (var i=0; i<divInfosMedi.length; i++)
                            {
                                if (i < 17)
                                {
                                    divImgVide.style.height = "475px"
                                } else {
                                    divImgVide.style.height = ""
                            }
                        }
                    }
                }   
            }
            xhrMedi.open("POST", "../public/medecine/Medecine.php", true)
            xhrMedi.setRequestHeader('X-Requested-With', 'xmlhttprequest')
            xhrMedi.send(dataMedi)
        } else {
            paraResultat.textContent = "Incorrecte ou dates invalides"
            paraResultat.style.color = "red"
        }
        })
    }
}
// MesInformations.informationsProfile()
var divImgVide = document.querySelector(".divImgVide")
var xhrVeriMedi = new XMLHttpRequest()
xhrVeriMedi.onreadystatechange = function () {
    if (xhrVeriMedi.readyState === 4)
    {
        if (xhrVeriMedi.status === 200)
        {
            if (xhrVeriMedi.response)
            {
                MesInformations.informationsMedicaments()
                var divImgVide = document.querySelector(".divImgVide")
                divImgVide.innerHTML =  `<div class="divBarreInfosMedi">
                                            <h4>N°</h4> 
                                            <h4>Produit</h4>
                                            <h4>Forme</h4>
                                            <h4>Date de péremption</h4>
                                            <h4>Stock</h4>
                                            <h4>__Voir plus__</h4>
                                        </div>`
                divImgVide.innerHTML += xhrVeriMedi.response
                var divInfosMedi = document.querySelectorAll(".divInfosMedi")
                for (var i=0; i<divInfosMedi.length; i++)
                {
                    if (i < 17)
                    {
                        divImgVide.style.height = "475px"
                    } else {
                        divImgVide.style.height = ""
                    }
                }
            } else {
                MesInformations.informationsMedicaments()       
                var xhrVider = new XMLHttpRequest()
                xhrVider.onreadystatechange = function () {
                    if (xhrVider.readyState === 4)
                    {
                        if (xhrVider.status === 200)
                        {
                            // alert(xhrVider.response)
                        }
                    }
                }
                xhrVider.open("POST", "../public/medecine/medeVide.php", true)
                xhrVider.setRequestHeader('X-Requested-With', 'xmlhttprequest')
                xhrVider.send()
                // xhrVider.responseXML
            }
        }
    }
}
xhrVeriMedi.open("POST", "../public/medecine/Medecine.php", true)
xhrVeriMedi.setRequestHeader('X-Requested-With', 'xmlhttprequest')
xhrVeriMedi.send()

var formRecherche = document.getElementById("formRecherche")
var btnRec = document.querySelector(".btnRec")
btnRec.addEventListener("click", function (e) {
    e.preventDefault()
    var valReche = new FormData(formRecherche)
    var xhrRec = new XMLHttpRequest()
    xhrRec.onreadystatechange = function () {
        if (xhrRec.readyState === 4)
        {
            if (xhrRec.status === 200)
            {
                if (xhrRec.response)
                {
                    divImgVide.innerHTML =  `<div class="divBarreInfosMedi">
                                                <h4>N°</h4> 
                                                <h4>Produit</h4>
                                                <h4>Forme</h4>
                                                <h4>Date de péremption</h4>
                                                <h4>Stock</h4>
                                                <h4>__Voir plus__</h4>
                                            </div>`
                    divImgVide.innerHTML += xhrRec.response
                    divImgVide.style.height = "475px"
                } else {
                    alert("Médicament introuvable")
                }
            }
        }
    }
    xhrRec.open("POST", "../public/medecine/recherche.php", false)
    xhrRec.setRequestHeader('X-Requested-With', 'xmlhttprequest')
    xhrRec.send(valReche)
})

var btnAcc = document.querySelector(".btnAcc")
btnAcc.addEventListener("click", function () {
    location.assign('../home/home.php')
})
var btnNot = document.querySelector(".btnNot")
btnNot.addEventListener("click", function () {
    location.assign('../service/service.php')
})
var btnProf = document.querySelector(".btnProf")
btnProf.addEventListener("click", function () {
    location.assign('../profile/profile.php')
})

var btnAide = document.querySelector(".btnAide")
btnAide.addEventListener("click", function () {
    location.assign('../public/Travail de fin de cycle.pdf')
})

var btnApro = document.querySelector(".btnApro")
btnApro.addEventListener("click", function () {
    location.assign('../about/about.php')
})
