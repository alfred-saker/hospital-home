<?php defined('BASEPATH') OR exit('No direct script access allowed');

  class Represcription extends CI_Model 
  {

    public function Updateprescribe($data)
    {
      $this->db->insert('represcription',$data);
    }

    public function getReprescription($id_pharmacien)
    {
      //var_dump($id_operation);exit;
      $this->db->select('type_operation.nom,represcription.nouvelle_prescription,pharmacien.nom_pharmacien,pharmacie.nom_pharmacie,represcription.date_represcription');
      $this->db->from('represcription,pharmacien,pharmacie,type_operation');
      $this->db->where('represcription.id_pharmacien=pharmacien.id_pharmacien');
      $this->db->where('pharmacien.id_pharmacien',$id_pharmacien);
      $query=$this->db->get();
      return $query->row();
    }
  }