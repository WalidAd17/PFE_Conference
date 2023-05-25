<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/logo3.png">
    
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/bootsrap-css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/bootsrap-css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
    <title>Inscription</title>
    <style>
       .sticky {
        position: fixed;
        top: 0;
        width: 100%;
        background-color:white;
        z-index:1;
      }
    </style>
</head>
<body style="font-family: 'Century Gothic', CenturyGothic, AppleGothic, sans-serif; ">
    <div class="">
    <?php
    include "include/header.php";
    include "include/nav.php";

    include "include/conn_bd.php";
    ?>
 
 
</div>
<main class="container">
  <br>
    <div class="row g-2">
    <h2 class="text-center mb-5">Créer votre compte</h2>
    <hr>
            <br>
        <div class="col-12 p-2 pt-5 pb-5">
          
            <form action="singupuser.php" method="post" style="border-style: inset; padding:20px;">     
                <div class="mb-3 row g-3 ">
                  <div class="mb-3">
                    <label for="type" class="form-label">Type d'inscritpion</label>
                    <select class="form-select" id="type" name="type" required="">
                      <option value="" disabled>select votre type</option>
                      <option value="utilisateur"> Utilisateur </option>
                      <option value="auteur"> Auteur </option>
                    </select>
                   
                  </div>
                  <hr>
                    <div class="col-md-6">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="nom"  class="form-control" id="nom" required="">
                    </div>
                    <div class="col-md-6">
                        <label for="prenom" class="form-label">Prenom</label>
                        <input type="text" name="prenom" class="form-control" id="prenom" required="">
                    </div>
                    <div class="col-md-3">
                        <label for="sexe" class="form-label">Sexe</label>
                        <select class="form-select" id="type" name="sexe" required="">
                          <option value="" disabled>Sélectionner votre sexe</option>
                          <option value="Homme"> Homme </option>
                          <option value="Femme"> Femme </option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="datenaiss" class="form-label">Date de naissance</label>
                        <input type="date" name="datenaiss" class="form-control" id="datenaiss" required="">
                    </div>
                    <div class="col-md-3">
                        <label for="tel" class="form-label">Numéro de téléphone</label>
                        <input type="number" name="tel" class="form-control" maxlength="10" id="tel" required="">
                    </div>
                    <div class="col-md-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="mail" name="email" class="form-control" id="email" required="">
                    </div>
                </div>
                  <div class="mb-3">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="text" name="adresse" class="form-control" id="adresse" required="">
                  </div>

                  <div class="mb-3">
                    <label for="profession" class="form-label">Profession</label>
                    <input type="text" name="profession" class="form-control" id="profession" required="">
                  </div>

                  <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" id="description" required="">
                  </div>
                  
                  <hr>
                  <div class="row">
                    <div class="col-md-6">
                        <label for="user" class="form-label">Nom d'utilisateur</label>
                        <input type="text" name="user" class="form-control" id="user" required="">
                    </div>
                    <div class="col-md-6">
                        <label for="mdp" class="form-label">Mot de passe</label>
                        <input type="password" name="mdp" class="form-control" id="mdp" required="">
                    </div>
                  </div>
                  <br>
                     
                  

                <button style="margin-left:495px;" name="sub" type="submit" class="btn btn-primary">Valider</button>

              </form>
        
              
        
          </div>
    </div>
 
 
</main>

<?php
    include "include/footer.php";
    ?>
   

<script src="bootstrap/bootsrap-js/bootstrap.bundle.min.js"></script>
<script src="bootstrap/bootsrap-js/bootstrap.bundle.js"></script>
<script src="bootstrap/bootsrap-js/bootstrap.min.js"></script>
<script src="bootstrap/bootsrap-js/popper.min.js"></script>

