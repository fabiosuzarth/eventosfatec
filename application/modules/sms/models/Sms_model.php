<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    
    
    class Sms_model extends CI_Model {
    
    protected $SMS_LOGIN = 'denadai';
    protected $SMS_TOKEN = '310c77f27d6313bf3223e5ce03d61e0c'; 

    public function __construct(){
        parent::__construct();
    }

    public function enviarSms($dados){
        $login = $this->SMS_LOGIN; 
        $token = $this->SMS_TOKEN;
        $numero = $dados['numero'];
        $msg = urlencode($dados['mensagem']);
        
        $send = file_get_contents("http://sms.kingtelecom.com.br/kingsms/api.php?acao=sendsms&login=$login&token=$token&numero=$numero&msg=$msg"); 
        
        $query=$this->db->query("insert into sms(numero, msg, ret_sendsms, datahora_send) values('".$numero."', '".$msg."', '".$send."', CURRENT_TIMESTAMP())");

        if($this->db->affected_rows() > 0){   
            return array('result' => true, 'enviarSms() OK');
        }
        else{
            return array('result' => false, 'message' => 'enviarSms() banco falhou');
        }
    }

    public function statusSms($dados){
        // TODO
    }

    public function consultarSaldo($dados){
        // TODO
    }
  
}