<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Categorias_model extends CI_Model{

	//Contructor correspondiente de la clase. Carga la base de datos.
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	//Hace un SELECT * FROM categorias
	function getCategories(){
		$this->db->where('id_cat!=0');
		$query = $this->db->get('categorias');
		if($query->num_rows() > 0) return $query;
		else return NULL;
	}

	//Hace un SELECT * FROM categorias WHERE id = $id
	function getCategory($id){
		$this->db->where('id_cat!=0');
		$this->db->where('id_cat', $id);
		$query = $this->db->get('categorias');
		if($query->num_rows() > 0) return $query;
		else return NULL;
	}

	//Hace un INSERT INTO categorias VALUES datos = $data
	function newCategory($titulo,$imagen){
        $data = array(
            'nombre_cat' => $titulo,
            'imagen' => $imagen
        );
        return $this->db->insert('categorias', $data);
	}

	//Hace un UPDATE categorias SET datos = $data WHERE id = $id
	function updateCategory($id, $titulo, $imagen){

		$data = array(
            'nombre_cat' => $titulo,
            'imagen' => $imagen
        );
        $this->db->where('id_cat', $id);
        return $this->db->update('categorias', $data);
	}

	//Hace un DELETE FROM categorias WHERE id = $id
	function deleteCategory($id){
		$this->db->where('id_cat!=0');
		$this->db->where('id_cat', $id);
		$this->db->delete('categorias');
	}

	function search($nombre){
		

		$this->db->select('*');
		 $this->db->like('nombre_cat', $q,'both');
		 $query = $this->db->get('categorias');
		 if($query->num_rows > 0){
		  foreach ($query->result_array() as $row){
		  	$new_row['id'] = htmlentities(stripslashes($row['id_cat']));
		   $new_row['value'] = utf8_encode($row['nombre_cat']);
		   $row_set[] = $new_row;
		  }
		  return $row_set;
		 }
	}
}