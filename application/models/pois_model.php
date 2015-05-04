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
		if($consulta->num_rows() > 0) return $consulta;
		else return NULL;
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
		/*$this->db->insert('id_poi_id_cat', array(
												'id_poi'	=> $last,
												'id_cat'	=> 0
											)
						);*/

		if($data['id_categoria']){
			foreach ($data['id_categoria'] as $categoria){
				
				$this->db->insert('id_poi_id_cat', array(
														'id_poi'	=> $last,
														'id_cat'	=> $categoria
													)
								);
			}
		}
	}

	//Hace un UPDATE pois SET datos = $data WHERE id = $id
	function updatePoi($id, $data, $categorias, $extras, $multimedia, $social){
		$this->db->where('id_poi', $id);
		$query = $this->db->update('pois', $data);

		$this->db->where('id_poi', $id);
		$this->db->where('id_cat!=0');
		$this->db->delete('id_poi_id_cat');
		if($categorias['id_categoria']){
			foreach ($categorias['id_categoria'] as $categoria){
				
				$this->db->insert('id_poi_id_cat', array(
														'id_poi'	=> $id,
														'id_cat'	=> $categoria
													)
								);
			}
		}
		if(isset($extras['slogan'])){
				$query = $this->db->update('extras_poi', $extras);
		}
		if(isset($multimedia['nombre_recurso'])){
			/*foreach ($multimedia as $multi){
				$this->db->where('id_poi', $id);
				//$this->db->where('nombre_recurso', $multi['nombre_original']);
				$query = $this->db->update('multimedia', $multi);
			}*/
		}
		if(isset($social['nombre_red'])){
			/*foreach ($social as $red){
				$this->db->where('id_poi', $id);
				$query = $this->db->update('rrss_poi', $social);
			}*/
		}
	}

	//Hace un DELETE FROM pois WHERE id = $id
	function deletePoi($id){
		$this->db->where('id_poi', $id);
		$this->db->delete('pois');
	}

	function getCategoriesFromPoi($id){
		$this->db->where('id_poi', $id);
		$query = $this->db->get('id_poi_id_cat');
		if($query->num_rows() > 0) return $query;
		else return NULL;
	}
	
	function extraPoi($id, $data){
		$this->db->insert('extras_poi', array(
											'id_poi' 			=> $id,
											'slogan' 			=> $data['slogan'],
											'telefono1'			=> $data['telefono1'],
											'telefono2'			=> $data['telefono2'],
											'direccion_local'	=> $data['direccion_local'],
											'horario'			=> $data['horario']
											)
						);
	}

	function getExtraPoi($id){
		$this->db->where('id_poi', $id);
		$query = $this->db->get('extras_poi');
		if($query->num_rows() > 0) return $query;
		else return NULL;
	}

	function multimediaPoi($id, $data){
		$this->db->insert('multimedia', array(
											'id_poi' 			=> $id,
											'tipo_recurso'		=> $data['tipo_recurso'],
											'nombre_recurso'	=> $data['nombre_recurso'],
											'ruta_recurso'		=> $data['ruta_recurso']
											)
						);
	}

	function getMultimediaPoi($id){
		$this->db->where('id_poi', $id);
		$query = $this->db->get('multimedia');
		if($query->num_rows() > 0) return $query;
		else return NULL;
	}

	function socialPoi($id, $data){
		$this->db->insert('rrss_poi', array(
											'id_poi' 	=> $id,
											'id_rrss'	=> $data['id_rrss'],
											'enlace'	=> $data['enlace']
											)
						);
	}

	function getSocialPoi($id){
		$this->db->where('id_poi', $id);
		$query = $this->db->get('rrss_poi');
		if($query->num_rows() > 0) return $query;
		else return NULL;
	}

		//Devuelve los 20 pois dentro de un círculo de radio r (en kms) y centro en la ubicación actual.
	//se el pasa un array como argumento que contiene la ubicación (lat y lng del centro del círculo, 
	//es decir, la ubicación actual del navegador o del móvil o la que se le seleccione 
	//desde el mapa de la página principal) y el radio en kms que quieres que te devuelva.
	//

	function getPoisCloseTo($lat, $lng, $radius){
<<<<<<< HEAD
	  $this->db->query('SELECT id_poi, ( 6371 * acos( cos( radians('.$lat.') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('.$lng.') ) + sin( radians('.$lat.') ) * sin( radians( lat ) ) ) ) AS distance FROM pois HAVING distance < '.$radius.' ORDER BY distance LIMIT 0 , 20;');
	  $query = $this->db->get('pois');
	  return $query->result();
	  //if($query->num_rows() > 0) return $query;
	  //else return NULL;
	}
}
=======
	  $this->db->query('SELECT id_poi, ( 6371 * acos( cos( radians('.$lat.') ) 
	  		* cos( radians( lat ) ) * cos( radians( lng ) - radians('.$lng.') ) + sin( radians('.$lat.') ) 
	  		* sin( radians( lat ) ) ) ) AS distance FROM pois HAVING distance < '.$radius.' ORDER BY distance LIMIT 0 , 20;');
	  $query = $this->db->get('pois');
	  return $query->result();
	}

}
>>>>>>> 7f399eee4adcacf25a38834b0d5dcad6df83f018
