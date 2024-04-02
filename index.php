<?php 
include('./src/connexion.php');
session_start();



if (isset($_POST['logout'])){
    session_destroy();
    header('location:./login.php');
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
    <link rel="stylesheet" href="./index.css">
    <title>Document</title>
</head>
<body>



<section id="firstPage">

<header>
            <div id='logo'> <strong>MATCHA</strong> </div>
            <div class="nav">
                <ul>
                    <li> <a href="./index.php">Acceuil</a> </li>
                    <li class="menu-deroulant">
                      <a href="#">Découvrir</a>
                      <ul class="sous-menu">
                        <li><a href="./bienfaits.php">Les bienfaits</a></li>
                        <li><a href="./valeurs.php">Nos valeurs</a></li>
                      </ul>
                    </li>
                    <li class="menu-deroulant">
                      <a href="#">Shop</a>
                      <ul class="sous-menu">
                      <li><a href="./products.php">Tous les produits</a></li>
                        <li><a href="./products.php?category=matcha">Les matchas</a></li>
                        <li><a href="./products.php?category=ustensil">Les ustensils</a></li>
                        <li><a href="./products.php?category=ustensil">Les boxs</a></li>
                      </ul>
                    </li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
                    

                        
            <div class="achat">
            <img src="./images/panier.png" alt="" width="30px" height="30px">
            
             <a href="./login.php"> <img src="./images/la-personne.png" alt="" width="30px" height="30px"> </a>
           
            <img src="./images/verifications-necessaires.png" alt="" width="30px" height="30px">

            </div>
            </header>
        <div class="textFirstPage">
            <div class="titresFirstPage">
                <h6>Matcha fait avec amour, cultivé de manière responsable</h6>
                <h1>Le meilleure matcha 100% naturel</h1>
                <a href="./products.php"><button> Acheter maintenant</button> </a>
            </div>
        </div>
    </section>
    <section id="infos">
        <div class="infosText">
            <img src="./images/matcha.jpg" alt="" width="100px" height="100px" color="white">
            <h6>Matcha de qualité</h6>
        </div>
        <div class="infosText"><img src="./images/matcha.jpg" alt="" width="100px" height="100px" color="white">
            <h6>Certifié bio</h6></div>
        <div class="infosText"><img src="./images/matcha.jpg" alt="" width="100px" height="100px" color="white">
            <h6>Eco-responsable</h6></div>
        <div class="infosText"><img src="./images/matcha.jpg" alt="" width="100px" height="100px" color="white">
            <h6>Made in France</h6></div>
    </section>

    <section id="discoveryPack">
        <div class="imageDiscovery">
            <img src="./images/pack.jpg" alt="">
        </div>
        <div class="textDiscovery">
            <h2>Discovery Pack</h2>
            <h6>Le moyen parfait de débuter avec le matcha</h6>

            <h3>Découvrez notre collection de Discovery Packs, soigneusement élaborés pour vous faire voyager à travers les nuances et les arômes uniques du matcha. Chaque pack est une invitation à explorer de nouveaux horizons gustatifs, à savourer des moments de détente et à embrasser la richesse culturelle de cette boisson ancestrale.

Que vous soyez un néophyte curieux ou un amateur averti, nos Discovery Packs sont conçus pour vous offrir une expérience authentique et immersive. Préparez-vous à être transporté dans un monde où le matcha règne en maître, où chaque gorgée est une invitation à la contemplation et à la revitalisation.

Prêt à commencer votre voyage ?</h3>
            <a href=""><button>Découvrir</button></a>
        </div>

    </section>

    <section id="shop">
        <div class="shopCards">
            <img src="./images/pack.jpg" alt="" width="100%" height="250px">
            <div class="shopText"> 
                <h3>Matcha de cérémonie</h3>
            <h4>Gout légèrement amer</h4>
            <h4> Avis *****</h4>
            <button>Ajouter au panier</button>
            </div>
            
        </div>
        <div class="shopCards">
        <img src="./images/pack.jpg" alt="" width="100%" height="250px">
            <div class="shopText"> 
                <h3>Matcha de cérémonie</h3>
            <h4>Gout légèrement amer</h4>
            <h4> Avis *****</h4>
            <button>Ajouter au panier</button>
            </div>
        </div>
        <div class="shopCards">
        <img src="./images/pack.jpg" alt="" width="100%" height="250px">
            <div class="shopText"> 
                <h3>Matcha de cérémonie</h3>
            <h4>Gout légèrement amer</h4>
            <h4> Avis *****</h4>
            <button>Ajouter au panier</button>
            </div>
        </div>
        <div class="shopCards">
        <img src="./images/pack.jpg" alt="" width="100%" height="250px">
            <div class="shopText"> 
                <h3>Matcha de cérémonie</h3>
            <h4>Gout légèrement amer</h4>
            <h4> Avis *****</h4>
            <button>Ajouter au panier</button>
            </div>
        </div>
    </section>

    <!--ajouter une  section avis sous forme de slider-->

    <section id="footer">
        <div class="newsletter">
            <h3>Inscrivez-vous à la Newsletter pour être prévenu des offres et recevoir quelques surprises !</h3>
            <p>
                
                <input type="email" name="mail" id="" placeholder="Entre votre addresse email">
                <button type="submit">S'inscrire</button>
       
            </p>
         </div>
         <div class="reseau">
            <h4>Rejoignez-nous!</h4>
                <a href=""><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0,0,256,256"
style="fill:#000000;">
<g fill="#f5efe9" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M9,4c-2.74952,0 -5,2.25048 -5,5v32c0,2.74952 2.25048,5 5,5h16.83203c0.10799,0.01785 0.21818,0.01785 0.32617,0h5.67383c0.10799,0.01785 0.21818,0.01785 0.32617,0h8.8418c2.74952,0 5,-2.25048 5,-5v-32c0,-2.74952 -2.25048,-5 -5,-5zM9,6h32c1.66848,0 3,1.33152 3,3v32c0,1.66848 -1.33152,3 -3,3h-8v-14h3.82031l1.40039,-7h-5.2207v-2c0,-0.55749 0.05305,-0.60107 0.24023,-0.72266c0.18718,-0.12159 0.76559,-0.27734 1.75977,-0.27734h3v-5.63086l-0.57031,-0.27149c0,0 -2.29704,-1.09766 -5.42969,-1.09766c-2.25,0 -4.09841,0.89645 -5.28125,2.375c-1.18284,1.47855 -1.71875,3.45833 -1.71875,5.625v2h-3v7h3v14h-16c-1.66848,0 -3,-1.33152 -3,-3v-32c0,-1.66848 1.33152,-3 3,-3zM32,15c2.07906,0 3.38736,0.45846 4,0.70117v2.29883h-1c-1.15082,0 -2.07304,0.0952 -2.84961,0.59961c-0.77656,0.50441 -1.15039,1.46188 -1.15039,2.40039v4h4.7793l-0.59961,3h-4.17969v16h-4v-16h-3v-3h3v-4c0,-1.83333 0.46409,-3.35355 1.28125,-4.375c0.81716,-1.02145 1.96875,-1.625 3.71875,-1.625z"></path></g></g>
</svg></a>
                <a href=""><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0,0,256,256"
style="fill:#000000;">
<g fill="#f5efe9" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M16,3c-7.16752,0 -13,5.83248 -13,13v18c0,7.16752 5.83248,13 13,13h18c7.16752,0 13,-5.83248 13,-13v-18c0,-7.16752 -5.83248,-13 -13,-13zM16,5h18c6.08648,0 11,4.91352 11,11v18c0,6.08648 -4.91352,11 -11,11h-18c-6.08648,0 -11,-4.91352 -11,-11v-18c0,-6.08648 4.91352,-11 11,-11zM37,11c-1.10457,0 -2,0.89543 -2,2c0,1.10457 0.89543,2 2,2c1.10457,0 2,-0.89543 2,-2c0,-1.10457 -0.89543,-2 -2,-2zM25,14c-6.06329,0 -11,4.93671 -11,11c0,6.06329 4.93671,11 11,11c6.06329,0 11,-4.93671 11,-11c0,-6.06329 -4.93671,-11 -11,-11zM25,16c4.98241,0 9,4.01759 9,9c0,4.98241 -4.01759,9 -9,9c-4.98241,0 -9,-4.01759 -9,-9c0,-4.98241 4.01759,-9 9,-9z"></path></g></g>
</svg></a>
                <a href=""><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0,0,256,256"
style="fill:#000000;">
<g fill="#f5efe9" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M9,4c-2.74952,0 -5,2.25048 -5,5v32c0,2.74952 2.25048,5 5,5h16.83203c0.10799,0.01785 0.21818,0.01785 0.32617,0h5.67383c0.10799,0.01785 0.21818,0.01785 0.32617,0h8.8418c2.74952,0 5,-2.25048 5,-5v-32c0,-2.74952 -2.25048,-5 -5,-5zM9,6h32c1.66848,0 3,1.33152 3,3v32c0,1.66848 -1.33152,3 -3,3h-8v-14h3.82031l1.40039,-7h-5.2207v-2c0,-0.55749 0.05305,-0.60107 0.24023,-0.72266c0.18718,-0.12159 0.76559,-0.27734 1.75977,-0.27734h3v-5.63086l-0.57031,-0.27149c0,0 -2.29704,-1.09766 -5.42969,-1.09766c-2.25,0 -4.09841,0.89645 -5.28125,2.375c-1.18284,1.47855 -1.71875,3.45833 -1.71875,5.625v2h-3v7h3v14h-16c-1.66848,0 -3,-1.33152 -3,-3v-32c0,-1.66848 1.33152,-3 3,-3zM32,15c2.07906,0 3.38736,0.45846 4,0.70117v2.29883h-1c-1.15082,0 -2.07304,0.0952 -2.84961,0.59961c-0.77656,0.50441 -1.15039,1.46188 -1.15039,2.40039v4h4.7793l-0.59961,3h-4.17969v16h-4v-16h-3v-3h3v-4c0,-1.83333 0.46409,-3.35355 1.28125,-4.375c0.81716,-1.02145 1.96875,-1.625 3.71875,-1.625z"></path></g></g>
</svg></a>
         </div>

         <div class="mentions">
            <div>
                <h3>Matcha</h3>
                <p>Shop</p>
                <p>Preparation</p>
                <p>Bienfaits</p>
                <p>A propos de nous</p>
            </div>
            <div>
            <h3>Mentions Légales</h3>
                <p>Shop</p>
                <p>Preparation</p>
                <p>Bienfaits</p>
                <p>A propos de nous</p>
            </div>
         </div>
    </section>

    <script src="./script2.js"></script>
</body>
</html>