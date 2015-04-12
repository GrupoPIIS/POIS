<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Redes_sociales_model extends CI_Model{

	//Contructor correspondiente de la clase. Carga la base de datos.
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	//Hace un SELECT * FROM redes_sociales
	function getSocials(){
		$query = $this->db->get('redes_sociales');
		if($query->num_rows() > 0) return $query;
		else return NULL;
	}

	//Hace un SELECT * FROM redes_sociales WHERE id = $id
	function getSocial($id){
		$this->db->where('id_red', $id);
		$query = $this->db->get('redes_sociales');
		if($query->num_rows() > 0) return $query;
		else return NULL;
	}

	//Hace un INSERT INTO redes_sociales VALUES datos = $data
	function newSocial($data){
		$this->db->insert('redes_sociales', array('nombre_red' => $data['nombre_red']/*,
												  'icono_red' => $data['icono_red']*/
											)
		);
	}

	//Hace un UPDATE redes_sociales SET datos = $data WHERE id = $id
	function updateSocial($id, $data){
		$this->db->where('id_red', $id);
		$query = $this->db->update('redes_sociales', $data);
	}

	//Hace un DELETE FROM redes_sociales WHERE id = $id
	function deleteSocial($id){
		$this->db->where('id_red', $id);
		$this->db->delete('redes_sociales');
	}
}