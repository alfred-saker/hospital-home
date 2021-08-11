<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
  public function __construct(){
    parent::__construct();
  }
#page de login
  public function index()
  {
    $this->load->view('identification/connexion');
    $this->load->view('layouts/footer');
  }
#page envoie d'email 
  public function send()
  {
    $this->load->view('identification/succes_page');
  }
#page mot de passe oublié
  public function forgetPassword()
  {
    $this->load->view('identification/forget_password');
    $this->load->view('layouts/footer');
  }
#page d'accueil administrateur
  public function admin()
  {
    $id = $this->session->admin->id;
    $data['user_admin'] = $this->super_admin->getadmin($id);
    $this->load->view('admin/admin',$data);
    $this->load->view('layouts/footer');
  }
#page d'accueil pharmacie
  public function pharmacie()
  {
    $id = $this->session->pharmacie->id_pharmacie;
    $result['resultat'] = $this->pharmacies->Edit($id);
    $this->load->view('pharmacie/dashbord_pharmacies',$result);
    $this->load->view('layouts/footer');
  }
#page d'accueil pharmacien
  public function pharmacien()
  {
    $id = $this->session->pharmacien->id_pharmacien;
    $data['donnees'] = $this->pharmaciens->Edit($id);
    $data['round'] = $this->pharmaciens->getNom($id);
    $this->load->view('pharmacien/dashboard_pharmacien',$data);
    $this->load->view('layouts/footer');
  }
#page d'accueil hôpital
  public function hopital()
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
#page d'accueil personnel
  public function personnel()
  {
    $id = $this->session->personnel->id_personnel;
    $data['datas']=$this->personnel->getNom($id);
    $data['donnees'] = $this->personnel->Edit($id);
    $this->load->view('personnel/dashboard_personnel', $data);
    $this->load->view('layouts/footer');
  }
#page d'accueil patient
  public function patient()
  {
    $id = $this->session->patient->id_patient;
    $user['users_profil'] = $this->patient->Edit($id);
    $this->load->view('patient/dashboard_patient',$user);
    $this->load->view('layouts/footer');
  }
#fonction de connexion
  public function connected()
  {
#validation du formulaire
    $this->form_validation->set_rules(
      'email', 'email',
       'required',
       array(
         'required'=>'*Veuillez renseigner le champ %s'
       )
      );
    $this->form_validation->set_rules(
      'password', 'password',
      'required',
      array(
        'required'=>'*Veuillez renseigner le champ %s'
      )
    );

    if($this->form_validation->run() == TRUE)
    {
      $email= $this->input->post('email');#recuperation de l'email
      $password = md5($this->input->post('password'));#recuperation du password
#recuperation du resultat de la recherche des données entrer dans le formulaire de connexion
      $user_hopital = $this->hospital->getEmailHopital($email, $password);
      $user_patient = $this->patient->getEmailPatient($email, $password);
      $user_personnel = $this->personnel->getEmailPersonnel($email, $password);
      $user_pharmacie = $this->pharmacies->getEmailPharmacie($email, $password);
      $user_pharmacien = $this->pharmaciens->getEmailPharmacien($email, $password);
      $super_admin = $this->super_admin->getEmailAdmin($email, $password);
      
      if ($this->VerifyEmail->mail_exists($email)) #verification si l'email entré dans le formualire existe dans la bd
      {
        if ($user_hopital)
        {
          $this->session->set_userdata('hospital', $user_hopital[0]);#creation de la session hopital
          redirect('login/hopital');#redirection vers la page d'acceuil de l'hopital
        }
        if ($user_patient) 
        {
          $this->session->set_userdata('patient',$user_patient[0]);#creation de la session patient
          redirect('login/patient');#redirection vers la page d'acceuil du patient
        }
        if ($user_personnel) 
        {
          $this->session->set_userdata('personnel',$user_personnel[0]);#creation de la session personnel
          redirect('login/personnel');#redirection vers la page d'acceuil du personnel
        }
        if ($user_pharmacie) 
        {
          $this->session->set_userdata('pharmacie',$user_pharmacie[0]);#creation de la session pharmacie
          redirect('login/pharmacie');#redirection vers la page d'acceuil de la pharmcie
        }
        if ($user_pharmacien) 
        {
          $this->session->set_userdata('pharmacien',$user_pharmacien[0]);#creation de la session pharmacien
          redirect('login/pharmacien');#redirection vers la page d'acceuil du pharmacien
        }
        if($super_admin)
        {
          $this->session->set_userdata('admin',$super_admin[0]);#creation de la session admin
          redirect('login/admin');#redirection vers la page d'acceuil de l'admin
        } 
        else 
        {
          $this->session->set_flashdata('error_msg', 'Email ou mot de passe incorrect');
          $this->load->view('identification/connexion');
          $this->load->view('layouts/footer');
        }
      }
      else 
      {
        $this->session->set_flashdata('error_msg', "Desolé, cette adresse n'existe pas!");
        $this->load->view('identification/connexion');
        $this->load->view('layouts/footer');
      }
          
    }
    else 
    {
      $this->session->set_flashdata('error_msg', '*Veuillez renseigner tous les champs!');
      $this->load->view('identification/connexion');
      $this->load->view('layouts/footer');
    }
  }

  public function Email_exists()
  {
    $result = $this->VerifyEmail->mail_exists($email);
  }
