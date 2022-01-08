<?php
if(isset($_GET['pro']) and $_SERVER['REQUEST_METHOD'] == 'GET') {
    include 'connect.php';
    $promotion = $_GET['pro'];
    // ---------Retourner le nom de la promotion----------
    $promoName = $conn->prepare('SELECT concat(promotion.Niveau," ", specialite.Nom_Spec)
                                      AS promo  
                                      FROM specialite,promotion
                                      WHERE  specialite.Id_Spec = promotion.Id_Spec
                                      AND promotion.Id_Promo = :pro');
    $promoName->execute([':pro' => $promotion]);
    $data = $promoName->fetchAll();
    $promotionName = $data[0]['promo'];
    //---------Retourner les etudiants de la promotion---------------
    $studentsPromo = $conn->prepare('SELECT etudiant.Num_Etd AS num, etudiant.Nom_Etd AS nom, etudiant.Prenom_Etd AS prenom
FROM etudiant,promotion WHERE
etudiant.Promotion_etd = promotion.Id_Promo and etudiant.Promotion_etd = :data');
    $studentsPromo->execute([':data' => $promotion]);
    //-----------Retourner les Modules de la promotion ------------
    $modulempromo = $conn->prepare('SELECT DISTINCT module.Nom_Mod as nom, module.Id_Mod AS idmod FROM cours, module where 
    cours.Num_Mod = module.Id_Mod and cours.Num_Promo = :promotion');
    $modulempromo->execute([':promotion' => $promotion]);
    // ----------construire le fichier XML --------------
    echo header("Content-type: text/xml");
    $studenstwithmodules = new DOMDocument();
    $studenstwithmodules->xmlVersion = '1.0';
    $studenstwithmodules->encoding = 'utf-8';
    $studenstwithmodules->formatOutput = true;
    $root = $studenstwithmodules->createElement('promotion');
    $root->setAttribute('option', $promotionName);
    $etudiants = $studenstwithmodules->createElement('etudiants');
    $modules = $studenstwithmodules->createElement('modules');
    // consruire l'arbre XML
    while ($student = $studentsPromo->fetch()) {
        // constuire l'element etudiant
        $etudiant = $studenstwithmodules->createElement('etudiant');
        $etudiant->setAttribute('numInscription', $student['num']);
        $etudiant->setAttribute('nom', $student['nom']);
        $etudiant->setAttribute('prenom', $student['prenom']);
        $etudiants->appendChild($etudiant);
    }
    // construire l'element module
    while ($module = $modulempromo->fetch()) {
        $mod = $studenstwithmodules->createElement('module');
        $mod->setAttribute('idModule', $module['idmod']);
        $mod->setAttribute('nomModule', $module['nom']);
        $modules->appendChild($mod);
    }
    $root->appendChild($etudiants);
    $root->appendChild($modules);
    $studenstwithmodules->appendChild($root);
    echo $studenstwithmodules->saveXML();
    $studenstwithmodules->save('xml/etudiantsavecmodules.xml');
}else{
    echo "Nothing to show";
}

?>
