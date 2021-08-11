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
        <a class="navbar-brand" href="#">
					<img src="<?= base_url().'assets/images/logo.png';?>" class="img-responsive" alt="">
				</a>
      </div>
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
            <a href="<?= base_url().'Personnels/verify';?>" titel="listing patient">Patients</a>
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
				<div class="shadow">
          <div class="smallban">
					<?php if($donnees->images){?>
            <a href="#">
              <img src="<?= base_url();?>assets/images/personnel/<?= $donnees->images;?>" style="height:80px; width:80px;" class="img-circle img-responsive" alt="">
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
                <a href="#">Bienvenue <span><?= $donnees->nom_personnel;?></span></a>
              </h4>
              <p><span>Hospital - Hostile - Home</span>
							  <span><?= $donnees->adresse;?></span>
							  <span><?php foreach($enrol as $enroll):?>
                <strong><?= $enroll->nom_type_personnel;?></strong> à l'hôpital <strong><?= $enroll->nom_hopital;?></strong>
                <?php endforeach; ?>
                </span>
              </p>
            </div>
          </div>
          <a href="#" class="col-content-ato boutonlink"><p class="text-center"> Voir mon profil</p></a>
        </div>
			</div>
				<div class="col-md-12 cdg-right">
          <div class="shadow">
    					<div class="col-content-small post-element clearfix">
								<span class="p-reglages p-menu"></span>
                <h3 class="titre-p-menu"><a href="<?= base_url().'Personnels/';?>">Personnels</a> / Ajouter un patient</h3>
                <div class="text-right"><a href="<?= base_url().'operations/index';?>" class="btn btn-success" title="liste des operations">Liste des operations</a></div>
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
                  <?php
                  }
                  if($error_msg){
                    ?>
                    <div class="alert alert-danger">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            						<span aria-hidden="true">&times;</span>
        							</button>
                      <?= $error_msg; ?>
                    </div>
                    <?php }?>
                <?php validation_errors();?>
							<form method="post" action="<?= base_url().'Personnels/ajouterPatient'?>">
								<div class="form-group">
                  <div class="col-md-4">
                    <label> Nom</label>
                    <input type="text" class="form-control" value="<?= set_value('nom');?>" placeholder="nom du patient" name="nom">
                    <span style="color:red;"><?= form_error('nom');?></span>
                  </div>
								</div>
								<div class="form-group">
                  <div class="col-md-4">
                    <label> Prenom</label>
                    <input type="text" class="form-control" value="<?= set_value('prenom');?>" placeholder="prenom du patient" name="prenom">
                    <span style="color:red;"><?= form_error('prenom');?></span>
                  </div>
								</div>
								<div class="form-group">
                  <div class="col-md-4">
                    <label> Email</label>
                    <input type="email" class="form-control" value="<?= set_value('email');?>" placeholder="votre email" name="email">
                    <span style="color:red;"><?= form_error('email');?></span>
                  </div>
								</div>
								<div class="form-group">
                  <div class="col-md-4">
                    <label> Date de naissance</label>
                    <input type="date" class="form-control" value="<?= set_value('date');?>" max="<?= date('Y-m-d')?>" name="date">
                    <span style="color:red;"><?= form_error('date');?></span>
                  </div>
								</div>
								<div class="form-group">
                  <div class="col-md-4">
                    <label> Téléphone</label>
                    <input type="text" class="form-control"  value="<?= set_value('telephone');?>" placeholder="Exemple: 666 66 66 66 " name="telephone">
                    <span style="color:red;"><?= form_error('telephone');?></span>
                  </div>
								</div>
                <div class="form-group">
                  <div class="col-md-4">
                    <label> Personne à contacter</label>
                    <input type="text" class="form-control"  value="<?= set_value('telephone2');?>" placeholder="Exemple: 666 66 66 66 " name="telephone2">
                    <span style="color:red;"><?= form_error('telephone2');?></span>
                  </div>
								</div>
								<div class="form-group">
                  <div class="col-md-4">
                    <label> Pays</label>
                    <input type="text" class="form-control" value="<?= set_value('pays');?>" placeholder="Pays" name="pays">
                    <span style="color:red;"><?= form_error('pays');?></span>
                  </div>
								</div>
                <div class="form-group">
                  <div class="col-md-4">
                    <label> Ville</label>
                    <input type="text" class="form-control" value="<?= set_value('ville');?>" placeholder="Ville" name="ville">
                    <span style="color:red;"><?= form_error('ville');?></span>
                  </div>
								</div><div class="form-group">
                  <div class="col-md-4">
                    <label> Quartier</label>
                    <input type="text" class="form-control" value="<?= set_value('quartier');?>" placeholder="Quartier" name="quartier">
                    <span style="color:red;"><?= form_error('quartier');?></span>
                  </div>
								</div>
                <div class="form-group">
                  <div class="col-md-4">
                    <label> Groupe Sanguin</label>
                    <select name="groupe_sanguin" class="form-control">
                      <option value="">Selectionner le groupe sanguin</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="O">O</option>
                      <option value="AB">AB</option>
                    </select>
                    <span style="color:red;"><?= form_error('groupe_sanguin');?></span> 
                  </div>
								</div>
                <div class="form-group">
                  <div class="col-md-12">
                    <label> Rhesus </label>
                    <input type="radio" name="rhesus" value="+">plus(+)
                    <input type="radio" name="rhesus" value="-">moins(-)
                    <span style="color:red;"><?= form_error('rhesus');?></span> 
                  </div>
								</div>
                <div class="form-group">
                  <div class="col-md-12">
                    <label> Sexe </label>
                    <input type="radio" name="sexe" value="Homme">Homme
                    <input type="radio" name="sexe" value="Femme">Femme
                    <span style="color:red;"><?= form_error('sexe');?></span> 
                  </div>
								</div>
								<div class="form-group">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-success" value="enregistrer" name="register">Enregistrer</button>
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
