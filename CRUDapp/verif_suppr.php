<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Verification Supression</title>
  </head>
  <body>

    <?php
    //Identifiants de connexions à la BDD
    $user = "test_connex";
    $pass = "caribou";

    //Données récupérées par le formulaire
    $id = $_POST['identite'];

    //vérification des RegEx
    $validId = false;

    //application des RegEx sur le champ ID
    if (empty($id)){
      echo "L'ID est un champs obligatoire. <br/>";
    }
      elseif (!preg_match("/^[0-9]*$/",$id)) {
        echo "Pour l'ID, seulement les chiffres. <br/>";
      }
      elseif(strlen($id)>5){
        echo "Pour l'ID, la taille ne doit pas dépasser 5. <br/>";
      }
      else{
        $validId=true;
      }

      if($validId==true){
      try {
        $connex = new PDO("mysql:host=localhost;dbname=D1ramos_herque", $user, $pass); //connection bdd
        $connex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //gestion d'erreur
        $req = $connex->prepare("DELETE FROM cheval WHERE id = :id");
        $req->bindParam (':id', $id);
        $req->execute();
        echo "Données Suprimées <br><br>";
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage(); //gestion d'erreur
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
