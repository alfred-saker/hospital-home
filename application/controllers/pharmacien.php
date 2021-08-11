<?php defined('BASEPATH') OR exit('No direct script access allowed');

  class Pharmacien extends CI_Controller 
  {
# fonction de redirection si la session de l'utilisateur est expirée ou n'existe plus
    public function __construct()
    {
      parent::__construct();
      if (empty($this->session->pharmacien))
      {
        $this->session->set_flashdata('error_msg', 'votre session a expiré , veuillez vous connecter à nouveau!!');
        redirect('login/index');
      } 
    }
# page d'accueil du pharmacien
    public function index()
    {
      $id = $this->session->pharmacien->id_pharmacien;
      $data['donnees'] = $this->pharmaciens->Edit($id);
      $data['round'] = $this->pharmaciens->getNom($id);
      $this->load->view('pharmacien/dashboard_pharmacien',$data);
      $this->load->view('layouts/footer');
    }
#Vue de la page de profil du pharmacien
    public function ProfilPage()
    {
      $id = $this->session->pharmacien->id_pharmacien;
      $data['donnees'] = $this->pharmaciens->Edit($id);
      $data['round'] = $this->pharmaciens->getNom($id);
      $this->load->view('pharmacien/profile_pharmacien',$data);
      $this->load->view('layouts/footer');
    }
#mise a jour des infos du pharmacien
    public function UpdatedataPharmacien()
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
      $id = $this->session->pharmacien->id_pharmacien;
      if ($this->form_validation->run()==true) {
      
        $nom = strtoupper($this->input->post('nom'));
        $email = $this->input->post('email');
        $adresse = ucwords($this->input->post('adresse'));
        $tel = $this->input->post('telephone');
        $username = $this->input->post('username');
        $sexe = $this->input->post('sexe');
        $date = date('Y-m-d H:i:s');
        $data['donnees'] = $this->pharmaciens->Edit($id);
        $data['round'] = $this->pharmaciens->getNom($id);
        $this->pharmaciens->UpdatePharmacien($id, $nom, $email,$adresse,$username,$sexe,$tel,$date);
        $this->session->set_flashdata("success_msg", "Mise à jour reussi");
        redirect('pharmacien/UpdatedataPharmacien', 'refresh');
      }
      else 
      {
        $data['donnees'] = $this->pharmaciens->Edit($id);
        $data['round'] = $this->pharmaciens->getNom($id);
        $this->load->view("pharmacien/profile_pharmacien",$data);
        $this->load->view("layouts/footer");
      }
    }
#mise a jour du mot de passe du pharmacien
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
      $id = $this->session->pharmacien->id_pharmacien;
      if ($this->form_validation->run()==true) 
      {
       
       $old = md5($this->input->post('Apwd'));
       $new = ($this->input->post('Npwd'));
       $cf =  ($this->input->post('CFpwd'));
       $date = date('Y-m-d H:i:s');
  
       if (($this->pharmaciens->MatchPassword($id, $old))==false) 
        {
          $data['donnees'] = $this->pharmaciens->Edit($id);
          $data['round'] = $this->pharmaciens->getNom($id);
          $this->session->set_flashdata("error","Votre mot de passe entrez ne correspond à celui de votre compte, Verifiez!!");
          $this->load->view('pharmacien/profile_pharmacien',$data);
          $this->load->view('layouts/footer');
        }
        else
        {
          $data['donnees'] = $this->pharmaciens->Edit($id);
          $data['round'] = $this->pharmaciens->getNom($id);
          $this->pharmaciens->UpdatePasswords($id,$new,$date);
          $this->session->set_flashdata("success","Mise à jour reussie!!");
          redirect('pharmacien/UpdatePasswords','refresh');
        }
      }
      else 
      {
        $data['donnees'] = $this->pharmaciens->Edit($id);
        $data['round'] = $this->pharmaciens->getNom($id);
        $this->load->view('pharmacien/profile_pharmacien',$data);
        $this->load->view('layouts/footer');
      }
    }
