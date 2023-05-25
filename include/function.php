
<?php
/*
function connect(){
    $servername = "localhost";
    $DBuser = "root";
    $DBpassword = "";
    $DBname = "pfe_conf";
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //echo "Connected successfully";
    } catch(PDOException $e) {
      //echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}


/*

function  Addsers($date){
  $conn = connect();
  $mphash= md5($date['passeword']);
  $requett = "INSERT INTO users(nom,prenom,nom_utilisation,address,email,passeword,tele,type) VALUES('".$date['nomuser']."','".$date['prenomuser']."','".$date['nomutilisation']."','".$date['address']."','".$date['email']."','".$mphash."','".$date['teleuser']."','".$date['typeuser']."')";
   
   $resultata=$conn->query($requett);
   if($resultata){
return true;

   }else{
      return false;
   }

}
function ConnectUsers($data){
   $conn = connect();
   $email = $data['email'];
   $nomutili = $data['nomutili'];
   $password =  $data['password'];
   $requetes = "SELECT * FROM users WHERE email='$email' AND nom_utilisation='$nomutili' AND passeword='$password' ";
   $resulta= $conn->query($requetes);
   $users = $resulta->fetch();
   return $users;
}

function ConnectAdmin($data){
   $conn = connect();
   
   $nomutili = $data['nomutilisation'];
   $requetes = "SELECT * FROM administrateur WHERE  nom_utilisation='$nomutili' AND passeword='".$data['mdp']."' ";
   $resulta= $conn->query($requetes);
   $admins = $resulta->fetch();
   return $admins;
}*/
?>