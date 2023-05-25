<?php session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Administrateur</title>
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
								echo '<h2 style="text-align:center;">'."Créez une conférence...".'</h2>';
							}else{
							?>
							
							
							<h5 class="mb-0  position-relative"><img src="image_pfe/salut.png" style="padding-bottom:5px;">&nbsp;&nbsp;<span style="color:black;">Salut</span>&nbsp;<span class="bg-200 dark__bg-1100 pe-3 text-primary"> <?php echo $_SESSION['nom']." ".$_SESSION['prenom'];?></span></h5>
							<hr><hr>
							<h5 class="mb-0 text-primary position-relative"><i class="fas fa-play"></i>&nbsp;&nbsp;<span class="bg-200 dark__bg-1100 pe-3">Les statistiques & informations générales</span></h5>
							<br>
							<div class="row">
								<div class="card col-md-6" style="width: 18rem;">
									<?php
									$today = date("Y-m-d");
									$sql = "SELECT * FROM conference WHERE date_conference>'$today'";
									$req = mysqli_query($conn,$sql);

									$row = mysqli_fetch_array($req);
									$nbmax = $row['nb_invites'];
									?>
									<div class="card-body">
										<h5 class="card-title mb-2 fw-mediumbold">Nombre maximum de personnes</h5>
										<h5 class="btn btn-warning"><b><?php echo $nbmax." personnes";?></b></h5>
									</div>
								</div>
								
								<div class="card col-md-6" style="width: 18rem;">
								<?php
								$today = date("Y-m-d");
								$sql = "SELECT * FROM conference WHERE date_conference>'$today'";
								$req = mysqli_query($conn,$sql);
								$row=mysqli_fetch_array($req);
								$id=$row['id_conf'];

								$sql2="SELECT * FROM thematique WHERE id_conf='$id'";
								$req2=mysqli_query($conn,$sql2);
								$n2=mysqli_num_rows($req2);
								?>
									<div class="card-body">
										<h5 class="card-title mb-2 fw-mediumbold">Nombre de thème</h5>
										<h5 class="btn btn-info"><b><?php echo $n2." thèmes";?></b></h5>
									</div>
								</div>
								
							</div>

							<div class="row">
								
								<div class="card col-md-6" style="width: 18rem;">
								<?php
								$today = date("Y-m-d");
								$sql = "SELECT * FROM conference WHERE date_conference>'$today'";
								$req = mysqli_query($conn,$sql);
								$row=mysqli_fetch_array($req);
								$id=$row['id_conf'];

								$s="SELECT * FROM inscription_auteur WHERE id_conf='id'";
								$r=mysqli_query($conn,$s);
								$m=mysqli_num_rows($r);
								?>
									<div class="card-body">
										<h5 class="card-title mb-2 fw-mediumbold">Nombre d'auteur inscrit</h5>
										<h5 class="btn btn-success"><b><?php echo $m." auteurs";?></b></h5>
									</div>
								</div>
								<div class="card col-md-6" style="width: 18rem;">
								<?php
								$today = date("Y-m-d");
								$sql = "SELECT * FROM conference WHERE date_conference>'$today'";
								$req = mysqli_query($conn,$sql);
								$row=mysqli_fetch_array($req);
								$id=$row['id_conf'];

								$sql1="SELECT * FROM inscription_utilisateur WHERE id_conf='$id'";
								$req1=mysqli_query($conn,$sql1);
								$n1=mysqli_num_rows($req1);
								?>
									<div class="card-body">
										<h5 class="card-title mb-2 fw-mediumbold">Nombre de participant inscrit</h5>
										<h5 class="btn btn-success"><b><?php echo $n1." personnes";?></b></h5>
									</div>
								</div>
								
								
							</div>

							<hr><hr><br>
							<?php 
							$today = date("Y-m-d");
							$sql = "SELECT * FROM conference WHERE date_conference>'$today'";
							$req = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($req);

							$a="SELECT * FROM president WHERE idConf='$id'";
							$b=mysqli_query($conn , $a);
							$n1 = mysqli_num_rows($b);
							if ($n1<>0) {
								$c = mysqli_fetch_array($b);
								$mem = $c['id_membre'];

								$aa="SELECT * FROM membre WHERE idM='$mem'";
								$bb=mysqli_query($conn , $aa);
								$cc = mysqli_fetch_array($bb);
							}else{
								$temp ="Pas encore désigné";
							}
							

							
							?>
							<table class="table table-striped" >
								<tbody>
									<tr>
										<th style="font-size:17px; width:250px;">Le président des comités : </th>
										<th style="font-size:15px; color:black;"><?php if($n1 == 0){echo '<b style="color:red;">'.$temp.'</b>';}else{echo $cc['nomM']." ".$cc['prenomM'];} ?></th>
									</tr>
									
								</tbody>
							</table>
							<hr>
							<table class="table table-striped" id="conf">
								<tbody>
									
									<tr>
										<th style="font-size:17px; width:310px;">La conférence : </th>
										<th style="font-size:15px; color:black;"><?php echo $row['titre_conf'] ;?></th>
									</tr>
									<tr>
										<th style="font-size:17px;">Description : </th>
										<th style="font-size:15px; color:black;"><?php echo $row['desc_conf'] ;?></th>
									</tr>
									
									<tr>
										<th style="font-size:17px;">Lieu de la conférence : </th>
										<th style="font-size:15px; color:red;"><?php echo $row['lieu_conf'];?></th>
									</tr>
									<tr>
										<th style="font-size:17px;">Le nombre maximum d'inscription à la conférence : </th>
										<th style="font-size:15px; color:red;"><?php echo $row['nb_invites']." personnes";?></th>
									</tr>
								</tbody>
							</table>
							<hr>
							<table class="table table-striped" >
								<tbody>
									<tr>
										<th style="font-size:17px; width:250px;">Date de soumission : </th>
										<th style="font-size:15px; color:blue;"><?php echo "Le ".date('d-m-Y ', strtotime($row['date_soumission']));?></th>
									</tr>
									<tr>
										<th style="font-size:17px;">Date d'évaluation : </th>
										<th style="font-size:15px; color:blue;"><?php echo "Le ".date('d-m-Y ', strtotime($row['date_evaluation']));?></th>
									</tr>
									<tr>
										<th style="font-size:17px;">Date de decision : </th>
										<th style="font-size:15px; color:blue;"><?php echo "Le ".date('d-m-Y ', strtotime($row['date_decision']));?></th>
									</tr>
									<tr>
										<th style="font-size:17px;">Date de conférence : </th>
										<th style="font-size:15px; color:red;"><?php echo "Le ".date('d-m-Y ', strtotime($row['date_conference']));?></th>
									</tr>

								</tbody>
							</table>
							
							
						</div>
						<?php }
						?>
					</div>			
				</div>
			</div>
		</div>
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