<?php session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>S'inscrire à la conférence</title>
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
                                var a = alert("Aucune conférence n'existe");
                                window.location ="auteur/documentation/index.php"</script> 
                                <?php
							}else{
                                ?>
                                <h5 class="mb-0  text-center">S'inscrire à la conférence</h5>
                                <hr><br>
                                <?php
                                $today = date("Y-m-d");
                                $z = "SELECT * FROM conference WHERE date_conference>'$today'";
						        $zz = mysqli_query($conn,$z);
                                $zzz = mysqli_fetch_array($zz);
                                $date_dec = $zzz['date_decision'];

                                if($today < $date_dec){
                                    
                                ?>
                                <br>
                                    <div class="card">
                                        <div class="card-body text-center text-danger">
                                            <h3 style="color:red;"><img src="image_pfe/attention.png" style="padding-bottom:2.5px;"> &nbsp;La décision finale des papiers n'est pas faite encore (<?php echo "Le ".date('d-m-Y ', strtotime($zzz['date_decision']));?>)</h3>
                                        </div>
                                    </div>
                                <?php

                                }else{
                                    ?>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h3><span style="color:red;"><img src="image_pfe/attention.png" style="padding-bottom:3px;">&nbsp;Note importante :</span><span style="color:black;">&nbsp;&nbsp;Veuillez s'inscrire à la conférence avec chaque papier accepté</span> </h3>
                                                    </div>
                                                </div>

                                    <?php
							
                                            $today = date("Y-m-d");
                                            $sqll = "SELECT * FROM conference WHERE date_conference>'$today'";
                                            $reqq = mysqli_query($conn,$sqll);
                                            $roww = mysqli_fetch_array($reqq);

                                            $id= $roww['id_conf'];

                                            $id_aut = $_SESSION['id_a'];
                                            $sql = "SELECT * FROM soumission WHERE id_aut='$id_aut' AND id_conf='$id'";
                                            $req = mysqli_query($conn,$sql);
                                            $n= mysqli_num_rows($req);

                                            if ($n == 0) {
                                                ?>
                                                <br>
                                                <div class="card">
                                                    <div class="card-body text-center text-danger">
                                                        <h6>Vous n'avez rien soumis</h6>
                                                    </div>
                                                </div>
                                                <?php 
                                            }else{
                                                
                                                ?>
                                                <div class="row">

                                                
                                                    <?php

                                                    while ($row = mysqli_fetch_array($req)) {
                                                        $pap = $row['id_papier'];
                                                        $titp= $row['titre_p'];
                                                        $idtitp= $row['id_papier'];

                                                        $f = "SELECT SUM(etat) AS etatf FROM evaluation WHERE id_pap='$pap' GROUP BY id_pap";
                                                        $ff = mysqli_query($conn , $f);

                                                        ?>

                                                        <div class="card col-md-6" style="width: 18rem;">
                                                            <br>
                                                            <div class="card-body" style="background-color:#ccffff;">
                                                                <h6 class="card-title mb-2 fw-mediumbold"><span style="color:black; font-weight:bold;"><u>Titre du papier :</u>&nbsp;&nbsp;</span><?php echo '<span style="color:red;">'.$titp.'</span>'; ?></h6>
                                                                <hr>
                                                                
                                                               
                                                                
                                                                <h6 style="text-align:center; color:black; font-size:16px; font-weight:bolder;"><u><i>Les informations du papier</i></u></h6>
                                                                <ul>
                                                                    <li style="margin-top:5px; margin-bottom:5px;"><span style="color:black; font-weight:bold;">Co-auteurs :</span> <?php echo $row['co_auteurs']; ?> </li>
                                                                    <li style="margin-top:5px; margin-bottom:5px;"><span style="color:black; font-weight:bold;">Mots clés :</span> <?php echo $row['mots_cle_p']; ?> </li>
                                                                    <li style="margin-top:5px; margin-bottom:5px;"><span style="color:black; font-weight:bold;">Résumé du papier :</span> <?php echo $row['resume_p']; ?> </li>
                                                                </ul>
                                                                <hr><hr>
                                                                <?php
                                                               
                                                                $fff = mysqli_fetch_array($ff);
                                                                $etat = $fff['etatf'];

                                                                ?>
                                                                
                                                                        

                                                                    <?php
                                                                    if ($etat == 0 || $etat ==1) {        
                                                                    ?>
                                                                        <table>
                                                                            <tr>
                                                                                <td style="padding-left:100px;"> <h6><b>La décision des reviewers :</b></h6></td>
                                                                                <td style="padding-left:15px; padding-top:5px;"><h5 class="btn btn-danger">Refusé</h5></td>
                                                                            </tr>
                                                                        </table>
                                                                    

                                                                    <?php
                                                                    }else if($etat == 2 || $etat ==3){
                                                                        ?>
                                                                        <table>
                                                                            <tr>
                                                                                <td style="padding-left:100px;"> <h6><b>La décision des reviewers :</b></h6></td>
                                                                                <td style="padding-left:15px; padding-top:5px;"><h5 class="btn btn-success">Accépté</h5></td>
                                                                            </tr>
                                                                        </table>
                                                                        
                                                                        <hr>
                                                                        
                                                                        <table>
                                                    
                                                                            <tr>
                                                                                <td>
                                                                                    <form class="row g-3 needs-validation" method="post" action="payer.php">
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td><input style="opacity:0;" value="<?php echo $titp; ?>" name="titp"><input style="opacity:0;" value="<?php echo $idtitp; ?>" name="idtitp"></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>
                                                                                                <button style="margin:0; position: relative; top:20px;  left:255px;; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);" class="btn btn-outline-primary me-1 mb-1" type="submit" name="insc">
                                                                                                    S'inscrire à la conférence
                                                                                                </button>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                        
                                                                                        
                                                                                        
                                                                                    </form>
                                                                                </td>
                                                                            </tr>
                                                                        </table>

                                                                        <?php
                                                                    }
                                                                
                                                                ?>
                                                                
                                                                
                                                            </div>
                                                            <br>
                                                            
                                                        </div>	

                                                        <?php



                                                    }
                            ?>

							
                            
                                                </div>
							<?php }
						?>
						</div>
						<?php }}
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

    

        $pap = $_POST['pap']; 

        $v = "DELETE FROM soumission WHERE id_papier='$pap'";
        $vv = mysqli_query($conn,$v);

        
        
        if ($vv){
                ?>
                <script>
                var a = alert("Papier supprimé avec succès");
                </script>
                <?php
    
        } else {
                
            echo "Error: " . $v. mysqli_error($conn);
                
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