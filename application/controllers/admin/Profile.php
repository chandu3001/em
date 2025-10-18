<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    /**
    * Admin Dashboard Page for this controller.
    */
    function __construct()
    {
        parent::__construct();  
      
    }

    public function index()
    {        
        $this->load->view('admin/profile');
    }  
}
