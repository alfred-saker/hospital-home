<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Patients extends CI_Controller 
{
# fonction de redirection si la session de l'utilisateur est expirée ou n'existe plus
  public function __construct(){
    parent::__construct();
    if (empty($this->session->patient))
    {
      $this->session->set_flashdata('error_msg', 'votre session a expiré , veuillez vous connecter à nouveau!!');
      redirect('login/index');
    } 
  }
#page d'accueil du patient
  public function index()
  {
    $id = $this->session->patient->id_patient;
    $pays =$this->session->patient->pays;
    $ville=$this->session->patient->ville;
    $quartier =$this->session->patient->quartier;
    $user['donnees'] = $this->pharmacies->selectAllPharmacie($pays,$ville,$quartier);
    $user['users_profil'] = $this->patient->Edit($id);
    $this->load->view('patient/dashboard_patient', $user);
    $this->load->view('layouts/footer');
  }
#Vue de la page de profil du patient
  public function ProfilPages()
  {
    $id = $this->session->patient->id_patient;
    $user['users_profil'] = $this->patient->Edit($id);
    $this->load->view('patient/profil_patient', $user);
    $this->load->view('layouts/footer');
  }
#mise a jour des infos du patient
  public function UpdatePatient()
  {

    $this->form_validation->set_rules(
      'nom','Nom',
      'required',
      array(
        'required'=> '*Veuillez renseigner le champ %s'
      )
    );
    $this->form_validation->set_rules(
      'prenom','Prenom',
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
      'telephone','telephone',
      'required',
      array(
        'required'=> '*Veuillez renseigner le champ %s'
      )
    );
    $this->form_validation->set_rules(
      'pays','pays',
      'required',
      array(
        'required'=> '*Veuillez renseigner le champ %s'
      )
    );
    $this->form_validation->set_rules(
      'ville','ville',
      'required',
      array(
        'required'=> '*Veuillez renseigner le champ %s'
      )
    );
    $this->form_validation->set_rules(
      'quartier','quartier',
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
    $this->form_validation->set_rules(
      'groupe_sanguin','groupe_sanguin',
      'required',
      array(
        'required'=> '*Veuillez renseigner le champ %s'
      )
    );
    $this->form_validation->set_rules(
      'rhesus','rhesus',
      'required',
      array(
        'required'=> '*Veuillez renseigner le champ %s'
      )
    );
    $this->form_validation->set_rules(
      'date_naiss','date_naiss',
      'required',
      array(
        'required'=> '*Veuillez renseigner le champ %s'
      )
    );
    $this->form_validation->set_rules(
      'telephone2','telephone2',
      'required',
      array(
        'required'=> '*Veuillez renseigner le champ %s'
      )
    );
    $id = $this->session->patient->id_patient;
    if ($this->form_validation->run()==true) {
      $array=array(
        'nom_patient' => strtoupper($this->input->post('nom')),
        'prenom_patient' => strtoupper($this->input->post('prenom')),
        'email' => $this->input->post('email'),
       ' pays' => ucwords($this->input->post('pays')),
        'ville' => ucwords($this->input->post('ville')),
        'quartier' => ucwords($this->input->post('quartier')),
        'telephone' => $this->input->post('telephone'),
        'sexe' => $this->input->post('sexe'),
        'groupe_sanguin' => $this->input->post('groupe_sanguin'),
        'rhesus' => $this->input->post('rhesus'),
        'date_update' => date('Y-m-d H:i:s'),
        'date_naissance'=> $this->input->post('date_naiss'),
        'telephone2'=>$this->input->post('telephone2')
      );
      
      $user['users_profil'] = $this->patient->Edit($id);
      $this->patient->UpdatePatient($id, $array);
      $this->session->set_flashdata("success_msg", "Mise à jour reussi");
      redirect('patients/UpdatePatient', 'refresh');
    }
    else 
    {
      $user['users_profil'] = $this->patient->Edit($id);
      $this->load->view("patient/profil_patient",$user);
      $this->load->view("layouts/footer");
    }
  }
#mise a jour du mot de passe de l'utilisateur
  public function UpdatePasswords()
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
    $id = $this->session->patient->id_patient;
    if ($this->form_validation->run()==true) 
    {
     
     $old = md5($this->input->post('Apwd'));
     $new = ($this->input->post('Npwd'));
     $cf =  ($this->input->post('CFpwd'));
     $date = date('Y-m-d H:i:s');

     if (($this->patient->MatchPassword($id, $old))==false) 
      {
        $user['users_profil'] = $this->patient->Edit($id);
        $this->session->set_flashdata("error","Votre mot de passe entrez ne correspond à celui de votre compte, Verifiez!!");
        $this->load->view('patient/profil_patient',$user);
        $this->load->view('layouts/footer');
      }
      else
      {
        $user['users_profil'] = $this->patient->Edit($id);
        $this->patient->UpdatePasswords($id,$new,$date);
        $this->session->set_flashdata("success","Mot de passe mis à jour avec success!!");
        redirect('patients/UpdatePasswords','refresh');
      }
    }
    else 
    {
      $user['users_profil'] = $this->patient->Edit($id);
      $this->load->view('patient/profil_patient',$user);
      $this->load->view('layouts/footer');
    }
  }
#mise a jour de l'image(telechargement de l'image)
  public function UploadImage()
  {
    $config['upload_path']  = './assets/images/patient/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size']    = 2048;
    $config['overwrite'] = true; #ecraser une image existente par celle qu'on souhaite uploader
    $config['file_ext_tolower'] = true; #met les extensions en minuscules
    $id=$this->session->patient->id_patient;
    $q = $this->db->select('*')->where('id_patient', $id)->get('patient');
    $name =$q->row();
    
    $new_name = date("Y_m_d").'@'.$name->id_patient;
    $config['file_name'] = $new_name; 
    $this->load->library('upload', $config); # import de la library pour l'upload
    $this->upload->initialize($config);#initialisation des parametres de telechargement de l'img

    if ( ! $this->upload->do_upload('userfile'))
    {
      if (isset($_FILES['userfile'])) 
      {
        $error= $this->upload->display_errors();
        $this->session->set_flashdata('error_msg', $error);
        $user['users_profil'] = $this->patient->Edit($id);
        $this->load->view('patient/profil_patient',$user);
        $this->load->view('layouts/footer');
      } 
    }
    $imgName = $q->row();
    @unlink("./assets/images/patient/".$imgName->images);
    $uploaddata = $this->upload->data();
    $filename =$uploaddata['file_name'];
    $userdata = array(
        'images'=>$filename
      );
    $date = date('Y-m-d H:i:s');
    $this->patient->UpdateImage($id, $filename);
    $user['users_profil'] = $this->patient->Edit($id);
    $this->session->set_flashdata('succes',"Téléchargement reussi!!");
    $this->load->view('patient/profil_patient',$user);
    $this->load->view('layouts/footer');
  }
#vue du dossier medical du patient
  public function dossier_medical()
  {
    $id_patient=$this->session->patient->id_patient;
    $user['rend'] = $this->patient->getInfosPatient($id_patient);
    $user['users_profil'] = $this->patient->Edit($id_patient);
    $this->load->view('patient/preview',$user);
    $this->load->view('layouts/footer');
  }
# Telechargement du dossier medical
  public function Download($id_patient)
  {
    $this->load->library('dompdf_gen');
    $id_patient=$this->session->patient->id_patient;
    $user['rend'] = $this->patient->getInfosPatient($id_patient);
    $user['users_profil'] = $this->patient->Edit($id_patient);
    $this->load->view('patient/download',$user);
    $paper_size = 'A4';
    $orientation = 'portrait';
    $html = $this->output->get_output();
    $this->dompdf->set_paper($paper_size, $orientation);
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("3H_carnet_santé.pdf", array('Attachment' =>0));
  }
}

