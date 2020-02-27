<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validapessoa extends CI_Controller {


	public function __construct(){
		include APPPATH . 'third_party/qrcode/phpqrcode/qrlib.php';
		include APPPATH . 'third_party/pdf/fpdf.php';
		parent::__construct();
		$this->load->helper('url');
	   	$this->load->model('Validapessoa_model', 'validapessoa');		
	}

	/* confirmarpresenca/{atividade}}/{pessoa} */
	public function confirmarpresenca(){

		/**********************************************************************
		 * CADA SEGMENTO DA URL É PASSADO ABAIXO 
		 * EX; http://localhost/eventosfatec/valida/si/20
		 * se precisar colocar mais coisas na URL 
		 * temos que colocar na Rota
		 * que fica em application/config/routes.php
		 * $route['valida/(:any)/(:any)'] = 'validapessoa/valida/$1/$1';
		 * adiciona o (:any) e coloca mais $1
		 * e coloca no segment()
		***********************************************************************/
		
		$dados['atividade_id']  = $this->uri->segment(2); // VAI PEGAR DA URL SI
		$dados['pessoa_id']    = $this->uri->segment(3); // VAI PEGAR DA URL 20

		$rslt=$this->validapessoa->confirmarPresenca($dados);

		if($rslt['rslt']==TRUE){
			http_response_code(200);
			echo json_encode($rslt);
			exit;
		}
		else{
			http_response_code(404);
			echo json_encode($rslt);
			exit;
		}	

		/** DAR INSERT NO BANCO */
		/*
		if($this->validapessoa->inserir($dados)){
			echo('OK');
		}
		else{
			echo('FAILS');
		}
		*/
		
	}

	public function cancelarinscricao(){

		$dados['atividade_id']  = $this->uri->segment(2); // VAI PEGAR DA URL SI
		$dados['pessoa_id']    = $this->uri->segment(3); // VAI PEGAR DA URL 20

		$rslt=$this->validapessoa->cancelarInscricao($dados);

		if($rslt['rslt']==TRUE){
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

	public function naocompareceu(){

		$dados['atividade_id']  = $this->uri->segment(2); // VAI PEGAR DA URL SI
		$dados['pessoa_id']    = $this->uri->segment(3); // VAI PEGAR DA URL 20

		$rslt=$this->validapessoa->naoCompareceu($dados);

		if($rslt['rslt']==TRUE){
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

	public function assinaturacertificado(){

		$dados['atividade_id']  = $this->uri->segment(2); // VAI PEGAR DA URL SI
		$dados['pessoa_id']    = $this->uri->segment(3); // VAI PEGAR DA URL 20

		$rslt=$this->validapessoa->getSignCertificado($dados);

		if($rslt['rslt']==TRUE){
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

		$rslt=$this->validapessoa->gerarCertificado($dados);

		if($rslt['result']==FALSE){			
			redirect('/site/eventos', 'refresh');
			exit;
		}

		setlocale(LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese');
		date_default_timezone_set('America/Sao_Paulo');

        $nome_organizador   = $rslt['organizador']['nome'];
        $nome_pessoa        = $rslt['participante']['nome'];
        $tipo_pessoa        = $rslt['participante']['tipo_pessoa'];
        $atividade          = $rslt['participante']['atividade'];
        $categoria          = $rslt['participante']['categoria'];
        $data               = $rslt['participante']['data'];
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
            $texto2 = utf8_decode($nome_pessoa);
            $texto3 = utf8_decode("participou como ".$tipo_pessoa." da ".$categoria.": ".$atividade);
            $texto4 = utf8_decode("realizado em ".$data." com carga horária total de ".$carga_h." horas");
            $texto5 = utf8_decode("durante o evento: ".$evento);
            //$texto6 = utf8_decode("na cidade de ".$local);
            $texto7 = utf8_decode("Assinatura digital: ".$sign_cert);

            $pdf = new FPDF();
			$pdf->AddPage('L');
			$pdf->SetDisplayMode("default");
			$pdf->Image('./assets/images/certificado/certificado.png',0,0,297);
            $pdf->SetLineWidth(1.0);
            $pdf->SetMargins(1,1);
            $pdf->SetXY(10,60); // vai para XY
            $pdf->SetFont('Arial', 'B', 40);  
            $pdf->Cell(0, 12, "CERTIFICADO",0,1,'C'); // 0-> vai para margem direita, 12: tamanho caixa, txt, 1: next str=next line, 1: border, C: center
            $pdf->SetXY(10,90);
            $pdf->SetFont('Arial', '', 20); 
            $pdf->Cell(0,12,$texto1,0,1,'C');
            $pdf->Cell(0,12,$texto2,0,1,'C');
            $pdf->Cell(0,12,$texto3,0,1,'C');
            $pdf->Cell(0,12,$texto4,0,1,'C');
            $pdf->Cell(0,12,$texto5,0,1,'C');
            //$pdf->Cell(0,12,$texto6,0,1,'C');

            $pdf->SetXY(10,68);    
            $pdf->SetLineWidth(0.8);
            $pdf->SetFont('Arial', '', 8);
            $pdf->Cell(0,12,$texto7,0,1,'C');

            $pdf->Image('./assets/images/certificado/assinatura.png',130,155,50);

            $pdf->SetXY(10,175);
            $pdf->SetLineWidth(1.0);
            $pdf->SetFont('Arial', '', 15);
            $pdf->Cell(0,12,$responsavel,0,1,'C');

            $pdf->Image(base_url().'gerarqrcodecertificado/'. $sign_cert, 250, 160, 40, 40, 'png');

            $pdf->Output("Certificado-".$evento."-".$atividade."-".$nome_pessoa, "I" ); // I -> forca abrir na mesma pagina.
        }
        catch (Exception $e) 
        {
            echo 'Exceção capturada file=', $e->getFile(), ' linha=',  $e->getLine(), ' msg=', $e->getMessage(), "\n";
        } 
		
	}

	function gerarqrcode()
    {
		return QRcode::png($this->uri->segment(2));		
	}
	
	function gerarqrcodecertificado()
    {
		$link2qrcode = base_url() . 'validarcertificado/' . $this->uri->segment(2);
		return QRcode::png($link2qrcode);		
	}
	
	function validarcertificado()
	{
		$dados['sign_cert']  = $this->uri->segment(2);
		
		$rslt=$this->validapessoa->verificaCertificado($dados['sign_cert']);

		if($rslt['result']==true){
			self::gerarcertificado($rslt['atividade_id'], $rslt['pessoa_id']);
			exit;
		}
		else{
			redirect('/site/eventos', 'refresh');
			exit;
		}
		
	}
	
}