#fonction de deconnexion (logout)
  public function deconnexion()
  {
    $this->session->sess_destroy();
    redirect('login/index', 'refresh');
  } 
#fonction d'envoir d'email
  public function sendMail()
  {
    $this->form_validation->set_rules(
      'email','email',
      'required',
      array(
        'required' =>'*Veuillez renseigner le champ %s',
      )
    );
    if ($this->form_validation->run()==true)
    {
      $email = $this->input->post('email');

      $config['newline'] = "\r\n"; //You must use double quotes on this one
      $config['protocol'] = 'smtp';
      $config['smtp_host'] = 'ssl://smtp.gmail.com'; //Change for your specific needs
      $config['smtp_port'] = 465; //Change for your specific needs
      $config['smtp_user'] = 'alfredkuate55@gmail.com'; //Change for your specific needs
      $config['smtp_pass'] = 'alfred2000'; //Change for your specific needs
      $config['charset'] = 'iso-8859-1';
      $config['mailtype'] = 'text'; //This can be set as 'html' too

      $this->email->from('alfredkuate55@gmail.com', 'Alfred Saker');
      $this->email->to($email, 'Ronald');
      $this->email->subject('Votre compte est activé');
      $this->email->message('Bienvenu sur mon application 3H!');

      $sent = $this->email->send();
     
      if(($sent))
      {
        echo 'envoye';
      }
      else {
        echo 'echec';
      }

    }
    
  }
  //   $to =  $this->input->post('email');  // User email pass here

    //   $subject = 'Welcome To 3H application ';

    //   $from = 'alfredkuate55@gmail.com';              // Pass here your mail id

    //   $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#000000;padding-left:3%"><img src="http://elevenstechwebtutorials.com/assets/logo/logo.png" width="300px" vspace=10 /></td></tr>';
    //   $emailContent .='<tr><td style="height:20px"></td></tr>';


    //   //$emailContent .= $this->input->post('message');  //   Post message available here
    //   $emailContent = '<p> this is the mail from your reset password</p>';

    //   $emailContent .='<tr><td style="height:20px"></td></tr>';
    //   $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='#' target='_blank' style='text-decoration:none;color: #60d2ff;'>www.elevenstechwebtutorials.com</a></p></td></tr></table></body></html>";
                  


    //   $config['protocol']    = 'smtp';
    //   $config['smtp_host']    = 'ssl://smtp.gmail.com';
    //   $config['smtp_port']    = '465';
    //   $config['smtp_timeout'] = '60';

    //   $config['smtp_user']    = 'alfredkuate55@gmail.com'; //Important
    //   $config['smtp_pass']    = 'alfred2000';  //Important

    //   $config['charset']    = 'utf-8';
    //   $config['newline']    = "\r\n";
    //   $config['mailtype'] = 'html'; // or html
    //   $config['validation'] = TRUE; // bool whether to validate email or not 

    //   $this->email->initialize($config);
    //   $this->email->set_mailtype("html");
    //   $this->email->from($from);
    //   $this->email->to($to);
    //   $this->email->subject($subject);
    //   $this->email->message($emailContent);
    //   $this->email->send();
    //   //print_r($this->email->message($emailContent));
    // //die();
    //     //$this->session->set_flashdata('success_msg',"Mail has been sent successfully");
    //     return redirect ('login/send');
    // }
    // else {
    //   $this->session->set_flashdata('error_msg',"Echec, veuillez verifier vos informations!!");
    //   return redirect('Login/forgetPassword');
    // }
    // else {
    //   $this->session->set_flashdata('error_msg',"Mail has been not sent successfully");
    //   return redirect('Login/forgetPassword');
    // }
}
?>