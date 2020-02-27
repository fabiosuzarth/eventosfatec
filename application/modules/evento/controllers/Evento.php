<?php
defined('BASEPATH') OR exit('No direct script access allowed');

error_reporting(0); 

class Evento extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->helper('url');	
		$this->load->model('Evento_model', 'evento');	
		$this->load->model('Status/Status_model', 'status');	
		$this->load->model('Inscricao/Inscricao_model', 'inscricao');	
	}

	public function novo(){
		if (!$this->session->userdata('logado') ||$this->session->userdata('tipo_acesso') == 'A' ) {
            header("location:".base_url('admin'));
        }

		$dados = null;
		$dados['status'] 	= $this->status->readStatusEvento();
		
		$this->template->load('template', 'novo_view', $dados);
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
        $dados['valor']  			                = $this->input->post('valor');
        $dados['status_id'] 		                = $this->input->post('status');
        $dados['pessoa_id'] 			            = $this->input->post('pessoa_id');
        $dados['organizador_pessoa_id']  			= $this->input->post('organizador_pessoa_id');
    
		$evento_id = $this->evento->inserir($dados);
		

		redirect('/home', 'refresh');

        if ($evento_id) {
			echo json_encode(array('status' => 'sucesso', 'id' => $evento_id));
		} else {
			echo json_encode(array('status' => 'erro'));
		}
		
	}



	public function editar(){

		if (!$this->session->userdata('logado') ||$this->session->userdata('tipo_acesso') == 'A' ) {
            header("location:".base_url('admin'));
        }

		$codEvento	= $this->uri->segment(3);
		$dados['atividades'] 	= $this->evento->retornaEventoUm($codEvento);
		$dados['status'] 	    = $this->status->readStatusEvento();
		$this->template->load('template', 'editar_view', $dados);

	}
	

	public function alterar(){

			
		$dataInicio = $this->input->post('datahora_inicio');
		$dateInicio = DateTime::createFromFormat('d/m/Y H:i', $dataInicio);
	
		$dataFim = $this->input->post('datahora_fim');
		$dateFim = DateTime::createFromFormat('d/m/Y H:i', $dataFim);
	
		$dataInicio = $this->input->post('datahora_inicio');
		$dateInicio = DateTime::createFromFormat('d/m/Y H:i', $dataInicio);
	
		$dataFim = $this->input->post('datahora_fim');
		$dateFim = DateTime::createFromFormat('d/m/Y H:i', $dataFim);
	

		$dados['id'] 	 			                = $this->input->post('id');
        $dados['nome']  			                = $this->input->post('nome');
        $dados['descricao']  			            = $this->input->post('descricao');
		$dados['datahora_inicio']  			        = $dateInicio->format('Y-m-d H:i');
        $dados['datahora_fim']  			        = $dateFim->format('Y-m-d H:i');
        $dados['localizacao']  			            = $this->input->post('localizacao');
        $dados['valor']  			                = $this->input->post('valor');
        $dados['status_id']  			            = $this->input->post('status');
 		
    	 $evento_id = $this->evento->alterarevento($dados);
		
		 
		 redirect('/home', 'refresh');



	}
	
	public function sortear(){			

		if (!$this->session->userdata('logado') || $this->session->userdata('tipo_acesso') == 'A' ) {
        	header("location:".base_url('admin'));
		}
		
		$dados = null;		
		$num = $this->input->post('num-usuarios');		
		$users = $this->inscricao->sorteioUsuario();

		$randIndex = array_rand($users, $num);
		$dataSorteada=array();
		foreach($randIndex as $ri){
			array_push($dataSorteada, $users[$ri]);
		}

		$dados['sorteado']=$dataSorteada;

		//var_dump($dados['sorteado']);
		//exit;

        $this->template->load('template', 'sorteio_view', $dados);		
    }

	public function lista(){

		if (!$this->session->userdata('logado') ||$this->session->userdata('tipo_acesso') == 'A' ) {
            header("location:".base_url('admin'));
        }

        $dados = null;
        $dados['evento']      	    = $this->evento->retornaTodos();
        $this->template->load('template', 'lista_view', $dados);

	}

	public function sorteio(){

		//$num = $this->uri->segment(3);

		if (!$this->session->userdata('logado') || $this->session->userdata('tipo_acesso') == 'A' ) {
        	header("location:".base_url('admin'));
        }

        $dados = 0;
        //$dados['sorteado'] = $this->inscricao->sorteioUsuario($num);
        $this->template->load('template', 'sorteio_view', $dados);

	}

}
