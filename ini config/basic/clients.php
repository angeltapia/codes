<?php

class Clientes extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('cliente_model');
        $this->load->model('empresa_model');
    }


    public function index(){
        
        $data['listado'] = $this->cliente_model->get_clientes();
        //$data['empresas'] = $this->cliente_model->get_clientes_empresas();
        $data['empresas'] = $this->empresa_model->get_empresas();        
        
        $this->load->view('clientes_view',$data);
        
    }        
    
    public function insertar(){
        
        $lis=$this->empresa_model->get_empresas();
        $datos=array();
        foreach ($lis as $i){
            $datos[$i->accountid] = $i->accountname;
        }
        $data['empresas'] = $datos;
        
        if($this->input->post()){
        $this->form_validation->set_rules('firstname','Nombre','required|min_length[2]');  
        $this->form_validation->set_rules('lastname','Apellido','required');  
        $this->form_validation->set_message('required','El campo %s es obligatorio');
        $this->form_validation->set_message('valid_email','Por favor ingrese un email válido');
        $this->form_validation->set_rules('email','Email','valid_email');
        
        if( $this->form_validation->run() == false ){
            
            $this->load->view('clientes_form_view',$data);
            return false;
            
        }else{
           $result = $this->cliente_model->insertar();
           if($result != ""){
               $this->session->set_flashdata('msgexito','Datos grabados correctamente');
               redirect('clientes');
               
           }
        }
        
        }else{
            $this->load->view('clientes_form_view',$data);
        }
    }
    
 public function editar($id){
        
        if($id != ""){
            
            $lis=$this->empresa_model->get_empresas();
        $datos=array();
        foreach ($lis as $i){
            $datos[$i->accountid] = $i->accountname;
        }
        $data['empresas'] = $datos;
        
            
            if($this->input->post()){
        $this->form_validation->set_rules('firstname','Nombre','required|min_length[2]');  
        $this->form_validation->set_rules('lastname','Apellido','required');  
        $this->form_validation->set_message('required','El campo %s es obligatorio');
        $this->form_validation->set_message('valid_email','Por favor ingrese un email válido');
        $this->form_validation->set_rules('email','Email','valid_email');
        
        $this->form_validation->set_rules('accountid','Empresa','required');
        $this->form_validation->set_rules('contact_no','Codigo','trim');
        
            if( $this->form_validation->run() == true ){
            $result = $this->cliente_model->editar($id);
           if($result != ""){
               $this->session->set_flashdata('msgexito','Datos grabados correctamente');
               redirect('clientes');
               
           }                        
            
        }else{
           $this->load->view('clientes_form_view',$data);
        }
                
            }else{
                $data['dato_cliente'] = $this->cliente_model->get_clientes($id);                
                $this->load->view('clientes_form_view',$data);
                
            }
            
            
        }else{
            redirect('clientes');
        }
        
        
    }
}
