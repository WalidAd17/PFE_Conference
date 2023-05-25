<?php session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Les papiers soumis</title>
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
							
							<h5 class="text-center">Les papiers soumis</h5>
							<hr>
							
							<?php 
							$today = date("Y-m-d");
							$sql = "SELECT * FROM conference WHERE date_conference>'$today'";
							$req = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($req);

                            $id = $row['id_conf'];
                            $s = "SELECT * FROM soumission WHERE id_conf='$id'";
                            $r = mysqli_query($conn,$s);
                            $n = mysqli_num_rows($r);
							?>
							

							
							
                            <div class="row">
								<div class="card col-md-12" style="width: 18rem;">
								
									<div class="card-body">
										<table>
                                            <tr>
                                                <td><h5 class="card-title mb-2 fw-mediumbold">Nombre total des papiers soumis pour cette conférence :</h5></td>
                                                <td style="padding-top:10px;padding-left:30px;"><h5 class="btn btn-success"><b><?php echo $n." papiers";?></b></h5></td>
                                            </tr>
                                        </table>
										
										
										
									</div>
								</div>
								
								
							</div>
							
                            <hr>
							<div class="row">
                                
                                <?php
                                $s = "SELECT * FROM soumission WHERE id_conf='$id'";
                                $r = mysqli_query($conn,$s);
                               
                                while ($w = mysqli_fetch_array($r)) {
                                ?>
								<div class="card col-md-6" style="width: 18rem;">
									<br>
									<div class="card-body" style="background-color:#ccffff;">
										<h6 class="card-title mb-2 fw-mediumbold"><span style="color:black; font-weight:bold;"><u>Titre du papier :</u>&nbsp;&nbsp;</span><?php echo '<span style="color:red;">'.$w['titre_p'].'</span>'; ?></h6>
										<hr>
                                        <?php
                                        $ida = $w['id_aut'];

                                        $ss = "SELECT * FROM auteur WHERE id_a='$ida'";
                                        $rr = mysqli_query($conn,$ss);
                                        $ww= mysqli_fetch_array($rr);
                                        ?>
                                        <h6 style="text-align:center; color:black; font-size:16px; font-weight:bolder;"><u><i>Les informations de l'auteur</i></u></h6>
                                        <ul>
                                            <li style="margin-top:5px; margin-bottom:5px;"><span style="color:black; font-weight:bold;">Nom & Prénom :</span> <?php echo $ww['nom_a']." ".$ww['prenom_a']; ?> </li>
											<li style="margin-top:5px; margin-bottom:5px;"><span style="color:black; font-weight:bold;">Email:</span> <?php echo $ww['email_a']; ?> </li>
											<li style="margin-top:5px; margin-bottom:5px;"><span style="color:black; font-weight:bold;">N° téléphone :</span> <?php echo $ww['tel_a']; ?> </li>
										</ul>
										<hr>
                                        
                                        <h6 style="text-align:center; color:black; font-size:16px; font-weight:bolder;"><u><i>Les informations du papier</i></u></h6>
										<ul>
											
                                            <li style="margin-top:5px; margin-bottom:5px;"><span style="color:black; font-weight:bold;">Résumé du papier :</span> <?php echo $w['resume_p']; ?> </li>
                                            

                                            
                                            <form method="post" action="pap_soum_generer.php">
                                                <input name="chemin" type="text" value="<?php echo $w['chemin'];?>" style="opacity:0%;" >
                                                <input name="nom" type="text" value="<?php echo $w['nom_pap'];?>" style="opacity:0%;" >
                                                <input name="noma" type="text" value="<?php echo $ww['nom_a'];?>" style="opacity:0%;" >
                                                <input name="prenoma" type="text" value="<?php echo $ww['prenom_a'];?>" style="opacity:0%;" >
                                        
                                                <button style="margin:0; position: relative; top:0px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);" class="btn btn-outline-success me-1 mb-1" type="submit" name="pap">
                                                    Ouvrir le papier
                                                </button>
                                            </form>
                                         
                                        </ul>
										<hr><hr>
                                        <?php
                            
										$pap = $w['id_papier'];

										$today = date("Y-m-d");
										$sql = "SELECT * FROM conference WHERE date_conference>'$today'";
										$req = mysqli_query($conn,$sql);
										$row = mysqli_fetch_array($req);
										$date_decision = $row['date_decision'];
										if ($today > $date_decision) {

											$test = "SELECT SUM(etat) AS etatf FROM evaluation WHERE id_conf='$id' AND id_pap='$pap' GROUP BY id_pap";
											$testt = mysqli_query($conn , $test);
											$n=mysqli_num_rows($testt);
											
											$testr = mysqli_fetch_array($testt);

									
											if ($testr['etatf'] == 0 || $testr['etatf'] == 1) {
												?>
													<table style="margin:0; position: relative; top:30px;  left:50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
														<tr>
															<td> <h6><b style="color:black; font-size:16px;">État final : </b></h6></td>
															<td>
																
																<h5 class="btn btn-danger">Refusé</h5>
																
															</td>
														</tr>
													</table>
													<hr>
													<table style="margin:0; position: relative; top:120px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
														<form class="row g-3 needs-validation" method="post" action="papier_soumis.php" enctype="multipart/form-data">
															<tr>
																
																<td colspan="2">
																	<div class="col-md-14">
																		<div class="form-group">
																			<div class="input-group">
																				<div class="input-group-prepend">
																					<span class="input-group-text">Sujet</span>
																				</div>
																				<textarea class="form-control" name="sjt" aria-label="With textarea"></textarea>
																			</div>
																		</div>
																	</div>
																</td>
															</tr>
															<tr>
															
																<td colspan="2">
																		<div class="col-md-14">
																			<div class="form-group">
																				<div class="input-group">
																					<div class="input-group-prepend">
																						<span class="input-group-text">Corps</span>
																					</div>
																					<textarea class="form-control" rows="3" name="mail" aria-label="With textarea"></textarea>
																				</div>
																			</div>
																		</div>
																	
																</td>
															
															
															</tr>
															<tr>
																<td colspan="2">
																	<button style="position: relative; top:30px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);" class="btn btn-outline-secondary me-1 mb-1" type="submit" type="button" name="su">
																		Envoyer email
																	</button>
																</td>
															
															</tr>
														</form>
													</table>
													<?php

														if (isset($_POST['su'])) {
															$header="MIME-Version: 1.0\r\n";
															$header.='From:"PrimFX.com"<support@primfx.com>'."\n";
															$header.='Content-Type:text/html; charset="uft-8"'."\n";
															$header.='Content-Transfer-Encoding: 8bit';

															$sjt = $_POST['sjt'];
															$mail = $_POST['mail'];

															mail($ww['email_a'] , $sjt , $mail, $header);

															?>
																<script>
															//		window.open('mailto:<?php echo $ww['email_a'];?>?subject=<?php echo "[FI Conf] ".$sjt; ?>&body=<?php echo $mail; ?>');
																</script>
															<?php

														}
														?>

												

												<?php
											}else if ($testr['etatf'] == 2 || $testr['etatf'] == 3) {

												$t = "SELECT * FROM inscription_auteur WHERE id_conf='$id' AND id_pap='$pap' AND id_aut='$ida'";
												$tt = mysqli_query($conn , $t);
												$nn=mysqli_num_rows($tt);
												       
												?>
													<table style="margin:0; position: relative; top:30px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
														<tr>
															<td> <h6><b style="color:black; font-size:16px;">État final :&nbsp; </b></h6></td>
															<td>
																<h5 class="btn btn-success">Accépté</h5>
																	
															</td>
															<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td> <h6><b style="color:black; font-size:16px;">Inscrit :&nbsp; </b></h6></td>
															<td><h5 class="btn btn-danger">Non</h5></td>
														</tr>
													</table>

												<?php
												
												if ($nn == 0) {
													?>
													<table style="margin:0; position: relative; top:30px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
														<tr>
															
														</tr>
													</table>
													<hr>
												
													<table style="margin:0; position: relative; top:120px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
														<form class="row g-3 needs-validation" method="post" action="papier_soumis.php" enctype="multipart/form-data">
															<tr>
																
																<td colspan="2">
																	<div class="col-md-14">
																		<div class="form-group">
																			<div class="input-group">
																				<div class="input-group-prepend">
																					<span class="input-group-text">Sujet</span>
																				</div>
																				<textarea class="form-control" name="sjt1" aria-label="With textarea"></textarea>
																			</div>
																		</div>
																	</div>
																</td>
															</tr>
															<tr>
															
																<td colspan="2">
																		<div class="col-md-14">
																			<div class="form-group">
																				<div class="input-group">
																					<div class="input-group-prepend">
																						<span class="input-group-text">Corps</span>
																					</div>
																					<textarea class="form-control" rows="3" name="mail1" aria-label="With textarea"></textarea>
																				</div>
																			</div>
																		</div>
																	
																</td>
															
															
															</tr>
															<tr>
																<td colspan="2">
																	<button style="position: relative; top:30px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);" class="btn btn-outline-secondary me-1 mb-1" type="submit" type="button" name="sub1">
																		Envoyer email
																	</button>
																</td>
															
															</tr>
														</form>
													</table>
													<?php

														if (isset($_POST['sub1'])) {
															
															
															$sjt1 = $_POST['sjt1'];
															$mail1 = $_POST['mail1'];

															?>
															<script>
																window.open('mailto:<?php echo $ww['email_a'];?>?subject=<?php echo "[FI Conf] ".$sjt1; ?>&body=<?php echo $mail1; ?>');
															</script>
														<?php

															

													

														}

														
												}else{
													?>
													<table style="margin:0; position: relative; top:30px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
														<tr>
															<td> <h6><b style="color:black; font-size:16px;">Inscrit :&nbsp; </b></h6></td>
															<td><h5 class="btn btn-danger">Oui</h5></td>
														</tr>
													</table>
													<hr>
												
													<table style="margin:0; position: relative; top:120px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
														<form class="row g-3 needs-validation" method="post" action="papier_soumis.php" enctype="multipart/form-data">
															<tr>
																
																<td colspan="2">
																	<div class="col-md-14">
																		<div class="form-group">
																			<div class="input-group">
																				<div class="input-group-prepend">
																					<span class="input-group-text">Sujet</span>
																				</div>
																				<textarea class="form-control" name="sjt2" aria-label="With textarea"></textarea>
																			</div>
																		</div>
																	</div>
																</td>
															</tr>
															<tr>
															
																<td colspan="2">
																		<div class="col-md-14">
																			<div class="form-group">
																				<div class="input-group">
																					<div class="input-group-prepend">
																						<span class="input-group-text">Corps</span>
																					</div>
																					<textarea class="form-control" rows="3" name="mail2" aria-label="With textarea"></textarea>
																				</div>
																			</div>
																		</div>
																	
																</td>
															
															
															</tr>
															<tr>
																<td colspan="2">
																	<button style="position: relative; top:30px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);" class="btn btn-outline-secondary me-1 mb-1" type="submit" type="button" name="sub2">
																		Envoyer email
																	</button>
																</td>
															
															</tr>
														</form>
													</table>
													
													<?php

													if (isset($_POST['sub2'])) {
														$sjt2 = $_POST['sjt2'];
														$mail2 = $_POST['mail2'];

														?>
															<script>
																window.open('mailto:<?php echo $ww['email_a'];?>?subject=<?php echo "[FI Conf] ".$sjt2; ?>&body=<?php echo $mail2; ?>');
															</script>
														<?php

													}
												}

											}
										} else {
											?>
												<table style="margin:0; position: relative; top:30px;  left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
														<tr>
															<td> <h6><b style="color:black;  font-size:16px;">État final :&nbsp;&nbsp; </b></h6></td>
															<td><h5 class="btn btn-warning">Pas encore</h5></td>
														</tr>
													</table>
												<?php
										}
										
										
                                        
                                        ?>
									</div>
									<br>
                                    
								</div>		
                                <?php } ?>		
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