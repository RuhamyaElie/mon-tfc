// class MesInformations
// {
//     static informationsProfile() {
//         document.body.innerHTML += "<div class=\"divContProf\">\
//                                         <div class=\"divInfos\">\
//                                             <div class=\"divTrans\"></div>\
//                                             <div class=\"divCont\">\
//                                                 <div class=\"divSousInfos\">\
//                                                     <div class=\"divImgProf\">\
//                                                        <img src=\"../img/svg/undraw_profile_pic_ic5t.svg\" class=\"imgProfile\">\
//                                                     </div>\
//                                                 <div class=\"divNom\">\
//                                                     <h3>Ruhamya Elie</h3\
//                                                 </div>\
//                                                 <div class=\"divAddrM\">\
//                                                     <p class=\"paraMail\">elieruhamya20@gmail.com</p>\
//                                                 </div>\
//                                                 <div class=\"divBtnsProf\">\
//                                                     <button class=\"btnVisu\">Bien visualiser</button>\
//                                                 </div>\
//                                             </div\
//                                             </div>\
//                                         </div>\
//                                     </div>"
//         var btnVisu = document.querySelector(".btnVisu")
//         btnVisu.addEventListener("click", function () {
//             location.assign('../profile/profile.php')
//             // il faut etre hors live server
//         })
//     }
// }
// MesInformations.informationsProfile()
// manipulation header
// var divProf = document.querySelector('.divProf')
// divProf.addEventListener('click', function () {
//     var divContProf = document.querySelector(".divContProf")
//     divContProf.classList.toggle("changement")
// })
//     // déconnection
// var divDec = document.querySelector(".divDec")
// divDec.addEventListener("click", function () {
//         location.assign("../logIn/logIn.php")
// })
//     // thème
// var divApp = document.querySelector(".divApp")
// divApp.addEventListener("click", function () {
//         alert("accès réussi")
// })
// logo
var logoPage = document.querySelector(".logoPage")
logoPage.addEventListener("click", function () {
    location.reload()
})

// mes bouttons de navigation
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
