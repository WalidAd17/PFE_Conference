<?php session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Évaluation des papiers</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="" type="image/x-icon"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">
	<link href="assets/styles.css" rel="stylesheet" />
	<link href="assets/prism.css" rel="stylesheet" />
</head>
<body>

	<div class="wrapper">
		<?php
			include 'conn_bd.php';
			include 'header.php';
		?>
		
		<?php
			include 'sidebar.php';
		?>
		<div class="main-panel">
			<div class="content content-documentation">
				<div class="container-fluid">
					<div class="card card-documentation">
					<?php
						$today = date("Y-m-d");
						$sql = "SELECT * FROM conference WHERE date_conference>'$today'";
						$req = mysqli_query($conn,$sql);
						$row = mysqli_fetch_array($req);
						$n = mysqli_num_rows($req);
						?>
						<?php include 'main.php';
                        ?>
						
						<div class="card-body">
                            <h5 class="text-center">Les papiers affectés</h5>
                            <hr>
                            <?php 
							$today = date("Y-m-d");
							$sql = "SELECT * FROM conference WHERE date_conference>'$today'";
							$req = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($req);
                            $id = $row['id_conf'];

                            $mem = $_SESSION['idM'];
                            $s = "SELECT * FROM evaluation WHERE id_conf='$id' AND id_mem='$mem'";
                            $r = mysqli_query($conn,$s);
                            $m = mysqli_num_rows($r);
							?>
							

							
							
                            <div class="row">
								<div class="card col-md-12" style="width: 18rem;">
								
									<div class="card-body">
                                        <table>
                                            <tr>
                                                <td><h5 class="card-title mb-2 fw-mediumbold">Nombre total des papiers qui vous ont été affecté pour cette conférence :</h5></td>
                                                <td style="padding-top:10px;padding-left:30px;"><h5 class="btn btn-success"><b><?php echo $m." papiers";?></b></h5></td>
                                            </tr>
                                        </table>
										
										
									</div>
                                   
                                </div>					
							</div>
                           

                            <div class="row">
								<div class="card col-md-12" style="width: 18rem;">
								
                                    <div class="card-body">
                                        <h5 class="card-title mb-2 fw-mediumbold"><span style="color:red;"><img style="padding-bottom:2px;" src="image_pfe/attention.png">&nbsp;&nbsp;Note importante : </span> Si vous valider votre évaluation vous ne pouvez pas la modifier.</h5>
                                    </div>
                                </div>					
							</div>

							<hr>
                            <div class="row">
                                
                                <?php
                                $mem = $_SESSION['idM'];

                                $a = "SELECT * FROM evaluation WHERE id_conf='$id' AND id_mem='$mem'";
                                $b = mysqli_query($conn , $a);

                               
                               
                                while ($c = mysqli_fetch_array($b)) {
                                    $papier = $c['id_pap'];

                                    $s = "SELECT * FROM soumission WHERE id_conf='$id' AND id_papier='$papier'";
                                    $r = mysqli_query($conn,$s);
                                    $w = mysqli_fetch_array($r);
                                ?>
								<div class="card col-md-6" style="width: 18rem;">
                                    <br>
									<div class="card-body" style="background-color:#ccffff;">
                                    <h6 class="card-title mb-2 fw-mediumbold"><span style="color:black; font-weight:bold;"><u>Titre du papier :</u>&nbsp;&nbsp;</span><?php echo '<span style="color:red;">'.$w['titre_p'].'</span>'; ?></h6>
										<hr>
                                        <?php
                                        $ida = $w['id_aut'];

                                        $ss = "SELECT * FROM auteur WHERE id_a='$ida'";
                                        $rr = mysqli_query($conn,$ss);
                                        $ww= mysqli_fetch_array($rr);
                                        ?>
                                        <h6 style="text-align:center; color:black; font-size:16px; font-weight:bolder;"><u><i>Les informations de l'auteur</i></u></h6>
                                        <ul>
                                            <li style="margin-top:5px; margin-bottom:5px;"><span style="color:black; font-weight:bold;">Nom & Prénom :</span> <?php echo $ww['nom_a']." ".$ww['prenom_a']; ?> </li>
											<li style="margin-top:5px; margin-bottom:5px;"><span style="color:black; font-weight:bold;">Email:</span> <?php echo $ww['email_a']; ?> </li>
											<li style="margin-top:5px; margin-bottom:5px;"><span style="color:black; font-weight:bold;">N° téléphone :</span> <?php echo $ww['tel_a']; ?> </li>
										</ul>
										<hr>
                                        
                                        <h6 style="text-align:center; color:black; font-size:16px; font-weight:bolder;"><u><i>Les informations du papier</i></u></h6>
										<ul>
											<li style="margin-top:5px; margin-bottom:5px;"><span style="color:black; font-weight:bold;">Co-auteurs :</span> <?php echo $w['co_auteurs']; ?> </li>
                                            <li style="margin-top:5px; margin-bottom:5px;"><span style="color:black; font-weight:bold;">Mots clés :</span> <?php echo $w['mots_cle_p']; ?> </li>
                                            <li style="margin-top:5px; margin-bottom:5px;"><span style="color:black; font-weight:bold;">Résumé du papier :</span> <?php echo $w['resume_p']; ?> </li>
                                            

                                            
                                            <form method="post" action="pap_soum_generer.php">
                                                <input name="chemin" type="text" value="<?php echo $w['chemin'];?>" style="opacity:0%;" >
                                                <input name="nom" type="text" value="<?php echo $w['nom_pap'];?>" style="opacity:0%;" >
                                                <input name="noma" type="text" value="<?php echo $ww['nom_a'];?>" style="opacity:0%;" >
                                                <input name="prenoma" type="text" value="<?php echo $ww['prenom_a'];?>" style="opacity:0%;" >
                                        
                                                <button style="margin-top:5px; margin-left:125px;" class="btn btn-outline-success me-1 mb-1" type="submit" name="pap">
                                                    Ouvrir le papier
                                                </button>
                                            </form>
                                         
                                        </ul>
										<hr><hr>
                                        <?php
                                        $mem = $_SESSION['idM'];

                                        $test = "SELECT * FROM evaluation WHERE id_conf='$id' AND id_mem='$mem' AND id_pap='$papier'";
                                        $testt = mysqli_query($conn , $test);
                                        $testr = mysqli_fetch_array($testt);

                                        $etat = $testr['etat'];
                                        if ($etat == NULL) {
                                            ?>
                                            <form class="row g-3 needs-validation" method="post" action="evaluer_pap.php">
                                                <input type="text" value="<?php echo $papier; ?>" style="opacity:0%;" name="papier">

                                                <table>
                                                    <tr>
                                                        <td style="padding-left:140px;"><label><b>Votre évaluation : </b></label></td>
                                                        <td style="padding-left:15px; padding-top:5px;">
                                                            <select class="form-control" name="etatp">
                                                                <option value="1">Accetpé</option>
                                                                <option value="0">Refusé</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </table>
                                                
                                                <br>
                                                <br>
                                        
                                                <button style="margin-top:10px; margin-left:95px;" class="btn btn-outline-primary me-1 mb-1" type="submit" name="eva_pap">
                                                    Valider
                                                </button>
                                            </form>

                                            <?php
                                        }else{
                                            if ($etat == 0) {        
                                            ?>
                                                 <table>
                                                    <tr>
                                                        <td style="padding-left:140px;"> <h6><b>État donné : </b></h6></td>
                                                        <td style="padding-left:15px; padding-top:5px;"><h5 class="btn btn-danger">Refusé</h5></td>
                                                    </tr>
                                                </table>
                                               

                                            <?php
                                            }else{
                                                ?>
                                                <table>
                                                    <tr>
                                                        <td style="padding-left:140px;"> <h6><b>État donné : </b></h6></td>
                                                        <td style="padding-left:15px; padding-top:5px;"><h5 class="btn btn-success">Accépté</h5></td>
                                                    </tr>
                                                </table>

                                                <?php
                                            }
                                        }
                                        ?>
                                        
                                        
									</div>
                                    <br>
                                    
								</div>		
                                <?php } ?>		
							</div>
							
						</div>
						
					</div>			
				</div>
			</div>
		</div>px;
	</div>

