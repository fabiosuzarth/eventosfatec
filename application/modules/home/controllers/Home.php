<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//session_start();
//error_reporting(0); 

class Home extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->helper('url');	
		//$this->load->libraries('session');
		$this->load->model('Inscricao/Inscricao_model', 'inscricao');
	}

	public function index(){
		if (!$this->session->userdata('logado') ||$this->session->userdata('tipo_acesso') == 'A' ) {
            header("location:".base_url('admin'));
		}
		
		//$emailenviar ='paulo.amigoni@gmail.com';

		// $texto =  "<img src= 'https://www.fatecararas.com.br/site/images/Logo-Araras.png'  style='max-width: 150px !important; width:150px; padding: 10px 10px 10px 10px; margin: 10px 10px 10px 10px'/><hr>";
		// $texto .= "Parabéns por se inscrever em nosso portal.<br> ";
		// $texto .= "Você será informado sempre que tiver um novo evento.<br> ";
		// $texto .= "<hr>";
		// $texto .= "<img src= 'https://i.stack.imgur.com/8A1zI.gif' /><br>";

		//   enviar_email($emailenviar,
		//   'Parabéns',
		//   $texto);

		// exit;
		$dados['graficoInscricoesDia'] = $this->inscricao->inscritosAtividadePorDia();
		$dados['graficoCadastrosDia'] = $this->inscricao->novosCadastrosPorDia();
		$dados['statusInscricaoAtividades'] = $this->inscricao->retornaAtvidadesStatusInscricao();
		$this->template->load('template', 'novo_view', $dados);
    }


}
