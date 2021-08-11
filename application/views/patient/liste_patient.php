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
            <?php if ($sql->images) {?>
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<img src="<?= base_url();?>assets/images/hopitaux/<?= $sql->images;?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
							<span class="caret"></span></a>
              <?php } else{?>
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
							  <img src="<?= base_url().'assets/images/defaut.png';?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
							  <span class="caret"></span></a>
              <?php }?>
						<ul class="dropdown-menu">
							<li><a href="<?= base_url().'hopital/ProfilPage';?>"><i class="glyphicon glyphicon-user">Profile</i></a></li>
						  <li class="divider"></li>
						  <li><a href="<?= base_url().'login/deconnexion'?>"><span class="glyphicon glyphicon-log-out" style="color:red;"> Se déconnecter</span></a></li>
						</ul>
					</li>
				</ul>
			</div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="elt-menu accueil">
            <a href="<?= base_url();?>hopital/index"title="accueil">Accueil</a>
          </li>
          <li class="elt-menu medecin">
            <a href="<?= base_url().'Hopital/listePersonnel';?>">Personnel</a>
          </li> 
          <li class="elt-menu patients">
            <a href="<?= base_url().'hopital/listePatients';?>" titel="ajouter patient">Patients</a>
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
    <div class="row">
      <div class="col-md-12 big-bloc-left">
        <div class="col-md-12 cdg-left">
					<div class="shadow">
            <div class="smallban">
              <?php if ($sql->images) {?>     
                <a href="<?= base_url().'hopital/ProfilPage';?>">
                  <img src="<?= base_url();?>assets/images/hopitaux/<?= $sql->images;?>" style="height:80px; width:80px;" class="img-circle img-responsive" alt="">
                </a> 
              <?php } else{?>
                <a href="<?= base_url().'hopital/ProfilPage';?>">
                  <img src="<?= base_url().'assets/images/defaut.png';?>" style="height:80px; width:80px;" class="img-circle img-responsive" alt="">
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
            <center><a href="#" class="col-content-ato boutonlink">Voir mon profil</a></center>
          </div>
				</div> 
        <span>Liste des patients</span>
        <div class="col-lg-12 cdg-left">
          <div class="shadow">
            <div class="col-content-small post-element clearfix">
              <span class="p-doctar p-menu"></span>
              <h3 class="titre-p-menu"><a href="<?= base_url().'Hopital/';?>">Hopital</a> - listing Patient</h3>
            </div>
    				<div class="col-content-small post-element">
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
                <?php } if($error_msg){ ?>
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <?= $error_msg; ?>
                </div>
                  <?php }?>   
                  
                <div class="col-md-12 cdg-left">
                  <div class="table-responsive">
                  
                    <table id="demo" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>N°</th>
                          <th>Nom</th>
                          <th>Prenom</th>
                          <th>Email</th>
                          <th>Pays</th>
                          <th>Ville</th>
                          <th>Quartier</th>
                          <th>Telephone</th>
                          <th>Date de Naissance</th>
                          <th>sexe</th>
                          <th>Groupe Sanguin</th>
                          <th>date d'ajout</th>
                          <!-- <th>Actions</th> -->
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>N°</th>
                          <th>Nom</th>
                          <th>Prenom</th>
                          <th>Email</th>
                          <th>Pays</th>
                          <th>Ville</th>
                          <th>Quartier</th>
                          <th>Telephone</th>
                          <th>Date de Naissance</th>
                          <th>sexe</th>
                          <th>Groupe Sanguin</th>
                          <th>date d'ajout</th>
                          <!-- <th>Action</th> -->
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php $i=0; ?>
                        <?php if(!empty($data)) { foreach ($data as $datas){?>
                        <?php $i++;?>
                        <tr>
                          <td><?= $i;?></td>
                          <td><?= $datas->nom_patient;?></td>
                          <td><?= $datas->prenom_patient;?></td>
                          <td><?= $datas->email;?></td>
                          <td><?= $datas->pays;?></td>
                          <td><?= $datas->ville;?></td>
                          <td><?= $datas->quartier;?></td>
                          <td><?= $datas->telephone;?></td>
                          <td><?= $datas->date_naissance;?></td>
                          <td><?= $datas->sexe;?></td>
                          <td><?= $datas->groupe_sanguin;?><?= $datas->rhesus;?></td>
                          <td><?= $datas->date_create;?></td>
                          <!-- <td>
                            <div class=" btn-group dropleft" >
                              <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="glyphicon glyphicon-cog"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right" style="background-color:limegreen;">
                                <li style="text-align:center;">              
                                  <form action="<?= base_url().'Operations/faireOperation';?>" method="post">
                                    <input type="hidden" name="id_patient" value="<?= $datas->id_patient;?>"> 
                                    <button class="btn btn-danger btn-xs" data-bs-toggle="popover" title="operation">
                                      <i class="glyphicon glyphicon-wrench">&nbspOpération</i>
                                    </button>
                                  </form>&nbsp
                                </li>    
                                <li style="text-align:center;">
                                  <form  action="<?= base_url().'personnels/download/'.$datas->id_patient;?>" method="post">
                                    <button title="apercu pdf" class="btn btn-primary btn-xs">
                                      <i  class="glyphicon glyphicon-print">&nbspApercu Pdf</i>
                                    </button>
                                  </form> &nbsp; 
                                </li>
                                <li style="text-align:center;">
                                  <form action="<?= base_url().'personnels/pdfDownload/'.$datas->id_patient;?>" method="post">
                                    <input type="hidden" name="id" value="<?= $datas->id_patient;?>"> 
                                    <button  title="télécharger" class="btn btn-succes btn-xs"><i  class="glyphicon glyphicon-save">&nbspTélécharger</i></button>
                                  </form>
                                </li>
                              </div>
                            </div>
                          </td> -->
                        </tr>
                        <?php }} else {?>
                        <tr>
                          <td colspan="11"><strong><marquee behavior="slide" direction="right" bgcolor="red">Vous n'avez aucun enregistrement pour l'instant!!</marquee></strong></td>
                        </tr>
                          <?php } ?>
                      </tbody>
                    </table> 
                    <ul class="pagination pull-right">
                      <?= $link;?>
                    </ul>
                    <!-- <div class="text-left"><a href="<?= base_url().'Operations/index';?>" class="btn btn-primary" title="ajouter du patient"><i class="glyphicon glyphicon-th-list"></i>Listing des operations effectuées</a></div> -->
                    </div>
                  </div>
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