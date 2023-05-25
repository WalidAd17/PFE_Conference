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

							if ($n == 0) {
								?>
							
								<div class="row">
									<div class="card col-md-12" style="width: 18rem;">
									
										<div class="card-body">
											<h5  style="color:red;" class="card-title mb-2 fw-mediumbold"><span><img style="padding-bottom:2px;" src="image_pfe/attention.png">&nbsp;&nbsp;</span>Aucun papier n'est soumis</h5>
										</div>
									</div>					
								</div>
								<hr>
								<?php
							} else {
								?>

								<form class="row g-3 needs-validation" method="post" action="affecter_pap2.php">
									<div class="col-md-9">
										<div class="form-group form-group-default">
											<label>Sélectionnez le papier (Titre | Thème)</label>
											<select class="form-control" id="pap" name="pap">
												<?php 
												$today = date("Y-m-d");
												$sqll = "SELECT * FROM conference WHERE date_conference>'$today'";
												$reqq = mysqli_query($conn,$sqll);
												$roww=mysqli_fetch_array($reqq); 
												$id = $roww['id_conf'];

												$sql = "SELECT * FROM soumission WHERE id_conf='$id'";
												$req = mysqli_query($conn,$sql);


												while ($row=mysqli_fetch_array($req)) { 
													$idp = $row['id_papier'];
													$idt = $row['id_thm'];

													$aa = "SELECT * FROM evaluation WHERE id_pap='$idp' AND id_conf='$id'";
													$bb = mysqli_query($conn , $aa);
													$nn = mysqli_num_rows($bb);
													

													$a = "SELECT * FROM thematique WHERE id_t='$idt'";
													$b = mysqli_query($conn , $a);
													$c = mysqli_fetch_array($b);

													if ($nn < 3) {
													?>	
													<option value="<?php echo $row['id_papier'] ?>">
														<?php
														echo $row['titre_p'].'&nbsp;&nbsp;&nbsp;'." | ".'&nbsp;&nbsp;&nbsp;'.$c['nom_t'];
														?>
													</option>
													<?php
													}else{

													}
													?>

												
												
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<button style="margin-top:8px" class="btn btn-outline-primary me-1 mb-1" type="submit" type="button" name="thm">
											Voir les reviwers concernés
										</button>
									</div>
									
			
									
								</form>
								<br><hr><br>
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