<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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
       // $this->load->view('school/includes/header');
        $this->load->view('school/index');
    }  
}
