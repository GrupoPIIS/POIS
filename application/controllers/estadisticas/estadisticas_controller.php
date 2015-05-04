<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Estadisticas_controller extends CI_Controller{

	//Constructor de la clase. Carga el modelo correspondiente.
	function __construct(){
		parent::__construct();
		!isset($this->session->userdata['habilitado'])?   
	   		redirect('login_controller', 'refresh') : '';
	}

	function index(){
		
		$this->load->view('estadisticas');
	}

	
}
?>