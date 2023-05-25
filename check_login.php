<?php session_start();

include "include/conn_bd.php";

// Retrieve username and password from database according to user's input
try {

    if(empty($_POST["username"]) || empty($_POST["mdp"])){  
        header("location:index.html");  
    }else{ 
        $sql = "SELECT * FROM admin WHERE nom_util='".htmlspecialchars($_POST['username'])."' AND mdp='".htmlspecialchars($_POST['mdp'])."' ";
        $req = mysqli_query($conn,$sql);
        $nb = mysqli_num_rows($req);
        if ($nb >0) {
                $_SESSION['username'] = $_POST['username'];
                $user = $_POST['username'];
                $_SESSION['usermdp'] = $_POST['mdp'];

                $profile = "SELECT *  FROM admin  WHERE nom_util= '".$user."'";
                $statpros = mysqli_query($conn,$profile);
                foreach($statpros as $statpro){
                    $_SESSION['id_admin']= $statpro['id_admin'];
                    $_SESSION['nom']= $statpro['nom'];
                    $_SESSION['prenom']= $statpro['prenom'];
                    $_SESSION['date_naiss']= $statpro['date_naiss'];
                    $_SESSION['profession']= $statpro['profession'];
                    $_SESSION['description']= $statpro['description'];
                    $_SESSION['tel']= $statpro['tel'];
                    $_SESSION['email']= $statpro['email'];
                    $_SESSION['adresse']= $statpro['adresse'];
                }
            ?> 
            <script>window.location ="admin/documentation/index.php"</script> 
            <?php
        }else{ 

            //AUTEUR CONNECTION
            
            $sql = "SELECT * FROM auteur WHERE nom_util_a='".htmlspecialchars($_POST['username'])."' AND mdp_a='".htmlspecialchars($_POST['mdp'])."' ";
            $req = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($req);
            
            if ($count > 0){
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['usermdp'] = $_POST['mdp'];
                $user= $_SESSION['username'] ;

                $var = $_SESSION['username'];

                $profile = "SELECT *  FROM auteur  WHERE nom_util_a= '".$user."'";
                $statpros = mysqli_query($conn,$profile);

                foreach($statpros as $statpro){
                    $_SESSION['id_a']= $statpro['id_a'];
                    $_SESSION['nom_a']= $statpro['nom_a'];
                    $_SESSION['prenom_a']= $statpro['prenom_a'];
                    $_SESSION['sexe_a']= $statpro['sexe_a'];
                    $_SESSION['date_naiss_a']= $statpro['date_naiss_a'];
                    $_SESSION['profession_a']= $statpro['profession_a'];
                    $_SESSION['desc_a']= $statpro['desc_a'];
                    $_SESSION['tel_a']= $statpro['tel_a'];
                    $_SESSION['email_a']= $statpro['email_a'];
                    $_SESSION['adresse_a']= $statpro['adresse_a'];
                ?>
                <script>window.location ="auteur/documentation/index.php"</script> 
                <?php 
                }
            }else{ 
                
                //REVIEWER CONNECTION
           
                $today = date("Y-m-d");
                $s = "SELECT * FROM conference WHERE date_conference>'$today'";
                $r = mysqli_query($conn,$s);
                $w=mysqli_fetch_array($r);
                $id=$w['id_conf'];

    
                //$a = "SELECT * FROM com_prg WHERE id_conf='$id'";
                //$b = mysqli_query($conn,$a);
               // $c = mysqli_fetch_array($b)
                    
                //$mem = $c['id_membre'];


                $sql ="SELECT * FROM membre WHERE usernameM='".htmlspecialchars($_POST['username'])."' AND mdpM='".htmlspecialchars($_POST['mdp'])."' AND idM IN (SELECT id_membre FROM com_prg)";                
                $req = mysqli_query($conn , $sql);

                if ($req){
                   
            
                } else {
                    ?>
                    <script>
                        let a = alert("<?php echo "Error: " . $sql. mysqli_error($conn); ?>")
                    </script>
            
                    <?php
                
                    
                
                }
                $count = mysqli_num_rows($req);


                if ($count > 0){
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['usermdp'] = $_POST['mdp'];
                    $user= $_SESSION['username'] ;

                    $var = $_SESSION['username'];

                    $profile = "SELECT *  FROM membre  WHERE usernameM= '".$user."'";
                    $statpros = mysqli_query($conn,$profile);

                    foreach($statpros as $statpro){
                        $_SESSION['idM']= $statpro['idM'];
                        $_SESSION['nomM']= $statpro['nomM'];
                        $_SESSION['prenomM']= $statpro['prenomM'];
                        $_SESSION['datenM']= $statpro['datenM'];
                        $_SESSION['professionM']= $statpro['professionM'];
                        $_SESSION['descriptionM']= $statpro['descriptionM'];
                        $_SESSION['telM']= $statpro['telM'];
                        $_SESSION['emailM']= $statpro['emailM'];
                        $_SESSION['adresseM']= $statpro['adresseM'];

                    ?>
                    <script>window.location ="reviewer/documentation/index.php"</script> 
                    <?php 
                    }
                }else{ 
                    
                    //PRESIDENT CONNECTION
            
                    $today = date("Y-m-d");
                    $s = "SELECT * FROM conference WHERE date_conference>'$today'";
                    $r = mysqli_query($conn,$s);
                    $w=mysqli_fetch_array($r);
                    $id=$w['id_conf'];

        
                    $a = "SELECT * FROM president WHERE idConf='$id'";
                    $b = mysqli_query($conn,$a);
                    $c = mysqli_fetch_array($b);

                    $mem = $c['id_membre'];


                    $sql ="SELECT * FROM membre WHERE usernameM='".htmlspecialchars($_POST['username'])."' AND mdpM='".htmlspecialchars($_POST['mdp'])."' AND idM='$mem'";                
                    $req = mysqli_query($conn , $sql);
                    $count = mysqli_num_rows($req);


                    if ($count > 0){
                        $_SESSION['username'] = $_POST['username'];
                        $_SESSION['usermdp'] = $_POST['mdp'];
                        $user= $_SESSION['username'] ;

                        $var = $_SESSION['username'];

                        $profile = "SELECT *  FROM membre  WHERE usernameM= '".$user."'";
                        $statpros = mysqli_query($conn,$profile);

                        foreach($statpros as $statpro){
                            $_SESSION['idM']= $statpro['idM'];
                            $_SESSION['nomM']= $statpro['nomM'];
                            $_SESSION['prenomM']= $statpro['prenomM'];
                            $_SESSION['datenM']= $statpro['datenM'];
                            $_SESSION['professionM']= $statpro['professionM'];
                            $_SESSION['descriptionM']= $statpro['descriptionM'];
                            $_SESSION['telM']= $statpro['telM'];
                            $_SESSION['emailM']= $statpro['emailM'];
                            $_SESSION['adresseM']= $statpro['adresseM'];

                        ?>
                        <script>window.location ="president/documentation/index.php"</script> 
                        <?php 
                        }
                    }else{ //ORGANIZER CONNECTION
            
                        $today = date("Y-m-d");
                        $s = "SELECT * FROM conference WHERE date_conference>'$today'";
                        $r = mysqli_query($conn,$s);
                        $w=mysqli_fetch_array($r);
                        $id=$w['id_conf'];
    
            
                        $sql ="SELECT * FROM membre WHERE usernameM='".htmlspecialchars($_POST['username'])."' AND mdpM='".htmlspecialchars($_POST['mdp'])."' AND idM IN (SELECT id_membre FROM com_org)";                
                        $req = mysqli_query($conn , $sql);
                        $count = mysqli_num_rows($req);
    
                        if ($count > 0){
                            $_SESSION['username'] = $_POST['username'];
                            $_SESSION['usermdp'] = $_POST['mdp'];
                            $user= $_SESSION['username'] ;
    
                            $var = $_SESSION['username'];
    
                            $profile = "SELECT *  FROM membre  WHERE usernameM= '".$user."'";
                            $statpros = mysqli_query($conn,$profile);
    
                            foreach($statpros as $statpro){
                                $_SESSION['idM']= $statpro['idM'];
                                $_SESSION['nomM']= $statpro['nomM'];
                                $_SESSION['prenomM']= $statpro['prenomM'];
                                $_SESSION['datenM']= $statpro['datenM'];
                                $_SESSION['professionM']= $statpro['professionM'];
                                $_SESSION['descriptionM']= $statpro['descriptionM'];
                                $_SESSION['telM']= $statpro['telM'];
                                $_SESSION['emailM']= $statpro['emailM'];
                                $_SESSION['adresseM']= $statpro['adresseM'];
    
                            ?>
                            <script>window.location ="organizer/documentation/index.php"</script> 
                            <?php 
                            }
                        }else{
                             //PARTICIPANT CONNECTION
            
                            $sql = "SELECT * FROM utilisateur WHERE nom_util_u='".htmlspecialchars($_POST['username'])."' AND mdp_u='".htmlspecialchars($_POST['mdp'])."' ";
                            $req = mysqli_query($conn,$sql);
                            $count = mysqli_num_rows($req);
                            
                            if ($count > 0){
                                $_SESSION['username'] = $_POST['username'];
                                $_SESSION['usermdp'] = $_POST['mdp'];
                                $user= $_SESSION['username'] ;

                                $var = $_SESSION['username'];

                                $profile = "SELECT *  FROM utilisateur  WHERE nom_util_u= '".$user."'";
                                $statpros = mysqli_query($conn,$profile);

                                foreach($statpros as $statpro){
                                    $_SESSION['id_a']= $statpro['id_u'];
                                    $_SESSION['nom_a']= $statpro['nom_u'];
                                    $_SESSION['prenom_a']= $statpro['prenom_u'];
                                    $_SESSION['sexe_a']= $statpro['sexe_u'];
                                    $_SESSION['date_naiss_a']= $statpro['date_naiss_u'];
                                    $_SESSION['profession_a']= $statpro['profession_u'];
                                    $_SESSION['desc_a']= $statpro['desc_u'];
                                    $_SESSION['tel_a']= $statpro['tel_u'];
                                    $_SESSION['email_a']= $statpro['email_u'];
                                    $_SESSION['adresse_a']= $statpro['adresse_u'];
                                ?>
                                <script>window.location ="participant/documentation/index.php"</script> 
                                <?php 
                                }
                            }else{ 
                                echo "mot de passe incorect";
                                $_SESSION['user'] = 0;
                                ?> 
                                <script>
                                    alert("Nom d'utilisateur ou mot de passe incorrecte !");
                                    window.location ="loginuser.php";
                                </script>
                                <?php 
                            }
                        }
                    }
                }

            }
        }
    }   
}
catch(PDOException $error){  
    $message = $error->getMessage();  
}



;?>