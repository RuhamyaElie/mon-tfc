var btnVue = document.querySelector(".btnVue")
btnVue.addEventListener("click", function () {
    location.assign("../about/about.php")
})
var btnExp = document.querySelector(".btnExp")
btnExp.addEventListener("click", function () {
    location.assign("../public/travail de fin de cycle.pdf")
})
var btnLancez = document.querySelector(".btnLancez")
btnLancez.addEventListener("click", function (e) {
    e.preventDefault()
    var xhrDelete = new XMLHttpRequest()
    xhrDelete.onreadystatechange = function () {
        if (xhrDelete.readyState === 4)
        {
            if (xhrDelete.status === 200)
            {
                if (xhrDelete.response === "succès")
                {
                    location.assign("../home/home.php")
                }
            }
        }
    }
    xhrDelete.open("POST", "../public/truncate.php", true)
    xhrDelete.setRequestHeader('X-Requested-With', 'xmlhttprequest')
    xhrDelete.send()
})