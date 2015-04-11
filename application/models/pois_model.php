<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Pois_model extends CI_Model{

	//Contructor correspondiente de la clase. Carga la base de datos.
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	//Hace un SELECT * FROM pois
	function getPois(){
		$query = $this->db->get('pois');
		if($query->num_rows() > 0) return $query;
		else return NULL;
	}

	//Hace un SELECT * FROM pois WHERE id = $id
	function getPoi($id){
		$this->db->where('id_poi', $id);
		$query = $this->db->get('pois');
		if($query->num_rows() > 0) return $query;
		else return NULL;
	}

	//Hace un SELECT * FROM pois WHERE id_usuario = $id. El id es el usuario con sesion abierta
	function getPoiUser($id_usuario){
		$this->db->where('id_usuario', $id_usuario);
		$consulta = $this->db->get('pois');
		return $consulta->result();
	}

	
	//Hace un INSERT INTO pois VALUES datos = $data
	function newPoi($data){
		if($this->session->userdata('rol') == 0)
			$id_usuario = $data['id_usuario'];
		else
			$id_usuario = $this->session->userdata('id_usuario');

		$this->db->insert('pois', array(
										'lng' 		=> $data['lng'],
										'lat' 		=> $data['lat'],
										'nombre_poi'=> $data['nombre_poi'],
										'txt_rep'	=> $data['txt_rep'],
										'direccion'	=> $data['direccion'],
										'id_usuario'=> $id_usuario
										)
						);
		$last = $this->db->insert_id();
		$this->db->insert('id_poi_id_cat', array(
												'id_poi'	=> $last,
												'id_cat'	=> 0
											)
						);

		if($data['id_categoria']){
			//foreach ($data['id_categoria']){
				$this->db->insert('id_poi_id_cat', array(
														'id_poi'	=> $last,
														'id_cat'	=> $data['id_categoria']
													)
								);
			//}
		}
	}

	//Hace un UPDATE pois SET datos = $data WHERE id = $id
	function updatePoi($id, $data){
		$this->db->where('id_poi', $id);
		$query = $this->db->update('pois', $data);
	}

	//Hace un DELETE FROM pois WHERE id = $id
	function deletePoi($id){
		$this->db->where('id_poi', $id);
		$this->db->delete('pois');
	}
}