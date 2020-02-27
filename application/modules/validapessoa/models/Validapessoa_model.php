<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validapessoa_model extends CI_Model {

    protected $table_valida_user = 'valida_user';
    
    /* STATUS INSCRICAO */
    protected $INSCRITO = 1;
    protected $INSCRITO_COMPARECEU = 2;
    protected $INSCRITO_NAO_COMPARECEU = 3;
    protected $INSCRITO_DURANTE_EVENTO = 4;
    protected $INSCRITO_CANCELADO = 5;
    protected $NAO_INSCRITO_COMPARECEU = 6;

    /* TIPO PESSOA*/
    protected $ALUNO = 1;
    protected $EX_ALUNO = 2;
    protected $PROFESSOR = 3;
    protected $VISITANTE = 4;
    protected $ADMINISTRADOR = 5;
    protected $ORGANIZADOR = 6; 
    protected $PALESTRANTE = 7; 

    public function __construct(){
        parent::__construct();
    }    

  /*************************************************************************
     * @param $dados
     * @return boolean
     ************************************************************************/
    /*public function inserir($dados)
    {
        $atividade_id  = $dados['atividade_id'];
        $usuario_id    = $dados['usuario_id'];

        if ($this->db->insert('valida_usuario', $dados)) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }


    public function atualizar($dados)
    {
        $usuario    = $dados['pessoa_id'];
        $atividade  = $dados['atividade_id'];

        $this->db->set('status', 2);
        $this->db->where('pessoa_id', $usuario);
        $this->db->where('atividade_id', $atividade);
        $this->db->update('inscricao');

        if ($this->db->affected_rows() >= 0) {
            return true;
        } else {
            return false;
        }
    }*/

    function confirmarPresenca($dados)
    {      
        $atividade_id  = $dados['atividade_id'];
        $usuario_id    = $dados['pessoa_id'];        
        $validar=false;
        $cpfcnpj="";

        $query=$this->db->query("SELECT i.status_id,
                                        p.cpfcnpj 
                                FROM inscricao i
                                INNER JOIN pessoa p ON i.pessoa_id=p.id
                                WHERE i.pessoa_id=" . $usuario_id . " AND i.atividade_id=" . $atividade_id);

        if ($query->num_rows() > 0){
            $row = $query->row();
            if($row->status_id != $this->INSCRITO_COMPARECEU){
                $validar=true;
                $cpfcnpj=$row->cpfcnpj;
            }
        }
        else{
            return array('result' => false, 'message' => 'Usuario nao inscrito');
        }

        if($validar==false){
            return array('result' => false, 'message' => 'Presenca ja havia sido confirmada');
        }
        else
        {
            $date=date('Y-m-d H:i:').sprintf('%06.6f', date('s')+fmod(microtime(true), 1)); // 02-11-2019 15:33:03.624
            $hash_sign_cert=hash('sha512', $cpfcnpj.$date.strval($atividade_id));

            $this->db->set('datahora_sign', $date);
            $this->db->set('status_id', $this->INSCRITO_COMPARECEU);
            $this->db->set('sign_cert', $hash_sign_cert);
            $this->db->where('pessoa_id', $usuario_id);
            $this->db->where('atividade_id', $atividade_id);
            $this->db->update('inscricao');

            if($this->db->affected_rows() > 0)
            {   
                return array('result' => true, 'sign_cert' => $hash_sign_cert);
            }
            else
            {
                return array('result' => false, 'message' => 'ConfirmarPresenca() falhou');
            }
        }
        
    }

    function cancelarInscricao($dados)
    {
        $atividade_id  = $dados['atividade_id'];
        $usuario_id    = $dados['pessoa_id'];

        $this->db->set('status', $this->INSCRITO_CANCELADO);
        $this->db->set('sign_cert', NULL);
        $this->db->set('datahora_sign', NULL);
        $this->db->where('pessoa_id', $usuario_id);
        $this->db->where('atividade_id', $atividade_id);        
        $this->db->update('inscricao');

        if($this->db->affected_rows() >= 0)
        {   
            return array('result' => true, 'message' => 'Inscricao cancelada');
        }
        else
        {
            return array('result' => false, 'message' => 'Usuario nao inscrito');
        }
        
    }

    function naoCompareceu($dados)
    {
        $atividade_id  = $dados['atividade_id'];
        $usuario_id    = $dados['pessoa_id'];

        $this->db->set('status', $this->INSCRITO_NAO_COMPARECEU);
        $this->db->set('sign_cert', NULL);
        $this->db->set('datahora_sign', NULL);
        $this->db->where('pessoa_id', $usuario_id);
        $this->db->where('atividade_id', $atividade_id);        
        $this->db->update('inscricao');

        if($this->db->affected_rows() >= 0)
        {   
            return array('result' => true, 'message' => 'Inscricao modificada');
        }
        else
        {
            return array('result' => false, 'message' => 'Usuario nao inscrito');
        }
        
    }

    function getSignCertificado($dados)
    {
        $atividade_id  = $dados['atividade_id'];
        $usuario_id    = $dados['pessoa_id'];        

        $query=$this->db->query("SELECT i.status,
                                        p.cpfcnpj,
                                        i.sign_cert
                                    FROM inscricao i
                                    INNER JOIN pessoa p ON i.pessoa_id=p.id
                                    WHERE i.pessoa_id=" . $usuario_id . " AND i.atividade_id=" . $atividade_id);

        if ($query->num_rows() > 0){
            $row = $query->row();
            if($row->status != $this->INSCRITO_COMPARECEU){
                return array('result' => false, 'message' => 'Nao ha certificado');
            }
            else{
                return array('result' => true, 'sign_cert' => $row->sign_cert);
            }
        }
        else{
            return array('result' => false, 'message' => 'Usuario nao inscrito');
        }
    }

    function verificaCertificado($sign_cert)
    {
        $query=$this->db->query("SELECT status_id, atividade_id, pessoa_id from inscricao where sign_cert='" . $sign_cert . "'");

        if ($query->num_rows() > 0){
            $row = $query->row();
            if($row->status_id == $this->INSCRITO_COMPARECEU){
                return array(   'result' => true, 
                                'message' => 'Certificado valido',
                                'atividade_id' => $row->atividade_id,
                                'pessoa_id' => $row->pessoa_id);
            }
        }
  
        return array('result' => false, 'message' => 'Certificado invalido');

    }

    function gerarCertificado($dados)
    {
        $atividade_id  = $dados['atividade_id'];
        $usuario_id    = $dados['pessoa_id'];        
        $dadosGerais=NULL;
        $dadosOrganizador=NULL;

        $queryOrganizador = $this->db->query("SELECT nome FROM pessoa WHERE tipo_id =". $this->ORGANIZADOR);

        $query=$this->db->query("SELECT p.nome AS nome,
                                        p.cpfcnpj,
                                        tp.nome AS tipo_pessoa,
                                        a.nome AS atividade,
                                        c.nome as categoria,
                                        a.datahora_inicio AS data,
                                        a.horas AS carga_horaria,
                                        e.nome AS evento,
                                        i.sign_cert
                                    FROM inscricao i
                                    INNER JOIN pessoa p ON i.pessoa_id=p.id   
                                    INNER JOIN tipopessoa tp ON p.tipo_id=tp.id
                                    INNER JOIN atividade a ON i.atividade_id=a.id
                                    INNER JOIN categoria c ON a.categoria_id=c.id
                                    INNER JOIN evento e ON a.evento_id=e.id
                                    WHERE i.pessoa_id=" . $usuario_id . " AND i.atividade_id=" . $atividade_id);
        
        if($queryOrganizador->num_rows() == 0 || $query->num_rows() == 0){
            return array('result' => FALSE, 'message' => 'Nao inscrito');
        }

        $dadosOrganizador = $queryOrganizador->row();
        $dadosGerais = $query->row();

        $obj_arr=array(); 
        $obj_arr['result']=TRUE;
        $obj_arr['organizador']['nome']=$dadosOrganizador->nome;
        $obj_arr['participante']['nome']=$dadosGerais->nome;
        $obj_arr['participante']['tipo_pessoa']=$dadosGerais->tipo_pessoa;
        $obj_arr['participante']['cpfcnpj']=$dadosGerais->cpfcnpj;
        $obj_arr['participante']['atividade']=$dadosGerais->atividade;
        $obj_arr['participante']['categoria']=$dadosGerais->categoria;
        $obj_arr['participante']['data']=$dadosGerais->data;
        $obj_arr['participante']['carga_horaria']=$dadosGerais->carga_horaria;
        $obj_arr['participante']['evento']=$dadosGerais->evento;
        $obj_arr['participante']['sign_cert']=$dadosGerais->sign_cert;

        return $obj_arr;
    }
  
}