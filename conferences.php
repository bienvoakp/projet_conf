<?php
   // include_once("db_config.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['tel']) && isset($_POST['email'])) { 
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $tel = htmlspecialchars($_POST['tel']);
        $email = htmlspecialchars($_POST['email']);

        
    }

    //CONNEXION A LA BASE DE DONNEES

    try{
        $bdd= new PDO('mysql:host=localhost; dbname=countrycall;charset = utf-8','root','');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*echo "Connexion réussie à la base de données !";*/

    } catch(Exception $e) {
        die('Erreur  :'. $e->getMessage());

    }

    //On veut ajouter un nouvel utilisateur qui remplit le formulaire à notre base de données

    if(isset($_POST['nom']) && isset( $_POST['prenom']) && isset($_POST['tel']) && isset($_POST['email'])) {
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $tel=$_POST['tel'];
        $email=$_POST['email'];
    }

    $requete=$bdd->prepare('INSERT INTO inscription_conferences(nom, prenom, contacts, email) VALUES (?, ?, ?, ?)') ;
    // or die(print_r($bdd->errorInfo()));
    try{
        $requete->execute(array($nom, $prenom, $tel, $email));
    } catch(Exception $e){

        //Envoi d4un post request a conference.html
        // Recuperer l'erreur de la requete
        $errorInfo = $requete->errorInfo();
        $url = "./conferences.html"; //destination
        $data = array(
            "Error Code" => $errorInfo[0], //le code de l'erreur
            "Erreur Message" => $errorInfo[2],
        );

        $ch = curl_init($url); // c'est la methode aui permet de faire la requete
        curl_setopt($ch, CURLOPT_POST, true); // on precise que c'est post
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //retourne la reponse en chaine de caract7re

        $bdd = null;
        header('Location: conferencesMain.php');
        exit;
    }
    
    
    
    
    //On peut lire les données contenues dans notre base grâce à une requête php
    //$requete= $bdd->query('SELECT * FROM inscription_conferences') ;

    echo 'Bonjour ' . $nom . ' ' . $prenom . ' ! Votre inscription a été enregistrée avec succès. Merci ! <br><br>';
    //header('Location: conferences.html');
    exit;
       /* while($donnees=$requete->fetch()){

           echo '<br><br>' ;
            echo $donnees ['nom'];
        }*/

        /*try {
            $con = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE );
        } catch (\Throwable $th) {
            throw $th;
        }
        
        // Prepare the query with placeholders
        $sql = "INSERT INTO client(nom, prenom, tel, email) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        // Bind parameters to prevent SQL injection
        if (!$stmt) {
        die("Error preparing statement: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "sss", $nom, $prenom, $tel, $email);

        // Execute the prepared statement
        if (!mysqli_stmt_execute($stmt)) {
        die("Error executing statement: " . mysqli_stmt_error($stmt));
        }

        echo 'Bonjour ' . $nom . ' ' . $prenom . ' ! Votre inscription a été enregistrée avec succès. Merci !';

        // Close the statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);


//Avec PDO, on aurait pu également procéder comme suit.


        $dsn = 'mysql:host=localhost;dbname=votre_base_de_donnees;charset=utf8';
        $username = 'votre_nom_utilisateur';
        $password = 'votre_mot_de_passe';

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connexion réussie!";
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }


        
    }*/

?>
