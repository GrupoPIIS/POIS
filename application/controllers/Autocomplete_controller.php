<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autocomplete_controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');

	}

	

	public function index()
	{
		  
	   		redirect('Mapa', 'refresh');

	}

	public function search($buscar){		
    	
    		if($buscar = $this->input->get('term')){
	            
    			$this->db->where('id_cat!=0');
	            $this->db->select('id_cat, nombre_cat as value');
	            $this->db->like('nombre_cat', $buscar); 
	            $query=$this->db->get('categorias');
	            if($query->num_rows() > 0){
	                foreach ($query->result_array() as $row){
	                    $result[]= $row;
	                }
	            }
	            echo json_encode($result);
        	}  	
    }

}

/* End of file autocomplete_controller.php */
/* Location: ./application/controllers/autocomplete_controller.php */