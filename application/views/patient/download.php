
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url().'assets/images/3hlogo.png';?>"/>
    <title>3H-Download</title>
    <link href="<?= base_url().'assets/css/bootstrap.min.css';?>" rel="stylesheet">
    <link href="<?= base_url().'assets/css/3-col-portfolio.css';?>" rel="stylesheet">
	<link href="<?= base_url().'assets/css/styles.css';?>" rel="stylesheet">
</head><body>
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
  <div>
    <div class="col-md-12 big-bloc-left" style="border:10px green solid; height:auto;">
      <center><h2 ><u>Hospital Hostile Home (3H)</u></h2>
      <h2 class="text-center"><strong>Carnet de Santé Medical</strong></h2></center>
      <img src="C:\xampp\htdocs\3H\assets\images\3hlogo.png" style="height:120px; width:120px;" class="logo" alt="">
        <?php foreach ($rend as $random){?>
          <?php if ($random->images){?>
          <img src="C:\xampp\htdocs\3H\assets\images\patient\<?= $random->images;?>"  id="profilImage" class="img-circle img-responsive" alt="">
        <?php } else { ?>
          <img src="C:\xampp\htdocs\3H\assets\images\search-msg.png" style="height:120px; width:120px;" class="profilImage" alt="">
        <?php }}?>
        </div>
    </div>
    <div class="col-md-12 big-bloc-left" style="border:5px green solid; height:auto;">
      <div class="col-md-12">
        <center><h3 class="text-center" ><strong><u> Informations du Patient </u></strong></h3></center>
      </div>
      <table>
        <div class="col-md-12">
          <strong>Email:</strong> <span><?= $users_profil->email;?></span>
        </div>
        <div class="col-md-12">
          <strong>Sexe:</strong> <span><?= $users_profil->sexe;?></span>
        </div>
        <div class="col-md-12">
          <strong>Pays:</strong> <span><?= $users_profil->pays;?></span>
        </div>
        <div class="col-md-12">
          <strong>Ville:</strong> <span><?= $users_profil->ville;?></span>
        </div>
        <div class="col-md-12">
          <strong>Quartier:</strong> <span><?= $users_profil->quartier;?></span>
        </div>
        <div class="col-md-12">
          <strong>Telephone:</strong> <span><?= $users_profil->telephone;?></span>
        </div>
        <div class="col-md-3">
          <strong style="size:10px;">Noms et Prenoms: </strong><span><?= $users_profil->nom_patient;?> <?= $users_profil->prenom_patient;?></span>
        </div>
        <div class="col-md-3">
          <strong>Date de Naissance:</strong> <span><?= $users_profil->date_naissance;?></span>
        </div>
        <div class="col-md-3">
          <strong>Groupe Sanguin:</strong> <span><?= $users_profil->groupe_sanguin;?></span>
        </div>
        <div class="col-md-3">
          <strong>Rhésus:</strong> <span><?= $users_profil->rhesus;?></span>
        </div>       
      </table>
      <div class="col-md-12">
        <center><h3 class="text-center"><strong><u> Examen et Résultat </u></strong></h3></center>
      </div>
      <?php foreach ($rend as $keys){?>
      <div class="col-md-12">
        <center><h3 class="text-center"><strong><u> Examen du <?= $keys->date_operation;?> </u></strong></h3>
      </div>
      <p>     
        <strong>Examen:</strong> <span><?= $keys->nom;?></span>&nbsp;
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
    <div class="col-md-12 big-bloc-left" style="border:3px green solid; height:auto; background-color:green;"></div>
</body></html>