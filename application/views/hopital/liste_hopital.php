<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url().'assets/images/3hlogo.png';?>"/>
  <title>3H-Admin</title>
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
          <?php if($user_admin->images){?>
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<img src="<?= base_url();?>assets/images/super_admin/<?= $user_admin->images;?>" style="height:50px;width:50px;"class="img-circle img-responsive" alt="">
							<span class="caret"></span></a>
            <?php } else{?>
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <img src="<?= base_url().'assets/images/defaut.png';?>" style="height:100px;width:80px;" class="img-circle img-responsive" alt="">
                <span class="caret"></span>
              </a>
            <?php }?>
						<ul class="dropdown-menu">
							<li><a href="<?= base_url();?>admin/profilAdmin"><i class="glyphicon glyphicon-user">Profile</i></a></li>
              <li class="divider"></li>
						  <li><a href="<?= base_url().'login/deconnexion';?>"><span class="glyphicon glyphicon-log-out" style="color:red;">Se déconnecter</span></a></li>
						</ul>
					</li>
				</ul>
			</div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
          <li class="elt-menu accueil">
            <a href="<?= base_url().'Admin/';?>">Accueil</a>
          </li>
					<li class="elt-menu pharmacies">
            <a href="<?= base_url().'Admin/listePharmacie';?>">Pharmacies</a>
          </li>
          <li class="elt-menu hopitaux">
            <a href="<?= base_url().'Admin/listeHopital';?>">Hôpitaux</a>
          </li>
					<li class="elt-menu notification active">
            <a href="#">Notifications</a>
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
              <?php if($user_admin->images){?>
                <a href="#">
                  <img src="<?= base_url();?>assets/images/super_admin/<?= $user_admin->images;?>" style="height:80px;width:80px;" class="img-circle img-responsive" alt="">
                </a>
              <?php } else{?>
                <a href="#">
                  <img src="<?= base_url().'assets/images/defaut.png';?>" style="height:80px;width:80px;" class="img-circle img-responsive" alt="">
                </a>
              <?php }?>
            </div>
            <div class="col-content-small">
              <div class="col-content-elt info-profile">
                <h4><a href="#">Bienvenue Administrateur <span><?= $user_admin->nom;?></span></a></h4>
              </div>
            </div>
            <center><a href="<?= base_url();?>Admin/ProfilAdmin" class="col-content-ato boutonlink"><p class="text-center"> Voir mon profil</p></a></center>
          </div>
				</div>
        <span><em>Administrateur</em></span>
				<div class="col-lg-12 cdg-left">
          <div class="shadow">
            <div class="col-content-small post-element clearfix">
              <span class="p-doctar p-menu"></span>
              <h3 class="titre-p-menu"><a href="<?= base_url().'Admin/';?>">Admin</a> - listing Hôpital</h3>
              <div class="text-right"><a href="<?= base_url().'Admin/ajouterHopital';?>" class="btn btn-success" title="ajouter un hôpital"><i class="glyphicon glyphicon-plus"> Ajouter </i> </a></div>
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
              <div class="col-md-12 cdg-left">
                <div class="table-responsive">
                  <table id="datatable" class="table table-striped table-bordered " cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>N°</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Pays</th>
                        <th>Ville</th>
                        <th>Quartier</th>
                        <th>Telephone</th>
                        <th>Boite Postal</th>
                        <th>date de creation</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>N°</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Pays</th>
                        <th>Ville</th>
                        <th>Quartier</th>
                        <th>Telephone</th>
                        <th>Boite Postal</th>
                        <th>date de creation</th>
                        <th>Delete</th>
                      </tr>
                      </tfoot>
                        <tbody>
                          <?php $i=0; ?>
                          <?php if(!empty($results)) { foreach ($results as $result){?>
                          <?php $i++;?>
                          <tr>
                            <td><?= $i;?></td>
                            <td><?= $result->nom_hopital;?></td>
                            <td><?= $result->email;?></td>
                            <td><?= $result->pays;?></td>
                            <td><?= $result->ville;?></td>
                            <td><?= $result->quartier;?></td>
                            <td><?= $result->telephone;?></td>
                            <td><?= $result->boite_postal;?></td>
                            <td><?= $result->date_creation;?></td>
                            <td>
                              <a style="cursor:pointer;" data-placement="top" data-toggle="tooltip" title="Supprimer" onclick="getIdHopital(
                                    '<?= $result->id_hopital;?>')">
                                <button class="btn btn-danger btn-xs" data-title="Supprimer" data-toggle="modal" data-target="#delete" >
                                  <span class="glyphicon glyphicon-trash"></span>
                                </button>
                              </a>
                            </td>
                          </tr>
                          <?php }} else {?>
                          <tr>
                            <td colspan="9">Aucune données trouvées!!</td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                      <div class="clearfix"></div>
                        <ul class="pagination pull-right">
                            
                        </ul>
                      </div>
                      </div>
                      <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              <h4 class="modal-title custom_align" id="Heading">Supprimer un enregistrement</h4>
                            </div>
                            <div class="modal-body">
                              <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Êtes-vous sures de vouloir supprimer cet enregistrement?</div>
                             
                            </div>
                            <div class="modal-footer ">
                               <form action="<?= base_url();?>admin/delete_hopital" method="post">
                                <input type="hidden" id="id_hopital" name="id_hopital" value="">
                                <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span>Supprimer</button>
                                <button type="button" class="btn btn-" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Annuler</button>
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
