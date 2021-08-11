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
                <?php if($row->images){?>
                    <a class="navbar-brand" href="#">
					    <img src="<?= base_url();?>assets/images/hopitaux/<?= $row->images;?>" class="img-responsive" alt="">
				    </a>
                <?php } else{?>
                    <a class="navbar-brand" href="#">
				        <img src="<?= base_url().'assets/images/defaut.png';?>" class="img-responsive" alt="">
				    </a>
                <?php }?>
            </div>
			<div class="menu-profile">
				<ul class="nav nav-tabs">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <?php if($row->images){?>
                            <img src="<?= base_url();?>assets/images/hopitaux/<?= $row->images;?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
							<span class="caret"></span></a>
                            <?php } else {?>
							<img src="<?= base_url().'assets/images/defaut.png';?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
							<span class="caret"></span></a>
                            <?php }?>
						<ul class="dropdown-menu">
							<li><a href="<?= base_url().'hopital/Profilpage';?>"><i class="glyphicon glyphicon-user">Profile</i></a></li>
						    <li class="divider"></li>
						    <li><a href="<?= base_url().'login/deconnexion'?>"><span class="glyphicon glyphicon-log-out" style="color:red;">Se déconnecter</span></a></li>
						</ul>
					</li>
				</ul>
			</div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
        <li class="elt-menu accueil">
            <a href="<?= base_url().'Hopital/index';?>" title="accueil">Accueil</a>
          </li>
          <li class="elt-menu medecin active">
            <a href="<?= base_url().'Hopital/listePersonnel';?>" title="ajouter un personnel">Personnels</a>
          </li>
          <li class="elt-menu patients">
            <a href="<?= base_url().'hopital/listePatients';?>" titel="ajouter patient">Patients</a>
          </li>
					<li class="elt-menu notification">
            <a href="<?= base_url().'Home/Notifications';?>" title="notification">Notifications</a>
          </li>
          <li class="elt-menu message">
            <a href="#" title="messages" >Messages</a>
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
              <?php if($row->images){?>
                <a href="#">
                  <img src="<?= base_url();?>assets/images/hopitaux/<?= $row->images;?>" style="height:80px; width:80px;" class="img-circle img-responsive" alt="">
                </a>
              <?php } else{?>
                <a href="#">             
                  <img src="<?php echo base_url().'assets/images/defaut.png';?>" class="img-circle img-responsive" alt="">
                </a>
              <?php }?>
            </div>
            <div class="col-content-small">
              <div class="col-content-elt info-profile">
                <h4>
                  <a href="#">Bienvenue <span><?= $row->nom_hopital;?></span></a>
                </h4>
                <p><span>Hospital-Hostile-Home</span>
                	<span><?= $row->pays;?></span>
                  <span><?= $row->ville;?></span>
                  <span><?= $row->quartier;?></span>
                	<span>En service à l’Hôpital <?= $row->nom_hopital;?></span>
                </p>
              </div>
            </div>
            <center><a href="#" class="col-content-ato boutonlink">Voir mon profil</a></center>
          </div>
				</div>
				<div class="col-lg-12 cdg-left">
          <div class="shadow">
            <div class="col-content-small post-element clearfix">
              <span class="p-doctar p-menu"></span>
              <h3 class="titre-p-menu"><a href="<?= base_url().'hopital/index';?>">Hospital</a> - listing Personnel</h3>
              <div class="text-right"><a href="<?= base_url().'hopital/ajouterPersonnel';?>" class="btn btn-success" title="ajouter un personnel"><i class="glyphicon glyphicon-plus"></i> Ajouter un personnel</a></div>
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
              <?php }if($error_msg){ ?>
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <?= $error_msg; ?>
                </div>
                <?php }?>
                <div class="col-md-12 cdg-left">
                  <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered " cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>N°</th>
                          <th>Nom</th>
                          <th>Email</th>
                          <th>Adresse</th>
                          <th>Telephone</th>
                          <th>Username</th>
                          <th>sexe</th>
                          <th>Fonction</th>
                          <th>date de creation</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>N°</th>
                          <th>Nom</th>
                          <th>Email</th>
                          <th>Adresse</th>
                          <th>Telephone</th>
                          <th>Username</th>
                          <th>sexe</th>
                          <th>Fonction</th>
                          <th>date de creation</th>
                          <th>Delete</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php $i=0; ?>
                        <?php if(!empty($donnees)) { foreach ($donnees as $donnee){?>
                        <?php $i++;?>
                        <tr>
                          <td><?= $i;?></td>
                          <td><?= $donnee->nom_personnel;?></td>
                          <td><?= $donnee->email;?></td>
                          <td><?= $donnee->adresse;?></td>
                          <td><?= $donnee->telephone;?></td>
                          <td><?= $donnee->username;?></td>
                          <td><?= $donnee->sexe;?></td>
                          <td><?= $donnee->nom_type_personnel;?></td>
                          <td><?= $donnee->date_creation;?></td>
                          <td>
                            <a style="cursor:pointer;" id="updateOperation" title="Supprimer" class="btn btn-succes btn-xs" data-target="#delete" data-toggle="modal"  onclick="getDataPersonnel(
                              '<?= $donnee->id_personnel;?>',
                              '<?= $donnee->email;?>' )">
                              <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal"  >
                                <span class="glyphicon glyphicon-trash"></span>
                              </button>
                            </a>
                          </td>
                        </tr>
                        <?php }} else {?>
                          <tr>
                            <td colspan="10"><strong><marquee behavior="slide" direction="right" bgcolor="red">Vous n'avez aucun enregistrement!!</marquee></strong></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <div class="clearfix"></div>
                      <!-- <ul class="pagination pull-right">
                        <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                      </ul> -->
                    </div>
                  </div>
                  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="<?= base_url();?>hopital/deletePersonnel" method="post">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title custom_align" id="Heading">Attention!!!! Suppression</h4>
                          </div> 
                          <div class="modal-body">
                            <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Êtes-vous sur de vouloir supprimer ce personnel?</div>
                              <input type="hidden" id="id_personnel" value="" name="id_personnel">
                            </div>
                          <div class="modal-footer ">
                            <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Oui</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Non</button>
                          </div>
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
