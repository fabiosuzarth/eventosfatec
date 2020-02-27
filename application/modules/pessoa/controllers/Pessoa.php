<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('upload_max_size', '256M');


class Pessoa extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->helper('url');	
        $this->load->model('Pessoa_model', 'pessoa');	
        $this->load->model('Tipopessoa/Tipopessoa_model', 'tipopessoa');
        $this->load->model('Escolaridade/Escolaridade_model', 'escolaridade');	
	}

	
	public function inserir(){




$id_usuario = $this->input->post('cpfcnpj');


        if (!empty($_FILES['foto']['name'])) {

            $upload_img = self::cwUpload('foto', 'img/fotos/', '', TRUE, 'img/fotos/thumbs/', '200', '160');
            $thumb_src = 'img/fotos/thumbs/' . $upload_img;
            $caminho = 'img/fotos/' . $upload_img;
        }

		$nascimento = $this->input->post('data_nascimento');
		$dataNascimento = DateTime::createFromFormat('d/m/Y', $nascimento);


        $dados['cpfcnpj']  			= $this->input->post('cpfcnpj');
        $dados['email']  			= $this->input->post('email');
        $dados['senha']  			= hash('sha512', $this->input->post('senha'));
        $dados['tipo_id']  			= $this->input->post('tipo_id');
        $dados['nome']  			= $this->input->post('nome');
        $dados['logradouro']  		= $this->input->post('logradouro');
        $dados['telefone']  		= $this->input->post('telefone');
        $dados['data_nascimento']  	= $dataNascimento->format('Y-m-d');
        $dados['observacao']  		= $this->input->post('observacao');
        $dados['escolaridade_id']  	= $this->input->post('escolaridade_id');
        $dados['cep']  				= $this->input->post('cep');
        $dados['cidade']  			= $this->input->post('cidade');
        $dados['bairro']  			= $this->input->post('bairro');
        $dados['numero']  			= $this->input->post('numero');
        $dados['complemento']  		= $this->input->post('complemento');
        $dados['estado']  			= $this->input->post('estado');
        $dados['pais']  			= $this->input->post('pais');
        if(isset($caminho)){
        $dados['img']  			    = $caminho;
        }

      //  print_r($dados);

        $pessoa_id = $this->pessoa->inserir($dados);
        
       // exit;
        redirect('/home', 'refresh');

		
    }


    public function inserirusuario(){

        

		$nascimento = $this->input->post('data_nascimento');
		$dataNascimento = DateTime::createFromFormat('d/m/Y', $nascimento);


        $dados['cpfcnpj']  			= $this->input->post('cpfcnpj');
        $dados['email']  			= $this->input->post('email');
        $dados['senha']  			= hash('sha512', $this->input->post('senha'));
        $dados['tipo_id']  			= $this->input->post('tipo_id');
        $dados['nome']  			= $this->input->post('nome');
        $dados['logradouro']  		= $this->input->post('logradouro');
        $dados['telefone']  		= $this->input->post('telefone');
        $dados['data_nascimento']  	= $dataNascimento->format('Y-m-d');
        $dados['observacao']  		= $this->input->post('observacao');
        $dados['escolaridade_id']  	= $this->input->post('escolaridade_id');
        $dados['cep']  				= $this->input->post('cep');
        $dados['cidade']  			= $this->input->post('cidade');
        $dados['bairro']  			= $this->input->post('bairro');
        $dados['numero']  			= $this->input->post('numero');
        $dados['complemento']  		= $this->input->post('complemento');
        $dados['estado']  			= $this->input->post('estado');
		$dados['pais']  			= $this->input->post('pais');

        $pessoa_id = $this->pessoa->inserir($dados);
            
        $this->session->sess_destroy();
        
        $this->session->userdata('logado');
        $this->session->set_userdata('logado', $retorna_pessoa);
        $this->session->set_userdata($novosdados);
		
    }

    

    public function novo(){

        if (!$this->session->userdata('logado') ||$this->session->userdata('tipo_acesso') == 'A' ) {
            header("location:".base_url('admin'));
        }

        $dados = null;

        $dados['tipopessoa']    	= $this->tipopessoa->retornaTipopessoa();
        $dados['escolaridade'] 	    = $this->escolaridade->retornaEscolaridade();
        $dados['pais']      	    = $this->pessoa->retornaPais();
        $this->template->load('template', 'novo_view', $dados);

    }


    public function lista(){

        if (!$this->session->userdata('logado') ||$this->session->userdata('tipo_acesso') == 'A' ) {
            header("location:".base_url('admin'));
        }

        $dados = null;
   
        $dados['pessoas']      	    = $this->pessoa->retornaTodos();
        $this->template->load('template', 'lista_view', $dados);

    }



    public function verificauser(){

        $cnpj  			        = $this->input->post('cnpj');
        $user     	            = $this->pessoa->verificauser($cnpj);
        echo json_encode($user);
    }




	public function editar(){

        if (!$this->session->userdata('logado') ||$this->session->userdata('tipo_acesso') == 'A' ) {
            header("location:".base_url('admin'));
        }

        $pessoa	= $this->uri->segment(3);
        

        $dados['tipopessoa']    	= $this->tipopessoa->retornaTipopessoa();
        $dados['escolaridade'] 	    = $this->escolaridade->retornaEscolaridade();
        $dados['pais']      	    = $this->pessoa->retornaPais();
		$dados['pessoa']        	= $this->pessoa->retornaPessoa($pessoa);
		$this->template->load('template', 'editar_view', $dados);

    }
    


	public function alterar(){

		
		$nascimento = $this->input->post('data_nascimento');
        $dataNascimento = DateTime::createFromFormat('d/m/Y', $nascimento);

        $id_usuario = $this->input->post('cpfcnpj');


        if (!empty($_FILES['foto']['name'])) {
       
                $upload_img = self::cwUpload('foto', 'img/fotos/', '', TRUE, 'img/fotos/thumbs/', '200', '160');
                $thumb_src = 'img/fotos/thumbs/' . $upload_img;
                $caminho = 'img/fotos/'.$upload_img;
        
        }


        $dados['id']  			    = $this->input->post('id');
        $dados['email']  			= $this->input->post('email');
        if($this->input->post('senha') <> ''){
             $dados['senha']  			= hash('sha512', $this->input->post('senha'));
        }
        $dados['tipo_id']  			= $this->input->post('tipo_id');
        $dados['nome']  			= $this->input->post('nome');
        $dados['logradouro']  		= $this->input->post('logradouro');
        $dados['telefone']  		= $this->input->post('telefone');
        $dados['data_nascimento']  	= $dataNascimento->format('Y-m-d');
        $dados['observacao']  		= $this->input->post('observacao');
        $dados['escolaridade_id']  	= $this->input->post('escolaridade_id');
        $dados['cep']  				= $this->input->post('cep');
        $dados['cidade']  			= $this->input->post('cidade');
        $dados['bairro']  			= $this->input->post('bairro');
        $dados['numero']  			= $this->input->post('numero');
        $dados['complemento']  		= $this->input->post('complemento');
        $dados['estado']  			= $this->input->post('estado');
        $dados['pais']  			= $this->input->post('pais');
        if(isset($caminho)){
        $dados['img']                  = $caminho;
        }
    


        $pessoa_id = $this->pessoa->alterarpessoa($dados);
       //  exit;
        redirect('/home', 'refresh');



    }








    /**
     *
     * Author: CodexWorld
     * Function Name: cwUpload()
     * $field_name => Input file field name.
     * $target_folder => Folder path where the image will be uploaded.
     * $file_name => Custom thumbnail image name. Leave blank for default image name.
     * $thumb => TRUE for create thumbnail. FALSE for only upload image.
     * $thumb_folder => Folder path where the thumbnail will be stored.
     * $thumb_width => Thumbnail width.
     * $thumb_height => Thumbnail height.
     *
     **/
    public function cwUpload($field_name = '', $target_folder = '', $file_name = '', $thumb = FALSE, $thumb_folder = '', $thumb_width = '', $thumb_height = '')
    {

        //folder path setup
        $target_path = $target_folder;
        $thumb_path = $thumb_folder;

        //file name setup
        $filename_err = explode(".", $_FILES[$field_name]['name']);
        $filename_err_count = count($filename_err);
        $file_ext = $filename_err[$filename_err_count - 1];
        if ($file_name != '') {
            $fileName = $file_name . '.' . $file_ext;
        } else {
            $fileName = $_FILES[$field_name]['name'];
        }

        //upload image path
        $upload_image = $target_path . basename($fileName);

        //upload image
        if (move_uploaded_file($_FILES[$field_name]['tmp_name'], $upload_image)) {
            //thumbnail creation
            if ($thumb == TRUE) {
                $thumbnail = $thumb_path . $fileName;
                list($width, $height) = getimagesize($upload_image);
                $thumb_create = imagecreatetruecolor($thumb_width, $thumb_height);
                switch ($file_ext) {
                    case 'jpg':
                        $source = imagecreatefromjpeg($upload_image);
                        break;
                    case 'jpeg':
                        $source = imagecreatefromjpeg($upload_image);
                        break;
                    case 'png':
                        $source = imagecreatefrompng($upload_image);
                        break;
                    case 'gif':
                        $source = imagecreatefromgif($upload_image);
                        break;
                    default:
                        $source = imagecreatefromjpeg($upload_image);
                }

                imagecopyresized($thumb_create, $source, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);
                switch ($file_ext) {
                    case 'jpg' || 'jpeg':
                        imagejpeg($thumb_create, $thumbnail, 100);
                        break;
                    case 'png':
                        imagepng($thumb_create, $thumbnail, 100);
                        break;
                    case 'gif':
                        imagegif($thumb_create, $thumbnail, 100);
                        break;
                    default:
                        imagejpeg($thumb_create, $thumbnail, 100);
                }
            }

            return $fileName;
        } else {
            return false;
        }
    }


}
