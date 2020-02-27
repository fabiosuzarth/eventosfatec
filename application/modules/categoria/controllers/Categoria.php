<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->helper('url');	
		$this->load->model('Categoria_model', 'categoria');	
		}

	public function novo(){

	}


	public function inserir(){
		
	}
}
