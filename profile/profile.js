var btnInfosASavoir = document.querySelector(".btnInfosASavoir")

var xhrInfos = new XMLHttpRequest()
var divContGauche = document.querySelector(".divContGauche")
xhrInfos.onreadystatechange = function () {
    if (xhrInfos.readyState === 4)
    {
        if (xhrInfos.status === 200)
        {
            divContGauche.innerHTML += xhrInfos.response
        }
    }
}
xhrInfos.open("POST", "../public/user/infosUser.php", true)
xhrInfos.setRequestHeader('X-Requested-With', 'xmlhttprequest')
xhrInfos.send()

var btnModi = document.querySelector(".btnModi")
btnModi.addEventListener("mousedown", function () {
    btnInfosASavoir.style.backgroundColor = "#A3C6E4"
    btnModi.style.backgroundColor = "#113153"
    var divBody = document.querySelector(".divBody")
    divBody.innerHTML += "<div class=\"divContModifier\">\
                                <div class=\"divCont\">\
                                    <div class=\"divImgModi\">\
                                        <img src=\"../img/svg/undraw_science_fqhl.svg\" class=\"imgModi\">\
                                    </div>\
                                    <div class=\"divPara\">\
                                    <p class=\"para\">Vous êtes sur le point de supprimer ce compte, validez la suppression.</p>\
                                    </div>\
                                    <div class=\"divChampsModi\">\
                                        <form action=\"\" method=\"POST\" id=\"formUti\">\
                                            <input class=\"nomU\" placeholder=\"Nom d'utilisateur\" name=\"nomU\">\
                                            <input class=\"preU\" placeholder=\"Pre-nom d'utilisateur\" name=\"preU\">\
                                            <input class=\"admU\" placeholder=\"Adresse mail\" name=\"admU\">\
                                            <input class=\"mdpU\" type=\"password\" placeholder=\"Mot de passe\" name=\"mdpU\">\
                                            <input class=\"Confmdp\" type=\"password\" placeholder=\"Confirmation\" name=\"Confmdp\">\
                                            <p class=\"paraAlertModi\"></p>\
                                            <button type=\"submit\" class=\"btnValidModi\">\
                                                Modifier les informations\
                                            </button>\
                                        </form>\
                                        <a href=\"\" class=\"paraAnn\">Annuler<a>\
                                    </div>\
                                    </div>\
                                </div>"
                                var btnValidModi = document.querySelector(".btnValidModi")
                                var paraAlertModi = document.querySelector(".paraAlertModi")
                                btnValidModi.addEventListener("click", function (e) {
                                    e.preventDefault()
                                    var formUti = document.getElementById("formUti")
                                    var xhrModi = new XMLHttpRequest()
                                    var formU = new FormData(formUti)
                                    xhrModi.onreadystatechange = function () {
                                        if (xhrModi.readyState === 4)
                                        {
                                            if (xhrModi.status === 200)
                                            {
                                                if (xhrModi.response === "succès")
                                                {
                                                    location.reload()
                                                } else {
                                                    paraAlertModi.textContent = "Informations incorrectes"
                                                }
                                            }
                                        }
                                    }
                                    xhrModi.open("POST", "../public/user/updateUser.php", true)
                                    xhrModi.setRequestHeader('X-Requested-With', 'xmlhttprequest')
                                    xhrModi.send(formU)
                                })
})

var btnSuppr = document.querySelector(".btnSuppr")
btnSuppr.addEventListener("click", function () {
    btnInfosASavoir.style.backgroundColor = "#A3C6E4"
    btnSuppr.style.backgroundColor = "#113153"
    var divBody = document.querySelector(".divBody")
    divBody.innerHTML += "<div class=\"divContSupprimer\">\
                                <div class=\"divCont\">\
                                    <div class=\"divImgSupp\">\
                                        <img src=\"../img/svg/undraw_science_fqhl.svg\" class=\"imgModi\">\
                                    </div>\
                                    <div class=\"divChampsModi\">\
                                        <div class=\"divPara\">\
                                            <p class=\"para\">Vous êtes sur le point de supprimer ce compte, validez la suppression.</p>\
                                        </div>\
                                        <form action=\"\" method=\"POST\" id=\"formDel\">\
                                            <input class=\"mdpU\" type=\"password\" placeholder=\"Mot de passe\" name=\"mdpU\">\
                                            <input class=\"Confmdp\" type=\"password\" placeholder=\"Confirmation\" name=\"Confmdp\">\
                                            <p class=\"paraSup\"></p>\
                                            <button type=\"submit\" class=\"btnValidModi\">\
                                                Supprimer ce compte\
                                            </button>\
                                        </form>\
                                        <a href=\"\" class=\"paraAnn\">Annuler<a>\
                                    </div>\
                                    </div>\
                                </div>"
                                var formDel = document.getElementById("formDel")
                                var btnValidModi = document.querySelector(".btnValidModi")
                                var paraSup = document.querySelector(".paraSup")
                                btnValidModi.addEventListener("click", function (e) {
                                    e.preventDefault()
                                    var xhrDelete = new XMLHttpRequest()
                                    var formU = new FormData(formDel)
                                    xhrDelete.onreadystatechange = function () {
                                        if (xhrDelete.readyState === 4)
                                        {
                                            if (xhrDelete.status === 200)
                                            {
                                                if (xhrDelete.response === "succès")
                                                {
                                                    location.assign("../index.php")
                                                } else {
                                                    paraSup.textContent = "Informations incorrectes"
                                                }
                                            }
                                        }
                                    }
                                    xhrDelete.open("POST", "../public/user/deleteUser.php", true)
                                    xhrDelete.setRequestHeader('X-Requested-With', 'xmlhttprequest')
                                    xhrDelete.send(formU)
                                })
})

var btnDeco = document.querySelector(".btnDeco")
btnDeco.addEventListener("click", function () {
    location.assign("../index.php")
})