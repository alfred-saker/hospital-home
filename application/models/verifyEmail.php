<?php defined('BASEPATH') OR exit('No direct script access allowed');

class VerifyEmail extends CI_Model 
{

  function mail_exists($email)
  {
    return $this->db->select('*')
                    ->from('hopital, patient, personnel, pharmacien, pharmacie,super_admin')
                    ->where('hopital.email',$email) 
                    ->or_where('patient.email',$email)
                    ->or_where('personnel.email',$email)
                    ->or_where('pharmacien.email',$email)
                    ->or_where('pharmacie.email',$email)
                    ->or_where('super_admin.email',$email)
                    ->get()
                    ->result();
  }
  function password_exist($password)
  {
    return $this->db->select('*')
                    ->from('hopital, patient, personnel, pharmacien, pharmacie,super_admin')
                    ->where('hopital.passwords',$password) 
                    ->or_where('patient.passwords',$password)
                    ->or_where('personnel.passwords',$password)
                    ->or_where('pharmacien.passwords',$password)
                    ->or_where('pharmacie.passwords',$password)
                    ->or_where('super_admin.passwords',$password)
                    ->get()
                    ->result();
  }
}