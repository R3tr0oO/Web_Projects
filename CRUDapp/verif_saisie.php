<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Verification Insertion</title>
  </head>
  <body>

    <?php

    //Identifiants de connexions à la BDD
    $user = "test_connex";
    $pass = "caribou";

    //Données récupérées par le formulaire
    $nom = $_POST['nom'];
    $race = $_POST['race'];
    $couleur = $_POST['couleur'];
    $centre = $_POST['centre'];
    $id = 0;

    //vérification des RegEx
    $validNom = false;
    $validRace = false;
    $validCouleur = false;
    $validCentre = false;

    //verification de la saisie des données
    $donnee = false;

    //application des RegEx sur le champ Nom
      if (empty($nom)){ //si champ vide: faux
        echo 'Le nom est un champ obligatoire. <br/>';
      }
      elseif (!preg_match("/^[a-zA-Z]*$/",$nom)) { //si format faux: faux
        echo "Pour le nom, seulement les lettres minuscules et majuscules sont autorisés. <br/>";
      }
      elseif(strlen($nom)>20){ //si la taille est trop longue: faux
        echo 'Le nom est trop long. <br/>';
      }
      else{
        $validNom=true;
      }

    //application des RegEx sur le champ Race
      if (empty($race)){ //si champ vide: faux
        echo 'La race un champ obligatoire. <br/>';
      }
      elseif (!preg_match("/^[a-zA-Z]*$/",$race)) { //si format faux: faux
        echo "Pour la race, seulement les lettres minuscules et majuscules sont autorisés. <br/>";
      }
      elseif(strlen($nom)>20){ //si la taille est trop longue: faux
        echo 'La race est trop longue. <br/>';
      }
      else{
        $validRace=true;
      }

    //application des RegEx sur le champ Couleur
      if (empty($couleur)){ //si champ vide: faux
        echo 'La couleur un champ obligatoire. <br/>';
      }
      elseif (!preg_match("/^[a-zA-Z]*$/",$couleur)) { //si format faux: faux
        echo "Pour la couleur, seulement les lettres minuscules et majuscules sont autorisés. <br/>";
      }
      elseif(strlen($couleur)>20){ //si la taille est trop longue: faux
        echo 'La couleur est trop longue. <br/>';
      }
      else{
        $validCouleur=true;
      }

    //application des RegEx sur le champ Centre
      if (empty($centre)){ //si champ vide: faux
        echo 'Le centre un champ obligatoire. <br/>';
      }
      elseif(strlen($nom)>20){ //si la taille est trop longue: faux
        echo 'Le centre est trop long. <br/>';
      }
      else{
        $validCentre=true;
      }

      //on entre les valeurs dans la bdd, si les RegEx sont vérifiées
      if($validNom==true and  $validRace==true and  $validCouleur==true and  $validCentre==true){
      try {
        $connex = new PDO("mysql:host=localhost;dbname=D1ramos_herque", $user, $pass); //connection bdd
        $connex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //gestion d'erreur
        $req = $connex->prepare("INSERT INTO cheval (nom, race, couleur, centre) VALUES (:nom, :race, :couleur, :centre)");
        $req->bindParam (':nom', $nom);
        $req->bindParam (':race', $race);
        $req->bindParam (':couleur', $couleur);
        $req->bindParam (':centre', $centre);
        $req->execute();
        echo "Données Saisies <br><br>";
        $donnee = true;
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage(); //gestion d'erreur
      }

      //nous donne l'id du cheval entré
      if($donnee == true){
        $connex = new PDO("mysql:host=localhost;dbname=D1ramos_herque", $user, $pass); //connection bdd
        $connex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //gestion d'erreur
        $req = $connex->prepare("SELECT id FROM cheval WHERE (nom = :nom AND race = :race AND couleur = :couleur AND centre = :centre)");
        $req->bindParam (':nom', $nom);
        $req->bindParam (':race', $race);
        $req->bindParam (':couleur', $couleur);
        $req->bindParam (':centre', $centre);
        $req->execute();
        $row=$req->fetch(PDO::FETCH_ASSOC);
        json_encode($row);
        $resultat = implode(", ", $row);
        echo "L'id de votre cheval est ",$resultat;
      }
    }

    ?>
    <div class = "menu">
    <a href="index.php">Accueil</a><br><br>
    <a href="saisie.php"> Insérer une donnée </a><br><br>
    <a href="modification.php"> Modifier une donnée </a><br><br>
    <a href="suppression.php"> Supprimer une donnée </a><br><br>
    <a href="consultation.php"> Consulter une donnée </a><br><br><br><br>
    </div>

    <style>
      div.menu{
        width: 15em;
        border: 1px solid #333;
        box-shadow: 8px 8px 5px #444;
        padding: 8px 12px;
        background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(235,131,130,1) 0%, rgba(235,131,130,0.75) 38.6%, rgba(211,177,125,0.52) 72.1%, rgba(211,177,125,0.24) 94.7% );
        text-align: center;
      }
      body{
background-image: linear-gradient( 95.2deg,  rgba(173,252,234,1) 26.8%, rgba(192,229,246,1) 64% );}
      </style>
  </body>
</html>
