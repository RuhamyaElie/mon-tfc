var imgIm = document.querySelector(".imgIm")
imgIm.addEventListener("click", function () {
    // alert("réussi")
    var printContents = document.querySelector(".divConteneur")
    // var originalContents =  document.body.innerHTML
    document.body.innerHTML = printContents.innerHTML
    window.print()
    document.location.reload()
})

var imgAct = document.querySelector(".imgAct")
imgAct.addEventListener("click", function () {
    location.reload()
})

// les entrées
var divCont = document.querySelector(".divCont")
var pr = document.querySelector(".pr")
var produit = new FormData()
var xhr_mes_entrees = new XMLHttpRequest()
xhr_mes_entrees.onreadystatechange = function () {
    if (xhr_mes_entrees.readyState === 4)
    {
        if (xhr_mes_entrees.status === 200)
        {
            if (xhr_mes_entrees.response)
            {
                divCont.innerHTML += xhr_mes_entrees.response
                // divCont.innerHTML.style.marginBottom = "5px"
            }
        }
    }
}
xhr_mes_entrees.open("POST", "../public/medecine/etat_de_sortie/mes_entrees.php", true)
xhr_mes_entrees.setRequestHeader('X-Requested-With', 'xmlhttprequest')
produit.append("produit", pr.textContent)
xhr_mes_entrees.send(produit)

// la sortie

var produit = new FormData()
var xhr_mes_sorties = new XMLHttpRequest()
xhr_mes_sorties.onreadystatechange = function () {
    if (xhr_mes_sorties.readyState === 4)
    {
        if (xhr_mes_sorties.status === 200)
        {
            if (xhr_mes_sorties.response)
            {
                divCont.innerHTML += `
                                    <div class="divTitle__">
                                        <div class="de">
                                            <p class="pde">Date de sortie</p>
                                        </div>
                                        <div class="nl">
                                            <p class="pnl">Le service concerné</p>
                                        </div>
                                        <div class="dp">
                                            <p class="pdp">Le nom du délégué</p>
                                        </div>
                                        <div class="so">
                                            <p class="pso">La quantité réstante</p>
                                        </div>
                                        <div class="qs">
                                            <p class="pqs">La quantité sortante</p>
                                        </div>
                                    </div>`
                divCont.innerHTML += xhr_mes_sorties.response
                // divCont.innerHTML.style.marginTop = "5px"
            }
        }
    }
}
xhr_mes_sorties.open("POST", "../public/medecine/etat_de_sortie/mes_sorties.php", true)
xhr_mes_sorties.setRequestHeader('X-Requested-With', 'xmlhttprequest')
produit.append("produit", pr.textContent)
xhr_mes_sorties.send(produit)