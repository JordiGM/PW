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


class Buscador extends CI_Controller {

    public function _construct(){
        parent::_construct();
    }
//pagina principal
    public function index() { 
        $this->load->view("Buscador_view");
    }
//primer filtro
	public function BuscarJuegos(){
		$this->load->view("BuscaJuegos_view");
	}
	public function BuscarUsuarios(){
		$this->load->view("BuscaUsuario_view");
	}
//filtros para juegos
	public function BusquedaJEdad(){
		$this->load->view("BusquedaJEdad_view");
	}
		public function BusquedaJNombre(){
		$this->load->view("BusquedaJNombre_view");
	}
		public function BusquedaJProductora(){
		$this->load->view("BusquedaJProductora_view");
	}
		public function BusquedaJTipo(){
		$this->load->view("BusquedaJTipo_view");
	}
		public function BusquedaJValoracion(){
		$this->load->view("BusquedaJValoracion_view");
	}
//filtro para usuarios
		public function BusquedaUNombre(){
		$this->load->view("BusquedaUNombre_view");
	}
		public function BusquedaUNick(){
		$this->load->view("BusquedaUNick_view");
	}
	//busqueda y muestra de resultados
	public function BusquedaJPorNombre(){
	$data=array();
		$this->form_validation->set_rules('Nombre','Nombre del Juego','required');
		$this->form_validation->set_message('required','El campo %s es obligatorio.');
		if ($this->form_validation->run() ==FALSE){
			 $this->index();
		 }else{
			 $nombre = $this->input->post('Nombre');
			 $data= $this->Super_model->get_juego_title($nombre);
			 
			 
			 $this->load->view('JuegosEncontrados_view',$data);
		}
	 }
	 	public function BusquedaJPorEdad(){/*
		$this->form_validation->set_rules('Edad','Edad recomendada del Juego','required');
		$this->form_validation->set_message('required','El campo %s es obligatorio.');
		if ($this->form_validation->run() ==FALSE){
			 $this->index();
		 }else{
			 $edad = $this->input->post('edad');
			 $this->load->model('Super_model');
			 $data= $this->super_model->($edad);
			 $this->load->view('JuegosEncontrados',$data);
		}*/
	 }
public function BusquedaJPorProductora(){/*
		$this->form_validation->set_rules('Productora','Productora del Juego','required');
		$this->form_validation->set_message('required','El campo %s es obligatorio.');
		if ($this->form_validation->run() ==FALSE){
			 $this->index();
		 }else{
			 $productora = $this->input->post('productora');
			 $this->load->model('Super_model');
			 $data= $this->super_model->($productora);
			 $this->load->view('JuegosEncontrados',$data);
		}*/
	 }
public function BusquedaJPorTipo(){/*
		$this->form_validation->set_rules('Tipo','Genero del Juego','required');
		$this->form_validation->set_message('required','El campo %s es obligatorio.');
		if ($this->form_validation->run() ==FALSE){
			 $this->index();
		 }else{
			 $tipo = $this->input->post('Tipo');
			 $this->load->model('Super_model');
			 $data= $this->super_model->($tipo);
			 $this->load->view('JuegosEncontrados',$data);
		}*/
	 }
	 public function BusquedaJPorValoracion(){/*
		$this->form_validation->set_rules('Valoracion','Valoracion del Juego','required');
		$this->form_validation->set_message('required','El campo %s es obligatorio.');
		if ($this->form_validation->run() ==FALSE){
			 $this->index();
		 }else{
			 $valoracion = $this->input->post('Valoracion');
			 $this->load->model('Super_model');
			 $data= $this->super_model->($valoracion);
			 $this->load->view('JuegosEncontrados',$data);
		}*/
	 }
public function BusquedaUPorNick(){/*
		$this->form_validation->set_rules('Nick','Nick del usuario','required');
		$this->form_validation->set_message('required','El campo %s es obligatorio.');
		if ($this->form_validation->run() ==FALSE){
			 $this->index();
		 }else{
			 $nick = $this->input->post('nick');
			 $this->load->model('Super_model');
			 $data= $this->super_model->($nick);
			 $this->load->view('UsuariosEncontrados',$data);
		}*/
	 }
	 public function BusquedaUPorNombre(){/*
		$this->form_validation->set_rules('Nombre','Nombre del usuario','required');
		$this->form_validation->set_message('required','El campo %s es obligatorio.');
		if ($this->form_validation->run() ==FALSE){
			 $this->index();
		 }else{
			 $nombre = $this->input->post('nombre');
			 $this->load->model('Super_model');
			 $data= $this->super_model->($nombre);
			 $this->load->view('UsuariosEncontrados',$data);
		}*/
	 }
	 
}