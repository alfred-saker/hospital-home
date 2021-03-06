
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
							<img src="<?= base_url();?>assets/images/personnel/<?= $donnees->images;?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
							<span class="caret"></span></a>
              <?php } else{?>
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<img src="<?= base_url().'assets/images/defaut.png';?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
							<span class="caret"></span></a>
              <?php }?>
						<ul class="dropdown-menu">
							<li><a href="<?= base_url().'personnels/ProfilPage';?>"><i class="glyphicon glyphicon-user">Profile</i></a></li>
						  <li><a href="#"><i class="glyphicon glyphicon-cog">Param??tres</i></a></li>
						  <li class="divider"></li>
						  <li><a href="<?= base_url().'login/deconnexion'?>"><span class="glyphicon glyphicon-log-out" style="color:red;"> Se d??connecter</span></a></li>
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
            <a href="<?= base_url().'personnels/test';?>">Notifications</a>
          </li>
          <li class="elt-menu message">
            <a href="#">Messages</a>
          </li>
        </ul>
      </div>
			<form class="form-inline form-search">
				<div class="form-group">
					<input type="search" class="form-control" id="inputsearch" placeholder="Medecin, h??pital, pharmacie, ...">
				</div>
				<button type="submit" class="btn btn-default">Ok</button>
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
                        <strong><?= $enroll->nom_type_personnel;?></strong> ?? l'h??pital <strong><?= $enroll->nom_hopital;?></strong>
                      <?php endforeach; ?>
                      </span>
                    </p>
                    </p>
                  </div>
                </div>
                <center><a href="#" class="col-content-ato boutonlink">Voir mon profil</a></center>
              </div>
            <div>
              <div class="col-md-12 big-bloc-left" style="border:10px green solid; height:auto;">
                <div>
                  <h2 class="text-center"><u> Etablissement Hospital Hostile Home (3H)</u> <a href="<?= base_url().'personnels/pdfDownload/'.$values->id_patient;?>"><i class="glyphicon glyphicon-cloud-download"></i></a></h2>
                  <hr>
                  <h1 class="text-center"><strong>Carnet de Sant?? Medical</strong></h1>  
                  <a href="<?= base_url().'assets/images/3hlogo.png';?>">
                  <img src="<?= base_url().'assets/images/3hlogo.png';?>" style="height:120px; width:120px;" class="logoImage" alt=""></a>
                      <?php if ($values->images){?>
                      <a href="<?= base_url();?>assets/images/patient/<?= $values->images;?>">
                      <img src="<?= base_url();?>assets/images/patient/<?= $values->images;?>"  class="profilImage" alt="">
                      </a>
                    <?php } else { ?>
                      <a href="<?= base_url().'assets/images/defaut.png';?>">
                      <img src="<?= base_url().'assets/images/defaut.png';?>" class="profilImage" alt="">
                    </a>
                    <?php }?>
                </div>
              </div>
              <div class="col-md-12 big-bloc-left" style="border:5px green solid; height:auto;">
                <div class="col-md-12">
                  <h2 class="text-center"><strong><u> Informations du Patient </u></strong></h2>
                </div>
                <input type="text">
                <div class="col-md-4">
                  <strong>Nom: </strong> <span><?= $values->nom_patient;?></span>
                </div>
                <div class="col-md-4">
                  <strong>Prenom:</strong> <span><?= $values->prenom_patient;?></span>
                </div>
                <div class="col-md-4">
                  <strong>Date de Naissance:</strong> <span><?= $values->date_naissance;?></span>
                </div>
                <div class="col-md-4">
                  <strong>Email:</strong> <span><?= $values->email;?></span>
                </div>
                <div class="col-md-4">
                  <strong>Pays:</strong> <span><?= $values->pays;?></span>
                </div><div class="col-md-4">
                  <strong>Ville:</strong> <span><?= $values->ville;?></span>
                </div><div class="col-md-4">
                  <strong>Quartier:</strong> <span><?= $values->quartier;?></span>
                </div>
                <div class="col-md-4">
                  <strong>Sexe:</strong> <span><?= $values->sexe;?></span>
                </div>
                <div class="col-md-4">
                  <strong>Groupe Sanguin:</strong> <span><?= $values->groupe_sanguin;?></span>
                </div><div class="col-md-4">
                  <strong>Rhesus:</strong> <span><?= $values->rhesus;?></span>
                </div>
                <div class="col-md-4">
                  <strong>Telephone:</strong> <span><?= $values->telephone;?></span>
                </div>
                <div class="col-md-4">
                  <strong>Personne ?? contacter:</strong> <span><?= $values->telephone2;?></span>
                </div>
                <div class="col-md-12">
                  <h2 class="text-center"><strong><u> Examen et R??sultat </u></strong></h2>
                </div>
              <?php foreach ($operation as $operation){?>
                <div class="col-md-12">
                  <h2 class="text-center"><strong><u> Examen du <?= $operation->date_operation;?> </u></strong></h2>
                </div>
                <div class="col-md-12">
                  <strong>Examen:</strong> <span style="font-size:20px;"><?= $operation->nom;?></span>
                </div>
                <div class="col-md-12">
                  <strong>Allergie:</strong> <span ><?= $operation->allergie;?></span>
                </div> 
                
                <div class="col-md-12">
                  <strong>R??sultat:</strong> <br>
                  <p><?= $operation->resultat;?></p>
                </div>
                <div class="col-md-12">
                  <strong>Prescription:</strong> <br>
                  <p><?= $operation->prescription;?></p>
                </div>
                <div class="col-md-12">
                  <strong>Description:</strong> <br>
                  <p><?= $operation->description_op;?></p>
                </div>
                <div class="col-md-12">
                  <strong>Commentaire</strong> <br>
                  <p><?= $operation->commentaire;?></p>
                </div>
                  <div class="col-md-12 big-bloc-left">
                    Represcription: <?= $reprs->nouvelle_prescription;?>
                  </div>
                <p><strong>Dr <?= $operation->nom_personnel;?></strong></p>
                <p><strong><?= $operation->nom_type_personnel;?> ?? l'hopital <?= $operation->nom_hopital;?>.</strong></p>
                <?php } ?>
              </div>
              
            </div>
				    </div>
          </div>
        </div>
      </div>
</body>
</html>