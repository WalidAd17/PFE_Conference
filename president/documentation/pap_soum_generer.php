<?php

                                   
if (isset($_POST['pap'])) {


    header("Content-Type: application/pdf");
  
    $file = $_POST['chemin'];
    $nom = $_POST['nom'];
    $noma = $_POST['noma'];
    $prenoma = $_POST['prenoma'];
      
    $nv_nom = "Papier:".$nom."_du_".$noma."_".$prenoma.".pdf";
    header("Content-Disposition: attachment; filename=" . urlencode($nv_nom));   
    header("Content-Type: application/download");
    header("Content-Description: File Transfer");            
    header("Content-Length: " . filesize($file));
      
    flush(); // This doesn't really matter.
      
    $fp = fopen($file, "r");
    while (!feof($fp)) {
        echo fread($fp, 65536);
        flush(); // This is essential for large downloads
    } 
      
    fclose($fp); 
    
   
         
    //        $ressource = fopen($chemin, 'rb');
      //      echo fread($ressource,filesize($chemin));
        
}
?>