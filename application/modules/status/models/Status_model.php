<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_model extends CI_Model {
    public function __construct(){
	parent::__construct();
 }

    public function readStatusEvento()
    {
        $query=$this->db->query("SELECT * FROM statusevento");

        if($query->num_rows() <= 0){
            $obj_arr["result"]="false";
            return $obj_arr;
        }
        
        $obj_arr["result"]="true";
        $obj_arr["statusEvento"]=array(); 

        foreach ($query->result_array() as $row)
        {
            $obj_item=array(
                "id" => $row['id'],
                "nome" => $row['nome']
            );    
            array_push($obj_arr["statusEvento"], $obj_item);
        }

        return $obj_arr;
    }

    public function readStatusAtividade()
    {
        $query=$this->db->query("SELECT * FROM statusatividade");

        if($query->num_rows() <= 0){
            $obj_arr["result"]="false";
            return $obj_arr;
        }
        
        $obj_arr["result"]="true";
        $obj_arr["statusAtividade"]=array(); 

        foreach ($query->result_array() as $row)
        {
            $obj_item=array(
                "id" => $row['id'],
                "nome" => $row['nome']
            );    
            array_push($obj_arr["statusAtividade"], $obj_item);
        }

        return $obj_arr;
    }

    public function readStatusInscricao()
    {
        $query=$this->db->query("SELECT * FROM statusinscricao");

        if($query->num_rows() <= 0){
            $obj_arr["result"]="false";
            return $obj_arr;
        }
        
        $obj_arr["result"]="true";
        $obj_arr["statusInscricao"]=array(); 

        foreach ($query->result_array() as $row)
        {
            $obj_item=array(
                "id" => $row['id'],
                "nome" => $row['nome']
            );    
            array_push($obj_arr["statusInscricao"], $obj_item);
        }

        return $obj_arr;
    }
  
}