#mise a jour de l'image(telechargement de l'image)
    public function UploadImage()
    {
      $config['upload_path']  = './assets/images/pharmacien/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size']    = 2048;
      $config['overwrite'] = true; #ecraser une image existente par celle qu'on souhaite uploader
      $config['file_ext_tolower'] = true; #met les extensions en minuscules
      $id=$this->session->pharmacien->id_pharmacien;
      $q = $this->db->select('*')->where('id_pharmacien', $id)->get('pharmacien');
      $name =$q->row();
      
      $new_name = date("Y_m_d").'@'.$name->id_pharmacien;
      $config['file_name'] = $new_name;
     
      $this->load->library('upload', $config); # import de la library pour l'upload
      $this->upload->initialize($config);#initialisation des parametres de telechargement de l'img

      if ( ! $this->upload->do_upload('userfile'))
      {
        if (isset($_FILES['userfile'])) 
        {
          $error= $this->upload->display_errors();
          $this->session->set_flashdata('error_msg', $error);
          $data['donnees'] = $this->pharmaciens->Edit($id);
          $data['round'] = $this->pharmaciens->getNom($id);
          $this->load->view('pharmacien/profile_pharmacien',$data);
          $this->load->view('layouts/footer');
        } 
      }
      $imgName = $q->row();
      @unlink("./assets/images/pharmacien/".$imgName->images);
      $uploaddata = $this->upload->data();
      $filename =$uploaddata['file_name'];
      $userdata = array(
        'images'=>$filename
      );
      $this->pharmaciens->UpdateImage($id, $filename);
      $data['donnees'] = $this->pharmaciens->Edit($id);
      $data['round'] = $this->pharmaciens->getNom($id);
      $this->session->set_flashdata('succes',"Téléchargement reussi!!");
      $this->load->view('pharmacien/profile_pharmacien',$data);
      $this->load->view('layouts/footer');
    }
# vue du resultat des recherches
    // public function Represcription()
    // {
    //   $id = $this->session->pharmacien->id_pharmacien;
    //   $data['donnees'] = $this->pharmaciens->Edit($id);
    //   $data['round'] = $this->pharmaciens->getNom($id);
    //   $this->load->view('represcription/verification',$data);
    //   $this->load->view('layouts/footer');
    // }
# rechercher une operation specifique
    public function Checkoperation()
    {
      $id = $this->session->pharmacien->id_pharmacien;
      $data['donnees'] = $this->pharmaciens->Edit($id);
      $data['round'] = $this->pharmaciens->getNom($id);
      $ID = $this->input->post('ID');
      $data['data'] = $this->operation->search($ID);
      if ($data['data']) {
        $this->load->view('represcription/list_represcription',$data);
        $this->load->view('layouts/footer');
      }
      else {
        $this->session->set_flashdata('error_msg','cet identifiant ne correspond a aucune operation');
        redirect('pharmacien/index');
      }
     
    }
# recuperation du dossier medical du patient
    public function getdossier()
    {
      $id = $this->session->pharmacien->id_pharmacien;
      $id_operation=$this->input->post('id_operation');
      $id_patient = $this->input->post('id_patient');
      $user['donnees'] = $this->pharmaciens->Edit($id);
      $user['round'] = $this->pharmaciens->getNom($id);
      $user['rend'] = $this->operation->getUpdate($id_operation,$id_patient);
      $user['values'] = $this->patient->getEmailUnique($id_patient);
      $user['users_profil'] = $this->patient->Edit($id_patient);
      $this->load->view('represcription/dossier_represcrit',$user);
      $this->load->view('layouts/footer');
    }
# Represcription du patient
    public function faire_represcription()
    {
      $this->form_validation->set_rules(
        'prescribe','prescription',
        'required',
        array(
          'required'=>"*Veuillez fournir le %s"
        )
      );
      $this->form_validation->set_rules(
        'comment','commentaires',
        'required',
        array(
          'required'=>"*Veuillez fournir le %s"
        )
      );
      $id=$this->session->pharmacien->id_pharmacien;
      if ($this->form_validation->run()==true) {
        $id_operation=$this->input->post('id_operation');
        $id_patient = $this->input->post('id_patient');
        $presc=$this->input->post('prescribe');
        $com=$this->input->post('comment');
        $date=date('Y-m-d H:i:s');
        $data=array(
          'id_pharmacien'=>$id,
          'id_operation'=>$id_operation,
          'nouvelle_prescription'=>$presc,
          'commentaire'=>$com,
          'date_represcription'=>$date
        );
        $this->represcription->Updateprescribe($data);
        redirect('pharmacien/Represcription');
      }
      else 
      {
        $id_operation=$this->input->post('id_operation');
        $id_patient = $this->input->post('id_patient');
        $user['donnees'] = $this->pharmaciens->Edit($id);
        $user['round'] = $this->pharmaciens->getNom($id);
        $user['rend'] = $this->operation->getUpdate($id_operation,$id_patient);
        $this->load->view('represcription/dossier_represcrit',$user);
        $this->load->view('layouts/footer');
      }
    }
#voir dossier medical
    public function viewdossier($id_operation)
    {
      $id = $this->session->pharmacien->id_pharmacien;
      $id_patient=$this->input->post('id_patient');
      $user['donnees'] = $this->pharmaciens->Edit($id);
      $user['round'] = $this->pharmaciens->getNom($id);
      $user['rend'] = $this->operation->getUpdate($id_operation,$id_patient);
      $user['values'] = $this->patient->getEmailUnique($id_patient);
      $user['users_profil'] = $this->patient->Edit($id_patient);
      $user['row']=$this->operation->getuniqueOperation($id_operation,$id_patient);
      $this->load->view('represcription/viewdossier',$user);
      $this->load->view('layouts/footer');
    }
  }
?>