<?php
include("createandgetdata.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Mini Projet</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/custum.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid p-2">
      <a class="navbar-brand" href="index.php"><b><i>Gestion E-Temps</i></b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php"><b>Accueil</b></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="etudiant.php"><b>Emplois par Promotion</b></a>
        </li>
          <li class="nav-item">
              <a class="nav-link" href="module.php"><b>Etudiants et Leur Modules</b></a>
          </li>
      </ul>
      <span class="navbar-text text-white">
        <b>Mini Projet ( XML Avancé et Web 2.0 )</b>
      </span>
    </div>
  </div>
</nav>