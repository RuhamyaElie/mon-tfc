var divHisto = document.querySelectorAll(".divHisto")
for (var i=0; i<divHisto.length; i++)
{
    divHisto[i].addEventListener("click", function () {
    this.classList.toggle("voirPlus")
    })
}

var infosMedi = document.querySelectorAll(".paraNN, .paraPP, .paraFF, .paraDD, .paraCC")
var btnSupp = document.querySelector(".btnSupp")
btnSupp.addEventListener("click", function () {
    document.body.innerHTML += "<div class=\"divContSuppMedi\">\
                                    <div class=\"divSuppMedi\">\
                                        <div class=\"divImgDelete\">\
                                            <img src=\"../img/svg/undraw_data_processing_yrrv.svg\" class=\"imgDele\">\
                                        </div>\
                                        <p class=\"paraSup\">Vous êtes sur le point de supprimer un médicament.</br>Voulez vous vraiment le faire?</p>\
                                        <button class=\"btnSupMedi\">Valider la suppression</button>\
                                        <a href=\"\" class=\"lienAnnuler\">Annuler</a>\
                                    </div>\
                                </div>"
    var btnSupMedi = document.querySelector(".btnSupMedi")
    var dataM = new FormData()
    btnSupMedi.addEventListener("click", function () {
        var xhrDeleMedi = new XMLHttpRequest()
        xhrDeleMedi.onreadystatechange = function () {
            if (xhrDeleMedi.readyState === 4)
            {
                if (xhrDeleMedi.status === 200)
                {
                    if (xhrDeleMedi.response === "succès")
                    {
                        location.assign("../home/home.php")
                    } else {
                        // Dans le cas ou l'information n'apa été enregistrée
                    }
                }
            }
        }
        xhrDeleMedi.open("POST", "../public/Medecine/deleteMede.php")
        xhrDeleMedi.setRequestHeader('X-Requested-With', 'xmlhttprequest')
        dataM.append("idM", infosMedi[0].textContent)
        dataM.append("produit", infosMedi[1].textContent)
        dataM.append("forme", infosMedi[2].textContent)
        dataM.append("dose", infosMedi[3].textContent)
        dataM.append("cond", infosMedi[4].textContent)
        xhrDeleMedi.send(dataM)
    })
})

var datas_medi = document.querySelectorAll(".paraPP, .paraFF, .paraDD, .paraCC")
var btnImp = document.querySelector(".btnImp")
btnImp.addEventListener("click", function () {
    location.assign("../print/Print.php?produit="+datas_medi[0].textContent+"&"+"forme="+ datas_medi[1].textContent + "&" + "dosage=" + datas_medi[2].textContent + "&" + "conditionnement=" + datas_medi[3].textContent)
})

class classModification
{
    static funModification() {
        var btnValRec = document.querySelector(".btnValRec")
        btnValRec.addEventListener("click", function (e) {
            e.preventDefault()
            var idM = document.querySelector(".paraNN")
            var pqR = document.querySelector(".pqR")
            var div_2 = document.querySelector(".div_2")
            var inputVal = document.querySelectorAll(".numL, .dateE, .dateP, .socD, .qtteMedi")
            var formModi = document.querySelector(".formModi")
            var datas = new FormData(formModi)
            var paraI = document.querySelector(".paraI")
            if (inputVal[0].value && inputVal[1].value < inputVal[2].value && inputVal[3].value && inputVal[4].value)
            {
                var xhrModi = new XMLHttpRequest()
                xhrModi.onreadystatechange = function () {
                    if (xhrModi.readyState === 4)
                    {
                        if (xhrModi.status === 200)
                        {
                            if (xhrModi.response === "enregistré")
                            {
                                // div_2.innerHTML += xhrModi.response
                                // var divHisto = document.querySelectorAll(".divHisto")
                                location.reload()
                                for (var i=0; i<divHisto.length; i++)
                                {
                                    divHisto[i].addEventListener("click", function () {
                                        this.classList.toggle("voirPlus")
                                    })
                                }

                                paraI.textContent = "Récéption validée"
                                paraI.style.color = "green"
                                inputVal[0].value = ""
                                inputVal[1].value = ""
                                inputVal[2].value = ""
                                inputVal[3].value = ""
                                inputVal[4].value = ""
                            }
                        }
                    }
                }
                xhrModi.open('POST', '../public/medecine/medeUpdate.php', true)
                xhrModi.setRequestHeader('X-Requested-With', 'xmlhttprequest')
                datas.append("idM", idM.textContent)
                xhrModi.send(datas)
            } else {
                paraI.textContent = "Incorrecte ou dates invalides"
                paraI.style.color = "red"
            }
        })
    }
}
classModification.funModification()

