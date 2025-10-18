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

    public function student()
    {        
        $this->load->view('admin/school/student_details');
    }  

    public function answersheet()
    {        
        $this->load->view('admin/school/answersheet');
    }  

    public function examination()
    {        
        $this->load->view('admin/school/includes/exam_criteria_details');
    } 

     public function test()
    {        
        $this->load->view('admin/school/test');
    }

}
