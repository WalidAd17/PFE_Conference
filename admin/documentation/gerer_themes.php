<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Administrateur - gérer les thèmes</title>
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

							if ($n == 0) {
								?>

								<h5 style="text-align:center;">Gérer les thématiques</h5>
								<hr>

								
							
								<?php
								echo '<h2 style="text-align:center; color:red;">'."Il n'existe aucune conférence - Créez une et gérez ses thématiques".'</h2>';

							}else{
								?>
								<h5 style="text-align:center;">Gérer les thématiques</h5>
								<hr>
                                <h3><b>La conférence :</b>&nbsp;&nbsp; <?php echo '<b style="color:green;">'.$w['titre_conf'].'</b>';?></h3>
                                <h3><b>Les thématiques :</b></h3>

                                <?php
                                $id = $w['id_conf'];
                        
                                $s = "SELECT * FROM thematique WHERE id_conf='$id'";
                                $r = mysqli_query($conn,$s);
								$n = mysqli_num_rows($r);

                                if ($n == 0) {
                                    echo '<span style="  text-align:center; color:red;">'."Aucun thème n'existe !".'</span>';
                                }else{
                                ?>
                                
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Thème</th>
                                            <th scope="col">Description</th>
										</tr>
                                    </thead>
                                    <tbody>
                                        <?php
										$i = 1;
                                        while($qq=mysqli_fetch_array($r)){
											
                                        ?>
                                        <tr>
                                            <td><?php  echo $i; ?></td>
                                            <td><?php  echo $qq['nom_t']; ?></td>
											<td><?php  echo $qq['desc_t']; ?></td>
                                        </tr>
                                        <?php $i++; }?>
                                        
                                    </tbody>
                                </table>
								
								<?php
								}
								?>
								<br><br><hr>
								<h5 style="text-align:center;">Ajouter une thématique</h5>
								<form class="row g-3 needs-validation" method="post" action="gerer_themes.php">
								
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" name="nom_thm" class="form-control input-solid" id="solidInput" placeholder="Nom du thème" required="" />
											<div class="invalid-feedback">Saisissez un nom SVP!</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<input type="text" name="desc_thm" class="form-control input-solid" id="solidInput" placeholder="Description du thème" required="" />
										</div>
									</div>

									

									<button style="margin:0; position: relative; top:30px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);" class="btn btn-outline-success me-1 mb-1" type="submit" type="button" name="ajt_thm">
										Ajouter
									</button>
                                
                            	</form>
								<hr>
								<br><br>
								<br>
								<hr>
								<?php
                                $id = $w['id_conf'];
                        
                                $s = "SELECT * FROM thematique WHERE id_conf='$id'";
                                $r = mysqli_query($conn,$s);?>
								<h5 style="text-align:center;">Supprimer une thématique</h5>
								<form class="row g-3 needs-validation" novalidate="" method="post" action="gerer_themes.php">
                                
									<div class="col-md-12">
										<div class="form-group form-group-default">
											<label>Choisissez</label>
											<select class="form-control" name="noms" id="formGroupDefaultSelect">
												<?php while ($row=mysqli_fetch_array($r)) { ?>
												<option value="<?php echo $row['id_t'] ?>">
													<?php
													echo $row['nom_t'];
													?>
												</option>
												<?php } ?>
											</select>
										</div>
									</div>

									<button style="margin:0; position: relative; top:30px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);" class="btn btn-outline-danger me-1 mb-1" type="submit" type="button" name="sup_thm">
										Supprimer
									</button>
									
								</form>
								<hr>


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
if(isset($_POST['sup_thm'])){
	$noms = $_POST['noms'];
	
	$sqll = "DELETE FROM thematique WHERE id_t='$noms'";
	
	$reqq = mysqli_query($conn , $sqll);
	
	if ($reqq){
		?>
		<script>
		var a = alert("Thème supprimé avec succès");
		window.location="index.php";
		</script>
		<?php


	  } else {
		
		
	 	echo "Error: " . $sqll. mysqli_error($conn);
	
	  }
	
}
	if(isset($_POST['ajt_thm'])){
		$nom = ucfirst(strtolower($_POST['nom_thm']));
		$des = ucfirst(strtolower($_POST['desc_thm']));


		$sql = "SELECT * FROM thematique WHERE nom_t='$nom' AND id_conf='$id'";
		$req = mysqli_query($conn,$sql);
		$nbr = mysqli_num_rows($req);
		if($nbr > 0){
			?>
			<script>
			var a = alert(" => Thème existe déja! veuillez le changer");
			</script>
			<?php        
		}else{
			$sqll = "INSERT INTO thematique(nom_t,desc_t,id_conf) VALUES ('$nom','$des','$id')";
			$reqq = mysqli_query($conn , $sqll);

			if ($reqq){
				?>
				<script>
				var a = alert("Thème ajouté avec succès");
				window.location="index.php";
				</script>
				<?php
			
		
			  } else {
				
				
				 echo "Error: " . $sqll. mysqli_error($conn);
			
			  }
			
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