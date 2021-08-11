<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
#fonction de redirection si la session de l'utilisateur est expirée ou n'existe plus
  public function __construct()
  {
    parent::__construct();
    if (empty($this->session->admin))
    {
      $this->session->set_flashdata('error_msg', 'votre session a expiré , veuillez vous connecter à nouveau!!');
      redirect('login/index');
    } 
  }
#page d'accueil admin
  public function index()
  {
    $id = $this->session->admin->id;
    $data['user_admin'] = $this->super_admin->getadmin($id);
    $this->load->view('admin/admin',$data);
    $this->load->view('layouts/footer');
  }
#liste des pharmacies
  public function listePharmacie()
  {
    $id = $this->session->admin->id;
    $data['user_admin'] = $this->super_admin->getadmin($id);
    $data['donnees'] = $this->pharmacies->getListPharmacie();
    $this->load->view('pharmacie/liste_pharmacie', $data);
    $this->load->view('layouts/footer');
  } 
#ajouter une pharmacie
  public function ajouterPharmacie(){

    $this->form_validation->set_rules(
      'nom','nom pharmacie',
      'required',
      array(
        'required'=>'*Veuillez remplir le champ %s'
      )
    );
    $this->form_validation->set_rules(
      'email','email',
      'required',
      array(
        'required'=>'*Veuillez remplir le champ %s'
      )
    );
    $this->form_validation->set_rules(
      'telephone','telephone',
      'required|is_numeric|max_length[11]|min_length[9]',
      array(
        'required'=>'*Veuillez remplir le champ %s',
        'is_numeric' =>'Ne doit contenir que des chiffres compris de 9 à 11 chiffres'
      )
    );
    $this->form_validation->set_rules(
      'pays','pays',
      'required',
      array(
        'required'=>'*Veuillez remplir le champ %s'
      )
    );
    $this->form_validation->set_rules(
      'ville','ville',
      'required',
      array(
        'required'=>'*Veuillez remplir le champ %s'
      )
    );
    $this->form_validation->set_rules(
      'quartier','quartier',
      'required',
      array(
        'required'=>'*Veuillez remplir le champ %s'
      )
    );
    $this->form_validation->set_rules(
      'bp','boite postale',
      'required',
      array(
        'required'=>'*Veuillez remplir le champ %s'
      )
    );

    if($this->form_validation->run() == TRUE)
    {
      $data1 = array(
        'nom_pharmacie' => strtoupper($this->input->post('nom')),
        'email' => $this->input->post('email'),
        'telephone' => $this->input->post('telephone'),
        'pays' =>ucwords( $this->input->post('pays')),
        'ville' =>ucwords( $this->input->post('ville')),
        'quartier' =>ucwords( $this->input->post('quartier')),
        'boite_postal' => $this->input->post('bp'),
        'passwords' => md5(123),
        'date_creation' => date('Y-m-d'),
      );
      if ($this->VerifyEmail->mail_exists($data1['email'])== true)
      {
        $id = $this->session->admin->id;
        $data['user_admin'] = $this->super_admin->getadmin($id);
        $this->session->set_flashdata('error_msg', 'Cet email est deja utilisé!!');
        $this->load->view('pharmacie/ajouter_pharmacie',$data);
        $this->load->view('layouts/footer');
      }
      else 
      {
        $id = $this->session->admin->id;
        $data['user_admin'] = $this->super_admin->getadmin($id);
        $this->db->insert('pharmacie', $data1);
        $this->session->set_flashdata('success_msg', 'Enregistrement effectué!!');
        redirect('Admin/ListePharmacie','refresh');
      } 
    }
    else 
    {
      $id = $this->session->admin->id;
      $data['user_admin'] = $this->super_admin->getadmin($id);
      $this->load->view('pharmacie/ajouter_pharmacie',$data);
      $this->load->view('layouts/footer');
    }
  }
