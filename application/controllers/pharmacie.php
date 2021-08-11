<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pharmacie extends CI_Controller 
{
# fonction de redirection si la session de l'utilisateur est expirée ou n'existe plus
  public function __construct()
  {
    parent::__construct();
    if (empty($this->session->pharmacie))
    {
      $this->session->set_flashdata('error_msg', 'votre session a expiré , veuillez vous connecter à nouveau!!');
      redirect('login/index');
    } 
  }
# page d'accueil de la pharmacie
  public function index()
  {
    $id = $this->session->pharmacie->id_pharmacie;
    $result['resultat'] = $this->pharmacies->Edit($id);
    $this->load->view('pharmacie/dashbord_pharmacies',$result);
    $this->load->view('layouts/footer');
  }
# Appel de la liste des pharmaciens
  public function pharmacien()
  {
    $this->load->view('pharmacien/liste_pharmacien');
    $this->load->view('layouts/footer');
  }
# Ajout des pharmaciens
  public function ajouterPharmacien()
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
      'username','username',
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
    $id = $this->session->pharmacie->id_pharmacie;
    if($this->form_validation->run() == TRUE)
    {
      $data = array(
        'id_pharmacie'=>$this->session->pharmacie->id_pharmacie,
        'nom_pharmacien' => strtoupper($this->input->post('nom')),
        'email' => $this->input->post('email'),
        'telephone' => $this->input->post('telephone'),
        'adresse' => ucwords($this->input->post('adresse')),
        'sexe' => $this->input->post('sexe'),
        'username'=>$this->input->post('username'),
        'passwords' => md5($this->input->post(123)),
        'status'=>'1',
        'date_creation'=> date('Y-m-d')
      );
      
      if ($this->VerifyEmail->mail_exists($data['email'])) 
      {
        $result['resultat'] = $this->pharmacies->Edit($id);
        $this->session->set_flashdata('error_msg', 'Cet email est deja utilisé!!');
        $this->load->view('pharmacien/ajouter_pharmacien',$result);
        $this->load->view('layouts/footer');
      }
      else
      {
        $result['resultat'] = $this->pharmacies->Edit($id);
        $this->db->insert('pharmacien', $data);
        $this->session->set_flashdata('success_msg', 'Enregistrement reussi!!');
        $this->load->view('pharmacien/ajouter_pharmacien',$result);
        $this->load->view('layouts/footer');
      }
    }
    else
    {
      $result['resultat'] = $this->pharmacies->Edit($id);
      //$this->session->set_flashdata("error_msg", "Echec d'enregistrement, *veuillez remplir tous les champs!!");
      $this->load->view('pharmacien/ajouter_pharmacien',$result);
      $this->load->view('layouts/footer');
    }
  }
# Liste des pharmaciens avec pagination
  public function listPharmacien()
  {
    $this->load->library('pagination');
    $id = $this->session->pharmacie->id_pharmacie;

    $this->load->library('pagination');
    $config['base_url'] = base_url().'Pharmacie/listPharmacien';
    $config['total_rows'] = $this->pharmaciens->getPharmacienCount($id);
    $config['per_page'] = 5;
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
    $pharmacien['link'] = $this->pagination->create_links();
    $pharmacien['data'] = $this->pharmaciens->getListPharmacien($id,$config['per_page'], $page);
    $pharmacien['resultat'] = $this->pharmacies->Edit($id);

    $this->load->view('pharmacien/liste_pharmacien',$pharmacien );
    $this->load->view('layouts/footer',$pharmacien);
  }
# Supprimer un pharmacien
  public function deletePharmacien()
  {
    $id = $this->input->post('id_pharmacien');
    $this->pharmaciens->delete($id); 
    $this->session->set_flashdata('success_msg', "Enregistrement supprimé avec success!!");
    redirect('pharmacie/listPharmacien','refresh'); 
  }
#mise a jour des informations de la pharmacie
  public function UpdateProfil()
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
      'bp','boite postal',
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
    $id = $this->session->pharmacie->id_pharmacie;
    if ($this->form_validation->run()==true) {
      
      $nom = strtoupper($this->input->post('nom'));
      $email = $this->input->post('email');
      $pays = ucwords($this->input->post('pays'));
      $ville = ucwords($this->input->post('ville'));
      $quartier = ucwords($this->input->post('quartier'));
      $tel = $this->input->post('telephone');
      $bp = $this->input->post('bp');
      $date = date('Y-m-d H:i:s');
      $result['results'] = $this->pharmacies->Edit($id);
      $this->pharmacies->UpdateDatas($id, $nom, $email,$pays,$ville,$quartier,$bp,$tel,$date);
      $this->session->set_flashdata("success_msg", "Mise à jour reussi");
      redirect('pharmacie/UpdateProfil', 'refresh');
    }
    else {
      $result['results'] = $this->pharmacies->Edit($id);
      $this->load->view("pharmacie/profil_pharmacie",$result);
      $this->load->view("layouts/footer");
    }
  }
