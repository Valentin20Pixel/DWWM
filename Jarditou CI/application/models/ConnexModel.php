
<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class ConnexModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
    public function ListConnex()
    {
        $this->load->database();
        $requete = $this->db->query("SELECT * FROM jdt_users");
        $aUser = $requete->result();  
        return $aUser; 
    }
    public function User($id)
    {
        $aUser = $this->db->get_where('jdt_users', array ('login'=> $id))->row();
        return $aUser;
    }
    public function Inscription($data)
    {
        $this->db->insert('jdt_users', $data);   
        return $this->db->insert_id();
    }
};