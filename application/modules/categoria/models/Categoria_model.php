<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_model extends CI_Model {


    protected $table_categoria     = 'categoria';

    public function __construct(){
	parent::__construct();
 }

    /*************************************************************************
     * INSERE Categoria
     * @param $dados
     * @return boolean
     ************************************************************************/
    public function inserir($dados)
    {
        if ($this->db->insert($this->table_categoria, $dados)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }


     /*************************************************************************
     * RETORNA CATEGORIA
     * @param $dados
     * @return boolean
     ************************************************************************/

    public function retornaCategoria() {
        $query = $this->db->query("SELECT * FROM $this->table_categoria ");
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