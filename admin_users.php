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
    $delete_query = $bdd->prepare("DELETE FROM users WHERE id=?");
    $delete_query->execute(array($delete_id));


    header('location: ./admin_users.php');
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
<style>
    :root {
  --box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
}
    .user-container {
        position: relative;
    background-color: var(--green);
    margin-top: -3.5rem;
    background-color: #74A12E;
    text-align: center;
    margin: -20px;
    margin:auto;
    padding: 20px;
    height: max-content;
    display: grid;
    grid-template-columns: repeat(auto-fit,minmax(15rem,1fr));
    gap: 20px;
    
    }

    .box {
        border: 5px solid;
        padding: 10px;
        margin: 0;
        background-color:antiquewhite;
        text-align: center;
    border-radius: 5px;
    box-shadow: var(--box-shadow);
    border-color: rgba(0, 0, 0, 0.1);
    }
</style>
<section class="message-container">
    <h1>Comptes Utilisateurs</h1>
    <div class="user-container">
        <?php
        $req = $bdd->prepare("SELECT * FROM users");
        $req->execute();
        if($req->rowCount() > 0){
            while ($fetch_user=$req->fetch()){

                ?>
                <div class="box">
                    <p>user id: <span> <?php echo $fetch_user['id'] ?></span></p>
                    <p>nom: <span> <?php echo $fetch_user['nom'] ?></span></p>
                    <p>email: <span> <?php echo $fetch_user['email'] ?></span></p>
                    <p>Type d'utilisateur : <span style="color: <?php echo ($fetch_user['user_type'] == 'admin') ? 'green' : 'red'; ?>"><?php echo $fetch_user['user_type']; ?></span></p>
                    <a href="./admin_users.php?delete=<?php echo $fetch_user['id']; ?>" class="delete_message" onclick= "return confirm('voulez-vous vraiment supprimer cet utilisateur?')">supprimer</a>
                </div>

                <?php

            
            }
       
        
        }
        else{
            echo '<div class="empty">Pas encore d utilisateur(s)</div>';
         }
            
        ?>
    </div>
</section>
    
 


<script src="./script.js"></script>
</body>
</html>