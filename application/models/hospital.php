<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hospital extends CI_Model 
{
#selectionner l'hopital dont l'email =$email et password=$password
  public function getEmailHopital($email, $password)
  {
    return $this->db->select('*')
                        ->from('hopital')
                        ->where('email', $email)
                        ->where('passwords', $password)
                        ->where('status', '1')
                        ->get()
                        ->result();     
  }
#recuperer tous les hopitaux
  public function getListHopital($limit=null,$start=null)
  {
    return $this->db->select('*')
                      ->from('hopital')
                      ->where('status','1')
                      ->limit($limit, $start)
                      ->get()
                      ->result();
  }
#mise a jour des infos de l'hôpital
  public function UpdateData($id, $array)
  {
    $this->db->set($array);
    $this->db->where('id_hopital', $id);
    $this->db->update('hopital');

  }
#verification si le oldpassword=newpassword
  public function MatchPassword($id,$password)
  {
    $this->db->from('hopital');
    $this->db->where('passwords',$password);
    $this->db->where('id_hopital',$id);
    $query= $this->db->get();
    return $query->row();
  }
#mise a jour du password
  public function UpdatePassword($id,$new,$date)
  {
    $this->db->set('passwords', md5($new));
    $this->db->set('date_update', $date);
    $this->db->where('id_hopital', $id);
    $this->db->update('hopital');
  }
#mise a jour de l'image
  public function UpdateImages($id, $image)
  {
    $this->db->set('images', $image);
    $this->db->where('id_hopital', $id);
    $this->db->update('hopital');
  }
#edit des donnees
  public function Editdata($id)
  {
    $this->db->from('hopital');
    $this->db->where('id_hopital', $id);
    $query= $this->db->get();
    return $query->row();   
  }

  public function getHopitalCount()
  {
    return $this->db->select("COUNT(*) as num_row")
                    ->from('hopital')
                    ->get()
                    ->result();
  }

  public function delete($id)
  {
    $this->db->set('status','0');
    $this->db->where('id_hopital',$id);
    $this->db->update('hopital');
  }
}