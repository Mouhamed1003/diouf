<?php

// Partie Config de l'inscription..........

$serveur = "localhost";
$dbname = "inscriptionvalide";
$user = "root";
$pass = "root";

try{
    //On se connecte a la BDD avec PDO
    $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
      if(isset($_POST['inscrit']))
      {
         $Pseudo = htmlspecialchars($_POST['Pseudo']);
         $email = htmlspecialchars($_POST['email']);
         $ConfirmationduMail = htmlspecialchars($_POST['ConfirmationduMail']);
         $mdp = sha1($_POST['mdp']);
         $Confirmationmdp = sha1($_POST['Confirmationmdp']);

         if(!empty($_POST['Pseudo']) AND !empty($_POST['email']) AND !empty($_POST['ConfirmationduMail']) AND !empty($_POST['mdp']) AND !empty($_POST['Confirmationmdp']))
         {
            $Pseudolength = strlen($Pseudo);
            if($Pseudolength <= 25)
            { 
               $reqemail = $dbco->prepare("SELECT*FROM InscritsValides WHERE Pseudo = ?");
               $reqemail->execute(array($Pseudo));
               $emailexist = $reqemail->rowCount();
               if($emailexist == 0)
               {  
                  if($email == $ConfirmationduMail)
                  {
                     if(filter_var($email, FILTER_VALIDATE_EMAIL))
                     {  
                        $reqemail = $dbco->prepare("SELECT*FROM InscritsValides WHERE email = ?");
                        $reqemail->execute(array($email));
                        $emailexist = $reqemail->rowCount();
                        if($emailexist == 0)
                        { 
                           if($mdp == $Confirmationmdp)
                           {
                              $reqemail = $dbco->prepare("SELECT*FROM InscritsValides WHERE mdp = ?");
                              $reqemail->execute(array($mdp));
                              $emailexist = $reqemail->rowCount();
                              if($emailexist == 0)
                              {   
                                 $merci = "Ok $Pseudo, c'est Bon.";

                                 $insererlesinscrit = $dbco ->prepare("INSERT INTO InscritsValides(Pseudo, email, mdp) VALUES(?, ?, ?)");
                                 $insererlesinscrit->execute(array($Pseudo, $email, $mdp));

                                 $merci = "Votre Compte a bien été créé avec Succès, Merci ! Vous Pouvez maintenant vous Connecter en appuant sur  <a href=\"Connexionverification.php\" > Se Connecter</a> !"; 
                              }
                              else
                              {
                                 $erreur = "Ce Mot de Passe Existe déja, Veuillez en Choisir un Autre !";
                              }
                           }
                           else
                           {
                              $erreur = "Vos Mots de passe ne Correspondent pas !";
                           }
                        } 
                        else
                        {
                           $erreur = "Cette Adresse Mail est deja utilisée !";
                        }  
                     }
                     else 
                     {
                        $erreur = "Vous n'avez pas mis un bon Adresse Mail : ' Exemple@gmail.com ' !";
                     }
                  }
                  else
                  {
                     $erreur = "Vos Adresses Mails ne Correspondent pas !";
                  }
               
               } 
               else
               {
                  $erreur = "Ce Pseudo est déja utilisé !";
               }

            }
            else
            {
               $erreur = "Votre Pseudo ne doit pas depasser 25 caracteres !";
            }
      }
      else
      {
         $erreur = "Tous les champs doivent être renseignés d'abord !";
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
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="style0.css">
</head>
<body>
   <div align="center">
       <h1> Inscription Verifiée et Sécurisée :</h1>
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
                   <label for="Pseudo">Pseudo :</label>
                </td>
                <td>
                   <input type="text" name="Pseudo" id="Pseudo" placholder="Votre Pseudo" value="<?php if(isset($Pseudo)){ echo $Pseudo; }?>"> 
                </td>
           </tr>
           <tr>
                <td align="right">
                   <label for="email">Adresse Mail :</label>
                </td>
                <td>
                   <input type="email" name="email" id="email" placholder="Votre Mail" value="<?php if(isset($email)){ echo $email; }?>">
                </td> 
           </tr>
           <tr>
                <td align="right">  
                   <label for="ConfirmationduMail" >Confirmation du Mail :</label>
                </td>
                <td>
                   <input type="email" name="ConfirmationduMail" id="ConfirmationduMail" placholder="Confirmez Votre Mail" value="<?php if(isset($ConfirmationduMail)){ echo $ConfirmationduMail; }?>">
                </td>
           </tr>
           <tr>
                <td align="right">
                   <label for="mdp"> Mot de Passe :</label>
                </td>
                <td>
                   <input type="password" name="mdp" id="mdp" placholder="Votre mot de passe" >
                </td>
           </tr>
           <tr>
               <td align="right">
                   <label for="Confirmationmdp" >Confirmation du Mot de Passe :</label>
                </td>
                <td>
                   <input type="password" name="Confirmationmdp" id="Confirmationmdp" placholder="Confirmez Votre mdp ">
                </td>
           </tr>
               
           <tr>
             <td align="right"><br>
                   <input type="Reset" value="Effacer" name="Effacer">
             
             <td align="right"><br>
                   <input type="submit" value="Je m'inscrits" name="inscrit">
             </td>
           </tr>
           </table>
       </form><br><br>
       <?php
       echo "Déja un compte ? 😃 Vous pouvez donc Appuez sur <a href=\"Connexionverification.php\"> Se Connecter</a> !";
       ?>
       <br><br><br>
       <?php
         if(isset($merci))
         {
            echo '<font color="green">'.$merci.'</font>';
         }
       ?>
    </div> 
</body>
</html>