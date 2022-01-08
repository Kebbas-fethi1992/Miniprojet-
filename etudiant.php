<?php include("header.php"); ?>
<div class="container-fluid">
<form class="myform">
<div class="row">
  <div class="col-lg-3 col-sm-4">
    <div class="form-floating">
    <select class="form-select" id="selectedpromo" aria-label="Floating label select example">
        <?php getpromotion();?> </select>
      <label for="promotion"> Choisissez une promotion</label></div>
  </div>
  <div class="col-lg-3 col-sm-4 mt-1">
            <button type="button" onclick="bringem();"
             class="btn btn-warning btn-lg">
            <i class="fas fa-eye"></i>
            <b>Afficher L' emplois</b></button>
  </div>
    <div class="col-lg-3 col-sm-4 mt-1">
        <button onclick="bringxml();" type="button" class="btn btn-info btn-lg text-white">
            <i class="fas fa-file-code"></i> <b>Consultez le Fichier XML</b>
        </button>
    </div>
  </div>
</form>
    <div class="row">
        <div class="col-12" id="tabContent">

        </div>
    </div>
</div>
</div>
<?php include("footer.php"); ?>