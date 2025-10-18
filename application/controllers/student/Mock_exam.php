<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mock_exam extends CI_Controller {
   
    function __construct()
    {
        parent::__construct();  
      
    }

    public function index()
    {        
        $this->load->view('student/exam/mock_exam/language');
    }

    public function start()
    {        
        $this->load->view('student/exam/mock_exam/start');
    }

    public function c3RhcnQv()
    {        
        $this->load->view('student/exam/mock_exam/start');
    }


    public function timer()
    {        
        $this->load->view('student/exam/mock_exam/timer');
    } 

    public function exam_new()
    {        
        $this->load->view('student/exam/mock_exam/exam');
    } 

    public function exam_new1()
    {        
        $this->load->view('student/exam/mock_exam/exam1');
    } 
    

    /*public function passed()
    {        
        $this->load->view('student/exam/mock_exam/passed');
    } 

    public function failed()
    {        
        $this->load->view('student/exam/mock_exam/failed');
    } */

     public function test()
    {        
        $this->load->view('student/exam/mock_exam/test');
    } 

     public function start1()
    {        
        $this->load->view('student/exam/mock_exam/new/start');
    }

    public function ZmFpbGVk()
    {        
        $this->load->view('student/exam/mock_exam/failed');
    }

     public function cGFzc2Vk()
    {        
        $this->load->view('student/exam/mock_exam/passed');
    }
}
