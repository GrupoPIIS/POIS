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
	function newPoi($datos){
		if($this->session->userdata('rol') == 0)
			$id_usuario = $datos['id_usuario'];
		else
			$id_usuario = $this->session->userdata('id_usuario');

		$this->db->insert('pois', array(
										'lng' 		=> $datos['lng'],
										'lat' 		=> $datos['lat'],
										'nombre_poi'=> $datos['nombre_poi'],
										'txt_rep'	=> $datos['txt_rep'],
										'direccion'	=> $datos['direccion'],
										'id_usuario'=> $id_usuario
										)
						);
		$last = $this->db->insert_id();

<<<<<<< HEAD
		$this->db->insert('estadisticas', array(
														'id_poi'	=> $last,
														'num_visitas'=> '0'
													)
								);


		if($data['id_categoria']){
			foreach ($data['id_categoria'] as $categoria){
=======
		if($datos['id_categoria']){
			foreach ($datos['id_categoria'] as $categoria){
>>>>>>> 4b43e77ecd86503f6e6b4543ce438c0c5458c921
				
				$this->db->insert('id_poi_id_cat', array(
														'id_poi'	=> $last,
														'id_cat'	=> $categoria
													)
								);
			}
		}
		return $last;
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

	function multimediaPoi($id, $tipo, $nombre, $imagen){
		
        $data = array(
        	'id_poi' 	=> $id,
            'tipo_recurso' => $tipo,
            'nombre_recurso' => $nombre,
            'ruta_recurso' => $imagen
        );
        return $this->db->insert('multimedia', $data);
	}

	function getMultimediaPoi($id){
		$this->db->where('id_poi', $id);
		$this->db->order_by("tipo_recurso", "ASC"); 
		$query = $this->db->get('multimedia');
		if($query->num_rows() > 0) return $query;
		else return NULL;
	}

	function updateMultimediaPoi($id_poi, $id_recurso, $tipo, $nombre, $recurso){
		 $data = array(
            'tipo_recurso' => $tipo,
            'nombre_recurso' => $nombre,
            'ruta_recurso' => $recurso
        );
		$this->db->where('id_poi', $id_poi);
		$this->db->where('nombre_recurso', $id_recurso);
        return $this->db->update('multimedia', $data);
	}

	function deleteMultimediaPoi($id_poi, $id_recurso){
		$this->db->where('id_poi', $id_poi);
		$this->db->where('nombre_recurso', $id_recurso);
		$this->db->delete('multimedia');
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

	function getSocialAllPoi($id){
		return $this->db->query('SELECT * FROM redes_sociales, rrss_poi WHERE id_rrss = id_red AND id_poi = '.$id);
	
	}

	function deleteSocialPoi($id_poi, $id_recurso){
		$this->db->where('id_poi', $id_poi);
		$this->db->where('id_rrss', $id_recurso);
		$this->db->delete('rrss_poi');
	}

		//Devuelve los 20 pois dentro de un círculo de radio r (en kms) y centro en la ubicación actual.
	//se el pasa un array como argumento que contiene la ubicación (lat y lng del centro del círculo, 
	//es decir, la ubicación actual del navegador o del móvil o la que se le seleccione 
	//desde el mapa de la página principal) y el radio en kms que quieres que te devuelva.
	//

	function getPoisCloseTo($lat, $lng, $radius){

	 $query = $this->db->query('SELECT id_poi, nombre_poi, lat, lng, ( 6371 * acos( cos( radians('.$lat.') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('.$lng.') ) + sin( radians('.$lat.') ) * sin( radians( lat ) ) ) ) AS distance FROM pois HAVING distance < '.$radius.' ORDER BY distance LIMIT 0 , 20;');
	 if($query->num_rows() > 0) return $query;
	 else return NULL;
	}

	function getPoisByTag($tag){

		$query = $this->db->query('SELECT * FROM pois WHERE id_poi IN (SELECT id_poi FROM id_poi_id_cat WHERE id_cat IN (SELECT id_cat FROM categorias WHERE nombre_cat = "'.$tag.'"));');
		if($query->num_rows() > 0) return $query;
	 	else return NULL;
	}

	function getPoisDistTag($tag,$lat,$lng,$radius){

		$query = $this->db->query('SELECT id_poi, nombre_poi, lat, lng, ( 6371 * acos( cos( radians('.$lat.') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('.$lng.') ) + sin( radians('.$lat.') ) * sin( radians( lat ) ) ) ) AS distance 
			FROM pois WHERE id_poi IN (SELECT id_poi FROM id_poi_id_cat 
				WHERE id_cat IN (SELECT id_cat FROM categorias WHERE nombre_cat = "'.$tag.'")) 
					HAVING distance < '.$radius.' ORDER BY distance LIMIT 0 , 20;');
	 	if($query->num_rows() > 0) return $query;
	 	else return NULL;
	}

	function updateVisits($id_poi){

		$this->db->select('num_visitas');
		$this->db->where('id_poi', $id_poi);
		$query = $this->db->get('estadisticas');
		$data = array(
            'id_poi' => $id_poi,
            'num_visitas' => $query+1
        );
		$this->db->update('estadisticas', $data);
	}



}

