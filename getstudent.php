<?php
include "connect.php";
if ($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['student']) ){
 $promo  = $_GET['student'];
 $student = $conn->prepare("SELECT DISTINCT module.Nom_Mod as nom, module.Description_Mod as Description FROM cours, module where 
cours.Num_Mod = module.Id_Mod and cours.Num_Promo = :student");
 $student->bindParam(':student',$promo);
 $student->execute();
 $body = '<div class="col-6">
 <h5 class="text-muted">Les modules associés au promotion <span class="badge rounded-pill bg-warning">'.$student->rowCount().'</span></h5>
 <table class="table  table-hover">
  <thead>
    <tr>
      <th scope="col" class="align-middle">Modules</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>';
 while ($data = $student->fetch()){
   $body.='<tr><th scope="row" class="align-middle">'.$data['nom'].'</th><td>'.$data['Description'].'</td></tr>';
 }
 $body.='</tbody></table></div>';
 $modules = $conn->prepare('SELECT etudiant.Num_Etd AS num, etudiant.Nom_Etd AS nom, etudiant.Prenom_Etd AS prenom, etudiant.Adresse_Etd as addresse
FROM etudiant,promotion WHERE
etudiant.Promotion_etd = promotion.Id_Promo and etudiant.Promotion_etd =:prom');
 $modules->execute([':prom'=>$promo]);
 $body.='<div class="col-6">
 <h5 class="text-muted">Les étudiants affectés au promotion <span class="badge rounded-pill bg-info">'.$modules->rowCount().'</span></h5>
 <table class="table  table-hover">
  <thead>
    <tr>
      <th scope="col">#Matricule</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Adresse</th>
    </tr>
  </thead>
  <tbody>';
 while ($module = $modules->fetch()){
  $body.='<tr><th scope="row">'.$module['num'].'</th><td>'.$module['nom'].'</td><td>'.$module['prenom'].'</td><td>'.$module['addresse'].'</td></tr>';
  }
 $body.='</tbody></table></div>';
 echo $body;
}
?>
