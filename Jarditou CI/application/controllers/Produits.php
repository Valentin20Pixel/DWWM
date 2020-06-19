<?php
// application/controllers/Produits.php
require("Logger.php");
defined('BASEPATH') or exit('No direct script access allowed');

class Produits extends CI_Controller
{

    // Exo 1 et 2
    // public function liste()
    // {
    //     // Déclaration du tableau associatif à tranmettre à la vue
    //     $aView = array();
    //     $aProduits = ["Aramis", "Athos", "Clatronic", "Camping", "Green"];   

    //     // Dans le tableau, on créé une donnée 'prénom' qui a pour valeur 'Dave'    
    //     $aView["nom"] = "Loper";        
    //     $aView["prenom"] = "Dave";  

    //     $aView["liste_produits"] = $aProduits;  


    //     // On passe le tableau en second argument de la méthode 
    //     $this->load->view('liste', $aView);
    // }


    // 
    public function detail($id)
    {
        // chargement du model 'ProduitsModel'
        $this->load->model('ProduitsModel');
        $aProduit = $this->ProduitsModel->produit($id);
        $aView["produit"] = $aProduit;
        // affichage du Produit
        $this->load->view("detail", $aView);
        $this->input->post();

    }



    public function liste()
    {
        // chargement du model 'ProduitsModel'
        $this->load->model('ProduitsModel');
        $aListe = $this->ProduitsModel->liste();
        $aView["liste"] = $aListe;
        // affichage de la liste de produits
        $this->load->view('liste', $aView);
    }



    public function ajouter()
    {

        // chargement du model 'CategoriesModel'
        $this->load->model('CategorieModel');
        $aCategories = $this->CategorieModel->ListCategories();
        $aView["categories"] = $aCategories;
        $this->load->library('upload');

        // traitement du formulaire
        if ($this->input->post()) {

            $data = $this->input->post();
            $data["pro_d_ajout"] = date("Y-m-d");
            $this->form_validation->set_error_delimiters('<div class="alert alert-warning">', '</div>');


            // verification du formulaire
            if ($this->form_validation->run() == FALSE) {
                // newfile("erreur validation");
                $this->load->view('ajouter', $aView);
            } else {

                // traitement du fichier ajouter
                if ($_FILES) {
                    // extraction de l'extension du fichier
                    $extension = substr(strrchr($_FILES["pro_photo"]["name"], "."), 1);


                }

                // chargement du model 'ProduitsModel'
                $this->load->model('ProduitsModel');
                $aId = $this->ProduitsModel->ajouter($data);
                $aView["id"] = $aId;
                $config['upload_path'] = './assets/img/';
                $config['file_name'] = $aId . '.' . $extension;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $this->load->library('upload');
                $this->upload->initialize($config);

                // validations du fichier et si OK renommer+deplacement du fichier
                if (!$this->upload->do_upload('pro_photo')) {
                    // traitement des erreurs
                    $errors =  $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                    $aView["errors"] = $errors;
                    $this->load->view('ajouter', $aView);
                } else {
                    // OK donc redirection vers la liste
                    redirect('produits/liste');
                    // var_dump($data);

                }
            }
        } else {
            $this->load->view('ajouter', $aView);
        }
    } // -- ajouter() 




    public function modifier($id)
    {

        // chargement du model 'CategoriesModel'
        $this->load->model('CategorieModel');
        $aCategories = $this->CategorieModel->ListCategories();
        $aView["categories"] = $aCategories;
        $this->load->model('ProduitsModel');
        $aProduit = $this->ProduitsModel->produit($id);
        $aView["produit"] = $aProduit;
        $this->load->library('upload');
        // traitement du formulaire
        if ($this->input->post()) {

            $data = $this->input->post();
            $id = $this->input->post('pro_id');
            $data["pro_d_modif"] = date("Y-m-d H:i:s");
            $this->form_validation->set_error_delimiters('<div class="alert alert-warning">', '</div>');


            // verification du formulaire
            if ($this->form_validation->run() == FALSE) {

                $this->load->view('modifier', $aView);
            } else {

                // traitement du fichier 
                if ($_FILES) {

                    // extraction de l'extension du fichier
                    $extension = substr(strrchr($_FILES["pro_photo"]["name"], "."), 1);

                    // chargement du model 'ProduitsModel'
                    $this->load->model('ProduitsModel');
                    $aId = $this->ProduitsModel->modifier($data,$id);
                    $config['upload_path'] = './assets/img/';
                    $config['file_name'] = $aId.'.'.$extension;
                    $file_path = $config['upload_path'].$config['file_name'];

                    if(file_exists($file_path)){

                    unlink($file_path);

                    }
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $this->load->library('upload');
                    $this->upload->initialize($config);
                }

                // validations du fichier et si OK renommer+deplacement du fichier
                if (!$this->upload->do_upload('pro_photo')) {

                    // traitement des erreurs
                    $errors =  $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                    $aView["errors"] = $errors;

                    $this->load->view('detail', $aView);
                } else {
                    // OK donc redirection vers le detail

                    $this->load->view('detail', $aView);

                }
            }
        } else {

            $this->load->view('modifier', $aView);
        }
    } // -- modifier()



    public function supprimer($id)
    {
        // chargement du model 'ProduitsModel'
        $this->load->model('ProduitsModel');
        $aProduit = $this->ProduitsModel->produit($id);
        $aView["produit"] = $aProduit;
        $data=$this->input->post("btnsupp");
        // traitement du formulaire
        if ($data) {

            $data = $this->input->post();
            $this->load->model('ProduitsModel');
            $this->ProduitsModel->supprimer($id);
            redirect("produits/liste");
        } else {

            $this->load->view('supprimer', $aView);
        }
    }
    
}; // FIN
