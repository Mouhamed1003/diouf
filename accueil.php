<?php
session_start();
// Partie Config de l'inscription..........

$serveur = "localhost";
$dbname ="Oatlantic_Inscription_Conexion";
$user = "root";
$password = "root";

//On se connecte a la BDD avec PDO
$dbco = new PDO("mysql:host=$serveur; dbname=$dbname", $user, $password);

if(isset($_POST['valider'])){
         $niveauetude = htmlspecialchars($_POST['niveauetude']);
         $choixformation = htmlspecialchars($_POST['choixformation']);
         $datenaissance = htmlspecialchars($_POST['datenaissance']);
         $nomcomplet = htmlspecialchars($_POST['nomcomplet']);
         $adressemail = htmlspecialchars($_POST['adressemail']);
         $diplomeintitule = htmlspecialchars($_POST['diplomeintitule']);
         $passportcni = htmlspecialchars($_POST['passportcni']);
         $photoidentiterecente = htmlspecialchars($_POST['photoidentiterecente']);
         $numerotelephone = htmlspecialchars($_POST['numerotelephone']);
         $paysorigine = htmlspecialchars($_POST['paysorigine']);
         $paysactuel = htmlspecialchars($_POST['paysactuel']);
         $genre = htmlspecialchars($_POST['genre']);
         $diplomeattestation = htmlspecialchars($_POST['diplomeattestation']);
         $relevenotes = htmlspecialchars($_POST['relevenotes']);
         $bulletinsnotes = htmlspecialchars($_POST['bulletinsnotes']);

         $insrdonnees = $dbco ->prepare("INSERT INTO Formulaire_Admission (niveauetude, choixformation, datenaissance, nomcomplet, adressemail, diplomeintitule, passportcni, photoidentiterecente, numerotelephone, paysorigine, paysactuel, genre, diplomeattestation, relevenotes, bulletinsnotes) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
         $insrdonnees->execute(array($niveauetude, $choixformation, $datenaissance, $nomcomplet, $adressemail, $diplomeintitule, $passportcni, $photoidentiterecente, $numerotelephone, $paysorigine, $paysactuel, $genre, $diplomeattestation, $relevenotes, $bulletinsnotes));

    header("Location:Remerciement.php");
}

if(isset($_GET['id']) AND $_GET['id'] > 0)
    {
        $getid = intval($_GET['id']);
        $requser = $dbco->prepare('SELECT*FROM Inscription_Connexion WHERE id = ?');
        $requser->execute(array($getid));
        $userinfo = $requser->fetch();
        
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=chrome">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 2 Accueil-Admission</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styleaccueil.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="script.js"></script>
</head>
<!--Partie de la (Body)-->

<body>
    <br>
    <div class="container">
    <img class="logo-ingi" src="O'atlantiquelogoOfficiel.png" alt="logoofficiel.png">&nbsp;<img class="logo-ingi" src="O'atlantiquelogoOfficiel.png" alt="logoofficiel.png">&nbsp;<img class="logo-ingi" src="O'atlantiquelogoOfficiel.png" alt="logoofficiel.png">
          &nbsp; 
        <img class="img-user" src="306473.png" alt="user black">
    </div><br>
    <nav>
        <div class="menu-bar">
            <ul>
                <li class="active"><a href="accueil.php">Home</a></li>
                <li><a href="Programme.html">Programmes</a></li>
                <li><a href="Administration.html">L'Administration</a></li>
                <li><a href="A-Propos.html">A propos</a></li>
                <li><a href="Contact.html">Contacts</a></li>
            </ul>
        </div>
        <nav>

            <h1>L'<span>O'ATLANTIQUE</span> est une Université Internationale Puclique et Privé, Agréer et Reconu par tous les Etats Membres de L'<span>ONU</span> et de L'<span>OMS</span> !</h1>
            <br>
            <h3> Demande d'Admission ?👇!</h3>
            </div><br>

            <!--Partie (Admission)-->
            <div class="main1"><br>
                <form action="" method=POST>
                    <div class="les-select">
                        <select name="niveauetude" class="select" required>
                            <option selected disabled>Selectionnez-vous, ici, votre niveau d'étude actuelle</option>
                            <option>Baccalauréat</option>
                            <option>Bac+1</option>
                            <option>Bac+2</option>
                            <option>Bac+3</option>
                            <option>Bac+4</option>
                            <option>Bac+5</option>
                            <option>Bac+6</option>
                            <option>Bac+7</option>
                            <option>Bac+8</option>
                        </select>
                        <select name="choixformation" class="select" required>
                            <option selected disabled>Selectionnez-vous, ici, la Filière/Formation qui vous Passionne
                            <optgroup label="INFORMATIQUE"></optgroup>
                            <option>Formation-A</option>
                            <option>Formation-B</option>
                            <option>Formation-C</option>
                            <option>Formation-D</option>
                            <option>Formation-E</option>
                            <optgroup label="SANTÉ"></optgroup>
                            <option>Formation-F</option>
                            <option>Formation-G</option>
                            <option>Formation-H</option>
                            <option>Formation-I</option>
                            <option>Formation-J</option>
                            <option>Formation-K</option>
                        </select>
                        <trong class="strong">Date de Naissance :&nbsp;&nbsp;
                            <input class="date" type="date" id="Date_Naissance" name="datenaissance"
                                value="AAAA-MM-JJ" required/>
                    </div></strong><br><br>
                    <fieldset>
                        <legend> Remplissez-vous ce Formulaire de Demande d'Admission :</legend>

                        <div class="les-3-input">

                            <div class="input1">
                                <label for="Nomutilisateur"> Nom Complet </label><br><br>
                                <input type="text" name="nomcomplet" id="Nomutilisateur"
                                    placeholder="Votre Nom et Prénom, ici" required>
                            </div>

                            <div class="input1">
                                <label for="mail"> Adresse mail </label><br><br>
                                <input type="mail" name="adressemail" id="Motdepasse" placeholder="Exemple@gmail.com"
                                    required>
                            </div>

                            <div class="input1">
                                <label for="LintituléduDiplôme"> L'intitulé du Diplôme </label><br><br>
                                <input type="text" name="diplomeintitule" id="LintituléduDiplôme"
                                    placeholder="Ex: Bac Scientifique" required>
                            </div>
                        </div><br>
                        <hr><br>
                        <div class="les-3-input">
                            <div class="input1">
                                <label for="Passportcni">Passport/CNI </label><br><br>
                                <input type="file" name="passportcni" id="Passportcni" required>
                            </div>

                            <div class="input1">
                                <label for="PhotodIdentitéRécente"> Photo Récente d'Identité </label><br><br>
                                <input type="file" name="photoidentiterecente" id="PhotodIdentitéRécente" required>
                            </div>
                            <div class="input1">
                                <label for="phone">Numéro de Téléphone</label><br><br>
                                <input type="phone" name="numerotelephone" id="phone" placeholder="Ex:+212 649 17 36 72" required>
                            </div>
                        </div><br>
                        <hr><br>
                        <div class="les-3-input">

                            <div class="input1">
                                <label for="Nomutilisateur">Pays d'Origine</label><br><br>
                                <select name="paysorigine">
                                    <option selected disabled>Pays de Votre Nationalité</option>

                                    <option value="Afghanistan">Afghanistan </option>
                                    <option value="Afrique_Centrale">Afrique_Centrale </option>
                                    <option value="Afrique_du_sud">Afrique_du_Sud </option>
                                    <option value="Albanie">Albanie </option>
                                    <option value="Algerie">Algerie </option>
                                    <option value="Allemagne">Allemagne </option>
                                    <option value="Andorre">Andorre </option>
                                    <option value="Angola">Angola </option>
                                    <option value="Anguilla">Anguilla </option>
                                    <option value="Arabie_Saoudite">Arabie_Saoudite </option>
                                    <option value="Argentine">Argentine </option>
                                    <option value="Armenie">Armenie </option>
                                    <option value="Australie">Australie </option>
                                    <option value="Autriche">Autriche </option>
                                    <option value="Azerbaidjan">Azerbaidjan </option>

                                    <option value="Bahamas">Bahamas </option>
                                    <option value="Bangladesh">Bangladesh </option>
                                    <option value="Barbade">Barbade </option>
                                    <option value="Bahrein">Bahrein </option>
                                    <option value="Belgique">Belgique </option>
                                    <option value="Belize">Belize </option>
                                    <option value="Benin">Benin </option>
                                    <option value="Bermudes">Bermudes </option>
                                    <option value="Bielorussie">Bielorussie </option>
                                    <option value="Bolivie">Bolivie </option>
                                    <option value="Botswana">Botswana </option>
                                    <option value="Bhoutan">Bhoutan </option>
                                    <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
                                    <option value="Bresil">Bresil </option>
                                    <option value="Brunei">Brunei </option>
                                    <option value="Bulgarie">Bulgarie </option>
                                    <option value="Burkina_Faso">Burkina_Faso </option>
                                    <option value="Burundi">Burundi </option>

                                    <option value="Caiman">Caiman </option>
                                    <option value="Cambodge">Cambodge </option>
                                    <option value="Cameroun">Cameroun </option>
                                    <option value="Canada">Canada </option>
                                    <option value="Canaries">Canaries </option>
                                    <option value="Cap_vert">Cap_Vert </option>
                                    <option value="Chili">Chili </option>
                                    <option value="Chine">Chine </option>
                                    <option value="Chypre">Chypre </option>
                                    <option value="Colombie">Colombie </option>
                                    <option value="Comores">Colombie </option>
                                    <option value="Congo">Congo </option>
                                    <option value="Congo_democratique">Congo_democratique </option>
                                    <option value="Cook">Cook </option>
                                    <option value="Coree_du_Nord">Coree_du_Nord </option>
                                    <option value="Coree_du_Sud">Coree_du_Sud </option>
                                    <option value="Costa_Rica">Costa_Rica </option>
                                    <option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
                                    <option value="Croatie">Croatie </option>
                                    <option value="Cuba">Cuba </option>

                                    <option value="Danemark">Danemark </option>
                                    <option value="Djibouti">Djibouti </option>
                                    <option value="Dominique">Dominique </option>

                                    <option value="Egypte">Egypte </option>
                                    <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
                                    <option value="Equateur">Equateur </option>
                                    <option value="Erythree">Erythree </option>
                                    <option value="Espagne">Espagne </option>
                                    <option value="Estonie">Estonie </option>
                                    <option value="Etats_Unis">Etats_Unis </option>
                                    <option value="Ethiopie">Ethiopie </option>

                                    <option value="Falkland">Falkland </option>
                                    <option value="Feroe">Feroe </option>
                                    <option value="Fidji">Fidji </option>
                                    <option value="Finlande">Finlande </option>
                                    <option value="France">France </option>

                                    <option value="Gabon">Gabon </option>
                                    <option value="Gambie">Gambie </option>
                                    <option value="Georgie">Georgie </option>
                                    <option value="Ghana">Ghana </option>
                                    <option value="Gibraltar">Gibraltar </option>
                                    <option value="Grece">Grece </option>
                                    <option value="Grenade">Grenade </option>
                                    <option value="Groenland">Groenland </option>
                                    <option value="Guadeloupe">Guadeloupe </option>
                                    <option value="Guam">Guam </option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guernesey">Guernesey </option>
                                    <option value="Guinee">Guinee </option>
                                    <option value="Guinee_Bissau">Guinee_Bissau </option>
                                    <option value="Guinee equatoriale">Guinee_Equatoriale </option>
                                    <option value="Guyana">Guyana </option>
                                    <option value="Guyane_Francaise ">Guyane_Francaise </option>

                                    <option value="Haiti">Haiti </option>
                                    <option value="Hawaii">Hawaii </option>
                                    <option value="Honduras">Honduras </option>
                                    <option value="Hong_Kong">Hong_Kong </option>
                                    <option value="Hongrie">Hongrie </option>

                                    <option value="Inde">Inde </option>
                                    <option value="Indonesie">Indonesie </option>
                                    <option value="Iran">Iran </option>
                                    <option value="Iraq">Iraq </option>
                                    <option value="Irlande">Irlande </option>
                                    <option value="Islande">Islande </option>
                                    <option value="Israel">Israel </option>
                                    <option value="Italie">italie </option>

                                    <option value="Jamaique">Jamaique </option>
                                    <option value="Jan Mayen">Jan Mayen </option>
                                    <option value="Japon">Japon </option>
                                    <option value="Jersey">Jersey </option>
                                    <option value="Jordanie">Jordanie </option>

                                    <option value="Kazakhstan">Kazakhstan </option>
                                    <option value="Kenya">Kenya </option>
                                    <option value="Kirghizstan">Kirghizistan </option>
                                    <option value="Kiribati">Kiribati </option>
                                    <option value="Koweit">Koweit </option>

                                    <option value="Laos">Laos </option>
                                    <option value="Lesotho">Lesotho </option>
                                    <option value="Lettonie">Lettonie </option>
                                    <option value="Liban">Liban </option>
                                    <option value="Liberia">Liberia </option>
                                    <option value="Liechtenstein">Liechtenstein </option>
                                    <option value="Lituanie">Lituanie </option>
                                    <option value="Luxembourg">Luxembourg </option>
                                    <option value="Lybie">Lybie </option>

                                    <option value="Macao">Macao </option>
                                    <option value="Macedoine">Macedoine </option>
                                    <option value="Madagascar">Madagascar </option>
                                    <option value="Madère">Madère </option>
                                    <option value="Malaisie">Malaisie </option>
                                    <option value="Malawi">Malawi </option>
                                    <option value="Maldives">Maldives </option>
                                    <option value="Mali">Mali </option>
                                    <option value="Malte">Malte </option>
                                    <option value="Man">Man </option>
                                    <option value="Mariannes du Nord">Mariannes du Nord </option>
                                    <option value="Maroc">Maroc </option>
                                    <option value="Marshall">Marshall </option>
                                    <option value="Martinique">Martinique </option>
                                    <option value="Maurice">Maurice </option>
                                    <option value="Mauritanie">Mauritanie </option>
                                    <option value="Mayotte">Mayotte </option>
                                    <option value="Mexique">Mexique </option>
                                    <option value="Micronesie">Micronesie </option>
                                    <option value="Midway">Midway </option>
                                    <option value="Moldavie">Moldavie </option>
                                    <option value="Monaco">Monaco </option>
                                    <option value="Mongolie">Mongolie </option>
                                    <option value="Montserrat">Montserrat </option>
                                    <option value="Mozambique">Mozambique </option>

                                    <option value="Namibie">Namibie </option>
                                    <option value="Nauru">Nauru </option>
                                    <option value="Nepal">Nepal </option>
                                    <option value="Nicaragua">Nicaragua </option>
                                    <option value="Niger">Niger </option>
                                    <option value="Nigeria">Nigeria </option>
                                    <option value="Niue">Niue </option>
                                    <option value="Norfolk">Norfolk </option>
                                    <option value="Norvege">Norvege </option>
                                    <option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
                                    <option value="Nouvelle_Zelande">Nouvelle_Zelande </option>

                                    <option value="Oman">Oman </option>
                                    <option value="Ouganda">Ouganda </option>
                                    <option value="Ouzbekistan">Ouzbekistan </option>

                                    <option value="Pakistan">Pakistan </option>
                                    <option value="Palau">Palau </option>
                                    <option value="Palestine">Palestine </option>
                                    <option value="Panama">Panama </option>
                                    <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
                                    <option value="Paraguay">Paraguay </option>
                                    <option value="Pays_Bas">Pays_Bas </option>
                                    <option value="Perou">Perou </option>
                                    <option value="Philippines">Philippines </option>
                                    <option value="Pologne">Pologne </option>
                                    <option value="Polynesie">Polynesie </option>
                                    <option value="Porto_Rico">Porto_Rico </option>
                                    <option value="Portugal">Portugal </option>

                                    <option value="Qatar">Qatar </option>

                                    <option value="Republique_Dominicaine">Republique_Dominicaine </option>
                                    <option value="Republique_Tcheque">Republique_Tcheque </option>
                                    <option value="Reunion">Reunion </option>
                                    <option value="Roumanie">Roumanie </option>
                                    <option value="Royaume_Uni">Royaume_Uni </option>
                                    <option value="Russie">Russie </option>
                                    <option value="Rwanda">Rwanda </option>

                                    <option value="Sahara Occidental">Sahara Occidental </option>
                                    <option value="Sainte_Lucie">Sainte_Lucie </option>
                                    <option value="Saint_Marin">Saint_Marin </option>
                                    <option value="Salomon">Salomon </option>
                                    <option value="Salvador">Salvador </option>
                                    <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                                    <option value="Samoa_Americaine">Samoa_Americaine </option>
                                    <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option>
                                    <option value="Senegal">Senegal </option>
                                    <option value="Seychelles">Seychelles </option>
                                    <option value="Sierra Leone">Sierra Leone </option>
                                    <option value="Singapour">Singapour </option>
                                    <option value="Slovaquie">Slovaquie </option>
                                    <option value="Slovenie">Slovenie</option>
                                    <option value="Somalie">Somalie </option>
                                    <option value="Soudan">Soudan </option>
                                    <option value="Sri_Lanka">Sri_Lanka </option>
                                    <option value="Suede">Suede </option>
                                    <option value="Suisse">Suisse </option>
                                    <option value="Surinam">Surinam </option>
                                    <option value="Swaziland">Swaziland </option>
                                    <option value="Syrie">Syrie </option>

                                    <option value="Tadjikistan">Tadjikistan </option>
                                    <option value="Taiwan">Taiwan </option>
                                    <option value="Tonga">Tonga </option>
                                    <option value="Tanzanie">Tanzanie </option>
                                    <option value="Tchad">Tchad </option>
                                    <option value="Thailande">Thailande </option>
                                    <option value="Tibet">Tibet </option>
                                    <option value="Timor_Oriental">Timor_Oriental </option>
                                    <option value="Togo">Togo </option>
                                    <option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
                                    <option value="Tristan da cunha">Tristan de cuncha </option>
                                    <option value="Tunisie">Tunisie </option>
                                    <option value="Turkmenistan">Turmenistan </option>
                                    <option value="Turquie">Turquie </option>

                                    <option value="Ukraine">Ukraine </option>
                                    <option value="Uruguay">Uruguay </option>

                                    <option value="Vanuatu">Vanuatu </option>
                                    <option value="Vatican">Vatican </option>
                                    <option value="Venezuela">Venezuela </option>
                                    <option value="Vierges_Americaines">Vierges_Americaines </option>
                                    <option value="Vierges_Britanniques">Vierges_Britanniques </option>
                                    <option value="Vietnam">Vietnam </option>

                                    <option value="Wake">Wake </option>
                                    <option value="Wallis et Futuma">Wallis et Futuma </option>

                                    <option value="Yemen">Yemen </option>
                                    <option value="Yougoslavie">Yougoslavie </option>

                                    <option value="Zambie">Zambie </option>
                                    <option value="Zimbabwe">Zimbabwe </option>

                                </select>
                            </div>

                            <div class="input1">
                                <label>Pays Actuel</label><br><br>
                                <select name="paysactuel">
                                    <option selected disabled>Pays ou Vous Vivez actuellement</option>

                                    <option value="Afghanistan">Afghanistan </option>
                                    <option value="Afrique_Centrale">Afrique_Centrale </option>
                                    <option value="Afrique_du_sud">Afrique_du_Sud </option>
                                    <option value="Albanie">Albanie </option>
                                    <option value="Algerie">Algerie </option>
                                    <option value="Allemagne">Allemagne </option>
                                    <option value="Andorre">Andorre </option>
                                    <option value="Angola">Angola </option>
                                    <option value="Anguilla">Anguilla </option>
                                    <option value="Arabie_Saoudite">Arabie_Saoudite </option>
                                    <option value="Argentine">Argentine </option>
                                    <option value="Armenie">Armenie </option>
                                    <option value="Australie">Australie </option>
                                    <option value="Autriche">Autriche </option>
                                    <option value="Azerbaidjan">Azerbaidjan </option>

                                    <option value="Bahamas">Bahamas </option>
                                    <option value="Bangladesh">Bangladesh </option>
                                    <option value="Barbade">Barbade </option>
                                    <option value="Bahrein">Bahrein </option>
                                    <option value="Belgique">Belgique </option>
                                    <option value="Belize">Belize </option>
                                    <option value="Benin">Benin </option>
                                    <option value="Bermudes">Bermudes </option>
                                    <option value="Bielorussie">Bielorussie </option>
                                    <option value="Bolivie">Bolivie </option>
                                    <option value="Botswana">Botswana </option>
                                    <option value="Bhoutan">Bhoutan </option>
                                    <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
                                    <option value="Bresil">Bresil </option>
                                    <option value="Brunei">Brunei </option>
                                    <option value="Bulgarie">Bulgarie </option>
                                    <option value="Burkina_Faso">Burkina_Faso </option>
                                    <option value="Burundi">Burundi </option>

                                    <option value="Caiman">Caiman </option>
                                    <option value="Cambodge">Cambodge </option>
                                    <option value="Cameroun">Cameroun </option>
                                    <option value="Canada">Canada </option>
                                    <option value="Canaries">Canaries </option>
                                    <option value="Cap_vert">Cap_Vert </option>
                                    <option value="Chili">Chili </option>
                                    <option value="Chine">Chine </option>
                                    <option value="Chypre">Chypre </option>
                                    <option value="Colombie">Colombie </option>
                                    <option value="Comores">Colombie </option>
                                    <option value="Congo">Congo </option>
                                    <option value="Congo_democratique">Congo_democratique </option>
                                    <option value="Cook">Cook </option>
                                    <option value="Coree_du_Nord">Coree_du_Nord </option>
                                    <option value="Coree_du_Sud">Coree_du_Sud </option>
                                    <option value="Costa_Rica">Costa_Rica </option>
                                    <option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
                                    <option value="Croatie">Croatie </option>
                                    <option value="Cuba">Cuba </option>

                                    <option value="Danemark">Danemark </option>
                                    <option value="Djibouti">Djibouti </option>
                                    <option value="Dominique">Dominique </option>

                                    <option value="Egypte">Egypte </option>
                                    <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
                                    <option value="Equateur">Equateur </option>
                                    <option value="Erythree">Erythree </option>
                                    <option value="Espagne">Espagne </option>
                                    <option value="Estonie">Estonie </option>
                                    <option value="Etats_Unis">Etats_Unis </option>
                                    <option value="Ethiopie">Ethiopie </option>

                                    <option value="Falkland">Falkland </option>
                                    <option value="Feroe">Feroe </option>
                                    <option value="Fidji">Fidji </option>
                                    <option value="Finlande">Finlande </option>
                                    <option value="France">France </option>

                                    <option value="Gabon">Gabon </option>
                                    <option value="Gambie">Gambie </option>
                                    <option value="Georgie">Georgie </option>
                                    <option value="Ghana">Ghana </option>
                                    <option value="Gibraltar">Gibraltar </option>
                                    <option value="Grece">Grece </option>
                                    <option value="Grenade">Grenade </option>
                                    <option value="Groenland">Groenland </option>
                                    <option value="Guadeloupe">Guadeloupe </option>
                                    <option value="Guam">Guam </option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guernesey">Guernesey </option>
                                    <option value="Guinee">Guinee </option>
                                    <option value="Guinee_Bissau">Guinee_Bissau </option>
                                    <option value="Guinee equatoriale">Guinee_Equatoriale </option>
                                    <option value="Guyana">Guyana </option>
                                    <option value="Guyane_Francaise ">Guyane_Francaise </option>

                                    <option value="Haiti">Haiti </option>
                                    <option value="Hawaii">Hawaii </option>
                                    <option value="Honduras">Honduras </option>
                                    <option value="Hong_Kong">Hong_Kong </option>
                                    <option value="Hongrie">Hongrie </option>

                                    <option value="Inde">Inde </option>
                                    <option value="Indonesie">Indonesie </option>
                                    <option value="Iran">Iran </option>
                                    <option value="Iraq">Iraq </option>
                                    <option value="Irlande">Irlande </option>
                                    <option value="Islande">Islande </option>
                                    <option value="Israel">Israel </option>
                                    <option value="Italie">italie </option>

                                    <option value="Jamaique">Jamaique </option>
                                    <option value="Jan Mayen">Jan Mayen </option>
                                    <option value="Japon">Japon </option>
                                    <option value="Jersey">Jersey </option>
                                    <option value="Jordanie">Jordanie </option>

                                    <option value="Kazakhstan">Kazakhstan </option>
                                    <option value="Kenya">Kenya </option>
                                    <option value="Kirghizstan">Kirghizistan </option>
                                    <option value="Kiribati">Kiribati </option>
                                    <option value="Koweit">Koweit </option>

                                    <option value="Laos">Laos </option>
                                    <option value="Lesotho">Lesotho </option>
                                    <option value="Lettonie">Lettonie </option>
                                    <option value="Liban">Liban </option>
                                    <option value="Liberia">Liberia </option>
                                    <option value="Liechtenstein">Liechtenstein </option>
                                    <option value="Lituanie">Lituanie </option>
                                    <option value="Luxembourg">Luxembourg </option>
                                    <option value="Lybie">Lybie </option>

                                    <option value="Macao">Macao </option>
                                    <option value="Macedoine">Macedoine </option>
                                    <option value="Madagascar">Madagascar </option>
                                    <option value="Madère">Madère </option>
                                    <option value="Malaisie">Malaisie </option>
                                    <option value="Malawi">Malawi </option>
                                    <option value="Maldives">Maldives </option>
                                    <option value="Mali">Mali </option>
                                    <option value="Malte">Malte </option>
                                    <option value="Man">Man </option>
                                    <option value="Mariannes du Nord">Mariannes du Nord </option>
                                    <option value="Maroc">Maroc </option>
                                    <option value="Marshall">Marshall </option>
                                    <option value="Martinique">Martinique </option>
                                    <option value="Maurice">Maurice </option>
                                    <option value="Mauritanie">Mauritanie </option>
                                    <option value="Mayotte">Mayotte </option>
                                    <option value="Mexique">Mexique </option>
                                    <option value="Micronesie">Micronesie </option>
                                    <option value="Midway">Midway </option>
                                    <option value="Moldavie">Moldavie </option>
                                    <option value="Monaco">Monaco </option>
                                    <option value="Mongolie">Mongolie </option>
                                    <option value="Montserrat">Montserrat </option>
                                    <option value="Mozambique">Mozambique </option>

                                    <option value="Namibie">Namibie </option>
                                    <option value="Nauru">Nauru </option>
                                    <option value="Nepal">Nepal </option>
                                    <option value="Nicaragua">Nicaragua </option>
                                    <option value="Niger">Niger </option>
                                    <option value="Nigeria">Nigeria </option>
                                    <option value="Niue">Niue </option>
                                    <option value="Norfolk">Norfolk </option>
                                    <option value="Norvege">Norvege </option>
                                    <option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
                                    <option value="Nouvelle_Zelande">Nouvelle_Zelande </option>

                                    <option value="Oman">Oman </option>
                                    <option value="Ouganda">Ouganda </option>
                                    <option value="Ouzbekistan">Ouzbekistan </option>

                                    <option value="Pakistan">Pakistan </option>
                                    <option value="Palau">Palau </option>
                                    <option value="Palestine">Palestine </option>
                                    <option value="Panama">Panama </option>
                                    <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
                                    <option value="Paraguay">Paraguay </option>
                                    <option value="Pays_Bas">Pays_Bas </option>
                                    <option value="Perou">Perou </option>
                                    <option value="Philippines">Philippines </option>
                                    <option value="Pologne">Pologne </option>
                                    <option value="Polynesie">Polynesie </option>
                                    <option value="Porto_Rico">Porto_Rico </option>
                                    <option value="Portugal">Portugal </option>

                                    <option value="Qatar">Qatar </option>

                                    <option value="Republique_Dominicaine">Republique_Dominicaine </option>
                                    <option value="Republique_Tcheque">Republique_Tcheque </option>
                                    <option value="Reunion">Reunion </option>
                                    <option value="Roumanie">Roumanie </option>
                                    <option value="Royaume_Uni">Royaume_Uni </option>
                                    <option value="Russie">Russie </option>
                                    <option value="Rwanda">Rwanda </option>

                                    <option value="Sahara Occidental">Sahara Occidental </option>
                                    <option value="Sainte_Lucie">Sainte_Lucie </option>
                                    <option value="Saint_Marin">Saint_Marin </option>
                                    <option value="Salomon">Salomon </option>
                                    <option value="Salvador">Salvador </option>
                                    <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                                    <option value="Samoa_Americaine">Samoa_Americaine </option>
                                    <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option>
                                    <option value="Senegal">Senegal </option>
                                    <option value="Seychelles">Seychelles </option>
                                    <option value="Sierra Leone">Sierra Leone </option>
                                    <option value="Singapour">Singapour </option>
                                    <option value="Slovaquie">Slovaquie </option>
                                    <option value="Slovenie">Slovenie</option>
                                    <option value="Somalie">Somalie </option>
                                    <option value="Soudan">Soudan </option>
                                    <option value="Sri_Lanka">Sri_Lanka </option>
                                    <option value="Suede">Suede </option>
                                    <option value="Suisse">Suisse </option>
                                    <option value="Surinam">Surinam </option>
                                    <option value="Swaziland">Swaziland </option>
                                    <option value="Syrie">Syrie </option>

                                    <option value="Tadjikistan">Tadjikistan </option>
                                    <option value="Taiwan">Taiwan </option>
                                    <option value="Tonga">Tonga </option>
                                    <option value="Tanzanie">Tanzanie </option>
                                    <option value="Tchad">Tchad </option>
                                    <option value="Thailande">Thailande </option>
                                    <option value="Tibet">Tibet </option>
                                    <option value="Timor_Oriental">Timor_Oriental </option>
                                    <option value="Togo">Togo </option>
                                    <option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
                                    <option value="Tristan da cunha">Tristan de cuncha </option>
                                    <option value="Tunisie">Tunisie </option>
                                    <option value="Turkmenistan">Turmenistan </option>
                                    <option value="Turquie">Turquie </option>

                                    <option value="Ukraine">Ukraine </option>
                                    <option value="Uruguay">Uruguay </option>

                                    <option value="Vanuatu">Vanuatu </option>
                                    <option value="Vatican">Vatican </option>
                                    <option value="Venezuela">Venezuela </option>
                                    <option value="Vierges_Americaines">Vierges_Americaines </option>
                                    <option value="Vierges_Britanniques">Vierges_Britanniques </option>
                                    <option value="Vietnam">Vietnam </option>

                                    <option value="Wake">Wake </option>
                                    <option value="Wallis et Futuma">Wallis et Futuma </option>

                                    <option value="Yemen">Yemen </option>
                                    <option value="Yougoslavie">Yougoslavie </option>

                                    <option value="Zambie">Zambie </option>
                                    <option value="Zimbabwe">Zimbabwe </option>

                                </select>
                            </div>

                            <div class="input1">
                                <label>Votre Genre</label><br><br>
                                <select name="genre">
                                    <option selected disabled>Femme, Homme ou Autres </option>
                                    <option value="Femme">Femme</option>
                                    <option value="Homme">Homme</option>
                                    <option value="Autre">Autre</option>
                                </select>
                            </div>
                        </div><br>
                        <hr><br>
                        <div class="les-3-input">

                            <div class="input1">
                                <label for="Nomutilisateur">Diplôme ou Attestation</label><br><br>
                                <input type="file" name="diplomeattestation" id="DiplômeAttestation" required>
                            </div>

                            <div class="input1">
                                <label for="ReleveduDiplômeConcerne"> Relevé de Notes </label><br><br>
                                <input type="file" name="relevenotes" id="ReleveduDiplômeConcerne" required>
                            </div>

                            <div class="input1">
                                <label for="LesBulletinsdeNotes">Bulletins de Notes </label><br><br>
                                <input type="file" name="bulletinsnotes" id="LesBulletinsdeNotes" required>
                            </div>
                        </div><br>
                        <hr><br>
                        <br><br>
                        <div class="btn1">
                            <button type="reset" name="annuler" onclick="">Annuler </button>
                            <button type="submit" name="valider">Envoyer ma demande </button>
                        </div><br>
                </form>
                </fieldset>
                <br>
                <?php
                    if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
                    {
                ?>
                    <br><br> 
                    <div class="btn3">
                        <a href="Page-de-connexion-inscription.php"><button type="button" name="retour">Se déconnecter</button></a>
                    </div>
                <?php
                    }
                ?>
                <br>
            </div>

<!--Partie (Footer)-->

            <footer class="footer1">
                <div class="footer-top">
                    <div class="container">
                        <div class="col1">
                            <a class="brand">Nos Réseaux Sociaux :</a>
                            <ul class="media-icons">
                                <li>
                                    <a href="#" class="bg-facebook">
                                        <i class="bx bxl-facebook-circle"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="bg-twitter">
                                        <i class="bx bxl-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="bg-instagram">
                                        <i class="bx bxl-instagram-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="bg-linkedin">
                                        <i class="bx bxl-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="bg-linkedin">
                                        <i class="bx bxl-youtube"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col2">
                            <ul class="menu">
                                <li>
                                    <h4>About</h4>
                                </li>
                                <li>
                                    <a href="#">Services</a>
                                </li>
                                <li>
                                    <a href="#">Portfolio</a>
                                </li>
                                <li>
                                    <a href="#">Pricing</a>
                                </li>
                                <li>
                                    <a href="#">Customer</a>
                                </li>
                                <li>
                                    <a href="#">Carreres</a>
                                </li>
                            </ul>
                            <ul class="menu">
                                <li>
                                    <h4>Resources</h4>
                                </li>
                                <li>
                                    <a href="#">Docs</a>
                                </li>
                                <li>
                                    <a href="#">Block</a>
                                </li>
                                <li>
                                    <a href="#">eBooks</a>
                                </li>
                                <li>
                                    <a href="#">Webinars</a>
                                </li>
                            </ul>
                            <ul class="menu">
                                <li>
                                    <h4>Contacts</h4>
                                </li>
                                <li>
                                    <a href="#">Help</a>
                                </li>
                                <li>
                                    <a href="#">Sales</a>
                                </li>
                                <li>
                                    <a href="#">Advertise</a>
                                </li>
                                <li>
                                    <a href="#">Location</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col3">
                            <h4>Additional Informations :</h4><br>
                            <p>
                                Un paragraphe est une section de texte en prose vouée au développement d'un point
                                particulier<br>
                                souvent au moyen de plusieurs phrases, dans la continuité du précédent et du
                                suivant.<br>
                                Sur le plan typographique, le paragraphe est compris entre deux alinéas, qui s'analysent
                                aussi comme une<br>
                                « ponctuation blanche ».
                            </p><br>
                            <div class="col3">
                                <p>
                                    Abonnez-vous à notre NewsLeatter : <br><br>
                                </p>
                                <form>
                                    <div class="input-wrap">
                                        <input type="email" placeholder="Exemple@gmail.com" />
                                        <button type="submit">
                                            <box-icon type='solid' name='send'>Abonné(e)</box-icon>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="footer-bottom">
                        <div class="container">
                            <p class="droit-reserver">
                                <br>
                                © Copyright 2023, Tous droits réservés.
                            </p>
                            <div class="service-icons"><div class="Systeme-Payement">Système de Payements Sûr et Sécurisés Via Nos Partenaires.</div><br>
                                <ul class="service-icons">
                                    <li>
                                        <a href="#" class="bg-Amazon">Amazon
                                            <i class="fab fa-cc-Amazon-pay"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="bg-Mastercard">Mastercard
                                            <i class="fab fa-cc-mastercard"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="bg-Apple">Apple
                                            <i class="fab fa-cc-apple-pay"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="bg-PayPal">PayPal
                                            <i class="fab fa-cc-PayPal"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="bg-Visa">Visa
                                            <i class="fab fa-cc-visa"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
     </body>
</html>
<?php
}
?>
