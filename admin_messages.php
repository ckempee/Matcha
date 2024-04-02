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

//supprimer un produit de la bdd:
if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    

    //supprimer le produit de la base de données
    $delete_query = $bdd->prepare("DELETE FROM message WHERE id=?");
    $delete_query->execute(array($delete_id));


    header('location: ./admin_messages.php');
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/matcha.png" type="image/x-icon">
    <link rel="stylesheet" href="./style2.css">
    <title></title>
</head>
<body>


    <?php
include('./admin_header.php');
if(isset($message)){
    foreach ($message as $message){
        echo '
        <div class="message">
        <span>'.$message.'</span>
        <i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
        </div>';
    }
}

?>

<section class="message-container">
    <h1>Message(s) non lu(s)</h1>
    <div class="box-container">
        <?php
        $req = $bdd->prepare("SELECT * FROM message");
        $req->execute();
        if($req->rowCount() > 0){
            while ($fetch_message=$req->fetch()){

                ?>
                <div class="box">
                    <p>user id: <span> <?php echo $fetch_message['id'] ?></span></p>
                    <p>nom: <span> <?php echo $fetch_message['name'] ?></span></p>
                    <p>email: <span> <?php echo $fetch_message['email'] ?></span></p>
                    <p><?php echo $fetch_message['message'] ?></span></p>
                    <a href="./admin_messages.php?delete=<?php echo $fetch_message['id']; ?>" class="delete_message" onclick= "return confirm('voulez-vous vraiment supprimer ce produit?')">supprimer</a>
                </div>

                <?php

            
            }
       
        
        } 
        else{
            echo '<div class="empty">Pas de nouveaux messages</div>';
         }
            
        ?>
    </div>
</section>
    
 


<script src="./script.js"></script>
</body>
</html>