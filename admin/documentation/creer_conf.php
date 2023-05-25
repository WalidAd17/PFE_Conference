<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Administrateur - créer conférence</title>
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
						include 'main.php';
						?>
						<div class="card-body">
						<?php
							$today = date("Y-m-d");
                            $sql = "SELECT * FROM conference WHERE date_conference>'$today'";
                            $req = mysqli_query($conn,$sql);
                            $w = mysqli_fetch_array($req);
							$n = mysqli_num_rows($req);

							if ($n != 0) {
								?>

								<hr>
								
							
								<?php
								echo '<h2 style="text-align:center;">'."Vous ne pouvez pas créer une conférencec pour l'instant car il existe déja une conférence en cours qui est : ".'<br><br><span style="color:red;">'.$w['titre_conf'].'</span>'.'</h2>';

							}else{
								?>
								<h5 style="text-align:center;">Créer une conférence</h5>
								<hr>
								<form class="row g-3 needs-validation" method="post" action="creer_conf.php">
								
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" name="titre" class="form-control input-solid" id="solidInput" placeholder="Titre de la conférence" required="" />
											<div class="invalid-feedback">Saisissez un titre SVP!</div>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">Description de la conférence</span>
												</div>
												<textarea class="form-control" name="description" rows="5" aria-label="With textarea" required=""></textarea>
											</div>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<input type="text" name="lieu" class="form-control input-solid" id="solidInput" placeholder="Lieu de la conférence" required="" />
											<div class="invalid-feedback">Saisissez un lieu SVP!</div>
										</div>
									</div>

							
									<div class="col-md-6">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">Date de soumission</span>
												</div>
												<input id="Name" name="dates" type="date" class="form-control" required="" />
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">Date d'évaluation</span>
												</div>
												<input id="Name" name="datev" type="date" class="form-control" required="" />
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">Date de décision</span>
												</div>
												<input id="Name" name="dated" type="date" class="form-control" required="" />
											</div>
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">Date de conférence</span>
												</div>
												<input id="Name" name="datec" type="date" class="form-control" required="" />
											</div>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">Nombre maximum de personnes</span>
												</div>
												<input id="Name" name="invites" type="number" class="form-control" required="" />
												<div class="input-group-prepend">
													<span class="input-group-text">personnes</span>
												</div>
											</div>
										</div>
									</div>
									
									
									<div class="col-6">
										<div class="form-group">
											<div class="input-group mb-3">
												<input type="text" name="insc_aut" class="form-control" placeholder="Prix d'inscription d'auteur" aria-label="Username" aria-describedby="basic-addon1" required="" />
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">DA</span></span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div class="input-group mb-3">
												<input type="text" name="insc_part" class="form-control" placeholder="Prix d'inscription d'auditeur" aria-label="Username" aria-describedby="basic-addon1" required="" />
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">DA</span>
												</div>
											</div>
										</div>
									</div>
									

									
									<button style="margin:0; position: relative; top:20px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);" class="btn btn-outline-success me-1 mb-1" type="submit" type="button" name="sub">
										Créer la conférence
									</button>
									
								</form>
								<?php
							
							}
                           
                            ?>
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
	if (isset($_POST['sub'])) {
		
		$titre = ucfirst(strtolower($_POST['titre']));
		$desc = ucfirst(strtolower($_POST['desc']));
		$lieu = strtoupper($_POST['lieu']);
		$dates = $_POST['dates'];
		$datev = $_POST['datev'];
		$dated = $_POST['dated'];
		$datec = $_POST['datec'];
		$invites = $_POST['invites'];
		$insc_aut = $_POST['insc_aut'];
		$insc_part = $_POST['insc_part'];

		if ($dates < $datev) {
			if ($dates < $dated) {
				if ($dates < $datec) {
					if ($datev < $dated) {
						if ($datev < $datec) {
							if ($dated < $datec) {
								
								$a = "INSERT INTO conference(titre_conf , desc_conf , lieu_conf , date_soumission , date_evaluation , date_decision , date_conference , nb_invites , tarif_auteur , tarif_auditeur) VALUES ('$titre','$desc','$lieu','$dates','$datev','$dated','$datec','$invites','$insc_aut','$insc_part')";
								$b = mysqli_query($conn , $a);

								if ($b){
									?>
									<script>
										var a = alert("Conférence crée avec succès");
										window.location="index.php";
									</script>
									<?php
						
								} else {
									echo "Error: " . $a. mysqli_error($conn);
								}
								
								
							} else {
								?>
								<script>
									let a = alert("La date de décision doit être moin que la date de conférence");
								</script>
								<?php
							}
						} else {
							?>
							<script>
								let a = alert("La date d'évaluation doit être moin que la date de conférence");
							</script>
							<?php
						}
					} else {
						?>
						<script>
							let a = alert("La date d'évaluation doit être moin que la date de décision");
						</script>
						<?php
					}
				}else{
					?>
					<script>
						let a = alert("La date de soumission doit être moin que la date de conférence");
					</script>
					<?php
				}
			}else{
				?>
				<script>
					let a = alert("La date de soumission doit être moin que la date de décision");
				</script>
				<?php
			}
		}else{
			?>
			<script>
				let a = alert("La date de soumission doit être moin que la date d'évaluation");
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