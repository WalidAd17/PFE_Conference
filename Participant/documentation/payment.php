<?php
    session_start();

?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta  name = "viewport" content = "width=device-width">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PayPal Paiment</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body style="margin-left:299px;">
    
    <h2 style="margin-left:200px; margin-top:150px;">Choisissez la méhode du paiment</h2>
        <?php 
                			include 'conn_bd.php';

        $a="SELECT * FROM admin";
        $b = mysqli_query($conn ,$a);
        
        

        $today = date("Y-m-d");
        $sql = "SELECT * FROM conference WHERE date_conference>'$today'";
        $req = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($req);
        $n = mysqli_num_rows($req);
        $tarif=$row['tarif_auteur'];
        $idc=$row['id_conf'];

        
        ?>
        <div style="height:50px; width:350px;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <script src ="https://www.paypal.com/sdk/js?client-id=AazUufUYJLF3s82Irz1PUG2SEr_uMoH1dTQewk2mdX_pRxXWi3irfAz_WU5UKZPoNRkYeXxqm7V0V9qP&currency=USD"></script>
                <!-- Remplacer le 'ID' par votre ClientId qui se trouve sur le site developer.paypal.com-->
            
                <!-- Veillez bien à choisir le CliendId qui se trouve dans le mode Live du site developer.paypal.com-->
            <script>
                paypal.Buttons({
                    createOrder : function(data, actions){
                        return actions.order.create({
                            purchase_units : [{
                                description: 'walid',
                                amount:{
                                    value : '<?php echo $tarif;?>',//renseigner le montant que la personne doit verser sur votre compte
                                    currency: "DA"
                                }
                            }]
                        });
                    },
                    onApprove: function(data, actions) {

                        alert('Le paiment a été effectué avec succès ! '); //message d'alerte quand le paiment est effectué
                        <?php
                         while($c = mysqli_fetch_array($b)){
                        ?>
                            window.open('mailto:<?php echo $c['email'];?>?subject=[Officiel] Inscription Conférence [Auteurs]&body=Payment effectué avec succès par l\'auteur : <?php echo $_SESSION['nom_a']." ".$_SESSION['prenom_a']; ?>  |  Avec le papier : <?php echo $_POST['pap'];?>      [Officiel_admin]');

                         <?php }
                            $ida = $_SESSION['id_a'];
                            $idtitp = $_POST['idtitp'];
                         
                            $insc = "INSERT INTO inscription_auteur(id_aut , id_pap , id_conf) VALUES ('$ida' , '$idtitp' , '$idc')";
                            $inscc = mysqli_query($conn , $insc);

                         if ($inscc){
                            ?>
                        
                            var aaaa = alert("Vous etes inscrit avec ce papier !");
                
                            <?php
                
                        } else {
                        
                            echo "Error: " . $insc. mysqli_error($conn);
                        
                    
                        }
                        ?>
                    }
            }).render('body'); 
            </script> <!-- Après avoir ajouté cette ligne, créer un fichier 'index.js' dans le même dossier que celui du fichier 'payment.php'-->
        </div>

       

            
       
       
    </body>

    
    </html>