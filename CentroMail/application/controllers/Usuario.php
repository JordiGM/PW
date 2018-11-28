<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Jordi Güeto Matavera
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
   
   public function verifyRegister(){
       
   }
   
   public function verifySession(){
       if($this->input->post('submit')){
           $bVar = $this->Super_model->verify_sesion();
           if($bVar == true){
               $variables = array('usuario' =>$this->input->post('user'));
               $this->session->set_userdata($variables);
               redirect(base_url() . 'index.php/CentroMail');
           } else{
               $mensaje = array('mensaje' => 'El usuario/contraseña no son correctos');
               $this->load->view('usuario_view', $mensaje);
           }
       }
   }
   
    //$datos = array('usuarios' => $this->Super_model->get_user_name('') );
        
      //  $this->load->view('usuario_view', $datos);
    
    
}