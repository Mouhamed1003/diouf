<?php 
//...Partie Config de la Connexion............................................................................................................................
session_start();

$serveur = "localhost";
$dbname ="Oatlantic_Inscription_Conexion";
$user = "root";
$password ="root";

try{
    //On se connecte a la BDD avec PDO
    $dbco = new PDO("mysql:host=$serveur; dbname=$dbname", $user, $password);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
    if(isset($_POST['SeConnecter']))
    {
        $Adressemail = htmlspecialchars($_POST['Adressemail']);
        $Motdepasse = sha1($_POST['Motdepasse']);

        if(!empty($Adressemail) AND !empty($Motdepasse))
        {
            $requser = $dbco->prepare("SELECT*FROM Inscription_Connexion WHERE Adressemails = ? AND Motdepasses = ?");
            $requser->execute(array($Adressemail, $Motdepasse));
            $userexist = $requser->rowCount();

            if($userexist == 1)
            {
                $userinfo = $requser->fetch();
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['Nomdutilisateurs'] = $userinfo['Nomdutilisateurs'];
                $_SESSION['Adressemails'] = $userinfo['Adressemails'];
                header("Location: accueil.php?id=".$_SESSION['id']);

                
            }
            else
            {
                $erreur = "Adresse mail ou mot de passe inexacte(s) !";
                
            }
        }
        else
        {
            $erreur = "Tous les champs sont Obligatoirs !";
        }
    }
  
      
}
catch(PDOException $e){
    echo 'Impossible de traiter les donnees. Erreur : '.$e->getMessage();
}

?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=chrome">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 1 Connexion-inscription</title>
    <link rel="stylesheet" href="stylePage-de-connexion-inscription.css">
    <script src="script.js"></script>
     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<!--Partie de la (Body)-->
<body>
    <div class="container">
      <img class="logo-ingi" src="O'atlantiquelogoOfficiel.png" alt="logoofficiel.png">&nbsp;<img class="logo-ingi" src="O'atlantiquelogoOfficiel.png" alt="logoofficiel.png">&nbsp;<img class="logo-ingi" src="O'atlantiquelogoOfficiel.png" alt="logoofficiel.png">
    </div>
    <h3>L'Université <span>D'OCEAN -&nbsp;ATLANTIQUE</span> de la Nouvelle Technologie d'Informatique et Science de la <span>Santé</span>...</h3>

                <h1>Bienvenue Chez <span>O'ATLANTIC</span> University !</h1>
<!-- Grande Partie (Connexion/Inscription) -->
<div class="Grand-main">
<!-- Partie de la (Connexion) -->
    <div class="main">
        <form action="" method="POST">
            <fieldset>
                <legend>Connectez-vous, ici :</legend>
                <?php 
                    if(isset($erreur)){// si la variable $erreur existe , on affiche le contenu ;
                         echo "<p class= 'Erreur'>".$erreur."</p>";
                    }
                ?>
                    <div class="input1">
                            <label for="mail">Adresse mail </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="email" name="Adressemail" id="Adressemail" placeholder="Votre Adresse mail, ici" value="<?php if(isset($Adressemail)){ echo $Adressemail; }?>">
                    </div>

                    <div class="input">
                            <label for="Motdepasse">Mot de passe</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="password" name="Motdepasse" id="Motdepasse" placeholder="Votre Mot de passe, ici">
                    </div>

                    <div class="btn">
                            <button type="reset" name="effacer">Effacer</button>
                            <button type="submit" name="SeConnecter">Se Connecter</button>
                    </div>

            </fieldset>
        </form>
    </div>

