<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->helper('url');	
		$this->load->model('Sms_model', 'sms');	
	}
	
	public function enviarsms($numero, $mensagem){
		$dados['numero']=$numero;
		$dados['mensagem']=$mensagem;
		$rslt=$this->sms->enviarSms($dados);	
		return $rslt;
	}
	
}
