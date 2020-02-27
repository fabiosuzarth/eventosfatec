<?php
defined('BASEPATH') OR exit('No direct script access allowed');

error_reporting(0); 

class Inscricao extends CI_Controller {


	public function __construct(){
		include APPPATH . 'third_party/qrcode/phpqrcode/qrlib.php';
		include APPPATH . 'third_party/pdf/fpdf.php';
		parent::__construct();
		$this->load->helper('url');	
		$this->load->model('Inscricao_model', 'inscricao');	
		$this->load->model('Evento/Evento_model', 'evento');	
		$this->load->model('Atividades/Atividades_model', 'atividades');	
		$this->load->model('Pessoa/Pessoa_model', 'pessoa');
	}



	public function lista(){

		if (!$this->session->userdata('logado') ||$this->session->userdata('tipo_acesso') == 'A' ) {
            header("location:".base_url('admin'));
        }

        $dados = null;
        $dados['inscricao']      	    = $this->inscricao->retornaTodos();
        $this->template->load('template', 'lista_view', $dados);

	}
	


	public function atividades(){

		if (!$this->session->userdata('logado') || $this->session->userdata('tipo_acesso') == 'A' ) {
			header("location:".base_url('admin'));
		}

		$dados = null;
		
		$atividade	= $this->uri->segment(3);

        $dados['retorno']   = $this->inscricao->retornaInscAtividades($atividade);
        $this->template->load('template', 'inscritos_view', $dados);

	}

