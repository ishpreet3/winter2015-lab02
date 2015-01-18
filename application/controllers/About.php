<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function index()
	{// loads about page
		$this->load->view('about');
	}
}
