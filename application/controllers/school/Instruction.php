<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Instruction extends CI_Controller {

    function __construct()
    {
        parent::__construct();  
    }

    public function index()
    {        
        $this->load->view('school/instruction/instruction');
    }  

    public function test()
    {        
        $this->load->view('school/instruction/test');
    }  
}

