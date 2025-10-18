<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question_paper extends CI_Controller {
    private $user_id;
  
    function __construct()
    {
        parent::__construct();  
      
    }

    public function index()
    {        
        $this->load->view('admin/includes/header');
        $this->load->view('admin/exam/question_paper');
        $this->load->view('admin/includes/footer');
    }  
}
