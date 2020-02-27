<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->helper('url');	
		$this->load->model('Status_model', 'status');	
	}

	/* http://localhost/eventosfatec/status/evento */
	public function evento(){

		$rslt=$this->status->readStatusEvento();
	
		if($rslt['result']==TRUE){
			http_response_code(200);
			echo json_encode($rslt);
			exit;
		}
		else{
			http_response_code(404);
			echo json_encode($rslt);
			exit;
		}	
	}

	/* http://localhost/eventosfatec/status/atividade */
	public function atividade(){

		$rslt=$this->status->readStatusAtividade();
	
		if($rslt['result']==TRUE){
			http_response_code(200);
			echo json_encode($rslt);
			exit;
		}
		else{
			http_response_code(404);
			echo json_encode($rslt);
			exit;
		}	
	}

	/* http://localhost/eventosfatec/status/inscricao */
	public function inscricao(){

		$rslt=$this->status->readStatusInscricao();
	
		if($rslt['result']==TRUE){
			http_response_code(200);
			echo json_encode($rslt);
			exit;
		}
		else{
			http_response_code(404);
			echo json_encode($rslt);
			exit;
		}	
	}
}
