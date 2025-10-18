<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
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
        $this->load->view('admin/reports/report');
    }  
}
