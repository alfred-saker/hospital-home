<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operations extends CI_Controller 
{
#page d'accueil des operations(liste des operations effetuées)
  public function index()
  {
    $id = $this->session->personnel->id_personnel;
    $datas['enrol']=$this->personnel->getNom($id);
    $datas['donnees'] = $this->personnel->Edit($id);

    $this->load->library('pagination');
    $config['base_url'] = base_url().'Operations/index';
    $config['total_rows'] = $this->operation->CountOperation($id);
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
    $datas['params'] = $this->operation->getOperation($id,$config['per_page'], $page);
    $this->load->view('operation/liste_operation',$datas);
    $this->load->view('layouts/footer');
  }  
#toute les operations
  public function viewAllOperation()
  {
    $id = $this->session->personnel->id_personnel;
    $datas['enrol']=$this->personnel->getNom($id);
    $datas['donnees'] = $this->personnel->Edit($id);

    $this->load->library('pagination');
    $config['base_url'] = base_url().'Operations/viewAllOperation';
    $config['total_rows'] = $this->operation->CountOperation($id);
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
    $datas['params'] = $this->operation->getAllOperation($id,$config['per_page'], $page);
    $this->load->view('operation/listeAll_operation',$datas);
    $this->load->view('layouts/footer');
  }
# ajout d'une operation par un personnel
  public function faireOperation($id_patient)
  {
    $this->form_validation->set_rules(
      'type','type operation',
      'required',
      array(
        'required'=>"*Veuillez fournir le %s"
      )
    );
    $this->form_validation->set_rules(
      'allergie','allergie',
      'required',
      array(
        'required'=>"*Veuillez fournir le %s"
      )
    );
    $this->form_validation->set_rules(
      'result','resultat',
      'required',
      array(
        'required'=>"*Veuillez fournir le %s"
      )
    );
    $this->form_validation->set_rules(
      'describe','decription',
      'required',
      array(
        'required'=>"*Veuillez fournir le %s"
      )
    );
    $this->form_validation->set_rules(
      'comment','commentaire',
      'required',
      array(
        'required'=>"*Veuillez fournir le %s"
      )
    );
    $this->form_validation->set_rules(
      'prescribe','Prescription ',
      'required',
      array(
        'required'=>"*Veuillez fournir le %s"
      )
    );
    $id = $this->session->personnel->id_personnel;

    if ($this->form_validation->run()==true) 
    {
      $donnees = array(
        'id_typeOperation'=>$this->input->post('type'),
        'id_personnel'=> $id,
        'id_patient'=>$id_patient,
        'allergie'=>ucwords($this->input->post('allergie')),
        'resultat'=> ($this->input->post('result')),
        'commentaire'=>($this->input->post('comment')),
        'description_op'=>($this->input->post('describe')),
        'prescription'=>ucwords($this->input->post('prescribe')),
        'date_operation'=>date('Y-m-d H:i:s'),
      );
      $this->db->insert('operation', $donnees);
      $data['value'] = $this->patient->getEmailUnique($id_patient);
      $data['funct'] = $this->operation->typeoperation();
      $data['datas']=$this->personnel->getNom($id);
      $data['donnees'] = $this->personnel->Edit($id);
      $this->session->set_flashdata('success_msg', 'Operation effectuée avec success!!');
      redirect('operations/index','refresh');
    } 
    else
    {
      $data['funct'] = $this->operation->typeoperation();
      $data['value'] = $this->patient->getEmailUnique($id_patient);
      $data['datas']=$this->personnel->getNom($id);
      $data['donnees'] = $this->personnel->Edit($id);
      //$this->session->set_flashdata('error', 'Echec de l\'operation!!');
      $this->load->view('operation/operation', $data);
      $this->load->view('layouts/footer');
    }
  }
#page de mise a jour d'une operation
  public function ViewUpdateDossier()
  {
    $id = $this->session->personnel->id_personnel;
    $id_operation=$this->input->post('id_operation');
    $id1 = $this->input->post('id_patient');
    $email =$this->input->post('email');
    $password = md5($this->input->post('password'));
    $user_patient = $this->patient->getEmailPatient($email, $password);
    if ($user_patient) 
    {
      $datas['funct'] = $this->operation->getUpdateOperation($id,$id_operation,$id1);
      $datas['value'] = $this->patient->getEmailUnique($id1);
      $datas['datas']=$this->personnel->getNom($id);
      $datas['donnees'] = $this->personnel->Edit($id);
      $this->session->set_flashdata('success','Verification reussie!!Vous pouvez commencer à modifier');
      $this->load->view('dossierMedical/update_carnet',$datas);
      $this->load->view('layouts/footer');
    }
    else 
    {
      $datas['funct'] = $this->operation->getUpdateOperation($id,$id_operation,$id1);
      $datas['value'] = $this->patient->getEmailUnique($id1);
      $datas['enrol']=$this->personnel->getNom($id);
      $datas['donnees'] = $this->personnel->Edit($id);

      $this->load->library('pagination');
      $config['base_url'] = base_url().'Operations/index';
      $config['total_rows'] = $this->operation->CountOperation($id);
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
      $datas['params'] = $this->operation->getOperation($id,$config['per_page'], $page);
      $this->session->set_flashdata('error_msg', 'Erreur:Mauvaise correspondance!!');
      redirect('operations/index');
    }
  }
#mise a jour d'une operation
  public function UpdateOperation()
  {
    $this->form_validation->set_rules(
      'motif','motif',
      'required',
      array(
        'required' => '*Veuillez remplir le champ %s.',
      )
    );
    if($this->form_validation->run()==true)
    {  
      $id=$this->session->personnel->id_personnel;
      $id1 = $this->input->post('id_patient'); 
      $id_operation = $this->input->post('id_operation');
      $al = $this->input->post('allergie');
      $pres = $this->input->post('prescribe');
      $resul = $this->input->post('result');
      $desc = $this->input->post('describe');
      $comment = $this->input->post('comment');
      $motif = $this->input->post('motif');
      $date= date('Y-m-d H:i:s');

      $datas['funct'] = $this->operation->getUpdateOperation($id,$id1,$id_operation);
      $datas['datas']=$this->personnel->getNom($id);
      $datas['donnees'] = $this->personnel->Edit($id);
        
      $this->operation->UpdateOperation($id_operation,$al,$pres,$resul,$desc,$comment,$motif,$date);
      $this->session->flashdata('success_msg', 'Modification effectuée!!');
      redirect('operations/index');
    }
    else
    {
      $id=$this->session->personnel->id_personnel;
      $id1 = $this->input->post('id_patient'); 
      $this->session->flashdata('error', 'Echec de modification!!');
      $datas['funct'] = $this->operation->getUpdateOperation($id,$id1);
      $datas['datas']=$this->personnel->getNom($id);
      $datas['donnees'] = $this->personnel->Edit($id);
      $this->session->set_flashdata('error','Echec de modification!!');
      $this->load->view('dossierMedical/update_carnet',$datas);
      $this->load->view('layouts/footer');
    }
  }
 
}
