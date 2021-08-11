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
						  <li class="divider"></li>
						  <li><a href="<?= base_url().'login/deconnexion'?>"><span class="glyphicon glyphicon-log-out" style="color:red;"> Se déconnecter</span></a></li>
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
            <a href="<?= base_url().'Personnels/verify';?>" titel="ajouter patient">Patients</a>
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
      </div>
    </div>
  </div>
  <div class="col-lg-12 cdf-left">
    <div class="shadow">
      <h2 class="text-center">LISTING DE TOUTES VOS OPERATIONS </h2>
      <div class="container">
        <h3 class="text-right"><a href="<?= base_url();?>operations/viewAllOperation" class="btn btn-success">Voir toutes vos operations</a></h3>
      </div>
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
      <?php }?>
      <?= validation_errors();?>
      <div class="col-md-12 cdg-left">
      <div class="table-responsive">
        <table id="demo" class="table table-striped table-bordered " cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>N°</th>
              <th>Nom patient</th>
              <th>Prenom patient</th>
              <th>type opération</th>
              <th>Date de l'operation</th>
              <th>Options</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>N°</th>
              <th>Nom patient</th>
              <th>Prenom patient</th>
              <th>type opération</th>
              <th>Date de l'operation</th> 
              <th>Options</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $i=0; ?>
            <?php if(!empty($params)) { foreach ($params as $param){?>
            <?php $i++;?>
            <tr>
              <td><?= $i;?></td>
              <td><?= $param->nom_patient;?></td>
              <td><?= $param->prenom_patient;?></td>
              <td><?= $param->nom;?></td>
              <td><?= $param->date_operation;?></td>
              <td>
                <a style="cursor:pointer;" id="updateOperation" title="Modifier" class="btn btn-succes btn-xs" data-toggle="modal" data-target="#exampleModalCenter" onclick="getDataOperation(
                  '<?= $param->id_operation;?>',
                  '<?= $param->id_patient;?>',
                  '<?= $param->email;?>'
                  )">
                  <i class="glyphicon glyphicon-pencil">Modifier</i>
                </a> 
                <form action="<?= base_url().'personnels/download/'.$param->id_patient;?>" method="post" title="Apercu">
                  <input type="hidden" name="id_operation" value="<?= $param->id_operation;?>">  
                  <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-print">Apercu</i></button>
                </form> &nbsp
                <!-- <?php //var_dump($param->id_operation);?> -->
                <a style="cursor:pointer;" href="<?= base_url().'personnels/pdfDownload/'.$param->id_patient;?>" title="télecharger">
                  <i style="color:green;" class="glyphicon glyphicon-save">Télécharger Pdf</i>
                </a>
              </td>
            </tr>
            <?php }} else {?>
            <tr>
              <td colspan="11" class="text-center"><strong>Vous n'avez effectué aucune opération pour l'instant!!</strong></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <ul class="pagination pull-right"> 
          <?= $link;?>                         
        </ul>
      </div>
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <center><h2 class="modal-title" style="color:red;" id="exampleModalCenterTitle">Formulaire de confirmation!!</h2></center>
              <h5><em style="color:red;">Veuillez confirmer les informations du patient!!</em></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?= base_url().'operations/ViewUpdateDossier';?>" method="post">
              <div class="modal-body">
              <input type="hidden" id="id_patient" name="id_patient" value="">
              <input type="hidden" id="id_operation" name="id_operation" value="">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="email" name="email" id="email" value="" class="form-control" placeholder="Email">
                  </div>
                </div> 
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="password" required>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="col-md-10">
                  <div class="form-group">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Valider</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>