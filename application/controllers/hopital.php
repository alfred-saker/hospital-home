<?php defined('BASEPATH') OR exit('No direct script access allowed');

  class Hopital extends CI_Controller 
  {
# fonction de redirection si la session de l'utilisateur est expirée ou n'existe plus
    public function __construct()
    {
      parent::__construct();
      if (empty($this->session->hospital))
      {
        $this->session->set_flashdata('error_msg', 'votre session a expiré , veuillez vous connecter à nouveau!!');
        redirect('login/index');
      } 
    }
#page d'accueil de l'hôpital
    public function index()
    {
      $id = $this->session->hospital->id_hopital;
      $data['sql'] = $this->hospital->Editdata($id);
      $data['ligs']= $this->typePersonnel->getNomType();
      $data['row'] = $this->personnel->CountPersonnels($id);
      $data['typeoperation']= $this->TypeOperation->record_count_type_operation();
      $data['get_type'] = $this->TypeOperation->get_type_operation();
      $data['allpatient'] = $this->patient->listAllpatient();
      $data['get_all_patient']=$this->patient->get_all_patient($id);
      $this->load->view('hopital/dashboard_hopital',$data);
      $this->load->view('layouts/footer');
    }
#ajouter un personnel
    public function ajouterPersonnel()
    {
      $this->form_validation->set_rules(
        'nom','nom',
        'required',
        array(
          "required" => "*veuillez remplir le champ %s"
        )
      );
      $this->form_validation->set_rules(
        'email','email',
        'required',
        array(
          "required" => "*veuillez remplir le champ %s"
        )
      );
      $this->form_validation->set_rules(
        'telephone','telephone',
        'required|numeric',
        array(
          "required" => "*veuillez remplir le champ %s"
        )
      );
      $this->form_validation->set_rules(
        'adresse','adresse',
        'required',
        array(
          "required" => "*veuillez remplir le champ %s"
        )
      );
      $this->form_validation->set_rules(
        'username','username',
        'required',
        array(
          "required" => "*veuillez remplir le champ %s"
        )
      );
      $this->form_validation->set_rules(
        'fonction','fonction',
        'required',
        array(
          "required" => "*veuillez remplir le champ %s"
        )
      );
      $this->form_validation->set_rules(
        'sexe','sexe',
        'required',
        array(
          "required" => "*veuillez remplir le champ %s"
        )
      );

      if ($this->form_validation->run() == true) {
        $data1 = array(
          'id_hopital'=> $this->session->hospital->id_hopital,
          'id_type_personnel'=>$this->input->post('fonction'),
          'nom_personnel' => strtoupper($this->input->post('nom')),
          'email' => $this->input->post('email'),
          'telephone' => $this->input->post('telephone'),
          'adresse' => ucwords($this->input->post('adresse')),
          'username'=>$this->input->post('username'),
          'date_creation' =>date('Y-m-d H:i:s'),
          'sexe' => $this->input->post('sexe'),
          'passwords'=> md5('123'),
          
        );
        if ($this->VerifyEmail->mail_exists($data1['email'])== true)
        {
          $id=$this->session->hospital->id_hopital;
          $resultat['line'] = $this->hospital->Editdata($id);
          $resultat['row']= $this->typePersonnel->getFonctionPersonnel();
          $this->session->set_flashdata('error_msg', 'Cet email est deja utilisé!!');
          $this->load->view('personnel/ajouter_personnel', $resultat);
          $this->load->view('layouts/footer', $resultat);
        }
        else 
        {
          $id=$this->session->hospital->id_hopital;
          $resultat['line'] = $this->hospital->Editdata($id);
          $resultat['row']= $this->typePersonnel->getFonctionPersonnel();
          $this->db->insert('personnel', $data1);
          $this->session->set_flashdata('success_msg', 'Enregistrement reussi!!');
          $this->load->view('personnel/ajouter_personnel', $resultat);
          $this->load->view('layouts/footer',$resultat);
        } 
      }
      else {
        $id=$this->session->hospital->id_hopital;
        $resultat['line'] = $this->hospital->Editdata($id);
        $resultat['row']= $this->typePersonnel->getFonctionPersonnel();
        //$this->session->set_flashdata("error_msg", "Echec d'enregistrement, veuillez remplir et verifier tous les champs!!");
        $this->load->view('personnel/ajouter_personnel', $resultat);
        $this->load->view('layouts/footer');
      }
      
    }
#liste du personnel avec pagination
    public function listePersonnel()
    {
      $id=$this->session->hospital->id_hopital;
      $resultat['row'] = $this->hospital->Editdata($id);
      $resultat['donnees']= $this->personnel->getListPersonnel($id);

     
      $this->load->view('personnel/liste_personnel', $resultat);
      $this->load->view('layouts/footer');
    }
#supprimer un personnel
    public function deletePersonnel()
    {
      $id=$this->input->post('id_personnel');
      $this->personnel->delete($id); 
      $this->session->set_flashdata('success', "Enregistrement supprimé avec success!!");
      redirect('hopital/listePersonnel'); 
    }
#page de profil de l'hopital
    public function Profilpage()
    {
      $id=$this->session->hospital->id_hopital;
      $data['lignes']= $this->typePersonnel->getNomType();
      $data['row_lignes'] = $this->personnel->CountPersonnels($id);
      $data['rows'] = $this->hospital->Editdata($id);
      $this->load->view('hopital/profil_page',$data);
      $this->load->view('layouts/footer');
    }
#mise a jour des donnees de l'hopital 
    public function UpdateData()
    {
      $this->form_validation->set_rules(
        'nom','Nom',
        'required',
        array(
          'required'=>"*Veuillez fournir le %s"
        )
      );
      $this->form_validation->set_rules(
        'email','Email',
        'required',
        array(
          'required'=>"*Veuillez fournir l' %s"
        )
      );
      $this->form_validation->set_rules(
        'telephone','Telephone',
        'required|numeric',
        array(
          'required'=>"*Veuillez fournir le %s",
          'numeric'=>"%s ne doit condenir que des valeurs numeriques"
        )
      );
      $this->form_validation->set_rules(
        'bp','Boite Postal',
        'required',
        array(
          'required'=>"*Veuillez fournir le %s"
        )
      );
      $this->form_validation->set_rules(
        'pays','pays',
        'required',
        array(
          'required'=>"*Veuillez fournir le %s"
        )
      );
      $this->form_validation->set_rules(
        'ville','ville',
        'required',
        array(
          'required'=>"*Veuillez fournir le %s"
        )
      );
      $this->form_validation->set_rules(
        'quartier','quartier',
        'required',
        array(
          'required'=>"*Veuillez fournir le %s"
        )
      );

      if ($this->form_validation->run()==true) 
      {
        $id =$this->session->hospital->id_hopital;
        $array=array(
          'nom_hopital' => strtoupper($this->input->post('nom')),
          'email' => $this->input->post('email'),
          'pays' => ucwords($this->input->post('pays')),
          'ville' => ucwords($this->input->post('ville')),
          'quartier' => ucwords($this->input->post('quartier')),
          'telephone '=> $this->input->post('telephone'),
          'boite_postal' => $this->input->post('bp'),
          'date_update' => date('Y-m-d'),
        );
        $datas['lignes']= $this->typePersonnel->getNomType();
        $datas['rows_lignes'] = $this->personnel->CountPersonnels($id);
        $datas['rows'] = $this->hospital->Editdata($id);
        $this->hospital->UpdateData($id,$array);
        $this->session->set_flashdata('success_msg', 'modification effectuée!!');
        redirect('hopital/Profilpage','refresh');
      }
      else 
      {
        $id =$this->session->hospital->id_hopital;
        $datas['rows_lignes'] = $this->personnel->CountPersonnels($id);
        $datas['lignes']= $this->typePersonnel->getNomType();
        $datas['rows'] = $this->hospital->Editdata($id);
        $datas['fecth_row']= $this->typePersonnel->getNomType();

        $this->load->view('hopital/profil_page',$datas);
        $this->load->view('layouts/footer');
      }
    }
#mise a jour du mot de passe
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
        'required|matches[CFpwd]|alpha_numeric',
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

      if ($this->form_validation->run()==true)
      {
        $id = $this->session->hospital->id_hopital;
        $old = md5($this->input->post('Apwd'));
        $new = ($this->input->post('Npwd'));
        $cf =  ($this->input->post('CFpwd'));
        $date = date('Y-m-d H:i:s');

        if (($this->hospital->MatchPassword($id, $old))==false) 
        {
          $this->session->set_flashdata("error","Le mot de passe entré ne correspond à votre mot de passe, Verifiez!!");
          $this->load->view('hopital/edit_profil_page',$datas);
          $this->load->view('layouts/footer');
        }
        $this->hospital->UpdatePassword($id,$new,$date);
        $datas['ligne']= $this->typePersonnel->getNomType();
        $datas['rows_lignes'] = $this->personnel->CountPersonnels($id);
        $datas['rows'] = $this->hospital->Editdata($id);
        $this->session->set_flashdata("success","Mise à jour reussie!!");
        redirect('hopital/Profilpage','refresh');
      }
      else {
        $id =$this->session->hospital->id_hopital;
        $datas['ligne']= $this->typePersonnel->getNomType();
        $datas['rows_lignes'] = $this->personnel->CountPersonnels($id);
        $datas['rows'] = $this->hospital->Editdata($id);
        $this->session->set_flashdata("error","*Veuillez remplir les champs!!");
        $this->load->view('hopital/profil_page',$datas);
        $this->load->view('layouts/footer');
      }
    }
