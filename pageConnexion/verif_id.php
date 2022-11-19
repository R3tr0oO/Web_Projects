<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>Verification</title>
  </head>
  <body>

    <?php

    //declaration des variables
    $user = "test_connex";
    $pass = "caribou";
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];

    $validLogin=false;
    $validMdp=false;

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

    //si les données saisies sont bonnes
    
        $mdp_hash = hash("sha3-512",$mdp); // hash du mdp
        $connex = new PDO("mysql:host=localhost;dbname=connexion", $user, $pass); //connection bdd
        $connex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //gestion d'erreur
        $req = $connex->prepare("INSERT INTO utilisateur (login, motdepasse) VALUES (:login,:motdepasse)"); //requète préparée pour entrer les données
        $req->bindParam (':login', $login);
        $req->bindParam (':motdepasse', $mdp_hash);
        $req->execute();
        echo "Compte crée "; //validation de la création d'un compte
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage(); //gestion d'erreur
      }
    }

    ?>
    <br>
    <br>
    <br>
    <a href="connexion.php">Se Connecter</a>
  </body>
</html>
