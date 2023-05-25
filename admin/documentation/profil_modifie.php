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
    <script>
	    var aa = alert("Si vous validez la modification, vous devez reconnecter");
	</script>
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
                                    <h3 style="color:white; font-weight:bold;">Modifier vos informations</h3>
                                </div>
                                <div class="card-body">
                                    <form class="row g-3 needs-validation" method="post" action="profil_modifie.php">
                                       
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="nom" class="form-control input-solid" id="solidInput" value="<?php echo $_SESSION['nom'];?>" required="" />
                                                <div class="invalid-feedback">Saisissez un nom SVP!</div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="prenom" class="form-control input-solid" id="solidInput" value="<?php echo $_SESSION['prenom'];?>" required="" />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="email" class="form-control input-solid" id="solidInput" value="<?php echo $_SESSION['email'];?>" required="" />
                                            </div>
                                        </div>

                                            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Profession</span>
                                                    </div>
                                                    <input class="form-control" type="text" name="profession" aria-label="With textarea" value="<?php echo $_SESSION['profession'];?>" required=""></input>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Description</span>
                                                    </div>
                                                    <input class="form-control" type="text" name="description" aria-label="With textarea" value="<?php echo $_SESSION['description'];?>" required=""></input>
                                                </div>
                                            </div>
                                        </div>
                                        
                    

                                        <div class="col-md-6">
                                            <div class="form-group form-group-default input-solid">
                                                <label>Numéro de téléphone</label>
                                                <input id="Name" name="tel" type="text" class="form-control" value="<?php echo $_SESSION['tel'];?>" required="" />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-group-default input-solid">
                                                <label>Adresse</label>
                                                <input id="Name" name="adresse" type="text" class="form-control" value="<?php echo $_SESSION['adresse'];?>" required="" />
                                            </div>
                                        </div>
                                        
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">@</span>
                                                    </div>
                                                    <input type="text" name="username" class="form-control" value="<?php echo $_SESSION['username'];?>" aria-label="Username" aria-describedby="basic-addon1" required="" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" name="password" class="form-control input-solid" minlength="8" id="solidInput" value="<?php echo $_SESSION['usermdp'];?>" required="" />
                                            </div>
                                        </div>
                                        <table style="margin:0; position: relative; top:20px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
                                            <tr>
                                                <td style="padding:20px;">
                                                    <button class="btn btn-outline-danger me-1 mb-1" onClick="window.history.back();" type="button">
                                                        Retour
                                                    </button>
                                                </td>
                                                <td style="padding:20px;">
                                                    <button style="margin-left:2px" class="btn btn-outline-primary me-1 mb-1" type="submit" type="button" name="sub">
                                                        Valider
                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                        
                                        
                                        
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
<?php
if(isset($_POST['sub'])){
	$nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $profession = $_POST['profession'];
    $description = $_POST['description'];
    $tel = $_POST['tel'];
    $adresse = $_POST['adresse'];
    $username = $_POST['username'];
    $mdp = $_POST['password'];

    $id = $_SESSION['id_admin'];
    
	
	$sqll = "UPDATE admin SET nom='$nom' , prenom='$prenom' , profession='$profession' , description='$description' , email='$email' , tel='$tel' , adresse='$adresse' , nom_util='$username' , mdp='$mdp' WHERE  id_admin='$id'";
	$reqq = mysqli_query($conn , $sqll);

	


	if ($reqq){?>
		<script>
	var a = alert("Vos informations ont été modifié avec succès");
    window.location ="deconnecter.php"
	</script>
<?php
	  } else {
		?>
		<script>
	var a = alert("<?php echo "Error: " . $sqll. mysqli_error($conn);?>");
   
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