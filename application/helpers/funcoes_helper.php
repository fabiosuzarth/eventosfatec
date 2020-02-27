<?php
if (!function_exists('verifica_login')) {
	//verifica se o usuário esta logado, caso não, redireciona para outra páqina
	function verifica_login($redirect = 'login'){
		$ci = & get_instance();
		if ($ci->session->userdata('logged') != TRUE) {
			//set_msg('Acesso Restrito! Faça login para continuar');
			redirect($redirect, 'refresh');
		}
	}
}
if (!function_exists('verifica_login_sup')) {
	//verifica se o usuário esta logado, caso não, redireciona para outra páqina
	function verifica_login_sup($redirect = 'admin/login'){
		$ci = & get_instance();
		if ($ci->session->userdata('suplogged') != TRUE) {
			//set_msg('Acesso Restrito! Faça login para continuar');
			redirect($redirect, 'refresh');
		}
	}
}
if (!function_exists('verificaPermissaoUsu')) {
	function verificaPermissaoUsu($tabela, $acao, $redirect = 'home'){
		
		$ci 		= & get_instance();
		$permissao 	= strval($acao.$tabela);
		$permissao 	= $ci->session->userdata('permissao')->$permissao;
		
		if ($permissao == 'S') {
			return TRUE;
		} else {
			redirect($redirect, 'refresh');
		}
	}
}
if (!function_exists('set_time_location')) {
	function set_time_location(){
	    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	    date_default_timezone_set('America/Sao_Paulo');
	}
}
if (!function_exists('verificaIP')) {
	function verificaIP(){
		$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);

		if($host==''){
			$ip = $_SERVER['REMOTE_ADDR']; 
		}else{
			$ip = $_SERVER['REMOTE_ADDR'].' / '.$host;
		}

		return $ip;
	}
}
if (!function_exists('retornaBrowser')) {
	function retornaBrowser(){
		$useragent = $_SERVER['HTTP_USER_AGENT'];

		if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
			$browser_version=$matched[1];
			$browser = 'IE';
		} elseif (preg_match( '|Opera/([0-9].[0-9]{1,2})|',$useragent,$matched)) {
			$browser_version=$matched[1];
			$browser = 'Opera';
		} elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {
			$browser_version=$matched[1];
			$browser = 'Firefox';
		} elseif(preg_match('|Chrome/([0-9\.]+)|',$useragent,$matched)) {
			$browser_version=$matched[1];
			$browser = 'Chrome';
		} elseif(preg_match('|Safari/([0-9\.]+)|',$useragent,$matched)) {
			$browser_version=$matched[1];
			$browser = 'Safari';
		} else {
			// browser not recognized!
			$browser_version = 0;
			$browser= 'Outro';
		}

		return $browser.' - '.$browser_version;
	}
}
if (!function_exists('data_bd')) {
	function data_bd($data_br){
	  return implode('-',array_reverse(explode('/',$data_br)));
	}
}
if (!function_exists('data_br')) {
	function data_br($data_bd){
	  return implode('/',array_reverse(explode('-',$data_bd)));
	}
}
if (!function_exists('data_br_cad')) {
	function data_br_cad($data_bd){
		$data_bd = date('Y-m-d', strtotime($data_bd));
		return implode('/',array_reverse(explode('-',$data_bd)));
	}
}
if (!function_exists('formataValor')) {
	function formataValor($valor){
		$novo_valor = str_replace("_", "", $valor);
		$novo_valor = str_replace(".", "", $novo_valor);
		$novo_valor = str_replace(",", ".", $novo_valor);
		$novo_valor = str_replace("R$", "", $novo_valor);

		return $novo_valor;
	}
}
if (!function_exists('verificaEspecie')) {
	function verificaEspecie($especie){
		switch ($especie) {
			case 'P':
				$retorno = TRUE;
				break;
			case 'M':
				$retorno = TRUE;
				break;
			case 'S':
				$retorno = TRUE;
				break;
			case 'V':
				$retorno = TRUE;
				break;
			case 'I':
				$retorno = TRUE;
				break;
			case 'A':
				$retorno = TRUE;
				break;
			default:
				$retorno = FALSE;
				break;
		}
		return $retorno;
	}
}
if (!function_exists('ApagaDir')) {
	function ApagaDir($dir){
	  if($objs = glob($dir."/*")){
	    foreach($objs as $obj) {
	      is_dir($obj)? ApagaDir($obj) : unlink($obj);
	    }
	  }
	  rmdir($dir);
	  mkdir($dir, 0777, true);
	}
}
if (!function_exists('formata_valor_bd')) {
	function formata_valor_bd($num){
	    $dotPos 	= strrpos($num, '.');
	    $commaPos 	= strrpos($num, ',');
	    $sep 		= (($dotPos > $commaPos) && $dotPos) ? $dotPos : 
        ((($commaPos > $dotPos) && $commaPos) ? $commaPos : false);
	   
	    if (!$sep) {
	        return floatval(preg_replace("/[^0-9]/", "", $num));
	    } 

	    return floatval(
	        preg_replace("/[^0-9]/", "", substr($num, 0, $sep)) . '.' .
	        preg_replace("/[^0-9]/", "", substr($num, $sep+1, strlen($num)))
	    );
	}
}
if (!function_exists('formata_valor_br')) {
	function formata_valor_br($valor){
		if (!empty($valor)) {
			$novo_valor = str_replace('.', ',', $valor);
			$novo_valor = number_format($novo_valor, 2);
		} else {
			$novo_valor = $valor;
		}

		return $novo_valor;
	}
}
if (!function_exists('img_reduce')) {
	function img_reduce($targetFile, $targetFolder, $img){
		$imgsize = getimagesize($targetFile);
		switch(strtolower(substr($targetFile, -3))){
		    case "jpg":
		        $image = imagecreatefromjpeg($targetFile);    
		    break;
			  case "jpeg":
		        $image = imagecreatefromjpeg($targetFile);    
		    break;
		    case "png":
		        $image = imagecreatefrompng($targetFile);
		    break;
		    case "gif":
		        $image = imagecreatefromgif($targetFile);
		    break;
			 case "JPG":
		        $image = imagecreatefromjpeg($targetFile);
		    break;
		    default:
		        exit;
		    break;
		}

		$width = 246;    
		$height = $imgsize[1]/$imgsize[0]*$width; 

		$src_w = $imgsize[0];
		$src_h = $imgsize[1];
		    

		$picture = imagecreatetruecolor($width, $height);
		imagealphablending($picture, false);
		imagesavealpha($picture, true);
		$bool = imagecopyresampled($picture, $image, 0, 0, 0, 0, $width, $height, $src_w, $src_h); 

		if($bool){
		    switch(strtolower(substr($targetFile, -3))){
		        case "jpg":
		            @header("Content-Type: image/jpeg");
		            $bool2 = imagejpeg($picture,$targetFolder.$img,40);
		        break;
				case "jpeg":
		            @header("Content-Type: image/jpeg");
		            $bool2 = imagejpeg($picture,$targetFolder.$img,40);
		        break;
		        case "png":
		            @header("Content-Type: image/png");
		            imagepng($picture,$targetFolder.$img);
		        break;
		        case "gif":
		            @header("Content-Type: image/gif");
		            imagegif($picture,$targetFolder.$img);
		        break;
				 case "JPG":
		            @header("Content-Type: image/jpeg");
		            $bool2 = imagejpeg($picture,$targetFolder.$img,60);
		        break;
		    }
		}
		imagedestroy($picture);
	}
}
if (!function_exists('url_amigavel')) {
	function url_amigavel($final) {
		$final = str_replace("’", "-", $final);
		$final = str_replace("?", "-", $final);
		$final = str_replace("!", "-", $final);
		$final = str_replace(".", "-", $final);
		$final = str_replace("/", "", $final);
		$final = str_replace("#", "-", $final);
		$final = str_replace("@", "-", $final);
		$final = str_replace(":", "", $final);
		$final = str_replace(" ", "-", $final);
		$final = str_replace("&", "e", $final);
		$final = str_replace(",", "", $final);
		$final = str_replace(";", "", $final);
			
		$final = str_replace("&aacute;", "a", $final);
		$final = str_replace("&eacute;", "e", $final);
		$final = str_replace("&iacute;", "i", $final);
		$final = str_replace("&oacute;", "o", $final);
		$final = str_replace("&uacute;", "u", $final);

		$final = str_replace("&acirc;", "a", $final);
		$final = str_replace("&ecirc;", "e", $final);
		$final = str_replace("&icirc;", "i", $final);
		$final = str_replace("&ocirc;", "o", $final);
		$final = str_replace("&ucirc;", "o", $final);

		$final = str_replace("&atilde;", "a", $final);
		$final = str_replace("&otilde;", "o", $final);
		$final = str_replace("&ntilde;", "n", $final);

		$final = str_replace("&agrave;", "a", $final);		
		$final = str_replace("&egrave;", "e", $final);
		$final = str_replace("&igrave;", "i", $final);
		$final = str_replace("&ograve;", "o", $final);
		$final = str_replace("&ugrave;", "u", $final);

		$final = str_replace("&ccedil;", "c", $final);

		$final = str_replace("&auml;", "a", $final);		
		$final = str_replace("&euml;", "e", $final);		
		$final = str_replace("&iuml;", "i", $final);		
		$final = str_replace("&ouml;", "o", $final);		
		$final = str_replace("&uuml;", "u", $final);

		$final = str_replace("á", "a", $final);
		$final = str_replace("à", "a", $final);
		$final = str_replace("â", "a", $final);
		$final = str_replace("ä", "a", $final);
		$final = str_replace("ã", "a", $final);

		$final = str_replace("é", "e", $final);
		$final = str_replace("è", "e", $final);
		$final = str_replace("ê", "e", $final);
		$final = str_replace("ë", "e", $final);

		$final = str_replace("í", "i", $final);
		$final = str_replace("ì", "i", $final);
		$final = str_replace("î", "i", $final);
		$final = str_replace("ï", "i", $final);

		$final = str_replace("ó", "o", $final);
		$final = str_replace("ò", "o", $final);
		$final = str_replace("ô", "o", $final);
		$final = str_replace("ö", "o", $final);
		$final = str_replace("õ", "o", $final);

		$final = str_replace("ú", "u", $final);
		$final = str_replace("ù", "u", $final);
		$final = str_replace("û", "u", $final);
		$final = str_replace("ü", "u", $final);


		$final = str_replace("Á", "A", $final);
		$final = str_replace("À", "A", $final);
		$final = str_replace("Â", "A", $final);
		$final = str_replace("Ã", "A", $final);
		$final = str_replace("Ä", "A", $final);

		$final = str_replace("É", "E", $final);
		$final = str_replace("È", "E", $final);
		$final = str_replace("Ê", "E", $final);
		$final = str_replace("Ë", "E", $final);

		$final = str_replace("Í", "I", $final);
		$final = str_replace("Ì", "I", $final);
		$final = str_replace("Î", "I", $final);
		$final = str_replace("Ï", "I", $final);

		$final = str_replace("Ó", "O", $final);
		$final = str_replace("Ò", "O", $final);
		$final = str_replace("Ô", "O", $final);
		$final = str_replace("Õ", "O", $final);
		$final = str_replace("Ö", "O", $final);

		$final = str_replace("Ú", "U", $final);
		$final = str_replace("Ù", "U", $final);
		$final = str_replace("Û", "U", $final);
		$final = str_replace("Ü", "U", $final);

		$final = str_replace("ç", "c", $final);
		$final = str_replace("ñ", "n", $final);

		$final = str_replace("Ç", "C", $final);
		$final = str_replace("Ñ", "N", $final);

		$final = strtolower($final);
		$final = preg_replace("/[^a-z0-9_\s-]/", "", $final);
		$final = preg_replace("/[^a-z0-9_\s-]/", "", $final);
		$final = preg_replace("/[\s-]+/", " ", $final);
		$final = preg_replace("/[\s_]/", "-", $final);

		return $final;
	}
}
if (!function_exists('toFloat')) {
	function toFloat($num) {
	    $dotPos 	= strrpos($num, '.');
	    $commaPos 	= strrpos($num, ',');
	    $sep 		= (($dotPos > $commaPos) && $dotPos) ? $dotPos : 
	        ((($commaPos > $dotPos) && $commaPos) ? $commaPos : false);
	   
	    if (!$sep) {
	        return floatval(preg_replace("/[^0-9]/", "", $num));
	    } 

	    return floatval(
	        preg_replace("/[^0-9]/", "", substr($num, 0, $sep)) . '.' .
	        preg_replace("/[^0-9]/", "", substr($num, $sep+1, strlen($num)))
	    );
	}
}
if (!function_exists('retornaNomeProcesso')) {
	function retornaNomeProcesso($cTipProcesso){
		switch($cTipProcesso){
			case 'V':
				$nomeProc = 'Venda';
				break;
			case 'O':
				$nomeProc = 'Orçamento';
				break;
			case 'PV':
				$nomeProc = 'Pedido de Venda';
				break;
			case 'C':
				$nomeProc = 'Cotação de Venda';
				break;
			default:
				$nomeProc = 'Processo';
				break;
		}
		return $nomeProc;
	}
}
if (!function_exists('getDadosProcesso')) {
	function getDadosProcesso($cTipProcesso){
		$ci = & get_instance();
		switch ($cTipProcesso) {
			case 'V':
				$dados['cTipProcesso'] 	= 'V';
				$dados['cTipMov'] 		= 'S';
				$dados['nomePermissao'] = 'Venda';
				$dados['vPermissao'] 	= 'vVenda';
				$dados['cPermissao'] 	= 'cVenda';
				$dados['ePermissao'] 	= 'eVenda';
				$dados['dPermissao'] 	= 'dVenda';
				$dados['movEstoque'] 	= $ci->session->userdata('configuracoes')->cVmovest;
				$dados['geraFinanc'] 	= $ci->session->userdata('configuracoes')->cVarqrec;
				break;
			case 'O':
				$dados['cTipProcesso'] 	= 'O';
				$dados['cTipMov'] 		= 'S';
				$dados['nomePermissao'] = 'Orcamento';
				$dados['vPermissao'] 	= 'vOrcamento';
				$dados['cPermissao'] 	= 'cOrcamento';
				$dados['ePermissao'] 	= 'eOrcamento';
				$dados['dPermissao'] 	= 'dOrcamento';
				$dados['movEstoque'] 	= $ci->session->userdata('configuracoes')->cOmovest;
				$dados['geraFinanc'] 	= $ci->session->userdata('configuracoes')->cOarqrec;
				break;
			case 'C':
				$dados['cTipProcesso'] 	= 'C';
				$dados['cTipMov'] 		= 'S';
				$dados['nomePermissao'] = 'Cotacao';
				$dados['vPermissao'] 	= 'vCotacao';
				$dados['cPermissao'] 	= 'cCotacao';
				$dados['ePermissao'] 	= 'eCotacao';
				$dados['dPermissao'] 	= 'dCotacao';
				$dados['movEstoque'] 	= $ci->session->userdata('configuracoes')->cCmovest;
				$dados['geraFinanc'] 	= $ci->session->userdata('configuracoes')->cCarqrec;
				break;
			case 'PV':
				$dados['cTipProcesso'] 	= 'PV';
				$dados['cTipMov'] 		= 'S';
				$dados['nomePermissao'] = 'Pedvenda';
				$dados['vPermissao'] 	= 'vPedvenda';
				$dados['cPermissao'] 	= 'cPedvenda';
				$dados['ePermissao'] 	= 'ePedvenda';
				$dados['dPermissao'] 	= 'dPedvenda';
				$dados['movEstoque'] 	= $ci->session->userdata('configuracoes')->cPVmovest;
				$dados['geraFinanc'] 	= $ci->session->userdata('configuracoes')->cPVarqrec;
				break;
			default:
				$dados['cTipProcesso'] 	= 'A';
				$dados['cTipMov'] 		= 'S';
				$dados['nomePermissao'] = 'Prevenda';
				$dados['vPermissao'] 	= 'vPrevenda';
				$dados['cPermissao'] 	= 'cPrevenda';
				$dados['ePermissao'] 	= 'ePrevenda';
				$dados['dPermissao'] 	= 'dPrevenda';
				$dados['movEstoque'] 	= 'N';
				$dados['geraFinanc'] 	= 'N';
				break;
		}
		return $dados;
	}
}
if (!function_exists('nomeTabelaPermissao')){
	function nomeTabelaPermissao($cTipProcesso){
		switch ($cTipProcesso) {
			case 'V':
				$nome = 'Venda';
				break;
			case 'O':
				$nome = 'Orcamento';
				break;
			case 'C':
				$nome = 'Cotacaov';
				break;
			case 'PV':
				$nome = 'Pedvenda';
				break;
			default:
				$nome = 'PreVenda';
				break;
		}
		return $nome;
	}
}
if (!function_exists('dadosEstoqueTipo')) {
	function dadosEstoqueTipo($cTipEst){
		switch ($cTipEst) {
			case 'ENT':
				$dados['cTipEst'] 		= 'ENT';
				$dados['cTipMov'] 		= 'E';
				$dados['nomePermissao'] = 'EntradaEst';
				$dados['vPermissao'] 	= 'vEntradaEst';
				$dados['cPermissao'] 	= 'cEntradaEst';
				$dados['ePermissao'] 	= 'eEntradaEst';
				$dados['dPermissao'] 	= 'dEntradaEst';
				$dados['Breadcumb'] 	= 'Entradas de Estoque';
				$dados['Titulo'] 		= 'Entrada de Estoque';
				break;
			case 'AJU':
				$dados['cTipEst'] 		= 'AJU';
				$dados['cTipMov'] 		= 'A';
				$dados['nomePermissao'] = 'AjusteEst';
				$dados['vPermissao'] 	= 'vAjusteEst';
				$dados['cPermissao'] 	= 'cAjusteEst';
				$dados['ePermissao'] 	= 'eAjusteEst';
				$dados['dPermissao'] 	= 'dAjusteEst';
				$dados['Breadcumb'] 	= 'Ajustes de Estoque';
				$dados['Titulo'] 		= 'Ajuste de Estoque';
				break;
			case 'SAI':
				$dados['cTipEst'] 		= 'SAI';
				$dados['cTipMov'] 		= 'S';
				$dados['nomePermissao'] = 'SaidaEst';
				$dados['vPermissao'] 	= 'vSaidaEst';
				$dados['cPermissao'] 	= 'cSaidaEst';
				$dados['ePermissao'] 	= 'eSaidaEst';
				$dados['dPermissao'] 	= 'dSaidaEst';
				$dados['Breadcumb'] 	= 'Saidas de Estoque';
				$dados['Titulo'] 		= 'Saida de Estoque';
				break;
			case 'PDC':
				$dados['cTipEst'] 		= 'PDC';
				$dados['cTipMov'] 		= 'N';
				$dados['nomePermissao'] = 'PedCompra';
				$dados['vPermissao'] 	= 'vPedCompra';
				$dados['cPermissao'] 	= 'cPedCompra';
				$dados['ePermissao'] 	= 'ePedCompra';
				$dados['dPermissao'] 	= 'dPedCompra';
				$dados['Breadcumb'] 	= 'Pedidos de Compra';
				$dados['Titulo'] 		= 'Pedido de Compra';
				break;
			case 'FEC':
				$dados['cTipEst'] 		= 'FEC';
				$dados['cTipMov'] 		= 'N';
				$dados['nomePermissao'] = 'FechEstoque';
				$dados['vPermissao'] 	= 'vFechEstoque';
				$dados['cPermissao'] 	= 'cFechEstoque';
				$dados['ePermissao'] 	= 'eFechEstoque';
				$dados['dPermissao'] 	= 'dFechEstoque';
				$dados['Breadcumb'] 	= 'Fechamentos de Estoque';
				$dados['Titulo'] 		= 'Fechamento de Estoque';
				break;
			default:
				$dados['cTipEst'] 		= 'PDC';
				$dados['cTipMov'] 		= 'N';
				$dados['nomePermissao'] = 'PedCompra';
				$dados['vPermissao'] 	= 'vPedCompra';
				$dados['cPermissao'] 	= 'cPedCompra';
				$dados['ePermissao'] 	= 'ePedCompra';
				$dados['dPermissao'] 	= 'dPedCompra';
				$dados['Breadcumb'] 	= 'Pedidos de Compra';
				$dados['Titulo'] 		= 'Pedido de Compra';
				break;
		}
		return $dados;
	}
}
if (!function_exists('dadosCadproEspecie')) {
	function dadosCadproEspecie($cEspecie){
		switch ($cEspecie) {
			case 'P':
				$dados['nomePermissao'] = 'Cadprod';
				$dados['vPermissao'] 	= 'vCadprod';
				$dados['cPermissao'] 	= 'cCadprod';
				$dados['ePermissao'] 	= 'eCadprod';
				$dados['dPermissao'] 	= 'dCadprod';
				$dados['Breadcumb'] 	= 'Produtos';
				$dados['Titulo'] 		= 'Produto';
				break;
			case 'M':
				$dados['nomePermissao'] = 'Cadmat';
				$dados['vPermissao'] 	= 'vCadmat';
				$dados['cPermissao'] 	= 'cCadmat';
				$dados['ePermissao'] 	= 'eCadmat';
				$dados['dPermissao'] 	= 'dCadmat';
				$dados['Breadcumb'] 	= 'Matérias-Primas';
				$dados['Titulo'] 		= 'Matéria-Prima';
				break;
			case 'S':
				$dados['nomePermissao'] = 'Cadsubprod';
				$dados['vPermissao'] 	= 'vCadsubprod';
				$dados['cPermissao'] 	= 'cCadsubprod';
				$dados['ePermissao'] 	= 'eCadsubprod';
				$dados['dPermissao'] 	= 'dCadsubprod';
				$dados['Breadcumb'] 	= 'SubProdutos';
				$dados['Titulo'] 		= 'SubProduto';
				break;
			case 'I':
				$dados['nomePermissao'] = 'Cadmatint';
				$dados['vPermissao'] 	= 'vCadmatint';
				$dados['cPermissao'] 	= 'cCadmatint';
				$dados['ePermissao'] 	= 'eCadmatint';
				$dados['dPermissao'] 	= 'dCadmatint';
				$dados['Breadcumb'] 	= 'Materiais Internos';
				$dados['Titulo'] 		= 'Material Interno';
				break;
			case 'A':
				$dados['nomePermissao'] = 'Cadatfix';
				$dados['vPermissao'] 	= 'vCadatfix';
				$dados['cPermissao'] 	= 'cCadatfix';
				$dados['ePermissao'] 	= 'eCadatfix';
				$dados['dPermissao'] 	= 'dCadatfix';
				$dados['Breadcumb'] 	= 'Ativos Fixos';
				$dados['Titulo'] 		= 'Ativo Fixo';
				break;
			case 'V':
				$dados['nomePermissao'] = 'Cadserv';
				$dados['vPermissao'] 	= 'vCadserv';
				$dados['cPermissao'] 	= 'cCadserv';
				$dados['ePermissao'] 	= 'eCadserv';
				$dados['dPermissao'] 	= 'dCadserv';
				$dados['Breadcumb'] 	= 'Serviços';
				$dados['Titulo'] 		= 'Serviço';
				break;
			default:
				# code...
				break;
		}
		return $dados;
	}
}
if (!function_exists('registraLog')) {
	function registraLog($logAcao, $logTabela, $logRegistro){
		$ci = & get_instance();
		$dados_log['logAcao'] 		= $logAcao;
		$dados_log['logTabela'] 	= $logTabela;
		$dados_log['logRegistro'] 	= $logRegistro;
		
		$ci->cadlog->inserir($dados_log);
	}
}
if (!function_exists('getCompetencia')) {
	function getCompetencia($mes = '-1 month'){
		$dateCompetencia 	= new DateTime();
		$dateCompetencia 	= $dateCompetencia->setDate(date('Y'), date('m'), 01);
		$dateCompetencia 	= $dateCompetencia->format('d-m-Y');
		$cCompetencia 		= date('m/Y', strtotime($mes, strtotime($dateCompetencia)));

		return $cCompetencia;
	}
}
if (!function_exists('verificaTipMov')) {
	function verificaTipMov($qQtdAtual, $qQtdOriginal, $cTipMov){
		if ($qQtdAtual > $qQtdOriginal) {
			if($cTipMov == 'E'){
				//Soma a diferença
				$cTipMovest = 'E';
			}else{
				//Subtrai a diferença
				$cTipMovest = 'S';
			}	
		}else{
			//O valor é menor que o valor original
			if ($cTipMov == 'E') {
				//Subtrai a diferença
				$cTipMovest = 'S';
			} else {
				//Soma a diferença
				$cTipMovest = 'E';
			}
		}
		return $cTipMovest;
	}
}
if (!function_exists('verificaFechamento')) {
	function verificaFechamento($icodemp, $cCompetencia){
		$ci 		= & get_instance();
		$verifica 	= $ci->movsaldo->verificaFechamentoCompetencia($icodemp, $cCompetencia);

		if($ci->cadpro->countCadpro($icodemp) > 0){
			if ($verifica->totalcadpro > 0) {
				if($verifica->totalcadpro == $verifica->totaldetmovsaldo){
					$retorno = 'nao_precisa';
				}else{
					$retorno = 'precisa';
				}
			}else{
				$retorno = 'precisa';
			}
		}else{
			$retorno = 'nao_precisa';
		}

		return $retorno;
	}
}



function limitar_texto($texto,$limit){
	$texto = strip_tags($texto);
	if(strlen($texto) > $limit){
		return substr($texto,0,$limit).'...';
	} else {
	 return substr($texto,0,$limit);
	}
}





	/**
* enviar_email
*
* Faz o envio de e-mail
*
*
* @param	string, string, string/array
* @return	boolean
*/
function enviar_email($destinatarios,$assunto,$corpo){

	$CI =& get_instance();
  
	$config = array(
	  'protocol' => 'smtp',
	  'smtp_host' => 'ssl://mail.fatecararas.com.br',
	  'smtp_port' => 465,
	  'smtp_user' => 'eventos@fatecararas.com.br',
	  'smtp_pass' => 'Ev@Fatec@2019',
	  'mailtype'  => 'html'
	//  'charset'   => 'iso-8859-1'
	);
  
	$CI->load->library('email', $config);
	$CI->email->set_newline("\r\n");
  
	$CI->email->from('eventos@fatecararas.com.br', 'Eventos FATEC Araras');
	$CI->email->subject($assunto);
	$CI->email->message($corpo);
  
	$CI->email->to($destinatarios);
  
	return $CI->email->send();
  
  }
  
  
  




