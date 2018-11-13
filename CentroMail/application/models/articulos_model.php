
<?php

class Articulos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //Metodo que mostrará todos los articulos
    public function get_articulos() {
        $consulta = $this->db->query('Select * from articulo;');
        return $consulta->result();
    }

    public function add_articulo() {
        $this->db->query('INSERT INTO articulo values(null, "' . 
                $this->input->post('titulo') . '", "' . $this->input->post('descripcion') . 
                '","' . $this->input->post('cuerpo') . '")');
    }

}