	/* /inscricao/inscreveratividade/{evento}/{atividade} */
	public function inscreveratividade(){
		$dados['evento_id'] = $this->uri->segment(3);
		$dados['atividade_id'] = $this->uri->segment(4);
		$dados['pessoa_id'] = $this->uri->segment(5);

		// se nao estiver logado
		if (!$this->session->userdata('logado')) {
			http_response_code(200);
			echo json_encode(array('result' => false, 'message' => 'Faça login para poder se inscrever'));
			exit;
		}

		// pega pessoa_id da sessao se nao for admin, caso contrario admin deve passar na rota !!
		if ($this->session->userdata('logado') && $this->session->userdata('tipo_acesso') != 'A' ) {
            $dados['pessoa_id'] = $this->session->userdata['logado']->id;	
		}

		// Verificar se nao foi passado usuario na rota e tao pouco pela sessao
		if($dados['pessoa_id'] == null){
			http_response_code(200);
			echo json_encode(array('result' => false, 'message' => 'Não recebido código usuário'));
			exit;
		}
		
		// Verificar se evento e atividade existem
		$evento = $this->evento->retornaEventoUm($dados['evento_id']);
		$atividade = $this->atividades->retornaAtividadesUm($dados['atividade_id']);
		if($atividade == 0 || $evento == 0){
			http_response_code(200);
			echo json_encode(array('result' => false, 'message' => 'Evento/Atividade não encontrado'));
			exit;
		} 

		// Verificar se atividade possui inscricoes abertas
		if ($atividade[0]->status_id != 1) {
			http_response_code(200);
			echo json_encode(array('result' => false, 'message' => 'Inscrições não estão abertas'));
			exit;
		}

		// Verificar se atividade ainda possui vagas para usuario poder se inscrever
		if ($atividade[0]->vagasRestantes <= 0) {
			http_response_code(200);
			echo json_encode(array('result' => false, 'message' => 'Não há vagas'));
			exit;
		}				

		$atividadesUsuario = $this->inscricao->retornaTodasAtividadesEventoUsuario($dados['pessoa_id'], $dados['evento_id']);

		// Verificar se atividade que usuario quer se inscrever nao confronta com horario de uma ja inscrita
		foreach ($atividadesUsuario as $atv) {
			$atvDataHoraInicio = date('Y-m-d H:i:s', strtotime($atv->atividade_datahora_inicio)); 
			$atvDataHoraFim = date('Y-m-d H:i:s', strtotime($atv->atividade_datahora_fim)); 
			$atividadeDataHoraInicio = date('Y-m-d H:i:s', strtotime($atividade[0]->datahora_inicio)); 
			$atividadeDataHoraFim = date('Y-m-d H:i:s', strtotime($atividade[0]->datahora_fim)); 

			$daterange1 = array($atvDataHoraInicio, $atvDataHoraFim);
			$daterange2 = array($atividadeDataHoraInicio, $atividadeDataHoraFim);

			$range_min = new DateTime(min($daterange1));
			$range_max = new DateTime(max($daterange1));

			$start = new DateTime(min($daterange2));
			$end = new DateTime(max($daterange2));

			if ( ($start >= $range_min && $end <= $range_max) || ($end > $range_min && $start < $range_max) ) {
				if($atv->status_inscricao == 1)
				{
					log_message('error', 'Tentativa de inscricao com confronto, pessoa_id='.$dados['pessoa_id'].' tentou se inscrever em atividade_id='.$atividade[0]->id.' mas confronta com atividade_id='. $atv->atividade_id);
					http_response_code(200);
					echo json_encode(array('result' => false, 'message' => 'Horário confronta com outra atividade'));
					exit;
				}
			} 
			//else if($end > $range_min && $start < $range_max){
			//	echo "partialy";
			//}
			//else {
			//	echo 'free!';
			//}
		}

		// Verificar se usuario ja nao esta inscrito na atividade e foi cancelado e etc...
		// Se ja houver qq inscricao, setar como INSCRITO
		$updateinscricao=false;		
		foreach ($atividadesUsuario as $atv) {
			if( $dados['atividade_id'] == $atv->atividade_id ){
				/*if($atv->status_inscricao == "1"){
					http_response_code(200);
					echo json_encode(array('result' => false, 'message' => 'Usuário já cadastrado na atividade'));
					exit;
				}*/
				$updateinscricao=true;
				break;
			}
		}

		// Tudo OK, inscrever usuario ou update inscricao
		if($updateinscricao==true){
			$rslt=$this->inscricao->inscreverupdate($dados);
		}
		else{
			$rslt=$this->inscricao->inscrever($dados);
		}
		
		if($rslt['result'] == TRUE){		
			
			$pessoa=$this->pessoa->retornaPessoa($dados['pessoa_id']);
			
			$emailenviar = $pessoa->email;

			$img_palestrante = 'https://eventosfatec.dsicari.com.br/'.$atividade[0]->img_paslestrante;
			$gif =  "https://media.giphy.com/media/DffShiJ47fPqM/giphy.gif";
			$img_semana_tecnologia="https://eventosfatec.dsicari.com.br/evento/img/logo_evento-min.png";
			$img_logo_fatec="https://eventosfatec.dsicari.com.br/evento/img/logo_fatec_araras-min.png";

			$email = '<table    style="border: 0px solid #ffffff;">			
						<tr>
							<td colspan="2" style="font-size: 28px;"><br>INSCRIÇÃO CONFIRMADA!</td>
						</tr>
						<tr>
							<td colspan="2"  style="font-size: 16px;"><br>Você se inscreveu para a III Semana de Ciência e Tecnologia - Fatec Araras.<br></td>
						</tr>

						<tr>
							<td>
								<br><img src=" ' . $img_palestrante .'" 
								style="border: 2px solid #ffffff; border-radius: 15% !important; max-height: 130px; max-width: 130px "
								alt="">
							</td>

							<td style="padding-left:20px">
								<p style="color: #666666;
										font-size: 21px;
										letter-spacing: 0;
										margin-top: 10px;
										margin-bottom: 10px;
										">'. $atividade[0]->nome .'</p>
										<p>Com: '. $atividade[0]->palestrante .'</p>								
							</td>
						</tr>  

						<tr>
							<td style="font-size: 15px;">
								<br><br>Nos vemos lá!<br><br>
							</td>
						</tr>

						<tr>
							<td colspan="2">						
								Acesse nosso <a href="https://eventosfatec.dsicari.com.br/site/" target="_blank">portal</a>, e conheça todos os eventos disponíveis.        
								<br>Fatec Araras - Rua Jarbas Leme Godoy, nº 875. Jd. José Ometto II. Araras/SP								
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<br><img width="25%" src="'.$img_logo_fatec.'"/>
							</td>
						</tr>
				</table>';

			// $texto =  "";
			// $texto =  "<img src= 'https://www.fatecararas.com.br/site/images/Logo-Araras.png'  style='max-width: 150px !important; width:150px; padding: 10px 10px 10px 10px; margin: 10px 10px 10px 10px'/><hr>";
			// $texto .= "Você se inscreveu em ". $atividade[0]->nome ." que vai acontecer durante ".$evento->nome."<br> ";
			// $texto .= "Nos vemos por lá!<br> ";
			// $texto .= "<hr><br>";
			// $texto .= "<img src= 'https://media.giphy.com/media/xULW8v7LtZrgcaGvC0/giphy.gif' width='20%' />";
			

			enviar_email($emailenviar, 'Fatec Araras :: Confirmação de inscrição', $email);

			http_response_code(200);
			echo json_encode(array( 'result' => true, 
									'message' => 'Inscrição efetuada'));
			exit;
		}	
		else{
			http_response_code(404);
			echo json_encode(array( 'result' => false, 
									'message' => 'Inscrição nao pode ser efeutada'));
			exit;
		}	

	}

