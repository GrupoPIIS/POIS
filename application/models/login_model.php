<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{

	//Contructor correspondiente de la clase. Carga la base de datos.
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	//Hace un SELECT * FROM usuarios WHERE mail = $mail
	function login($formulario){
		$this->db->where('mail', $formulario['mail']);
		$this->db->where('password', $formulario['password']);
		$query = $this->db->get('usuarios');
		if($query->num_rows() > 0) return $query;
		else return NULL;
	}
}
?>