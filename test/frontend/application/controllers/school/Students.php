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
        $this->load->view('school/student/list');
    }  

    public function view()
    {        
        $this->load->view('school/student/student_details');
    }  
}
