class ListeService
{
    static liste_service_()
    {
        var divIndiServ = document.querySelector(".divIndiServ")
        var formServ = document.querySelector(".formServ")
        var xhrListeServ = new XMLHttpRequest()
            xhrListeServ.onreadystatechange = function () {
                if (xhrListeServ.readyState === 4) {
                    if (xhrListeServ.status === 200) {
                        if (xhrListeServ.response) {
                            divIndiServ.innerHTML = xhrListeServ.response
                            divIndiServ.style.marginTop = "auto"
                            divIndiServ.style.paddingTop = "9px"
                            divIndiServ.style.width = "93%"
                            divIndiServ.style.height = "95%"
                            divIndiServ.style.overflowY = "scroll"

                            var btn_modi = document.querySelectorAll(".btn_modi")
                            for (var i=0; i<btn_modi.length; i++)
                            {
                                btn_modi[i].addEventListener("click", function () {
                                    document.body.innerHTML += `<div class="divUpdate">
                                                                    <div class="divContModi">
                                                                        <div class="divImgModi">
                                                                            <img class="imgModifier" src="../img/svg/undraw_data_processing_yrrv.svg">
                                                                        </div>
                                                                        <div>
                                                                            <p class="paraModi">Vous êtes sur le point de supprimer un service.<br>
                                                                            Voulez vous vraiment le faire?</p>
                                                                        </div>
                                                                        <div>
                                                                            <form class="formModi" action="">
                                                                                <input type="text" name="NNS" class="nomS" placeholder="Nom du service">
                                                                                <input type="text" name="NND" class="nomD" placeholder="Nom du délégué">
                                                                                <input type="text" name="NPD" class="prenomD" placeholder="Prenom du délégué">
                                                                            </form>
                                                                        </div>
                                                                        <div>
                                                                            <p class="paraAlertModi"><p/>
                                                                        </div>
                                                                        <div>
                                                                            <input type="submit" value="Valider la modification" class="btnModifier">
                                                                        </div>
                                                                        <a href="" class="paraModi">Annuler<a>
                                                                    </div>
                                                                </div>`
                                    var btnModifier = document.querySelector(".btnModifier")
                                    var paraAlertModi = document.querySelector(".paraAlertModi")
                                    var ancien_nom = this.textContent
                                    btnModifier.addEventListener("click", function (e) {
                                        var formModi = document.querySelector(".formModi")
                                        if (formModi[0].value && formModi[1] && formModi[2])
                                        {
                                            e.preventDefault()
                                            var xhrModi = new XMLHttpRequest()
                                            var formModiDatas = new FormData(formModi)
                                            xhrModi.onreadystatechange = function () {
                                                if (xhrModi.readyState === 4) {
                                                    if (xhrModi.status === 200) {
                                                        if (xhrModi.response === "success") {
                                                            location.reload()
                                                        } else if (xhrModi.response === "fail") {
                                                            paraAlertModi.textContent = "Service ou Délégué existe éxistant"
                                                        } else {
                                                            alert("un problème est survenu")
                                                        }
                                                    }
                                                }
                                            }
                                            xhrModi.open("POST", "backend/modifier_liste_service.php", true)
                                            xhrModi.setRequestHeader('X-Requested-With', 'xmlhttprequest')
                                            formModiDatas.append('ancien_nom', ancien_nom)
                                            xhrModi.send(formModiDatas)
                                        } else {
                                            paraAlertModi.textContent = "Informations invalides"
                                        }
                                    })
                                })
                            }

                            var btn_supp = document.querySelectorAll(".btn_supp")
                            for (var i=0; i<btn_supp.length; i++) {
                                btn_supp[i].addEventListener("click", function () {
                                    document.body.innerHTML += `<div class="divDelete">
                                                                    <div class="divContDel">
                                                                        <div class="divImgDel">
                                                                            <img class="imgDelete" src="../img/svg/undraw_data_processing_yrrv.svg">
                                                                        </div>
                                                                        <div>
                                                                            <p class="paraSupp">Vous êtes sur le point de supprimer un service.<br>
                                                                            Voulez vous vraiment le faire?</p>
                                                                        </div>
                                                                        <div>
                                                                            <button class="btnSupp">supprimer ce service</button>
                                                                        </div>
                                                                        <a href="" class="paraSupp">Annuler<a>
                                                                    </div>
                                                                </div>`
                                                                var nom_serv = this.textContent
                                                                var btnSupp = document.querySelector(".btnSupp")
                                                                btnSupp.addEventListener("click", function () {
                                                                    var xhrSuppServ = new XMLHttpRequest()
                                                                    var data_service = new FormData()
                                                                    xhrSuppServ.onreadystatechange = function () {
                                                                        if (xhrSuppServ.readyState === 4) {
                                                                            if (xhrSuppServ.status === 200) {
                                                                                if (xhrSuppServ.response === "supprimer") {
                                                                                    location.reload()
                                                                                } else {
                                                                                    alert("Suppréssion non possible")
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                    xhrSuppServ.open('POST', "backend/supprimer_service.php", true)
                                                                    xhrSuppServ.setRequestHeader('X-Requested-With', 'xmlhttprequest')
                                                                    data_service.append('nom_serv', nom_serv)
                                                                    xhrSuppServ.send(data_service)
                                                                })
                                })
                            }

                        } else {
                            var xhrViderService = new XMLHttpRequest()
                            xhrViderService.open("POST", "backend/vider_liste_service.php", true)
                            xhrViderService.setRequestHeader('X-Requested-With', 'xmlhttprequest')
                            xhrViderService.send()
                        }
                    }
                }
            }
            xhrListeServ.open("post", "backend/liste_service.php", true)
            xhrListeServ.setRequestHeader('X-Requested-With', 'xmlhttprequest')
            xhrListeServ.send()
    }
}
ListeService.liste_service_()


var formServ = document.querySelector(".formServ")
var paraAlert = document.querySelector(".paraAlert")
var btnValidServ = document.querySelector(".btnValidServ")
btnValidServ.addEventListener("click", function (e) {
    e.preventDefault()
    if (formServ[0].value)
    {
        document.body.innerHTML += "<div class=\"divDelegue\">\
                                        <div class=\"divAjoutDel\">\
                                            <div class=\"divImgDel\">\
                                                <img src=\"../img/svg/undraw_medicine_b1ol.svg\" class=\"imgDel\">\
                                            </div>\
                                            <div>\
                                                <p class=\"paraDel\">\
                                                    Pour valider ce cervice, vous devez remplir le nom et le prenom du délégué de chaque service.\
                                                </p>\
                                            </div>\
                                            <div class=\"divFormDel\">\
                                                <form action=\"\" class=\"formDelegue\" method=\"POST\">\
                                                    <div>\
                                                        <input type=\"text\" placeholder=\"Nom\" class=\"nomD\" name=\"nomD\">\
                                                    </div>\
                                                    <div>\
                                                        <input type=\"text\" placeholder=\"Prenom\" class=\"prenomD\" name=\"prenomD\">\
                                                    </div>\
                                                    <p class=\"paraAlertDel\"></p>\
                                                    <input type=\"submit\" class=\"btnValDel\" value=\"Enregistrer un délégué\">\
                                                </form>\
                                                <a class=\"linkAnn\" href=\"\">Annuler</a>\
                                            </div>\
                                        </div>\
                                    </div>"
                                    // var formServ = document.querySelector(".formServ")
                                    var btnValDel = document.querySelector(".btnValDel")

                                    var formDelegue = document.querySelector(".formDelegue")
                                    btnValDel.addEventListener("click", function (e) {
                                        e.preventDefault()
                                        var paraAlertDel = document.querySelector(".paraAlertDel")
                                        if (formDelegue[0].value && formDelegue[1].value)
                                        {
                                            var xhrServ = new XMLHttpRequest()
                                            var formService_ = new FormData(formServ)

                                            var xhrDelegue = new XMLHttpRequest()
                                            var formDelegue_ = new FormData(formDelegue)
                                            xhrDelegue.onreadystatechange = function () {
                                                if (xhrDelegue.readyState === 4) {
                                                    if (xhrDelegue.status === 200) {
                                                        if (xhrDelegue.response === "existe") {
                                                            paraAlertDel.textContent = "Ce délégué existe déja!"
                                                        } else {
                                                            location.reload()
                                                        }
                                                    }
                                                }
                                            }
                                            xhrDelegue.open('POST', 'backend/ajout_delegue.php', true)
                                            xhrServ.open('POST', 'backend/ajout_service.php', true)
                                            xhrServ.setRequestHeader('X-Requested-With', 'xmlhttprequest')
                                            xhrDelegue.setRequestHeader('X-Requested-With', 'xmlhttprequest')
                                            xhrDelegue.send(formDelegue_)
                                            xhrServ.send(formService_)
                                        } else {
                                            paraAlert.textContent = "Information invalide"                                    
                                        }
                                    })
    } else {
        paraAlert.textContent = "Information invalide"
    }
})
