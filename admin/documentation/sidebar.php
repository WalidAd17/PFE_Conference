<div class="sidebar sidebar-style-2">
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav nav-info">
						<li class="nav-item active">
							<a href="index.php">
								<img src="image_pfe/icone_home.png" width="17px"> &nbsp;&nbsp;&nbsp;
								<p>Acceuil</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								
							</span>
							<h4 class="text-section">Gérer la conférence</h4>
						</li>
						<?php 
							$today = date("Y-m-d");
							$sql = "SELECT * FROM conference WHERE date_conference>'$today'";
							$req = mysqli_query($conn,$sql);
							$n=mysqli_num_rows($req);

							if ($n ==0) {
								?>
									<li class="nav-item">
										<a href="creer_conf.php">
										<img src="image_pfe/icone_plus.png"> &nbsp;&nbsp;&nbsp;
											<p>Créer une conférence</p>
										</a>
									</li>

								<?php
							}else{

								?>
								<li class="nav-item">
									<a href="modif_conf.php">
										<img src="image_pfe/modif_conf.png"> &nbsp;&nbsp;&nbsp;
										<p>Modifier la conférence</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="gerer_themes.php">
									<img src="image_pfe/icone_gerer_them.png"> &nbsp;&nbsp;&nbsp;

										<p>Gérer les thématiques</p>
									</a>
								</li>
								
								<hr>
								<li class="nav-section">
									<span class="sidebar-mini-icon">
										<i class="fa fa-ellipsis-h"></i>
									</span>
									<h4 class="text-section">Gérer membres</h4>
								</li>
								<li class="nav-item">
									<a href="gerer_membre/ajouter_membre.php">
										<img src="image_pfe/ajout_membre.png"> &nbsp;&nbsp;&nbsp;
										<p>Ajouter un membre</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="gerer_membre/supprimer_membre.php">
										<img src="image_pfe/supp_membre.png"> &nbsp;&nbsp;&nbsp;
										<p>Supprimer un membre</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="gerer_membre/designer_respo.php">
										<img src="image_pfe/designer_pres.png"> &nbsp;&nbsp;&nbsp;
										<p>Désigner un président</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="gerer_membre/gerer_comites.php">
										<img src="image_pfe/comites.png"> &nbsp;&nbsp;&nbsp;
										<p>Les comités</p>
									</a>
								</li>
								
								<hr>

								<li class="nav-section">
									<span class="sidebar-mini-icon">
										<i class="fa fa-ellipsis-h"></i>
									</span>
									<h4 class="text-section">Auteurs et participants</h4>
								</li>
								<li class="nav-item">
									<a href="gerer_aut_util/gerer_auteur.php">
										<img src="image_pfe/auteur.png"> &nbsp;&nbsp;&nbsp;

										<p>Gérer les auteurs</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="/admin/documentation/gerer_aut_util/gerer_util.php">
										<img src="image_pfe/utilisateur.png"> &nbsp;&nbsp;&nbsp;
										<p>Gérer les participants</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="">
									<img src="image_pfe/inscription.png"> &nbsp;&nbsp;&nbsp;
										<p>Gérer les inscriptions</p>
									</a>
								</li>
						
								<hr>

								<?php
							}
							
						?>
						
						
						<li class="nav-item">
							<a href="deconnecter.php">
							<img src="image_pfe/sortir.png"> &nbsp;&nbsp;&nbsp;

								<p>Se déconnecter</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>