<!--Partie de (L'inscription)-->

    <div class="main1">
    
        <form action="" method="POST">
        

        <?php
// Partie Config de l'inscription..........

$serveur = "localhost";
$dbname ="Oatlantic_Inscription_Conexion";
$user = "root";
$password ="root";

try{
    //On se connecte a la BDD avec PDO
    $dbco = new PDO("mysql:host=$serveur; dbname=$dbname", $user, $password);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
        if(isset($_POST['Sinscrir']))
        {
         $Nomdutilisateurs = htmlspecialchars($_POST['Nomdutilisateurs']);
         $Adressemails = htmlspecialchars($_POST['Adressemails']);
         $ConfirmationAdressemail2 = htmlspecialchars($_POST['ConfirmationAdressemail2']);
         $Motdepasses = sha1($_POST['Motdepasses']);
         $ConfirmationMotdepasse = sha1($_POST['ConfirmationMotdepasse']);

         if(!empty($_POST['Nomdutilisateurs']) AND !empty($_POST['Adressemails']) AND !empty($_POST['ConfirmationAdressemail2']) AND !empty($_POST['Motdepasses']) AND !empty($_POST['ConfirmationMotdepasse']))
         {
            $Nomdutilisateurslength = strlen($Nomdutilisateurs);
            if($Nomdutilisateurslength <= 30)
            { 
               $reqNomdutilisateurs = $dbco->prepare("SELECT*FROM Inscription_Connexion WHERE Nomdutilisateurs = ?");
               $reqNomdutilisateurs->execute(array($Nomdutilisateurs));
               $Nomdutilisateursexist = $reqNomdutilisateurs->rowCount();
               if($Nomdutilisateursexist == 0)
               {  
                  if($Adressemails == $ConfirmationAdressemail2)
                  {
                     if(filter_var($Adressemails, FILTER_VALIDATE_EMAIL))
                     {  
                        $reqAdressemails = $dbco->prepare("SELECT*FROM Inscription_Connexion WHERE Adressemails = ?");
                        $reqAdressemails->execute(array($Adressemails));
                        $Adressemailsexist = $reqAdressemails->rowCount();
                        if($Adressemailsexist == 0)
                        { 
                           if($Motdepasses == $ConfirmationMotdepasse)
                           {
                              $reqMotdepasses = $dbco->prepare("SELECT*FROM Inscription_Connexion WHERE Motdepasses = ?");
                              $reqMotdepasses->execute(array($Motdepasses));
                              $Motdepassesexist = $reqMotdepasses->rowCount();
                              if($Motdepassesexist == 0)
                              {   

                                 $inserdonnees = $dbco ->prepare("INSERT INTO Inscription_Connexion(Nomdutilisateurs, Adressemails, Motdepasses) VALUES(?, ?, ?)");
                                 $inserdonnees->execute(array($Nomdutilisateurs, $Adressemails, $Motdepasses));

                                 $merci = "Votre Compte vient d'être créér avec Succès, Merci de vous Connecter !";
                              }
                              else
                              {
                                 $erreurr = "Ce Mot de Passe Existe déja, Veuillez en Choisir un Autre !";
                              }
                           }
                           else
                           {
                              $erreurr = "Vos Mots de passe ne Correspondent pas !";
                           }
                        } 
                        else
                        {
                           $erreurr = "Un autre compte utilise la même adresse e-mail !";
                        }  
                     }
                     else 
                     {
                        $erreurr = "Vous n'avez pas mis un bon Adresse Mail : ' Exemple@gmail.com ' !";
                     }
                  }
                  else
                  {
                     $erreurr = "Vos Adresses Mails ne Correspondent pas !";
                  }
               
               } 
               else
               {
                  $erreurr = "Ce Nom d'utilisateur est déja utilisé !";
               }

            }
            else
            {
               $erreurr = "Votre ' Nom d'utilisateur ' ne doit pas depasser 30 caractères !";
            }
        }
         else
        {
         $erreurr = "Tous les champs doivent être renseignés d'abord !";
        }
 }
}
catch(PDOException $e){
    echo 'Impossible de traiter les donnees. Erreur : '.$e->getMessage();
}

?>
            <fieldset>
                <legend>Creéez un Compte, ici :</legend>
                 <table class="table">
                    <tr>
                    <td> 
                    <div class="input1">
                            <label for="Nomdutilisateurs">Nom d'utilisateur</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" name="Nomdutilisateurs" id="Nomdutilisateurs" placeholder="Ex: Votre Prénom123.., ici" value="<?php if(isset($Nomdutilisateurs)){ echo $Nomdutilisateurs; }?>">
                    </td>
                    </div>
                    </tr>
                    <tr>
                    <td>
                    <div class="input1">&nbsp;&nbsp;&nbsp;&nbsp;
                     <label for="Adressemails">Adresse mail </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <input type="email" name="Adressemails" id="Adressemails" placeholder="Votre Adresse mail, ici" value="<?php if(isset($Adressemails)){ echo $Adressemails; }?>">
                    </td>
                    </div>
                    </tr>
                    <tr>
                    <td>
                    <div class="input1">
                    <label for="ConfirmationAdressemail2">&nbsp;&nbsp;&nbsp;&nbsp;Confirmez-la </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="email" name="ConfirmationAdressemail2" id="ConfirmationAdressemail2" placeholder="La même Adresse mail, ici" value="<?php if(isset($ConfirmationAdressemail2)){ echo $ConfirmationAdressemail2; }?>">
                    </td>
                    </div>
                    </tr>
                    <tr>
                    <td>
                    <div class="input1">
                    <label for="Motdepasse1">&nbsp;&nbsp;&nbsp;&nbsp;Mot de passe</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="password" name="Motdepasses" id="Motdepasses" placeholder="Votre Mot de passe, ici" >
                    </td>
                    </div>
                    </tr>
                    <tr>
                    <td >
                    <div class="input1">&nbsp;&nbsp;&nbsp;&nbsp;
                    <label for="ConfirmationMotdepasse">Confirmez-le </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="password" name="ConfirmationMotdepasse" id="ConfirmationMotdepasse" placeholder="Le même Mot de passe, ici" >
                    </td>
                    </div>
                    </tr>
                </table>
                    <div class="btn1">
                            <button type="reset" name="annuler">Annuler</button>
                            <button type="submit" name="Sinscrir">Créér un compte</button>
                    </div>
            </fieldset>
            <?php
                        if(isset($erreurr))
                        {
                            echo "<p class= 'Erreurr'>".$erreurr."</p>";
                        }
                    ?>
        </form>
        <br>
        <?php
                        if(isset($merci))
                        {
                            echo '<font class= "AlertMerci" color="green">'.$merci.'</font>';
                        }
                    ?>
    </form>
    </div>
    </div>
</body>
</html>

