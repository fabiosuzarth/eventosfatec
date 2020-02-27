<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadpessoa extends CI_Controller {


    public function __construct()
    {
		parent::__construct();
	
       $this->load->model('Cadpessoa_model', 'cadpessoa');
       $this->load->model('Pessoa/Pessoa_model', 'pessoa');	
       $this->load->model('Sms/Sms_model', 'sms');
	
	}


    public function index()
    {
        $dados = array();
        // var_dump($dados);
        // exit;
        $dados['tipoPessoa']    =  $this->cadpessoa->get_tipoPessoa();
        $dados['escolaridade']    =  $this->cadpessoa->get_escolaridade();
        // var_dump($dados);
        // exit;
       
        $this->load->view('cadastrar_view', $dados);
    }

    public function cadastrar()
    {
        $dados   = $this->input->post();
        // var_dump($dados);
        // exit;
        $data = $dados;
        $data['data_nascimento'] = data_bd($dados['data_nascimento']);
        $data['senha'] = md5($dados['senha']);

        if($this->cadpessoa->insere_pessoa($data)) {
            echo json_encode(array("status" => "sucesso"));
          
        }else{
            echo json_encode(array("status" => "erro"));
           
        }
    }

    public function escolaridade()
    {
        $rslt['escolaridade']=$this->cadpessoa->get_escolaridade();
        $rslt['tipopessoa']=$this->cadpessoa->get_tipoPessoa();
	
		if($rslt==TRUE){
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

    
    public function RegistraPessoa()
    {

        
		$nascimento = $this->input->post('data_nascimento');
        $dataNascimento = DateTime::createFromFormat('d/m/Y', $nascimento);
        
       if($this->input->post('email') == ""){
        echo json_encode(array("status" => "erro", "mensagem" => "Email invalido"));
        exit;
       }

       if(empty($this->input->post('email'))){
        echo json_encode(array("status" => "erro", "mensagem" => "Email invalido"));
        exit;
       }

        $dados['cpfcnpj']  			= preg_replace('/[^0-9]/', '',$this->input->post('cpfcnpj'));
        $dados['email']  			= $this->input->post('email');
        $dados['senha']  			= hash('sha512', $this->input->post('senha'));
        $dados['tipo_id']  			= $this->input->post('tipo_id');
        $dados['nome']  			= $this->input->post('nome');
        $dados['logradouro']  		= $this->input->post('logradouro');
        $dados['telefone']  		= preg_replace('/[^0-9]/', '',$this->input->post('telefone'));
        $dados['data_nascimento']  	= $dataNascimento->format('Y-m-d');
        $dados['observacao']  		= $this->input->post('observacao');
        $dados['escolaridade_id']  	= $this->input->post('escolaridade_id');
        $dados['cep']  				= preg_replace('/[^0-9]/', '',$this->input->post('cep'));
        $dados['cidade']  			= $this->input->post('cidade');
        $dados['bairro']  			= $this->input->post('bairro');
        $dados['numero']  			= $this->input->post('numero');
        $dados['complemento']  		= $this->input->post('complemento');
        $dados['estado']  			= $this->input->post('estado');
		$dados['pais']  			= $this->input->post('pais');

   
      
        if(  $pessoa_id = $this->pessoa->inserir($dados)) {

            $usuario = $this->input->post('email');
            $senha = hash('sha512', $this->input->post('senha'));
            $retorna_pessoa     = $this->pessoa->retornapessoausuario($usuario, $senha);
	
            $novosdados = array(
                'tipo_login'  => 'U'
            );
    
            if($retorna_pessoa != '0'){		
                $retorna_pessoa_atividades = $this->pessoa->retornapessoaatividades($retorna_pessoa->id);	
                $this->session->userdata('logado');
                $this->session->set_userdata('logado', $retorna_pessoa);
                $this->session->set_userdata('atividades', $retorna_pessoa_atividades);
                $this->session->set_userdata($novosdados);  
                $sms['numero']=$retorna_pessoa->telefone;
                $sms['mensagem']="Voce se registrou para a III Semana de Ciencia e Tecnologia da Fatec Araras. Se inscreva nas atividades pelo nosso portal https://eventosfatec.dsicari.com.br";
                $this->sms->enviarsms($sms);
            }
                      
            echo json_encode(array("status" => "sucesso"));
          
        }else{
            echo json_encode(array("status" => "erro"));
           
        }

    }

    public function VerificaEmail()
    {

        $email  			    = $this->input->post('email');
        $user     	            = $this->cadpessoa->verificaemail($email);
        echo json_encode($user);
    }

   
}
