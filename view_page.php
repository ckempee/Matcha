<?php
session_start();




if(isset($_POST['addCart'])){
    if (!isset($_SESSION['connect'])) {
        header('location: ./login.php');
        exit();
    }
    
    
    $user_id=$_SESSION['user_id'];
    require('./src/connexion.php');

   
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






?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
.product{
    
    width: 80%;
    height: max-content;
    margin: auto;
    display: flex;
    margin-top: 20px;
    display: flex;
    flex-wrap: wrap;
    
    }

    .img_product{
        width: 45%;
    }
.infos_product{
    padding: 25px;
    text-align: center;
    width: 50%;
}

.infos_product h1{
    text-transform: uppercase;
    color: green;
}

.infos_product h2{
    text-transform: uppercase;
    color: #EC7A5C;
    font-style: italic;
}

.infos_product p{
    font-family: 'Montserrat', sans-serif;
    font-weight: 100;
    line-height: 1.5;
}

.push_btn{
    border: 1px solid #000; /* Couleur et épaisseur de la bordure */
    padding: 5px 10px; /* Espacement interne pour une meilleure apparence */
    margin: 0 5px; /* Espacement externe entre les liens */
    text-decoration: none; /* Supprime la décoration du lien */
    color: #000; /* Couleur du texte */
}

.product_quantity{
    width: 50px;
}

.btn-quantity{
display: flex;
flex-wrap: wrap;
padding: 15px;
}
</style>

<?php
    include("./header.php");
    ?>

   
        <?php
        if(isset($_GET['pid'])){
            $id=$_GET['pid'];
            $req=$bdd->prepare("SELECT * FROM product where id=?");
            $req->execute(array($id));

        if($req->rowCount() > 0){
            while ($select_products=$req->fetch()){?>
             <div class="product">
                    <div class="img_product">
                         <img src="images/<?php echo $select_products['image']; ?>" alt="">
                    </div>
                    <div class="infos_product">
                        <form method="post" action="">
                           
                           <h1 class="name"><?php echo $select_products['name']; ?></h1>
                           <h2 class='price'>prix:  <?php echo $select_products['price']; ?> $</h2>
                           <p class='detail'><?php echo $select_products['detail_product']; ?></p>
                           <input type="hidden" name="product_id" value=" <?php echo $select_products['id']; ?>">
                           <input type="hidden" name="product_name" value=" <?php echo $select_products['name']; ?>">
                           <input type="hidden" name="product_price" value=" <?php echo $select_products['price']; ?>">
                           
                           <input type="hidden" name="product_image" value=" <?php echo $select_products['image']; ?>">
                           
                           <div class="relative z-10 text-center pb-button-shadow">
                           <div class="btn-quantity">
                                  <a href="#" class="push-btn" onclick="decrementQuantity()">-</a>
                                  <input type="text" name="product_quantity" id="product_quantity" value="1">
                                  <a href="#" class="push-btn" onclick="incrementQuantity()">+</a>
                            </div>
                                
                                <button type="submit" name="addCart">Ajouter au panier</button>
                            </div>
                       </form>

                    </div>

            
                    
               
            </div>


             <?php
            }
        }
        }

        ?>
    
    <script>
        
        function incrementQuantity() {
    var quantityField = document.getElementById("product_quantity");
    alert("Value before increment: " + quantityField.value);
    var currentValue = parseInt(quantityField.value);
    alert("Parsed value: " + currentValue);
    quantityField.value = currentValue + 1;
    alert("Value after increment: " + quantityField.value);
}

function decrementQuantity() {
    var quantityField = document.getElementById("product_quantity");
    alert("Value before decrement: " + quantityField.value);
    var currentValue = parseInt(quantityField.value);
    alert("Parsed value: " + currentValue);
    if (currentValue > 1) {
        quantityField.value = currentValue - 1;
    }
    alert("Value after decrement: " + quantityField.value);
}
</script>
</body>
</html>