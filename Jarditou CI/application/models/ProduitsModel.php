<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class ProduitsModel extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
      $this->load->database();
      $this->load->library('session');
   }



   public function liste()
   {
      $this->load->database();
      $requete = $this->db->query("SELECT * FROM jdt_produits");
      $aProduits = $requete->result();
      return $aProduits;
   }



   public function produit($id)
   {
      $aProduit = $this->db->get_where('jdt_produits', array('pro_id' => $id))->row();
      return $aProduit;
   }



   public function ajouter($data)
   {
      $this->load->database();
      $this->upload->data();
      $this->input->post();
      if (!$this->upload->do_upload('pro_photo')) {

         $data['pro_photo'] = substr(strrchr($_FILES["pro_photo"]["name"], "."), 1);
      }
      $data["pro_d_ajout"] = date("Y-m-d");
      $this->db->insert('jdt_produits', $data);
      return $this->db->insert_id();
   }



   public function modifier($data, $id)
   {
      $this->load->database();
      $file = $this->upload->data();
      $data = $this->input->post();
      if (!$this->upload->do_upload('pro_photo')) {
         $data['pro_photo'] = substr(strrchr($_FILES["pro_photo"]["name"], "."), 1);
      }
      $data['pro_d_modif'] = date('Y-m-d H:i:s');
      $this->db->where('pro_id', $id);
      $this->db->update('jdt_produits', $data);
      return $id;
   }




   public function supprimer($id)
   {
      $this->db->delete('jdt_produits', array('pro_id' => $id));
   }
};
