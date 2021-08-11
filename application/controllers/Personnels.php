<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personnels extends CI_Controller 
{
# fonction de redirection si la session de l'utilisateur est expirée ou n'existe plus
  public function __construct()
  {
    parent::__construct();
    if (empty($this->session->personnel))
    {
      $this->session->set_flashdata('error_msg', 'votre session a expiré , veuillez vous connecter à nouveau!!');
      redirect('login/index');
    } 
  }
# page d'accueil du personnel
  public function index()
  {
    $id = $this->session->personnel->id_personnel;
    $data['datas']=$this->personnel->getNom($id);
    $data['donnees'] = $this->personnel->Edit($id);
    $this->load->view('personnel/dashboard_personnel', $data);
    $this->load->view('layouts/footer');
  }
# Ajout d'un patient
  public function ajouterPatient()
  {
    $this->form_validation->set_rules(
      'nom','nom',
      'required',
      array(
        'required' => '*Veuillez remplir le champ %s.',
      )
    );
    $this->form_validation->set_rules(
      'prenom','prenom',
      'required',
      array(
        'required' => '*Veuillez remplir le champ %s.',
      )
    );
    $this->form_validation->set_rules(
      'email','email',
      'required',
    array(
      'required'=> '*Veuillez remplir le champ %s.',
    )
  );
    $this->form_validation->set_rules(
      'telephone','telephone',
      'required',
      array(
        'required' => '*Veuillez remplir le champ %s.',
      )
    );
    $this->form_validation->set_rules(
      'pays','pays',
      'required',
      array(
        'required' => '*Veuillez remplir le champ %s.',
      )
    );
    $this->form_validation->set_rules(
      'ville','ville',
      'required',
      array(
        'required' => '*Veuillez remplir le champ %s.',
      )
    );
    $this->form_validation->set_rules(
      'quartier','quartier',
      'required',
      array(
        'required' => '*Veuillez remplir le champ %s.',
      )
    );
    $this->form_validation->set_rules(
      'rhesus','rhesus',
      'required',
      array(
        'required' => '*Veuillez remplir le champ %s.',
      )
    );
    $this->form_validation->set_rules(
      'groupe_sanguin','groupe_sanguin',
      'required',
      array(
        'required' => '*Veuillez remplir le champ %s.',
      )
    );
    $this->form_validation->set_rules(
      'date','date de naissance',
      'required',
      array(
        'required' => '*Veuillez remplir le champ %s.',
      )
    );
    $this->form_validation->set_rules(
      'sexe','sexe',
      'required',
      array(
        'required' => '*Veuillez remplir le champ %s.',
      )
    );
    $this->form_validation->set_rules(
      'telephone2','personne a contacté',
      'required',
      array(
        'required' => '*Veuillez remplir le champ %s.',
      )
    );
    $id = $this->session->personnel->id_personnel;
    if($this->form_validation->run() == TRUE)
    {
      $data1 = array(
        'nom_patient' => strtoupper($this->input->post('nom')),
        'prenom_patient' => ucwords($this->input->post('prenom')),
        'email' => $this->input->post('email'),
        'telephone' => $this->input->post('telephone'),
        'pays' => ucwords($this->input->post('pays')),
        'ville' => ucwords($this->input->post('ville')),
        'quartier' => ucwords($this->input->post('quartier')),
        'date_naissance' => $this->input->post('date'),
        'sexe' => $this->input->post('sexe'),
        'groupe_sanguin'=>$this->input->post('groupe_sanguin'),
        'rhesus'=>$this->input->post('rhesus'),
        'date_create' => date('Y-m-d H:i:s'),
        'passwords' => md5((123)),
        'telephone2'=>$this->input->post('telephone2')
      );
     
      if ($this->VerifyEmail->mail_exists($data['email'])== true)
      {
        $data['enrol']=$this->personnel->getNom($id);
        $data['donnees'] = $this->personnel->Edit($id);
        $this->session->set_flashdata('error', 'Cet email est deja utilisé!!');
        $this->load->view('patient/ajouter_patient', $data);
        $this->load->view('layouts/footer');
      }
      
      else
      {
        $data['enrol']=$this->personnel->getNom($id);
        $data['donnees'] = $this->personnel->Edit($id);
        $this->db->insert("patient", $data1);
        $this->session->set_flashdata('success_msg', 'Enregistrement effectué');
        redirect('Personnels/listPatient');
      }
    }
    else
    {
      $data['enrol']=$this->personnel->getNom($id);
      $data['donnees'] = $this->personnel->Edit($id);
      $this->load->view('patient/ajouter_patient', $data);
      $this->load->view('layouts/footer');
    }   
  }
#liste des patients avec pagination
  public function listPatient()
  {
    $id = $this->session->personnel->id_personnel;
    $datas['enrol']=$this->personnel->getNom($id);
    $datas['donnees'] = $this->personnel->Edit($id);

		$this->load->library('pagination');
    $config['base_url'] = base_url().'Personnels/listPatient';
    $config['total_rows'] = $this->patient->getPatientCount();
    $config['per_page'] = 4;
    $config['uri_segment'] = 3;
    $config['full_tag_open'] = '<ul class="pagination pagination-lg">';
    $config['full_tag_close'] = '</ul>';
    $config['attributes'] = array('class' => 'page_link');
    $config['first_link'] = 'First';
    $config['last_link'] = 'Last';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="prev">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
    $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $this->pagination->initialize($config);
    $datas['link'] = $this->pagination->create_links();
    $datas['data'] = $this->patient->getListPatientRegister($config['per_page'], $page);
    $this->load->view('patient/patient_register',$datas);
    $this->load->view('layouts/footer',$datas);
  }
#page de verification 
  public function verify()
  {
    $id = $this->session->personnel->id_personnel;
    $data['donnees'] = $this->personnel->Edit($id);
    $data['enrol']=$this->personnel->getNom($id);
    $this->load->view('patient/verify_patient',$data);
  }

  public function check_verify()
  {
    $this->form_validation->set_rules(
      'email','email',
      'required',
      array(
        'required'=>"*Veuillez fournir l' %s"
      )
    );
    $this->form_validation->set_rules(
      'code','code',
      'required',
      array(
        'required'=>"*Veuillez fournir le %s"
      )
    );
    $id=$this->session->personnel->id_personnel;
    if ($this->form_validation->run()==true)
    {
      $email =$this->input->post('email');
      $code = md5($this->input->post('code'));
      $user_patient = $this->patient->getEmailPatient($email, $code);
      $email_exist = $this->VerifyEmail->mail_exists($email);
      $password_exist = $this->VerifyEmail->password_exist($code);
      if(!$email_exist)
      {
        $this->session->set_flashdata('error','Cet email ne correspond a aucun utilisateur dans notre systeme');
        redirect('personnels/verify');
      }
      elseif(!$password_exist)
      {
        $this->session->set_flashdata('error','Ce mot de passe ne correspond a aucun compte dans notre systeme');
        redirect('personnels/verify');
      }
      elseif (!$user_patient) 
      {
        $this->session->set_flashdata('error','Ce patient n\'est pas dans le systeme, Veuillez l\'ajouter pour continuer');
        redirect('personnels/verify');
      }      
      else 
      {
        $data['enrol']=$this->personnel->getNom($id);
        $data['donnees'] = $this->personnel->Edit($id);
        $data['values'] = $this->patient->getEmailUnique1($email);
        $data['rend'] = $this->operation->getInfosOperation1($email,$id);
        $this->load->view('dossierMedical/verify_carnet',$data);
        $this->load->view('layouts/footer');
      }
    }
    else 
    {
      $this->session->set_flashdata('error','*Veuillez remplir tous les champs');
      redirect('personnels/verify');
    }
  }
#page de profil du personnel
  public function ProfilPage()
  {
    $id = $this->session->personnel->id_personnel;
    $data['donnees'] = $this->personnel->Edit($id);
    $data['enrol']=$this->personnel->getNom($id);
    $this->load->view('personnel/profil_personnel',$data);
    $this->load->view('layouts/footer');
  }
#mise ajour des infos du personnel
  function UpdatedataPersonnel()
  {
    $this->form_validation->set_rules(
      'nom','nom',
      'required',
      array(
        'required'=> '*Veuillez renseigner le champ %s'
      )
    );
    $this->form_validation->set_rules(
      'email','email',
      'required',
      array(
        'required'=> '*Veuillez renseigner le champ %s'
      )
    );
    $this->form_validation->set_rules(
      'username','Nom utilisateur',
      'required',
      array(
        'required'=> '*Veuillez renseigner le champ %s'
      )
    );
    $this->form_validation->set_rules(
      'telephone','telephone',
      'required',
      array(
        'required'=> '*Veuillez renseigner le champ %s'
      )
    );
    $this->form_validation->set_rules(
      'adresse','adresse',
      'required',
      array(
        'required'=> '*Veuillez renseigner le champ %s'
      )
    );
    $this->form_validation->set_rules(
      'sexe','sexe',
      'required',
      array(
        'required'=> '*Veuillez renseigner le champ %s'
      )
    );
    $id = $this->session->personnel->id_personnel;
    if ($this->form_validation->run()==true) {
    
      $nom = strtoupper($this->input->post('nom'));
      $email = $this->input->post('email');
      $adresse = ucwords($this->input->post('adresse'));
      $tel = $this->input->post('telephone');
      $username = $this->input->post('username');
      $sexe = $this->input->post('sexe');
      $date = date('Y-m-d H:i:s');
      $data['donnees'] = $this->personnel->Edit($id);
      $data['enrol']=$this->personnel->getNom($id);
      $this->personnel->UpdatePersonnel($id, $nom, $email,$adresse,$username,$sexe,$tel,$date);
      $this->session->set_flashdata("success_msg", "Mise à jour reussi");
      redirect('personnels/Profilpage', 'refresh');
    }
    else 
    {
      $data['donnees'] = $this->personnel->Edit($id);
      $data['enrol']=$this->personnel->getNom($id);
      redirect('personnels/profilPage');
    }
  }
#mise a jour du password
  public function UpdatePassword()
  {
    $this->form_validation->set_rules(
      'Apwd','Ancien mot de passe',
      'required',
      array(
        'required'=>"*Veuillez fournir le %s"
      )
    );
    $this->form_validation->set_rules(
      'Npwd','Nouveau mot de passe',
      'required|matches[CFpwd]|alpha_numeric|min_length[10]',
      array(
        'required'=>"*Veuillez fournir le %s",
        'matches'=>"Ne correspond pas"
      )
    );
    $this->form_validation->set_rules(
      'CFpwd','Confirmer mot de passe',
      'required|alpha_numeric',
      array(
        'required'=>"*Veuillez  %s",
      )
    );
    $id = $this->session->personnel->id_personnel;
    if ($this->form_validation->run()==true) 
    {
     
     $old = md5($this->input->post('Apwd'));
     $new = ($this->input->post('Npwd'));
     $cf =  ($this->input->post('CFpwd'));
     $date = date('Y-m-d H:i:s');

     if (($this->personnel->MatchPassword($id, $old))==false) 
      {
        $data['enrol']=$this->personnel->getNom($id);
        $data['donnees'] = $this->personnel->Edit($id);
        $this->session->set_flashdata("error","Votre mot de passe entrez ne correspond à celui de votre compte, Verifiez!!");
        $this->load->view('personnel/profil_personnel',$data);
        $this->load->view('layouts/footer');
      }
      else
      {
        $data['donnees'] = $this->personnel->Edit($id);
        $data['enrol']=$this->personnel->getNom($id);
        $this->personnel->UpdatePasswords($id,$new,$date);
        $this->session->set_flashdata("success","Mise à jour reussie!!");
        redirect('personnels/Profilpage','refresh');
      }
    }
    else 
    {
      $data['donnees'] = $this->personnel->Edit($id);
      $data['enrol']=$this->personnel->getNom($id);
      //$this->session->set_flashdata("error","Echec, veuillez verifier si vous avez bien remplir les champs!!");
      $this->load->view('personnel/profil_personnel',$data);
      $this->load->view('layouts/footer');
    }
  }
#mise a jour de l'image(telechargement de l'image)
  public function UploadImage()
  {
    $config['upload_path']  = './assets/images/personnel/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size']    = 2048;
    $config['overwrite'] = true; #ecraser une image existente par celle qu'on souhaite uploader
    $config['file_ext_tolower'] = true; #met les extensions en minuscules

    $id=$this->session->personnel->id_personnel;
    $q = $this->db->select('*')->where('id_personnel', $id)->get('personnel');
    $name =$q->row();
    
    $new_name = date("Y_m_d").'@'.$name->id_personnel;
    $config['file_name'] = $new_name;

    $this->load->library('upload', $config); # import de la library pour l'upload
    $this->upload->initialize($config);#initialisation des parametres de telechargement de l'img
      
    if ( ! $this->upload->do_upload('userfile'))
    {
      if (isset($_FILES['userfile'])) 
      {
        $error= $this->upload->display_errors();
        $this->session->set_flashdata('error_msg', $error);
        $data['enrol']=$this->personnel->getNom($id);
        $data['donnees'] = $this->personnel->Edit($id);
        $this->load->view('personnel/profil_personnel',$data);
        $this->load->view('layouts/footer');
      } 
    }
    $imgName = $q->row();
    @unlink("./assets/images/personnel/".$imgName->images);
    $uploaddata = $this->upload->data();
    $filename =$uploaddata['file_name'];
    $date = date('Y-m-d H:i:s');
    $userdata = array(
      'images'=>$filename,
    );
    //var_dump($userdata);exit;
    $this->personnel->UpdateImage($id, $filename,$date);
    $data['donnees'] = $this->personnel->Edit($id);
    $data['enrol']=$this->personnel->getNom($id);
    $this->session->set_flashdata('succes',"Votre photo a été mise ajour avec success!!");
    redirect('personnels/profilpage');
  }
#apercu du dossier medical d'un patient
  public function download($id_patient)
  {
    $id_operation=$this->input->post('id_operation');
    $id = $this->session->personnel->id_personnel;

    $data['enrol']=$this->personnel->getNom($id);
    $data['donnees'] = $this->personnel->Edit($id);
    $data['values'] = $this->patient->getEmailUnique($id_patient);
    $data['operations'] = $this->operation->getInfosOperation($id,$id_patient);
    $this->load->view('dossierMedical/apercu_carnet',$data);
  }

#Telechargement du dossier medical
  public function pdfDownload($id_patient)
  {
    $this->load->library('dompdf_gen');
    $id = $this->session->personnel->id_personnel;
    $data['values'] = $this->patient->getEmailUnique($id_patient);
    $data['rend'] = $this->operation->getInfosOperation($id,$id_patient);
    $data['enrol']=$this->personnel->getNom($id);
    $data['donnees'] = $this->personnel->Edit($id);
    $this->load->view('dossierMedical/carnet',$data);
    $paper_size = 'A4';
    $orientation = 'portrait';
    $html = $this->output->get_output();
    $this->dompdf->set_paper($paper_size, $orientation);
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("3H_carnet_santé.pdf", array('Attachment' =>0));
  }
}
?>