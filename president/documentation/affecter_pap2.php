<?php session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Affectation des papiers soumis</title>
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
						$n = mysqli_num_rows($req);
						?>
						<?php include 'main.php';
                        ?>
						
						<div class="card-body">
							
							<h5 class="text-center">Affectation des papiers soumis</h5>
							<hr>
							
							<?php 
							$today = date("Y-m-d");
							$sql = "SELECT * FROM conference WHERE date_conference>'$today'";
							$req = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($req);

                            $id = $row['id_conf'];
                            $s = "SELECT * FROM soumission WHERE id_conf='$id'";
                            $r = mysqli_query($conn,$s);
                            $n = mysqli_num_rows($r);
							?>
							

							
							
                            <br>
							<?php
								if (isset($_POST['thm'])) {
									$pap = $_POST['pap'];
                                    

                                    $today = date("Y-m-d");
                                    $sql = "SELECT * FROM conference WHERE date_conference>'$today'";
                                    $req = mysqli_query($conn,$sql);
                                    $row = mysqli_fetch_array($req);
                                    $id = $row['id_conf'];


									$s = "SELECT * FROM soumission WHERE id_papier = '$pap' AND id_conf='$id'";
									$r = mysqli_query($conn,$s);
									$w = mysqli_fetch_array($r);

									$thm = $w['id_thm'];

                                    $titrep = $w['titre_p'];
									

									$ss = "SELECT * FROM thematique WHERE id_t='$thm' AND id_conf='$id'";
									$rr = mysqli_query($conn,$ss);
                                    $ww = mysqli_fetch_array($rr);

                                    $nom_thm = $ww['nom_t'];

                                    $sss = "SELECT * FROM com_prg WHERE id_conf='$id'";
									$rrr = mysqli_query($conn,$sss);
                                    
									?>

									<form class="row g-3 needs-validation" method="post" action="affecter_pap2.php">
										<div class="col-md-12">
											<div class="form-group form-group-default">
												<h6><b>Titre du papier | Son thème :</b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo '<b style="color:blue">'.$titrep.'</b>'.'&nbsp;&nbsp;'." | ".'&nbsp;&nbsp;'.'<b style="color:red">'.$nom_thm.'</b>'; ?> </h6><hr><h6><u><b>Les reviewers concernés par ce thème :</b></u></h6>
												<hr>
												<input type="text" value="<?php echo $pap;?>" style="opacity:0%" name="idp">
												<select class="form-control" id="aff" name="aff">
													<?php 
			
													while ($www=mysqli_fetch_array($rrr)) { 
													$mem = $www['id_membre'];
                                                    
													
                                                    $today = date("Y-m-d");
                                                    $sql = "SELECT * FROM conference WHERE date_conference>'$today'";
                                                    $req = mysqli_query($conn,$sql);
                                                    $row = mysqli_fetch_array($req);
                                                    $id = $row['id_conf'];

													

                                                    $aa = "SELECT * FROM evaluation WHERE id_conf = '$id' AND id_mem='$mem'";
													$bb = mysqli_query($conn,$aa);

													$nn = mysqli_num_rows($bb);
													if ($nn < 3) {
                                                        $a = "SELECT * FROM membre WHERE idM = '$mem'";
                                                        $b = mysqli_query($conn,$a);
                                                        $c = mysqli_fetch_array($b);
                                                        if ($c['type']==$nom_thm) {
                                                            ?>
														<option value="<?php echo $c['idM']; ?>">
															<?php
															echo $c['nomM']." ".$c['prenomM'];
															?>
														</option>
														<?php
                                                        }
														
													}else{
														?>
														<script>
														var a = alert("Vous ne pouvvez plus affecter ce papier car il a été déja affecté à 3 reviewers");
														window.location="affecter_pap.php";

														</script>
														<?php
													}
													?>
													
													<?php } ?>
												</select>
											</div>
										</div>
								
		
										<table style="margin:0; position: relative; top:40px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
                                            <tr>
                                                <td style="padding:20px;">
                                                    <button style="" class="btn btn-outline-danger me-1 mb-1" onClick="window.history.back();" type="button">
                                                        Retour
                                                    </button>
                                                </td>
                                                <td style="padding:20px;">
												<button style="margin-left:2px;" class="btn btn-outline-success me-1 mb-1" type="submit" type="button" name="aff_pap">
													Valider
												</button>
                                                </td>
                                            </tr>
                                        </table>
										
										
									</form>
                                    <br><br>
									<?php
									
								}
							?>
								
                            	
							
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

if (isset($_POST['aff_pap'])) {
	$aff = $_POST['aff']; //id membre
	$idp = $_POST['idp']; //id papier

	$today = date("Y-m-d");
	$sql = "SELECT * FROM conference WHERE date_conference>'$today'";
	$req = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($req);
	$idc = $row['id_conf'];

	$a = "SELECT * FROM evaluation WHERE id_conf='$idc' AND id_mem='$aff' AND id_pap='$idp'";
	$b = mysqli_query($conn,$a);
	$n = mysqli_num_rows($b);

	if ($n == 0) {
		$test = "INSERT INTO evaluation(id_mem , id_pap, id_conf) VALUES ('$aff', '$idp' , '$idc')";
		$testr = mysqli_query($conn,$test);
		if ($testr){
			?>
			<script>
			var a = alert("Papier affecté avec succès");
			window.location="affecter_pap.php";

			</script>
			<?php

		} else {
		
			echo "Error: " . $test. mysqli_error($conn);
		
	
		}
	}else{
		?>
			<script>
			var a = alert("Ce papier a été déja affecté a ce reviewer!");
			window.location="affecter_pap.php";
			</script>
			<?php
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