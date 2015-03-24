<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pois_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get($id=NULL)
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


	public function save($poi)
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



}

/* End of file pois_model.php */
/* Location: ./application/models/pois_model.php */