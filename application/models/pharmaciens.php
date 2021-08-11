<?php defined('BASEPATH') OR exit('No direct script access allowed');

  class Pharmaciens extends CI_Model 
  {
    public function getEmailPharmacien($email, $password)
    {
      return $this->db->select('*')
                      ->from('pharmacien')
                      ->where('email', $email)
                      ->where('passwords', $password)
                      ->where('status', '1')
                      ->get()
                      ->result();         
    }
//fonction pour obtenir les enregistrements par pages
    public function getListPharmacien($id, $limit, $start)
    {
      return $this->db->select('*')
                      ->from('pharmacien')
                      ->where('pharmacien.id_pharmacie',$id)
                      ->where('status','1')
                      ->limit($limit, $start)
                      ->order_by('id_pharmacien')
                      ->get()
                      ->result();
    }

    public function getPharmacienCount()
     { 
      $this->db->select("COUNT(*) as num_row");
      $this->db->from('pharmacien');
      $this->db->order_by('id_pharmacien');
      $query = $this->db->get();
      $result = $query->result();
      return $result[0]->num_row;
    }

    public function delete($id)
    {
      $this->db->set('status', '0');
      $this->db->where('pharmacien.id_pharmacien',$id);
      $this->db->update('pharmacien');
    }

    public function Edit($id)
    {
      $this->db->from('pharmacien');
      $this->db->where('id_pharmacien', $id);
      $query= $this->db->get();
      return $query->row();   
    }

    public function UpdatePharmacien($id, $nom, $email,$adresse,$username,$sexe,$tel,$date)
    {
      $this->db->set('nom_pharmacien', $nom);
      $this->db->set('email', $email);
      $this->db->set('adresse', $adresse);
      $this->db->set('telephone', $tel);
      $this->db->set('username', $username);
      $this->db->set('sexe', $sexe);
      $this->db->set('date_update', $date);
      $this->db->where('id_pharmacien', $id);
      $this->db->update('pharmacien');
    }

    public function MatchPassword($id,$password)
  {
    $this->db->from('pharmacien');
    $this->db->where('passwords',$password);
    $this->db->where('id_pharmacien',$id);
    $query= $this->db->get();
    return $query->row();
  }
  public function UpdatePasswords($id,$new,$date)
  {
    $this->db->set('passwords', md5($new));
    $this->db->set('date_update', $date);
    $this->db->where('id_pharmacien', $id);
    $this->db->update('pharmacien');
  }

  public function UpdateImage($id, $image)
  {
    $this->db->set('images', $image);
    //$this->db->set('date_update', $date);
    $this->db->where('id_pharmacien', $id);
    $this->db->update('pharmacien');
  }

  public function getNom($id)
  {
    $this->db->select('pharmacie.nom_pharmacie');
    $this->db->from('pharmacien,pharmacie');
    $this->db->where('pharmacien.id_pharmacie=pharmacie.id_pharmacie');
    $this->db->where('pharmacien.id_pharmacien', $id);
    $query= $this->db->get();
    return $query->row(); 
  }

  // public function search($id,$q,$limit,$start)
  // {
  //   return $this->db->select('*')
  //                     ->from('pharmacien')
  //                     ->where('pharmacien.id_pharmacie',$id)
  //                     ->where('nom_pharmacien',$q)
  //                     ->where('status','1')
  //                     ->limit($limit, $start)
  //                     ->get()
  //                     ->result();

  // }
}
  ?>