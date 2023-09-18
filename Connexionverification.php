<?php
// Partie Config de l'inscription..........
session_start();


$serveur = "localhost";
$dbname = "inscriptionvalide";
$user = "root";
$pass = "root";

try{
    //On se connecte a la BDD avec PDO
    $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
    if(isset($_POST['Meconnecter']))
    {
        $emailconnect = htmlspecialchars($_POST['emailconnect']);
        $mdpconnect = sha1($_POST['mdpconnect']);

        if(!empty($emailconnect) AND !empty($emailconnect))
        {
            $requser = $dbco->prepare("SELECT*FROM InscritsValides WHERE email = ? AND mdp = ?");
            $requser->execute(array($emailconnect, $mdpconnect));
            $userexist = $requser->rowCount();

            if($userexist == 1)
            {
                $userinfo = $requser->fetch();
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['Pseudo'] = $userinfo['Pseudo'];
                $_SESSION['email'] = $userinfo['email'];
                header("Location: Profil.php?id=".$_SESSION['id']);

                
            }
            else
            {
                $erreur = "Adresse Mail ou Mot de Passe incorrecte !";
                
            }
        }
        else
        {
            $erreur = "Tous les champs doivent être completés !";
        }
    }
  
      
}
catch(PDOException $e){
    echo 'Impossible de traiter les donnees. Erreur : '.$e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
    <link rel="stylesheet" href="style0.css">
</head>
<body>

   <div align="center">
       <h1> Connexion Verifiée et Sécurisée :</h1>
       <?php
         if(isset($erreur))
         {
            echo '<font color="red">'.$erreur.'</font>';
         }
       ?><br><br>
       <form action="" method="POST">  <!--on ne mets plus rien au niveau de l'action , pour pouvoir envoyé les données  dans la même page -->
       <table border="0">
           
           <tr>
                <td align="right">
                   <label for="emailconnect">Adresse Mail :</label>
                </td>
                <td>
                   <input type="email" name="emailconnect" id="emailconnect" placholder="Votre Adresse Mail" value="<?php if(isset($email)){ echo $email; }?>">
                </td> 
           </tr>
           <tr>
                <td align="right">
                   <label for="mdpconnect"> Mot de Passe :</label>
                </td>
                <td>
                   <input type="password" name="mdpconnect" id="mdpconnect" placholder="Votre mot de passe" >
                </td>
           </tr> 
           <tr>
             <td align="right"><br>
                   <input type="Reset" value="Effacer" name="Effacer">
             
             <td align="right"><br>
                   <input type="submit" name="Meconnecter" value="Se Connecter">
             </td>
           </tr>
           </table>
       </form><br><br>
       
       <?php
       echo "Pas encore de compte ? 😁 Vous pouvez donc Appuez sur <a href=\"inscriptionverification.php\"> Créer un compte</a> !";
       ?>
       <?php
         if(isset($merci))
         {
            echo '<font color="green">'.$merci.'</font>';
         }
       ?>
    </div> 
</body>
</html>