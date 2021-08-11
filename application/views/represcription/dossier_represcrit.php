<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
	<title>3H-Pharmacien</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url().'assets/images/3hlogo.png';?>"/>
  <link href="<?= base_url().'assets/css/bootstrap.min.css';?>" rel="stylesheet">
  <link href="<?= base_url().'assets/css/3-col-portfolio.css';?>" rel="stylesheet">
	<link href="<?= base_url().'assets/css/styles.css';?>" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url().'assets/css/summernote.css';?>">
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
            <?php if($donnees->images){?>
            <?php //var_dump($donnees->images);exit;?>
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<img src="<?= base_url();?>assets/images/pharmacien/<?= $donnees->images;?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
							<span class="caret"></span></a>
              <?php } else{?>
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<img src="<?= base_url().'assets/images/defaut.png';?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
							<span class="caret"></span></a>
              <?php }?>
						<ul class="dropdown-menu">
							<li><a href="<?= base_url().'personnels/ProfilPage';?>"><i class="glyphicon glyphicon-user">Profile</i></a></li>
						  <li class="divider"></li>
						  <li><a href="<?=base_url().'login/deconnexion'?>"><span class="glyphicon glyphicon-log-out" style="color:red;"> Se déconnecter</span></a></li>
						</ul>
					</li>
				</ul>
			</div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
          <li class="elt-menu accueil">
            <a href="<?= base_url().'Pharmacien/index';?> "title="accueil">Accueil</a>
          </li>
          <li class="elt-menu patients">
            <a href="#" titel="listing patient">Patients</a>
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
        <?php if($donnees->images){?>
          <a href="#">
            <img src="<?= base_url();?>assets/images/pharmacien/<?= $donnees->images;?>" style="height:80px; width:80px;" class="img-circle img-responsive" alt="">
          </a> 
        <?php } else{?>
          <a href="#">
            <img src="<?= base_url().'assets/images/defaut.png';?>" style="height:80px; width:80px;" class="img-circle img-responsive" alt="">
          </a> 
        <?php } ?>
      </div>
      <div class="col-content-small">
        <div class="col-content-elt info-profile">
          <h4>
            <a href="#">Bienvenue <span><?= $donnees->nom_pharmacien;?></span></a>
          </h4>
          <p><span>Hospital - Hostile - Home</span>
              <span><?= $donnees->adresse;?></span>
              <p><span>Pharmacien</span>
                      <span><?= $donnees->adresse;?></span>
                    <span>En service à la pharmacie <strong><?= $round->nom_pharmacie;?></strong> </span>
              </p>
          </p>
        </div>
      </div>
      <a href="#" class="col-content-ato boutonlink"><p class="text-center"> Voir mon profil</p></a>
    </div>
    <div class="row">
      <div class="col-md-12 cdg-right" style="height:auto;">
        <div class="shadow" >
    			<div class="col-content-small post-element clearfix">
    				<span class="p-reglages p-menu"></span>
            <h3 class="titre-p-menu">represcription medicale</h3>
						<div class="text-right">
              <a href="<?= base_url().'pharmacien/Checkoperation';?>" class="btn btn-success" title="liste operation"><i class="glyphicon glyphicon-list"></i>Retour a la recherche</a>
						</div>
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
            
						<form action="<?= base_url().'pharmacien/faire_represcription/';?>" method="post">
              <?php foreach($rend as $render):?>
              <?= $render->date_operation;?>
              <div class="col-lg-12" >
                  <div class="form-group">
                    <div class="col-lg-12">
                      <label for="">Nom du Patient</label>
                      <input type="text" class="form-control"disabled="disabled" value="<?= $render->nom_patient;?> <?= $render->prenom_patient;?>">
                      <input type="hidden" class="form-control" name="id_patient" value="<?= $render->id_patient;?>" >	
                      <input type="hidden" class="form-control" name="id_operation" value="<?= $render->id_operation;?>" >	
                    </div>
                  </div> 
                  
                  <div class="form-group">
                    <div class="col-lg-12">
                      <label> Allergie</label>
                      <textarea  class="summertext" name="allergie" placeholder="Exemple: Asthme...."><?= $render->allergie;?></textarea>
                      <span style="color:red;"><?= form_error('allergie');?></span>
                    </div>
                  </div>
                 
                  <?php endforeach;?>
                  <div class="form-group">
                    <div class="col-lg-12">
                      <label> Prescription</label>
                      <textarea name="prescribe" class="summertext" class="form-control" value="" rows="3" placeholder="Exemple: Paracétamol,anti douleur,anti stress etc..."></textarea>
                      <span style="color:red;"><?= form_error('prescribe');?></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-12">
                      <label> Commentaire</label>
                      <textarea name="comment" class="summertext"  cols="30" rows="3" class="form-control" placeholder="Exemple: Commentaire sur l'operation effectuée.."></textarea>
                      <span style="color:red;"><?= form_error('comment');?></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-success" value="submit" name="register" ><i class="glyphicon glyphicon-pencil"></i> Update</button>
                  </div>
						    </form>
              </div>
            </div>          
					</div>
        </div>
			</div>
    </div>
  </div>
</body>
</html>


