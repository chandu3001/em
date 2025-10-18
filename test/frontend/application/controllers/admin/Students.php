<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {
   
    private $user_id;
   
    function __construct()
    {
        parent::__construct();  
      
    }

    public function index()
    {        
        $this->load->view('admin/student/list');
    }  

    public function view()
    {        
        $this->load->view('admin/student/student_details');
    }  

    public function answersheet()
    {        
        $this->load->view('admin/student/answersheet');
    }  
}
