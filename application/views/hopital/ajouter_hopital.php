<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url().'assets/images/3hlogo.png';?>"/>
  <title>Admin|Ajouter_pharmacie</title>
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
							<li><a href="<?= base_url();?>admin/profilAdmin"><i class="glyphicon glyphicon-user">Profile</a></i></li>
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
            <a href="<?=base_url().'Admin/listePharmacie';?>">Pharmacies</a>
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
				<div class="col-md-12 cdg-left">
          <div class="shadow">
    					<div class="col-content-small post-element clearfix">
								<span class="p-hoptal p-menu"></span>
                <h3 class="titre-p-menu"><a href="<?= base_url().'Admin/';?>">Admin</a> / Ajouter Hôpital</h3>
                <div class="text-right"><a href="<?= base_url().'Admin/listeHopital';?>" class="btn btn-success" title="liste des hôpitaux"><i class="glyphicon glyphicon-th-list"></i> Liste Hôpital</a></div>
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
                <form class="" method="post" action="<?= base_url().'Admin/ajouterHopital'?>" autocomplete="off">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label> Nom hôpital</label>
                      <input type="text" class="form-control" value="<?= set_value('nom');?>" autocomplete="off" placeholder="Entrer nom de l'hôpital......" name="nom">
                      <span style="color:red;"><?= form_error('nom');?></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label> Email</label>
                      <input type="email" class="form-control" value="<?= set_value('email');?>" autocomplete="off" placeholder="Entrer votre email...." name="email">
                      <span style="color:red;"><?= form_error('email');?></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label> Téléphone</label>
                      <input type="text" class="form-control" value="<?= set_value('telephone');?>" autocomplete="off" placeholder="Exemple:  6XX XX XX XX........ " name="telephone">
                      <span style="color:red;"><?= form_error('telephone');?></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label> Pays</label>
                      <input type="text" name="pays" class="form-control" placeholder="Pays">
                      <!-- <select name="pays" class="form-control"> -->
                        <!-- <option value="France" selected="selected">Selectionner le pays... </option>

                        <option value="Afghanistan">Afghanistan </option>
                        <option value="Afrique_Centrale">Afrique_Centrale </option>
                        <option value="Afrique_du_sud">Afrique_du_Sud </option>
                        <option value="Albanie">Albanie </option>
                        <option value="Algerie">Algerie </option>
                        <option value="Allemagne">Allemagne </option>
                        <option value="Andorre">Andorre </option>
                        <option value="Angola">Angola </option>
                        <option value="Anguilla">Anguilla </option>
                        <option value="Arabie_Saoudite">Arabie_Saoudite </option>
                        <option value="Argentine">Argentine </option>
                        <option value="Armenie">Armenie </option>
                        <option value="Australie">Australie </option>
                        <option value="Autriche">Autriche </option>
                        <option value="Azerbaidjan">Azerbaidjan </option>

                        <option value="Bahamas">Bahamas </option>
                        <option value="Bangladesh">Bangladesh </option>
                        <option value="Barbade">Barbade </option>
                        <option value="Bahrein">Bahrein </option>
                        <option value="Belgique">Belgique </option>
                        <option value="Belize">Belize </option>
                        <option value="Benin">Benin </option>
                        <option value="Bermudes">Bermudes </option>
                        <option value="Bielorussie">Bielorussie </option>
                        <option value="Bolivie">Bolivie </option>
                        <option value="Botswana">Botswana </option>
                        <option value="Bhoutan">Bhoutan </option>
                        <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
                        <option value="Bresil">Bresil </option>
                        <option value="Brunei">Brunei </option>
                        <option value="Bulgarie">Bulgarie </option>
                        <option value="Burkina_Faso">Burkina_Faso </option>
                        <option value="Burundi">Burundi </option>

                        <option value="Caiman">Caiman </option>
                        <option value="Cambodge">Cambodge </option>
                        <option value="Cameroun">Cameroun </option>
                        <option value="Canada">Canada </option>
                        <option value="Canaries">Canaries </option>
                        <option value="Cap_vert">Cap_Vert </option>
                        <option value="Chili">Chili </option>
                        <option value="Chine">Chine </option>
                        <option value="Chypre">Chypre </option>
                        <option value="Colombie">Colombie </option>
                        <option value="Comores">Colombie </option>
                        <option value="Congo">Congo </option>
                        <option value="Congo_democratique">Congo_democratique </option>
                        <option value="Cook">Cook </option>
                        <option value="Coree_du_Nord">Coree_du_Nord </option>
                        <option value="Coree_du_Sud">Coree_du_Sud </option>
                        <option value="Costa_Rica">Costa_Rica </option>
                        <option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
                        <option value="Croatie">Croatie </option>
                        <option value="Cuba">Cuba </option>

                        <option value="Danemark">Danemark </option>
                        <option value="Djibouti">Djibouti </option>
                        <option value="Dominique">Dominique </option>

                        <option value="Egypte">Egypte </option>
                        <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
                        <option value="Equateur">Equateur </option>
                        <option value="Erythree">Erythree </option>
                        <option value="Espagne">Espagne </option>
                        <option value="Estonie">Estonie </option>
                        <option value="Etats_Unis">Etats_Unis </option>
                        <option value="Ethiopie">Ethiopie </option>

                        <option value="Falkland">Falkland </option>
                        <option value="Feroe">Feroe </option>
                        <option value="Fidji">Fidji </option>
                        <option value="Finlande">Finlande </option>
                        <option value="France">France </option>

                        <option value="Gabon">Gabon </option>
                        <option value="Gambie">Gambie </option>
                        <option value="Georgie">Georgie </option>
                        <option value="Ghana">Ghana </option>
                        <option value="Gibraltar">Gibraltar </option>
                        <option value="Grece">Grece </option>
                        <option value="Grenade">Grenade </option>
                        <option value="Groenland">Groenland </option>
                        <option value="Guadeloupe">Guadeloupe </option>
                        <option value="Guam">Guam </option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guernesey">Guernesey </option>
                        <option value="Guinee">Guinee </option>
                        <option value="Guinee_Bissau">Guinee_Bissau </option>
                        <option value="Guinee equatoriale">Guinee_Equatoriale </option>
                        <option value="Guyana">Guyana </option>
                        <option value="Guyane_Francaise ">Guyane_Francaise </option>

                        <option value="Haiti">Haiti </option>
                        <option value="Hawaii">Hawaii </option>
                        <option value="Honduras">Honduras </option>
                        <option value="Hong_Kong">Hong_Kong </option>
                        <option value="Hongrie">Hongrie </option>

                        <option value="Inde">Inde </option>
                        <option value="Indonesie">Indonesie </option>
                        <option value="Iran">Iran </option>
                        <option value="Iraq">Iraq </option>
                        <option value="Irlande">Irlande </option>
                        <option value="Islande">Islande </option>
                        <option value="Israel">Israel </option>
                        <option value="Italie">italie </option>

                        <option value="Jamaique">Jamaique </option>
                        <option value="Jan Mayen">Jan Mayen </option>
                        <option value="Japon">Japon </option>
                        <option value="Jersey">Jersey </option>
                        <option value="Jordanie">Jordanie </option>

                        <option value="Kazakhstan">Kazakhstan </option>
                        <option value="Kenya">Kenya </option>
                        <option value="Kirghizstan">Kirghizistan </option>
                        <option value="Kiribati">Kiribati </option>
                        <option value="Koweit">Koweit </option>

                        <option value="Laos">Laos </option>
                        <option value="Lesotho">Lesotho </option>
                        <option value="Lettonie">Lettonie </option>
                        <option value="Liban">Liban </option>
                        <option value="Liberia">Liberia </option>
                        <option value="Liechtenstein">Liechtenstein </option>
                        <option value="Lituanie">Lituanie </option>
                        <option value="Luxembourg">Luxembourg </option>
                        <option value="Lybie">Lybie </option>

                        <option value="Macao">Macao </option>
                        <option value="Macedoine">Macedoine </option>
                        <option value="Madagascar">Madagascar </option>
                        <option value="Madère">Madère </option>
                        <option value="Malaisie">Malaisie </option>
                        <option value="Malawi">Malawi </option>
                        <option value="Maldives">Maldives </option>
                        <option value="Mali">Mali </option>
                        <option value="Malte">Malte </option>
                        <option value="Man">Man </option>
                        <option value="Mariannes du Nord">Mariannes du Nord </option>
                        <option value="Maroc">Maroc </option>
                        <option value="Marshall">Marshall </option>
                        <option value="Martinique">Martinique </option>
                        <option value="Maurice">Maurice </option>
                        <option value="Mauritanie">Mauritanie </option>
                        <option value="Mayotte">Mayotte </option>
                        <option value="Mexique">Mexique </option>
                        <option value="Micronesie">Micronesie </option>
                        <option value="Midway">Midway </option>
                        <option value="Moldavie">Moldavie </option>
                        <option value="Monaco">Monaco </option>
                        <option value="Mongolie">Mongolie </option>
                        <option value="Montserrat">Montserrat </option>
                        <option value="Mozambique">Mozambique </option>

                        <option value="Namibie">Namibie </option>
                        <option value="Nauru">Nauru </option>
                        <option value="Nepal">Nepal </option>
                        <option value="Nicaragua">Nicaragua </option>
                        <option value="Niger">Niger </option>
                        <option value="Nigeria">Nigeria </option>
                        <option value="Niue">Niue </option>
                        <option value="Norfolk">Norfolk </option>
                        <option value="Norvege">Norvege </option>
                        <option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
                        <option value="Nouvelle_Zelande">Nouvelle_Zelande </option>

                        <option value="Oman">Oman </option>
                        <option value="Ouganda">Ouganda </option>
                        <option value="Ouzbekistan">Ouzbekistan </option>

                        <option value="Pakistan">Pakistan </option>
                        <option value="Palau">Palau </option>
                        <option value="Palestine">Palestine </option>
                        <option value="Panama">Panama </option>
                        <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
                        <option value="Paraguay">Paraguay </option>
                        <option value="Pays_Bas">Pays_Bas </option>
                        <option value="Perou">Perou </option>
                        <option value="Philippines">Philippines </option>
                        <option value="Pologne">Pologne </option>
                        <option value="Polynesie">Polynesie </option>
                        <option value="Porto_Rico">Porto_Rico </option>
                        <option value="Portugal">Portugal </option>

                        <option value="Qatar">Qatar </option>

                        <option value="Republique_Dominicaine">Republique_Dominicaine </option>
                        <option value="Republique_Tcheque">Republique_Tcheque </option>
                        <option value="Reunion">Reunion </option>
                        <option value="Roumanie">Roumanie </option>
                        <option value="Royaume_Uni">Royaume_Uni </option>
                        <option value="Russie">Russie </option>
                        <option value="Rwanda">Rwanda </option>

                        <option value="Sahara Occidental">Sahara Occidental </option>
                        <option value="Sainte_Lucie">Sainte_Lucie </option>
                        <option value="Saint_Marin">Saint_Marin </option>
                        <option value="Salomon">Salomon </option>
                        <option value="Salvador">Salvador </option>
                        <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                        <option value="Samoa_Americaine">Samoa_Americaine </option>
                        <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option>
                        <option value="Senegal">Senegal </option>
                        <option value="Seychelles">Seychelles </option>
                        <option value="Sierra Leone">Sierra Leone </option>
                        <option value="Singapour">Singapour </option>
                        <option value="Slovaquie">Slovaquie </option>
                        <option value="Slovenie">Slovenie</option>
                        <option value="Somalie">Somalie </option>
                        <option value="Soudan">Soudan </option>
                        <option value="Sri_Lanka">Sri_Lanka </option>
                        <option value="Suede">Suede </option>
                        <option value="Suisse">Suisse </option>
                        <option value="Surinam">Surinam </option>
                        <option value="Swaziland">Swaziland </option>
                        <option value="Syrie">Syrie </option>

                        <option value="Tadjikistan">Tadjikistan </option>
                        <option value="Taiwan">Taiwan </option>
                        <option value="Tonga">Tonga </option>
                        <option value="Tanzanie">Tanzanie </option>
                        <option value="Tchad">Tchad </option>
                        <option value="Thailande">Thailande </option>
                        <option value="Tibet">Tibet </option>
                        <option value="Timor_Oriental">Timor_Oriental </option>
                        <option value="Togo">Togo </option>
                        <option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
                        <option value="Tristan da cunha">Tristan de cuncha </option>
                        <option value="Tunisie">Tunisie </option>
                        <option value="Turkmenistan">Turmenistan </option>
                        <option value="Turquie">Turquie </option>

                        <option value="Ukraine">Ukraine </option>
                        <option value="Uruguay">Uruguay </option>

                        <option value="Vanuatu">Vanuatu </option>
                        <option value="Vatican">Vatican </option>
                        <option value="Venezuela">Venezuela </option>
                        <option value="Vierges_Americaines">Vierges_Americaines </option>
                        <option value="Vierges_Britanniques">Vierges_Britanniques </option>
                        <option value="Vietnam">Vietnam </option>

                        <option value="Wake">Wake </option>
                        <option value="Wallis et Futuma">Wallis et Futuma </option>

                        <option value="Yemen">Yemen </option>
                        <option value="Yougoslavie">Yougoslavie </option>

                        <option value="Zambie">Zambie </option>
                        <option value="Zimbabwe">Zimbabwe </option>

                        </select> -->
                      <span style="color:red;"><?= form_error('pays');?></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label> Ville</label>
                      <input type="text" class="form-control" value="<?= set_value('ville');?>" autocomplete="off" placeholder="Entrer la ville........" name="ville">
                      <span style="color:red;"><?= form_error('ville');?></span>
                    </div>
                  </div> <div class="col-md-4">
                    <div class="form-group">
                      <label> Quartier</label>
                      <input type="text" class="form-control" value="<?= set_value('quartier');?>" autocomplete="off" placeholder="Entrer le quartier......" name="quartier">
                      <span style="color:red;"><?= form_error('quartier');?></span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label> Boite Postale</label>
                      <input type="text" class="form-control" value="<?= set_value('bp');?>" autocomplete="off" placeholder="Exemple: BP:17989.........." name="bp">
                      <span style="color:red;"><?= form_error('bp');?></span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-success" value="enregistrer" name="register">Enregistrer</button>
                    </div>
                  </div>
                </form>
						  </div>
            </div>
				  </div>
				</div>
      </div>
    </div>
</body>

</html>
