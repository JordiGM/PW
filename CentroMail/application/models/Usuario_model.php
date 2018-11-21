<?php

/**
 * Description of Usuario
 *
 * @author Jordi Güeto Matavera
 */
class Usuario_model extends CI_Model {
    public function _construct(){
        parent::__construct();
    }
    
    //Metodo que añade un usuario a la base de datos
    public function add_usuario(){
        $this->db->insert('Usuario', array(
            //Utilizamos true para evitar inyecciones xss
            'Nombre'=>$this->input->post('Nombre',TRUE),
            'Correo'=>$this->input->post('Correo',TRUE),
            'Contrasennia'=>$this->input->post('Contrasennia',TRUE),
            'Annio'=>$this->input->post('Annio',TRUE),
            'Tipo'=>$this->input->post('Tipo',TRUE)
        ));
    }
    
    //Metodo que comprueba si el usuario existe o no
    public function verify_user($sUser){
        $sSql = "SELECT id, Correo, Annio FROM Usuario WHERE Nombre LIKE '%" . $sUser . "%';";
        $consulta = mysql_query($sSql);
        
        if(mysql_numrows($consulta) == 0){ //el usuario no existe
            return false;
        }else{ //el usuario existe
            return true;
        }
    }
    
    //Metodo que verifica la sesión del usuario
    public function verify_sesion(){
        $consulta = $this->db->get_where('Usuario', array(
            //Utilizamos true para evitar inyecciones xss
            'Nombre'=>$this->input->post('Nombre',TRUE),
            'Contrasennia'=>$this->input->post('Contrasennia',TRUE)
        ));
        
        if($consulta->num_rows() == 1){ return true;}
        else { return false; }
    }

    //Metodo que busca a un usuario por su nombre
    public function get_usuario_nombre($sNombre){
        $consulta = $this->db->query("SELECT id, Correo, Annio FROM Usuario WHERE Nombre LIKE '%" . $sNombre . "%';");
        
        return $consulta->result();
    }
    
    //Metodo que busca a un usuario por su nombre
    public function get_usuario_correo($sCorreo){
        $consulta = $this->db->query("SELECT id, Nombre, Annio FROM Usuario WHERE Correo LIKE '%" . $sCorreo . "%';");
        
        return $consulta->result();
    }
}
