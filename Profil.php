<?php
session_start();
// Partie Config de l'inscription..........

$serveur = "localhost";
$dbname = "inscriptionvalide";
$user = "root";
$pass = "root";

//On se connecte a la BDD avec PDO
$dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);


if(isset($_GET['id']) AND $_GET['id'] > 0)
    {
        $getid = intval($_GET['id']);
        $requser = $dbco->prepare('SELECT*FROM InscritsValides WHERE id = ?');
        $requser->execute(array($getid));
        $userinfo = $requser->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de la person Connecté</title>
    <link rel="stylesheet" href="style0.css">
</head>
<body>

   <div align="center">
       <h1> Profil de : <?php echo $userinfo['Pseudo'];?></h1><br>
       <h3>Pseudo : <?php echo $userinfo['Pseudo'];?></h3>
       <h4>E-Mail : <?php echo $userinfo['email'];?></h4>
      <br>
      <?php
      if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
      {
      ?>
      <a href="#">Editer mon Profil</a><br><br> 
      <a href="Deconnexion.php">Se Deconnecter</a>
      <?php
        }
      ?>
      <br>
    </div> 
</body>
</html>
<?php
}
?>