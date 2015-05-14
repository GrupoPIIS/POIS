<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapa-select extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pois_model');
		$this->load->helper('url');	
	}






}

