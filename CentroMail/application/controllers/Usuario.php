<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Jordi Güeto Matavera && Pablo Piedad Garrido
 */
error_reporting(E_ALL ^ E_DEPRECATED);


class Usuario extends CI_Controller {

    public function _construct(){
        parent::_construct();
    }

    public function index() { 
        $this->load->view("usuario_view");
    }
    
   public function register(){
       $this->load->view("registro_view");
   }
   public function logout(){
       redirect(base_url());
   }
   
   public function mostrarDatos($id){
       $data = array('usuarios' => $this->Super_model->get_user($id));
       $this->load->view("mostrarUser_view", $data);
   }
   
   public function verifyRegister(){
       if($this->input->post('submit_reg')){
           $this->form_validation->set_rules('Nombre', 'Nombre', 'required');
           $this->form_validation->set_rules('Correo', 'Correo', 
                   'required|valid_email|trim');
           $this->form_validation->set_rules('Usuario', 'Usuario',
                   'required|trim|callback_verify_user');
           $this->form_validation->set_rules('Annio', 'Año de nacimiento',
                   'required|min_length[4]|max_length[4]');//Asi el año de nacimiento solo puede ser un numero de 4 cifras
           $this->form_validation->set_rules('Contrasennia', 'Contraseña',
                   'required|trim');
           $this->form_validation->set_rules('Contrasennia2', 'Repetir contraseña',
                   'required|trim|matches[Contrasennia]');
           
           $this->form_validation->set_message('required', 'El campo %s es obligatorio');
           $this->form_validation->set_message('valid_email', 'El campo %s es invalido');
           $this->form_validation->set_message('min_length', 'El campo {field} debe tener al menos {param} caracteres');
           $this->form_validation->set_message('max_length', 'El campo {field} debe tener como mucho {param} caracteres');
           $this->form_validation->set_message('verify_user', 'El usuario ya existe');
           $this->form_validation->set_message('matches', 'El campo %s es distinto que el campo %s');
           
           if($this->form_validation->run() == FALSE){
               $this->register();
           }
           else{
               $this->Super_model->add_user();
               $datos = array('mensaje' => 'El usuario se ha registrado correctamente', 'id' => $this->db->insert_id());
               $this->load->view('usuario_view', $datos);
           }
        }
    }
    
    function verify_user($sName){
        $var = $this->Super_model->verify_user($sName);
        if($var == true){
            return false;
        }else{
            return true;
        }
        
    }
   
   public function verify_sesion(){
       if($this->input->post('submit')){
           $bVar = $this->Super_model->verify_sesion();
           if($bVar == true){
               $variables = array('usuario' =>$this->input->post('Nombre'));
               $this->session->set_userdata($variables);
               redirect(base_url() . 'index.php/Welcome/log');
           } else{
               $mensaje = array('mensaje' => 'El usuario/contraseña no son correctos');
               $this->load->view('usuario_view', $mensaje);
           }
       }
   }
   
    //$datos = array('usuarios' => $this->Super_model->get_user_name('') );
        
      //  $this->load->view('usuario_view', $datos);
    
    
}