<?php session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Gérer comité de pogramme</title>
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

	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/css/atlantis.min.css">
	<link href="../assets/styles.css" rel="stylesheet" />
	<link href="../assets/prism.css" rel="stylesheet" />
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
					<?php include 'main.php';
                        ?>
						<div class="card-body">
							<h5 style="text-align:center;">Ajouter un membre à la comité d'organisation</h5><hr>
							<br>
							<form class="row g-3 needs-validation" method="post" action="gerer_com_org.php">
								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Choisissez le membre</label>
										<select class="form-control" id="theme" name="mem">
											<?php 
											$today = date("Y-m-d");
											$sqll = "SELECT * FROM conference WHERE date_conference>'$today'";
											$reqq = mysqli_query($conn,$sqll);
											$roww=mysqli_fetch_array($reqq); 
											$id = $roww['id_conf'];

											$type= "Organisateur";
											$sql = "SELECT * FROM membre WHERE type='$type'";
											$req = mysqli_query($conn,$sql);

											while($row=mysqli_fetch_array($req)){
											
												$mem = $row['idM'];

												$a = "SELECT * FROM com_org WHERE id_membre = '$mem' AND id_conf='$id'";
												$b = mysqli_query($conn,$a);
												$nn = mysqli_num_rows($b);
												if ($nn == 0) {
												?>
													<option value="<?php echo $row['idM'] ?>">
														<?php
														echo $row['nomM']." ".$row['prenomM'];
														?>
													</option>
													<?php
												}else{
														
												}
											}
											
											?>
										
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<button style="margin:0; position: relative; top:30px;  left: 219%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);" class="btn btn-outline-success me-1 mb-1" type="submit" type="button" name="ajt_mem">
										Ajouter
									</button>
								</div>
								
		
                                
                        	</form>

							

								
								<br><br>
								<hr><hr>
								<br><br>
								
								<h5 style="text-align:center;">Supprimer un organisateur</h5>
								<form class="row g-3 needs-validation" novalidate="" method="post" action="gerer_com_org.php">
                                
									<div class="col-md-12">
										<div class="form-group form-group-default">
											<label>Choisissez</label>
											<?php
												$today = date("Y-m-d");
												$sql = "SELECT * FROM conference WHERE date_conference>'$today'";
												$req = mysqli_query($conn,$sql);
												$row = mysqli_fetch_array($req);
												$id = $row['id_conf'];
												
												$ss = "SELECT * FROM com_org WHERE id_conf='$id'";
												$rr = mysqli_query($conn,$ss);?>
												<select class="form-control" id="theme" name="mems">
													<?php 
													while ($ww = mysqli_fetch_array($rr)) {
														$mem = $ww['id_membre'];
														$sss = "SELECT * FROM membre WHERE idM='$mem'";
														$rrr = mysqli_query($conn,$sss);
														$www = mysqli_fetch_array($rrr);
														?>
														<option value="<?php echo $www['idM'] ?>">
															<?php
															echo $www['nomM']." ".$www['prenomM'].'&nbsp;&nbsp;&nbsp;'." [".$www['type']."]";
															?>
														</option>												<?php
													}
													?>
												</select>
												
										</div>
									</div>

									<button style="margin:0; position: relative; top:30px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);" class="btn btn-outline-danger me-1 mb-1" type="submit" type="button" name="sup_mem">
										Supprimer
									</button>
									
								</form>
								<hr>
						</div>

					</div>			
				</div>
			</div>
		</div>
	</div>

</div>
</div>
</div>

<?php

if (isset($_POST['ajt_mem'])) {
	$id = $_POST['mem'];

	$today = date("Y-m-d");
	$sql = "SELECT * FROM conference WHERE date_conference>'$today'";
	$req = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($req);
	$idc = $row['id_conf'];

	$test = "INSERT INTO com_org(id_membre , id_conf) VALUES ('$id','$idc')";
	$testr = mysqli_query($conn,$test);
	?>
			<script>
			var a = alert("Organisateur ajouté avec succès");
			window.location="afficher_com_org.php";
			</script>
			<?php
}

if (isset($_POST['sup_mem'])) {
	$mems = $_POST['mems'];

	$today = date("Y-m-d");
	$sql = "SELECT * FROM conference WHERE date_conference>'$today'";
	$req = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($req);
	$idc = $row['id_conf'];

	$sql = "DELETE FROM com_org WHERE id_membre='$mems' AND id_conf='$idc'";
	$req = mysqli_query($conn, $sql);

	if ($req){
		?>
	<script>
	var a = alert("Organisateur supprimé avec succès");
	window.location="afficher_com_org.php";

	</script>
	<?php

	} else {
	
		echo "Error: " . $sql. mysqli_error($conn);
		
	  
	   
  
	}
	
	
}



?>

</body>
<script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
<script src="../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<script src="../../assets/js/core/popper.min.js"></script>
<script src="../../assets/js/core/bootstrap.min.js"></script>
<script src="../../assets/js/plugin/chart.js/chart.min.js"></script>
<script src="../../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="../../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script type="text/javascript" src="../../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script type="text/javascript" src="../../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js" charset="utf-8"></script>
<script src="../../assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="../../assets/js/atlantis.min.js"></script>
<script src="../assets/prism.js"></script>
<script src="../assets/prism-normalize-whitespace.min.js"></script>
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