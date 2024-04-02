<?php
session_start();

$user_id = $_POST['userId'];
$product_id = $_POST['productId'];
$product_name = $_POST['productName'];
$product_quantity = $_POST['quantity'];
$product_price = $_POST['productPrice'];
$product_image = $_POST['productImage'];

require('./src/connexion.php');

// Mettre à jour la ligne correspondante dans la table cart avec les nouvelles informations
$update_query = $bdd->prepare("UPDATE cart SET quantity = ?, price = ?, image = ? WHERE users_id = ? AND pid = ?");
$update_query->execute(array($product_quantity, $product_price, $product_image, $user_id, $product_id));

// Vous pouvez également effectuer d'autres actions de traitement ou renvoyer une réponse JSON appropriée en fonction de vos besoins

$response = array('result' => 'SUCCESS');
echo json_encode($response);
?>