<?php
  if(isset($_POST['sub'])){
    $type = $_POST['type'];
    $nom = strtoupper($_POST['nom']);
    $prenom = ucfirst(strtolower($_POST['prenom']));
    $sexe = $_POST['sexe'];
    $datenaiss = $_POST['datenaiss'];
    $adresse = $_POST['adresse'];
    $profession = ucfirst(strtolower($_POST['profession']));
    $description = ucfirst(strtolower($_POST['description']));
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $user = $_POST['user'];
    $mdp = $_POST['mdp'];
    
    if($type == "utilisateur"){
      
      $sql = "SELECT * FROM utilisateur WHERE email_u = '$email' OR nom_util_u = '$user'";
      $req = mysqli_query($conn,$sql);
      $n = mysqli_num_rows($req);
      if ($n == 0) {
        
        $s = "INSERT INTO utilisateur (nom_u , prenom_u, sexe_u , date_naiss_u, profession_u, desc_u, email_u , tel_u , adresse_u , nom_util_u , mdp_u) VALUES ('$nom','$prenom','$sexe','$datenaiss','$profession','$description','$email','$tel','$adresse','$user','$mdp')";
        $r = mysqli_query($conn , $s);
        
        if ($r){
          
          ?>
          <script>
          var a = alert("Votre compte participant a été bien créé! Bienevnue");
          </script>

            <?php
            $profile = "SELECT *  FROM utilisateur WHERE nom_util_u= '$user'";
            $statpros = mysqli_query($conn,$profile);
            $row = mysqli_fetch_array($statpros);
          
            $_SESSION['username'] = $row['nom_util_u'];

            $_SESSION['id_u']= $row['id_u'];
            $_SESSION['nom_u']= $row['nom_u'];
            $_SESSION['prenom_u']= $row['prenom_u'];
            $_SESSION['sexe_u']= $row['sexe_u'];
            $_SESSION['date_naiss_u']= $row['date_naiss_u'];
            $_SESSION['profession_u']= $row['profession_u'];
            $_SESSION['desc_u']= $row['desc_u'];
            $_SESSION['tel_u']= $row['tel_u'];
            $_SESSION['email_u']= $row['email_u'];
            $_SESSION['adresse_u']= $row['adresse_u'];

            $_SESSION['usermdp']= $row['mdp_u'];
            ?>
            <script> window.location ="/participant/documentation/index.php"</script>
            <?php
            
          
          
           

        } else {
       
          
          echo "Error: " . $s. mysqli_error($conn);
          
            
            
        } 
      }else{
        ?>
        <script> var a = alert("Adresse email existe déja");</script>
        <?php
      }

    }else{

      $sql = "SELECT * FROM auteur WHERE email_a = '$email' OR nom_util_a = '$user'";
      $req = mysqli_query($conn,$sql);
      $n = mysqli_num_rows($req);
      if ($n == 0) {
        $s = "INSERT INTO auteur (nom_a , prenom_a, sexe_a , date_naiss_a, profession_a, desc_a, email_a , tel_a , adresse_a , nom_util_a , mdp_a) VALUES ('$nom','$prenom','$sexe','$datenaiss','$profession','$description','$email','$tel','$adresse','$user','$mdp')";
        $r = mysqli_query($conn , $s);
        if ($r){
          ?>
          <script>
          var a = alert("Votre compte auteur a été bien créé! Bienevnue");
          </script>
          <?php
          $profile = "SELECT *  FROM auteur WHERE nom_util_a= '$user'";
          $statpros = mysqli_query($conn,$profile);
          $row = mysqli_fetch_array($statpros);
          
            $_SESSION['username'] = $row['nom_util_a'];

            $_SESSION['id_a']= $row['id_a'];
            $_SESSION['nom_a']= $row['nom_a'];
            $_SESSION['prenom_a']= $row['prenom_a'];
            $_SESSION['sexe_a']= $row['sexe_a'];
            $_SESSION['date_naiss_a']= $row['date_naiss_a'];
            $_SESSION['profession_a']= $row['profession_a'];
            $_SESSION['desc_a']= $row['desc_a'];
            $_SESSION['tel_a']= $row['tel_a'];
            $_SESSION['email_a']= $row['email_a'];
            $_SESSION['adresse_a']= $row['adresse_a'];

            $_SESSION['usermdp']= $row['mdp_a'];
            ?>
            <script> window.location ="/auteur/documentation/index.php"</script>
          <?php
            
          
          
           

        } else {
            
            echo "Error: " . $s. mysqli_error($conn);
            
        } 
      }else{
        ?>
        <script> var a = alert("Adresse email existe déja");</script>
        <?php
      }

    }
    
  }
?>
<script>
    window.onscroll = function() {myFunction()};

    var header = document.getElementById("navb");
    var sticky = header.offsetTop;

    function myFunction() {
      if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
      } else {
        header.classList.remove("sticky");
      }
    }
  </script>
</body>
</html>