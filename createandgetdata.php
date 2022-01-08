<?php
function GetData($tab){
  include("connect.php");
$table = $tab;
$col1 = $col2 = null;
switch ($table) {
  case 'Module':
      $col1 = "Id_Mod"; $col2 = "Nom_Mod";
  break;
  case 'enseignant':
        $col1 = "Id_Ens"; $col2 = "Nom_Ens";
  break;
  case 'Salles':
    $col1 = "Id_Salle"; $col2 = "Nom_Salle";
break;
}
$stm = $conn->query("SELECT * FROM $table");
while($res = $stm->fetch()){
echo '<option value="'.$res[$col1].'">'.$res[$col2].'</option>';
}
$conn = null;
}
function getpromotion(){
  include("connect.php");
  $stm = $conn->query("SELECT Id_Promo,concat(niveau,' ( ',Nom_Spec,' )') as Niveau FROM promotion, specialite WHERE
  promotion.Id_Spec = specialite.Id_Spec");
  while($res = $stm->fetch()){
    echo '<option value="'.$res['Id_Promo'].'">'.$res['Niveau'].'</option>';
}
$conn = null;
 }
?>