<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<?php

  $user = "test_connex";
  $pass = "caribou";
  //recuperation données saisies
  $login = $_POST['login'];
  $mdp = $_POST['mdp'];

  //verification champ Login
  if (empty($login)){ //si champ vide: faux
    echo 'Le login est un champ obligatoire. <br/>';
  }
  elseif (!preg_match("/^[a-zA-Z]*$/",$login)) { //si format faux: faux
    echo "Pour le login, seulement les lettres minuscules, majuscules sont autorisés. <br/>";
  }
  elseif(strlen($login)>20){ //si la taille est trop longue: faux
    echo 'Le login est trop long. <br/>';
  }
  elseif(strlen($login)<4){ //si la taille est trop courte: faux
    echo 'Le login est trop court. <br/>';
  }
  else{
    $validLogin=true;
  }

  //verification champ Password
  if (empty($mdp)){ //si champ vide: faux
    echo 'Le mot de passe est un champ obligatoire. <br/>';
  }
  elseif(strlen($mdp)>20){ //si la taille est trop longue: faux
    echo 'Le mot de passe est trop long. <br/>';
  }
  elseif(strlen($mdp)<4){ //si la taille est trop courte: faux
    echo 'Le mot de passe est trop court. <br/>';
  }
  else{
    $validMdp=true;
  }

    if($validMdp == true && $validLogin == true){
      try{
        $mdp_hash = hash("sha3-512",$mdp); // hash du mdp
        $connex = new PDO("mysql:host=localhost;dbname=connexion", $user, $pass); //connection bdd
        $demande = "SELECT * FROM utilisateur where login = '".$login."'"; //requete préparée pour verifier si le compte existe
        $stmt = $connex->prepare($demande);
        $stmt->bindPARAM(':id',$id);
        $stmt->execute();
        $liste = $stmt->fetch();
        if($liste['login'] == $login && $liste['motdepasse'] == $mdp_hash){ //verification des données saisies
          session_start(); // création de la session utilisateur
          $id_session = session_id();
          echo "<h1>Vous êtes connectés</h1><br><br>"; //confirmtion de la connexion
        } else {
          echo "<h1>Veuillez réessayer</h1>";
        }

    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage(); //gestion d'erreur
    }
  }
?>
  <!-- systeme de nav pour les test -->
  <a href="identification.php">Créer un compte</a>

  </body>
</html>
