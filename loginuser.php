
<?php 

session_start();

include "include/conn_bd.php";

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
    <title> Connexion </title>
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
<body style="font-family: 'Century Gothic', CenturyGothic, AppleGothic, sans-serif;">
  <div class="">
    <?php
    include "include/header.php";
    include "include/nav.php";


    ?>
   
  
 
 
  </div>
  <main class="container">
    <div class="row g-2">
        <div class="col-10 p-2 pt-5 pb-5" style="margin-left: 90px;">
            <h2 class="text-center mb-5">Connecter à votre compte</h2>
            <hr>
            <br>
            <form action="check_login.php" method="post">

            <div class="row">
                  <div class="col-md-6">
                    <label for="exampleInputPassword1" class="form-label">Nom utilisateur</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="username" placeholder="Saisissez..." required>
                  </div>
               
                  
                <div class="col-md-6">
                  <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="mdp" placeholder="Saisissez..." required>
                </div>
            </div>
            <br>
                
                
              
                <button type="submit" name="submit" class="btn btn-primary" style="margin-left:404px">Connexion</button>
              <hr>
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