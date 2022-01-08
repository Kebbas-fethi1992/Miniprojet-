<?php
 include ("connect.php");
 if(isset($_POST['promo'])){
 $promo  = $_POST["promo"];
 $prof   = $_POST["prof"];;
 $module =$_POST["module"];;
 $salle  = $_POST["salle"];;
 $jour   =$_POST["jour"];;
 $debut  = $_POST["debut"];;
 $fin    = $_POST["fin"];;
 $type   = $_POST["genre"];


    $data = $conn->prepare("INSERT INTO cours(Num_Ens,Num_Promo,Num_Salle,Num_Mod,Jours,Debut,Fin,Genre) 
              VALUES (:ens,:promo,:salle,:mod,:jour,:debut,:fin,:genre)");
    $data->bindParam(':ens',$prof);
    $data->bindParam(':promo',$promo);
    $data->bindParam(':salle',$salle);
    $data->bindParam(':mod',$module);
    $data->bindParam(':jour',$jour);
    $data->bindParam(':debut',$debut);
    $data->bindParam(':fin',$fin);
    $data->bindParam(':genre',$type);
    $data->execute();
    if($data->rowCount()>0) {
        echo "OK";
    }
}else{
    echo "NOTOK";
}
?>