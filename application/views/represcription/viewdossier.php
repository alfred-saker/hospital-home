
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url().'assets/images/3hlogo.png';?>"/>
    <title>3H-carnet</title>
    <link href="<?= base_url().'assets/css/bootstrap.min.css';?>" rel="stylesheet">
    <link href="<?= base_url().'assets/css/3-col-portfolio.css';?>" rel="stylesheet">
	<link href="<?= base_url().'assets/css/styles.css';?>" rel="stylesheet">
</head>
<style>
  .logoImage{
    height:130px; 
    width:130px;
    position: absolute;
    bottom:10px;
    right:20px;
    
  }
  .profilImage{
    height:130px; 
    width:130px;
    position: absolute;
    bottom:10px;
  }
</style>
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
				<img src="<?= base_url().'assets/images/3hlogo.png';?>" style="height:40px; width:50px;" class="img-responsive" alt="">
			</a>
			<div class="menu-profile">
				<ul class="nav nav-tabs">
					<li class="dropdown">
            <?php if ($donnees->images) {?>
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<img src="<?= base_url();?>assets/images/pharmacien/<?= $donnees->images;?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
							<span class="caret"></span></a>
              <?php } else{?>
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<img src="<?= base_url().'assets/images/defaut.png';?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
							<span class="caret"></span></a>
              <?php }?>
						<ul class="dropdown-menu">
							<li><a href="<?= base_url().'pharmacien/ProfilPage';?>"><i class="glyphicon glyphicon-user">Profile</i></a></li>
						  <li class="divider"></li>
						  <li><a href="<?= base_url().'login/deconnexion'?>"><span class="glyphicon glyphicon-log-out" style="color:red;"> Se déconnecter</span></a></li>
						</ul>
					</li>
				</ul>
			</div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="elt-menu accueil">
            <a href="<?= base_url().'pharmacien/index';?> "title="accueil">Accueil</a>
          </li>
          <li class="elt-menu patients">
            <a href="#" titel="ajouter patient">Patients</a>
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
            
              <?php if ($donnees->images) {?>
                <a href="<?= base_url().'pharmacien/ProfilPage';?>">
                  <img src="<?= base_url();?>assets/images/pharmacien/<?= $donnees->images;?>" style="height:80px; width:80px;" class="img-circle img-responsive" alt="">
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
                      <a href="#">Bienvenue <span><?= $donnees->nom_pharmacien;?></span></a>
                    </h4>
                    <p><span>Hospital-Hostile-Home</span>
                	    <span>Adresse: <?= $donnees->adresse;?></span>
                      <span>En service à la pharmacie <strong><?= $round->nom_pharmacie;?></strong> </span>
                    </p>
                    </p>
                  </div>
                </div>
                <center><a href="#" class="col-content-ato boutonlink">Voir mon profil</a></center>
              </div>
            <div>
              <div class="col-md-12 big-bloc-left" style="border:10px green solid; height:auto;">
                <div>
                  <h2 class="text-center"><u> Etablissement Hospital Hostile Home (3H)</u></h2>
                  <hr>
                  <h1 class="text-center"><strong>Carnet de Santé Medical</strong></h1> 
                  <a href="<?= base_url().'assets/images/3hlogo.png';?>">
                  <img src="<?= base_url().'assets/images/3hlogo.png';?>" style="height:120px; width:120px;" class="logoImage" alt=""></a>
                      <?php if ($users_profil->images){?>
                      <a href="<?= base_url();?>assets/images/patient/<?= $users_profil->images;?>" target="_blank">
                      <img src="<?= base_url();?>assets/images/patient/<?= $users_profil->images;?>"  class="profilImage" alt="">
                      </a>
                    <?php } else { ?>
                      <a href="<?= base_url().'assets/images/defaut.png';?>">
                      <img src="<?= base_url().'assets/images/defaut.png';?>" class="profilImage" alt="">
                    </a>
                    <?php }?>
                </div>
              </div>
              
              <div class="col-md-12 big-bloc-left" style="border:5px green solid; height:auto;">
                <div class="text-right">
                  <a href="<?= base_url();?>pharmacien/Checkoperation" class="btn btn-success">retour</a>
                </div>
                
                <div class="col-md-12">
                  <h2 class="text-center"><strong><u> Informations du Patient </u></strong></h2>
                </div>
                <div class="col-md-4">
                  <strong>Nom: </strong> <span><?= $users_profil->nom_patient;?></span>
                </div>
                <div class="col-md-4">
                  <strong>Prenom:</strong> <span><?= $users_profil->prenom_patient;?></span>
                </div>
                <div class="col-md-4">
                  <strong>Date de Naissance:</strong> <span><?= $users_profil->date_naissance;?></span>
                </div>
                <div class="col-md-4">
                  <strong>Email:</strong> <span><?= $users_profil->email;?></span>
                </div>
                <div class="col-md-4">
                  <strong>Sexe:</strong> <span><?= $users_profil->sexe;?></span>
                </div>
                <div class="col-md-4">
                  <strong>Pays:</strong> <span><?= $users_profil->pays;?></span>
                </div>
                <div class="col-md-4">
                  <strong>Ville:</strong> <span><?= $users_profil->ville;?></span>
                </div><div class="col-md-4">
                  <strong>Quartier:</strong> <span><?= $users_profil->quartier;?></span>
                </div>
                <div class="col-md-4">
                  <strong>Telephone:</strong> <span><?= $users_profil->telephone;?></span>
                </div>
                <div class="col-md-4">
                  <strong>Personne à contacter:</strong> <span><?= $users_profil->telephone2;?></span>
                </div>
                <div class="col-md-4">
                  <strong>Groupe Sanguin:</strong> <span><?= $users_profil->groupe_sanguin;?></span>
                </div>
                <div class="col-md-4">
                  <strong>Rhésus:</strong> <span><?= $users_profil->rhesus;?></span>
                </div>
                <div class="col-md-12">
                  <h2 class="text-center"><strong><u> Examen et Résultat </u></strong></h2>
                </div>
                
                <div class="col-md-12">
                  <h2 class="text-center"><strong><u> Examen du <?= $row->date_operation;?> </u></strong></h2>
                </div>
                <div class="col-md-12">
                  <strong>Examen:</strong><span style="font-size:20px;"><?= $row->nom;?></span>
                </div>
                <div class="col-md-12">
                  <strong>Allergie:</strong> <span><?= $row->allergie;?></span>
                </div> 
                
                
                <div class="col-md-12">
                  <strong>Résultat:</strong> <br>
                  <p><?= $row->resultat;?></p>
                </div>
                <div class="col-md-12">
                  <strong>Prescription:</strong> <br>
                  <p><?= $row->prescription;?></p>
                </div>
                <div class="col-md-12">
                  <strong>Description:</strong> <br>
                  <p><?= $row->description_op;?></p>
                </div>
                <div class="col-md-12">
                  <strong>Commentaire</strong> <br>
                  <p><?= $row->commentaire;?></p>
                </div>
                <div class="col-md-12">
                <p><strong>Dr <?= $row->nom_personnel;?></strong></p>
                <p><strong><?= $row->nom_type_personnel;?> à l'hopital <?= $row->nom_hopital;?>.</strong></p>
                </div>
              </div>
              <div class="col-md-12 big-bloc-left" style="border:3px green solid; height:auto; background-color:green;">
              </div>
            </div>
				    </div>
          </div>
        </div>
      </div>
</body>
</html>