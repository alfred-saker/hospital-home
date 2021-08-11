<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url().'assets/images/3hlogo.png';?>"/>
  <title>3H-Personnel</title>
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
      </div>
      <a class="navbar-brand" href="#">
				<img src="" class="img-responsive" alt="">
			</a>
			<div class="menu-profile">
				<ul class="nav nav-tabs">
					<li class="dropdown">
					  <?php if($donnees->images){?>
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<img src="<?= base_url();?>assets/images/personnel/<?= $donnees->images;?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
							<span class="caret"></span></a>
					  <?php } else{?>
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<img src="<?= base_url().'assets/images/defaut.png';?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
							<span class="caret"></span></a>
					  <?php } ?>
						<ul class="dropdown-menu">
							<li><a href="<?= base_url().'personnels/ProfilPage';?>" class="glyphicon glyphicon-user">Profile</a></li>
						    <li><a href="#"><i class="glyphicon glyphicon-cog">Paramètres</i></a></li>
						    <li class="divider"></li>
						    <li><a href="<?= base_url().'login/deconnexion';?>"><span class="glyphicon glyphicon-log-out" style="color:red;"> Se déconnecter</span> </a></li>
						</ul>
					</li>
				</ul>
			</div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="elt-menu accueil">
            <a href="<?= base_url().'Personnels/index';?> "title="accueil">Accueil</a>
          </li>
          <li class="elt-menu patients">
            <a href="<?= base_url().'Personnels/listPatient';?>" titel="ajouter patient">Patients</a>
          </li>
          <li class="elt-menu notification">
            <a href="#">Historique</a>
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
              <?php if ($donnees->images) {?>     
                <a href="<?= base_url().'personnels/ProfilPage';?>">
                  <img src="<?= base_url();?>assets/images/personnel/<?= $donnees->images;?>" style="height:80px; width:80px;" class="img-circle img-responsive" alt="">
                </a> 
              <?php } else{?>
                <a href="<?= base_url().'personnels/ProfilPage';?>">
                  <img src="<?= base_url().'assets/images/defaut.png';?>" style="height:80px; width:80px;" class="img-circle img-responsive" alt="">
                </a>
              <?php }?>
            </div>
            <div class="col-content-small">
              <div class="col-content-elt info-profile">
                <h4>
                  <a href="#">Bienvenue <span><?= $donnees->nom_personnel;?></span></a>
                </h4>
                <p><span>Hospital-Hostile-Home</span>
                	<span><?= $donnees->adresse;?></span>
                	<p><span><?php foreach($enrol as $enroll):?>
                    <strong><?= $enroll->nom_type_personnel;?></strong> à l'hôpital <strong><?= $enroll->nom_hopital;?></strong>
                    <?php endforeach; ?>
                    </span>
                  </p>
                </p>
              </div>
            </div>
            <center><a href="#" class="col-content-ato boutonlink">Voir mon profil</a></center>
          </div>
				</div> 
        <span><em>Personnel</em> </span>
        <div class="col-lg-12 cdg-left">
          <div class="shadow">
            <div class="col-content-small post-element clearfix">
              <span class="p-doctar p-menu"></span>
              <h3 class="titre-p-menu"><a href="<?= base_url();?>personnels/';?>">Personnel</a> - options</h3>
            </div>
    				<div class="col-content-small post-element">
    					<?php
                $success_msg= $this->session->flashdata('success');
                $error_msg= $this->session->flashdata('error');
                if($success_msg){
              ?>
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
                  <?php }?>   
                <?=  validation_errors();?>
                <div class="col-md-4 cdg-left">
                  <form  method="post" action="<?= base_url();?>personnels/check_verify">
                    <h4 class="text-center">Veuillez verifier si le patient est deja dans le systeme</h4>
                    <div class="form-group">
                      <input type="email"  placeholder="Email*" value="<?= set_value('email');?>" class="form-control" name="email">
                      <span style="color:red;"><?= form_error('email');?></span>
                    </div>
                    <div class="form-group">
                      <input type="password"  placeholder="Code*" class="form-control" name="code">
                     <span style="color:red;"><?= form_error('code');?></span>
                    </div> 
                    <div class="form-group">
                      <button type="submit" class="btn btn-success" value="connexion" name="login">verification</button>
                    </div>  
                  </form>
                </div>
                <div class="col-md-4 cdg-left">
                  <h1 class="text-center"><a href="<?= base_url();?>personnels/ajouterPatient" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Ajouter un nouveau patient</a></h1>
                </div>
                <div class="col-md-2 cdg-left">
                  <h1 class="text-center"><a href="<?= base_url();?>personnels/listPatient" class="btn btn-success"><i class="glyphicon glyphicon-th-list"></i> Liste des patients</a></h1>
                </div>
                <div class="col-md-2 cdg-left">
                  <h1 class="text-center"><a href="<?= base_url();?>operations/index" class="btn btn-success"><i class="glyphicon glyphicon-th-list"></i> Liste des operations</a></h1>
                </div>
              </div>
            </div>
				  </div>
        </div> 
        </div>
      </div>
    </div> 
  </div>
</body>
</html>