<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Profil administrateur</title>
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
						<div class="card-body"><br>
                            <div class="card">
                                <div class="card-header text-center" style="background-color:black;">
                                    <h3 style="color:white; font-weight:bold;">Profil</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <tbody>
                
                                            <tr>
                                                <td><img src="image_pfe/utilisateur.png" style="padding-bottom:5px;">&nbsp;&nbsp;<?php echo $_SESSION['nom']." ".$_SESSION['prenom'];?></td>
                                                <td><img src="image_pfe/datenaiss.png" style="padding-bottom:5px;">&nbsp;&nbsp;<?php echo "Le ".date("d-m-Y",strtotime($_SESSION['date_naiss']));?></td>
                                                <td><img src="image_pfe/mail.png" style="padding-bottom:5px;">&nbsp;&nbsp;<?php echo $_SESSION['email'];?></td>
                                                <td><img src="image_pfe/tel.png" style="padding-bottom:5px;">&nbsp;&nbsp;<?php echo $_SESSION['tel'];?></td>
                                                <td><img src="image_pfe/adrs.png" style="padding-bottom:5px;">&nbsp;&nbsp;<?php echo $_SESSION['adresse'];?></td>

                                            </tr>
                                    
                                            
                                        </tbody>
                                    </table>
                                    
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                               
                                                <td><img src="image_pfe/desc.png" style="padding-bottom:5px;">&nbsp;&nbsp;<?php echo ''.$_SESSION['profession'].", ".$_SESSION['description'];?></td>

                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                    <hr>
                                    <table class="table" style="background-color:#DEDEDE;">
                                        <tbody>
                                            <tr>
                                                <td style="text-align:center;"><img src="image_pfe/username.png" style="padding-bottom:5px;">&nbsp;&nbsp;<?php echo $_SESSION['username'];?></td>
                                                <td style="text-align:center;"><img src="image_pfe/mdp.png" style="padding-bottom:5px;">&nbsp;&nbsp;<?php echo $_SESSION['usermdp'];?></td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                            <div class="text-center">
                                <a href="profil_modifie.php"><h5 class="btn btn-primary">Modifier</b></h5></a>
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