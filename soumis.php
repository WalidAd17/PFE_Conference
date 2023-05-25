<?php 
session_start();


include "include/function.php";
if(!empty($_POST)){

  Addsers($_POST);
}

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
    <title> Inscription Soumission </title>
</head>
<body>
    <div class="container">
    <?php
    include "include/header.php";
    ?>
 
 
</div>
<main class="container">
    <form action="singupuser.php" method="post">
            
    <div class="row g-2">
        <div class="col-6 p-2 pt-5 pb-5">
            <h1 class="text-center mb-5"> L'inscription De soumission </h1>
          
                <div class="mb-3 row g-3 ">
                    <div class="col-md-6">
                        <label for="nom" class="form-label"> Titre de soumission </label>
                        <input type="text" name="nomuser"  class="form-control" id="nom" >
                    </div>
                    <div class="col-md-6">
                        <label for="prenom" class="form-label">Resume </label>
                        <input type="text" name="prenomuser" class="form-control" id="prenom" >
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nomutili" class="form-label">Mot de clés</label>
                    <input type="text" name="nomutilisation" class="form-control" id="nomutili">
                  </div>
               
                  <div class="mb-3">
                    <label for="address" class="form-label">Grade</label>
                    <input type="text" name="address" class="form-control" id="address">
                  </div>

                  <div class="mb-3">
                    <label for="email" class="form-label">Affiliation</label>
                    <input type="text" name="email" class="form-control" id="email">
                  </div>

                  <div class="mb-3">
                    <label for="password" class="form-label">Description</label>
                    <input type="text" name="passeword" class="form-control" id="password">
                  </div>
                  

               

            
        
          </div>
        <div class="col-5 p-4 m-3">
         
            <div class="p-5 mb-3 bg-light rounded">
                <h4 class="fst-italic">Votre information</h4>
                <!----------------------
                  <h6><span>Nom: </span><?php echo $_SESSION['nom'] ; ?> <span>Prenom:</span><?php echo $_SESSION['prenom'] ; ?> </h6>
                  <h6><span>Nom utilisation:</span><?php echo  $_SESSION['nom_utilisation'] ; ?> </h6>
                  <h6><span>Adress:</span><?php echo  $_SESSION['address'] ; ?></h6>
                  <h6><span>Email:</span><?php echo  $_SESSION['email'] ; ?></h6>
                 ------>
              </div>

              <div class="mb-3">
                <label for="address" class="form-label">Grade</label>
                <input type="text" name="address" class="form-control" id="address">
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Affiliation</label>
                <input type="text" name="email" class="form-control" id="email">
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Description</label>
                <input type="text" name="passeword" class="form-control" id="password">
              </div>

        </div>
    </div>
    <button type="submit" class="btn btn-primary">Sauvgarder</button>
</form>
</main>

<?php
    include "include/footer.php";
    ?>
   

<script src="bootstrap/bootsrap-js/bootstrap.bundle.min.js"></script>
<script src="bootstrap/bootsrap-js/bootstrap.bundle.js"></script>
<script src="bootstrap/bootsrap-js/bootstrap.min.js"></script>
<script src="bootstrap/bootsrap-js/popper.min.js"></script>


</body>
</html>