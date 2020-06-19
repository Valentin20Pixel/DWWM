<!DOCTYPE html>
<html lang="fr">
<!-- Bon voici mon header qui me sert aussi de page de connexion -->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Jarditou</title>

  <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Merriweather|Nosifer|Rock+Salt&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<?php form_open_multipart(); ?>


<div class="container-md">
  <!-- Navbar -->
  <header>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="<?= site_url("Pages/Home"); ?>"><img src="<?php echo base_url("assets/img/jarditou_logo2.png") ?>" alt="" title="Logo Jarditou" id="Logo" height="70" class="d-inline-block align-top">2.0</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse row justify-content-end mr-1" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?= site_url("Pages/Home"); ?>">Accueil<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="formulaire.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url("produits/liste"); ?>">Liste</a>
          </li>
        </ul>

        <?php if ($this->session->role == "admin" || $this->session->role == "client") { ?>

          <p class="text-light">Bonjour <?= $this->session->login; ?> ! </p>
          <a class="btn btn-danger" name="deconnexion" href="<?= site_url("connexion/logout"); ?>">Déconnexion</a>
          <a type="button" class="btn btn-success" href="<?= site_url("panier/afficherPanier"); ?>">
            Panier <span class="badge badge-dark"><?php if($this->session->panier) echo count($this->session->panier)?> </span>
        </a>     
      </div>
    </nav>

  <?php } else { ?>

    <div class="">
      <span class="navbar-text">
        Connectez vous !
      </span>
      <button class="btn btn-danger position-relative" id="btnco" name="formconn" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Connexion
      </button>
    </div>

    </nav>
    <div class="collapse" id="collapseExample">
      <div class="card card-body bg-dark">
        <div class="form">

          <div class="form-group">
            <a href="<?= site_url("connexion/signup"); ?>" class="btn btn-success  btn-lg btn-block">Se connecter</a>
          </div>
          <div class="form-group">
            <a href="<?= site_url("connexion/registration"); ?>" class="btn btn-warning  btn-lg btn-block">S'incrire</a>
          </div>
        </div>
      </div>

    <?php } ?>


    <!-- <a href="tableau.php"><img src="" alt="photo" title="photo" class="img-fluid"> </a> -->
  </header>
  