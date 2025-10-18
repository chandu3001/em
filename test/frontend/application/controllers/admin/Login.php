<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    private $user_id;
    /**
    * Admin Dashboard Page for this controller.
    */
    function __construct()
    {
        parent::__construct();  
      
    }

    public function index()
    {        
       // $this->load->view('admin/header');
        $this->load->view('admin/login');
        //$this->load->view('admin/footer');
    }  
}
