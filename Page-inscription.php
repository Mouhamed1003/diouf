<?php
/*
pour faire un bouton plus en php
<?php
                                    $content;
                                    $string=$strip_tags($content);
                                        if(strlen($string)> 500):

                                            $stringCut=substr($string,0,500);

                                            $endPoint=strrpos($stringCut, ' ');

                                            $string=$endPoint?substr($stringCut,0,$endPoint):
                                            substr($stringCut,0);
                                            
                                            $string.='...<a href="blog_detail.php">Lire Plus</a>';
                                        endif;
                                        echo $string;
                                ?>

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

                                 $merci = "Votre Compte a bien été créé avec Succès, Merci ! Vous Pouvez maintenant vous Connecter !";
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
                  $erreur = "Ce Nom d'Utilisateur est déja utilisé !";
               }

            }
            else
            {
               $erreur = "Votre Nom d'Utilisateur  ne doit pas depasser 30 caracteres !";
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
*/
?>