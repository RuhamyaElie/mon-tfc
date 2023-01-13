var formValid = document.getElementById("formValid")
var paraMDP = document.querySelector(".paraMDP")

var btnValid = document.querySelector(".btnValid")
btnValid.addEventListener("click", function (e) {
    e.preventDefault()
    var xhr = new XMLHttpRequest()
    var veriDatas = new FormData(formValid)
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                if (xhr.responseText) {
                    location.assign("../home/home.php")
                } else {
                    paraMDP.innerHTML = "Informations invalides"
                    }
                }
            }
        }
    xhr.open("POST", "../public/user/Recover_.php", true)
    xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest')
    xhr.send(veriDatas)
})

var imgLog2 = document.querySelector(".imgLog2")
var champMDP = document.querySelector(".champMDP")
imgLog2.addEventListener("click", function () {
    if (champMDP.type === "password")
    {
        champMDP.type = "text"
        this.style.background = "#89AED1"
        this.style.transition = "0.3s"
        this.style.borderRadius = "5px"
    } else {
        champMDP.type = "password"
        this.style.background = ""
        this.style.transition = "0.3s"
    }
})