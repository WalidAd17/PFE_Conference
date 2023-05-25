<?php session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Annuler une affectation</title>
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
							
							<h5 class="text-center">Annuler une affectation</h5>
							<hr>
							<br>
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
								if (isset($_POST['sub'])) {
									$pap = $_POST['aff'];
                                    

                                    $today = date("Y-m-d");
                                    $sql = "SELECT * FROM conference WHERE date_conference>'$today'";
                                    $req = mysqli_query($conn,$sql);
                                    $row = mysqli_fetch_array($req);
                                    $id = $row['id_conf'];


									$s = "SELECT * FROM evaluation WHERE id_pap = '$pap' AND id_conf='$id'";
									$r = mysqli_query($conn,$s);
									
	
									?>

									<form class="row g-3 needs-validation" method="post" action="supp_aff2.php">
										<div class="col-md-12">
											<div class="form-group form-group-default">
                                                <input style="opacity:0;" value="<?php echo $pap; ?>" name="pap">
                                                <label>Sélectionnez le reviewer</label>
												<select class="form-control" id="mem" name="mem">
													<?php 
													while ($w=mysqli_fetch_array($r)) { 
                                                          $mem = $w['id_mem'];
                                                          $ss = "SELECT * FROM membre WHERE idM='$mem'";
                                                          $rr = mysqli_query($conn , $ss);
                                                          $ww = mysqli_fetch_array($rr);
                                                          ?>
														<option value="<?php echo $ww['idM']; ?>">
															<?php
															echo $ww['nomM']." ".$ww['prenomM'];
															?>
														</option>	
													<?php } ?>
												</select>
											</div>
										</div>
								
		
										<table>
                                            <tr>
                                                <td style="padding:20px;">
                                                    <button style="margin-left:320px" class="btn btn-outline-danger me-1 mb-1" onClick="window.history.back();" type="button">
                                                        Retour
                                                    </button>
                                                </td>
                                                <td style="padding:20px;">
												<button style="margin-left:2px;" class="btn btn-outline-warning me-1 mb-1" type="submit" type="button" name="supp_aff">
													Valider l'annulation
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

if (isset($_POST['supp_aff'])) {
    $pap = $_POST['pap'];
	$mem = $_POST['mem']; //id membre

	$today = date("Y-m-d");
	$sql = "SELECT * FROM conference WHERE date_conference>'$today'";
	$req = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($req);
	$idc = $row['id_conf'];

	$a = "DELETE FROM evaluation WHERE id_conf='$idc' AND id_mem='$mem' AND id_pap='$pap'";
	$b = mysqli_query($conn,$a);

	
		if ($b){
			?>
			<script>
			var a = alert("Affectation annulée avec succès");
			window.location="mes_aff.php";

			</script>
			<?php

		} else {
		
			echo "Error: " . $a. mysqli_error($conn);
		
	
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