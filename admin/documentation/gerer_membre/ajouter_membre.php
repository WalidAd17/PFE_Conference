<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Administrateur - Ajouter membre</title>
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
                        
						<?php include 'main.php';
                        ?>
						<div class="card-body">
                            <h5 style="text-align:center;">Ajouter un membre</h5>
                            <hr>
                            <form class="row g-3 needs-validation" method="post" action="ajouter_membre.php">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="nom" class="form-control input-solid" id="solidInput" placeholder="Nom" required="" />
                                        <div class="invalid-feedback">Saisissez un nom SVP!</div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="prenom" class="form-control input-solid" id="solidInput" placeholder="Prénom" required="" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control input-solid" id="solidInput" placeholder="Email" required="" />
                                    </div>
                                </div>

                                <hr>

                                <div class="col-md-12">
                                    <label for="solidSelect">Thème concerné:</label>
                                    <select class="form-control input-solid" name="type" id="solidSelect">
                                        <?php 
                                            $a = "SELECT * FROM thematique";
                                            $b = mysqli_query($conn,$a);
                                            while($c = mysqli_fetch_array($b)){
                                        ?>
                                        <option value="<?php echo $c['id_t'];?>"> <?php echo $c['nom_t']; ?> </option>
                                        <?php } ?>
                                        <option value="0">Organizer</option>
                                    </select>
                                </div>
                                <hr>


                                

                                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Profession</span>
                                            </div>
                                            <textarea class="form-control" name="profession" aria-label="With textarea" required=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Description</span>
                                            </div>
                                            <textarea class="form-control" name="description" aria-label="With textarea" required=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="form-group form-group-default input-solid">
                                        <label>Date de naissance</label>
                                        <input id="Name" name="daten" type="date" class="form-control" required="" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group form-group-default input-solid">
                                        <label>Numéro de téléphone</label>
                                        <input id="Name" name="tel" type="text" class="form-control" placeholder="Saisissez..." required="" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group form-group-default input-solid">
                                        <label>Adresse</label>
                                        <input id="Name" name="adresse" type="text" class="form-control" placeholder="Saisissez..." required="" />
                                    </div>
                                </div>
                                
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                            </div>
                                            <input type="text" name="username" class="form-control" placeholder="Nom d'utilisateur" aria-label="Username" aria-describedby="basic-addon1" required="" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control input-solid" minlength="8" id="solidInput" placeholder="Mot de passe" required="" />
                                    </div>
                                </div>

                                <button style="margin:0; position: relative; top:20px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);" class="btn btn-outline-success me-1 mb-1" type="submit" type="button" name="sub">
                                    <span class="fas fa-plus-circle me-1" data-fa-transform="shrink-3"></span>Ajouter
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

<?php
if(isset($_POST['sub'])){
	$nom = strtoupper($_POST['nom']);
    $prenom = ucfirst(strtolower($_POST['prenom']));
    $email = $_POST['email'];
    $tp = $_POST['type'];
    $profession = ucfirst(strtolower($_POST['profession']));
    $description = ucfirst(strtolower($_POST['description']));
    $daten = $_POST['daten'];
    $adresse = ucfirst(strtolower($_POST['adresse']));
    $tel = $_POST['tel'];
    $username = $_POST['username'];
    $mdp = $_POST['password'];

    $sql = "SELECT * FROM membre WHERE nomM='$nom' AND prenomM='$prenom'";
    $req = mysqli_query($conn,$sql);
    $n = mysqli_num_rows($req);

    if ($tp == 0) {
        $tp_desc = "Organizer";
    }else{
        $p = "SELECT * FROM thematique WHERE id_t='$tp'";
        $q = mysqli_query($conn,$p);
        $pq = mysqli_fetch_array($q);
        $tp_desc= $pq['nom_t'];
    }


    if ($n > 0) {
        ?>
			<script>
			var a = alert("Ce membre existe déja");
			</script>
			<?php
    }else{
        $s = "INSERT INTO membre(nomM,prenomM,datenM, professionM, descriptionM, emailM, telM, adresseM, usernameM, mdpM, type) VALUES ('$nom','$prenom','$daten','$profession','$description','$email','$tel','$adresse','$username','$mdp','$tp_desc')"; 
        $r = mysqli_query($conn,$s);
        if ($r){
            ?>
			<script>
			var a = alert("Membre ajouté avec succès");
			</script>
			<?php

        } else {
            
			echo "Error: " . $sqll. mysqli_error($conn);
			
           
      
        }
        

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
<script src="../assets/prism.js"></script>
<script src="../assets/prism-normalize-whitespace.min.js"></script>
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