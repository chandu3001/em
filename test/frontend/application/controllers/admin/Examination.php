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
        $this->load->view('admin/examination/index');
    }  

    public function view()
    {        
        $this->load->view('admin/examination/list');
    }  
}
