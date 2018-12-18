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


class InformacionJuego extends CI_Controller {

    public function _construct(){
        parent::_construct();
    }
//pagina principal
    public function mostrarJuego($id) {
		$data=$this->Super_model->get_juego($id);
        $this->load->view("PaginaJ_view",compact($data));
    }
}