<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url().'assets/images/3hlogo.png';?>"/>
  <title>3H - Patient</title>
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
          <?php if ($users_profil->images) {?>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<img src="<?= base_url();?>assets/images/patient/<?= $users_profil->images;?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
							<span class="caret"></span></a>
          <?php } else {?>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<img src="<?= base_url().'assets/images/defaut.png';?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
							<span class="caret"></span></a>
          <?php }?>
						<ul class="dropdown-menu">
							<li><a href="<?= base_url().'patients/ProfilPages'?>"><i class="glyphicon glyphicon-user">Profile</i></a></li>
						  <li><a href="<?= base_url().'patients/dossier_medical';?>"><span class="glyphicon glyphicon-folder-close"> Dossier medical</span></a></li>
						  <li><a href="<?= base_url().'patients/Download/'.$users_profil->id_patient;?>"><span class="glyphicon glyphicon-download-alt" style="color:blue;"> Télecharger dossier</span></a></li>
              <li class="divider"></li>
						  <li><a href="<?= base_url().'login/deconnexion'?>"><span class="glyphicon glyphicon-log-out" style="color:red;"> Se déconnecter</span></a></li>
						</ul>
					</li>
				</ul>
			</div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
          <li class="elt-menu accueil active">
            <a href="<?= base_url().'patients/index';?>">Accueil</a>
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
      <div class="row">
        <div class="col-md-12 big-bloc-left">
          <div class="col-md-12 cdg-left">
					  <div class="shadow">
              <div class="smallban">
              <?php if ($users_profil->images) {?>
                <a href="#">
                  <img src="<?= base_url();?>assets/images/patient/<?= $users_profil->images;?>" style="height:80px; width:80px;" class="img-circle img-responsive" alt="">
                </a> 
              <?php } else {?>
                <a href="#">
                  <img src="<?= base_url().'assets/images/defaut.png';?>" style="height:80px; width:80px;" class="img-circle img-responsive" alt="">
                </a> 
              <?php }?>
              </div>
              <div class="col-content-small">
                <div class="col-content-elt info-profile">
                  <h4>
                    <a href="#">Bienvenue <span><?= $users_profil->prenom_patient;?></span></a>
                  </h4>
                  <p> <span>Hospital-Hostile-Home</span>
                      <span><strong>Adresse: <?= $users_profil->pays;?>,<?= $users_profil->ville;?>- <?= $users_profil->quartier;?></strong></span>
                  </p>
                </div>
              </div>
              <center><a href="#" class="col-content-ato boutonlink"> Voir mon profil</a></center>
            </div>
            <div class="form-group">
            <center>
              <div class="col-md-6">
                <a href="<?= base_url().'patients/dossier_medical';?>" class="btn btn-success" style="height:200px; width:1100px; "> 
                  <span style="position:relative; top:50%;font-family: cursive; font-size:25px;">Dossier Medical</span>
                </a>
              </div>
              <hr>
              </center>
            </div>
            <!-- modal pour la selection de la pharmacie -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Veuillez choisir la pharmacie ou vous souhaitez faire votre represcription</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                 <form action="<?= base_url().'patients/checkpharmacien';?>" method="post">
                    <div class="modal-body">
                      <span style="color:red;">NB: Pour un choix plus judicieux ,veuillez choisir une pharmacie en fonction de votre localisation!!</span>
                      <div class="form-group">
                        <select name="getpharmacie" id="" class="form-control">
                          <option selected>Selectionner une pharmacie</option>
                        <?php foreach($donnees as $row):?>
                          <option value="<?= $row->id_pharmacie;?>"><?= $row->nom_pharmacie;?> (<?= $row->ville;?>)</option>
                        <?php endforeach;?>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                      <button type="submit" class="btn btn-primary">Suivant</button>
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
