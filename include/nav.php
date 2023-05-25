<?php
      include 'conn_bd.php';
        $today = date("Y-m-d");
        $sql = "SELECT * FROM conference WHERE date_conference>'$today'";
        $req = mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($req);  
        $n = mysqli_num_rows($req);  
      ?>

  <?php if ($n <> 0) {?>
   <nav class="navbar navbar-expand-lg navbar-light bg-light header navb" style="font-size:18px;" id="navb">
     <div class="container-fluid">

      
      
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <img src="../images/logofaculté.png" width="150px">

         <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left:70px;">
          
           <li class="nav-item">
             <a class="nav-link active" aria-current="page" href="index.php" style=" color:#34678a ;font-weight: bold;">Acceuil</a>
           </li>
           <li class="nav-item">
             <a class="nav-link active" href="../index.php#apropo"style=" color: #34678a;font-weight: bold;">À propos de la conférence</a>
           </li>
           <li class="nav-item">
             <a class="nav-link active" href="../index.php#dates_impo"style=" color: #34678a;font-weight: bold;">Les dates importantes</a>
           </li>
           <li class="nav-item dropdown">
             <a class="nav-link active dropdown-toggle"style=" color: #34678a;font-weight: bold;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Papiers
             </a>
             <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
               <li><a class="dropdown-item" href="papier.php#appel">Appel à communication</a></li>
               <li><a class="dropdown-item" href="papier.php#apopo_pap">À propos des papiers</a></li>
             </ul>
           </li>

           <li class="nav-item">
             <a class="nav-link active" href="../index.php#insc"style=" color: #34678a;font-weight: bold;">Inscription</a>
           </li>
          
         </ul>
         <form class="d-flex m-2 p-2">
          <a href="loginuser.php" class="btn btn-outline-primary m-1" type="submit">Se connecter</a>
          <a href="singupuser.php" class="btn btn-primary m-1" type="submit">Créer un compte</a>
         </form>
         
       </div>
     </div>
   </nav>
   <?php }else{ ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light header" style="font-size:18px;"  id="navb">
     <div class="container-fluid">

      
      
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <img src="../images/logofaculté.png" width="150px">

         <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left:410px;">  
            <li class="nav-item">
             <a class="nav-link active" aria-current="page" href="index.php" style=" color:#34678a ;font-weight: bold;">Acceuil</a>
            </li>
         </ul>
         <form class="d-flex m-2 p-2">
          <a href="loginuser.php" class="btn btn-outline-primary m-1" type="submit">Se connecter</a>
          <a href="singupuser.php" class="btn btn-primary m-1" type="submit">S'inscrire</a>
         </form>
         
       </div>
     </div>
    </nav>
   <?php  } ?>