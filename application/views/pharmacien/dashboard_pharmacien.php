<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url().'assets/images/3hlogo.png';?>"/>
  <title>3H - Pharmacien</title>
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
				  <img src="images/logo.png" class="img-responsive" alt="">
				</a>
      </div>
			<div class="menu-profile">
				<ul class="nav nav-tabs">
					<li class="dropdown">
            <?php if($donnees->images){?>
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<img src="<?= base_url();?>assets/images/pharmacien/<?= $donnees->images;?>"style="height:50px;width:50px;" class="img-circle img-responsive" alt="">
							<span class="caret"></span></a>
              <?php } else{?>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<img src="<?= base_url().'assets/images/defaut.png';?>"style="height:50px;width:50px;" class="img-circle img-responsive" alt="">
							<span class="caret"></span></a>
            <?php }?>
						<ul class="dropdown-menu">
						  <li><a href="<?= base_url().'Pharmacien/ProfilPage';?>"><i class="glyphicon glyphicon-user"> Profile</i></a></li>
						  <li class="divider"></li>
						  <li><a href="<?= base_url().'login/deconnexion';?>"><span class="glyphicon glyphicon-log-out" style="color:red;"> Se déconnecter</span></a></li>
						</ul>
					</li>
				</ul>
			</div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
          <li class="elt-menu accueil">
            <a href="<?= base_url().'pharmacien/index';?>">Accueil</a>
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
        <div class="banniere">
          <div class="shadow">
            <div class="smallban">
              <?php if($donnees->images){?>
              <a href="<?= base_url().'pharmacien/ProfilPage';?>" class="profile">
                <img src="<?= base_url();?>assets/images/pharmacien/<?= $donnees->images;?>" style="height:80px; width:80px;" class="img-circle img-responsive" alt="">
              </a>
              <?php } else{?>
                <a href="<?= base_url().'pharmacien/ProfilPage';?>" class="profile">
                  <img src="<?= base_url().'assets/images/defaut.png';?>" style="height:80px; width:80px;" class="img-circle img-responsive" alt="">
                </a>
              <?php }?>
              </div>
              <div class="col-content-small">
                <div class="col-content-elt info-profile">
                  <h4>
                    <a href="#">Bienvenue <span><?= $donnees->nom_pharmacien;?></span></a>
                  </h4>
                  <p><span>Pharmacien</span>
                      <span><?= $donnees->adresse;?></span>
                    <span>En service à la pharmacie <strong><?= $round->nom_pharmacie;?></strong> </span>
                  </p>
                </div>
              </div>
              <a href="#" class="col-content-ato boutonlink"><p class="text-center"> Voir mon profil</p></a>
            </div>
            <?php
                  $success_msg= $this->session->flashdata('success_msg');
                  $error_msg= $this->session->flashdata('error_msg');
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
                <?php validation_errors();?>
            <div class="form-group">
              <center>
                <div class="col-md-12">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-success" style="height:200px;width:100%;" data-toggle="modal" data-target="#exampleModalCenter">
                  <span style="position:relative; top:5%;font-family: cursive; font-size:25px;">Faire une represcription</span>
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h2 class="text-left" style="color:red" >Represcription</h2>
                          <span style="color:red">NB:Veuillez entre l'Identifiant de l'operation que vous souhaiter represcrire</span>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url();?>pharmacien/Checkoperation" method="post">
                            <div class="modal-body">
                              <?php
                                  $success_msg= $this->session->flashdata('success_msg');
                                  $error_msg= $this->session->flashdata('error_msg');
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
                                    <div class="text-left">
                                      <span style="color:red;"><?= $error_msg; ?></span>
                                    </div>
                                    <?php }?>
                                <?php validation_errors();?>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="text" name="ID" class="form-control" autocomplete="off" placeholder="ID operation" required>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                              <button type="submit" class="btn btn-success">Ok</button>
                            </div>
                          </form>
                        </div>  
                      </div>
                    </div>
                  </div>
                </div>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
