
<!DOCTYPE html>
<html lang="en"><head>
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
</head><body>
  <!-- <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
				<img src="<?= base_url().'assets/images/3hlogo.png';?>" style="height:40px; width:50px;" class="img-responsive" alt="">
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
						  <li><a href="#"><i class="glyphicon glyphicon-cog">Paramètres</i></a></li>
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
            <a href="<?= base_url().'Personnels/listePatient';?>" titel="ajouter patient">Patients</a>
          </li>
          <li class="elt-menu notification">
            <a href="<?= base_url().'personnels/test';?>">Notifications</a>
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
  </nav> -->
  <style>
  /* .logoImage{
    height:30px; 
    width:30px;
    position: absolute;
   top:15px;
    left:855px;
    
  } */
  .logo{
    position:absolute;
    left:550px;
    top:20px;
  }
  #profilImage{
    height:110px; 
    width:110px;
    border:1px solid black;
    border-radius:30px 30px 30px;;
    left:20px;
    position: absolute;
    top:25px;
  }
  h3{
    color:red;
  }
</style>
                <div class="col-md-12 big-bloc-left" style="border:10px green solid; height:auto;">
                    <center><h2 ><u>Hospital Hostile Home (3H)</u></h2>
                    <h2 class="text-center"><strong>Carnet de Santé Medical</strong></h2></center>
                    <img src="C:\xampp\htdocs\3H\assets\images\3hlogo.png" style="height:120px; width:120px;" class="logo" alt="">
                        <?php if ($values->images){?>
                        <img src="C:\xampp\htdocs\3H\assets\images\patient\<?= $values->images;?>"  id="profilImage" class="img-circle img-responsive" alt="">
                      <?php } else { ?>
                        <img src="C:\xampp\htdocs\3H\assets\images\defaut.png" style="height:120px; width:120px;" class="profilImage" alt="">
                      <?php }?>
                      </div>
                </div>
                <div class="col-md-12 big-bloc-left" style="border:5px green solid; height:auto;">
                  <div class="col-md-12">
                    <center><h3 class="text-center" ><strong><u> Informations du Patient </u></strong></h3></center>
                  </div>
                  <table>
                  <p>
                    <strong>Email:</strong> <span><?= $values->email;?></span> &nbsp;
                    <strong>Sexe:</strong> <span><?= $values->sexe;?></span> &nbsp;
                    <strong>Telephone:</strong> <span><?= $values->telephone;?></span>&nbsp;
                    <strong>Pays:</strong> <span><?= $values->pays;?></span> &nbsp;
                    <strong>Ville:</strong> <span><?= $values->ville;?></span> &nbsp;
                    <strong>Quartier:</strong> <span><?= $values->quartier;?></span> &nbsp;
                    <strong>Groupe Sanguin:</strong> <span><?= $values->groupe_sanguin;?></span> &nbsp;
                    <strong>Rhesus:</strong> <span><?= $values->rhesus;?></span> &nbsp;
                  </p>
                  <p>
                    <strong style="size:10px;">Noms et Prenoms: </strong><span><?= $values->nom_patient;?> <?= $values->prenom_patient;?></span> &nbsp;
                    <strong>Date de Naissance:</strong> <span><?= $values->date_naissance;?></span> &nbsp;
                  </p>
                </table>
                  <div class="col-md-12">
                    <center><h3 class="text-center"><strong><u> Examen et Résultat </u></strong></h3></center>
                  </div>
                  <?php foreach ($rend as $keys){?>
                  <div class="col-md-12">
                    <center><h3 class="text-center"><strong><u> Examen du <?= $keys->date_operation;?> </u></strong></h3>
                  </div>
                  <p>    
                    <strong>Examen:</strong> <span style="font-size:20px;"><?= $keys->nom;?></span>&nbsp;
                  </p>
                  <p>
                  <strong>Allergie:</strong> <span><?= $keys->allergie;?></span>
                  </p>
                  <p>
                    <strong>Résultat:</strong> <?= $keys->resultat;?>
                  </p>
                  <p>
                    <strong>Prescription:</strong><?= $keys->prescription;?> <br>
                    <p></p>
                  </p>
                  <p>
                    <strong>Description:</strong><?= $keys->description_op;?> <br>
                  </p>
                  <p>
                    <strong>Commentaire</strong><?= $keys->commentaire;?> <br>
                  </p>
                  <center><p style="text-align:right;"><strong>Dr <?= $keys->nom_personnel;?></strong></p>
                      <p style="text-align:right;"><strong><?= $keys->nom_type_personnel;?> à l'hopital <?= $keys->nom_hopital;?>.</strong></p></center>
                  <?php } ?>
                </div>
                <div class="col-md-12 big-bloc-left" style="border:3px green solid; height:auto; background-color:green;">
                </div>
              </div>
				    </div>
          </div>
        </div>
      </div>
</body></html>