<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Formulaire</title>
  </head>
  <body>

    <!--    HERQUE Maxime   -->

    <h1>Formulaire</h1>

  <!-- Création d'un formulaire simple -->
    <form action="regex.php" method="$_GET">
            <label for="Name">Votre Nom :</label>
            <input type="text" name="Name"><br><br>
            <label for="First_name">Votre Prénom :</label>
            <input type="text" name="First_name"><br><br>
            <label for="Email">Votre Mail :</label>
            <input type="text" name="Email"><br><br>
            <label for="Phone">Votre Numéro de Téléphone :</label>
            <input type="text" name="Phone"><br><br>
            <label for="Confirmer">Inscription</label>
            <!-- Validation du formulaire -->
            <input type="submit" name="Confirmer" value="Valider">
            </form>
  </body>
</html>
