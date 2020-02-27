<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0); 

class Atividades extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->helper('url');	
		$this->load->model('Atividades_model', 'atividade');	
		$this->load->model('Evento/Evento_model', 'evento');	
		$this->load->model('Categoria/Categoria_model', 'categoria');	
		$this->load->model('Pessoa/Pessoa_model', 'pessoa');	
		$this->load->model('Status/Status_model', 'status');	
	}

	public function novo(){

		if (!$this->session->userdata('logado') ||$this->session->userdata('tipo_acesso') == 'A' ) {
            header("location:".base_url('admin'));
        }

		$dados = null;

		$dados['evento'] 		= $this->evento->retornaEvento();
		$dados['categoria'] 	= $this->categoria->retornaCategoria();
		$dados['palestrante'] 	= $this->pessoa->retornaPalestrante();
		$dados['status'] 	    = $this->status->readStatusAtividade();
		$this->template->load('template', 'novo_view', $dados);
    }


	/* http://localhost/eventosfatec/atividades/lista */
	public function lista(){
		$codEvento	= $this->uri->segment(3);

		$dados['atividades'] 	= $this->atividade->retornaAtividades($codEvento);
		http_response_code(200);
		echo json_encode($dados);
		exit;
	}


	public function agenda(){
		$dados['atividades'] 	= $this->atividade->retornaAtividadesEvento();
		print_r($dados);
	}

	public function inserir(){


		$dataInicio = $this->input->post('datahora_inicio');
		$dateInicio = DateTime::createFromFormat('d/m/Y H:i', $dataInicio);
	
		$dataFim = $this->input->post('datahora_fim');
		$dateFim = DateTime::createFromFormat('d/m/Y H:i', $dataFim);
	

        $dados['nome']  			                = $this->input->post('nome');
        $dados['descricao']  			            = $this->input->post('descricao');
        $dados['datahora_inicio']  			        = $dateInicio->format('Y-m-d H:i');
        $dados['datahora_fim']  			        = $dateFim->format('Y-m-d H:i');
        $dados['localizacao']  			            = $this->input->post('localizacao');
        $dados['vagas']  			                = $this->input->post('vagas');
		$dados['status_id']  			            = $this->input->post('status');
		$dados['horas']  			                = $this->input->post('horas');
		$dados['categoria_id']		                = $this->input->post('categoria_id');
		$dados['evento_id'] 		                = $this->input->post('evento_id');
		if($this->input->post('palestrante_id') <> ''){
			$dados['palestrante_pessoa_id']             = $this->input->post('palestrante_id');
		}	

		$atividade_id = $this->atividade->inserir($dados);
		
		redirect('/home', 'refresh');


        if ($atividade_id) {
			echo json_encode(array('status' => 'sucesso', 'id' => $atividade_id));
		} else {
			echo json_encode(array('status' => 'erro'));
		}
		
	}




	public function editar(){

		if (!$this->session->userdata('logado') ||$this->session->userdata('tipo_acesso') == 'A' ) {
            header("location:".base_url('admin'));
        }

			
		$codEvento	= $this->uri->segment(3);

		$dados['evento'] 		= $this->evento->retornaEvento();
		$dados['categoria'] 	= $this->categoria->retornaCategoria();
		$dados['palestrante'] 	= $this->pessoa->retornaPalestrante();
		$dados['status'] 	    = $this->status->readStatusAtividade();
		$dados['atividades'] 	= $this->atividade->retornaAtividadesUm($codEvento);
		$this->template->load('template', 'editar_view', $dados);
    }


	public function alterar(){

			
		$dataInicio = $this->input->post('datahora_inicio');
		$dateInicio = DateTime::createFromFormat('d/m/Y H:i', $dataInicio);
	
		$dataFim = $this->input->post('datahora_fim');
		$dateFim = DateTime::createFromFormat('d/m/Y H:i', $dataFim);
	
		$dados['id']  			                    = $this->input->post('id');
        $dados['nome']  			                = $this->input->post('nome');
        $dados['descricao']  			            = $this->input->post('descricao');
        $dados['datahora_inicio']  			        = $dateInicio->format('Y-m-d H:i');
        $dados['datahora_fim']  			        = $dateFim->format('Y-m-d H:i');
        $dados['localizacao']  			            = $this->input->post('localizacao');
        $dados['vagas']  			                = $this->input->post('vagas');
		$dados['status_id']  			            = $this->input->post('status');
		$dados['horas']  			                = $this->input->post('horas');
		$dados['categoria_id']		                = $this->input->post('categoria_id');
		$dados['evento_id'] 		                = $this->input->post('evento_id');
		
		if($this->input->post('palestrante_id') <> ''){
			$dados['palestrante_pessoa_id']             = $this->input->post('palestrante_id');
		}	

		
		 $atividade_id = $this->atividade->alteraratividade($dados);
		 
		 redirect('/home', 'refresh');



    }



	public function listagem(){

		if (!$this->session->userdata('logado') ||$this->session->userdata('tipo_acesso') == 'A' ) {
            header("location:".base_url('admin'));
        }

        $dados = null;
	    $dados['atividade']      	    = $this->atividade->retornaTodos();
        $this->template->load('template', 'lista_view', $dados);

	}




}
