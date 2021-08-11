<?php defined('BASEPATH') OR exit('No direct script access allowed');

  class TypeOperation extends CI_Model 
  {
    public function record_count_type_operation()
    {
      return $this->db->select('Count(nom) as nbre_type_operation')->from('type_operation')->get()->result();               
    }

    public function get_type_operation()
    {
      return $this->db->select('*')->from('type_operation')->get()->result();               
    }
  }