
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
    <link rel="stylesheet" href="css/style.css">
    <title>Site de conférence</title>
    
    <style>

      .parent div{
          float: left;
          clear: none;
      }

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
  <br>
  <main class="container">
    <!---------pour les photo difinition le site web--------->
    
    <br>
    <?php
    $today = date("Y-m-d");
    $sql = "SELECT * FROM conference WHERE date_conference>'$today'";
    $req = mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($req);  
    $n = mysqli_num_rows($req);  
    ?>

    <?php if ($n <> 0) {?>
     
    <section style="background-color:white;" id="apropo">
      <br>
      <h2 class="fst-italic" style="text-align:center;">À propos de la conférence</h2><br>
      <hr>
      <?php
      include "include/imgcarousel.php";
      ?>
      <br>
      <div>
        <h4 style="text-align:center;"><?php echo $row['titre_conf'];?></h4>
        <br>
        <p style="margin:10px;"><?php echo $row['desc_conf'];?></p>
      </div>
      
      <table style="width:100%; text-align:center;">
        <tr>
          <td style="width:50%;"><img src="/images/emplacement.png"></td>
          <td style="width:50%;"><img src="/images/date.png"></td>
        </tr>
        <tr>
          <td style="width:50%;"><?php echo $row['lieu_conf']; ?></td>
          <td style="width:50%;"><?php echo "Le ".date('d-m-Y', strtotime($row['date_conference'])); ?></td>
        </tr>
        <br>
      </table>

     
    </section>

    <br><br>

    <section style="background-color:#FAFAFA;" id="dates_impo">
      <br><br>
      <h2 class="fst-italic" style="text-align:center;">Les dates importantes</h2><br>
      <hr>
      
      
      <table style="width:100%; text-align:left">
        <tr>
          <td style="width:50%; padding-left:250px; padding-top:10px;  padding-bottom:30px;"><b>La date de soumission :</b></td>
          <td style="width:50%; padding-left:110px; padding-top:10px;  padding-bottom:30px;"><?php echo "Le ".date('d-m-Y ', strtotime($row['date_soumission']));?></td>
        </tr>
        <tr>
          <td style="width:50%; padding-left:250px; padding-top:10px;  padding-bottom:30px;"><b>La date d'évaluation :</b></td>
          <td style="width:50%; padding-left:110px; padding-top:10px;  padding-bottom:30px;"><?php echo "Le ".date('d-m-Y ', strtotime($row['date_evaluation']));?></td>
        </tr>
        <tr>
          <td style="width:50%; padding-left:250px; padding-top:10px;  padding-bottom:30px;"><b>La date de décision :</b></td>
          <td style="width:50%; padding-left:110px; padding-top:10px;  padding-bottom:30px;"><?php echo "Le ".date('d-m-Y ', strtotime($row['date_decision']));?></td>
        </tr>
        <tr>
          <td style="width:50%; padding-left:250px; padding-top:10px;  padding-bottom:30px;"><b>La date de conférence :</b></td>
          <td style="width:50%; padding-left:110px; padding-top:10px;  padding-bottom:30px;"><?php echo "Le ".date('d-m-Y ', strtotime($row['date_conference']));?></td>
        </tr>
        <br>
      </table>
      <hr><br><br>

     
    </section>

    <br><br>
    <section id="insc">
      <br>
      <h2 class="fst-italic" style="text-align:center;">Inscription</h2><br>
      <hr>
      <br>
      <div>
        <ul>
          <li style="margin:7px;">Tous les participants à la conférence doivent payer les frais d'inscription. Pour chaque papier l'auteur doit être présent et payer les frais d'inscription.</li>
          <li style="margin:7px;">Voici les frais d'inscription :</li>
        </ul>
      </div>
      
      <table style="width:100%; text-align:center;">
        <tr>
          <th style="width:50%; color:#255194;"><img src="/images/sinscrire.png" style="padding-bottom:4px;">Tarif Participant</th>
          <th style="width:50%; color:#255194;"><img src="/images/sinscrire.png" style="padding-bottom:4px;">Tarif Auteur</th>
        </tr>
        <tr>
          <th style="width:50%; "><?php echo $row['tarif_auditeur']." DA"; ?></td>
          <th style="width:50%;"><?php echo $row['tarif_auteur']." DA"; ?></th>
        </tr>
        <br>
      </table>
      <br>
      <div>
        <ul>
          <li style="margin:7px;">Les frais d'inscription à la conférence comprennent :</li>
          <ul>
            <li>Thé/café et déjeuner.</li>
            <li>Certificat de participation.</li>
            <li>Les frais d'hôtel.</li>
          </ul>
          <li style="margin:7px;">Afin de s'inscrire à la conférence vous devez avoir un compte (utilisateur/auteur).</li>
        </ul>
      </div>


    </section>
    <br>
    <?php }else{ ?>
      
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            
            <div class="carousel-item active">
              <img src="../images/FIi.png" class="d-block " style=" height:350px;width:100%">
              <div class="carousel-caption d-none d-md-block">
                <h3><a href="loginuser.php" class="btn btn-primary m-1" type="submit">Créez votre compte</a></h3>
              </div>
            </div>

            <div class="carousel-item">
              <img src="../images/confe.jpg" class="d-block " style=" height:350px;width:100%">
              <div class="carousel-caption d-none d-md-block">
                <h3><a href="loginuser.php" class="btn btn-primary m-1" type="submit">Créez votre compte</a></h3>
              </div>
            </div>

            <div class="carousel-item">
              <img src="../images/9.jpg" class="d-block " style=" height:350px;width:100%">
              <div class="carousel-caption d-none d-md-block">
                <h3><a href="loginuser.php" class="btn btn-primary m-1" type="submit">Créez votre compte</a></h3>
              </div>
            </div>

            <div div class="carousel-item">
              <img src="../images/slider-2.jpg" class="d-block " style=" height:350px;width:100%">
              <div class="carousel-caption d-none d-md-block">
                <h3><a href="loginuser.php" class="btn btn-primary m-1" type="submit">Créez votre compte</a></h3>
              </div>   
              </div>

            <div class="carousel-item">
              <img src="../images/2.jpg" class="d-block " style=" height:350px;width:100%">
              <div class="carousel-caption d-none d-md-block">
                <h3><a href="loginuser.php" class="btn btn-primary m-1" type="submit">Créez votre compte</a></h3>
              </div>
            </div>
          </div>
          
        </div>
        <br>
    <?php } ?>

    <br><br>
    <section id="anc">
      <br>
      <h2 class="fst-italic" style="text-align:center;">Anciennes conférences</h2><br>
      <hr>
      
      <?php
       $today = date("Y-m-d");
       $a = "SELECT * FROM conference WHERE date_conference < '$today'";
       $b = mysqli_query($conn,$a);
       $n = mysqli_num_rows($b);  
      ?>
      <table style="width:100%;">
      
        <?php
        $i = 2;
          while ($c = mysqli_fetch_array($b)) {
            if ($i % 2 == 0) {
              ?>
              <tr>
                <td style="padding:50px;"><img src="images/<?php echo $i?>.jpg" style="width:450px"></td>
                <td style="padding:20px;">
                    <h6 style="text-align:center;"><?php echo '<b>'.$c['titre_conf'].'</b>'; ?></h6>
                    <hr style="height:5px;">
                    <p>
                      <?php echo $c['desc_conf']; ?>
                    </p>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <?php
                $i++;
              
            }else{
              ?>
              <tr>
                
                <td style="padding:20px;">
                    <h6 style="text-align:center;"><?php echo '<b>'.$c['titre_conf'].'</b>'; ?></h6>
                    <hr style="height:5px;">
                    <p>
                      <?php echo $c['desc_conf']; ?>
                    </p>
                </td>
                <td style="padding:50px;"><img src="images/<?php echo $i?>.jpg" style="width:450px"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <?php
              $i++;
            }
        
        ?>
        
        
        <?php
          }
        ?>
        
      </table>
      <br>
      


    </section>
  
  
  <!-------------les défirent date------------->
    <div class="row g-5">
            
        <div class="col-md-8">
          
          
    
            
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