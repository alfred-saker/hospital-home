<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
		<title>3H-Personnel</title>

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
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<img src="<?= base_url();?>assets/images/personnel/<?= $donnees->images;?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
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
				<button type="submit" class="btn btn-default">Ok</button>
			</form>
        </div>
    </nav>
    <div class="container principal">
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
          <?php } ?>
        </div>
        <div class="col-content-small">
          <div class="col-content-elt info-profile">
            <h4>
              <a href="#">Bienvenue <span><?= $donnees->nom_personnel;?></span></a>
            </h4>
            <p><span>Hospital - Hostile - Home</span>
                <span><?= $donnees->adresse;?></span>
            <p><span><?php foreach($datas as $data):?>
              <strong><?= $data->nom_type_personnel;?></strong> à l'hôpital <strong><?= $data->nom_hopital;?></strong>
              <?php endforeach; ?>
              </span>
            </p>
          </div>
        </div>
          <a href="#" class="col-content-ato boutonlink"><p class="text-center"> Voir mon profil</p></a>
      </div>
      <div class="row">
      <div class="col-md-12 cdg-right">
        <div class="shadow">
    			<div class="col-content-small post-element clearfix">
    				<span class="p-reglages p-menu"></span>
            <h3 class="titre-p-menu">operation medicale</h3>
						<!-- <div class="text-right">
							<a href="<?= base_url().'Personnels/check_verify';?>" class="btn btn-success" title="retour à la page précédente">Retour</a>
							<a href="<?= base_url().'Personnels/listePatient';?>" class="btn btn-success" title="Effectuer une operation"><i class="glyphicon glyphicon-user"></i>Selectionner un autre patient</a>
						</div> -->
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
							<?php
							}
						?>
						<form  method="post" action="<?= base_url();?>operations/faireOperation/<?= $value->id_patient;?>">
            <div class="form-group">
							<label for="">Nom du Patient</label>
							<input type="text" class="form-control" value="<?= $value->nom_patient;?> <?= $value->prenom_patient;?>">
							
						</div>  
						<div class="form-group">
								<label> Type de l'operation</label>
								<select data-placeholder="" name="type" value="<?= set_value('type');?>" class="form-control">
									<?php foreach ($funct as $keys) {?>
									<option value="<?= $keys->id_typeOperation;?>"><?= $keys->nom;?></option>
								<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label> Allergie</label>
								<textarea  class="summertext" name="allergie" value="" placeholder="Exemple: Asthme...."></textarea>
								<span style="color:red;"><?= form_error('allergie');?></span>
							</div>
							<div class="form-group">
								<label> Prescription</label>
								<textarea name="prescribe" class="summertext" class="form-control" value="<?= set_value('prescribe');?>" rows="3" placeholder="Exemple: Paracétamol,anti douleur,anti stress etc..."></textarea>
								<span style="color:red;"><?= form_error('prescribe');?></span>
							</div>
							<div class="form-group">
								<label> Résultat</label>
								<textarea name="result" class="summertext" class="form-control" value="<?= set_value('result');?>" rows="3" placeholder="Exemple: le patient john souffre d'une anemie severe..."></textarea>
								<span style="color:red;"><?= form_error('result');?></span>
							</div>
							<div class="form-group">
								<label> Description</label>
								<textarea name="describe" class="summertext" value="<?= set_value('describe');?>" cols="30" rows="3" class="form-control" placeholder="Exemple:L'Anemie s'est propagée de..."></textarea>
								<span style="color:red;"><?= form_error('describe');?></span>
							</div>
							<div class="form-group">
								<label> Commentaire</label>
								<textarea name="comment" class="summertext" value="<?= set_value('comment');?>" cols="30" rows="3" class="form-control" placeholder="Exemple: Commentaire sur l'operation effectuée.."></textarea>
								<span style="color:red;"><?= form_error('comment');?></span>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-success " value="enregistrer" name="register">Enregistrer</button>
							</div>
						</form>
					</div>
        </div>
			</div>
    </div>
  </div>
</body>
</html>


