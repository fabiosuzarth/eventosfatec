<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscricao_model extends CI_Model {

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

    public function retornaTodos() 
    {
        $query = $this->db->query("SELECT 
                                pessoa.id as pessoa_id,
                                pessoa.nome as nome,
                                pessoa.email as email,
                                evento.nome as evento,
                                atividade.nome as atividade,
                                statusinscricao.nome as status
                                FROM inscricao
                                LEFT JOIN pessoa ON pessoa.id = inscricao.pessoa_id
                                LEFT JOIN atividade ON atividade.id = inscricao.atividade_id
                                LEFT JOIN evento ON evento.id = atividade.evento_id
                                LEFT JOIN statusinscricao ON statusinscricao.id = inscricao.status_id
                                
                                ORDER BY evento, atividade, nome");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

        $data = 0;
        return $data;
    }


    public function retornaInscAtividades($id) 
    {
        $query = $this->db->query("SELECT 
                                   pessoa.id as pessoa_id,
                                   pessoa.cpfcnpj as cpfcnpj,
                                   pessoa.cidade as cidade,
                                   pessoa.nome as nome,
                                   pessoa.email as email,
                                   evento.nome as evento,
                                   atividade.nome as atividade,
                                   statusinscricao.nome as status,
                                   statusinscricao.id as status_id,
                                   atividade.datahora_inicio as datainicio,
                                   atividade.datahora_fim as datafim,
                                   atividade.id as atividade_id,
                                   inscricao.id  as inscricao_id
                                   FROM inscricao
                                   LEFT JOIN pessoa ON pessoa.id = inscricao.pessoa_id
                                   LEFT JOIN atividade ON atividade.id = inscricao.atividade_id
                                   LEFT JOIN evento ON evento.id = atividade.evento_id
                                   LEFT JOIN statusinscricao ON statusinscricao.id = inscricao.status_id
                                   WHERE inscricao.atividade_id = $id                                   
                                   ORDER BY nome, atividade");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        $data = 0;
        return $data;   
    }

    public function retornaTodasAtividadesUsuario($id) 
    {
        $query = $this->db->query("SELECT 
                                        pessoa.id AS pessoa_id,
                                        evento.id AS evento_id,
                                        evento.nome as evento_nome,
                                        atividade.id as atividade_id,
                                        atividade.nome as atividade_nome,
                                        atividade.datahora_inicio as atividade_datahora_inicio,
                                        atividade.datahora_fim as atividade_datahora_fim,
                                        statusinscricao.id as status_id,
                                        statusinscricao.nome as status_nome,
                                        inscricao.sign_cert,
                                        inscricao.status_id as status_inscricao
                                        FROM inscricao
                                        LEFT JOIN pessoa ON pessoa.id = inscricao.pessoa_id
                                        LEFT JOIN atividade ON atividade.id = inscricao.atividade_id
                                        LEFT JOIN evento ON evento.id = atividade.evento_id
                                        LEFT JOIN statusinscricao ON statusinscricao.id = inscricao.status_id
                                        WHERE inscricao.pessoa_id=$id
                                        ORDER BY evento_nome, atividade_nome
                                    ");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        $data = 0;
        return $data;
    }

    public function retornaTodasAtividadesEventoUsuario($atividade_id, $evento_id) 
    {
        $query = $this->db->query("SELECT 
                                        pessoa.id AS pessoa_id,
                                        evento.id AS evento_id,
                                        evento.nome as evento_nome,
                                        atividade.id as atividade_id,
                                        atividade.nome as atividade_nome,
                                        atividade.datahora_inicio as atividade_datahora_inicio,
                                        atividade.datahora_fim as atividade_datahora_fim,
                                        statusinscricao.id as status_id,
                                        statusinscricao.nome as status_nome,
                                        inscricao.sign_cert,
                                        inscricao.status_id as status_inscricao
                                        FROM inscricao
                                        LEFT JOIN pessoa ON pessoa.id = inscricao.pessoa_id
                                        LEFT JOIN atividade ON atividade.id = inscricao.atividade_id
                                        LEFT JOIN evento ON evento.id = atividade.evento_id
                                        LEFT JOIN statusinscricao ON statusinscricao.id = inscricao.status_id
                                        WHERE inscricao.pessoa_id=$atividade_id AND evento.id=$evento_id
                                        ORDER BY evento_nome, atividade_nome
                                    ");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        $data = 0;
        return $data;
    }

    public function retornaAtvidadesStatusInscricao() 
    {
        $query = $this->db->query("	SELECT 	inscricao.atividade_id,
                                            atividade.nome AS atividade_nome,
                                            atividade.status_id AS status_atividade_id,	
                                            statusatividade.nome AS status_atividade_nome,
                                            atividade.evento_id AS evento_id,
                                            evento.nome AS evento_nome,
                                            evento.status_id AS status_evento_id,	
                                            statusevento.nome AS status_evento_nome,
                                            atividade.vagas AS vagas_ofertadas, 
                                            COALESCE(A.total,0) as total_inscritos,
                                            (atividade.vagas - COALESCE(A.total,0)) as vagas_restantes,
                                            COALESCE(C.total,0) as total_compareceu_durante_evento,
                                            COALESCE(O.total,0) as total_inscritos_compareceu,
                                            COALESCE(N.total,0) as total_inscritos_nao_compareceu,
                                            COALESCE(I.total,0) as total_inscritos_interessados				
                                            FROM inscricao
                                            INNER JOIN pessoa ON inscricao.pessoa_id=pessoa.id
                                            INNER JOIN atividade ON inscricao.atividade_id=atividade.id
                                            INNER JOIN evento ON atividade.evento_id=evento.id
                                            INNER JOIN statusinscricao ON inscricao.status_id=statusinscricao.id
                                            INNER JOIN statusevento ON evento.status_id=statusevento.id
                                            INNER JOIN statusatividade ON atividade.status_id=statusatividade.id
                                            LEFT JOIN ( SELECT COUNT(atividade_id) as total, atividade_id 
                                                        FROM inscricao
                                                        WHERE status_id IN (1, 2, 3)
                                                        GROUP BY 2 ) A ON A.atividade_id = atividade.id
                                            LEFT JOIN ( SELECT COUNT(atividade_id) as total, atividade_id 
                                                        FROM inscricao
                                                        WHERE status_id = 6
                                                        GROUP BY 2 ) C ON C.atividade_id = atividade.id
                                            LEFT JOIN ( SELECT COUNT(atividade_id) as total, atividade_id 
                                                        FROM inscricao
                                                        WHERE status_id = 2
                                                        GROUP BY 2 ) O ON O.atividade_id = atividade.id
                                            LEFT JOIN ( SELECT COUNT(atividade_id) as total, atividade_id 
                                                        FROM inscricao
                                                        WHERE status_id = 3
                                                        GROUP BY 2 ) N ON N.atividade_id = atividade.id
                                            LEFT JOIN ( SELECT COUNT(atividade_id) as total, atividade_id 
                                                        FROM inscricao
                                                        GROUP BY 2 ) I ON I.atividade_id = atividade.id
                                            GROUP BY atividade_id
                                            ORDER BY atividade_nome
                                    ");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        $data = 0;
        return $data;
    }

    function inscrever($dados)
    {      
        $atividade_id = $dados['atividade_id'];
        $pessoa_id = $dados['pessoa_id'];        
        $evento_id = $dados['evento_id'];  
        
        $query=$this->db->query("INSERT INTO inscricao (status_id, atividade_id, pessoa_id) values (" . $this->INSCRITO . ", " . $atividade_id . ", " . $pessoa_id . ")");

        if($this->db->affected_rows() > 0){   
            return array('result' => true, 'Inscrição realizada');
        }
        else{
            return array('result' => false, 'message' => 'inscrever() falhou');
        }
        
    }

    function inscreverupdate($dados)
    {      
        $atividade_id = $dados['atividade_id'];
        $pessoa_id = $dados['pessoa_id'];        
        $evento_id = $dados['evento_id'];  
        
        $query=$this->db->query("UPDATE inscricao set 
                                        status_id=" . $this->INSCRITO . "                                         
                                        where atividade_id=" . $atividade_id . " and  
                                        pessoa_id=" . $pessoa_id);

        if($this->db->affected_rows() > 0){               
            return array('result' => true, 'Inscrição realizada');
        }
        else{
            return array('result' => false, 'message' => 'inscreverupdate() falhou');
        }
        
    }


    function confirmarPresenca($dados)
    {      
        $atividade_id = $dados['atividade_id'];
        $usuario_id = $dados['pessoa_id'];
        $cpfcnpj="";

        $query=$this->db->query("SELECT i.status_id,
                                        p.cpfcnpj 
                                    FROM inscricao i
                                    INNER JOIN pessoa p ON i.pessoa_id=p.id
                                    WHERE i.pessoa_id=" . $usuario_id . " AND i.atividade_id=" . $atividade_id);

        if ($query->num_rows() > 0)
        {
            $row = $query->row();

            if($row->status_id == $this->INSCRITO_CANCELADO){
                return array('result' => false, 'message' => 'Usuário está com inscrição cancelada');
            }
            else if($row->status_id != $this->INSCRITO_COMPARECEU && $row->status_id != $this->NAO_INSCRITO_COMPARECEU)
            {
                $cpfcnpj=$row->cpfcnpj;

                $date=date('Y-m-d H:i:').sprintf('%06.6f', date('s')+fmod(microtime(true), 1)); // 02-11-2019 15:33:03.624
                $hash_sign_cert=hash('sha512', $cpfcnpj.$date.strval($atividade_id));

                $this->db->set('datahora_sign', $date);
                $this->db->set('status_id', $this->INSCRITO_COMPARECEU);
                $this->db->set('sign_cert', $hash_sign_cert);
                $this->db->where('pessoa_id', $usuario_id);
                $this->db->where('atividade_id', $atividade_id);
                $this->db->update('inscricao');

                if($this->db->affected_rows() > 0){   
                    return array('result' => true, 'sign_cert' => $hash_sign_cert);
                }
                else{
                    return array('result' => false, 'message' => 'ConfirmarPresenca() falhou');
                }
            }
            else{
                return array('result' => false, 'message' => 'Presenca ja havia sido confirmada');
            }
        }
        // Usuario nao estava inscrito na atividade, inseri-lo na tabela com status=6 (NAO_INSCRITO_COMPARECEU)
        else{
            // Retornar CPFCNPJ pessoa para gerar hash certificado
            $querySelect=$this->db->query("SELECT cpfcnpj from pessoa where id=".$usuario_id); 
            if ($querySelect->num_rows() > 0)
            {
                $row = $querySelect->row();
                $cpfcnpj=$row->cpfcnpj;
                $date=date('Y-m-d H:i:').sprintf('%06.6f', date('s')+fmod(microtime(true), 1)); // 02-11-2019 15:33:03.624
                $hash_sign_cert=hash('sha512', $cpfcnpj.$date.strval($atividade_id));

                $queryInsert=$this->db->query("INSERT INTO inscricao (pessoa_id, atividade_id, status_id, sign_cert, datahora_sign)
                                                 values(".$usuario_id.", ".$atividade_id.", ".$this->NAO_INSCRITO_COMPARECEU.", '".$hash_sign_cert."', '".$date."')");
                
                if($this->db->affected_rows() > 0){   
                    return array('result' => true, 'sign_cert' => $hash_sign_cert);
                }
                else{
                    return array('result' => false, 'message' => 'ConfirmarPresenca() NAO_INSCRITO_COMPARECEU falhou ');
                }                                 
            }            
        }
        
    }

    function cancelarInscricao($dados)
    {
        $atividade_id  = $dados['atividade_id'];
        $usuario_id    = $dados['pessoa_id'];

        $query=$this->db->query("UPDATE inscricao SET sign_cert=null, datahora_sign=null, status_id =" . $this->INSCRITO_CANCELADO . " WHERE atividade_id=" . $atividade_id . " AND pessoa_id=" . $usuario_id);

        if ($this->db->affected_rows() > 0){  
            return array('result' => true, 'message' => 'Inscricao cancelada');
        }
        else{
            return array('result' => false, 'message' => 'Atividade/Usuário não encontrado');
        }
    }

    function naoCompareceu($dados)
    {
        $atividade_id  = $dados['atividade_id'];
        $usuario_id    = $dados['pessoa_id'];

        $query=$this->db->query("UPDATE inscricao SET sign_cert=null, datahora_sign=null, status_id =" . $this->INSCRITO_NAO_COMPARECEU . " WHERE atividade_id=" . $atividade_id . " AND pessoa_id=" . $usuario_id);

        if($this->db->affected_rows() > 0)
        {   
            return array('result' => true, 'message' => 'Inscrição modificada');
        }
        else
        {
            return array('result' => false, 'message' => 'Atividade/Usuário não encontrado');
        }
        
    }

    function getSignCertificado($dados)
    {
        $atividade_id  = $dados['atividade_id'];
        $usuario_id    = $dados['pessoa_id'];  

        $query=$this->db->query("SELECT sign_cert, status_id
                                    FROM inscricao
                                    WHERE pessoa_id=" . $usuario_id . " AND atividade_id=" . $atividade_id);

        if ($query->num_rows() > 0){
            $row = $query->row();
            if($row->status_id != $this->INSCRITO_COMPARECEU){
                return array('result' => false, 'message' => 'Não há certificado');
            }
            else{
                return array('result' => true, 'sign_cert' => $row->sign_cert);
            }
        }
        else{
            return array('result' => false, 'message' => 'Atividade/Usuário não encontrado');
        }
    }

    function verificaCertificado($sign_cert)
    {
        $query=$this->db->query("SELECT status_id, atividade_id, pessoa_id from inscricao where sign_cert='" . $sign_cert . "'");

        if ($query->num_rows() > 0){
            $row = $query->row();            
            if($row->status_id == $this->INSCRITO_COMPARECEU || $row->status_id == $this->NAO_INSCRITO_COMPARECEU){
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

    function confirmarinscricao($id, $status){
        $this->db->where('id', $id);
        $this->db->set('status_id', $status);
        $this->db->update('inscricao');
        if($this->db->affected_rows() >=0){
            return true;
        }else{
            return false;
        }
    }


    function atividadePessoaFromInscricao($id){
        $query=$this->db->query("SELECT atividade_id, pessoa_id from inscricao where id=$id");

        if($query->num_rows() <= 0){
            return array('result' => FALSE, 'message' => 'ID não encontrado');
        }
        else{
            $row = $query->row(); 
            return array('result' => true, 'atividade_id' => $row->atividade_id, 'pessoa_id' => $row->pessoa_id);
        }
    }

    function inscritosAtividadePorDia(){

        $query=$this->db->query('select COUNT(*) AS data_y, DATE_FORMAT(datahora, "%d/%m/%Y") AS data_x from inscricao group by day(datahora) order by 2 ASC');

        if ($query->num_rows() > 0) 
        {
            $obj_arr=array();
            $obj_arr["result"]=true;
            $obj_arr["records"]=array();    
            foreach ($query->result() as $row)
            {  
                $obj_item=array(
                    "data_y" => $row->data_y,
                    "data_x" => $row->data_x
                );    
                array_push($obj_arr["records"], $obj_item);
            }
            return $obj_arr;
        }
        else{
            return array("result" => false, "message" => "Nao foi possivel encontrar informacoes solicitadas");
        }

    }  

    function novosCadastrosPorDia(){

        $query=$this->db->query('select COUNT(*) AS data_y, DATE_FORMAT(datahora_cadastro, "%d/%m/%Y") AS data_x from pessoa group by day(datahora_cadastro) order by 2 ASC');

        if ($query->num_rows() > 0) 
        {
            $obj_arr=array();
            $obj_arr["result"]=true;
            $obj_arr["records"]=array();    
            foreach ($query->result() as $row)
            {  
                $obj_item=array(
                    "data_y" => $row->data_y,
                    "data_x" => $row->data_x
                );    
                array_push($obj_arr["records"], $obj_item);
            }
            return $obj_arr;
        }
        else{
            return array("result" => false, "message" => "Nao foi possivel encontrar informacoes solicitadas");
        }

    } 

    function usuarioEntradaEvento($evento_id, $pessoa_id){

        $query=$this->db->query('INSERT INTO entradaevento (evento_id, pessoa_id) VALUES('.$evento_id.', '.$pessoa_id.')');

        if ($this->db->affected_rows() >=0){
            return array("result" => true, "message" => "Dados inseridos com sucesso");
        }
        else{
            return array("result" => false, "message" => "Nao foi possivel processar informações");
        }

    } 

    function sorteioUsuario(){

        /* OS NOT IN SAO PALESTRANTES E USUARIOS TESTE */
        /*
            SORTEIO DIA 1 - 21/10/2019
                CAMISETA
                    "27"	"Mateus Vinicius da Silva"	"42236839855"
                HOSPEDAGEM
                    "35"	"Douglas Willian dos Santos"	"43352153809"
                    "34"	"Gabriel Danilo Benetti"	"37810590812"
                    "979"	"Yasmin Evangelista Correa Leme"	"47558907802" --- DUPLICADO ---> "982"	"Yasmin Evangelista Correa Leme"	"89756745680"



        */
        $query=$this->db->query("SELECT id, cpfcnpj, nome FROM pessoa WHERE pessoa.cpfcnpj 
                                    not IN(	'11111111111',
                                            '77458969935',
                                            '001', '002', '003', '004', '005', '006', '007', '008', '009', '010', '011', '012', '013', '014',
                                            '33541768820',
                                            '47560646809',
                                            '33793611111',
                                            '02148771510',
                                            '41451283032',
                                            '42236839855',
                                            '43352153809',
                                            '37810590812',
                                            '47558907802','89756745680')
                                    ORDER BY 1");

        //$dataSorteada=0;

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }            
            return $data;
        }

        $data=0;
        return $data;
        
    }


}