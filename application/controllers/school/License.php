<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class License extends CI_Controller {
  
    function __construct()
    {
        parent::__construct();  
      
    }

    public function index()
    {        
        $this->load->view('school/license/license_list');
    }  

    public function exam()
    {        
        $this->load->view('school/license/exam/exam_details');
    }  
}
