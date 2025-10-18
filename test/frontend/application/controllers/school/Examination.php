<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Examination extends CI_Controller {
   
    private $user_id;
   
    function __construct()
    {
        parent::__construct();  
      
    }

    public function index()
    {        
        $this->load->view('school/examination/index');
    }  

    public function view()
    {        
        $this->load->view('school/examination/list');
    } 

    public function answersheet()
    {        
        $this->load->view('school/examination/answersheet');
    } 
    function relevant_questions()
    {
        $this->load->view('school/examination/relevant_questions');
    }
}