var veriModi = new XMLHttpRequest()
var idM_ = document.querySelector(".paraNN")
var div_2 = document.querySelector(".div_2")
var data_id = new FormData()
var display_liste = new XMLHttpRequest()
display_liste.onreadystatechange = function () {
    if (display_liste.readyState === 4)
    {
        if (display_liste.status === 200)
        {
            if (display_liste.response)
            {
                div_2.innerHTML += display_liste.response
                var divHisto = document.querySelectorAll(".divHisto")
                for (var i=0; i<divHisto.length; i++)
                {
                    divHisto[i].addEventListener("click", function () {
                    this.classList.toggle("voirPlus")
                    })
                }
            }
        }
    }
}
display_liste.open("POST", "../public/medecine/display_liste.php", true)
display_liste.setRequestHeader('X-Requested-With', 'xmlhttprequest')
data_id.append("idM_", idM_.textContent)
display_liste.send(data_id)

// récupération du service
var btnSort = document.querySelector(".btnSort")
var formSortie_ = document.querySelector(".formSortie_")
var paraResultat2 = document.querySelector(".paraResultat2")
var para_id = document.querySelector(".paraNN")
var paraPP = document.querySelector(".paraPP")
btnSort.addEventListener("click", function (e) {
    e.preventDefault()
    var formSort = new FormData(formSortie_)
    if (formSortie_[0].value && formSortie_[1].value && formSortie_[2].value)
    {
        var sortie_medi = new XMLHttpRequest()
        sortie_medi.onreadystatechange = function () {
            if (sortie_medi.readyState === 4) {
                if (sortie_medi.status === 200) {
                    if (sortie_medi.response === "success") {
                        location.reload()
                        var divHisto = document.querySelectorAll(".divHisto")
                        for (var i=0; i<divHisto.length; i++)
                        {
                            divHisto[i].addEventListener("click", function () {
                            this.classList.toggle("voirPlus_")
                            })
                        }
                        formSortie_[0].value =""
                        formSortie_[1].value = ""
                        formSortie_[2].value = ""
                    } else {
                        paraResultat2.textContent = "Stock insuffisant ou vide"
                    }
                }
            }
        }
        sortie_medi.open('POST', '../public/medecine/sortie/sortie_medecine.php', true)
        sortie_medi.setRequestHeader('X-Requested-With', 'xmlhttprequest')
        formSort.append("idM", para_id.textContent)
        formSort.append("desi", paraPP.textContent)
        sortie_medi.send(formSort)
    } else {
        paraResultat2.textContent = "Informations incorrectes"
    }
})

var sortie = new XMLHttpRequest()
var data_infos = new FormData()
sortie.onreadystatechange = function () {
    if (sortie.readyState === 4) {
        if (sortie.status === 200) {
            if (sortie.response) {
                var div_2 = document.querySelector(".div_2")
                div_2.innerHTML += sortie.response
                var divHisto = document.querySelectorAll(".divHisto")
                for (var i=0; i<divHisto.length; i++)
                {
                    divHisto[i].addEventListener("click", function () {
                    this.classList.toggle("voirPlus_")
                    })
                }
            }
        }
    }
}
sortie.open('POST', '../public/medecine/sortie/liste_sortie.php', true)
sortie.setRequestHeader('X-Requested-With', 'xmlhttprequest')
data_infos.append('num_produit', infosMedi[0].textContent)
sortie.send(data_infos)

var delegue = new XMLHttpRequest()
delegue.onreadystatechange = function () {
    if (delegue.readyState === 4) {
        if (delegue.status === 200) {
            if (delegue.response) {
                var serv = document.querySelector(".serv")
                serv.innerHTML += delegue.response
            }
        }
    }
}
delegue.open('POST', '../public/medecine/sortie/liste_delegue.php', true)
delegue.setRequestHeader('X-Requested-With', 'xmlhttprequest')
delegue.send()
