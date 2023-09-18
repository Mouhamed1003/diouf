<?php
$serveur = "localhost";
$dbname ="Oatlantic_Inscription_Conexion";
$user = "root";
$password = "root";

//On se connecte a la BDD avec PDO
$dbco = new PDO("mysql:host=$serveur; dbname=$dbname", $user, $password);
if(isset($_POST['retour'])){
header("Location:accueil.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page-de-Remerciement</title>
    <link rel="stylesheet" href="styleRemerciemnt.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>

<body>
    <center><button class="btn1">
            <div class="text">
                <h1>Votre Formulaire de demande a été bien envoyer </h1>
                <p>Merci d'avoire pris le temps de remplir ce Formulaire, et de <span>consulter régulierement votre
                        boite mail !</span></p>
                <div>
        </button></center>
    <br><br>
    <div class="btn3et4">
        <div class="btn4">
        <a href="Programme.html"><button type="button" name="retour">Retour</button>
        </div>
        <div class="btn3">
            <a href="Page-de-connexion-inscription.php"><button type="button" name="Page de connexion et d'inscription">Page de connexion et d'inscription</button></a>
        </div>
    </div>
</body>

</html>