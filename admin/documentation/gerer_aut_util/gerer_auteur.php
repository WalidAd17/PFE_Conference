<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Administrateur - Gérer auteurs</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="" type="image/x-icon"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
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
			include 'header.php';
			include 'conn_bd.php';
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
                            <h5 style="text-align:center;">Gérer les auteurs</h5>
							<hr>
                            <?php
								$s = "SELECT * FROM auteur";
								$r = mysqli_query($conn,$s);
								$q = mysqli_fetch_array($r);
								$n = mysqli_num_rows($r);

								if ($n == 0) {
									?>
									<h3>Aucun auteur n'existe</h3>
									<?php
								}else{?>
									<h6><b>Les auteurs: </b>&nbsp;&nbsp;&nbsp;<?php echo '<b style="color:red";>'.$n." auteurs".'</b>'?></h6>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">nom</th>
                                                <th scope="col">Prénom</th>
                                                <th scope="col">Profession</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Téléphone</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                $s = "SELECT * FROM auteur";
                                $r = mysqli_query($conn,$s);

                            ?>
                                    <?php while( $w= mysqli_fetch_array($r)){?>

                                    <tr>
                                        <td><?php echo $w['nom_a'];?></td>
                                        <td><?php echo $w['prenom_a'];?></td>
                                        <td><?php echo $w['profession_a'];?></td>
                                        <td><?php echo $w['email_a'];?></td>
                                        <td><?php echo $w['tel_a'];?></td>
                                    </tr>
                                    <?php  }?>
                                    
                                        </tbody>
                                    </table>
                                            
                            <?php } ?>
						</div>
                        <div class="card-body">
							<hr>
                            <h5  style="text-align:center;">Bloquer un auteur</h5>
                            <?php
                                $sql = "SELECT * FROM auteur ";
								$req = mysqli_query($conn,$sql);
                                
                            ?>
                            <form class="row g-3 needs-validation" novalidate="" method="post" action="gerer_auteur.php">
                                
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Choisissez</label>
                                        <select class="form-control" name="aut" id="formGroupDefaultSelect">
                                            <?php while ($row=mysqli_fetch_array($req)) { ?>
                                            <option value="<?php echo $row['id_a'] ?>">
                                                <?php
                                                echo $row['nom_a']." ".$row['prenom_a'];
                                                ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <button style="margin:0; position: relative; top:20px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);" class="btn btn-outline-danger me-1 mb-1" type="submit" type="button" name="sub">
                                    <span class="fas fa-plus-circle me-1" data-fa-transform="shrink-3"></span>Supprimer
                                </button>
                                
                            </form>
						</div>
					</div>			
				</div>
			</div>
		</div>
	</div>
    <?php
if(isset($_POST['sub'])){
	$aut = $_POST['aut'];
	
	$sqll = "DELETE FROM auteur WHERE id_a='$aut'";
	
	$reqq = mysqli_query($conn , $sqll);

	if ($reqq){?>
		<script>
			var a = alert("Auteur supprimé avec succès");
			window.location="../index.php";
		</script>
		<?php
	  } else {
		echo "Error: " . $sqll. mysqli_error($conn);

	
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