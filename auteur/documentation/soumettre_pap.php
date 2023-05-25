<?php session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Soumettre papier</title>
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
							<?php
							if ($n == 0) {
								?>
                                <script>
                                var a = alert("Soumission impossbile car aucune conférence n'existe");
                                window.location ="auteur/documentation/index.php"</script> 
                                <?php
							}else{
                                $today = date("Y-m-d");
                                $z = "SELECT * FROM conference WHERE date_conference>'$today'";
						        $zz = mysqli_query($conn,$z);
                                $zzz = mysqli_fetch_array($zz);
                                $date_soum = $zzz['date_soumission'];

                                if($today > $date_soum){
                                    
                                ?>
                                <br>
                                    <div class="card">
                                        <div class="card-body text-center text-danger">
                                            <h3>Délai de soumission dépassé!</h3>
                                        </div>
                                    </div>
                                <?php

                                }else{
							?>

							<h5 class="mb-0  text-center">Soumettre un papier</h5>
                         
							<hr>
							<?php 
							$today = date("Y-m-d");
							$sql = "SELECT * FROM conference WHERE date_conference>'$today'";
							$req = mysqli_query($conn,$sql);
								$row = mysqli_fetch_array($req);
							?>
							
                            <form class="row g-3 needs-validation" method="post" action="soumettre_pap.php" enctype="multipart/form-data">
                                

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Titre du papier</span>
                                            </div>
                                            <input type="text" name="titre" class="form-control" id="solidInput" placeholder="" required="" />
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Thème du papier</span>
                                            </div>
                                            <select class="form-control" name="type" id="solidSelect">
                                                <?php 
                                                    $today = date("Y-m-d");
                                                    $sql = "SELECT * FROM conference WHERE date_conference>'$today'";
                                                    $req = mysqli_query($conn,$sql);
                                                    $row = mysqli_fetch_array($req);
                                                    $id = $row['id_conf'];    
        
                                                    $a = "SELECT * FROM thematique WHERE id_conf='$id'";
                                                    $b = mysqli_query($conn,$a);
                                                    while($c = mysqli_fetch_array($b)){
                                                ?>
                                                <option value="<?php echo $c['id_t'];?>"> <?php echo $c['nom_t']; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

        
                                


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Résumé du papier</span>
                                            </div>
                                            <textarea class="form-control" name="resume" rows="4" aria-label="With textarea" required=""></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Les mots clés</span>
                                            </div>
                                            <textarea class="form-control" name="mots" aria-label="With textarea" required=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Les co-auteurs</span>
                                            </div>
                                            <textarea class="form-control" name="coauteur" aria-label="With textarea" required=""></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Insérer le papier</span>
                                            </div>
                                            <input type="file" name="papier" class="form-control" id="solidInput" accept=".pdf,.docx" required="" />
                                        </div>
                                    </div>
                                </div>

                                

                                <button style="margin:0; position: relative; top:40px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);" class="btn btn-outline-success me-1 mb-1" type="submit" type="button" name="sub">
                                    Soumettre
                                </button>
                                
                            </form>

							<?php }
						?>
						</div>
						<?php }
						?>
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

    if(isset($_FILES['papier']) AND $_FILES['papier']['error'] == 0){

        $titre = ucfirst(strtolower($_POST['titre']));
        $theme = $_POST['type']; 
        $resume = ucfirst(strtolower($_POST['resume']));
        $mots = $_POST['mots'];
        $co_aut = $_POST['coauteur'];
        $pap = $_POST['papier'];

        $today = date("Y-m-d");

        $id_aut = $_SESSION['id_a'];

        move_uploaded_file($_FILES['papier']['tmp_name'], 'C:/wamp64/www/Conference_wst/auteur/documentation/papier_soumis/' . basename($_FILES['papier']['name']));
    
        $path = "C:/wamp64/www/Conference_wst/auteur/documentation/papier_soumis/". basename($_FILES['papier']['name']);
        $nom_papier = basename($_FILES['papier']['name']);

        $today = date("Y-m-d");
        $sql = "SELECT * FROM conference WHERE date_conference>'$today'";
        $req = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($req);
        $id = $row['id_conf']; 

        $v = "SELECT * FROM soumission WHERE titre_p='$titre' AND id_conf='$id'";
        $vv = mysqli_query($conn,$v);
        $nv = mysqli_num_rows($vv);

        if ($nv > 0) {
            ?>
            <script>var t = alert("(Titre) Papier déja soumis !");</script>
            <?php
        }else{
            $w = "SELECT * FROM soumission WHERE id_aut='$id_aut' AND id_conf='$id'";
            $ww = mysqli_query($conn,$w);
            $nw = mysqli_num_rows($ww);
            if ($nw == 10) {
                ?>
            <script>var t = alert("Vous ne pouvez pas sumettre plus que 10 papiers !");</script>
            <?php
            }else{

                $s = "INSERT INTO soumission(date_soumission, titre_p, nom_pap, chemin, id_thm, resume_p, mots_cle_p, co_auteurs, id_aut, id_conf) VALUES ('$today','$titre','$nom_papier','$path','$theme','$resume','$mots','$co_aut','$id_aut','$id')";
                $r = mysqli_query($conn,$s);
                if ($r){
                    ?>
                    <script>
                    var a = alert("Papier soumis avec succès");
                    </script>
                    <?php
        
                } else {
                    
                    echo "Error: " . $s. mysqli_error($conn);
                    
                } 
            }
        }
    }
	


    
}?>

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