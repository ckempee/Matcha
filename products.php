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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
    
<title>Document</title>
</head>
<body>


<style>
    .produits{
        text-align: center;
        background-color: #B9DCA9;
        margin-top:-10px;
        padding:10px;

    }
    .categories{
        margin: auto;
        width: 80%;
        height: 50px;
        display: inline-block;
        justify-content: center;
        margin-top: 20px;
        color: black;
       
    }

    

    .categories a{
        border: 1px solid #74A12E;
        padding: 20px;
        margin: 0 15px ;
        text-transform: uppercase;
        text-decoration: none;
        color: green;
        border-radius: 5px;
        font-weight: 900;
        font-family: 'Raleway', sans-serif;
        
    }

    .categories a:hover{
        background-color: green;
        color: white;
    }

    .active{
        background-color: rgba(24, 82, 58);
        color: #000;
    }

    .produitCarts{
        position: relative;
    margin-top: -3.5rem;
    text-align: center;
    margin: -20px;
    margin:auto;
    padding: 20px;
    height: max-content;
    display:flex;
    flex-wrap: wrap;
    flex-direction:row ;
    background-color: #B9DCA9;;

    }

    h2 a{
        color: #74A12E;
        font-weight: 900;
        margin: 0;
        font-family: 'Raleway', sans-serif;
        text-transform: uppercase;
        width: 100%;

    }

    .box{
        width: calc(33.33% - 40px); /* 33.33% width for each box with a bit of margin */
    margin: 20px; /* Margin between each box */
    font-family: 'Raleway', sans-serif;
    }

    .box img{
        width: 100%;
        height: 396px;
    }

    .box p a{
        width: 100%;
    }
   button{background-color: red;
   width: 150px;}
</style>
<?php
    include("./header.php");
    ?>

   <section class="produits">
    <h1>NOS PRODUITS</h1>
    
    <div class="categories">
        <a href="./products.php" id="tous" class='category-link active' onclick="toggleActiveClass(this)">Tous nos produits</a>
        <a href="./products.php?category=matcha" id="matcha" class="category-link" onclick="toggleActiveClass(this)">Nos matchas</a>
        <a href="./products.php?category=ustensil" id="ustensiles" class="category-link" onclick="toggleActiveClass(this)">Nos ustensiles</a>
        <a href="./products.php?category=box" id="box" class="category-link" onclick="toggleActiveClass(this)">Nos box</a>
</div>
    <div class="produitCarts">
        <?php
        include('./src/connexion.php');

        if(isset($_GET['category'])){
            $category = $_GET['category'];
            $req = $bdd->prepare("SELECT * FROM product WHERE categorie=?");
            $req->execute(array($category));
        
            if($req->rowCount() > 0){
                while ($select_products = $req->fetch()){
                    ?>
                    <div class="box" id="<?php  echo $category ?>">
                        <form method="post" action="">
                            <img src="images/<?php echo $select_products['image']; ?>" alt="">
                            <div class="name"><a href="./view_page.php?pid=<?php echo $select_products['id']; ?>"><?php echo $select_products['name']; ?></a></div>
                            <div class='price'>prix:  <?php echo $select_products['price']; ?> $</div>
                            <input type="hidden" name="product_id" value=" <?php echo $select_products['id']; ?>">
                            <input type="hidden" name="product_name" value=" <?php echo $select_products['name']; ?>">
                            <input type="hidden" name="product_price" value=" <?php echo $select_products['price']; ?>">
                            <input type="hidden" name="product_quantity" value="1" min="1">
                            <input type="hidden" name="product_image" value=" <?php echo $select_products['image']; ?>">
                            
                            <div class="relative z-10 text-center pb-button-shadow">
                                <button type="submit" name="addCart"> Ajouter au panier</button>
                            </div>
                        </form>
                    </div>
                    <?php
                }
            } else {
                echo '<div class="empty">Pas encore de produit ajouté(s)</div>';
            }
        }
        
        else{
           $req=$bdd->prepare("SELECT * FROM product");
            $req->execute();

        if($req->rowCount() > 0){
            while ($select_products=$req->fetch()){
                ?>
           <div class="box">
           <form method="post" action="">
                            <img src="images/<?php echo $select_products['image']; ?>" alt="">
                            <div class="name"><a href="./view_page.php?pid=<?php echo $select_products['id']; ?>"><?php echo $select_products['name']; ?></a></div>
                            <div class='price'>prix:  <?php echo $select_products['price']; ?> $</div>
                            <input type="hidden" name="product_id" value=" <?php echo $select_products['id']; ?>">
                            <input type="hidden" name="product_name" value=" <?php echo $select_products['name']; ?>">
                            <input type="hidden" name="product_price" value=" <?php echo $select_products['price']; ?>">
                            <input type="hidden" name="product_quantity" value="1" min="1">
                            <input type="hidden" name="product_image" value=" <?php echo $select_products['image']; ?>">
                            
                            <div class="relative z-10 text-center pb-button-shadow">
                                <button type="submit" name="addCart"> Ajouter au panier</button>
                            </div>
                        </form>
                    
               
            </div>


                <?php
            }
        
        }
        else{ echo '<div class="empty">Pas encore de produit ajouté(s)</div>'; }

    }
        ?>
    </div> 

        
   </section>
<?php
include('./footer.php');
?>


<script>
    function toggleActiveClass(clickedElement) {
        // Supprime la classe 'active' de l'élément qui la possède actuellement
        document.querySelector('.categories .active').classList.remove('active');

        // Ajoute la classe 'active' à l'élément cliqué
        clickedElement.classList.add('active');
    }
</script>
</body>
</html>