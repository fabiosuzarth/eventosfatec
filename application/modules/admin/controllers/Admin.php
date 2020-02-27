<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	 public function __construct(){
		parent::__construct();
		$this->load->helper('url');	
        $this->load->model('Pessoa/Pessoa_model', 'pessoa');	
    
	}



	public function index()
	{
		$this->load->view('login');
	}

	public function logar(){

		$usuario 		    = htmlentities($this->input->post('usuario'),TRUE);
		$senha 		        = hash('sha512', ($this->input->post('senha')));
		$retorna_pessoa     = $this->pessoa->retornapessoaadmin($usuario, $senha);

		$novosdados = array(
			'tipo_login'  => 'A'
		);

		if($retorna_pessoa != '0'){
			/*PESSOA*/
			$this->session->userdata('logado');
			$this->session->set_userdata('logado', $retorna_pessoa);
			$this->session->set_userdata($novosdados);
		
			echo json_encode(array('status' => 'sucesso','mensagem'=> 'Você será redirecionado ao sistema', 'dados' => null));
				}else{
			echo json_encode(array('status' => 'erro','mensagem'=> 'Usuário não encontrado', 'dados' => null));
			
		}

		
	}


	public function sair(){
		$this->session->sess_destroy();

		redirect('/admin', 'refresh');


	}
	
}
