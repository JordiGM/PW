
<?php

class Usuarios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //Comprueba si el usuario existe o no
    public function verify_user($user) {
        $consulta = $this->db->query("select * from usuario where usuario = '" . $user . "'");
        if ($consulta->num_rows == 0) {
            return false;
        } else {
            return true;
        }
    }

    //añade un usuario
    public function add_usuario() {
        $this->db->insert('usuario', array(
            'nombre' => $this->input->post('nombre', TRUE),
            'correo' => $this->input->post('correo', TRUE),
            'usuario' => $this->input->post('usuario', TRUE),
            'pass' => $this->input->post('pass', TRUE),
            'codigo' => '123456',
            'estado' => '0'));
    }
    
    public function verify_sesion(){
        $consulta = $this->db->get_where('usuario', array(
            'usuario'=>$this->input->post('user', TRUE),
            'pass'=>$this->input->post('pass', TRUE)));
        
        if($consulta->num_rows() == 1){
            return true;
        }else{
            return false;
        }
    }

}
