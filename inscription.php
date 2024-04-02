<?php


require('./src/connexion.php');

if(!empty($_POST['nom'])&& !empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['mdp_confirm'])){
    $nom= $_POST['nom'];
    $email=$_POST['email'];
    $mdp=$_POST['mdp'];
    $mdp_confirm=$_POST['mdp_confirm'];

    //vérifier que les 2 mdp soient identiques
	if($mdp != $mdp_confirm){

		header('location: ./inscription.php?error=1&message=Vos mots de passe ne sont pas identiques.');
		exit();

	}
    //vérifier que l'email donnée n'existe pas encore
    $requete=$bdd->prepare('SELECT count(*) as numberEmails FROM users WHERE email=?');
    $requete->execute(array($email));

    while($email_verification=$requete->fetch()){
        if ($email_verification['numberEmails']!=0){
            header('Location: ./inscription.php?error=1&message=Votre adresse email existe déjà');
            exit();
        }

    }

    header('Location: ./inscription.php?success=1&message=Inscription reussie!');


	// CHIFFRAGE DU MOT DE PASSE
		$mdp = "aq1".sha1($mdp."123")."25";



$requete=$bdd->prepare('INSERT INTO users(nom,email,password) VALUES (?,?,?)');
    $requete->execute(array($nom,$email,$mdp));
}






?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style2.css">
    <title>Document</title>
</head>
<body>

<?php
require('./header.php')
?>
<section id="connexion">
    <div id="form">
        <div id="imgForm"> </div>
        
        <div id="formText">
            <h1>S'inscrire</h1>
          <form action="./inscription.php" method="post">
          <div class="formContainer">
                <label for="nom">Nom:</label><br>
      <input type="text" name="nom" placeholder="Entrez votre nom" required > 
            </div>
          <div class="formContainer">
                <label for="email">E-mail:</label><br>
      <input type="email" name="email" placeholder="Entrez votre email" required> 
            </div>
            
            <div class="formContainer">
                
      <label for="mdp">Mot de passe:</label> <br> 
      <input type="password" name="mdp" id="" placeholder="********" required>
            </div> 
        <div class="formContainer">
                
      <label for="mdp_confirm">Confirmer votre mot de passe:</label> <br> 
      <input type="password" name="mdp_confirm" id="" placeholder="********" required>
            </div> <br>



    
           
            
        <button type="submit">S'inscrire</button> <br>
        <h3>Déja Inscript? <a href="./login.php"> <br>Connectez-vous</a></h3>

        

          </form>
        </div>
    </div>
    <?php if(isset($_GET['error'])){

if(isset($_GET['message'])) {
    echo'<div class="error">
    <div>'.htmlspecialchars($_GET['message']).'</div></div>';

}

} else if(isset($_GET['success'])) {

    echo'<div class="success">
    <div>'.htmlspecialchars($_GET['message']).'</div></div>';

} ?>
    </section>
</body>
</html>
    