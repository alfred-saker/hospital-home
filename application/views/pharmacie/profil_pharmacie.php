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
					    <img src="<?php echo base_url().'assets/images/logo.png';?>" class="img-responsive" alt="">
				    </a>
          </div>
          <div class="menu-profile">
            <ul class="nav nav-tabs">
              <li class="dropdown">
              <?php if($results->images){?>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  <img src="<?= base_url(); ?>assets/images/pharmacie/<?= $results->images; ?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
                  <span class="caret"></span>
                </a> 
              <?php } else{?>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  <img src="<?= base_url().'assets/images/defaut.png';?>" style="height:50px; width:50px;" class="img-circle img-responsive" alt="">
                  <span class="caret"></span>
                </a>
              <?php }?>
                <ul class="dropdown-menu">
                  <li><a href="<?= base_url().'Pharmacie/UpdateProfil';?>"><i class="glyphicon glyphicon-user">Profile</i></a></li>
                  <li class="divider"></li>
                  <li><a href="<?= base_url().'login/deconnexion'?>"><span class="glyphicon glyphicon-log-out" style="color:red;">Se déconnecter</span></a></li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="elt-menu accueil">
                <a href="<?= base_url().'pharmacie/index';?>">Accueil</a>
              </li>
              <li class="elt-menu medecin">
                <a href="<?= base_url().'pharmacie/listPharmacien';?>" title="Liste Pharmacien">Pharmacien</a>
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
        <div class="shadow">
          <div class="smallban">
          <?php if($results->images){?>
            <a href="<?= base_url().'pharmacie/UpdateProfil';?>">
              <img src="<?= base_url();?>assets/images/pharmacie/<?= $results->images;?>" style="height:80px; width:80px;" class="img-circle img-responsive" alt="">
            </a>
          <?php } else {?>
            <a href="<?= base_url().'pharmacie/UpdateProfil';?>">
              <img src="<?= base_url().'assets/images/defaut.png';?>" style="height:80px; width:80px;" class="img-circle img-responsive" alt="">
            </a>
          <?php }?>
          </div>
          <div class="col-content-small">
            <div class="col-content-elt info-profile">
              <h4>
                <a href="#">Bienvenue <span>Admin <?= $results->nom_pharmacie;?></span></a>
              </h4>
              <p><span>Hospital-Hostile-Home</span>
                	<span><?= $results->pays;?>,<?= $results->ville;?>,<?= $results->quartier;?></span></span>
                  <span>BP:<?= $results->boite_postal;?></span>
                	<span>En service à l’Hôpital <?= $results->nom_pharmacie;?></span>
              </p>
            </div>
          </div>
          <a href="#" class="col-content-ato boutonlink"><p class="text-center"> Voir mon profil</p></a>
        </div>
      </div>
    <hr>
    <div class="container bootstrap snippet">
      <div class="row">
  		  <div class="col-sm-10"><h1>Pharmacie <?= $results->nom_pharmacie;?></h1></div>
      </div>
      <div class="row">
  		  <div class="col-sm-3">
          <div class="text-center">
          <?php if($results->images){?>
            <a href="#"><img src="<?php echo base_url(); ?>assets/images/pharmacie/<?= $results->images;?>" style="height:250px; width:300px;" class="avatar img-circle img-thumbnail" alt="avatar"></a>
          <?php } else{?>
              <a href="#"><img src="<?php echo base_url().'assets/images/defaut.png';?>" style="height:250px; width:400px;" class="avatar img-circle img-thumbnail" alt="avatar"></a>
              <?php } ?>
          </div>  
        </div>
    	  <div class="col-sm-9">
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#infos">Informations</a></li>
            <li><a data-toggle="tab" href="#security">Securité</a></li>
            <li><a data-toggle="tab" href="#profil">Profil</a></li>
          </ul>   
          <div class="tab-content">
            <div class="tab-pane active" id="infos">
              <hr>
              <?php
                $success_msg= $this->session->flashdata('success_msg');
                $error_msg= $this->session->flashdata('error_msg');
                if($success_msg){ ?>
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
                  <?php  } ?>
              <?php validation_errors();?>
              <form class="form" action="<?= base_url().'pharmacie/UpdateProfil';?>" method="post" id="registrationForm">
                <div class="form-group">
                  <div class="col-xs-6">
                    <label for="name"><h4>Nom</h4></label>
                    <input type="text" class="form-control" name="nom" value="<?= $results->nom_pharmacie; ?>" placeholder="Nom " title="Nom">
                    <span style="color:red;"><?= form_error('nom');?></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-6">
                    <label for="email"><h4>Email</h4></label>
                    <input type="email" class="form-control" name="email" value="<?= $results->email;?>" placeholder="you@email.com" title="Email.">
                    <span style="color:red;"><?= form_error('email');?></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-6">
                    <label for="phone"><h4>Telephone</h4></label>
                    <input type="text" class="form-control" name="telephone" value="<?= $results->telephone;?>" placeholder="Numéro" title="Telephone">
                    <span style="color:red;"><?= form_error('telephone');?></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-6">
                    <label for="boite_postal"><h4>Boite Postal</h4></label>
                    <input type="text" class="form-control" id="boite_postal" name="bp" value="<?= $results->boite_postal;?>"  placeholder="BP:xxxx" title="Boite Postal">
                    <span style="color:red;"><?= form_error('bp');?></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-6">
                    <label ><h4>Pays</h4></label>
                    <input type="text" class="form-control" name="pays" id="pays" value="<?= $results->pays;?>" placeholder="pays" title="pays">
                    <span style="color:red;"><?= form_error('pays');?></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-6">
                    <label ><h4>Ville</h4></label>
                    <input type="text" class="form-control" name="ville" id="ville" value="<?= $results->ville;?>" placeholder="ville" title="ville">
                    <span style="color:red;"><?= form_error('ville');?></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-6">
                    <label for="quartier"><h4>Quartier</h4></label>
                    <input type="text" class="form-control" name="quartier" id="quartier" value="<?= $results->quartier;?>" placeholder="quartier" title="quartier">
                    <span style="color:red;"><?= form_error('quartier');?></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-12">
                    <br>
                    <button class="btn btn-lg btn-success" type="submit">
                      <i class="glyphicon glyphicon-ok-sign"></i><span class="text-center"> Enregistrer</span>
                    </button>
                  </div>
                </div>
              </form>
              <hr>
             </div>
             <div class="tab-pane" id="security">
              <h2></h2>
              <hr>
              <span class="alert alert-danger"> Attention!!!!!!!Pour plus de securité, votre mot de passe doit contenir des caractères alpha-numérique tels que: @<>1-#Xx</span>
              <hr>
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
              <form class="form" action="<?= base_url().'pharmacie/UpdatePassword';?>" method="post" id="registrationForm">
                <div class="form-group">
                  <div class="col-xs-6">
                    <label for="password"><h4>Ancien Mot de passe</h4></label>
                    <input type="password" class="form-control" name="Apwd"  id="password" value="<?= set_value('Apwd');?>" placeholder="password" title="Password">
                    <span style="color:red;"><?= form_error('Apwd');?></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-6">
                    <label for="password"><h4>Nouveau Mot de passe</h4></label>
                    <input type="password" class="form-control" name="Npwd"  id="password" value="<?= set_value('Npwd');?>" placeholder="nouveau mot de passe" title="Nouveau Password">
                    <span style="color:red;"><?= form_error('Npwd');?></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-6">
                    <label for="password"><h4>Confirmer Mot de passe</h4></label>
                    <input type="password" class="form-control" name="CFpwd"  id="password" value="<?= set_value('CFpwd');?>" placeholder="confirmation mot de passe" title="Confirm Password">
                    <span style="color:red;"><?= form_error('CFpwd');?></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-12">
                    <br>
                    <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Enregistrer</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="tab-pane" id="profil">
              <hr>
              <div class="text-center">
              <?php
                    $success_msg= $this->session->flashdata('succes');
                    $error_msg= $this->session->flashdata('errors');
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
                <form action="<?= base_url().'pharmacie/UpdateImage';?>" method="post" enctype="multipart/form-data">
                  <?php if($results->images){?>
                    <a href="#"><img src="<?= base_url(); ?>assets/images/pharmacie/<?= $results->images;?>" style="height:250px; width:250px;" class="image-preview__image" alt="avatar" id="preview-image"></a>
                    <?php }else{?>
                    <a href="#"><img src="<?= base_url().'assets/images/defaut.png';?>" style="height:200px; width:200px; " class="image-preview__image" alt="avatar" id="preview-image" ></a>
                  <?php }?>
                  <h6 id="upload-dialog">Upload your profil photo...</h6>
                  <input type="file" id="image-file" class="text-center center-block file-upload" name="userfile"><br>
                  <span  class="text-left"><strong style="color:red;">NB:Seuls les formats .jpg, .jpeg, .png, .gif, sont autorisés et cela jusqu'à une taille maximale de 2 Mo.</strong></span>
                  <div class="form-group">
                    <div class="col-xs-12">
                      <br>
                      <button  class="btn btn-lg btn-success" type="submit" style="width:100%;"><i class="glyphicon glyphicon-ok-sign"></i> Enregister</button>
                    </div>
                  </div>
                  <script>
                    var _PREVIEW_URL;
                    /* Show Select File dialog */
                    document.querySelector("#upload-dialog").addEventListener('click', function() {
                        document.querySelector("#image-file").click();
                    });
                    /* Selected File has changed */
                    document.querySelector("#image-file").addEventListener('change', function() {
                    // user selected file
                    var file = this.files[0];
                    //allowed MIME types
                    var mime_types = [ 'image/jpeg', 'image/png', 'image/jpg', 'image/gif' ];
                    // validate MIME
                    if(mime_types.indexOf(file.type) == -1) {
                      alert('Error : Incorrect file type');
                      return;
                    }
                    // validate file size
                    if(file.size > 2*1024*1024) {
                      alert('Error : Exceeded size 2MB');
                      return;
                    }
                    // validation is successful
                    // hide upload dialog button
                    document.querySelector("#upload-dialog").style.display = 'none';
                    // object url
                    _PREVIEW_URL = URL.createObjectURL(file);
                    // set src of image and show
                    document.querySelector("#preview-image").setAttribute('src', _PREVIEW_URL);
                    document.querySelector("#preview-image").style.display = 'inline-block';
                    });
                  </script>
                </form>
              </div></hr><br>   
            </div>
          </div>
        </div><!--/tab-content-->
      </div><!--/col-9-->
    </div><!--/row-->                                                 
</body>
</html>