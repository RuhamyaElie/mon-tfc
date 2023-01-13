var btnSub = document.querySelector(".btnSub")

var input = document.querySelectorAll(".champN, .champP, .champM, .champMDP, .champConfMDP")
var paraAlert = document.querySelectorAll(".paraN, .paraP, .paraM, .paraMDP, .paraConfMDP")
var divBtnSub = document.querySelector(".divBtnSub")

var regNom = /^[a-zA-Z0-9éèïîÉÈÎÏ\_\-\#\$]+$/
var regMail = /^[a-zéèïî][a-zéèïî0-9/./@]+/
var regMDP = /^[a-zA-Z0-9éèïîÉÈÎÏ\_\-\#\$]+$/

var formUti = document.getElementById("formUti")
btnSub.addEventListener("click", function (e) {
    if (!(regNom.test(input[0].value)) || (input[0].value.length <= 3))
    {
        e.preventDefault()
        paraAlert[0].textContent = "Champ invavide"
    }
    else if (!(regNom.test(input[1].value)) || (input[1].value.length <= 3)) {
        e.preventDefault()
        paraAlert[0].textContent = ""
        paraAlert[1].textContent = "Champ invavide"
    } 
    else if (!regMail.test(input[2].value)) {
        e.preventDefault()
        paraAlert[0].textContent = ""
        paraAlert[1].textContent = ""
        paraAlert[2].textContent = "Mail invalide"
    } else if (!(input[3].value.length >= 4 && input[3].value.length <= 16 && regMDP.test(input[3].value))) {
        e.preventDefault()
        paraAlert[0].textContent = ""
        paraAlert[1].textContent = ""
        paraAlert[2].textContent = ""
        paraAlert[3].textContent = "Champ invalide"
    } else if (!(input[3].value === input[4].value)) {
        e.preventDefault()
        paraAlert[0].textContent = ""
        paraAlert[1].textContent = ""
        paraAlert[2].textContent = ""
        paraAlert[3].textContent = ""
        paraAlert[4].textContent = "Confirmation incorrecte"
    } else {
        e.preventDefault()
        paraAlert[4].textContent = ""
        var xhr = new XMLHttpRequest()
        var datas = new FormData(formUti)
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4)
            {
                if (xhr.status === 200)
                {
                    if (xhr.responseText === "succé")
                    {
                        location.assign("../reception/reception.php")
                    } else if (xhr.responseText === "échec")
                    {
                        btnSub.value = "Ce site est sur-mesure, utilisez le compte existant"
                    } else {
                        btnSub.value = "Réessayez!"
                    }
                }
            }
        }
        xhr.open('POST', "../public/user/User.php",true)
        xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest')
        xhr.send(datas)
    }
})

var imgPna = document.querySelector(".imgPna")
imgPna.addEventListener("click", function () {
    if (input[3].type === "password")
    {
        input[3].type = "text"
        this.style.background = "#89AED1"
        this.style.transition = "0.3s"
        this.style.borderRadius = "5px"
    } else {
        input[3].type = "password"
        this.style.background = ""
        this.style.transition = "0.3s"
    }
})

var imgPnb = document.querySelector(".imgPnb")
imgPnb.addEventListener("click", function () {
    if (input[4].type === "password")
    {
        input[4].type = "text"
        this.style.background = "#89AED1"
        this.style.transition = "0.3s"
        this.style.borderRadius = "5px"
    } else {
        input[4].type = "password"
        this.style.background = ""
        this.style.transition = "0.3s"
    }
})