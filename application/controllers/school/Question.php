<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {
    private $user_id;
  
    function __construct()
    {
        parent::__construct();  
      
    }

    public function index()
    {        
        $this->load->view('school/question/question_list');
    } 

    public function language()
    {        
        $this->load->view('school/question/language');
    }

    public function add()
    {        
        $this->load->view('school/question/question_form');
    }  

    public function view()
    {        
        $this->load->view('school/question/question_details');
    }  
}
