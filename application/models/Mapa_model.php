<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mapa_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_markers()
	{
		$markers = $this->db->get('pois');
		if($markers->num_rows()>0)
		{
			return $markers->result();
		}
	}
	/*public function get_markers($id, $etiquetas)
	{
		if (! is_null($id)) 
		{
			$query = $this->db->select("*")->from("pois")->where("id", $id)->get();
			if($query->num_rows() === 1)
			{
				return $query->row_array();
			}
			return NULL;
		} 
		$query = $this->db->select("*")->from("pois")->get();
			if($query->num_rows() > 0)
			{
				return $query->result_array();
			}
			return NULL;
	}
*/
	public function get_close($radio, $etiquetas)
	{

	}

	public function obtenerUsuarios()
	{
		
	}
	public function insert_poi($poi)
	{
		$this->db->set(
			$this->__setpoi($poi)
		)
		->insert("pois");

		if ($this->db->affected_rows === 1) 
		{
			return $this->db->insert_id();
		}
		return NULL;
	}

	public function insert_usuario($usuario)
	{
		$this->db->set(
			$this->__setusuario($usuario)
		)
		->insert("usuario");

		if ($this->db->affected_rows === 1) 
		{
			return $this->db->insert_id();
		}
		return NULL;
	}

	private function __setusuario($usuario
)	{
		return array(
			"nombre"		=>	$usuario["nombre"],
			"empresa"		=>	$usuario["empresa"],
			"mail"			=>	$usuario["mail"],
			"cif"			=>	$usuario["cif"],
			"rol"			=>	$usuario["rol"],
			"direccion"		=>	$usuario["direccion"],
			"tel"			=>	$usuario["tel"]
		);
	}
	private function __setpass($pass, $id_usuario)
	{
		return array(
			"id_usuario"	=>	$pass["id_usuario"],
			"password"		=>	$pass["password"],
			
		);
	}

	private function __setpoi($poi)
	{
		return array(
			"nombre_poi"	=>	$poi["nombre_poi"],
			"lat"			=>	$poi["lat"],
			"lng"			=>	$poi["lng"],
			"txt_rep"		=>	$poi["txt_rep"],
			"direccion"		=>	$poi["direccion"],
			"id_usuario"	=>	$poi["id_usuario"]
		);
	}

}