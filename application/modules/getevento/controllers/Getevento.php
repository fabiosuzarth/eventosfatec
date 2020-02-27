<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getevento extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->helper('url');	
		$this->load->model('Getevento_model', 'getevento');	
	}

	
	public function eventoatividade(){

		/**********************************************************************
		 * CADA SEGMENTO DA URL É PASSADO ABAIXO 
		 * EX; http://localhost/eventosfatec/valida/si/20
		 * se precisar colocar mais coisas na URL 
		 * temos que colocar na Rota
		 * que fica em application/config/routes.php
		 * $route['valida/(:any)/(:any)'] = 'validapessoa/valida/$1/$1';
		 * adiciona o (:any) e coloca mais $1
		 * e coloca no segment()
		***********************************************************************/

		$rslt=$this->getevento->readEventoAtividade();
	
		if($rslt['result']==TRUE){
			http_response_code(200);
			echo json_encode($rslt);
			exit;
		}
		else{
			http_response_code(200);
			echo json_encode($rslt);
			exit;
		}	
	}

	public function atividade(){

		$dados['atividade_id']  = $this->uri->segment(2);

		$rslt=$this->getevento->readAtividade($dados);
	
		if($rslt['result']==TRUE){
			http_response_code(200);
			echo json_encode($rslt);
			exit;
		}
		else{
			http_response_code(200);
			echo json_encode($rslt);
			exit;
		}	
	}
}
