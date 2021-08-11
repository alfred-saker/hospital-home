<?php defined('BASEPATH') OR exit('No direct script access allowed');

  class Personnel extends CI_Model 
  {
    /* requête de selection et de verification si l'email qui est entrain d'être enregistré existe deja dans la base de donnéé..*/ 
    public function getEmailPersonnel($email, $password)
    {
      return $this->db->select('*')
                      ->from('personnel')
                      ->where('email', $email)
                      ->where('passwords', $password)
                      ->where('status', '1')
                      ->get()
                      ->result();   
    }

   /*selection de tous le personnel dans la table personnel travaillant dans l'hôpital conncté..*/
    public function getListPersonnel($id,$limit=null,$start=null)
    {
      return $this->db->select('personnel.id_personnel, personnel.nom_personnel, personnel.email, personnel.adresse, personnel.telephone, personnel.sexe, personnel.username, personnel.date_creation, hopital.nom_hopital, type_personnel.nom_type_personnel')
                      ->from('personnel, hopital, type_personnel')
                      ->where('personnel.id_type_personnel = type_personnel.id_type_personnel')
                      ->where('personnel.id_hopital = hopital.id_hopital')
                      ->where('hopital.id_hopital', $id)
                      ->where('personnel.status', '1')// affiche tous les utilisateurs actifs ou status=1
                      ->get()
                      ->result();
    }

    public function delete($id)
    {
      $this->db->set('status', '0');
      $this->db->where('personnel.id_personnel',$id);
      $this->db->update('personnel');
    }

    public function CountPersonnels($id)
    {
      return $this->db->select('COUNT(personnel.id_personnel) as nbre_personnel')
                      ->from('personnel,hopital')
                      ->where('personnel.id_hopital = hopital.id_hopital')
                      ->where('hopital.id_hopital',$id)
                      ->get()
                      ->result();
    }

    public function Edit($id)
    {
      $this->db->from('personnel');
      $this->db->where('id_personnel', $id);
      $query= $this->db->get();
      return $query->row();   
    }

    public function UpdatePersonnel($id, $nom, $email,$adresse,$username,$sexe,$tel,$date)
    {
      $this->db->set('nom_personnel', $nom);
      $this->db->set('email', $email);
      $this->db->set('adresse', $adresse);
      $this->db->set('telephone', $tel);
      $this->db->set('username', $username);
      $this->db->set('sexe', $sexe);
      $this->db->set('date_update', $date);
      $this->db->where('id_personnel', $id);
      $this->db->update('personnel');
    }

    public function MatchPassword($id,$old)
    {
      $this->db->from('personnel');
      $this->db->where('passwords',$old);
      $this->db->where('id_personnel',$id);
      $query= $this->db->get();
      return $query->row();
    }
    public function UpdatePasswords($id,$new,$date)
    {
      $this->db->set('passwords', md5($new));
      $this->db->set('date_update', $date);
      $this->db->where('id_personnel', $id);
      $this->db->update('personnel');
    }

    public function UpdateImage($id, $image,$date)
    {
      $this->db->set('images', $image);
      $this->db->set('date_update',$date);
      $this->db->where('id_personnel', $id);
      $this->db->update('personnel');
    }

    public function getNom($id)
    {
      return $this->db->select('hopital.nom_hopital , type_personnel.nom_type_personnel ')
                      ->from('personnel, hopital, type_personnel')
                      ->where('personnel.id_hopital = hopital.id_hopital')
                      ->where('personnel.id_type_personnel = type_personnel.id_type_personnel')
                      ->where('personnel.id_personnel' , $id)
                      ->get()
                      ->result();
    }
  }
  ?>