</div>
</div>
</div>

<?php

if (isset($_POST['eva_pap'])) {
    $etat = $_POST['etatp'];
    $mem = $_SESSION['idM'];
    $papier = $_POST['papier'];

    $today = date("Y-m-d");
	$sql = "SELECT * FROM conference WHERE date_conference>'$today'";
	$req = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($req);
    $id = $row['id_conf'];

    $sqll = "UPDATE evaluation SET etat ='$etat' WHERE id_conf='$id' AND id_mem='$mem' AND id_pap='$papier'";
    $reqq = mysqli_query($conn , $sqll);
    if ($reqq){
		?>
	<script>
	var a = alert("Évaluation sauvegardée !");
    window.location="index.php";

	</script>
	<?php

	} else {
	
		echo "Error: " . $sqll. mysqli_error($conn);
	
	}
}

?>
</body>
<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugin/chart.js/chart.min.js"></script>
<script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script type="text/javascript" src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script type="text/javascript" src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js" charset="utf-8"></script>
<script src="../assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="../assets/js/atlantis.min.js"></script>
<script src="assets/prism.js"></script>
<script src="assets/prism-normalize-whitespace.min.js"></script>
<script type="text/javascript">
	// Optional
	Prism.plugins.NormalizeWhitespace.setDefaults({
		'remove-trailing': true,
		'remove-indent': true,
		'left-trim': true,
		'right-trim': true,
	});
	
	// handle links with @href started with '#' only
	$(document).on('click', 'a[href^="#"]', function(e) {
		// target element id
		var id = $(this).attr('href');

		// target element
		var $id = $(id);
		if ($id.length === 0) {
			return;
		}

		// prevent standard hash navigation (avoid blinking in IE)
		e.preventDefault();

		// top position relative to the document
		var pos = $id.offset().top - 80;

		// animated top scrolling
		$('body, html').animate({scrollTop: pos});
	});
</script>
</html>