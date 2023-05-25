<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Nos réservations</title>
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
                        
					<?php include 'main.php'; ?>
						<div class="card-body">
                            <h5 style="text-align:center;">Nos réservation</h5>
							<hr>
                            
                            <?php
								$today = date("Y-m-d");
								$s = "SELECT * FROM conference WHERE date_conference>'$today'";
								$r = mysqli_query($conn,$s);
								$w=mysqli_fetch_array($r);
								$m = mysqli_num_rows($r);

								if ($m == 0) {
									echo '<h2 style="text-align:center; color:red;">'."Il n'existe aucune conférence - Créez une et voir ses comités".'</h2>';
								}else{?>


									<?php
									$today = date("Y-m-d");
									$s = "SELECT * FROM conference WHERE date_conference>'$today'";
									$r = mysqli_query($conn,$s);
									$w=mysqli_fetch_array($r);

									$id=$w['id_conf'];

									$ss="SELECT * FROM hotel WHERE id_conf='$id'";
									$rr=mysqli_query($conn,$ss);
									$nb = mysqli_num_rows($rr);
									?>
									<h6>
										<b>
											<u>Réservation d'hôtels :</u> &nbsp;&nbsp;
										</b> 
										<?php 
										if($nb==0){
											echo '<b style="color:red;">'." Aucun hôtels n'est encore réservé ".'</b>';
										}else{
                                            if ($nb == 1) {
                                                echo '<b style="color:green;">'.$nb." hôtel réservé".'</b>';
                                            }else{
                                                echo '<b style="color:green;">'.$nb." hôtels réservés".'</b>';
                                            }
											
										} 
										?>
									</h6>

									<table class="table table-striped">
										<thead>
											<tr>
                                                <th scope="col"></th>
												<th scope="col">Nom d'hôtel</th>
												<th scope="col">Adresse d'hôtel</th>
												<th scope="col">Prix total de la réservation</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$today = date("Y-m-d");
												$s = "SELECT * FROM conference WHERE date_conference>'$today'";
												$r = mysqli_query($conn,$s);
												$w=mysqli_fetch_array($r);

												$id=$w['id_conf'];

												$ss="SELECT * FROM hotel WHERE id_conf='$id'";
												$rr=mysqli_query($conn,$ss);

                                                $cpt = 1;
												while ($ww = mysqli_fetch_array($rr)) {
													?>
													<tr>
                                                        <td> <?php echo $cpt;?></td>
														<td> <?php echo $ww['nom_h'];?></td>
														<td> <?php echo $ww['adresse_h'];?></td>
														<td> <?php echo $ww['prix_h']." DA";?></td>
														

													</tr>
													<?php
													$cpt++;
												}
										
												
											?>
										</tbody>
									</table>



									<br><hr><hr>
									<?php
									$today = date("Y-m-d");
									$s = "SELECT * FROM conference WHERE date_conference>'$today'";
									$r = mysqli_query($conn,$s);
									$w=mysqli_fetch_array($r);

									$id=$w['id_conf'];

									$ss="SELECT * FROM amphi WHERE id_conf='$id'";
									$rr=mysqli_query($conn,$ss);
									$nb = mysqli_num_rows($rr);
									?>
									<h6>
										<b>
											<u>Réservation d'amphithéâtres :</u> &nbsp;&nbsp;
										</b> 
										<?php 
										if($nb==0){
											echo '<b style="color:red;">'." Aucun amphithéâtre n'est encore réservé ".'</b>';
										}else{
                                            if ($nb == 1) {
                                                echo '<b style="color:green;">'.$nb." amphithéâtre réservé".'</b>';
                                            }else{
                                                echo '<b style="color:green;">'.$nb." amphithéâtres réservé".'</b>';
                                            }
										} 
										?>
									</h6>

									<table class="table table-striped">
										<thead>
											<tr>
                                                <th scope="col"></th>
												<th scope="col">Nom de l'amphithéâtre</th>
												<th scope="col">Description de l'amphithéâtre</th>
												<th scope="col">Capacité</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$today = date("Y-m-d");
												$s = "SELECT * FROM conference WHERE date_conference>'$today'";
												$r = mysqli_query($conn,$s);
												$w=mysqli_fetch_array($r);

												$id=$w['id_conf'];

												$ss="SELECT * FROM amphi WHERE id_conf='$id'";
												$rr=mysqli_query($conn,$ss);

                                                $cpt = 1;
												while ($ww = mysqli_fetch_array($rr)) {
													
													?>
													<tr>
                                                        <td> <?php echo $cpt;?></td>
														<td> <?php echo $ww['nom_amphi'];?></td>
														<td> <?php echo $ww['desc_amphi'];?></td>
														<td> <?php echo $ww['capacite_amphi']." personnes";?></td>
										
													</tr>
													<?php
													$cpt++;
												}
										
												
											?>
										</tbody>
									</table>

								
								
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