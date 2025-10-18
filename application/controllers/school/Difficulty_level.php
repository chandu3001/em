<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Difficulty_level extends CI_Controller {
  
    function __construct()
    {
        parent::__construct();  
      
    }

    public function index()
    {        
        $this->load->view('school/difficulty_level/index');
    }  
}
