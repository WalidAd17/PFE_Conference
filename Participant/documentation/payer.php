<?php session_start();



if (isset($_POST['insc'])) {
    
    $tit = $_POST['titp'];
    $idtitp = $_POST['idtitp'];


    

    

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Payer l'inscription</title>
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
                            <h5 class="mb-0  text-center">Réaliser le payement</h5>
                            <hr><br>
                            
                            


                            <form style="margin:0; position: relative; top:200px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);" class="row g-3 needs-validation" method="post" action="payment.php">
                                <table class="table table-striped" style="width:700px; margin:0; position: relative; top:90px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
                                    <tbody>
                                        <tr>
                                            <th style="font-size:17px; width:350px; text-align:center;">Nom & prénom : </th>
                                            <th style="font-size:15px; color:blue; text-align:center;"><?php echo $_SESSION['nom_a']." ".$_SESSION['prenom_a'] ;?></th>
                                        </tr>
                                        <tr>
                                            <th style="font-size:17px; text-align:center;">Titre du papier : </th>
                                            <th style="font-size:15px; color:red; text-align:center;"><?php echo $tit;?></th>
                                        </tr>
                                        <tr>
                                            <th style="font-size:17px; text-align:center;">Montant : </th>
                                            <th style="font-size:15px; color:red; text-align:center;"><?php echo $row['tarif_auteur']." DA";?></th>
                                        </tr>
                                        
                                        <tr>
                                            <th style="font-size:17px; text-align:center;"><input style="opacity:0" value="<?php echo $tit;?>" name="pap"> </th>
                                            <th style="font-size:15px; color:red; text-align:center;"><input style="opacity:0" value="<?php echo $idtitp;?>" name="idtitp"> </th>
                                        </tr>
                                        
                                        <tr>
                                            <th colspan="2">
                                                
                                                <button style="margin:0; position: relative; top:23px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);" class="btn btn-outline-success me-1 mb-1" type="submit" name="sub">
                                                    Payer
                                                </button>
                                            </th>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                                

                               
                            </form>
                            

                            <hr><hr>

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
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $tarif = $_POST['tarif'];
    $comment = $_POST['comment'];

    
}
?>


</body>
<script src="../assets/js/core/jquery.3.2.1.min.js"></scripwindow.location>
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
<?php }?>