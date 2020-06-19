<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{
  public function home($page = 'home')
  {
          if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
          {
            var_dump($page);
                  // Whoops, we don't have a page for that!
                  // show_404();
          }
  
          $data['title'] = ucfirst($page); // Capitalize the first letter
  
          $this->load->view('templates/header', $data);
          $this->load->view('pages/'.$page, $data);
          $this->load->view('templates/footer', $data);
  }
  public function formulaire($page = 'formulaire')
  {
          if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
          {
            var_dump($page);
                  // Whoops, we don't have a page for that!
                  // show_404();
          }
  
          $data['title'] = ucfirst($page); // Capitalize the first letter
  
          $this->load->view('templates/header', $data);
          $this->load->view('pages/'.$page, $data);
          $this->load->view('templates/footer', $data);
  }
}