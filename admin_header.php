<?php

if(isset($_POST['logout_btn'])) {
    // Détruire toutes les variables de session
    session_unset();
    
    // Détruire la session
    session_destroy();
    
    // Rediriger l'utilisateur vers une page de connexion par exemple
    header("Location: login.php");
    exit(); // Assurez-vous de terminer le script après la redirection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <title>Document</title>
</head>
<body>
    <header class='header'>
        <div class="flex">
            <a href="./adminpanel.php" class='logo'> MATCHA </a>
            <nav class='navbar'>
                <a href="./adminpannel.php">Acceuil</a>
                <a href="./admin_product.php">Produits</a>
                <a href="./admin_order.php">Commandes</a>
                <a href="./admin_users.php">Users</a>
                <a href="./admin_messages.php">Messages</a>

            </nav>
            <div class="icons">
                
                <i class="fa-regular fa-user" id='user-btn'></i>
                <i class="fa-solid fa-bars" id='menu-btn'></i>
                
            </div>
            <div class="user-box">
                <p>Nom de l'utilisateur: <span><?php  if (isset($_SESSION['connect'])) {echo $_SESSION['admin_name'];}  ?> </span></p>
                <p>Email: <span><?php if (isset($_SESSION['connect'])) { echo $_SESSION['admin_mail']; } ?> </span></p>
                <form method="post">
                    <button type="submit" class='logout-btn' name='logout'> logout</button>
                </form>
            </div>
        </div>
    </header>
    <div class="banner">
        <div class="detail">
            <h1>Tableau d'administrateur</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto incidunt suscipit magnam non officia saepe eum illo modi ea quos labore sapiente, perspiciatis, corporis omnis libero, rem nihil dolor esse.</p>
        </div>
    </div>
   
</body>
<script src="./script.js"></script>
</html>