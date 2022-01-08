//sauvgarder une nouvelle séance!
function sendFormData() {
     const form = document.getElementById("addcourse");
     let promotion = document.getElementById("promotion").value;
     let jour = document.getElementById("jour").value;
     let module = document.getElementById("module").value;
     let salle = document.getElementById("salle").value;
     let prof = document.getElementById("prof").value;
     let debut = document.getElementById("debut").value;
     let fin = document.getElementById("fin").value;
     let genre = document.getElementById("genre").value;
     let params = "promo=" + promotion + "&jour=" + jour + "&module=" + module
         + "&salle=" + salle + "&prof=" + prof + "&debut=" + debut + "&fin=" + fin + "&genre=" + genre;
    const myrequest = new XMLHttpRequest();
    myrequest.open('POST', '../add.php', true);
     myrequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
     myrequest.send(params);
     /*myrequest.onload = function(){
     }*/
     myrequest.onreadystatechange = function () {
         if (myrequest.readyState === 4 && myrequest.status === 200) {
             if (myrequest.responseText === "OK") {
                 Swal.fire({
                     icon: 'success',
                     title: 'Félicitations',
                     text: 'La Séance a été ajoutée avec Succès !',
                     showCancelButton: true ,
                     showConfirmButton: false,
                 });
                 form.reset();
             } else {
                 Swal.fire({
                     icon: 'error',
                     title: 'Oops !',
                     text: 'Une erreur ',
                     timer: 2500,
                     showCancelButton: false,
                     showConfirmButton: false,
                 });
             }
         }
     }
 }
 // retrouver l'emplois du temps de la promotion donnée
 function bringem() {
         let promo = document.getElementById("selectedpromo").value;
         let emploisrequest = new XMLHttpRequest();
         emploisrequest.open("GET", "../emplois.php?promo=" + promo, true);
         emploisrequest.send(null);
         emploisrequest.onreadystatechange = function () {
             if (emploisrequest.readyState === 4 && emploisrequest.status === 200) {
                 let datas = emploisrequest.responseText;
                 if (datas !== "") {
                     document.getElementById('tabContent').innerHTML = datas;
                 } else {
                     Swal.fire({
                         icon: 'error',
                         title: 'Oops !',
                         text: 'L emplois n est pas pret pour  afficher',
                         timer: 2500,
                         showCancelButton: false,
                         showConfirmButton: false,
                     });
                 }
             }
         }
 }
 //affichier la liste des étudiants d'une promotion et les Modules!
 function getstudent() {
    let student = document.getElementById("student");
    if (student.value !==""){
       const studentrequest = new XMLHttpRequest();
       studentrequest.open("GET","../getstudent.php?student="+student.value,true)
       studentrequest.send(null);
       studentrequest.onreadystatechange = function (){
           if (studentrequest.readyState === 4 && studentrequest.status === 200){
               document.getElementById('ModuleEtd').innerHTML=studentrequest.responseText;
           }
       }
    }else {
        student.focus();
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Séléctionner une promotion',
            timer: 2500,
            showCancelButton: false,
            showConfirmButton: false,
        });
    }

 }
 //générer le fichier xml
 function bringxml(){
    let  promo = document.getElementById("selectedpromo").value;
    const xmlfile = new XMLHttpRequest();
    xmlfile.open("GET","XMLEmplois.php?pro="+promo);
    xmlfile.send(null);
    xmlfile.onreadystatechange = function (){
        if(xmlfile.readyState === 4 && xmlfile.status === 200){
             window.open('xml/emploisparPromotion.xml','_blank');
        }
    }
 }
 function etdMod(){
     let student = document.getElementById("student").value;
     const studentxmlfile = new XMLHttpRequest();
     studentxmlfile.open("GET","XMLEtudiant.php?pro="+student);
     studentxmlfile.send(null);
     studentxmlfile.onreadystatechange = function (){
         if(studentxmlfile.readyState === 4 && studentxmlfile.status === 200){
             window.open('xml/etudiantsavecmodules.xml','_blank');
         }
     }

 }