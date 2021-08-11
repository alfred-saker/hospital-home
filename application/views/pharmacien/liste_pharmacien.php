<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url().'assets/images/3hlogo.png';?>"/>
  <title>3H-Pharmacie</title>
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
            <?php if($resultat->images){?>
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<img src="<?= base_url();?>assets/images/pharmacie/<?= $resultat->images;?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
							<span class="caret"></span></a>
            <?php } else{?>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<img src="<?= base_url().'assets/images/defaut.png';?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
							<span class="caret"></span></a>
            <?php }?>
						<ul class="dropdown-menu">
							<li><a href="<?= base_url().'pharmacie/UpdateProfil';?>"><i class="glyphicon glyphicon-user">Profile</i></a></li>
						  <li class="divider"></li>
						  <li><a href="<?= base_url().'login/deconnexion'?>"><span class="glyphicon glyphicon-log-out" style="color:red;">Se déconnecter</i></a></li>
						</ul>
					</li>
				</ul>
			</div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
          <li class="elt-menu accueil">
            <a href="<?= base_url().'pharmacie/index';?>" title="accueil">Accueil</a>
          </li>
          <li class="elt-menu medecin active">
            <a href="<?= base_url().'pharmacie/ajouterPharmacien';?>" title="ajouter un pharmacien">Pharmacien</a>
          </li>
          <li class="elt-menu notification">
            <a href="#" title="notification">Notifications</a>
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
                <?php if($resultat->images){?>
                  <a href="#">
                    <img src="<?= base_url();?>assets/images/pharmacie/<?= $resultat->images;?>" style="height:80px; width:80px;" class="img-circle img-responsive" alt="">
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
                    <a href="#">Bienvenue <span><?= $resultat->nom_pharmacie;?></span></a>
                  </h4>
                  <p><span>Hospital - Hostile - Home</span>
                      <span><?= $resultat->pays;?>,<?= $resultat->ville;?>,<?= $resultat->quartier;?>  , BP: <?= $resultat->boite_postal;?></span>
                      <span><strong>Pharmacie - <?= $resultat->nom_pharmacie;?></strong> </span>    
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
                <h3 class="titre-p-menu"><a href="<?= base_url().'pharmacie/index';?>">pharmacie</a> - Listing Pharmacien</h3>
                <div class="text-right"><a href="<?= base_url().'pharmacie/ajouterPharmacien';?>" class="btn btn-success" title="ajouter un pharmacien"><i class="glyphicon glyphicon-plus"></i> Ajouter un pharmacien</a></div>
              </div>
    					<div class="col-content-small post-element">
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
                          <table id="datatable" class="table table-striped table-bordered table-hover " cellspacing="0" width="100%">
                            <thead>
                              <tr>
                                <th>N°</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Adresse</th>
                                <th>Telephone</th>
                                <th>Username</th>
                                <th>sexe</th>
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
                                <th>date de creation</th>
                                <th>Delete</th>
                              </tr>
                            </tfoot>
                            <tbody>
                            <?php $nbre=0; ?>
                            <?php if(!empty($data)) { foreach ($data as $datas){?>
                            <?php $nbre++;?>
                              <tr>
                                <td><?= $nbre;?></td>
                                <td><?= $datas->nom_pharmacien;?></td>
                                <td><?= $datas->email;?></td>
                                <td><?= $datas->adresse;?></td>
                                <td><?= $datas->telephone;?></td>
                                <td><?= $datas->username;?></td>
                                <td><?= $datas->sexe;?></td>         
                                <td><?= $datas->date_creation;?></td>
                                <td>
                                  <a style="cursor:pointer;" id="updateOperation" title="Supprimer" class="btn btn-succes btn-xs" data-target="#delete" data-toggle="modal"  onclick="getDataPharmacien(
                                    '<?= $datas->id_pharmacien;?>',
                                    '<?= $datas->email;?>' )">
                                    <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal"  >
                                      <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                  </a>
                                  </form> 
                                </td>
                              </tr>
                              <?php }} else {?>
                              <tr>
                                <td colspan="10"><strong>Vous n'avez aucun pharmacien enregistré!</strong></td>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                          <div class="clearfix"></div>
                            <ul class="pagination pull-right">
                              <?= $link;?>  
                            </ul>
                          </div>         
                          <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <form action="<?= base_url();?>pharmacie/deletePharmacien" method="post">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title custom_align" id="Heading" style="color:red;">Attention!!!! Suppression</h4>
                                  </div>
                                  <div class="modal-body">
                                    <input type="hidden" value="" id="id_pharmacien" name="id_pharmacien">
                                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Êtes-vous sûr(e) de vouloir supprimer cet enregistrement?</div>
                                      <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span>Supprimer</button>
                                      <button type="button" class="btn btn-default" data-dismiss="modal" ><span class="glyphicon glyphicon-remove"></span>Annuler</button>
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
                </div>
              </div>
            </div> 
          </div>
        </body>
      </html>
