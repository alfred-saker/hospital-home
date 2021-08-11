<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url().'assets/images/3hlogo.png';?>"/>
    <title>3H-Hospital</title>
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
              <?php if(!empty($sql->images)){?>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  <img src="<?= base_url(); ?>assets/images/hopitaux/<?= $sql->images; ?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
                  <span class="caret"></span>
                </a>
              <?php }else{?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?= base_url().'assets/images/defaut.png';?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
                    <span class="caret"></span>
                </a>
              <?php }?>
                <ul class="dropdown-menu">
                  <li><a href="<?= base_url().'hopital/Profilpage';?>"><i class="glyphicon glyphicon-user"> profile</i></a></li>
                  <li class="divider"></li>
                  <li><a href="<?= base_url().'login/deconnexion'?>"><i class="glyphicon glyphicon-log-out"style="color:red;"> Se déconnecter</i></a></li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="elt-menu accueil">
                <a href="<?= base_url().'Hopital/index';?>">Accueil</a>
              </li>
              <li class="elt-menu medecin">
                <a href="<?= base_url().'Hopital/listePersonnel';?>">Personnel</a>
              </li> 
              <li class="elt-menu patients">
                <a href="<?= base_url().'Hopital/listePatients';?>">Patient</a>
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
            <button type="submit" class="btn btn-default">Ok</button>
          </form>
        </div>
      </nav>
      <div class="container principal">
        <div class="shadow">
          <div class="smallban">
          <?php if(!empty($sql->images)){?>
            <a href="<?= base_url(); ?>assets/images/hopitaux/<?= $sql->images;?>" target="_blank" rel="noopener noreferrer">
              <img src="<?= base_url(); ?>assets/images/hopitaux/<?= $sql->images;?>" target="_blank" rel="noopener noreferrer" style="height:80px; width:80px;" class="img-circle img-responsive" alt="">
            </a>
          <?php }else{?>
            <a href="<?= base_url().'assets/images/defaut.png'; ?>">
            <img src="<?= base_url().'assets/images/defaut.png'; ?>" style="height:80px; width:80px;" class="img-circle img-responsive" alt="">
            </a>
          <?php }?>
          </div>
          <div class="col-content-small">
            <div class="col-content-elt info-profile">
              <h4>
                <a href="#">Bienvenue <span>Admin <?= $sql->nom_hopital;?></span></a>
              </h4>
              <p><span>Hospital-Hostile-Home</span>
                	<span><?= $sql->pays;?></span>
                	<span><?= $sql->ville;?></span>
                	<span><?= $sql->quartier;?></span>
                	<span>En service à l’Hôpital <?= $sql->nom_hopital;?></span>
              </p>
            </div>
          </div>
          <a href="#" class="col-content-ato boutonlink"><p class="text-center"> Voir mon profil</p></a>
        </div>
      </div>   
</body>
</html>
