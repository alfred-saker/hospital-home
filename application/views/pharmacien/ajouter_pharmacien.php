<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url().'assets/images/3hlogo.png';?>"/>
  <title>Pharmacies - ajouter pharmacien</title>
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
							<span class="caret"></span>
            </a>
            <?php } else{?>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<img src="<?= base_url().'assets/images/defaut.png';?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
							<span class="caret"></span>
            </a>
            <?php }?>
						<ul class="dropdown-menu">
							<li><a href="<?= base_url().'pharmacie/UpdateProfil';?>"><i class="glyphicon glyphicon-user"></i>Profile</a></li>
						  <li class="divider"></li>
						  <li><a href="<?= base_url().'login/deconnexion'?>"><span class="glyphicon glyphicon-log-out" style="color:red;"> Se déconnecter</span></a></li>
						</ul>
					</li>
				</ul>
			</div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav">
          <li class="elt-menu accueil">
            <a href="<?= base_url().'Pharmacie/index';?>">Accueil</a>
          </li> 
          <li class="elt-menu medecin active">
            <a href="<?= base_url().'pharmacie/listPharmacien';?>" title="liste pharmacien">Pharmacien</a>
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
    <div class="row">
      <div class="col-md-12 big-bloc-left">
        <div class="col-md-12 cdg-left">
					<div class="shadow">
            <div class="smallban">
              <?php if($resultat->images){?>
                <a href="#">
                  <img src="<?= base_url();?>assets/images/pharmacie/<?= $resultat->images;?>" style="height:80px; width:80px;" class="img-circle img-responsive" alt="">
                </a>
              <?php } else{?>
                <a href="#">
                  <img src="<?= base_url().'assets/images/defaut.png';?>" style="height:80px; width:80px;" class="img-circle img-responsive" alt="">
                </a>
              <?php }?>
            </div>
            <div class="col-content-small">
              <div class="col-content-elt info-profile">
                <h4>
                  <a href="#">Bienvenue <span><?= $resultat->nom_pharmacie;?></span></a>
                </h4>
                <p><span>Hospital - Hostile - Home</span>
                  <span><?= $resultat->pays;?> ,<?= $resultat->ville;?> ,<?= $resultat->quartier;?> , BP: <?= $resultat->boite_postal;?></span>
                  <span><strong>Pharmacie - <?= $resultat->nom_pharmacie;?></strong> </span>
                </p>
              </div>
            </div>
            <center><a href="#" class="col-content-ato boutonlink">Voir mon profil</a></center>
          </div>
				</div>
        <div class="col-md-12 cdg-left"> 
          <div class="shadow">
            <div class="col-content-small post-element clearfix">
              <span class="p-phar p-menu"></span>
              <h3 class="titre-p-menu"><a href="<?php echo base_url().'Pharmacie/index';?>"> Pharmacie</a> / Ajouter un pharmacien </h3>
              <div class="text-right"><a href="<?= base_url().'Pharmacie/listPharmacien';?>" class="btn btn-success" title="liste des pharmacien"><i class="glyphicon glyphicon-list"></i> Liste phramacien</a></div>
            </div>
            <div class="col-content-small post-element">
              <?php
                $success_msg= $this->session->flashdata('success_msg');
                $error_msg= $this->session->flashdata('error_msg');
                if($success_msg){?>
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <?= $success_msg; ?>
              </div>
              <?php } if($error_msg){ ?>
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <?= $error_msg; ?>
              </div>
              <?php } ?>
              <?php validation_errors();?>
              <form class="" method="post" action="<?php echo base_url().'Pharmacie/ajouterPharmacien';?>">
                <div class="col-md-6">
                  <div class="form-group">
                    <label> Nom</label>
                    <input type="text" class="form-control" value="<?= set_value('nom');?>" placeholder=" nom du pharmacien" name="nom">
                    <span style="color:red;"><?= form_error('nom');?></span>
                  </div>
                </div>  
                <div class="col-md-6">
                  <div class="form-group">
                    <label> Email</label>
                    <input type="email" class="form-control" value="<?= set_value('email');?>" placeholder="email" name="email">
                    <span style="color:red;"><?= form_error('email');?></span>
                  </div> 
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label> Téléphone</label>
                    <input type="text" class="form-control" value="<?= set_value('telephone');?>" placeholder= "666 66 66 66 " name="telephone">
                    <span style="color:red;"><?= form_error('telephone');?></span>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label> Adresse</label>
                    <input type="text" class="form-control" value="<?= set_value('adresse');?>" placeholder=" Cameroun, Douala" name="adresse">
                    <span style="color:red;"><?= form_error('adresse');?></span>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label> Username</label>
                    <input type="text" class="form-control" value="<?= set_value('username');?>" placeholder="nom d'utilisateur" name="username">
                    <span style="color:red;"><?= form_error('username');?></span>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label >Sexe</label>
                    <label class="radio-inline"><input type="radio" name="sexe" value="Homme">Homme</label>
                    <label class="radio-inline"><input type="radio" name="sexe" value="Femme">Femme</label>
                    <span style="color:red;"><?= form_error('sexe');?></span>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <button type="submit" class="btn btn-default" value="enregistrer" name="register">Enregistrer</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
</body>
</html>