#mise a jour de l'image(telechargement de l'image)
    public function UploadImage()
    {
      $config['upload_path']  = './assets/images/hopitaux/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size']    = 2048;
      $config['overwrite'] = true; #ecraser une image existente par celle qu'on souhaite uploader
      $config['file_ext_tolower'] = true; #met les extensions en minuscules

      $id=$this->session->hospital->id_hopital;
      $q = $this->db->select('*')->where('id_hopital', $id)->get('hopital');
      $name =$q->row();
      $new_name = date("Y_m_d").'@'.$name->id_hopital;
      $config['file_name'] = $new_name;
      $this->load->library('upload', $config); # import de la library pour l'upload
      $this->upload->initialize($config);#initialisation des parametres de telechargement de l'img

      if ( ! $this->upload->do_upload('userfile'))
      {
        if (isset($_FILES['userfile'])) 
        {
          $error= $this->upload->display_errors();
          $this->session->set_flashdata('error_msg', $error);
          $data['ligne']= $this->typePersonnel->getNomType();
          $data['rows_lignes'] = $this->personnel->CountPersonnels($id);
          $data['rows'] = $this->hospital->Editdata($id);
          $this->load->view('hopital/profil_page',$data);
          $this->load->view('layouts/footer');
        } 
      }
      $imgName = $q->row();
      @unlink("./assets/images/hopitaux/".$imgName->images);
      $uploaddata = $this->upload->data();
      $filename =$uploaddata['file_name'];
      $userdata = array(
        'images'=>$filename
      );

      $this->hospital->UpdateImages($id, $filename);
      $data['ligne']= $this->typePersonnel->getNomType();
      $data['rows_lignes'] = $this->personnel->CountPersonnels($id);
      $data['rows'] = $this->hospital->Editdata($id);
      $this->session->set_flashdata('succes',"Téléchargement reussi!!");
      redirect('hopital/Profilpage','refresh');
    }

#liste des patients d'un hôpital
    public function listePatients()
    {
      $id = $this->session->hospital->id_hopital;
      $datas['sql'] = $this->hospital->Editdata($id);

      $this->load->library('pagination');
      $config['base_url'] = base_url().'hopital/listePatients';
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
      $datas['data'] = $this->patient->getListPatient($config['per_page'], $page);
      $this->load->view('patient/liste_patient',$datas);
      $this->load->view('layouts/footer',$datas);
    }
  }
?>