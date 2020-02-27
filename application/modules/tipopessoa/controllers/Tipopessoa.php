<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipopessoa extends CI_Controller {


	public function __construct(){
		parent::__construct();
	
	   $this->load->model('TipoPessoa_model', 'tipopessoa');
	
	}

	
	public function index(){
		$dados = null;
		$this->template->load('template', 'novo_view', $dados);
	}


	public function novo(){
	
	$data['nome'] = $this->input->post('nome');
		
	}
}
