<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento_model extends CI_Model {

    protected $table_evento     = 'evento';

    public function __construct(){
	parent::__construct();
 }

    /*************************************************************************
     * INSERE EVENTO
     * @param $dados
     * @return boolean
     ************************************************************************/
    public function inserir($dados)
    {
        if ($this->db->insert($this->table_evento, $dados)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }


    /*************************************************************************
     * RETORNA EVENTO
     * @param $dados
     * @return boolean
     ************************************************************************/

    public function retornaEvento() {
        $query = $this->db->query("SELECT * FROM $this->table_evento ");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        $data = 0;
     return $data;

    }



    public function retornaEventoUm($id) {
        $query = $this->db->query("SELECT * FROM $this->table_evento WHERE id = $id ");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row;
            }
            return $data;
        }
        $data = 0;
     return $data;

    }




    public function alterarevento($data)
    {
    
        $this->db->where('id', $data['id']);
        $this->db->update($this->table_evento, $data);
        if($this->db->affected_rows() >=0){
            return true;
        }else{
            return false;
        }
    }





    public function retornaTodos() {
        $query = $this->db->query("SELECT $this->table_evento.*, statusevento.nome as status  FROM $this->table_evento
        LEFT JOIN statusevento ON statusevento.id = $this->table_evento.status_id
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



    public function fotos() {
        $query = $this->db->query("SELECT * FROM eventoimagens
        ORDER BY RAND()
        LIMIT 8
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




    
}