<?php
if(isset($_GET['promo'])){
    require("connect.php");
    $promo = $_GET['promo'];
    $col = "";
    $res = ["Dimanche"=>array("mat"=>new SplFixedArray(7),"prof"=>new SplFixedArray(7),"salle"=>new SplFixedArray(7), "debut"=>new SplFixedArray(7),"genre"=>new SplFixedArray(7)),
        "Lundi"=>array("mat"=>new SplFixedArray(7),"prof"=>new SplFixedArray(7),"salle"=>new SplFixedArray(7), "debut"=>new SplFixedArray(7),"genre"=>new SplFixedArray(7)),
       "Mardi"=>array("mat"=>new SplFixedArray(7),"prof"=>new SplFixedArray(7),"salle"=>new SplFixedArray(7), "debut"=>new SplFixedArray(7),"genre"=>new SplFixedArray(7)),
        "Mercredi"=>array("mat"=>new SplFixedArray(7),"prof"=>new SplFixedArray(7),"salle"=>new SplFixedArray(7), "debut"=>new SplFixedArray(7),"genre"=>new SplFixedArray(7)),
        "Jeudi"=>array("mat"=>new SplFixedArray(7),"prof"=>new SplFixedArray(7),"salle"=>new SplFixedArray(7), "debut"=>new SplFixedArray(7),"genre"=>new SplFixedArray(7))];
    $query = $conn->prepare("SELECT module.Nom_Mod AS mat,
  enseignant.Nom_Ens AS prof, salles.Nom_Salle AS salle,
  cours.Jours AS jour, cours.Debut, cours.Genre AS genre FROM
  emplois_temps.cours, emplois_temps.module, emplois_temps.enseignant,
  emplois_temps.salles WHERE
  emplois_temps.cours.Num_Ens = emplois_temps.enseignant.Id_Ens AND
  emplois_temps.cours.Num_Mod = emplois_temps.module.Id_Mod AND
  emplois_temps.salles.Id_Salle = emplois_temps.cours.Num_Salle AND
  emplois_temps.cours.Num_Promo = :promo;");
    $query->execute([':promo'=>$promo]);
    while ($value = $query->fetch()){
        switch ($value['jour']){
            case "Dimanche":
                $col = "Dimanche";
                break;
            case "Lundi":
                $col = "Lundi";
                break;
            case "Mardi":
                $col = "Mardi";
                break;
            case "Mercredi":
                $col = "Mercredi";
                break;
            case "Jeudi":
                $col = "Jeudi";
                break;
        }
        switch ($value['Debut']){
            case "08:00":
                $res[$col]['mat'][0]=$value['mat'];
                $res[$col]['salle'][0]=$value['salle'];
                $res[$col]['prof'][0]=$value['prof'];
                $res[$col]['genre'][0]=$value['genre'];
                break;
            case "09:00":
                $res[$col]['mat'][1]=$value['mat'];
                $res[$col]['salle'][1]=$value['salle'];
                $res[$col]['prof'][1]=$value['prof'];
                $res[$col]['genre'][1]=$value['genre'];
                break;
            case "10:00":
                $res[$col]['mat'][2]=$value['mat'];
                $res[$col]['salle'][2]=$value['salle'];
                $res[$col]['prof'][2]=$value['prof'];
                $res[$col]['genre'][2]=$value['genre'];
                break;
            case "11:00":
                $res[$col]['mat'][3]=$value['mat'];
                $res[$col]['salle'][3]=$value['salle'];
                $res[$col]['prof'][3]=$value['prof'];
                $res[$col]['genre'][3]=$value['genre'];
                break;
            case "13:30":
                $res[$col]['mat'][4]=$value['mat'];
                $res[$col]['salle'][4]=$value['salle'];
                $res[$col]['prof'][4]=$value['prof'];
                $res[$col]['genre'][4]=$value['genre'];
                break;
            case "14:30":
                $res[$col]['mat'][5]=$value['mat'];
                $res[$col]['salle'][5]=$value['salle'];
                $res[$col]['prof'][5]=$value['prof'];
                $res[$col]['genre'][5]=$value['genre'];
                break;
            case "15:30":
                $res[$col]['mat'][6]=$value['mat'];
                $res[$col]['salle'][6]=$value['salle'];
                $res[$col]['prof'][6]=$value['prof'];
                $res[$col]['genre'][6]=$value['genre'];
                break;
        }
    }
    $body="";
    if($res['Dimanche']['mat'][0] != null or $res['Dimanche']['mat'][1] != null
        or $res['Lundi']['mat'][2] != null
        or $res['Mardi']['mat'][3] != null
        or $res['Mercredi']['mat'][4] != null) {
        $body .= '<table class="table mt-2">
            <thead>
            <tr class="text-muted text-center align-middle">
                <th scope="col"> Séances <br>Jours</th>
                <th scope="col">08:00 - 09:00</th>
                <th scope="col">09:00 - 10:00</th>
                <th scope="col">10:00 - 11:00</th>
                <th scope="col">11:00 - 12:00</th>
                <th scope="col">13:30 - 14:30</th>
                <th scope="col">14:30 - 15:30</th>
                <th scope="col">15:30 - 16:30</th>
            </tr>
            </thead>
            <tbody>';
        foreach ($res as $key => $val) {
            $body .= '<tr class="text-center align-middle"><th scope="row">' . $key . '</th>';
            for ($i = 0; $i < count($val['mat']); $i++) {
                if ($val['mat'][$i] !== null) {
                    $body .= '<td class="bg-light rounded-pill"><span class="badge rounded-pill bg-primary">' . $val['mat'][$i] . '</span><br>
            <span class="badge rounded-pill bg-info">' . $val['prof'][$i] . '</span><br>
            <span class="badge rounded-pill bg-warning">' . $val['salle'][$i] . '</span><span class="badge rounded-pill bg-secondary">' . $val['genre'][$i] . '</span></td>';
                } else {
                    $body .= '<td></td>';
                }
            }
            $body .= '</tr>';
        }
        $body .= '</tbody></table>';
    }
    echo $body;
}
?>