<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Super_admin extends CI_Model 
{
  public function getEmailAdmin($email, $password)
  {
    return $this->db->select('*')
                        ->from('super_admin')
                        ->where('email', $email)
                        ->where('passwords', $password)
                        ->get()
                        ->result();     
  }

  public function getadmin($id)
  {
    $this->db->select('*');
    $this->db->from('super_admin');
    $this->db->where('id',$id);
    $query=$this->db->get();
    return $query->row();
  }

  public function UpdateAdmin($id,$array)
  {
    $this->db->set($array);
    $this->db->where('id',$id);
    $this->db->update('super_admin');
  }

  public function MatchPassword($id,$password)
  {
    $this->db->from('super_admin');
    $this->db->where('passwords',$password);
    $this->db->where('id',$id);
    $query= $this->db->get();
    return $query->row();
  }

  public function UpdatePasswords($id,$new,$date)
  {
    $this->db->set('passwords', md5($new));
    $this->db->set('date_update', $date);
    $this->db->where('id', $id);
    $this->db->update('super_admin');
  }

  public function UpdateImage($id,$image,$date)
  {
    $this->db->set('images', $image);
    $this->db->set('date_update', $date);
    $this->db->where('id', $id);
    $this->db->update('super_admin');
  }
}