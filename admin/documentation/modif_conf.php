<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Modifier conférence</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="" type="image/x-icon"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF8" />

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
                            $row = mysqli_fetch_array($req);

							
								?>
								<h5 style="text-align:center;">Modifier la conférence</h5>
								<hr>
								<form class="row g-3 needs-validation" method="post" action="modif_conf.php">
								
									<div class="col-md-12">
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
													<span class="input-group-text">Titre de la conférence</span>
												</div>
											    <input type="text" name="titre" class="form-control" id="solidInput" value="<?php echo $row['titre_conf']; ?>" required="" />
                                            </div>
                                        </div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">Description de la conférence</span>
												</div>
												<input class="form-control" name="description" rows="5" aria-label="With textarea" value="<?php echo $row['desc_conf']; ?>"  required="">
											</div>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
													<span class="input-group-text">Lieu de la conférence</span>
												</div>
											    <input type="text" name="lieu" class="form-control" id="solidInput" value="<?php echo $row['lieu_conf']; ?>" required="" />
                                            </div>
                                        </div>
									</div>

							
						
									<div class="col-md-12">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">Nombre maximum de personnes</span>
												</div>
												<input id="Name" name="invites" type="number" value="<?php echo $row['nb_invites']; ?>" class="form-control" required="" />
												<div class="input-group-prepend">
													<span class="input-group-text">personnes</span>
												</div>
											</div>
										</div>
									</div>
									
									
									<div class="col-6">
										<div class="form-group">
											<div class="input-group">
                                                <div class="input-group-prepend">
													<span class="input-group-text">Prix d'inscription d'auteur</span>
												</div>
												<input type="text" name="insc_aut" class="form-control" value="<?php echo $row['tarif_auteur']; ?>" aria-label="Username" aria-describedby="basic-addon1" required="" />
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">DA</span></span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<div class="input-group">
                                                <div class="input-group-prepend">
													<span class="input-group-text">Prix d'inscription du participant</span>
												</div>
												<input type="text" name="insc_part" class="form-control" value="<?php echo $row['tarif_auditeur']; ?>" aria-label="Username" aria-describedby="basic-addon1" required="" />
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">DA</span>
												</div>
											</div>
										</div>
									</div>
									
									<button style="margin:0; position: relative; top:30px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);" class="btn btn-outline-success me-1 mb-1" type="submit" type="button" name="sub">
										Valider
									</button>
									
								</form>


                                <br><hr><hr><br>
								<form class="row g-3 needs-validation" method="post" action="modif_conf.php">
									<div class="col-md-9">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">Modifier la date de soumission</span>
												</div>
												<input id="Name" name="dates" type="date" class="form-control" required="" />
                                    
                                            </div>
										</div>
									</div>

                                    <div class="col-md-3">
                                        <button style="margin-top:10px" class="btn btn-outline-success me-1 mb-1" type="submit" type="button" name="sub1">
                                            Valider
                                        </button>
									</div>
         	
								</form>

                                <hr>
                                
								<form class="row g-3 needs-validation" method="post" action="modif_conf.php">
									<div class="col-md-9">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">Modifier la date d'évaluation</span>
												</div>
												<input id="Name" name="datev" type="date" class="form-control" required="" />
											</div>
										</div>
									</div>
                                    <div class="col-md-3">
                                        <button style="margin-top:10px" class="btn btn-outline-success me-1 mb-1" type="submit" type="button" name="sub2">
                                            Valider
                                        </button>
									</div>
								</form>
                                <hr>
                                <form class="row g-3 needs-validation" method="post" action="modif_conf.php">
									<div class="col-md-9">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">Modifier la date de décision</span>
												</div>
												<input id="Name" name="dated" type="date" class="form-control" required="" />
											</div>
										</div>
									</div>
                                    <div class="col-md-3">
                                        <button style="margin-top:10px" class="btn btn-outline-success me-1 mb-1" type="submit" type="button" name="sub3">
                                            Valider
                                        </button>
									</div>
								</form>
                                <hr>
                                <form class="row g-3 needs-validation" method="post" action="modif_conf.php">
									<div class="col-md-9">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">Modifier la date de conférence</span>
												</div>
												<input id="Name" name="datec" type="date" class="form-control" required="" />
											</div>
										</div>
									</div>
                                    <div class="col-md-3">
                                        <button style="margin-top:10px" class="btn btn-outline-success me-1 mb-1" type="submit" type="button" name="sub4">
                                            Valider
                                        </button>
									</div>
								</form>

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
		
        $today = date("Y-m-d");
        $sql = "SELECT * FROM conference WHERE date_conference>'$today'";
        $req = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($req);
        $id = $row['id_conf'];

		$titre = ucfirst(strtolower($_POST['titre']));
		$desc = ucfirst(strtolower($_POST['description']));
		$lieu = strtoupper($_POST['lieu']);
		$invites = $_POST['invites'];
		$insc_aut = $_POST['insc_aut'];
		$insc_part = $_POST['insc_part'];

		
		$a = "UPDATE conference SET titre_conf='$titre' , desc_conf='$desc' , lieu_conf='$lieu' , nb_invites='$invites' , tarif_auteur='$insc_aut' , tarif_auditeur='$insc_part' WHERE id_conf='$id'";
        $b = mysqli_query($conn , $a);

		if ($b){
			?>
			<script>
				var a = alert("Conférence modifié avec succès");
				window.location="index.php#conf";
			</script>
							<?php
						
	    } else {

				echo "Error: " . $a. mysqli_error($conn); 
									
		
									
		}
	}


    if (isset($_POST['sub1'])) {
        $today = date("Y-m-d");
        $sql = "SELECT * FROM conference WHERE date_conference>'$today'";
        $req = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($req);
        $id = $row['id_conf'];
        
		
		$dates = $_POST['dates'];
		

        $sqll="SELECT * FROM conference WHERE id_conf='$id'";
        $reqq=mysqli_query($conn , $sqll);
        $roww = mysqli_fetch_array($reqq);

        $datev = $row['date_evaluation'];
        $dated = $row['date_decision'];
        $datec = $row['date_conference'];

        if ($dates < $datev) {
			if ($dates < $dated) {
				if ($dates < $datec) {
                    $a = "UPDATE conference SET date_soumission='$dates' WHERE id_conf='$id'";
                    $b = mysqli_query($conn , $a);
            
                    if ($b){
                    ?>	
                        <script>
                        var a = alert("Date de soumission modifiée avec succès");
                        window.location="index.php#conf";
                        </script>
                    <?php
                                    
                    } else {
                        echo "Error: " . $a. mysqli_error($conn);
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


    if (isset($_POST['sub2'])) {
        $today = date("Y-m-d");
        $sql = "SELECT * FROM conference WHERE date_conference>'$today'";
        $req = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($req);
        $id = $row['id_conf'];
        
		
		$datev = $_POST['datev'];
		

        $sqll="SELECT * FROM conference WHERE id_conf='$id'";
        $reqq=mysqli_query($conn , $sqll);
        $roww = mysqli_fetch_array($reqq);

        $dates = $row['date_soumission'];
        $dated = $row['date_decision'];
        $datec = $row['date_conference'];

        if ($datev > $dates) {
			if ($datev < $dated) {
				if ($datev < $datec) {
                    $a = "UPDATE conference SET date_evaluation='$datev' WHERE id_conf='$id'";
                    $b = mysqli_query($conn , $a);
            
                    if ($b){
                    ?>	
                        <script>
                        var a = alert("Date d'évaluation modifiée avec succès");
                        window.location="index.php#conf";
                        </script>
                    <?php
                                    
                    } else {
                        echo "Error: " . $a. mysqli_error($conn);
                    }
                }else{
                    ?>
					<script>
						let a = alert("La date d'évaluation doit être moin que la date de conférence");
					</script>
					<?php
                }
            }else{
                ?>
				<script>
					let a = alert("La date d'évaluation doit être moin que la date de décision");
				</script>
				<?php
            }
        }else{
            ?>
			<script>
				let a = alert("La date d'évaluation doit être plus que la date de soumission");
			</script>
			<?php
        }
        
		
		
	}




    if (isset($_POST['sub3'])) {
        $today = date("Y-m-d");
        $sql = "SELECT * FROM conference WHERE date_conference>'$today'";
        $req = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($req);
        $id = $row['id_conf'];
        
		
		$dated = $_POST['dated'];
		

        $sqll="SELECT * FROM conference WHERE id_conf='$id'";
        $reqq=mysqli_query($conn , $sqll);
        $roww = mysqli_fetch_array($reqq);

        $dates = $row['date_soumission'];
        $datev = $row['date_evaluation'];
        $datec = $row['date_conference'];

        if ($dated > $dates) {
			if ($dated > $datev) {
				if ($dated < $datec) {
                    $a = "UPDATE conference SET date_decision='$dated' WHERE id_conf='$id'";
                    $b = mysqli_query($conn , $a);
            
                    if ($b){
                    ?>	
                        <script>
                        var a = alert("Date de decision modifiée avec succès");
                        window.location="index.php#conf";
                        </script>
                    <?php
                                    
                    } else {
                        echo "Error: " . $a. mysqli_error($conn);
                    }
                }else{
                    ?>
					<script>
						let a = alert("La date de decision doit être moin que la date de conférence");
					</script>
					<?php
                }
            }else{
                ?>
				<script>
					let a = alert("La date de decision doit être plus que la date d'évaluation");
				</script>
				<?php
            }
        }else{
            ?>
			<script>
				let a = alert("La date de decision doit être plus que la date de soumission");
			</script>
			<?php
        }
        
		
		
	}


    if (isset($_POST['sub4'])) {
        $today = date("Y-m-d");
        $sql = "SELECT * FROM conference WHERE date_conference>'$today'";
        $req = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($req);
        $id = $row['id_conf'];
        
		
		$datec = $_POST['datec'];
		

        $sqll="SELECT * FROM conference WHERE id_conf='$id'";
        $reqq=mysqli_query($conn , $sqll);
        $roww = mysqli_fetch_array($reqq);

        $dates = $row['date_soumission'];
        $datev = $row['date_evaluation'];
        $dated = $row['date_decision'];

        if ($datec > $dates) {
			if ($datec > $datev) {
				if ($datec > $dated) {
                    $a = "UPDATE conference SET date_conference='$datec' WHERE id_conf='$id'";
                    $b = mysqli_query($conn , $a);
            
                    if ($b){
                    ?>	
                        <script>
                        var a = alert("Date de conférence modifiée avec succès");
                        window.location="index.php#conf";
                        </script>
                    <?php
                                    
                    } else {
                        echo "Error: " . $a. mysqli_error($conn);
                    }
                }else{
                    ?>
					<script>
						let a = alert("La date de conférence doit être plus que la date de decision");
					</script>
					<?php
                }
            }else{
                ?>
				<script>
					let a = alert("La date de conférence doit être plus que la date d'évaluation");
				</script>
				<?php
            }
        }else{
            ?>
			<script>
				let a = alert("La date de conférence doit être plus que la date de soumission");
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