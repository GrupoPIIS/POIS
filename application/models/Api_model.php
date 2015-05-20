<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}

	public function get($id=NULL)
	{
		if (! is_null($id)) 
		{
			$query = $this->db->select("*")->from("pois")->where("id_poi", $id)->get();
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

	function getPoisCloseTo($lat, $lng, $radius){

	 $query = $this->db->query('SELECT id_poi, lng, lat, nombre_poi, txt_rep, direccion, id_usuario, creado, ( 6371 * acos( cos( radians('.$lat.') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('.$lng.') ) + sin( radians('.$lat.') ) * sin( radians( lat ) ) ) ) AS distance FROM pois HAVING distance < '.$radius.' ORDER BY distance LIMIT 0 , 20;');
	 if($query->num_rows() > 0) return $query->result_array();
	 else return NULL;
	}


	function getPoisByTag($tag){

		$query = $this->db->query('SELECT * FROM pois WHERE id_poi IN (SELECT id_poi FROM id_poi_id_cat WHERE id_cat IN (SELECT id_cat FROM categorias WHERE nombre_cat = "'.$tag.'"));');
		if($query->num_rows() > 0) return $query->result_array();
	 	else return NULL;
	}



	function getPoisDistTag($tag,$lat,$lng,$radius){

		$query = $this->db->query('SELECT id_poi, nombre_poi, lat, lng, ( 6371 * acos( cos( radians('.$lat.') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('.$lng.') ) + sin( radians('.$lat.') ) * sin( radians( lat ) ) ) ) AS distance 
			FROM pois WHERE id_poi IN (SELECT id_poi FROM id_poi_id_cat 
			WHERE id_cat IN (SELECT id_cat FROM categorias WHERE nombre_cat = "'.$tag.'")) 
			HAVING distance < '.$radius.' ORDER BY distance LIMIT 0 , 20;');
	 	if($query->num_rows() > 0) return $query->result_array();
	 	else return NULL;
	}


	/*public function save($poi)
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



	public function update($id, $poi)
	{
		$this->db->set(
			$this->__setpoi($poi)
		)
		->where("id", $id)
		->update("pois");

		if ($this->db->affected_rows === 1) 
		{
			return TRUE;
		}
		return NULL;
	}


	public function delete($id)
	{
		$this->db->where('id', $id)->delete("pois");

		if ($this->db->affected_rows === 1) 
		{
			return TRUE;
		}
		return NULL;
	}





	private function __setpoi($poi)
	{
		return array(
			"nombre"	=>	$poi["nombre"],
			"loc"		=>	$poi["loc"],
			"lema"		=>	$poi["lema"],
			"desc"		=>	$poi["desc"]
		);
	}
*/


}

/* End of file pois_model.php */
/* Location: ./application/models/pois_model.php */