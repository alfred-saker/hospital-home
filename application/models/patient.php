<?php defined('BASEPATH') OR exit('No direct script access allowed');

  class Patient extends CI_Model 
  {
    public function getEmailPatient($email, $password)
    {
      return $this->db->select('*')
                          ->from('patient')
                          ->where('email', $email)
                          ->where('passwords', $password)
                          ->get()
                          ->result();      
    }

    public function getEmailUnique($id)
    {
      $this->db->select('*');
      $this->db->from('patient');
      $this->db->where('id_patient', $id);
      $query=$this->db->get();
      return $query->row();      
    }
    public function getEmailUnique1($email)
    {
      $this->db->select('*');
      $this->db->from('patient');
      $this->db->where('email', $email);
      $query=$this->db->get();
      return $query->row();      
    }

    public function getListPatient($limit,$start)
    {
      return $this->db->select('*')
                      ->from('patient')
                      ->limit($limit, $start)
                      ->order_by('id_patient')
                      ->get()
                      ->result();
    }
    public function getListPatientRegister($limit=null,$start=null)
    {
      $date=date('Y-m-d');
      return $this->db->select('*')
                      ->from('patient')
                      ->limit($limit, $start)
                      ->where('date_create',$date)
                      ->order_by('id_patient')
                      ->get()
                      ->result();
    }
    public function getPatientCount()
     { 
      $this->db->select("COUNT(*) as num_row");
      $this->db->from('patient');
      $this->db->order_by('id_patient');
      $query = $this->db->get();
      $result = $query->result();
      return $result[0]->num_row;
    }
    public function record_count()
    {
      return $this->db->Count_all('patient');
    }
    
    public function Edit($id)
    {
      $this->db->from('patient');
      $this->db->where('id_patient', $id);
      $query= $this->db->get();
      return $query->row();  
    }

    public function UpdatePatient($id,$array)
    {
      $this->db->set( $array);
      $this->db->where('id_patient', $id);
      $this->db->update('patient');
    }

    public function MatchPassword($id,$password)
    {
      $this->db->from('patient');
      $this->db->where('passwords',$password);
      $this->db->where('id_patient',$id);
      $query= $this->db->get();
      return $query->row();
    }
    public function UpdatePasswords($id,$new,$date)
    {
      $this->db->set('passwords', md5($new));
      $this->db->set('date_update', $date);
      $this->db->where('id_patient', $id);
      $this->db->update('patient');
    }

    public function UpdateImage($id, $image)
    {
      $this->db->set('images', $image);
      // $this->db->set('date_update', $date);
      $this->db->where('id_patient', $id);
      $this->db->update('patient');
    }

    public function listAllpatient()
    {
      return $this->db->SELECT ('patient.nom_patient, patient.prenom_patient, patient.email, patient.date_naissance, patient.sexe, patient.telephone,patient.pays,patient.ville,patient.quartier,hopital.nom_hopital')
                      -> FROM ('personnel,patient,hopital') 
                      -> WHERE ('personnel.id_hopital=hopital.id_hopital') 
                      ->get()
                      ->result();
    }

    public function get_all_patient($id)
    {
      return $this->db->SELECT ('COUNT(patient.id_patient) as nbre_patient') 
                      ->FROM ('personnel,patient,hopital') 
                      //-> WHERE  ('patient.id_personnel=personnel.id_personnel') 
                      -> WHERE ('personnel.id_hopital=hopital.id_hopital')
                      ->WHERE('hopital.id_hopital', $id)
                      ->get()
                      ->result();
    }

    public function getPatient($id)
    {
      return $this->db->SELECT ('*') 
                      ->FROM ('patient') 
                      ->WHERE('id_patient', $id)
                      ->get()
                      ->result();
    }

    public function getInfosPatient($id)
    {
      // return $this->db->select('represcription.nouvelle_prescription,operation.id_operation,type_personnel.nom_type_personnel,patient.images,personnel.nom_personnel,patient.id_patient,hopital.nom_hopital,patient.nom_patient,patient.prenom_patient,patient.groupe_sanguin,type_operation.nom,operation.allergie,patient.rhesus,operation.resultat,operation.description_op,operation.commentaire,operation.prescription,operation.date_operation')
      //                 ->from('represcription,operation, type_operation,patient, hopital, personnel,type_personnel')
      //                 ->where('represcription.id_operation=operation.id_operation')
      //                 ->where('operation.id_typeOperation=type_operation.id_typeOperation')
      //                 ->where('personcanel.id_hopital=hopital.id_hopital')
      //                 ->where('operatcion.id_personnel=personnel.id_personnel')
      //                 ->where('operation.id_patient=patient.id_patient')
      //                 ->where('personnel.id_type_personnel=type_personnel.id_type_personnel')
      //                 ->where('patient.id_patient', $id)
      //                 ->order_by('operation.date_operation','DESC')
      //                 ->get()
      //                 ->result();

      return $this->db->select('operation.id_operation,type_personnel.nom_type_personnel,patient.images,personnel.nom_personnel,patient.id_patient,hopital.nom_hopital,patient.nom_patient,patient.prenom_patient,patient.groupe_sanguin,type_operation.nom,operation.allergie,patient.rhesus,operation.resultat,operation.description_op,operation.commentaire,operation.prescription,operation.date_operation')
                      ->from('operation, type_operation,patient, hopital, personnel,type_personnel')
                      // ->where('represcription.id_operation=operation.id_operation')
                      ->where('operation.id_typeOperation=type_operation.id_typeOperation')
                      ->where('personnel.id_hopital=hopital.id_hopital')
                      ->where('operation.id_personnel=personnel.id_personnel')
                      ->where('operation.id_patient=patient.id_patient')
                      ->where('personnel.id_type_personnel=type_personnel.id_type_personnel')
                      ->where('patient.id_patient', $id)
                      ->order_by('operation.date_operation','DESC')
                      ->get()
                      ->result();
    }

   
    public function search($q)
    {
      return $this->db->SELECT ('*') 
                      ->FROM ('patient') 
                      ->LIKE('nom_patient', $q)
                      ->LIKE('prenom_patient',$q)
                      ->get()
                      ->result();
    }
  }
?>