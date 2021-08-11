<?php defined('BASEPATH') OR exit('No direct script access allowed');

  class TypePersonnel extends CI_Model 
  {
    public function getFonctionPersonnel()
    {
      $query = $this->db->get('type_personnel');
      return $query->result();
    }

    public function getNomType()
    {
      return $this->db->select('count(nom_type_personnel) as type_personnel')
                      ->from('type_personnel')
                      ->get()
                      ->result();
    }
  }