<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/reset_password');
	}
}
