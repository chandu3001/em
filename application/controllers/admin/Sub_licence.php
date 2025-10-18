<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_licence extends CI_Controller {
  
    function __construct()
    {
        parent::__construct();  
      
    }

    public function index()
    {        
        $this->load->view('admin/sub_licence/sub_licence_list');
    }  
}
