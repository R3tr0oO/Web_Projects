<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Consultation</title>
  </head>
  <body>

    <h1> Remplir le formulaire pour consulter une données.</h1><br>

    <div class = "menu">
    <a href="index.php">Accueil</a><br><br>
    <a href="saisie.php"> Insérer une donnée </a><br><br>
    <a href="modification.php"> Modifier une donnée </a><br><br>
    <a href="suppression.php"> Supprimer une donnée </a><br><br>
    </div><br><br>

        <form method="POST" action="affich_req.php" align="center">
          <p>Saisir l'id de votre cheval.</p>
          <input type="text" name="identite" id='identite' placeholder="identifiant">
          <br><br>
          <input class="btn-grad" type="submit" name="Consulter">
        </form>

    <style>
      div.menu{
        width: 15em;
        border: 1px solid #333;
        box-shadow: 8px 8px 5px #444;
        padding: 8px 12px;
        padding: 8px 12px;background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(235,131,130,1) 0%, rgba(235,131,130,0.75) 38.6%, rgba(211,177,125,0.52) 72.1%, rgba(211,177,125,0.24) 94.7% );

        text-align: center;
      }

      form{
        width: 15em;
        border: 1px solid #333;
        box-shadow: 8px 8px 5px #444;
        padding: 8px 12px;
        background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(235,131,130,1) 0%, rgba(235,131,130,0.75) 38.6%, rgba(211,177,125,0.52) 72.1%, rgba(211,177,125,0.24) 94.7% );
        text-align: center;
        margin-left: auto;
        margin-right: auto;
        margin-top: auto;
        margin-bottom: auto;
      }

      .btn-grad {background-image: linear-gradient(to right, #DD5E89 0%, #F7BB97  51%, #DD5E89  100%)}
      .btn-grad {
         margin: 10px;
         padding: 15px 45px;
         text-align: center;
         text-transform: uppercase;
         transition: 0.5s;
         background-size: 200% auto;
         color: white;
         box-shadow: 0 0 20px #eee;
         border-radius: 10px;
         display: block;
       }

       .btn-grad:hover {
         background-position: right center; /* change the direction of the change here */
         color: #fff;
         text-decoration: none;
       }

       body{
background-image: linear-gradient( 95.2deg,  rgba(173,252,234,1) 26.8%, rgba(192,229,246,1) 64% );
}
</style>

  </body>
</html>
