<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipopessoa_model extends CI_Model {

    protected $table = 'tipopessoa';
    public function __construct(){
	parent::__construct();
 }



     /*************************************************************************
     * RETORNA TIPOPESSOA
     * @param $dados
     * @return boolean
     ************************************************************************/

    public function retornaTipopessoa() {
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