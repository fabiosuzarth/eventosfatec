<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa_model extends CI_Model {

    protected $table_pessoa     = 'pessoa';
    protected $table_pais       = 'pais';

    public function __construct(){
	parent::__construct();
 }

    /*************************************************************************
     * INSERE PESSOA
     * @param $dados
     * @return boolean
     ************************************************************************/
    public function inserir($dados)
    {
        if ($this->db->insert($this->table_pessoa, $dados)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }



     /*************************************************************************
     * RETORNA PALESTRANTE
     * @param $dados
     * @return boolean
     ************************************************************************/

    public function retornaPalestrante() {
        $query = $this->db->query("SELECT * FROM $this->table_pessoa WHERE tipo_id = 7 ");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        $data = 0;
     return $data;
    }

    /*************************************************************************
     * RETORNA PAIS
     * @param $dados
     * @return boolean
     ************************************************************************/

    public function retornaPais() {
        $query = $this->db->query("SELECT * FROM $this->table_pais");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        $data = 0;
     return $data;

    }




	public function verificauser($cliente)
    {
        $query = $this->db->query(" SELECT count(id) AS total
									FROM $this->table_pessoa 
									WHERE cpfcnpj = '$cliente' 
		");
        if ($query->num_rows() > 0) {
            $dados = $query->result();
        } else {
            $dados = FALSE;
        }
        return $dados;
	}
    
    

    public function retornaPessoa($id) {
        $query = $this->db->query("SELECT * FROM $this->table_pessoa WHERE id = $id ");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row;
            }
            return $data;
        }
        $data = 0;
     return $data;

    }



        public function alterarpessoa($data){
    
        $this->db->where('id', $data['id']);
        $this->db->update($this->table_pessoa, $data);
        if($this->db->affected_rows() >=0){
            return true;
        }else{
            return false;
        }
    }

    
    public function retornaTodos() {
        $query = $this->db->query("SELECT * FROM $this->table_pessoa");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        $data = 0;
     return $data;

    }

    public function retornaInfoOrganizador($id) 
    {
        $query = $this->db->query("SELECT nome, CONCAT(logradouro, ' ', numero, ', bairro ', bairro, ', ', cidade, ', ', estado, ', CEP ', cep) as endereco FROM $this->table_pessoa WHERE id = $id ");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row;
            }
            return $data;
        }
        $data = 0;
        return $data;
    }
        
    public function retornapessoaadmin($usuario, $senha)
    {
       $query = $this->db->query("SELECT  nome, email, id
                                         
                                   FROM   $this->table_pessoa 
                                
                                   WHERE  $this->table_pessoa.email = '$usuario' 
                                   AND    LOWER($this->table_pessoa.senha) = '$senha'
                                   AND    $this->table_pessoa.tipo_id = 5
                                  
                                    ");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row;
            }
            return $data;
        }
        $data = 0;
        return $data;
    }

    public function retornapessoausuario($usuario, $senha)
    {
       $query = $this->db->query("SELECT  nome, email, id, telefone
                                         
                                   FROM   $this->table_pessoa 
                                
                                   WHERE  $this->table_pessoa.email = '$usuario' 
                                   AND    LOWER($this->table_pessoa.senha) = '$senha'
                                  
                                    ");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row;
            }
            return $data;
        }
        $data = 0;
        return $data;
    }

    public function retornapessoaatividades($id)
    {
       $query = $this->db->query("SELECT atividade_id FROM inscricao WHERE pessoa_id = $id AND status_id NOT IN (2, 3, 5, 6)");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->atividade_id;
            }
            return $data;
        }
        $data = 0;
        return $data;
    }

}