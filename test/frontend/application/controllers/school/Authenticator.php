<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticator extends CI_Controller {
   
    private $user_id;
   
    function __construct()
    {
        parent::__construct();  
      
    }

    public function index()
    {        
        $this->load->view('school/authenticator/index');
    }  

    public function view()
    {        
        $this->load->view('school/authenticator/details');
    }  
}
