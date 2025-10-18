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
        $this->load->view('admin/question/question_list');
    } 

    public function add()
    {        
        $this->load->view('admin/question/question_form');
    }  

    public function view()
    {        
        $this->load->view('admin/question/question_details');
    }  
}