	/* /inscricao/confirmarpresencaapp/{atividade}/{pessoa}/{token} */
	public function confirmarpresencaapp(){
		$dados['atividade_id']  = $this->uri->segment(3);
		$dados['pessoa_id']    = $this->uri->segment(4);
		$dados['token']	= $this->uri->segment(5);

		if($dados['token'] != "310c77f27d6313bf3223e5ce03d61e0c"){
			http_response_code(200);
			echo json_encode(array("result" => false, "message" => "Acesso nao permitido"));
			exit;
		}
		else{
			http_response_code(200);
			echo json_encode(self::confirmarpresenca($dados['atividade_id'], $dados['pessoa_id']));
			exit;
		}


		
	}

	/* /inscricao/confirmarpresenca/{atividade}/{pessoa} */
	private function confirmarpresenca($atividade_id, $pessoa_id){

		//$dados['atividade_id']  = $this->uri->segment(3);
		//$dados['pessoa_id']    = $this->uri->segment(4);
		$dados['atividade_id']  = $atividade_id;
		$dados['pessoa_id']    = $pessoa_id;

		$rslt=$this->inscricao->confirmarPresenca($dados);

		if($rslt['result']==TRUE){		

			$pessoa=$this->pessoa->retornaPessoa($pessoa_id);
			$atividade = $this->atividades->retornaAtividadesUm($atividade_id);

			$emailenviar = $pessoa->email;
			$img_semana_tecnologia="https://eventosfatec.dsicari.com.br/evento/img/logo_evento-min.png";
			$img_logo_fatec="https://eventosfatec.dsicari.com.br/evento/img/logo_fatec_araras-min.png";
			$link_certificado="https://eventosfatec.dsicari.com.br/inscricao/validarcertificado/".$rslt['sign_cert'];

			$email = '
					<table style="border: 0px solid #ffffff;">
						<tr>
							<td colspan="2" style="font-size: 28px;"><br>SEU CERTIFICADO FOI EMITIDO!</td>
						</tr>
						<tr>
							<td colspan="2"  style="font-size: 16px;"><br>O certificado referente a atividade '. $atividade[0]->nome .' da qual você participou durante a III Semana de Ciência e Tecnologia - Fatec Araras, está disponível:<br>
							<a href="'.$link_certificado.'">VISUALIZAR CERTIFICADO</a><br></td>
						</tr> 

						<tr>
							<td colspan="2">						
								<br><br>Acesse nosso <a href="https://eventosfatec.dsicari.com.br/site/" target="_blank">portal</a>, e conheça todos os eventos disponíveis.        
								<br>Fatec Araras - Rua Jarbas Leme Godoy, nº 875. Jd. José Ometto II. Araras/SP								
							</td>
						</tr>
					</table>';

			//$texto .=  "<img src= 'https://www.fatecararas.com.br/site/images/Logo-Araras.png'  style='max-width: 150px !important; width:150px; padding: 10px 10px 10px 10px; margin: 10px 10px 10px 10px'/><hr>";
			// $texto =  "<img width='50%' src=". base_url('evento/img/logo_evento-min.png') ." />";
			// $texto .= "Você cancelou sua inscrição em ". $atividade[0]->nome ."<br>";
			// $texto .= "Acesse nosso <a href='https://". base_url() ."' >portal</a>, temos muitos eventos para você participar!<br> ";
			// $texto .= "<hr><br>";
			// $texto .= "<img src= 'https://media.giphy.com/media/m9eG1qVjvN56H0MXt8/giphy.gif' width='20%' />";

			enviar_email($emailenviar, 'Fatec Araras :: Certificado de participação', $email);
			// echo($emailenviar.'<br>');
			// echo($email.'<br>');
			// print_r($rslt);
			// exit;

			//http_response_code(200);
			return ($rslt);
			//exit;
		}
		else{
			//http_response_code(404);
			return ($rslt);
			//exit;
		}	
		
	}

