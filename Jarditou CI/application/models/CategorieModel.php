<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class CategorieModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    } 
    public function ListCategories()
    {
        $aCategories = $this->db->get('jdt_categories')->result();
        return $aCategories; 
    }
    public function Categorie($id)
    {        
        $aCategories = $this->db->get_where('jdt_categories', array ('cat_id'=> $id))->row();
        return $aCategories;
    }
    public function AjouterC($data) 
    {
        $this->load->database();
        $this->input->post();
        $this->db->insert('jdt_categories', $data);
        return $this->db->insert_id();
    }
    public function ModifC($data, $id) 
    {
        $this->db->update('jdt_categories', $data, array('cat_id' => $id));

    }
    public function SupprimerC($id) 
    {
        $this->db->delete('jdt_categories', array('cat_id'=>$id));
        
    }
}