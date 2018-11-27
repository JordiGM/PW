<?php

/**
 * Description of Usuario
 *
 * @author Jordi Güeto Matavera
 */
class Super_model extends CI_Model {
    public function _construct(){
        parent::__construct();
    }
    
    //Metodo que añade un usuario a la base de datos
    public function add_user(){
        $sPass = $this->encrypt->encode(
                $this->input->post('Contrasennia',TRUE));
        
        $this->db->insert('Usuario', array(
            //Utilizamos true para evitar inyecciones xss
            'Nombre'=>$this->input->post('Nombre',TRUE),
            'Correo'=>$this->input->post('Correo',TRUE),
            'Contrasennia'=>$sPass,
            'Annio'=>$this->input->post('Annio',TRUE),
            'Tipo'=>$this->input->post('Tipo',TRUE)
        ));
    }
    
    //Metodo que comprueba si el usuario existe o no
    public function verify_user($sName){
        $this->db->from('Usuario');
        $this->db->like('Nombre',$sName, 'none');
        $num_rows = $this->db->count_all_results();
        
        if($num_rows == 0){ //el usuario no existe
            return false;
        }else{ //el usuario existe
            return true; }
    }
    
    //Metodo que verifica la sesión del usuario
    public function verify_sesion(){
        $sPass = $this->encrypt->encode(
                $this->input->post('Contrasennia',TRUE));
        
        $consulta = $this->db->get_where('Usuario', array(
            //Utilizamos true para evitar inyecciones xss
            'Nombre'=>$this->input->post('Nombre',TRUE),
            'Contrasennia'=>$sPass));
        
        if($consulta->num_rows() == 1){ return true;}
        else { return false; }
    }

    //Metodo que busca a un usuario por su nombre
    public function get_user_name($sName){
        $this->db->from('Usuario');
        $this->db->select('Correo, Annio');
        $this->db->like('Nombre',$sName, 'both');
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Metodo que busca a un usuario por su correo
    public function get_user_mail($sMail){
        $this->db->from('Usuario');
        $this->db->select('Nombre, Annio');
        $this->db->like('Correo',$sMail, 'both');
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Metdodo que devuelve el tipo de usuario
    public function get_type_user($iIdUser){
        $this->db->from('Usuario');
        $this->db->select('Tipo');
        $this->db->where('id',$iIdUser);
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Metdodo que devuelve el id de usuario
    public function get_id_user($sName){
        $this->db->from('Usuario');
        $this->db->select('id');
        $this->db->like('Nombre',$sName, 'none');
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Metodo que devuelve los datos del usuario(menos la contraseña)
    public function get_user($iIdUser){
        $this->db->from('Usuario');
        $this->db->select('Nombre, Correo, Annio');
        $this->db->where('id',$iIdUser);
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Metodo que modifica el tipo de usuario
    public function set_type_user($iIdUser, $iType){
        $data = array('Tipo' => $iType);
        $this->db->where('id', $iIdUser);
        $update = $this->db->update('Usuario', $data);
        
        return $update->result_array();
    }
    
    //Metodo que modifica el correo electronico del usuario
    public function set_mail_user($iIdUser, $sMail){
        $data = array('Correo' => $sMail);
        $this->db->where('id', $iIdUser);
        $update = $this->db->update('Usuario', $data);
        
        return $update->result_array();
    }
    
    //Metodo que modifica el año de nacimiento del usuario
    public function set_year_user($iIdUser, $iYear){
        $data = array('Annio' => $iYear);
        $this->db->where('id', $iIdUser);
        $update = $this->db->update('Usuario', $data);
        
        return $update->result_array();
    }
    
    //Metodo que modifica la contraseña del usuario
    public function set_password_user($iIdUser, $sPassword){
        $sPass = $this->encrypt->endcode($sPassword);
        
        $data = array('Contrasennia' => $sPass);
        $this->db->where('id', $iIdUser);
        $update = $this->db->update('Usuario', $data);
        
        return $update->result_array();
    }
}