	/* /inscricao/cancelarinscricao/{atividade}/{pessoa} */
	public function cancelarinscricao(){
		$dados['atividade_id'] = $this->uri->segment(3);
		$dados['pessoa_id'] = $this->uri->segment(4);

		// se nao estiver logado
		if (!$this->session->userdata('logado')) {
			http_response_code(200);
			echo json_encode(array('result' => false, 'message' => 'Usuário não logado'));
			exit;
		}

		// pega pessoa_id da sessao se nao for admin, caso contrario admin deve passar na rota !!
		if ($this->session->userdata('logado') && $this->session->userdata('tipo_acesso') != 'A' ) {
            $dados['pessoa_id'] = $this->session->userdata['logado']->id;	
		}

		// nao foi passado usuario na rota e tao pouco pela sessao
		if($dados['pessoa_id'] == null){
			http_response_code(200);
			echo json_encode(array('result' => false, 'message' => 'Não recebido código usuário'));
			exit;
		}

		$rslt=$this->inscricao->cancelarInscricao($dados);

		if($rslt['result']==TRUE){

			$pessoa=$this->pessoa->retornaPessoa($dados['pessoa_id']);
			$atividade = $this->atividades->retornaAtividadesUm($dados['atividade_id']);

			$emailenviar = $pessoa->email;

			$img_palestrante = 'https://eventosfatec.dsicari.com.br/'.$atividade[0]->img_paslestrante;
			$gif =  "https://media.giphy.com/media/m9eG1qVjvN56H0MXt8/giphy.gif";
			$img_semana_tecnologia="https://eventosfatec.dsicari.com.br/evento/img/logo_evento-min.png";
			$img_logo_fatec="https://eventosfatec.dsicari.com.br/evento/img/logo_fatec_araras-min.png";

			$email = '<table    style="border: 0px solid #ffffff;">
						<tr>
							<td colspan="2" style="font-size: 28px;"><br>INSCRIÇÃO CANCELADA! </td>
						</tr>
						<tr>
							<td colspan="2"  style="font-size: 16px;"><br>Sua inscrição para '. $atividade[0]->nome .' durante a III Semana de Ciência e Tecnologia - Fatec Araras, foi cancelada.<br><br></td>
						</tr> 
						<tr>
							<td colspan="2">						
								<br><br>Acesse nosso <a href="https://eventosfatec.dsicari.com.br/site/" target="_blank">portal</a>, e conheça todos os eventos disponíveis.        
								<br>Fatec Araras - Rua Jarbas Leme Godoy, nº 875. Jd. José Ometto II. Araras/SP								
							</td>
						</tr>
				</table>';

			//$texto .=  "<img src= 'https://www.fatecararas.com.br/site/images/Logo-Araras.png'  style='max-width: 150px !important; width:150px; padding: 10px 10px 10px 10px; margin: 10px 10px 10px 10px'/><hr>";
			// $texto =  "<img width='50%' src=". base_url('evento/img/logo_evento-min.png') ." />";
			// $texto .= "Você cancelou sua inscrição em ". $atividade[0]->nome ."<br>";
			// $texto .= "Acesse nosso <a href='https://". base_url() ."' >portal</a>, temos muitos eventos para você participar!<br> ";
			// $texto .= "<hr><br>";
			// $texto .= "<img src= 'https://media.giphy.com/media/m9eG1qVjvN56H0MXt8/giphy.gif' width='20%' />";

			enviar_email($emailenviar, 'Fatec Araras :: Cancelamento de inscrição', $email);

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

	/* /inscricao/naocompareceu/{atividade}}/{pessoa} */
	public function naocompareceu(){

		$dados['atividade_id']  = $this->uri->segment(3); // VAI PEGAR DA URL SI
		$dados['pessoa_id']    = $this->uri->segment(4); // VAI PEGAR DA URL 20

		$rslt=$this->inscricao->naoCompareceu($dados);

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

	/* /inscricao/assinaturacertificado/{atividade}}/{pessoa} */
	public function assinaturacertificado(){

		$dados['atividade_id']  = $this->uri->segment(3);
		$dados['pessoa_id']    = $this->uri->segment(4);

		$rslt=$this->inscricao->getSignCertificado($dados);

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

	private function gerarcertificado($atividade_id, $pessoa_id){

		$dados['atividade_id']  = $atividade_id;
		$dados['pessoa_id']    = $pessoa_id;

		$rslt=$this->inscricao->gerarCertificado($dados);

		if($rslt['result']==FALSE){			
			redirect('/site/eventos', 'refresh');
			exit;
		}

		setlocale(LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese');
		date_default_timezone_set('America/Sao_Paulo');

        $nome_organizador   = $rslt['organizador']['nome'];
        $nome_pessoa        = ucwords(strtolower($rslt['participante']['nome']));
		$tipo_pessoa        = $rslt['participante']['tipo_pessoa'];
		$cpfcnpj			= $rslt['participante']['cpfcnpj'];
        $atividade          = $rslt['participante']['atividade'];
        $categoria          = $rslt['participante']['categoria'];
        $data               = date('d/m/Y', strtotime($rslt['participante']['data']));
        $carga_h            = $rslt['participante']['carga_horaria'];
		$evento             = $rslt['participante']['evento'];		
        //$local              = "Araras, São Paulo";
        //$r=GetSignCertificado($conn, $cpf_pessoa, $id_atividade);
        //Log2File("VerificaCertificado() sign_cert=".$r['sign_cert']);
        $sign_cert          = $rslt['participante']['sign_cert'];	
        $responsavel        = "Diretor Fatec";

        /*
        $nome_organizador   = "Faculdade de Tecnologia - Unidade Araras";
        $nome_pessoa        = "Danilo de Nadai Sicari";        
        $tipo_pessoa        = "ouvinte";
        $atividade          = "Segurança da Informação";
        $categoria          = "palestra";
        $data               = "29/05/2019";
        $carga_h            = "8";
        $evento             = "IV Semana da tecnologia"; 
        //$local              = "Araras, São Paulo";
        $sign_cert          = "19028378as9s08e128e08e112-90-asd9-9128e08e12-90-asd128e08e19-9128e08e12-90-asd9-9128e087";
        $responsavel        = "Diretor Fatec";
        */

        try
        {
            $texto1 = utf8_decode("A ".$nome_organizador." certifica que ");
            $texto2 = utf8_decode($nome_pessoa. " documento ". $cpfcnpj);
			$texto3 = utf8_decode("participou como ouvinte da ".$categoria.":");
			$texto4 = utf8_decode($atividade);
            $texto5 = utf8_decode("\nRealizado em ".$data." com carga horária total de ".$carga_h." horas");
			$texto6 = utf8_decode("durante o evento:\n");
			$texto7 = utf8_decode($evento);
            $texto8 = utf8_decode("\n\nAraras, 25 de outubro de 2019");
            $texto9 = utf8_decode("Assinatura digital: ".$sign_cert);

            $pdf = new FPDF();
			$pdf->AddPage('L');
			$pdf->SetDisplayMode("default");
			$pdf->Image('./assets/site/images/certificado/fundocertificado2.png',0,0,297);
            $pdf->SetLineWidth(1.0);
            $pdf->SetMargins(1,1);
            $pdf->SetXY(1,60); // vai para XY
            $pdf->SetFont('Arial', 'B', 30);  
            $pdf->Cell(0, 12, "CERTIFICADO",0,1,'C'); // 0-> vai para margem direita, 12: tamanho caixa, txt, 1: next str=next line, 1: border, C: center
            $pdf->SetXY(32,80);
            $pdf->SetFont('Arial', '', 14); 
            $pdf->Multicell(230, 8, $texto1.' '.$texto2.' '.$texto3.' '.$texto4.' '.$texto5.' '.$texto6.' '.$texto7.' '.$texto8, 0, 'C', false);
            // $pdf->Cell(0,8,$texto2,0,1,'C');
            // $pdf->Cell(0,8,$texto3,0,1,'C');
            // $pdf->Cell(0,8,$texto4,0,1,'C');
			// $pdf->Cell(0,8,$texto5,0,1,'C');
			// $pdf->Cell(0,8,$texto6,0,1,'C');
			// $pdf->Cell(0,8,$texto7,0,1,'C');
			// $pdf->Cell(0,8,$texto8,0,1,'C');

			// Assinatura digital
            $pdf->SetXY(1,68);    
            $pdf->SetLineWidth(0.8);
            $pdf->SetFont('Arial', '', 8);
			$pdf->Cell(0,12,$texto9,0,1,'C');
			
			/*
				SOMENTE QRCODE, SEM ASSINATURA
			*/

			//$pdf->Image(base_url().'inscricao/gerarqrcodecertificado/'. $sign_cert, 128, 140, 40, 40, 'png');


			/*
				3 ASSINATURAS + QRCODE
			*/

			// Diretor - Marco Prezotto
            $pdf->Image('./assets/site/images/certificado/assinatura_marcos.png',20,150,50);
            $pdf->SetXY(20,170);
            $pdf->SetLineWidth(1.0);
			$pdf->SetFont('Arial', '', 12);
			$pdf->Multicell(50, 10, 'Marco Prezotto', 0, 'C', false);
			$pdf->SetXY(20,175);
            $pdf->SetLineWidth(1.0);
            $pdf->SetFont('Arial', '', 10);
			$pdf->Multicell(50, 10, 'Diretor', 0, 'C', false);

			// Cordenadora Gestão Empresarial - Zenaide M. Gianini 
			$pdf->Image('./assets/site/images/certificado/assinatura_zenaide.png',90,150,50);
            $pdf->SetXY(90,170);
            $pdf->SetLineWidth(1.0);
			$pdf->SetFont('Arial', '', 12);
			$pdf->Multicell(50, 10, 'Zenaide M. Gianini', 0, 'C', false);
			$pdf->SetXY(80,175);
            $pdf->SetLineWidth(1.0);
            $pdf->SetFont('Arial', '', 10);
			$pdf->Multicell(70, 10, utf8_decode('Cordenadora Gestão Empresarial'), 0, 'C', false);

			// Cordenador Sistemas para Internet - Nilton C. Sacco
			$pdf->Image('./assets/site/images/certificado/assinatura_nilton.png',170,150,50);
            $pdf->SetXY(170,170);
            $pdf->SetLineWidth(1.0);
			$pdf->SetFont('Arial', '', 12);
			$pdf->Multicell(50, 10, 'Nilton C. Sacco', 0, 'C', false);
			$pdf->SetXY(160,175);
            $pdf->SetLineWidth(1.0);
            $pdf->SetFont('Arial', '', 10);
			$pdf->Multicell(70, 10, utf8_decode('Cordenador Sistemas para Internet'), 0, 'C', false);

			// QRCODE
			
			$pdf->Image(base_url().'inscricao/gerarqrcodecertificado/'. $sign_cert, 240, 150, 40, 40, 'png');

            

			$pdf->SetTitle("Certificado Fatec Araras");
            $pdf->Output(utf8_decode("Certificado-".$evento."-".$atividade."-".$nome_pessoa), "I" ); // I -> forca abrir na mesma pagina.
        }
        catch (Exception $e) 
        {
            echo 'Exceção capturada file=', $e->getFile(), ' linha=',  $e->getLine(), ' msg=', $e->getMessage(), "\n";
        } 
		
	}

	function gerarqrcode()
    {
		return QRcode::png($this->uri->segment(3));		
	}
	
	function gerarqrcodecertificado()
    {
		$link2qrcode = base_url() . 'inscricao/validarcertificado/' . $this->uri->segment(3);
		return QRcode::png($link2qrcode);		
	}
	
	/* /inscricao/assinaturacertificado/{atividade}}/{pessoa} */
	public function validarcertificado()
	{
		$dados['sign_cert']  = $this->uri->segment(3);
		
		$rslt=$this->inscricao->verificaCertificado($dados['sign_cert']);

		if($rslt['result']==true){
			self::gerarcertificado($rslt['atividade_id'], $rslt['pessoa_id']);
			exit;
		}
		else{
			//#FAC934
			redirect('/site/errocertificado', 'refresh');
			exit;
		}
		
	}



	public function confirmarinscricao()
	{
		// key -> id da tabela inscricao
		// value é o sim/nao que vem do painel admin
		$inscritos = $this->input->post('aprovado');
		//print_r($inscritos);
		//exit;
		foreach ($inscritos as $key => $value){
			if($value === "N"){
				// Se nao compareceu, somente fazer update no banco
				// STATUS -> 3 INSCRITO NAO COMPARECEU
				$status=3;
				$rslt=$this->inscricao->confirmarinscricao($key,$status);
			}else{
				$rslt=$this->inscricao->atividadePessoaFromInscricao($key);
				if($rslt['result']==true) $rslt2=self::confirmarpresenca($rslt['atividade_id'], $rslt['pessoa_id']);
			}		
		}

		http_response_code(200);
		echo json_encode(array('result' => true, 'message' => 'Concluído'));
		exit;

	}

	public function entradaevento()
	{
		$evento_id	= $this->uri->segment(2);
		$pessoa_id	= $this->uri->segment(3);
		$token	= $this->uri->segment(4);

		if($token != "310c77f27d6313bf3223e5ce03d61e0c"){
			http_response_code(200);
			echo json_encode(array("result" => false, "message" => "Acesso nao permitido"));
			exit;
		}

		$rslt=$this->inscricao->usuarioEntradaEvento($evento_id, $pessoa_id);

		http_response_code(200);
		echo json_encode($rslt);
		exit;

	}

	public function listapdf(){

		if (!$this->session->userdata('logado') || $this->session->userdata('tipo_acesso') == 'A') {
			header("location:" . base_url('admin'));
		}



		$atividade	= $this->uri->segment(3);

		$retorno   = $this->inscricao->retornaInscAtividades($atividade);

		// print_r($retorno);
		// exit;

		$pdf = new FPDF();
	
		$pdf->addPage('L');
		$pdf->SetDisplayMode(100, 'default');

		$pdf->SetFont('arial', 'B', 18);
		$pdf->Cell(0, 5, utf8_decode($retorno[0]->evento), 0, 1, 'C');

		$pdf->Ln(5);

		$pdf->SetFont('arial', 'B', 15);
		$pdf->Cell(0, 5, utf8_decode($retorno[0]->atividade), 0, 1, 'C');
	
		$pdf->Ln(8);
 


		$pdf->SetFont('Arial', 'B', 10);

		// largura padrão das colunas
		$largura =45;
		// altura padrão das linhas das colunas
		$altura = 6;

		// criando os cabeçalhos para 5 colunas

		$pdf->Cell(6, $altura, '', 1, 0, 'C');
		$pdf->Cell(95, $altura, 'Nome', 1, 0, 'C');
	//	$pdf->Cell(40, $altura, 'CPF', 1, 0, 'C');
		$pdf->Cell(95, $altura, 'Email', 1, 0, 'C');
		$pdf->Cell(85, $altura, 'Assinatura', 1, 0, 'C');

		// pulando a linha
		$pdf->Ln($altura);

		// tirando o negrito
		$pdf->SetFont('Arial', '', 8);

		// // montando a tabela com os dados (presumindo que a consulta já foi feita)
		$total = 1;
		foreach ($retorno as $dados) {
			$pdf->Cell(6, $altura, $total, 1, 0, 'C');
			$pdf->Cell(95, $altura, strtoupper(utf8_decode($dados->nome)), 1, 0, 'L');
		//	$pdf->Cell(40, $altura, $dados->cpfcnpj, 1, 0, 'L');
			$pdf->Cell(95, $altura, strtolower(utf8_decode($dados->email)), 1, 0, 'L');
			$pdf->Cell(85, $altura, "", 1, 0, 'C');
			$pdf->Ln($altura);
			$total++;
		}


		$pdf->Output("Atividade - ". utf8_decode($retorno[0]->atividade) , "I"); // I -> forca abrir na mesma pagina.

		
		exit;

	}


}
