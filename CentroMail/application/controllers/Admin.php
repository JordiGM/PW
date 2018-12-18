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


class Admin extends CI_Controller {

    public function _construct(){
        parent::_construct();
    }

    public function index() {
        $this->load->view("admin/admin_view");
    }
   
    public function RegistroProductora(){
        $this->load->view("admin/registro/productora_view");
    }
    
    public function verifyRegisterProductora($id){
       if($this->input->post('submit_reg')){
           $this->form_validation->set_rules('Nombre', 'Nombre', 'required|callback_verify_productora_name|max_length[64]');
           
           $this->form_validation->set_message('required', 'El campo %s es obligatorio');
           $this->form_validation->set_message('max_length', 'El campo {field} debe tener como mucho {param} caracteres');
           $this->form_validation->set_message('verify_productora_name', 'La productora ya existe');
           
           if($this->form_validation->run() == FALSE){
               $this->RegistroProductora();
           }
           else{
               if($id != 0){
                   $this->Super_model->set_name_productora($id,$this->input->post('Nombre',TRUE));
                   $mensaje = array('mensaje' => 'La productora se ha actualizado correctamente');
               }else{
                   $this->Super_model->add_productora();
                   $mensaje = array('mensaje' => 'La productora se ha registrado correctamente');
               }
               $this->load->view('admin/admin_view', $mensaje);
           }
        }
    }
    
    function verify_productora_name($sName){
        $var = $this->Super_model->verify_productora($sName);
        if($var == true){
            return false;
        }else{
            return true;
        }
        
    }
    
    public function MostrarProductoras($tipo){
        $datos =  array('productoras' => $this->Super_model->get_productora_all());
        if($tipo){
            $this->load->view("admin/eliminar/productora_view", $datos);
        }else{
            $this->load->view("admin/actualizacion/productora_view", $datos);
            
        }
    }
    
    public function formActualizacionProductora($id){
        $data = array("productora" => $this->Super_model->get_productora($id));
        $this->load->view("admin/actualizacion/formProductora_view", $data);
    }
    
    public function verifyEliminarProductora($id){
        if($this->input->post('submit_si')){
            if(!$this->Super_model->get_juego_productora($id)){
                $this->Super_model->remove_productora($id);
                $mensaje = array('mensaje' => "Productora eliminada");
            }else{
                $mensaje = array('mensaje' => "La productora tienen dependencias y no puede ser eliminada");
            }
        }
        else{
            $mensaje = array('mensaje' => 'Cancelado proceso de eliminación de productora');
        }
        $this->load->view('admin/admin_view', $mensaje);
    }
}