#ajouter un hôpital
  public function ajouterHopital()
  {
    $this->form_validation->set_rules(
      'nom','nom hopital',
      'required',
      array(
        'required'=>'*Veuillez remplir le champ %s'
      )
    );
    $this->form_validation->set_rules(
      'email','email',
      'required',
      array(
        'required'=>'*Veuillez remplir le champ %s'
      )
    );
    $this->form_validation->set_rules(
      'telephone','telephone',
      'required|is_numeric|max_length[11]|min_length[9]',
      array(
        'required'=>'*Veuillez remplir le champ %s',
        'is_numeric' =>'Ne doit contenir que des chiffres compris entre 9 et 11 chiffres'
      )
    );
    $this->form_validation->set_rules(
      'pays','pays',
      'required',
      array(
        'required'=>'*Veuillez remplir le champ %s'
      )
    );
    $this->form_validation->set_rules(
      'ville','ville',
      'required',
      array(
        'required'=>'*Veuillez remplir le champ %s'
      )
    ); $this->form_validation->set_rules(
      'quartier','quartier',
      'required',
      array(
        'required'=>'*Veuillez remplir le champ %s'
      )
    );
    $this->form_validation->set_rules(
      'bp','boite postale',
      'required',
      array(
        'required'=>'*Veuillez remplir le champ %s'
      )
    );
    if($this->form_validation->run()==true)
    {
      $data2 = array(
        'nom_hopital' => strtoupper($this->input->post('nom')),
        'email' => $this->input->post('email'),
        'telephone' => $this->input->post('telephone'),
        'pays' => ucwords($this->input->post('pays')),
        'ville' => ucwords($this->input->post('ville')),
        'quartier' => ucwords($this->input->post('quartier')),
        'boite_postal' => $this->input->post('bp'),
        'passwords' => md5(123),
        'date_creation' => date('Y-m-d'),
      );
      if ($this->VerifyEmail->mail_exists($data2['email'])== true)
      {
        $id = $this->session->admin->id;
        $data['user_admin'] = $this->super_admin->getadmin($id);
        $this->session->set_flashdata('error_msg', 'Cet email est deja utilisé!');
        $this->load->view('hopital/ajouter_hopital',$data);
        $this->load->view('layouts/footer');
      }
      else 
      {
        $id = $this->session->admin->id;
        $data['user_admin'] = $this->super_admin->getadmin($id);
        $this->db->insert('hopital', $data2);
        $this->session->set_flashdata('success_msg', 'Enregistrement effectué');
        redirect('Admin/ajouterHopital','refresh');
      }
    }
    else 
    {
      $id = $this->session->admin->id;
      $data['user_admin'] = $this->super_admin->getadmin($id);
      $this->load->view('hopital/ajouter_hopital',$data);
      $this->load->view('layouts/footer');
    }
  }
#liste des hôpitaux
  public function listeHopital()
  {
    $id = $this->session->admin->id;
    $data['user_admin'] = $this->super_admin->getadmin($id);

    $this->load->library('pagination');
    $config['base_url'] = base_url().'Admin/listeHopital';
    $config['total_rows'] = $this->hospital->getHopitalCount();
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
    //$data['link'] = $this->pagination->create_links();

    $data['results'] = $this->hospital->getListHopital();
    $this->load->view('hopital/liste_hopital', $data);
    $this->load->view('layouts/footer');
  }

