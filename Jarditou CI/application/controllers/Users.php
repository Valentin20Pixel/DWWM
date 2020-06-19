<?php
// application/controllers/Produits.php

defined('BASEPATH') or exit('No direct script access allowed');

class Produits extends CI_Controller
{   
public function inscription()
  {
      $this->load->model('UtilisateursModel');
      $aUser = $this->UtilisateursModel->inscription();
      $aView["inscription"] = $aUser;
      $this->load->database();
      if ($this->input->post()) { 
          $data = $this->input->post();
          $this->form_validation->set_error_delimiters('<div class="alert">', '</div>');

          if ($this->form_validation->run() == FALSE) { 
              $data = $this->input->post();
              $password = $data['user_pass'];
              $data['user_pass'] = password_hash($password, PASSWORD_BCRYPT);
  
          } else {

          $this->load->view('inscription', $aView);
      }
  } // -- inscription() 
}
}