<?php include("header.php"); ?>
<div class="container-fluid">
  <div class="myform">
      <form id="addcourse">
          <div class="row p-2">
          <div class="col-2"></div>
            <div class="col-4">
              <div class="form-floating">
                <select class="form-select" id="promotion" aria-label="Floating label select example">
                  <?php getpromotion();?>
                </select>
                <label for="promotion">Quelle Promotion ?</label>
              </div>
            </div>
            <div class="col-4">
              <div class="form-floating">
                <select class="form-select" id="jour" aria-label="Floating label select example">
                  <option value="Dimanche">Dimanche</option>
                  <option value="Lundi">Lundi</option>
                  <option value="Mardi">Mardi</option>
                  <option value="Mercredi">Mercredi</option>
                  <option value="Jeudi">Jeudi</option>
                </select>
                <label for="jour">Dans Quel Jours ?</label>
              </div>
            </div>
          </div>
          <div class="row p-2">
            <div class="col-2"></div>
            <div class="col-4">
              <div class="form-floating">
                <select class="form-select" id="module" aria-label="Floating label select example">
                <?php GetData("Module");?>
                </select>
                <label for="module">Quel est le Module ?</label>
              </div>
            </div>
            <div class="col-4">
              <div class="form-floating">
                <select class="form-select" id="prof" aria-label="Floating label select example">
                <?php GetData("enseignant");?>
                </select>
                <label for="prof">Qui est L'enseignant ?</label>
              </div>
            </div>
          </div>
          <div class="row p-2">
          <div class="col-2"></div>
            <div class="col-2">
              <div class="form-floating">
                <select class="form-select" id="salle" aria-label="Floating label select example">
                <?php GetData("Salles");?>
                </select>
                <label for="salle">Quelle Salle ?</label>
              </div>
            </div>
            <div class="col-2">
              <div class="form-floating">
                <select class="form-select" id="genre" aria-label="Floating label select example">
                  <option value="cours">Cours</option>
                  <option value="td">Traveaux Dérigées</option>
                  <option value="tp">Traveaux Pratiques</option>
                </select>
                <label for="genre">Type de Séance ?</label>
              </div>
            </div>
            <div class="col-2">
              <div class="form-floating">
                <select class="form-select" id="debut" aria-label="Floating label select example">
                  <option value="08:00">08:00</option>
                  <option value="09:00">09:00</option>
                  <option value="10:00">10:00</option>
                  <option value="11:00">11:00</option>
                  <option value="13:30">13:30</option>
                  <option value="14:30">14:30</option>
                  <option value="15:30">15:30</option>
                  <option value="16:30">16:30</option>
                </select>
                <label for="debut">Heur de Début ?</label>
              </div>
            </div>
            <div class="col-2">
              <div class="form-floating">
                <select class="form-select" id="fin" aria-label="Floating label select example">
                  <option value="09:00">09:00</option>
                  <option value="10:00">10:00</option>
                  <option value="11:00">11:00</option>
                  <option value="12:00">12:00</option>
                  <option value="14:30">14:30</option>
                  <option value="15:30">15:30</option>
                  <option value="16:30">16:30</option>
                  <option value="17:30">17:30</option>
                </select>
                <label for="fin">Heur de Fin ?</label>
              </div>
            </div>
          </div>
        <div class="row p-2 text">
          <div class="col-2"></div>
          <div class="col">
            <button type="button" onclick="sendFormData();" id="submit"
             class="btn btn-warning btn-lg">
            <i class="fas fa-database"></i>
            <b>Insérer la Séance</b></button>
          </div>
        </div>
    </form>
  </div>
</div>
<?php include("footer.php"); ?>