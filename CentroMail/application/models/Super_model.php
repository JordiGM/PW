<?php

/**
 * @author Jordi Güeto Matavera
 */
class Super_model extends CI_Model {
    public function _construct(){
        parent::__construct();
    }
    
    
    /**
     *          Metodos de la tabla Usuario
     */
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
    
    
    
    
    /**
     *          Metodos de CalificacionesEdad
     */
    
    //Método que devuelve la calificación por edad de un juego
    public function get_ageCalification ($iIdAgeCali){
        $this->db->from('CalificacionEdad');
        $this->db->where('id', $iIdAgeCali);
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Metodo que añade una calificación por edad a la base de datos
    public function add_ageCalification(){
        $this->db->insert('CalificaciónEdad', array(
            //Utilizamos true para evitar inyecciones xss
            'Nombre'=>$this->input->post('Nombre',TRUE),
            'Imagen'=>$this->input->post('Imagen',TRUE),
            'Descripcion'=>$this->input->post('Descripcion',TRUE),
        ));
    }
    
    //Metodo que modifica el nombre de la calificación por edad
    public function set_name_ageCalification($iId, $sName){
        $data = array('Nombre' => $sName);
        $this->db->where('id', $iId);
        $this->db->update('CalificacionEdad', $data);
    }
    
    //Metodo que modifica el nombre de la calificación por edad
    public function set_img_ageCalification($iId, $sUrl){
        $data = array('Imagen' => $sUrl);
        $this->db->where('id', $iId);
        $this->db->update('CalificacionEdad', $data);
    }
    
    //Metodo que modifica la descripción de la calificación por edad
    public function set_description_ageCalification($iId, $sDescription){
        $data = array('Descripcion' => $sDescription);
        $this->db->where('id', $iId);
        $this->db->update('CalificacionEdad', $data);
    }
    
    //Metodo que elimina la calificación por edad
    public function remove_ageCalification($iId){
        $this->db->where('id', $iId);
        $this->db->delete('CalificacionEdad');
    }
    
    
    
    
    /**
     *          Metodos de CalificacionesContenido
     */
    
    //Método que devuelve la calificación por contenido de un juego
    public function get_contentCalification ($iIdContentCali){
        $this->db->from('CalificacionContenido');
        $this->db->where('id', $iIdContentCali);
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Metodo que añade una calificación por contenido a la base de datos
    public function add_contentCalification(){
        $this->db->insert('CalificaciónContenido', array(
            //Utilizamos true para evitar inyecciones xss
            'Nombre'=>$this->input->post('Nombre',TRUE),
            'Imagen'=>$this->input->post('Imagen',TRUE),
            'Descripcion'=>$this->input->post('Descripcion',TRUE),
        ));
    }
    
    //Metodo que modifica el nombre de la calificación por contenido
    public function set_name_contentCalification($iId, $sName){
        $data = array('Nombre' => $sName);
        $this->db->where('id', $iId);
        $this->db->update('CalificacionContenido', $data);
    }
    
    //Metodo que modifica el nombre de la calificación por contenido
    public function set_img_contentCalification($iId, $sUrl){
        $data = array('Imagen' => $sUrl);
        $this->db->where('id', $iId);
        $this->db->update('CalificacionContenido', $data);
    }
    
    //Metodo que modifica la descripción de la calificación por contenido
    public function set_description_contentCalification($iId, $sDescription){
        $data = array('Descripcion' => $sDescription);
        $this->db->where('id', $iId);
        $this->db->update('CalificacionContenido', $data);
    }
    
    //Metodo que elimina la calificación por contenido
    public function remove_contentCalification($iId){
        $this->db->where('id', $iId);
        $this->db->delete('CalificacionContenido');
    }
    
    
    
    
    /**
     *          Metodos de Genero
     */
    
    //Método que devuelve la información de un genero
    public function get_genero ($iIdGenero){
        $this->db->from('Genero');
        $this->db->where('id', $iIdGenero);
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Metodo que añade un genero a la base de datos
    public function add_genero(){
        $this->db->insert('Genero', array(
            //Utilizamos true para evitar inyecciones xss
            'Nombre'=>$this->input->post('Nombre',TRUE),
            'Descripcion'=>$this->input->post('Descripcion',TRUE),
        ));
    }
    
    //Metodo que modifica el nombre del genero
    public function set_name_genero($iId, $sName){
        $data = array('Nombre' => $sName);
        $this->db->where('id', $iId);
        $this->db->update('Genero', $data);
    }
    
    //Metodo que modifica la drescripción del genero
    public function set_description_genero($iId, $sDescription){
        $data = array('Descripcion' => $sDescription);
        $this->db->where('id', $iId);
        $this->db->update('Genero', $data);
    }
    
    //Metodo que elimina el genero
    public function remove_genero($iId){
        $this->db->where('id', $iId);
        $this->db->delete('Genero');
    }
    
    
        
    
    /**
     *          Metodos de Productora
     */
    
    //Método que devuelve la información de una productora
    public function get_productora ($iIdProductora){
        $this->db->from('Propductora');
        $this->db->where('id', $iIdProductora);
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Metodo que añade una productora a la base de datos
    public function add_productora(){
        $this->db->insert('Productora', array(
            //Utilizamos true para evitar inyecciones xss
            'Nombre'=>$this->input->post('Nombre',TRUE),
        ));
    }
    
    //Metodo que modifica el nombre de la productora
    public function set_name_productora($iId, $sName){
        $data = array('Nombre' => $sName);
        $this->db->where('id', $iId);
        $this->db->update('Productora', $data);
    }
    
    //Metodo que elimina la productora
    public function remove_productora($iId){
        $this->db->where('id', $iId);
        $this->db->delete('Productora');
    }
    
    
        
    
    /**
     *          Metodos de Compannia
     */
    
    //Método que devuelve la información de una compañia
    public function get_compannia ($iIdCompannia){
        $this->db->from('Compannia');
        $this->db->where('id', $iIdCompannia);
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Metodo que añade una compañia a la base de datos
    public function add_compannia(){
        $this->db->insert('Compannia', array(
            //Utilizamos true para evitar inyecciones xss
            'Nombre'=>$this->input->post('Nombre',TRUE),
        ));
    }
    
    //Metodo que modifica el nombre de la compañia
    public function set_name_compannia($iId, $sName){
        $data = array('Nombre' => $sName);
        $this->db->where('id', $iId);
        $this->db->update('Compannia', $data);
    }
    
    //Metodo que elimina la compañia
    public function remove_compannia($iId){
        $this->db->where('id', $iId);
        $this->db->delete('Compannia');
    }
    
    
        
    
    /**
     *          Metodos de Plataforma
     */
    
    //Método que devuelve la información de una plataforma
    public function get_plataform ($iIdPlataform){
        $this->db->from('Plataforma');
        $this->db->where('id', $iIdPlataform);
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Metodo que añade una plataforma a la base de datos
    public function add_plataform(){
        $this->db->insert('Plataforma', array(
            //Utilizamos true para evitar inyecciones xss
            'Nombre'=>$this->input->post('Nombre',TRUE),
        ));
    }
    
    //Metodo que modifica el nombre de la plataforma
    public function set_name_plataform($iId, $sName){
        $data = array('Nombre' => $sName);
        $this->db->where('id', $iId);
        $this->db->update('Plataforma', $data);
    }
    
    //Metodo que elimina la plataforma
    public function remove_plataform($iId){
        $this->db->where('id', $iId);
        $this->db->delete('Plataforma');
    }
}