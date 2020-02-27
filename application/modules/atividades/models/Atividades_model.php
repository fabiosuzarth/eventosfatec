<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atividades_model extends CI_Model {


    protected $table_atividade     = 'atividade';
    protected $table_evento        = 'evento';

    public function __construct(){
	parent::__construct();
 }

    /*************************************************************************
     * INSERE ATIVIDADE
     * @param $dados
     * @return boolean
     ************************************************************************/
    public function inserir($dados)
    {
        if ($this->db->insert($this->table_atividade, $dados)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    



    public function retornaAtividades($codEvento) {
        $query = $this->db->query("SELECT atividade.*, 
                                            statusatividade.nome as situacaoAtividade,
                                            statusevento.nome as situacaoEvento,
                                            categoria.nome AS categoria,
                                            pessoa.nome as palestrante,
                                            evento.nome as evento,
                                            pessoa.img as palestrante_img,
                                            evento.descricao as descricaoEvento,
                                            (atividade.vagas - COALESCE(A.total,0)) as vagasRestantes,
                                            COALESCE(A.total,0) as totalInscritos,
                                            COALESCE(C.total,0) as totalInscritosDuranteEvento,
                                            COALESCE(O.total,0) as totalInscritosCompareceu,
                                            COALESCE(N.total,0) as totalInscritosNaoCompareceu,
                                            COALESCE(I.total,0) as totalInscritosInteressados,
                                            atividade.nome as titulo
                                            FROM atividade
                                            LEFT JOIN categoria ON atividade.categoria_id = categoria.id
                                            LEFT JOIN pessoa ON atividade.palestrante_pessoa_id = pessoa.id
                                            LEFT JOIN evento ON atividade.evento_id = evento.id
                                            LEFT JOIN statusevento ON statusevento.id = evento.status_id
                                            LEFT JOIN statusatividade ON statusatividade.id = atividade.status_id
                                            
                                            LEFT JOIN ( SELECT COUNT(atividade_id) as total, atividade_id 
                                                        FROM inscricao
                                                        WHERE status_id IN (1, 2, 3)
                                                        GROUP BY 2 ) A ON A.atividade_id = atividade.id
                                            LEFT JOIN ( SELECT COUNT(atividade_id) as total, atividade_id 
                                                            FROM inscricao
                                                            WHERE status_id = 4
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
                                        WHERE evento_id = '$codEvento'
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



	     public function retornaAtividadesUm($id) {

        $query = $this->db->query("SELECT atividade.*, 
                                            statusatividade.nome as situacaoAtividade,
                                            statusevento.nome as situacaoEvento,
                                            categoria.nome AS categoria,
                                            pessoa.nome as palestrante,
                                            evento.nome as evento,
                                            pessoa.img as img_paslestrante,
                                            evento.descricao as descricaoEvento,
                                            (atividade.vagas - COALESCE(A.total,0)) as vagasRestantes
                                            FROM atividade
                                            LEFT JOIN categoria ON atividade.categoria_id = categoria.id
                                            LEFT JOIN pessoa ON atividade.palestrante_pessoa_id = pessoa.id
                                            LEFT JOIN evento ON atividade.evento_id = evento.id 
                                            LEFT JOIN statusevento ON statusevento.id = evento.status_id
                                            LEFT JOIN statusatividade ON statusatividade.id = atividade.status_id
                                            LEFT JOIN ( SELECT COUNT(atividade_id) as total, atividade_id 
                                                            FROM inscricao
                                                            WHERE status_id IN (1, 2, 3)
                                                            GROUP BY 2 ) A ON A.atividade_id = atividade.id
                                            WHERE atividade.id = $id
                                            ");
        if ($query->num_rows() > 0) {
            $i =0;
            foreach ($query->result() as $row) {
                //$data[$i]['palestrante'] = $row->palestrante;
                //$data[$i]['evento'] = $row->evento;
                //$i++;
                $data[] = $row;
            }
            return $data;
        }
        $data = 0;
     return $data;

    }




	     public function retornaAtividadesEvento() {

        $query = $this->db->query("SELECT * FROM evento");
        if ($query->num_rows() > 0) {
            $i =0;
            foreach ($query->result() as $row) {
                $data[$i]['evento'] = $row;
                $id = $row->id;

                    $querya = $this->db->query("SELECT atividade.*, 
                                        statusatividade.nome as situacaoAtividade,

                                        statusevento.nome as situacaoEvento,
                                        categoria.nome AS categoria,
                                        pessoa.nome as palestrante,
                                        evento.nome as evento,
                                        evento.descricao as descricaoEvento,
                                        (atividade.vagas - COALESCE(A.total,0)) as vagasRestantes,
                                        COALESCE(A.total,0) as totalInscritos,
                                        COALESCE(C.total,0) as totalInscritosDuranteEvento,
                                        COALESCE(O.total,0) as totalInscritosCompareceu,
                                        COALESCE(N.total,0) as totalInscritosNaoCompareceu,
                                        COALESCE(I.total,0) as totalInscritosInteressados,
                                        atividade.nome as titulo
                                        FROM atividade
                                        LEFT JOIN categoria ON atividade.categoria_id = categoria.id
                                        LEFT JOIN pessoa ON atividade.palestrante_pessoa_id = pessoa.id
                                        LEFT JOIN evento ON atividade.evento_id = evento.id
                                        LEFT JOIN statusevento ON statusevento.id = evento.status_id
                                        LEFT JOIN statusatividade ON statusatividade.id = atividade.status_id
                                        
                                        LEFT JOIN ( SELECT COUNT(atividade_id) as total, atividade_id 
                                                    FROM inscricao
                                                    WHERE status_id IN (1, 2, 3)
                                                    GROUP BY 2 ) A ON A.atividade_id = atividade.id
                                            LEFT JOIN ( SELECT COUNT(atividade_id) as total, atividade_id 
                                                        FROM inscricao
                                                        WHERE status_id = 4
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
                                                WHERE atividade.evento_id = $id  ");
                            if ($querya->num_rows() > 0) {
                                $a= 0;
                                foreach ($querya->result() as $rowa) {
                                    $data[$i]['atividade'][$a] = $rowa;
                                    $a++;
                                }
                 
                            }
                
                 $i++;           
            }
            return $data;
        }
        $data = 0;
     return $data;

    }







    public function alteraratividade($data)
    {
    
        $this->db->where('id', $data['id']);
        $this->db->update($this->table_atividade, $data);
        if($this->db->affected_rows() >=0){
            return true;
        }else{
            return false;
        }
    }



    public function retornaTodos() {
        $query = $this->db->query("SELECT 
 
               atividade.*, 
               evento.nome as nomeevento, 
               pessoa.nome as palestrante,
               statusatividade.nome as status,
               COALESCE(I.total,0) as totalInsc
               FROM  atividade
               INNER JOIN evento ON evento.id = atividade.evento_id
               LEFT JOIN pessoa ON pessoa.id = atividade.palestrante_pessoa_id
               LEFT JOIN statusatividade ON statusatividade.id = atividade.status_id AND statusatividade.id  = 1
               LEFT JOIN (
               SELECT COUNT(inscricao.id) as total, atividade_id FROM inscricao 
               INNER JOIN atividade ON atividade.id = inscricao.atividade_id
               LEFT JOIN statusatividade ON statusatividade.id = atividade.status_id 
               WHERE inscricao.status_id  IN ( 1 ,2, 3, 4)
               GROUP BY 2
               ) I ON I.atividade_id = atividade.id
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




     public function retornaAtividadesEventoData($id) {

  
        $query = $this->db->query("SELECT * FROM evento WHERE id = $id ");
       
        if ($query->num_rows() > 0) {
            $i =0;
            foreach ($query->result() as $row) {
            
             // $data[$i]['evento'] = $row;
             $data[$i]['evento'] = $row;

            // echo $row->nome."<br>";
                  $id = $row->id;
                         $querydia = $this->db->query("SELECT DATE_FORMAT(datahora_inicio,'%Y-%m-%d') as dataev FROM atividade
                                            WHERE evento_id = $id
                                            GROUP BY 1");
            
                    if ($querydia->num_rows() > 0) {
                 
                    $d =0;
                   
                        foreach ($querydia->result() as $rowdia) {
                           
                            
                            $dataevento = $rowdia->dataev;
                        //    echo $dataevento."<br>";

                            
                         
                         //   $data[$i]['evento']->data[$d] = $rowdia->dataev;

                                  $querydiat = $this->db->query("SELECT atividade.*, 
                                                                    statusatividade.nome as situacaoAtividade,
                                                                    pessoa.nome as palestrante_nome,
                                                                    pessoa.img as palestrante_img,
                                                                    pessoa.observacao as palestrante_observacao,
                                                                    statusevento.nome as situacaoEvento,
                                                                    categoria.nome AS categoria,
                                                                    pessoa.nome as palestrante,
                                                                    evento.nome as evento,
                                                                    evento.descricao as descricaoEvento,
                                                                    atividade.nome as titulo,
                                                                    (atividade.vagas - COALESCE(A.total,0)) as vagasRestantes
                                                                    FROM atividade
                                                                    LEFT JOIN categoria ON atividade.categoria_id = categoria.id
                                                                    LEFT JOIN pessoa ON atividade.palestrante_pessoa_id = pessoa.id
                                                                    LEFT JOIN evento ON atividade.evento_id = evento.id
                                                                    LEFT JOIN statusevento ON statusevento.id = evento.status_id
                                                                    LEFT JOIN statusatividade ON statusatividade.id = atividade.status_id
                                                                    LEFT JOIN ( SELECT COUNT(atividade_id) as total, atividade_id 
                                                                                    FROM inscricao
                                                                                    WHERE status_id IN (1, 2, 3)
                                                                                    GROUP BY 2 ) A ON A.atividade_id = atividade.id
                                                                    WHERE atividade.evento_id = $id
                                                                    AND  DATE_FORMAT(atividade.datahora_inicio,'%Y-%m-%d') = '$dataevento'
                                                                    ORDER BY atividade.datahora_inicio
                                            ");
                                    if ($querydiat->num_rows() > 0) {
                                       $atividade = array();
                                       $at =0;
                                            foreach ($querydiat->result() as $rowdiat) {

                                                $data[$i]['evento']->data[$d]['devento'] = $rowdia->dataev;
                                                $data[$i]['evento']->data[$d]['atividade'][$at]= $rowdiat;
                                            //    $data[$i]['evento']->data[$d]['devento']->atividade[$at] =  $rowdiat->nome;
                                             //     $data[$i]['data'][$d] = $rowdia->dataev;
                                            //      $data[$i]['data'][$d]->atividade[$a] = $rowdiat->nome;
                                      
                                         //   $data[$d]['data']->atividade = 'paulo';
                                        //      echo $rowdiat->nome."<br>";
                               
                                   
                                                
                                        $at++;
                                                    
                                        }
                                        
                                       //    echo "<hr>";
                                        }
                                      
                                  $d++;   
                                                 
                              
                        }
                      }

                    
          
                
                 $i++;          
           //    return $data; 
            }
           return $data;
        }
    
     //   print_r($data);

    }





    public function retornaAtividadesEventoDataTodos() {

  
        $query = $this->db->query("SELECT * FROM evento");
       
        if ($query->num_rows() > 0) {
            $i =0;
            foreach ($query->result() as $row) {
            
             // $data[$i]['evento'] = $row;
             $data[$i]['evento'] = $row;

            // echo $row->nome."<br>";
                  $id = $row->id;
                         $querydia = $this->db->query("SELECT DATE_FORMAT(datahora_inicio,'%Y-%m-%d') as dataev FROM atividade
                                            WHERE evento_id = $id
                                            GROUP BY 1");
            
                    if ($querydia->num_rows() > 0) {
                 
                    $d =0;
                   
                        foreach ($querydia->result() as $rowdia) {
                           
                            
                            $dataevento = $rowdia->dataev;
                        //    echo $dataevento."<br>";

                            
                         
                         //   $data[$i]['evento']->data[$d] = $rowdia->dataev;

                                  $querydiat = $this->db->query("SELECT atividade.*, 
                                        statusatividade.nome as situacaoAtividade,
                                        pessoa.nome as palestrante_nome,
                                        pessoa.img as palestrante_img,
                                        pessoa.observacao as palestrante_observacao,
                                        statusevento.nome as situacaoEvento,
                                        categoria.nome AS categoria,
                                        pessoa.nome as palestrante,
                                        evento.nome as evento,
                                        evento.descricao as descricaoEvento,
                                        atividade.nome as titulo
                                        FROM atividade
                                        LEFT JOIN categoria ON atividade.categoria_id = categoria.id
                                        LEFT JOIN pessoa ON atividade.palestrante_pessoa_id = pessoa.id
                                        LEFT JOIN evento ON atividade.evento_id = evento.id
                                        LEFT JOIN statusevento ON statusevento.id = evento.status_id
                                        LEFT JOIN statusatividade ON statusatividade.id = atividade.status_id
                                        
                                             WHERE atividade.evento_id = $id
                                             AND  DATE_FORMAT(atividade.datahora_inicio,'%Y-%m-%d') = '$dataevento'
                                             ORDER BY atividade.datahora_inicio
                                            ");
                                    if ($querydiat->num_rows() > 0) {
                                       $atividade = array();
                                       $at =0;
                                            foreach ($querydiat->result() as $rowdiat) {

                                                $data[$i]['evento']->data[$d]['devento'] = $rowdia->dataev;
                                                $data[$i]['evento']->data[$d]['atividade'][$at]= $rowdiat;
                                            //    $data[$i]['evento']->data[$d]['devento']->atividade[$at] =  $rowdiat->nome;
                                             //     $data[$i]['data'][$d] = $rowdia->dataev;
                                            //      $data[$i]['data'][$d]->atividade[$a] = $rowdiat->nome;
                                      
                                         //   $data[$d]['data']->atividade = 'paulo';
                                        //      echo $rowdiat->nome."<br>";
                               
                                   
                                                
                                        $at++;
                                                    
                                        }
                                        
                                       //    echo "<hr>";
                                        }
                                      
                                  $d++;   
                                                 
                              
                        }
                      }

                    
          
                
                 $i++;          
           //    return $data; 
            }
           return $data;
        }
    
     //   print_r($data);

    }

}