<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>Inscription</title>
  </head>
  <body>
    <h1>Création de votre compte:</h1> <!-- Presentation du formulaire -->
    <form method="POST" action="verif_id.php" align="center">
      <p>Veuillez créer un identifiant (min 4, max 20)</p>
      <input type="text" name="login" id='login'>
      <br>
      <p>Veuillez creer un mot de passe (min 4, max 20)</p>
      <input type="password" name="mdp" id='mdp'>
      <br><br>
      <input type="submit" name="Inscription">
    </form>

    <br>
    <br>
    <br>
    <a href="connexion.php">Se Connecter</a>
  </body>
</html>
