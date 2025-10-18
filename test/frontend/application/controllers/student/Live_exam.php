<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Live_exam extends CI_Controller {
   
    function __construct()
    {
        parent::__construct();  
      
    }

    public function index()
    {        
        $this->load->view('student/exam/live_exam/language');
    }

    public function start()
    {        
        $this->load->view('student/exam/live_exam/start');
    }

    public function timer()
    {        
        $this->load->view('student/exam/live_exam/timer');
    } 

    public function exam()
    {        
        $this->load->view('student/exam/live_exam/exam');
    } 

    /*public function passed()
    {        
        $this->load->view('student/exam/live_exam/passed');
    } 

    public function failed()
    {        
        $this->load->view('student/exam/live_exam/failed');
    }*/  

    public function ZmFpbGVk()
    {        
        $this->load->view('student/exam/live_exam/failed');
    }

     public function cGFzc2Vk()
    {        
        $this->load->view('student/exam/live_exam/passed');
    }
}
