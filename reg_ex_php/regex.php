<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <!--    HERQUE Maxime   -->

    <?php

    $nom = htmlspecialchars($_GET['Name']);
    $prenom = htmlspecialchars($_GET['First_name']);
    $email = htmlspecialchars($_GET['Email']);
    $telephone = htmlspecialchars($_GET['Phone']);

    $valide=false;
    $validNom=false;
    $validPrenom=false;
    $validEmail=true;
    $validTelephone=false;

    //verification champ Nom
    if (empty($nom)){ //si champ vide: faux
    	echo 'Le nom est un champ obligatoire. <br/>';
    }
    elseif (!preg_match("/^[a-zA-Z]*$/",$nom)) { //si format faux: faux
      echo "Seulement les lettres minuscules, majuscules sont autorisés. <br/>";
    }
    elseif(strlen($nom)>20){ //si la taille est trop longue: faux
      echo 'Le nom est trop long. <br/>';
    }
    else{
      $validNom=true;
    }

    //verification champ Prenom
    if (empty($prenom)){ //si champ vide: faux
    	echo 'Le prenom est un champ obligatoire. <br/>';
    }
    elseif (!preg_match("/^[a-zA-Z-' ]*$/",$prenom)) { //si format faux: faux
      echo "Seulement les lettre minuscules, majuscules sont autorisés. <br/>";
    }
    elseif(strlen($prenom)>20){ //si la taille est trop longue: faux
      echo 'Le prenom est trop long. <br/>';
    }
    else{
      $validPrenom=true;
    }

    //verification champ Email
    if (empty($email)){ //si champ vide: faux
    	echo "L'email est un champ obligatoire. <br/>";
    }
    elseif(strlen($email)>40){ //si la taille est trop longue: faux
      echo "L'email est trop long. <br/>";
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) { //si format faux: faux
      echo "L'email n'est pas saisi au bon format. <br/>";
    }
    else{
      $validEmail=true;
    }

    //verification champ Email
    if (empty($telephone)){ //si champ vide: faux
    	echo "Le téléphone est un champ obligatoire. <br/>";
    }
    elseif (!preg_match("/^(\+[0-9]{2}\s[1-9]{8})|(0[1-9]\s{8})$/",$telephone)) { //si format faux: faux
      echo "Le format du numéro n'est pas valide. <br/>";
    }
    else{
      $validTelephone=true;
    }

    //verification de la validité des entrée saisie:
    if($validNom==true and  $validPrenom==true and $validEmail==true and $validTelephone==true){
      //si cchaque condition est verifiée, on affiche les informations saisies
      echo 'Nom :'.$_GET['Name'];
      echo '<br>';
      echo 'Prenom: '.$_GET['First_name'];
      echo '<br>';
      echo 'Adresse Mail :'.$_GET['Email'];
      echo '<br>';
      echo 'Numéro de télephone :'.$_GET['Phone'];
      echo '<br><br>';
    }

     ?>
  </body>
</html>
