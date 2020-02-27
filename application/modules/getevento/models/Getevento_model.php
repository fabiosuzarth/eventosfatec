<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getevento_model extends CI_Model {

    protected $table_evento = 'evento';
    protected $table_atividade = 'atividade';
    public function __construct(){
	parent::__construct();
 }

    public function readAtividade($dados)
    {
        $atividade_id  = $dados['atividade_id'];

        $query=$this->db->query("SELECT a.evento_id, 
                                        a.id, 
                                        a.nome, 
                                        a.descricao, 
                                        c.nome AS categoria, 
                                        a.datahora_inicio, 
                                        a.datahora_fim, 
                                        a.localizacao, 
                                        a.vagas, 
                                        a.horas, 
                                        a.status_id                                               
                                    FROM atividade a 
                                INNER JOIN categoria c ON a.categoria_id=c.id 
                                WHERE a.id=$atividade_id");

        if($query->num_rows() <= 0){
            $obj_arr["result"]="false";
            return $obj_arr;
        }
        
        $obj_arr["result"]="true";
        $obj_arr["atividade"]=array(); 

        foreach ($query->result_array() as $row)
        {
            $obj_item=array(
                "id_evento" => $row['evento_id'],
                "id_atividade" => $row['id'],
                "nome" => $row['nome'],
                "datahora_inicio" => $row['datahora_inicio'],
                "datahora_fim" => $row['datahora_fim'],
                "localizacao" => $row['localizacao'],
                "categoria" => $row['categoria'],
                "descricao" => $row['descricao'],
                "status" => $row['status_id'],
                "vagas" => $row['vagas'],
                "horas" => $row['horas']
            );    
            array_push($obj_arr["atividade"], $obj_item);
        }

        return $obj_arr;
    }

    public function readEventoAtividade()
    {
        $queryEvento = $this->db->query('SELECT id, nome, descricao, datahora_inicio, datahora_fim, localizacao, valor, status_id FROM evento ORDER BY nome desc');
        $queryEventoAtividade = $this->db->query('SELECT a.evento_id, a.id, a.nome, a.descricao, c.nome AS categoria, a.datahora_inicio, a.datahora_fim, a.localizacao, a.vagas, a.horas, a.status_id
                                                    FROM atividade a 
                                                    INNER JOIN categoria c ON a.categoria_id=c.id 
                                                    ORDER BY a.evento_id, c.nome ASC');

        $obj_arr=array(); 

        if($queryEvento->num_rows() <= 0 || $queryEventoAtividade->num_rows() <= 0){
            $obj_arr["result"]="false";
            return $obj_arr;
        }
             
        $obj_arr["result"]="true";
        $obj_arr["eventos"]=array(); 
        
        foreach ($queryEvento->result_array() as $row)
        {
            $obj_item=array(
                "id" => $row['id'],
                "nome" => $row['nome'],
                "descricao" => $row['descricao'],
                "datahora_inicio" => $row['datahora_inicio'],
                "datahora_fim" => $row['datahora_fim'],
                "localizacao" => $row['localizacao'],
                "valor" => $row['valor'],
                "status_id" => $row['status_id']                
            );    
            array_push($obj_arr["eventos"], $obj_item);
        }

        $obj_arr["eventosAtividades"]=array(); 
        
        foreach ($queryEventoAtividade->result_array() as $row)
        {
            $obj_item=array(
                "id_evento" => $row['evento_id'],
                "id_atividade" => $row['id'],
                "nome" => $row['nome'],
                "datahora_inicio" => $row['datahora_inicio'],
                "datahora_fim" => $row['datahora_fim'],
                "localizacao" => $row['localizacao'],
                "categoria" => $row['categoria'],
                "descricao" => $row['descricao'],
                "status" => $row['status_id'],
                "vagas" => $row['vagas'],
                "horas" => $row['horas']
            );    
            array_push($obj_arr["eventosAtividades"], $obj_item);
        }

        return $obj_arr;
    }
  
}