#profil administrateur
  public function profilAdmin()
  {
    $id=$this->session->admin->id;
    $data['user_admin'] = $this->super_admin->getadmin($id);
    $this->load->view('admin/profil_admin',$data);
    $this->load->view('layouts/footer');
  }

  public function Updateadmin()
  {
    $id=$this->session->admin->id;
    $this->form_validation->set_rules(
      'nom','Nom',
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

    if ($this->form_validation->run()==true) {
      $array=array(
        'nom' => strtoupper($this->input->post('nom')),
        'email' => $this->input->post('email'),
        'pays' => ucwords($this->input->post('pays')),
        'ville' => ucwords($this->input->post('ville')),
        'quartier' => ucwords($this->input->post('quartier')),
        'telephone' => $this->input->post('telephone'),
        'sexe' => $this->input->post('sexe'),
        'date_update' => date('Y-m-d')
      );

      $this->super_admin->UpdateAdmin($id,$array);
      $this->session->set_flashdata("success_msg", "Mise à jour reussi");
      redirect('admin/profilAdmin', 'refresh');
    }
    else 
    {
      $data['user_admin'] = $this->super_admin->getadmin($id);
      $this->load->view("admin/profil_admin",$data);
      $this->load->view("layouts/footer");
    }
  }
#CHANGER MOT DE PASSE
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
    $id = $this->session->admin->id;
    if ($this->form_validation->run()==true) 
    {
     $old = md5($this->input->post('Apwd'));
     $new = ($this->input->post('Npwd'));
     $cf =  ($this->input->post('CFpwd'));
     $date = date('Y-m-d H:i:s');

     if (($this->super_admin->MatchPassword($id, $old))==false) 
      {
        $data['user_admin'] = $this->super_admin->getadmin($id);
        $this->session->set_flashdata("error","Votre mot de passe entrez ne correspond à celui de votre compte, Verifiez!!");
        $this->load->view('admin/profil_admin',$data);
        $this->load->view('layouts/footer');
      }
      else
      {
        $data['user_admin'] = $this->super_admin->getadmin($id);
        $this->super_admin->UpdatePasswords($id,$new,$date);
        $this->session->set_flashdata("success","Mot de passe mis à jour avec success!!");
        redirect('admin/profilAdmin','refresh');
      }
    }
    else 
    {
      $data['user_admin'] = $this->super_admin->getadmin($id);
      $this->load->view('admin/profil_admin',$data);
      $this->load->view('layouts/footer');
    }
  }

  public function UpdateImage()
  {
    $config['upload_path']  = './assets/images/super_admin/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size']    = 2048;
    $config['overwrite'] = true; #ecraser une image existente par celle qu'on souhaite uploader
    $config['file_ext_tolower'] = true; #met les extensions en minuscules
    $id=$this->session->admin->id;
    $q = $this->db->select('*')->where('id', $id)->get('super_admin');
    $name =$q->row();
    
    $new_name = date("Y_m_d").'@'.$name->id;
    $config['file_name'] = $new_name; 
    $this->load->library('upload', $config); # import de la library pour l'upload
    $this->upload->initialize($config);#initialisation des parametres de telechargement de l'img

    if ( ! $this->upload->do_upload('userfile'))
    {
      if (isset($_FILES['userfile'])) 
      {
        $error= $this->upload->display_errors();
        $this->session->set_flashdata('errors', $error);
        $data['user_admin'] = $this->super_admin->getadmin($id);
        $this->load->view('admin/profil_admin',$data);
        $this->load->view('layouts/footer');
      } 
    }
    $imgName = $q->row();
    @unlink("./assets/images/super_admin/".$imgName->images);
    $uploaddata = $this->upload->data();
    $filename =$uploaddata['file_name'];
    $userdata = array(
        'images'=>$filename
      );
    $date = date('Y-m-d H:i:s');
    $this->super_admin->UpdateImage($id, $filename,$date);
    $data['user_admin'] = $this->super_admin->getadmin($id);
    $this->session->set_flashdata('succes',"Téléchargement reussi!!");
    redirect("admin/profilAdmin","refresh");
  }

#supprimer une pharmacie

  public function delete_pharmacie()
  {
    $id = $this->input->post('id_pharmacie');
    $this->pharmacies->delete($id);
    $this->session->set_flashdata('success_msg', 'Suppression reussie!!');
    redirect('admin/listePharmacie','refresh');
  }
#supprimer un hôpital

  public function delete_hopital()
  {
    $id = $this->input->post('id_hopital');
    $this->hospital->delete($id);
    $this->session->set_flashdata('success_msg', 'Suppression reussie!!');
    redirect('admin/listeHopital','refresh');
  }
}
?>