#mise a jour de l'image(telechargement de l'image)
  public function UpdateImage()
  {
    $config['upload_path']  = './assets/images/pharmacie/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size']    = 2048;
    $config['overwrite'] = true; #ecraser une image existente par celle qu'on souhaite uploader
    $config['file_ext_tolower'] = true; #met les extensions en minuscules

    $id=$this->session->pharmacie->id_pharmacie;
    $q = $this->db->select('*')->where('id_pharmacie', $id)->get('pharmacie');
    $name =$q->row();
    
    $new_name = date("Y_m_d").'@'.$name->id_pharmacie;
    $config['file_name'] = $new_name;     
    $this->load->library('upload', $config); # import de la library pour l'upload
    $this->upload->initialize($config);#initialisation des parametres de telechargement de l'img

    if ( ! $this->upload->do_upload('userfile'))
    {
      if (isset($_FILES['userfile'])) 
      {
        $error= $this->upload->display_errors();
        $this->session->set_flashdata('error_msg', $error);
        $result['results'] = $this->pharmacies->Edit($id);
        $this->load->view('pharmacie/profil_pharmacie',$result);
        $this->load->view('layouts/footer');
      } 
    }
    $imgName = $q->row();
    @unlink("./assets/images/pharmacie/".$imgName->images);
    $uploaddata = $this->upload->data();
    $filename =$uploaddata['file_name'];
    $userdata = array(
        'images'=>$filename
      );

    $this->pharmacies->UpdateImages($id, $filename);
    $result['results'] = $this->pharmacies->Edit($id);
    $this->session->set_flashdata('succes',"Téléchargement reussi!!");
    $this->load->view('pharmacie/profil_pharmacie',$result);
    $this->load->view('layouts/footer');
  }
#mise a jour du mot de passe du pharmacien
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
    $id = $this->session->pharmacie->id_pharmacie;
    if ($this->form_validation->run()==true) 
    {
     
     $old = md5($this->input->post('Apwd'));
     $new = ($this->input->post('Npwd'));
     $cf =  ($this->input->post('CFpwd'));
     $date = date('Y-m-d H:i:s');

     if (($this->pharmacie->MatchPassword($id, $old))==false) 
      {
        $result['results'] = $this->pharmacies->Edit($id);
        $this->session->set_flashdata("error","Le mot de passe entrez ne correspond à votre mot de passe, Verifiez!!");
        $this->load->view('pharmacie/profil_pharmacie',$result);
        $this->load->view('layouts/footer');
      }
      $result['results'] = $this->pharmacies->Edit($id);
      $this->pharmacies->UpdatePassword($id,$new,$date);
      $this->session->set_flashdata("success","Mise à jour du mot de passe  reussie!!");
      redirect('pharmacie/UpdatePassword','refresh');
    }
    else 
    {
      $result['results'] = $this->pharmacies->Edit($id);
      $this->session->set_flashdata("error","Echec, veuillez verifier si vous avez bien remplir les champs!!");
      $this->load->view('pharmacie/profil_pharmacie',$result);
      $this->load->view('layouts/footer');
    }
  }

  // public function search()
  // {
  //   $q = $this->input->post('q');
  //   $this->load->library('pagination');
  //   $id = $this->session->pharmacie->id_pharmacie;

  //   $this->load->library('pagination');
  //   $config['base_url'] = base_url().'Pharmacie/listPharmacien';
  //   $config['total_rows'] = $this->pharmaciens->getPharmacienCount($id);
  //   $config['per_page'] = 5;
  //   $config['uri_segment'] = 3;
  //   $config['full_tag_open'] = '<ul class="pagination pagination-lg">';
  //   $config['full_tag_close'] = '</ul>';
  //   $config['attributes'] = array('class' => 'page_link');
  //   $config['first_link'] = 'First';
  //   $config['last_link'] = 'Last';
  //   $config['first_tag_open'] = '<li>';
  //   $config['first_tag_close'] = '</li>';
  //   $config['prev_link'] = '&laquo';
  //   $config['prev_tag_open'] = '<li class="prev">';
  //   $config['prev_tag_close'] = '</li>';
  //   $config['next_link'] = '&raquo';
  //   $config['next_tag_open'] = '<li>';
  //   $config['next_tag_close'] = '</li>';
  //   $config['last_tag_open'] = '<li>';
  //   $config['last_tag_close'] = '</li>';
  //   $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
  //   $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
  //   $config['num_tag_open'] = '<li>';
  //   $config['num_tag_close'] = '</li>';
  //   $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  //   $this->pagination->initialize($config);
  //   $pharmacien['link'] = $this->pagination->create_links();
  //   //$pharmacien['data'] = $this->pharmaciens->getListPharmacien();
  //   $pharmacien['data'] =$this->pharmaciens->search($id,$q,$config['per_page'], $page);
  //   var_dump($pharmacien['data']);exit;
  //   $pharmacien['resultat'] = $this->pharmacies->Edit($id);
  //   $this->load->view('pharmacien/result_search',$pharmacien);
  //   $this->load->view('layouts/footer');
  // }
}
?>