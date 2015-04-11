<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Login_controller extends CI_Controller{

	//Constructor de la clase. Carga el modelo correspondiente.
	function __construct(){
		parent::__construct();
	}

	//Envia un correo electronico.
	function sendEmail(){
		$this->load->library('Email');
		$configuraciones['smpt'] = 'gmail';
		$this->email->initialize($configuraciones);
		$this->email->from('dadcuentadeprueba@gmail.com', 'Alicia');
		$this->email->to('dadcuentadeprueba@gmail.com');
		$this->email->subject('prueba correo');
		$this->email->message('ejemplo de prueba de correo con CodeIgniter :D');
		$this->email->send();
		$this->email->print_debugger();
	}