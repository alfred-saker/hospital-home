<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url().'assets/images/3hlogo.png';?>"/>
  <title>3H - login </title>
  <link href="<?= base_url().'assets/css/bootstrap.min.css';?>" rel="stylesheet">
  <link href="<?= base_url().'assets/css/3-col-portfolio.css';?>" rel="stylesheet">
	<link href="<?= base_url().'assets/css/styles.css';?>" rel="stylesheet">
</head>

<body class="p-inscription">
  <div class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
      <div class="item active">
    </div>
    <div class="item">
    </div>
    <div class="item">
    </div>
  </div>
  </div>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:;">
    <div class="container">
      <div class="navbar-header" >
        <a class="navbar-brand" href="#">
			    <img src="<?= base_url().'assets/images/logo.png';?>" class="img-responsive" alt="">
				</a>
        <h2 class="text-center" style="font-family:Stencil Std; color:#8B0000;"></h2>  
      </div>
    </div>
  </nav>
  <div class="container principal">
    <div class="row">
      <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
        <div class="welcome col-content-ato">
            <h4>Intégrez votre compte professionnel de la santé !!!</h4>
            <div>Faites-vous bien consultez en ligne par des médecins spécialisés de la santé. Trouvez facilement des horaires d’ouvertures de pharmacie et la disponibilité de médicaments
          </div>
        </div> 
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="bloc-form">
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
              <?php }?>
              <?php validation_errors();?>
              <form  method="post" action="<?= base_url().'Login/connected';?>" >
                <h4 class="text-center">Accedez dès à présent à votre compte. </h4>
                <div class="form-group">
                  <input type="email"  placeholder="Email" value="<?= set_value('email');?>" class="form-control" id="email" name="email">
                  <i class="fa fa-envelope-o" aria-hidden="true"></i>
                  <span style="color:red;"><?= form_error('email');?></span>
                </div>
                <div class="form-group">
                  <input type="password"  placeholder="Mot de passe" class="form-control" id="password"  name="password">
                  <span style="color:red;"><?= form_error('password');?></span>
                </div>
                <div class="form-group">
                  <a href="<?= base_url().'login/forgetPassword';?>" > <span style="color:white;"><strong> Mot de passe oublié?</strong></span></a>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-success" value="connexion" name="login">Connexion</button>
                </div>  
              </form>
            </div>
          </div>
        </div>
    </div>
</body>
</html>
