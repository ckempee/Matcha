
<?php
include('./src/connexion.php');
session_start();

if (!isset($_SESSION['connect'])) {
    header('location: ./login.php');
    exit();
}

if (isset($_POST['logout'])){
    session_destroy();
    header('location:login.php');
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/matcha.png" type="image/x-icon">
    <link rel="stylesheet" href="./style4.css">
    <title>Admin panel</title>
</head>
<body>

   <?php

   include('./admin_header.php')
   ?>
   
   <section class="dashboard">
    <div class="box-container">
        <div class="box">
            <!---on va afficher le nombre de commande encore en cours--->
           <?php
           $total_pendings=0;
           $requete = $bdd->query("SELECT * FROM `orders` WHERE payement_status='en attente'");

           while($fetch_pending=$requete->fetch()){
            $total_pendings+=$fetch_pending['total_price'];
           }

           ?>
           <h3>$ <?php echo $total_pendings; ?></h3>
           <p>Total pendings:</p>
        </div>
        <div class="box">
            <!---on va afficher le nombre de commande encore en cours--->
           <?php
           $total_completes=0;
           $requete = $bdd->query("SELECT * FROM `orders` WHERE payement_status='complete'");

           while($fetch_completes=$requete->fetch()){
            $total_completes+=$fetch_completes['total_price'];
           }

           ?>
           <h3>$ <?php echo $total_completes; ?></h3>
           <p>Total completes:</p>
        </div>
        <div class="box">
            <!---on va afficher le nombre de commande encore en cours--->
           <?php
            $requete = $bdd->query("SELECT * FROM `orders`");
            $num_orders = $requete->rowCount();

           ?>
           <h3><?php echo $num_orders; ?></h3>
           <p>order placed:</p>
        </div>
        <div class="box">
            <!---on va afficher le nombre de commande encore en cours--->
           <?php
            $requete = $bdd->query("SELECT * FROM `orders`");
            $num_products = $requete->rowCount();

           ?>
           <h3><?php echo $num_products; ?></h3>
           <p>products added</p>
        </div>
        <div class="box">
            <!---on va afficher le nombre de commande encore en cours--->
           <?php
            $requete = $bdd->query("SELECT * FROM `users` WHERE user_type='user'");
            $num_users = $requete->rowCount();

           ?>
           <h3><?php echo $num_users; ?></h3>
           <p>total normal users</p>
        </div>
        <div class="box">
            <!---on va afficher le nombre de commande encore en cours--->
           <?php
            $requete = $bdd->query("SELECT * FROM `users` WHERE user_type='admin'");
            $num_admin = $requete->rowCount();

           ?>
           <h3><?php echo $num_admin; ?></h3>
           <p>total admin</p>
        </div>
        <div class="box">
            <!---on va afficher le nombre de commande encore en cours--->
           <?php
            $requete = $bdd->query("SELECT * FROM `users`");
            $total_users = $requete->rowCount();

           ?>
           <h3><?php echo $total_users; ?></h3>
           <p>total users</p>
        </div>
        <div class="box">
            <!---on va afficher le nombre de commande encore en cours--->
           <?php
            $requete = $bdd->query("SELECT * FROM `message`");
            $num_message = $requete->rowCount();

           ?>
           <h3><?php echo $num_message; ?></h3>
           <p>messages</p>
        </div>
    </div>
   </section>
   <script src="./script.js"></script>
</body>
</html>