<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Connexion extends CI_Controller
{
  public function registration()
  {

    $this->load->model('ConnexModel');
    $aListe = $this->ConnexModel->ListConnex();
    $aView["ListConnex"] = $aListe;

    if ($this->input->post()) {

      $dat = $this->input->post();
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

      if ($this->form_validation->run() == FALSE) {

        $this->load->view('registration', $aView);

      } else {

        if ($this->input->post("password") == $this->input->post("confpasswd")) {

          $this->load->database();
          $data["login"] = $this->input->post("login");
          $data["password"] = $this->input->post("password");
          $data["role"] = "client";
          $this->load->model('ConnexModel');
          $aUser = $this->ConnexModel->inscription($data);
          $aView["inscription"] = $aUser;
          redirect('connexion/signup');

        }

        $this->load->view('registration', $aView);

      }

    } else {

      $this->load->view('registration', $aView);

    }
  } // -- inscription() 

  public function signup()
  {

    $id = $this->input->post("login");
    $this->load->model('ConnexModel');
    $aUser = $this->ConnexModel->User($id);
    $aView["User"] = $aUser;

    if ($this->input->post()) {

      $dat = $this->input->post();
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

      if ($this->form_validation->run() == FALSE) {

        $this->load->view('signup', $aView);

      } else {

        $post = $this->input->post();
        $this->load->model('ConnexModel');
        $aUserc = $this->ConnexModel->User($id);
        $aView["user"] = $aUserc;
        $aLogin["login"] = $aUser->login;
        $aLogin["password"] = $aUser->password;

        if ($post == $aLogin) {

          $aLogin["role"] = $aUser->role;
          $this->session->set_userdata('login', $aLogin["login"]);
          $this->session->set_userdata('role', $aLogin["role"]);
          echo $this->session->role;
          redirect('pages/home');

        } else {

          $this->load->view('signup', $aView);
          echo $this->session->role;
          var_dump($post);
          var_dump($aLogin);

        }

      }

    } else {

      $this->load->view('signup', $aView);

    }
  } // -- Connexion



  public function logout()
  {

    $id = $this->session->login;
    $this->load->model('ConnexModel');
    $aUser = $this->ConnexModel->User($id);
    $aView["User"] = $aUser;

    if ($this->input->post()) {

      $this->input->post();
      $this->session->sess_destroy();
      redirect('pages/home');

    } else {

      $this->load->view('logout', $aView);
      
    }
  } // -- Déconnexion
}
