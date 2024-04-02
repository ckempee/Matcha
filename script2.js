// exercice: rendre la navbar fixe
const header=document.querySelector('header');
function fixedNavbar(){
    header.classList.toggle('scrolled',window.pageYOffset > 0)
}
fixedNavbar();
window.addEventListener('scroll',fixedNavbar)

// exercice: faire un menu déroulant à partir d'une certaine taille d'écran
//meme chose avec l'userbox qui apparaitre que quand on clic sur l'icone user
let menu=document.querySelector('#menu-btn');
let userBtn=document.querySelector('#user-btn');

menu.addEventListener('click',function(){
    let nav=document.querySelector('.navbar');
    nav.classList.toggle('active');
})

userBtn.addEventListener('click',function(){
    let userBox=document.querySelector('.user-box');
    userBox.classList.toggle('active');
})
