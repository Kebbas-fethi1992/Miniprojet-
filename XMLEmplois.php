<?php
if (isset($_GET['pro']) and $_SERVER['REQUEST_METHOD'] == 'GET') {
    include 'connect.php';
    $pro = $_GET['pro'];
    $proName = $conn->prepare('SELECT concat(promotion.Niveau," ", specialite.Nom_Spec)
     AS promo  FROM specialite,promotion  WHERE  specialite.Id_Spec = promotion.Id_Spec
    AND promotion.Id_Promo = :data');
    $proName->execute([':data'=>$pro]);
    $data = $proName->fetchAll();
    $attr = $data[0]['promo'];
    $query = $conn->prepare('SELECT  module.Nom_Mod AS matiere,
  enseignant.Nom_Ens AS prof, salles.Nom_Salle AS salle, concat(promotion.Niveau," ",specialite.Nom_Spec) AS promo,
  cours.Jours AS jour, cours.Debut AS debut, cours.Fin AS fin, cours.Genre AS genre FROM
  emplois_temps.cours, emplois_temps.module, emplois_temps.enseignant, emplois_temps.specialite,
  emplois_temps.promotion, emplois_temps.salles WHERE
  emplois_temps.cours.Num_Ens = emplois_temps.enseignant.Id_Ens AND
  emplois_temps.cours.Num_Mod = emplois_temps.module.Id_Mod AND
  emplois_temps.cours.Num_Salle = emplois_temps.salles.Id_Salle  AND 
  emplois_temps.cours.Num_Promo = promotion.Id_Promo AND
  specialite.Id_Spec = promotion.Id_Spec AND  cours.Num_Promo = :pro');
    $query->execute([':pro'=>$pro]);

    echo header("Content-type: text/xml");
    $fileName = 'xml/emploisparPromotion.xml';
    $xml = new DOMDocument();
    $xml->xmlVersion = '1.0';
    $xml->encoding = 'utf-8';
    $xml->formatOutput = true;
    $root = $xml->createElement('emplois');
    $root->setAttribute('promotion',$attr);
    while ($res = $query->fetch()){
        $child = $xml->createElement('seance');
        $child->setAttribute('jour',$res['jour']);
        $child->setAttribute('debut',$res['debut']);
        $child->setAttribute('fin',$res['fin']);
        $child->setAttribute('prof',$res['prof']);
        $child->setAttribute('module',$res['matiere']);
        $child->setAttribute('salle',$res['salle']);
        $root->appendChild($child);
    }
    $xml->appendChild($root);
    echo $xml->saveXML();
    $xml->save($fileName);
}else{
 echo 'nothing is set';
}
?>