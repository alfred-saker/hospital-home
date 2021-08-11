<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url().'assets/images/3hlogo.png';?>"/>
    <title>3H-Pharmacie</title>
    <link href="<?= base_url().'assets/css/bootstrap.min.css';?>" rel="stylesheet">
    <link href="<?= base_url().'assets/css/3-col-portfolio.css';?>" rel="stylesheet">
	  <link href="<?= base_url().'assets/css/styles.css';?>" rel="stylesheet">
</head>
<body>
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
					    <img src="<?= base_url().'assets/images/logo.png';?>" class="img-responsive" alt="">
				    </a>
          </div>
          <div class="menu-profile">
            <ul class="nav nav-tabs">
              <li class="dropdown">
              <?php if($resultat->images){?>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  <img src="<?= base_url();?>assets/images/pharmacie/<?= $resultat->images;?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
                  <span class="caret"></span></a>
                <?php } else{?>
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  <img src="<?= base_url().'assets/images/defaut.png';?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
                  <span class="caret"></span></a>
                <?php }?>
                <ul class="dropdown-menu">
                  <li><a href="<?= base_url().'Pharmacie/UpdateProfil';?>"><i class="glyphicon glyphicon-user">Profile</i></a></li>
                  <li class="divider"></li>
                  <li><a href="<?= base_url().'login/deconnexion'?>"><span class="glyphicon glyphicon-log-out" style="color:red;">Se déconnecter</span></a></li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="elt-menu accueil">
                <a href="<?= base_url().'Pharmacie/index';?>">Accueil</a>
              </li>
              <li class="elt-menu medecin">
                <a href="<?= base_url().'Pharmacie/listPharmacien';?>">Pharmacien</a>
              </li> 
              <li class="elt-menu notification">
                <a href="#">Notifications</a>
              </li>
              <li class="elt-menu message">
                <a href="#">Messages</a>
              </li>
            </ul>
          </div>
          <form class="form-inline form-search">
            <div class="form-group">
              <input type="search" class="form-control" id="inputsearch" placeholder="Medecin, hôpital, pharmacie, ...">
            </div>
            <button type="submit" class="btn btn-primary">Ok</button>
          </form>
        </div>
      </nav>
      <div class="container principal">
        <div class="shadow">
          <div class="smallban">
          <?php if($resultat->images){?>
            <a href="<?= base_url().'pharmacie/UpdateProfil';?>">
              <img src="<?= base_url();?>assets/images/pharmacie/<?= $resultat->images;?>" style="height:80px; width:80px;" class="img-circle img-responsive" alt="">
            </a> 
          <?php } else{?>
            <a href="<?= base_url().'pharmacie/UpdateProfil';?>">
              <img src="<?= base_url().'assets/images/defaut.png';?>" style="height:80px; width:80px;" class="img-circle img-responsive" alt="">
            </a> 
          <?php }?>
          </div>
          <div class="col-content-small">
            <div class="col-content-elt info-profile">
              <h4>
                <a href="#">Bienvenue <span>Admin <?= $resultat->nom_pharmacie;?></span></a>
              </h4>
              <p><span>Hospital - Hostile - Home</span>
                <span><?= $resultat->pays;?> ,<?= $resultat->ville;?> ,<?= $resultat->quartier;?> BP: <?= $resultat->boite_postal;?></span>
                <span><strong>Pharmacie - <?= $resultat->nom_pharmacie;?></strong> </span>
              </p>
            </div>
          </div>
          <a href="#" class="col-content-ato boutonlink"><p class="text-center"> Voir mon profil</p></a>
        </div>
    </div>
</body>
</html>
