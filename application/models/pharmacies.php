<?php defined('BASEPATH') OR exit('No direct script access allowed');

  class Pharmacies extends CI_Model 
  {
    public function getEmailPharmacie($email, $password)
    {
      return $this->db->select('*')
                      ->from('pharmacie')
                      ->where('email', $email)
                      ->where('passwords', $password)
                      ->where('status', '1')
                      ->get()
                      ->result(); 
    }
    public function selectAllPharmacie($p,$v,$q)
    {
      return $this->db->select('*')
                      ->from('pharmacie')
                      ->where('pays',$p)
                      ->where('ville',$v)
                      ->get()
                      ->result(); 
    }
    public function getListPharmacie()
    {
      $this->db->where('status','1');
      $query = $this->db->get('pharmacie');
      return $query->result();
    }

    public function getSelectPharmacie()
    {
        $this->db->select("*");
        $this->db->from("pharmacien");
        $this->db->where("pharmacien.id_pharmacie = pharmacie.id_pharmacie");
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function Edit($id)
  {
    $this->db->from('pharmacie');
    $this->db->where('id_pharmacie', $id);
    $query= $this->db->get();
    return $query->row();   
  }

  public function UpdateImages($id, $image)
  {
    $this->db->set('images', $image);
    $this->db->where('id_pharmacie', $id);
    $this->db->update('pharmacie');
  }

  public function UpdateDatas($id, $nom, $email,$pays,$ville,$quartier,$bp,$tel,$date)
  {
    $this->db->set('nom_pharmacie', $nom);
    $this->db->set('email', $email);
    $this->db->set('pays', $pays);
    $this->db->set('ville', $ville);
    $this->db->set('quartier', $quartier);
    $this->db->set('telephone', $tel);
    $this->db->set('boite_postal', $bp);
    $this->db->set('date_update', $date);
    $this->db->where('id_pharmacie', $id);
    $this->db->update('pharmacie');

  }

  public function MatchPassword($id,$password)
  {
    $this->db->from('pharmacie');
    $this->db->where('passwords',$password);
    $this->db->where('id_pharmacie',$id);
    $query= $this->db->get();
    return $query->row();
  }

  public function UpdatePassword($id,$new,$date)
  {
    $this->db->set('passwords', md5($new));
    $this->db->set('date_update', $date);
    $this->db->where('id_pharmacie', $id);
    $this->db->update('pharmacie');
  }

  public function delete($id)
  {
    $this->db->set('status','0');
    $this->db->where('id_pharmacie',$id);
    $this->db->update('pharmacie');
  }
}
?>