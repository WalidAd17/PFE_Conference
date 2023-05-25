<header class="blog-header py-0" style="height:100px; background: linear-gradient(to bottom right, #34678a 0%, #ffffff 100%);">
  
      <?php
      include 'conn_bd.php';
        $today = date("Y-m-d");
        $sql = "SELECT * FROM conference WHERE date_conference>'$today'";
        $req = mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($req);  
        $n = mysqli_num_rows($req);  
      ?>
       <h5 style="text-align:center; padding-top:37px; font-weight:bolder;">

         <?php
          if ($n == 0) {
            echo '<span style="color:red;">'."Aucune conférence n'existe pour le moment".'</span>';
          } else {
            echo $row['titre_conf'];
          }
          
          ?>
       </h5>

  
 </header>
  
 
