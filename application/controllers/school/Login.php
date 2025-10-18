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
       // $this->load->view('school/header');
        $this->load->view('school/login');
        //$this->load->view('school/footer');
    }  
}
