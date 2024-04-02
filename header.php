<?php
include('./src/connexion.php');
if (isset($_SESSION['connect'])){
  $user_id=$_SESSION['user_id'];
}

if (isset($_POST["logout"])) {
  // Détruisez la session actuelle
  session_destroy();

  // Redirigez l'utilisateur vers la page de connexion ou toute autre page souhaitée après la déconnexion
  header("Location: ./login.php");
  exit();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />        <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>
<style>
  sup{
  position: absolute;
  top:7%;
 right: 90px;
  background: #000;
  color: #fff;
  border-radius: 50%;
  width: 15px;
  height: 15px;
  line-height: 15px;
  text-align: center;
  padding:.1rem;
}

#menu-btn{
    display: none;
}

i{
  color: #000;
  margin-right: 20px;
}


.user-box{
    position: absolute;
    top: 13%;
    background-color: white;
    box-shadow: var(--box-shadow);
    border-radius: .5rem;
    padding: 1rem;
    text-align: center;
    width: 17rem;
    height: 150px;
    transform: scale(0);
    transform-origin: top right;
    display: flex;
    flex-direction: column;
    padding: 15px;
}

.logout-btn{
    background:rgba(24, 82, 58);
    color: #fff;
    text-transform: uppercase;
    width: 200px;
    height: 50px;
    border-radius: 4px;
}

.user-box.active{
    transform: scale(1.0);
    transition: .2s linear;
}

.btn_connect{
  margin-top: 10px;
    background: linear-gradient(90deg, #9ebd13 0%, #008552 100%);
    width: 100%;
    height: 40px;
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 1em;
    position: center;
    margin-bottom: 10px;
    align-items: center;
    padding-top: 15px;
    text-transform: uppercase;

}

form{
  padding: 0;
  padding-left: 50px;
  align-items: center;
}


</style>
<body>
<section class="navbar">
<header style="background-color:white">
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
                        <li><a href="./products.php?category=box">Les box</a></li>
                      </ul>
                    </li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
                    

                        
            <div class="achat">
             <?php

if (isset($_SESSION['connect'])){
             $req=$bdd->prepare('SELECT * FROM cart WHERE users_id=?');
             $req->execute(array($user_id));

             $number_cart=$req->rowCount();}


              ?>
              <a href="./panier.php"> <img src="./images/panier.png" alt="" id='cart-icon'> <?php if (isset($_SESSION['connect'])){  ?><sup> <?php echo $number_cart ?></sup>  <?php  }  ?></a>
             
              



            
          <a href="./login.php"> <i class="fa-regular fa-user" id='user-btn'></i></a>

          <div class="user-box">
    <?php if (isset($_SESSION['connect'], $_SESSION['user_name'], $_SESSION['user_mail'])) { ?>
        <p>Nom de l'utilisateur: <span><?php echo $_SESSION['user_name']; ?></span></p>
        <p>Email: <span><?php echo $_SESSION['user_mail']; ?></span></p>
        <form method="post">
            <button type="submit" class='logout-btn' name='logout'>Logout</button>
            
        </form>
    <?php } 
    
    else{
      echo('
      <a href="./login.php" class="btn_connect"> Se connecter</a>
      <a href="./login.php" class="btn_connect"> S inscrire</a>
      ');
    }?>
</div>
              
            <img src="./images/verifications-necessaires.png" alt="" width="30px" height="30px">

            </div>
            </header>
</section>
<section>

<script>
  
  let userBtn = document.querySelector('#user-btn');
let userBox = document.querySelector('.user-box');

if (userBtn && userBox) {
    userBtn.addEventListener('click', function (event) {
        // Empêcher le comportement par défaut du lien (pour éviter la redirection)
        event.preventDefault();

        // Afficher ou masquer la classe "active" de la boîte utilisateur
        userBox.classList.toggle('active');
    });
} else {
    console.error('Le bouton utilisateur ou la boîte utilisateur n\'a pas été trouvé');
}

</script>
</body>
</html>