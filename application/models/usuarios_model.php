<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model{

	//Contructor correspondiente de la clase. Carga la base de datos.
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	//Hace un SELECT * FROM usuarios
	function getUsers(){
		$this->db->where('id_usuario!=1');
		$query = $this->db->get('usuarios');
		return $query->result();
	}

	//Hace un SELECT * FROM usuarios WHERE id = $id
	function getUser($id){
		$this->db->where('id_usuario!=1');
		$this->db->where('id_usuario', $id);
		$query = $this->db->get('usuarios');
		if($query->num_rows() > 0) return $query;
		else return NULL;
	}

	//Hace un INSERT INTO usuarios VALUES datos = $data
	function newUser($data){
		$this->db->insert('usuarios', array(
											'rol' 		=> $data['rol'],
											'nombre' 	=> $data['nombre'],
											'empresa' 	=> $data['empresa'],
											'direccion' => $data['direccion'],
											'tel' 		=> $data['tel'],
											'cif' 		=> $data['cif'],
											'mail' 		=> $data['mail'],
											'password' 	=> $data['password']
										)
						);
	}

	//Hace un UPDATE usuarios SET datos = $data WHERE id = $id
	function updateUser($id, $data){
		$this->db->where('id_usuario!=1');
		$this->db->where('id_usuario', $id);
		$query = $this->db->update('usuarios', $data);
	}

	//Hace un DELETE FROM usuarios WHERE id = $id
	function deleteUser($id){
		$this->db->where('id_usuario!=1');
		$this->db->where('id_usuario', $id);
		$this->db->delete('usuarios');
	}
}