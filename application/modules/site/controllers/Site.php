<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');	
		$this->load->model('Atividades/Atividades_model', 'atividade');	
		$this->load->model('Evento/Evento_model', 'evento');	
		$this->load->model('Pessoa/Pessoa_model', 'pessoa');
		$this->load->model('Inscricao/Inscricao_model', 'inscricao');
		$this->load->model('Cadpessoa/cadpessoa_model', 'cadpessoa');


	}

	/* http://localhost/eventosfatec/site/eventos */
	/*
	public function eventos()
	{ 	
		//$dados['atividades'] 	= $this->atividade->retornaAtividades();
		//$this->load->view('sobre', $dados);
		//$this->load->view('eventos');
		//$dados['atividades'] 	= $this->atividade->retornaAtividades();
		
		//$this->load->view('eventos');
		$this->template->load('template_site', 'eventos', $dados = null);


	}
	*/

	/* http://localhost/eventosfatec/site/programacao/1 */
	/*
	public function programacao($id)
	{
		if ($this->session->userdata('logado')) {
			$this->session->unset_userdata('atividades');
            $retorna_pessoa_atividades = $this->pessoa->retornapessoaatividades($this->session->userdata['logado']->id);	
			$this->session->set_userdata('atividades', $retorna_pessoa_atividades);
        }
	
		$dados['atividades'] 	= $this->atividade->retornaAtividades($id);
		$dados['evento'] 	= $this->evento->retornaEventoUm($id);
		$dados['organizador'] 	= $this->pessoa->retornaInfoOrganizador($dados['evento']->organizador_pessoa_id);

		$this->template->load('template_site', 'programacao', $dados);
	}
	*/

	/* http://localhost/eventosfatec/site/meuseventos/1 */
	/*
	public function meuseventos($id)
	{
		if (!$this->session->userdata('logado')) {
            header("location:".base_url());
		}

		// ??? impediria que user puxe info de outro user ???
		$user = $this->session->userdata('logado');

		if($user->id != $id){
			header("location:".base_url());
		}
	
		$dados['atividades'] 	= $this->inscricao->retornaTodasAtividadesUsuario($id);
		$this->template->load('template_site', 'meuseventos', $dados);
	}

	public function contato()
	{
		$this->load->view('contato');
	}
	*/

	public function errocertificado()
	{
		$this->load->view('errocertificado');
	}

	/*
	public function listaum($id)
	{
		$dados['atividades'] 	= $this->atividade->retornaAtividadesUm();
		
	}
	*/

	/*
	public function cadastrar()
	{
		$this->template->load('template_site','cadastrar');
	}
	*/

	public function index()
	{
		$id = 2;
		//$dados['atividades'] 	= $this->atividade->retornaAtividades($id);

		$dados['fotos']   = $this->evento->fotos();
		$dados['eventos'] = $this->atividade->retornaAtividadesEventoData($id);
		$dados['todos']   = $this->evento->retornaTodos();

		$dados['escolaridade']=$this->cadpessoa->get_escolaridade();
		$dados['tipopessoa']=$this->cadpessoa->get_tipoPessoa();
		
		if(isset($_SESSION['logado'])) {  
			//$id = $_SESSION['logado']->id;
			//$dados['atividades'] 	= $this->inscricao->retornaTodasAtividadesUsuario($_SESSION['logado']->id);
			$this->session->unset_userdata('atividades');
            $retorna_pessoa_atividades = $this->pessoa->retornapessoaatividades($this->session->userdata['logado']->id);	
			$this->session->set_userdata('atividades', $retorna_pessoa_atividades);
			$dados['atividadesUsuario'] = $this->inscricao->retornaTodasAtividadesUsuario($this->session->userdata['logado']->id);
		} 		

		$this->load->view('home', $dados);

	}

	/*
	public function ev()
	{
		$id	= $this->uri->segment(3);
	
		//$dados['atividades'] 	= $this->atividade->retornaAtividades($id);


		$dados['fotos']   = $this->evento->fotos();
		$dados['eventos'] = $this->atividade->retornaAtividadesEventoData($id);
		$dados['todos']   = $this->evento->retornaTodos();

		$dados['escolaridade']=$this->cadpessoa->get_escolaridade();
		$dados['tipopessoa']=$this->cadpessoa->get_tipoPessoa();
		

	

		 if(isset($_SESSION['logado'])) {  
			$id = $_SESSION['logado']->id;
			$dados['atividades'] 	= $this->inscricao->retornaTodasAtividadesUsuario($id);
		} 

		$this->load->view('home', $dados);
	}
	*/

	
	public function palestrante()
	{
		$id	= $this->uri->segment(3);

		
		$dados['pessoa'] = $this->pessoa->retornaPessoa($id);
		$this->load->view('palestrante', $dados);
	}
	

	
	public function login()
	{	
		$this->load->view('login', $dados = null);
	}
	



}
