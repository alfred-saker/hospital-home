<?php defined('BASEPATH') OR exit('No direct script access allowed');

  class Operation extends CI_Model 
  {
    public function getUpdateOperation($id,$id_operation,$id_patient)
    {
      $this->db->select ('operation.id_operation,patient.id_patient,patient.nom_patient, patient.prenom_patient, patient.groupe_sanguin,operation.date_operation, patient.rhesus , operation.resultat,operation.resultat,operation.prescription,operation.allergie,operation.commentaire,operation.description_op,type_operation.nom,type_operation.id_typeOperation,personnel.nom_personnel');
      $this->db->from(' operation, type_operation, patient,personnel');
      $this->db->where('operation.id_typeOperation=type_operation.id_typeOperation');
      $this->db ->where('operation.id_personnel=personnel.id_personnel ');
      $this->db->where('operation.id_patient=patient.id_patient');
      $this->db->where('personnel.id_personnel',$id);
      $this->db->where('operation.id_operation',$id_operation);
      $this->db->where('patient.id_patient',$id_patient);
      $query = $this->db->get();
      return $query->row();
    }

    public function getOperation($id,$limit=null,$start=null)
    {
      $date=date('Y-m-d');
      return $this->db->select ('operation.id_operation,patient.id_patient,patient.nom_patient, patient.prenom_patient,patient.email, patient.groupe_sanguin,operation.date_operation, patient.rhesus , operation.resultat,operation.resultat,operation.prescription,operation.allergie,operation.commentaire,operation.description_op,type_operation.nom,type_operation.id_typeOperation,personnel.nom_personnel')
                      ->from(' operation, type_operation, patient,personnel')
                      ->limit($limit,$start)
                      ->where('operation.id_typeOperation=type_operation.id_typeOperation')
                      ->where('operation.id_personnel=personnel.id_personnel ')
                      ->where('operation.id_patient=patient.id_patient')
                      ->where('personnel.id_personnel',$id)
                      ->where('operation.date_operation',$date)
                      ->order_by('operation.date_operation','DESC')
                      ->get()
                      ->result();
    }
    public function getAllOperation($id,$limit=null,$start=null)
    {
      return $this->db->select ('operation.id_operation,patient.id_patient,patient.nom_patient, patient.prenom_patient,patient.email, patient.groupe_sanguin,operation.date_operation, patient.rhesus , operation.resultat,operation.resultat,operation.prescription,operation.allergie,operation.commentaire,operation.description_op,type_operation.nom,type_operation.id_typeOperation,personnel.nom_personnel')
                      ->from(' operation, type_operation, patient,personnel')
                      ->limit($limit,$start)
                      ->where('operation.id_typeOperation=type_operation.id_typeOperation')
                      ->where('operation.id_personnel=personnel.id_personnel ')
                      ->where('operation.id_patient=patient.id_patient')
                      ->where('personnel.id_personnel',$id)
                      ->order_by('operation.date_operation','DESC')
                      ->get()
                      ->result();
    }

    public function getInfosOperation($id,$id1)
    {
      return $this->db->select('represcription.nouvelle_prescription,represcription.date_represcription,type_personnel.nom_type_personnel,patient.images,personnel.nom_personnel,patient.id_patient,hopital.nom_hopital,patient.groupe_sanguin,type_operation.nom,operation.allergie,patient.rhesus,operation.resultat,operation.description_op,operation.commentaire,operation.prescription,operation.date_operation')
                      ->from('operation, represcription,type_operation,patient, hopital, personnel,type_personnel')
                      ->where('operation.id_typeOperation=type_operation.id_typeOperation')
                      ->where('personnel.id_hopital=hopital.id_hopital')
                      ->where('operation.id_personnel=personnel.id_personnel')
                      ->where('operation.id_patient=patient.id_patient')
                      ->where('personnel.id_type_personnel=type_personnel.id_type_personnel')
                      ->where('represcription.id_operation=operation.id_operation')
                      ->where('patient.id_patient', $id1)
                      ->order_by('operation.date_operation','DESC')
                      ->get()
                      ->result();
    }
    public function getInfosOperation1($email,$id)
    {
      return $this->db->select('operation.id_operation,type_personnel.nom_type_personnel,patient.images,personnel.nom_personnel,patient.id_patient,hopital.nom_hopital,patient.groupe_sanguin,type_operation.nom,operation.allergie,patient.rhesus,operation.resultat,operation.description_op,operation.commentaire,operation.prescription,operation.date_operation')
                      ->from('operation, type_operation,patient, hopital, personnel,type_personnel')
                      ->where('operation.id_typeOperation=type_operation.id_typeOperation')
                      ->where('personnel.id_hopital=hopital.id_hopital')
                      ->where('operation.id_personnel=personnel.id_personnel')
                      ->where('operation.id_patient=patient.id_patient')
                      ->where('personnel.id_type_personnel=type_personnel.id_type_personnel')
                      ->where('personnel.id_personnel', $id)
                      ->where('patient.email', $email)
                      ->order_by('operation.date_operation','DESC')
                      ->get()
                      ->result();
    }
 

    public function typeoperation()
    {
      return $this->db->select('type_operation.id_typeOperation,type_operation.nom,type_operation.description')
                      ->from(' operation, type_operation,personnel')
                      ->group_by('nom')
                      ->get()
                      ->result();
    }

    public function CountOperation()
    { 
     $this->db->select("COUNT(*) as num_row");
     $this->db->from('operation');
     $this->db->order_by('id_operation');
     $query = $this->db->get();
     $result = $query->result();
     return $result[0]->num_row;
   }

   public function UpdateOperation($id_operation,$al,$pres,$resul,$desc,$comment,$motif,$date)
   {
      $this->db->set('allergie',$al);
      $this->db->set('prescription',$pres);
      $this->db->set('resultat',$resul);
      $this->db->set('description_op',$desc);
      $this->db->set('commentaire',$comment);
      $this->db->set('motif',$motif);
      $this->db->set('date_update',$date);
      $this->db->where('id_operation',$id_operation);
      $this->db->update('operation');
   }
   public function search($id_operation)
   {
    $this->db->select('operation.id_operation,type_personnel.nom_type_personnel,patient.images,personnel.nom_personnel,patient.email,patient.id_patient,hopital.nom_hopital,patient.nom_patient,patient.prenom_patient,patient.groupe_sanguin,type_operation.nom,operation.allergie,patient.rhesus,operation.resultat,operation.description_op,operation.commentaire,operation.prescription,operation.date_operation');
    $this->db->from('operation, type_operation,patient, hopital, personnel,type_personnel');
    $this->db->where('operation.id_typeOperation=type_operation.id_typeOperation');
    $this->db->where('personnel.id_hopital=hopital.id_hopital');
    $this->db->where('operation.id_personnel=personnel.id_personnel');
    $this->db->where('operation.id_patient=patient.id_patient');
    $this->db->where('personnel.id_type_personnel=type_personnel.id_type_personnel');
    $this->db->like('operation.id_operation', $id_operation);
    $query=$this->db->get();
    return $query->row();
   }
   public function getUpdate($id_operation,$id_patient)
   {
      return $this->db->select ('operation.id_operation,patient.id_patient,patient.nom_patient, patient.prenom_patient, patient.groupe_sanguin,operation.date_operation, patient.rhesus , operation.resultat,operation.resultat,operation.prescription,operation.allergie,operation.commentaire,operation.description_op,type_operation.nom,type_operation.id_typeOperation,personnel.nom_personnel')
                      ->from(' operation, type_operation, patient,personnel')
                      ->where('operation.id_typeOperation=type_operation.id_typeOperation')
                      ->where('operation.id_personnel=personnel.id_personnel ')
                      ->where('operation.id_patient=patient.id_patient')
                      ->where('operation.id_operation',$id_operation)
                      ->where('patient.id_patient',$id_patient)
                      ->get()
                      ->result();
   }

   public function getuniqueOperation($id_operation,$id_patient)
   {
      $this->db->select ('hopital.nom_hopital,type_personnel.nom_type_personnel,operation.id_operation,patient.id_patient,patient.nom_patient, patient.prenom_patient, patient.groupe_sanguin,operation.date_operation, patient.rhesus , operation.resultat,operation.resultat,operation.prescription,operation.allergie,operation.commentaire,operation.description_op,type_operation.nom,type_operation.id_typeOperation,personnel.nom_personnel');
      $this->db->from(' operation, type_operation,hopital, patient,personnel,type_personnel');
      $this->db->where('operation.id_typeOperation=type_operation.id_typeOperation');
      $this->db ->where('operation.id_personnel=personnel.id_personnel ');
      $this->db->where('operation.id_patient=patient.id_patient');
      $this->db->where('personnel.id_type_personnel=type_personnel.id_type_personnel');
      $this->db->where('personnel.id_hopital=hopital.id_hopital');
      $this->db->where('operation.id_operation',$id_operation);
      $this->db->where('patient.id_patient',$id_patient);
      $query = $this->db->get();
      return $query->row();
   }
   
  }