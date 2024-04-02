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
//ajouter un nouveau produit:
if(isset($_POST['add_product'])){

    $product_name=$_POST['name'];
    $product_price=$_POST['price'];
    $product_detail=$_POST['detail'];
    $product_image=$_FILES['image']['name'];
    $image_size=$_FILES['image']['size'];
    $image_tmp_name=$_FILES['image']['tmp_name'];
    $image_folder='images/'.$product_image;
   

    //requete pour rajouter le produit dans base de données
    $req = $bdd->prepare("SELECT name FROM product WHERE name = ?");
    $req->execute(array($product_image));

    if($req>0){
        $message[]='le nom du produit existe déjà';
    }
    else{
    $insert_product=$bdd->prepare("INSERT INTO product (name,price,detail_product,image) values (?,?,?,?)");
    $insert_product->execute(array($product_name,$product_price,$product_detail,$product_image));
    if($insert_product){
        if($image_size>=3000000){
            $message[]='la taille de votre image est trop grande';
        }
        else{
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[]='produit ajouté avec succès';
        }
    }
}

}


//supprimer un produit de la bdd:
if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    

    //supprimer l'image de notre fichier images
    $req=$bdd->prepare("SELECT image FROM product WHERE id=?");
    $req->execute(array($delete_id));

    while($fetch_product=$req->fetch()){
        unlink('images/'.$fetch_product['image']);
    }
    //supprimer le produit de la base de données
    $delete_query = $bdd->prepare("DELETE FROM product WHERE id=?");
    $delete_query->execute(array($delete_id));
    //ATTENTION on devra aussi le supprimer des cartes existantes
    $delete_query = $bdd->prepare("DELETE FROM cart WHERE pid=?");
    $delete_query->execute(array($delete_id));

    header('location: ./admin_product.php');
}

//modifier un produit:
    if(isset($_POST['update_product'])){
        $update_id=$_POST['update_id'];
        $update_name=$_POST['update_name'];
        $update_price=$_POST['update_price'];
        $update_detail=$_POST['update_detail'];
        $update_image=$_FILES['update_image']['name'];
        $update_image_tmp_name=$_FILES['update_image']['tmp_name'];
        $update_image_folder='images/'.$update_image;

        $req=$bdd->prepare("UPDATE product SET id=?, name=?, price=?, detail_product=?, image=? WHERE id=?");
        $req->execute(array($update_id, $update_name,$update_price, $update_detail,$update_image, $update_id));


        if($req){
            move_uploaded_file($update_image_tmp_name,$update_image_folder);
            header('location:./admin_product.php');
        }
    }
    
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/matcha.png" type="image/x-icon">
    <title>products</title>
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
    
 

<section class="add-products form-container">
    <form action="" method="post" enctype="multipart/form-data" class="products_form">
        <div class="input-field">
            <label for="name">Nom du produit: </label>
            <input type="text" name="name" required>
        </div>
        <div class="input-field">
            <label for="name"> Prix: </label>
            <input type="text" name="price" required>
        </div>
        <div class="input-field">
            <label for="detail"> Detail: </label>
            <textarea type="text" name="detail" required></textarea>
        </div>
        <div class="input-field">
            <label for="image"> Image </label>
            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png, image/webp">
        </div>
        <input type="submit" value="add product" name="add_product" class='btn'>
    </form>
</section>


<section class="show_products">
    <div class="box-container">
    <?php
        $req=$bdd->prepare("SELECT * FROM product");
        $req->execute();

        if($req->rowCount() > 0){
            while ($select_products=$req->fetch()){
                ?>
                <div class="box">
                    <img src="images/<?php echo $select_products['image'];?>" alt="">
                    <p>price: $ <?php echo $select_products['price']; ?></p>
                    <h4> <?php echo $select_products['name']; ?></h4>
                    <details> <?php echo $select_products['detail_product']; ?></details>
                    <a href="./admin_product.php?edit=<?php echo $select_products['id']; ?>" class="edit">modifier</a>
                    <a href="./admin_product.php?delete=<?php echo $select_products['id']; ?>" class="delete" onclick= "return confirm('voulez-vous vraiment supprimer ce produit?')">supprimer</a>
                </div>
                <?php
            }
        
        }
        else{ echo '<div class="empty">Pas encore de produit ajouté(s)</div>'; }
        ?>
     </div>
</section>


<section class='update_container form-container'>
<?php

if(isset($_GET['edit'])){
    $edit_id=$_GET['edit'];
    $req = $bdd->prepare("SELECT * FROM product WHERE id=?");
$req->execute(array($edit_id));
if($req->rowCount()>0){
    while($fetch_edit=$req->fetch()){
        ?>
    <form action="" method="post" enctype="multipart/form-data" class="products_form">
        <div class="input-field">
            <label for="update_name">Nom du produit: </label>
            <input type="text" name="update_name" value="<?php echo $fetch_edit['name'] ?>" required>
        </div>

        <div class="input-field">
            <label for="update_price">Prix: </label>
            <input type="number" name="update_price" min="0" value="<?php echo $fetch_edit['price'] ?>" required>
        </div>

        <div class="input-field">
            <label for="update_detail">Détails du produit: </label>
            <textarea name="update_detail"><?php echo $fetch_edit['detail_product'] ?></textarea>
        </div>

        <div class="input-field">
            <label for="update_image">Image: </label>
            <img src="images/<?php echo $fetch_edit['image']; ?>" alt="">
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png, image/webp">
        </div>

        <input type="hidden" name="update_id" value="<?php echo $fetch_edit['id'] ?>">

        <div class="input-field editBtn">
            <input type="submit" name="update_product" value="update" class="edit">
        </div>

        <div class="input-field editBtn">
            <input type="reset" value="cancel" class='option-btn btn' id='close-form'>
        </div>
    </form>
    <?php
        }

    }
echo "<script> document.querySelector('.update_container').style.display='block'</script>";
    }
    ?>
</section>

<script src="./script.js"></script>
</body>
</html>