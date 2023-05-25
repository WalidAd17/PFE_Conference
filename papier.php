
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
    <title> Site de conférence - papiers </title>
   
    
    <style>
      .sticky {
        position: fixed;
        top: 0;
        width: 100%;
        background-color:white;
        z-index:1;
      }
      .parent div{
          float: left;
          clear: none;
      }
    </style>
</head>
<body style="font-family: 'Century Gothic', CenturyGothic, AppleGothic, sans-serif;">
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
    ?>
    <section style="background-color:white;" id="appel">
      <br>
      <h2 class="fst-italic" style="text-align:center;">Appel à communication</h2><br>
      <hr>
      <br>
      <div>
      <ul>
        <li style="margin:15px;">Les auteurs potentiels sont invités à soumettre des papiers faisant état de recherches originales non publiées et de développements récents dans les domaines liés à la conférence.</li>
        <li style="margin:15px;">Tous les papiers soumis à la conférence seront évalués par trois évaluateurs différents et compétents et tous les papiers acceptés et enregistrés seront publiés dans ce site.</li>
        <li style="margin:15px;">Les soumissions doivent inclure le titre, le résumé, les mots-clés, les co-auteurs et l'auteur ainsi que le thème. Un auteur ne peut soumettre que 10 papiers.</li>
        <li style="margin:15px;">Chaque soumission est vérifiée pour le plagiat à l'aide d'un logiciel spécial. La soumission sera automatiquement rejetée à tout moment si elle est plagiée.</li>
        <li style="margin:15px;">Les auteurs des papiers acceptés doivent s'inscrire à la conférence et présenter personnellement leur(s) papier(s) lors de la conférence.</li>
        <li style="margin:15px;">Les thématiques de la conférence en cours sont :</li>

    </ul>
    </div>

    <?php
        $today = date("Y-m-d");
        $sql = "SELECT * FROM conference WHERE date_conference>'$today'";
        $req = mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($req);
        $id=$row['id_conf'];

        $sql2="SELECT * FROM thematique WHERE id_conf='$id'";
		    $req2=mysqli_query($conn,$sql2);

        $i =1;
    ?>
    <br>
    <table style="width:100%; text-align:left;">
        <tr>
          <th style="width:10%; padding-left:160px; padding-top:10px;  padding-bottom:30px;">#</th>
          <th style="width:30%; padding-left:30px; padding-top:10px;  padding-bottom:30px;"><b>Le thème</b></th>
          <th style="width:50%; padding-left:50px; padding-top:10px;  padding-bottom:30px;">Description</th>

        </tr>
        <?php while($row2 = mysqli_fetch_array($req2)){ ?>
        <tr>
          <td style="width:10%; padding-left:160px; padding-top:10px;  padding-bottom:30px;"> <?php echo $i;?> </td>
          <td style="width:30%; padding-left:30px; padding-top:10px;  padding-bottom:30px;"> <?php echo $row2['nom_t']; ?> </td>
          <td style="width:50%; padding-left:50px; padding-top:10px;  padding-bottom:30px;"><?php echo $row2['desc_t'];?></td>
        </tr>
        <?php $i++;} ?>
        
    </table>
    
     
    </section>

    <br>

    <section style="background-color:;" id="apopo_pap">
        <br><br>
      <h2 class="fst-italic" style="text-align:center;">À propos des papiers</h2><br>
      <hr>
      <br>
      <div>
      <ul>
        <li style="margin:15px;">Les papiers doivent être rédigés en français ou en anglais mais pas un mélange des deux.</li>
        <li style="margin:15px;">Tous les papiers doivent être préparés dans le format (.pdf).</li>
        <li style="margin:15px;">Chaque papier doit contenir 12 pages au maximum et 10 pages au minimum.</li>
        <li style="margin:15px;">Le résumé d'un papier doit être rédigé entre 200 et 250 mots.</li>
        <li style="margin:15px;">Le nombre des mots clés doit être entre 3 et 5 mots séparés par des virgules.</li>
        

      </ul>
    </div>
    <br><br>
    </section>

    <br>
    <section>


    </section>
    <br>
  
  
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