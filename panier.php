<?php
session_start();

$user_id=$_SESSION['user_id'];
 require('./src/connexion.php');

if(isset($_POST['addCart'])){
    if (!isset($_SESSION['connect'])) {
        header('location: ./login.php');
        exit();
    }
    
    
    
   

   
        $product_id=$_POST['product_id'];
        $product_name=$_POST['product_name'];
        $product_price=$_POST['product_price'];
        $product_quantity=$_POST['product_quantity'];
        $product_image=$_POST['product_image'];

        $cart_number=$bdd->prepare("SELECT * FROM cart WHERE nom=?");
        $cart_number->execute(array($product_name));

        
    $requete=$bdd->prepare('INSERT INTO cart(users_id,pid,nom,price, quantity,image) VALUES (?,?,?,?,?,?)');
    $requete->execute(array($user_id,$product_id,$product_name,$product_price,$product_quantity,$product_image));
    }


    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        
        // Supprimer le produit du panier dans la base de données
        $delete_query= $bdd->prepare("DELETE FROM cart WHERE pid=?");
        $delete_query->execute(array($delete_id));
      
        header('location: ./panier.php');}
 if(isset($_GET['reset'])){
    $user_id=$_GET['reset'];
    $delete_query= $bdd->prepare("DELETE FROM cart WHERE users_id=?");
    $delete_query->execute(array($user_id));

    header('location: ./panier.php');
    

 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<style>
    .panier{
        text-align: center;
        padding: 20px;
        display: flex;
        flex-wrap: wrap;
        
    }

    h1{
        text-transform: uppercase;
        font-size: 3em;
        width: 100%;
        }

        .panier-info{
            width: 65%;
            margin: auto;
            text-align: center;
            
            
        }

        .totalprice{
            width: 25%;
            background-color:#efefef;
            margin-top: 50px;
            margin-right: 20px;
            height: max-content;
            text-align: center;
            padding: 15px;
        }

        tr{
            align-items: center;
            border-bottom: 1px solid black;
        }
    td{
            margin: 20px;
            padding: 30px;
            align-items: center;
            
        }

        .btn-quantity{
            
            display: flex;
            
        }

        .btn-quantity p{
            width: 20px;
            padding: 10px;
        }
.montant{
    display: flex;
    margin: 0px 20px;
    text-transform: uppercase;
    margin-bottom: 10px;
}

.montant h3{
    width: 45%;
    color: grey ;
    
}

.montant p{
    width: 55%;
    color: black;
    font-weight: bolder;
    font-size: 0.8rem;
    
}

.left{
    text-align: right;
    padding-right: 15px;
    border-top: 1px solid grey;
    margin: auto;
    width: 80%;
}
.reset{
    color: black;
    text-decoration: underline;
}



        
</style>
<body>
<?php
    include("./header.php")
    ?>

<div class="panier">
    <h1>Panier</h1>
    <div class="panier-info">
        <table> 
            <tbody>
    <?php
    $grand_total = 0;
    $req = $bdd->prepare("SELECT id, nom, image, pid, price, SUM(quantity) AS total_quantity FROM cart WHERE users_id=? GROUP BY pid");
    $req->execute(array($user_id));

    if ($req->rowCount() > 0) {
        while ($select_product = $req->fetch()) {
            ?>
            
                
                   
                        <tr>
                            <td><img src="images/<?php echo $select_product['image']; ?>" alt="" width="100px" height="100px"></td>
                            <td><a href="view_page.php?pid=<?php echo $select_product['pid']; ?>"><?php echo $select_product['nom']; ?></a></td>
                            <td><?php echo $select_product['price']; ?> €</td>
                            <td>
                                 <div class="quantity" id="product_<?php echo $select_product['pid']; ?>">
                                    <input style="font-size:21px;" type="button" value="-" onclick='javascript: decreaseQuantity(<?php echo $select_product['pid']; ?>);' class="operator">
                                    <input id="number_<?php echo $select_product['pid']; ?>" type="number" value="<?php echo $select_product['total_quantity']; ?>" class="qty" name="product_quantity">
                                    <input style="font-size:21px;" type="button" value="+"  onclick='javascript: increaseQuantity(<?php echo $select_product['pid']; ?>);'  class="operator">
                                 </div>

                                 <input type="hidden" id="product_<?php echo $select_product['pid']; ?>_base_price" value="<?php echo $select_product['price']; ?>">
                            </td>

                            <td>
                                <div id="product_<?php echo $select_product['pid']; ?>_total_price">
                                    <?php echo $select_product['total_quantity'] * $select_product['price']; ?> € <!-- Affichez ici le prix total initial du produit -->
                                </div>
                            </td>
                            
                            
                            
                            <?php $grand_total+=$select_product['total_quantity'] * $select_product['price']; ?>

                            
                            <td>
                                <a href="./panier.php?delete=<?php echo $select_product['pid']; ?>" class="delete" onclick= "return confirm('voulez-vous vraiment supprimer ce produit?')"><i class="fa-solid fa-x"></i></a>   
                            </td>
                        </tr>
                    
                
    <?php
        }
    } else {
        echo "<p>Votre panier est vide</p>";
    }
    ?>
    </tbody>
    </table>
            </div>

            <div class="totalprice">
                <h2>Résumé</h2>
                <div class="montant">
                    <h3>Sous-total:  </h3>
                    <p><span id="totalCartPrice"><?php echo $grand_total; ?> €</span></p>
                </div>
                <div class="montant">
                    <h3>Expédition: </h3>
                    <p>
                         <?php
                    $livraison=5;
                     if ($grand_total>60){ 
                        $livraison=0;
                        echo 'gratuite';}
                     else{
                        echo '5€';} 
                     ?> 
                    </p>
                </div>
                
                
                   
                
                <div class="left">
                    <h2 id="totalPrice"> TOTAL: <?php echo $grand_total + $livraison; ?> €</h2>
                </div>
                
                <button type="submit">Procéder au paiement</button>
                <div>
                    <a href="./panier.php?reset=<?php echo $user_id; ?>" class="reset">vider le panier</a>

                </div>

            </div>

           
</div>

<script>
function increaseQuantity(productId) {
    var quantityField = document.getElementById("number_" + productId);
    quantityField.value++;
    updateTotalPrice(productId);
    updateDatabase(productId);
}

function decreaseQuantity(productId) {
    var quantityField = document.getElementById("number_" + productId);
    if (quantityField.value > 1) {
        quantityField.value--;
        updateTotalPrice(productId);
        updateDatabase(productId);
    }
}

function updateTotalPrice(productId) {
    var basePrice = parseFloat(document.getElementById("product_" + productId + "_base_price").value);
    var quantity = parseInt(document.getElementById("number_" + productId).value);
    var totalPrice = basePrice * quantity;
    document.getElementById("product_" + productId + "_total_price").innerHTML = totalPrice.toFixed(2) + " €";

    // Recalculer le prix total du panier
    var totalCartPrice = 0;
    <?php
    $req = $bdd->prepare("SELECT pid, price, SUM(quantity) AS total_quantity FROM cart WHERE users_id=? GROUP BY pid");
    $req->execute(array($user_id));

    if ($req->rowCount() > 0) {
        while ($select_product = $req->fetch()) {
            ?>
            var productId_<?php echo $select_product['pid']; ?> = <?php echo $select_product['pid']; ?>;
            var basePrice_<?php echo $select_product['pid']; ?> = parseFloat(document.getElementById("product_" + productId_<?php echo $select_product['pid']; ?> + "_base_price").value);
            var quantity_<?php echo $select_product['pid']; ?> = parseInt(document.getElementById("number_" + productId_<?php echo $select_product['pid']; ?>).value);
            totalCartPrice += basePrice_<?php echo $select_product['pid']; ?> * quantity_<?php echo $select_product['pid']; ?>;
            <?php
        }
    }
    ?>

    var livraison = <?php echo $livraison; ?>;
    if (totalCartPrice > 60) {
        livraison = 0; // Livraison gratuite si le total du panier est supérieur à 60
    }

    var totalCartPriceWithShipping = totalCartPrice + livraison;
    document.getElementById("totalCartPrice").innerHTML = totalCartPrice.toFixed(2) + " €";
    document.getElementById("totalPrice").innerHTML = "TOTAL: " + totalCartPriceWithShipping.toFixed(2) + " €";
}


function updateDatabase(productId) {
    var quantity = parseInt(document.getElementById("number_" + productId).value);
    var totalPrice = parseFloat(document.getElementById("product_" + productId + "_total_price").innerText);

    $.ajax({
        type: "GET",
        data: {
            idProduct: productId,
            quantity: quantity,
            totalPrice: totalPrice
        },
        url: "panier.php", // Remplacez "your-script.php" par le chemin de votre script PHP de traitement
        success: function(json_response) {
            if (json_response.result != 'SUCCESS') {
                // Gérer les erreurs
            } else {
                alert("Mise à jour dans la base de données réussie !");
            }
        }
    });
}
</script>



</body>
</html>