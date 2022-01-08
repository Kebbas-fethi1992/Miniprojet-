<?php include ('header.php');?>
<div class="container-fluid">
         <div class="row mt-3">
            <div class="col-3">
                 <div class="form-floating">
                     <select id="student" class="form-select mb-3" aria-label=".form-select-lg example">
                        <option value="">---- Promotion ----</option>
                        <?php getpromotion();?>
                     </select>
                    <label for="student" class="form-label">Selectionner une promotion</label>
                 </div>
             </div>
             <div class="col-3 mt-2">
                <button onclick="getstudent();" type="button" class="btn btn-outline-primary btn-lg"><i class="fa fa-list"></i>
                  <b>Etudiants & Modules</b>
                </button>
             </div>
             <div class="col-3 mt-2">
                <button type="button" onclick="etdMod();" class="btn btn-outline-info btn-lg">
                    <i class="fa fa-file-code"></i> <b> Etudiants et modules.xml</b>
                </button>
             </div>
        </div>
        <div id="ModuleEtd" class="row mt-2">

        </div>
</div>
<?php include ('footer.php');?>
