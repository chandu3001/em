<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schools extends CI_Controller {
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
        $this->load->view('admin/school/list');
    }  

    public function details()
    {        
        $this->load->view('admin/school/school_details');
    }  
}
