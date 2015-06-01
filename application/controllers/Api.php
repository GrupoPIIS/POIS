<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH."/libraries/REST_Controller.php";

class Api extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		//cargamos el modelo cuando se llama al constructor
		$this->load->model('api_model');
	//	$this->load->model('pois_model');

	}


	
	//esta función sirve para obtener info (pedir datos al servidor) 
	public function index_get()
	{
		$pois = $this->api_model->get();

		if (! is_null($pois)) 
		{
			$this->response(array("response"=>$pois), 200);
		}
		else
		{
			$this->response(array("error"=>"No hay pois"), 404);
		}
	}


	//para buscar por un criterio determinado
	public function find_get($id)
	{
		if (! $id) 
		{
			$this->response(NULL, 400);
		}

		$poi = $this->api_model->get($id);

		if (!is_null($poi)) 
		{
			$this->response(array("response" => $poi), 200);
		}
		else
		{
			$this->response(array("error" => "No se encuentra el POI"), 404);
		}
	}


	

	//http://localhost/POIS/api/findclose/37.9958697/-1.177024/0

	public function findclose_get($lat, $lng, $radius)
	{
		if (is_null($radius)||is_null($lat)|| is_null($lng)) 
		{
			$this->response(NULL, 400);
		}

		$pois = $this->api_model->getPoisCloseTo($lat, $lng, $radius);

		if (!is_null($pois)) 
		{
			$this->response(array("response" => $pois), 200);
		}
		else
		{
			$this->response(array("error" => "No se encuentran POIs"), 404);
		}
	}



	//http://localhost/POIS/api/findByTag/restaurante
	public function findByTag_get($tag)
	{
		if (is_null($tag)) 
		{
			$this->response(NULL, 400);
		}

		$pois = $this->api_model->getPoisByTag($tag);

		if (!is_null($pois)) 
		{
			$this->response(array("response" => $pois), 200);
		}
		else
		{
			$this->response(array("error" => "No se encuentran POIs"), 404);
		}
	}



	//http://localhost/POIS/api/findPoisDistTag/restaurante/37.9960367/-1.1701612/5
	function findPoisDistTag_get($tag,$lat,$lng,$radius)
	{
		if (is_null($radius)||is_null($lat)|| is_null($lng)||is_null($tag)) 
		{
			$this->response(NULL, 400);
		}

		$pois = $this->api_model->getPoisDistTag($tag,$lat,$lng,$radius);

		if (!is_null($pois)) 
		{
			$this->response(array("response" => $pois), 200);
		}
		else
		{
			$this->response(array("error" => "No se encuentran POIs"), 404);
		}
	}




/*
	//Este método sirve para enviar info y guardarla (en el servidor y/o la bdd)
	public function index_post()
	{
		//comprobamos si vienen los datos en la petición
		//si no vienen, respondemos con un 400
		if (! $this->post("poi")) 
		{
			$this->response(NULL, 400);
		}

		//si vienen los datos en la petición, entonces
		//hacemos una petición al método save del modelo (pois_model.php) y guardamos el poi
		//que nos han mandado por POST
		$poiId = $this->pois_model->save($this->post("poi"));

		//si no es nula la respuesta de guardar un poi

		if (! is_null($poiId)) 
		{
			$this->response(array("response" => $poiId), 200);
		}
		else
		{
			$this->response(array("error" => "Ha ocurrido un error"), 400);
		}

	}

	//Envía y/o actualiza la info de un registro en el server o bdd. Es el similar a update en sql
	//
	public function index_put($id)
	{
		if (! $this->put("poi") || !$id) 
		{
			$this->response(NULL, 400);
		}
		
		$poiId = $this->pois_model->update($id, $this->put("poi"));


		if (! is_null($update)) 
		{
			$this->response(array("response" => "poi actualizado"), 200);
		}
		else
		{
			$this->response(array("error" => "Ha ocurrido un error"), 400);
		}

	}


	//Adivina qué hace esta función...
	public function index_delete()
	{
		if (! $id) 
		{
			$this->response(NULL, 400);
		}

		$delete = $this->pois_model->delete($id);

		if(! is_null($delete))
		{
			$this->response(array("response" => "poi eliminado"), 200);
		}
		else
		{
			$this->response(array("error" => "Ha ocurrido un error"), 400);
		
		}
	}*/

}
/* End of file pois.php */
/* Location: ./application/controllers/pois.php */