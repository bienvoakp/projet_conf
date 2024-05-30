<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conférences à venir</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/confstyle.css">
    <link rel="icon" href="./img/rpr.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Micro+5+Charted&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Sedan:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Lexend:wght@100..900&family=Micro+5+Charted&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Sedan:ital@0;1&display=swap" rel="stylesheet">
</head>
<body>

    <header class=" sticky-top">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
              <div class="navbar-brand logo">
                <img src="./img/rpr.png" alt="Logo">
              </div>
             <!--button class="navbar-toggler ms-lg-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon bg-dark"></span>
              </button> -->
              <div class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#notremenu">
                <span class="navbar-toggler-icon bg-secondary"></span>
              </div>

              <div class="collapse navbar-collapse" id="notremenu">
                <ul class="navbar-nav ps-auto">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./index.html#accueil">Accueil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./index.html#qui-sommes-nous">Qui sommes-nous ?</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#upcoming-conferences">Conférences</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./index.html#country-call">Country Call</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header>

  <main>
      <!-- Section pour les conférences à venir -->
      <section id="upcoming-conferences">
        <div>
          <h1 class="color-green">Nos Conférences</h1>
          <p class="fs-4">Prenez le rendez-vous ici et maintenant pour votre réussite!</p>
        </div>
          <div class="container">
            <h2 class="color-green">Conférences à venir</h2>
            <div class="row">

            </div>
          </div>
      </section>

      <!-- Section pour les conférences passées -->
      <section id="past-conferences">
          <div class="container">
              <h2 class="color-green">Conférences passées</h2>
              <div class="row">
              </div>
          </div>
      </section>

      <dialog id="myDialog" class="w-75 w-lg-50">
        <div class="dialog-header">
          <div class="row logos">
            <div class="col-1">
              <img src="./img/rpr.png" alt="logo" class="logo">
            </div>
            <div class="col-1">
              <a href="conferencesMain.php" class="close-btn">&times;</a>
            </div>
          </div>
          </div>
          <form action="conferencesMain.php" method="post" id="registration-form" class="was-validated py-2">
              <!-- Formulaire d'inscription à la conférence -->
              <!-- nom -->
              <div class="form-group first">
                <label for="nom">Nom (*):</label>
                <input type="text" id="nom" name="nom" class="form-control" placeholder="Entrez votre nom" required>
              </div>

              <!-- prenom -->
              <div class="form-group">
                  <label for="prenom">Prénom (*):</label>
                  <input type="text" id="prenom" name="prenom" required class="form-control" placeholder="Entrez votre prénom">
              </div>

              <!-- telephone -->
              <div class="form-group">
                  <label for="tel">Télephone (*):</label>
                  <input type="tel" id="tel" name="tel" required class="form-control" placeholder="Entrez votre numéro de téléphone">
              </div>

              <!-- mail -->
              <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" placeholder="Entrez votre mail" class="form-control">
              </div>
              <div class=" text-end"><small class="text-muted">Nous ne partagerons pas votre adresse mail</small></div>

              <div class="row">
                <button type="submit" class="btn btn-outline-success mx-auto col-4" id="valider">
                  Valider
                </button>
              </div>

            </form>
      </dialog>

  </main>

  <footer>
    <div class="container">
      <div class="row gap-0">

        <div class="col-8 col-lg-6 px-5">
          <!-- Formulaire -->
          <div class="bg-success text-white mx-auto p-4 my-4 mx-5">
            <h2 class="mt-4">Remplissez ce formulaire pour nous contacter</h2>
            <form action="" method="post">
              <p>
                <label for="email">Adresse mail</label>
                <input type="email" class="form-control" placeholder="Entrez votre mail" name="email" id="email">
               <!--<small class="text-muted text-dark">Nous ne partagerons pas votre adresse mail.</small>--> 
              </p>
              <p>
                <label for="message">Message</label>
                <textarea id="message" name="message" class="form-control" rows="3"></textarea>
              </p>
              <button type="submit" class="btn btn-outline-light mt-3">Soumettre</button>
            </form>
          </div>
        </div>

        <div class="col-8 col-lg-6"> 
          <div class="card bg-success" id="contact">
            <!--Informations -->
            <div class="Informations">
              <!--Photo-->
              <img src="img/logo_cc_vf.png" alt="Notre logo">
              <!--Prénom Nom-->
              <h1 class="text-white">Country Call</h1>
              <h3 class="text-white">Creuset d'échanges et de partages d'expériences</h3>
              <!-- Contacts -->
              <p>Tel: +229 XX-XX-XX-XX/ <br> +229 XX-XX-XX-XX</p>
              <p>Email: country-call@gmail.com</p>
            </div>

            <!--icones-->
            <div class="icon">
              <a href="#"><i class="fa-brands fa-instagram fa-2x color-green"></i></a>
              <a href="#"><i class="fa-brands fa-facebook fa-2x color-green"></i></a>
              <a href="#"><i class="fa-brands fa-twitter fa-2x color-green"></i></a>
            </div>
          
          </div>
          
        </div>

      </div>
    </div>

    <div class="row">
      <p class="text-center">&copy; Country Call &copy Tous droits reservés</p>
    </div>
  </footer>

  <script src="./js/script.js"></script>
   <!-- Les plugins js-->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<?php
  $meassge = "";
  // include_once("db_config.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    //CONNEXION A LA BASE DE DONNEES

    try{
        $bdd= new PDO('mysql:host=localhost; dbname=countrycall;charset = utf-8','root','');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*echo "Connexion réussie à la base de données !";*/

    } catch(Exception $e) {
        die('Erreur  :'. $e->getMessage());

    }


    //On veut ajouter un nouvel utilisateur qui remplit le formulaire à notre base de données && isset($_POST['titre'])
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['tel'])  && isset($_POST['titre']) ) {
      $nom = htmlspecialchars( stripslashes( trim($_POST['nom'])));
      $prenom = htmlspecialchars( stripslashes( trim($_POST['prenom'])));
      $tel = htmlspecialchars( stripslashes( trim($_POST['tel'])));
      $email = htmlspecialchars( stripslashes( trim($_POST['email'])));
      $titre = htmlspecialchars( stripslashes( trim($_POST['titre'])));
        //message de succes
        $message = "Vous avez bien été enregistré! Merci d'avoir pris le rendez-vous";

        $requete=$bdd->prepare('INSERT INTO inscription_conferences(nom, prenom, contacts, email, titre_conf) VALUES (?, ?, ?, ?, ?)') ;
        // or die(print_r($bdd->errorInfo()));
        try{
          $response = $requete->execute(array($nom, $prenom, $tel, $email, $titre));
        } 
        catch(Exception $e){
            $message = $requete->errorInfo()[2]. ". Please, retry and enter unique value";
          
        }

?>
  <script>
    alert(`<?php echo $message ?>`);
  </script>
<?php } ?>
  </body>
</html>