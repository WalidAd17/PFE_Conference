<?php session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Compte président des comités</title>
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
							<?php
							if ($n == 0) {
								echo '<h2 style="text-align:center;">'."Salut".$_SESSION['nomM']." ".$_SESSION['prenomM']."! Il n y a pas de conférence en cours ".'</h2>';
							}else{
							?>
							<h5 class="mb-0  position-relative"><img src="image_pfe/salut.png" style="padding-bottom:5px;">&nbsp;&nbsp;<span style="color:black;">Salut</span>&nbsp;<span class="bg-200 dark__bg-1100 pe-3 text-primary"> <?php echo $_SESSION['nomM']." ".$_SESSION['prenomM'];?></span></h5>
							<h5 class="mb-0 position-relative" style="color:red;"><img src="image_pfe/star.png" style="padding-bottom:5px;">&nbsp;&nbsp;Vous êtes le président des comités de la conférence en cours</h5>
							<hr><hr>
							
							<?php 
							$today = date("Y-m-d");
							$sql = "SELECT * FROM conference WHERE date_conference>'$today'";
							$req = mysqli_query($conn,$sql);
								$row = mysqli_fetch_array($req);
							?>
							<table class="table table-striped" >
								<tbody>
									<tr>
										<th style="font-size:17px; width:250px;">La conférence : </th>
										<th style="font-size:15px; color:black;"><?php echo $row['titre_conf'] ;?></th>
									</tr>
									<tr>
										<th style="font-size:17px;">Description : </th>
										<th style="font-size:15px; color:black;"><?php echo $row['desc_conf'] ;?></th>
									</tr>
									
									<tr>
										<th style="font-size:17px;">Date de soumission : </th>
										<th style="font-size:15px; color:red;"><?php echo "Le ".date('d-m-Y ', strtotime($row['date_soumission']));?></th>
									</tr>
									<tr>
										<th style="font-size:17px;">Date de conférence : </th>
										<th style="font-size:15px; color:blue;"><?php echo "Le ".date('d-m-Y ', strtotime($row['date_conference']));?></th>
									</tr>
								</tbody>
							</table>

							<hr><hr>
							
							<div class="row">
								<div class="card col-md-12" style="width: 18rem;">
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
									<div class="card-body">
										<h5 class="card-title mb-2 fw-mediumbold">Nombre de papier soumis : &nbsp;<b style="color:red;"><?php echo $n." papiers";?></b></h5>
										<a href="papier_soumis.php"><h5 class="btn btn-primary">Voir en détails</h5></a>
										
									</div>
								</div>
								
								
							</div>
							
						</div>
						<?php }
						?>
					</div>			
				</div>
			</div>
		</div>px;
	</div>

</div>
</div>
</div>
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