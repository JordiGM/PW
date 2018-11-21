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
        parent::__construct();
    }
    
    public function index(){
        $this->load->view('usuario_view');
    }
}
