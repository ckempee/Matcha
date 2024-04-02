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
    $delete_query = $bdd->prepare("DELETE FROM orders WHERE id=?");
    $delete_query->execute(array($delete_id));


    header('location: ./admin_order.php');
}

//mise a jour du statut de payement:
if(isset($_POST['update_order'])){
    $order_id=$_POST['order_id'];
    $update_payement=$_POST['update_payement'];

    $req = $bdd->prepare("UPDATE orders SET payement_status=? WHERE id=?");
    $req->execute(array($update_payement, $order_id));


        
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

<style>
    .message-container{
        min-height: 400px;
        max-height: max-content;
        position: relative;
        
    }
</style>
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
    .order-container {
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
    
    }
.order-container .box-container{
    grid-template-columns: repeat(auto-fit,minmax(25rem,1fr));
    gap: 20px;

}
    .box-order {
        border: 5px solid;
        padding: 10px;
        margin: 0;
        background-color:antiquewhite;
        text-align: left;
    border-radius: 5px;
    box-shadow: var(--box-shadow);
    border-color: rgba(0, 0, 0, 0.1);
    text-align: left;
    padding: 40px;
    min-height: 550px;
    max-height: fit-content;

    }

    form{
        width: 80%;
    }

    .box-order form input{
        width: 80%;
        border: 1px solid grey;
        background-color: #74A12E;
    height: 40px;
    padding: 10px;
    border-radius: 10px;
    margin-bottom: 40px;
    color: #74A12E;
    text-transform:uppercase;
    color: white;
    margin-left:70px;
    

    }

    .box-order form input:hover{
        background-color: white;
        color: #74A12E;

    }
    .delete{
        text-align: center;
    color: white;
    background-color: linear-gradient(90deg, #9ebd13 0%, #008552 100%);
    text-decoration: none;
    padding: .5rem 1.5rem;
    text-transform: capitalize;
    line-height: 2;
    border-radius: 12px;
    background-color: #74A12E;
    display: inline-block;
    padding: 5px 10px;
    width: 80%;
    box-sizing: border-box;
    margin-left:70px;
    text-transform: uppercase;
    }

    .delete:hover{
        background-color: white;
        color: #74A12E;
        border: 2px solid #74A12E;
    }

   
  

    .box-order p {
        color: hotpink;
        text-transform: capitalize;
    }

    .box-order span{
        color: #555;
    }

    .box-order select{
    outline: none;
    border: 1px solid grey;
    background: transparent;
    width: 300px;
    height: 44px;
    padding: 10px;
    border-radius: 10px;
    margin-bottom: 40px;
}



  
</style>

<section class="order-container">
    <h1>Commande(s)</h1>
    <div class="box-container">
        <?php
         $req = $bdd->prepare("SELECT * FROM orders");
         $req->execute();
        if($req->rowCount() > 0){
            while ($fetch_order=$req->fetch()){

                ?>
                <div class='box-order'>
                    <p>id: <span> <?php echo $fetch_order['id'] ?></span></p>
                    <p>user id: <span> <?php echo $fetch_order['user_id'] ?></span></p>
                    <p>nom de l'utilisateur: <span> <?php echo $fetch_order['name'] ?></span></p>
                    <p>fait le: <span> <?php echo $fetch_order['placed_on'] ?></span></p>
                    <p>numero de commande: <span> <?php echo $fetch_order['number'] ?></span></p>
                    <p>email: <span> <?php echo $fetch_order['email'] ?></span></p>
                    <p>prix: <span> <?php echo $fetch_order['total_price'] ?></span></p>
                    <p>methode: <span> <?php echo $fetch_order['method'] ?></span></p>
                    <p>addresse: <span> <?php echo $fetch_order['address'] ?></span></p>
                    <p>nombre de produits: <span> <?php echo $fetch_order['total_products'] ?></span></p>
                    <form method="post">
                    <input type="hidden" name="order_id" value="<?php echo $fetch_order['id']; ?>">
                        <select name="update_payement">
                            <option disabled selected> <?php echo $fetch_order['payement_status']?></option>
                            <option value="en attente">en attente</option>
                            <option value="complete">complete</option>
                        </select>
                        <input type="submit" value="modifier" name="update_order" >
                        <a href="./admin_order.php?delete=<?php echo $fetch_order['id']; ?>" class='delete' onclick= "return confirm('voulez-vous vraiment supprimer ce produit?')">supprimer</a>  
                   
                    </form>

                    </div>
                    

                <?php

            
            }
       
        
        } 
        else{
            echo '<div class="empty">Pas de commandes en cours</div>';
         }
            
        ?>
    </div>
</section>
    
 


<script src="./script.js"></script>
</body>
</html>