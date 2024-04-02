<?php
session_start();
if (isset($_SESSION['connect'])){
    header('location: ./index.php');
}

if(!empty($_POST['email']) && !empty($_POST['mdp'])){
    require('./src/connexion.php');
   
    $email=$_POST['email'];
    $mdp=$_POST['mdp'];

    //hash mdp
    $mdp = "aq1".sha1($mdp."123")."25";
   
    //vérifier que l'email existe bien
    $req = $bdd->prepare("SELECT count(*) as numberEmail FROM users WHERE email = ?");
		$req->execute(array($email));

		while($email_verification = $req->fetch()){
			if($email_verification['numberEmail'] != 1){
				header('location: ./login.php?error=1&message=Impossible de vous authentifier correctement.');
				exit();
			}
		}
    $requete=$bdd->prepare('SELECT * FROM users WHERE email=?');
    $requete->execute(array($email));

    while($user=$requete->fetch()){

   
        if($user['password']==$mdp){
        
            if($user['user_type']=='admin'){
                $_SESSION['connect']=1;
                $_SESSION['admin_name']=$user['nom'];
                $_SESSION['admin_mail']=$user['email'];
                header('location: ./adminpannel.php');
                exit();
            }
            else if($user['user_type']=='user'){
                $_SESSION['connect']=1;
                $_SESSION['user_id']=$user['id'];
                $_SESSION['user_name']=$user['nom'];
                $_SESSION['user_mail']=$user['email'];
                header('location: ./login.php?success=1');
                exit();
            }
            
            
        }
        else{
            header('location: ./login.php?error=1&message=Impossible de vous authentifier correctement.');
                exit();
        }
       
    }

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
    input{
        width: 100%;
    }
</style>
    <?php
    include("./header.php")
    ?>


<section id="connexion">
    <div id="form">
        <div id="imgForm"> </div>
        
        <div id="formText">
            <h1>Se connecter</h1>
          <form action="./login.php" method="post">
          <div class="formContainer">
                <label for="email">E-mail:</label><br>
                <input type="email" name="email" placeholder="Entrez votre email" required > 
            </div>
            <div class="formContainer">
                <label for="mdp">Mot de passe:</label> <br> 
                <input type="password" name="mdp" id="" placeholder="*********" required>
            </div> <br>
           
            
        <button type="submit">Connexion</button> <br>
        <h3>Pas encore inscrit? <a href="./inscription.php"> <br>Inscrivez-vous</a></h3>
          </form>
        </div>
    </div>
    <?php 

if(isset($_GET['error'])){
echo'<div class="error">
    <div>'.htmlspecialchars($_GET['message']).'</div></div>';
}
else if(isset($_GET['success']))  {
    echo'<div class="success">
    <div> Vous êtes maintenant connecté(e)</div></div>';

}
    ?>
</section>
</body>
</html>