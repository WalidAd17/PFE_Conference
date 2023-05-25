<?php
    $today = date("Y-m-d");
	$sql = "SELECT * FROM conference WHERE date_conference>'$today'";
	$req = mysqli_query($conn,$sql);
    $w = mysqli_fetch_array($req);
    $n = mysqli_num_rows($req);
?>
<div class="card-header  text-white bubble-shadow" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/auteur/documentation/image_pfe/main_aute.jpg');">
    <!-- Pour décrire la conférence en cours-->
	<br><br>
	<h1 style="text-align:center;"><b> 
        <?php if ($n==0) {
            echo '<br><span style="color:red;">'."Aucune conférence n'existe pour l'instant".'</span>';
        }else{
             echo $w['titre_conf'];} ?>
    </b></h1>
</div>