<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadpessoa_model extends CI_Model {

    protected $table = 'pessoa';
    public function __construct(){
	parent::__construct();
 }
  


    public function get_tipoPessoa()
    {
                $query = $this->db->query(" SELECT * FROM 
                                            tipopessoa 
                                            where id  in (1,2,3,4)");

        if ($query->num_rows() > 0) {
            $dados = $query->result();
        } else {
            $dados = FALSE;
        }

        return $dados;
    }

    public function get_escolaridade()
    {
                $query = $this->db->query(" SELECT * FROM 
                                            escolaridade 
                                          ");

        if ($query->num_rows() > 0) {
            $dados = $query->result();
        } else {
            $dados = FALSE;
        }

        return $dados;
    }

    public function insere_pessoa($data)
    {
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();     

    }

    public function verificaemail($email)
    {
        $query = $this->db->query(" SELECT count(id) AS total
									FROM pessoa
									WHERE email = '$email' 
		");
        if ($query->num_rows() > 0){
            $dados = $query->result();
        }else{
            $dados = FALSE;
        }
        return $dados;
	}


}
