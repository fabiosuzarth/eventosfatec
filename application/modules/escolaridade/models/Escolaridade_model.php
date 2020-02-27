<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Escolaridade_model extends CI_Model {

    protected $table = 'escolaridade';
    public function __construct(){
	parent::__construct();
 }



     /*************************************************************************
     * RETORNA Escolaridade
     * @param $dados
     * @return boolean
     ************************************************************************/

    public function retornaEscolaridade() {
        $query = $this->db->query("SELECT * FROM $this->table");
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