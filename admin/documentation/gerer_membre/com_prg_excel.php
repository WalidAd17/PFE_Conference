<?php 
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "pfe_conf";

     // Create connection 
     $conn = mysqli_connect($servername, $username, $password, $dbname);
     $conn->set_charset("UTF-8");

     // Check connection
     if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
     }


    $id = $_GET['s1'];
    $dateconf = $_GET['s2'];
    header("Content-Type:   application/vnd.ms-excel; charset=UTF-8"); // je veut un fichier excel
    header("Content-type:   application/x-msexcel; charset=UTF-8");
    header("Content-Disposition: attachment; charset=UTF-8; filename=comite_programme_du_conf_id°_:".$id."_le_".$dateconf.".xls");

    echo'<div align="center"><h3>  &nbsp;&nbsp;La comite du programme</h3></div>';

    $today = date("Y-m-d");
	$s = "SELECT * FROM conference WHERE date_conference>'$today'";
	$r = mysqli_query($conn,$s);
	$w=mysqli_fetch_array($r);

    $ss="SELECT * FROM com_prg WHERE id_conf='$id'";
	$rr=mysqli_query($conn,$ss);
    

    print '<table>';
?>

        <h2>Titre de la conference : </h2>
        <h3 style="color:red;"><?php echo $w['titre_conf'];?></h3>      
        
        
    <?php     


    print '<br>';
    print '<table border=1>';

?>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
		<th scope="col">Prenom</th>
		<th scope="col">Profession</th>
		<th scope="col">Email</th>
		<th scope="col">Telephone</th>
		<th scope="col">Theme</th>
    </tr>
    <?php   $cpt = 1; 
      while ($ww = mysqli_fetch_array($rr)) { 
        $mem = $ww['id_membre'];

        $sss = "SELECT * FROM membre WHERE idM='$mem'";
        $rrr = mysqli_query($conn,$sss);
        $www = mysqli_fetch_array($rrr);
        ?>
    <tr>
        <td> <?php echo $cpt;?></td>
        <td> <?php echo $www['nomM'];?></td>
		<td> <?php echo $www['prenomM'];?></td>
		<td> <?php echo $www['professionM'];?></td>
		<td> <?php echo $www['emailM'];?></td>
		<td> <?php echo $www['telM'];?></td>
		<td> <?php echo $www['type'];?></td>
    </tr>
    
    <?php 
     $cpt++; }    
    print '</TABLE>';
    print '<br>';    
?>