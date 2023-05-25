<?php session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Réservation d'hôtel</title>
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
						$row = mysqli_fetch_array($req);
						$n = mysqli_num_rows($req);
						?>
						<?php include 'main.php';
                        ?>
						
						<div class="card-body">
                            <h5 class="text-center">Réservation d'hôtel</h5>
                            <hr>
                            <?php 
							$today = date("Y-m-d");
							$sql = "SELECT * FROM conference WHERE date_conference>'$today'";
							$req = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($req);
                            $id = $row['id_conf'];

                            $s = "SELECT * FROM hotel WHERE id_conf='$id'";
                            $r = mysqli_query($conn,$s);
                            $m = mysqli_num_rows($r);
							?>
							

							
							
                            <div class="row">
								<div class="card col-md-12" style="width: 18rem;">
								
									<div class="card-body">
                                        <form class="row g-3 needs-validation" method="post" action="reserver_hot.php">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Nom de l'hôtel</span>
                                                        </div>
                                                        <input type="text" name="nomh" class="form-control" id="solidInput" placeholder="" required="" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Adresse de l'hôtel</span>
                                                        </div>
                                                        <input class="form-control" name="adresseh" type="text" required=""></input>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Prix total de la réservation</span>
                                                        </div>
                                                        <input type="number" name="prixh" class="form-control" name="mots" required=""></input>
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">DA</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <button style="margin:0; position: relative; top:30px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);" class="btn btn-outline-success me-1 mb-1" type="submit" type="button" name="sub">
                                                Valider
                                            </button>
                                            
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

</div>
</div>
</div>

<?php

if (isset($_POST['sub'])) {
    $nomh = $_POST['nomh'];
    
    $adresseh = $_POST['adresseh'];
    

    $prixh = $_POST['prixh'];

    $today = date("Y-m-d");
	$sql = "SELECT * FROM conference WHERE date_conference>'$today'";
	$req = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($req);
    $id = $row['id_conf'];

    $sqll = "INSERT INTO hotel(nom_h , adresse_h , prix_h , id_conf) VALUES('$nomh' , '$adresseh' , '$prixh' , $id)";
    $reqq = mysqli_query($conn , $sqll);
    if ($reqq){
		?>
	<script>
	var a = alert("Réservation insérée !");
    window.location="nos_res.php";
	</script>
	<?php

	} else {
       
            echo "Error: " . $sqll. mysqli_error($conn);
      
		
	
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