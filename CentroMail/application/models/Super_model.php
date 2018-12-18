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
//        $sPass = $this->encrypt->encode(
//                $this->input->post('Contrasennia',TRUE));
        
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
       // $sPass = $this->encrypt->encode(
         //       $this->input->post('Contrasennia',TRUE));
        
        $consulta = $this->db->get_where('Usuario', array(
            //Utilizamos true para evitar inyecciones xss
            'Nombre'=>$this->input->post('Nombre',TRUE),
            'Contrasennia'=>$this->input->post('Contrasennia', TRUE)));
        
        if($consulta->num_rows() == 1){ return true;}
        else { return false; }
    }

    //Metodo que devuelve todos los usuarios
    public function get_user_all(){
        $this->db->from('Usuario');
        $this->db->select('Nombre, Correo, Annio');
        $this->db->order_by('Nombre', 'ASC');
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Metodo que busca a un usuario por su nombre
    public function get_user_name($sName){
        $this->db->from('Usuario');
        $this->db->select('Correo, Annio');
        $this->db->like('Nombre',$sName, 'both');
        $this->db->order_by('Nombre', 'ASC');
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Metodo que busca a un usuario por su correo
    public function get_user_mail($sMail){
        $this->db->from('Usuario');
        $this->db->select('Nombre, Annio');
        $this->db->like('Correo',$sMail, 'both');
        $this->db->order_by('Nombre', 'ASC');
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
        $this->db->select('id, Nombre');
        $this->db->like('Nombre',$sName, 'none');
        $this->db->order_by('Nombre', 'ASC');
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
    
    //Metodo que elimina un usuario
    public function remove_user($iId){
        $this->db->where('id', $iId);
        $this->db->delete('Usuario');
    }
    
    
    
    
    /**
     *          Metodos de CalificacionesEdad
     */
    
    //Método que devuelve todas las calificaciones
    public function get_ageCalification_all (){
        $this->db->from('CalificacionEdad');
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
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
            'Descripcion'=>$this->input->post('Descripcion',TRUE)
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
    
    //Método que devuelve todas las calificaciones
    public function get_contentCalification_all (){
        $this->db->from('CalificacionContenido');
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
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
            'Descripcion'=>$this->input->post('Descripcion',TRUE)
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
    
    //Método que devuelve todos los generos
    public function get_genero_all (){
        $this->db->from('Genero');
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
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
            'Descripcion'=>$this->input->post('Descripcion',TRUE)
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
    
    //Método que devuelve todas las productoras
    public function get_productora_all (){
        $this->db->from('Productora');
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Método que devuelve la información de una productora
    public function get_productora ($iIdProductora){
        $this->db->from('Productora');
        $this->db->where('id', $iIdProductora);
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Metodo que comprueba si la productora existe o no
    public function verify_productora($sName){
        $this->db->from('Productora');
        $this->db->like('Nombre',$sName, 'none');
        $num_rows = $this->db->count_all_results();
        
        if($num_rows == 0){
            return false;
        }else{
            return true; }
    }
    
    //Metodo que añade una productora a la base de datos
    public function add_productora(){
        $this->db->insert('Productora', array(
            //Utilizamos true para evitar inyecciones xss
            'Nombre'=>$this->input->post('Nombre',TRUE)
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
    
     //Método que devuelve todas las compañias
    public function get_compannia_all (){
        $this->db->from('Compannia');
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
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
            'Nombre'=>$this->input->post('Nombre',TRUE)
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
    
    //Método que devuelve todas las plataformas
    public function get_plataform_all (){
        $this->db->from('Plataforma');
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
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
            'Nombre'=>$this->input->post('Nombre',TRUE)
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
    
    
        
    
    /**
     *          Metodos de Juego
     */
    
    //Método que devuelve todos los juegos
    public function get_juego_title_all (){
        $this->db->from('Juego');
        $this->db->order_by('Titulo', 'ASC');
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Método que devuelve la información de un juego
    public function get_juego_title ($sName){
        $this->db->from('Juego');
        $this->db->like('Titulo', $sName, 'none');
        $this->db->order_by('Titulo', 'ASC');
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Método que devuelve la información de un juego
    public function get_juego ($iIdJuego){
        $this->db->from('Juego');
        $this->db->where('id', $iIdJuego);
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Metodo que añade un juego a la base de datos
    public function add_juego(){
        $this->db->insert('Juego', array(
            //Utilizamos true para evitar inyecciones xss
            'Titulo'=>$this->input->post('Titulo',TRUE),
            'Annio'=>$this->input->post('Annio',TRUE),
            'ValoracionMedia'=>0.0,
            'Descripcion'=>$this->input->post('Descripcion',TRUE),
            'Genero'=>$this->input->post('Genero',TRUE),
            'CalificacionEdad'=>$this->input->post('CalificacionEdad',TRUE),
            'Productora'=>$this->input->post('Productora',TRUE),
            'Imagen'=>$this->input->post('Imagen',TRUE)
        ));
        
        $iIdJuego = $this->db->insert_id();
        
        $this->db->insert('PlataformaJuego', array(
            //Utilizamos true para evitar inyecciones xss
            'Juego_id'=>$iIdJuego,
            'Plataforma_id'=>$this->input->post('Plataforma',TRUE)
        ));
        
        $this->db->insert('JuegoCalificacionContenido', array(
            //Utilizamos true para evitar inyecciones xss
            'Juego_id'=>$iIdJuego,
            'CalificacionContenido_id'=>$this->input->post('CalificacionContenido',TRUE)
        ));
    }
    
    //Método que devuelve la información del titulo de juego
    public function get_titulo_juego ($iIdJuego){
        $this->db->select('Titulo');
        $this->db->from('Juego');
        $this->db->where('id', $iIdJuego);
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Método que devuelve la información del año de juego
    public function get_annio_juego ($iIdJuego){
        $this->db->select('Annio');
        $this->db->from('Juego');
        $this->db->where('id', $iIdJuego);
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Método que devuelve la información del valoración media de juego
    public function get_valoracionMedia_juego ($iIdJuego){
        $this->db->select('ValoracionMedia');
        $this->db->from('Juego');
        $this->db->where('id', $iIdJuego);
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Método que devuelve la información de la descripcion de juego
    public function get_descripcion_juego ($iIdJuego){
        $this->db->select('Descripcion');
        $this->db->from('Juego');
        $this->db->where('id', $iIdJuego);
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Método que devuelve la información del genero de juego
    public function get_genero_juego ($iIdJuego){
        $this->db->select('Genero');
        $this->db->from('Juego');
        $this->db->where('id', $iIdJuego);
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Método que devuelve la información de la Calificacion Edad de juego
    public function get_calificacionEdad_juego ($iIdJuego){
        $this->db->select('CalificacionEdad');
        $this->db->from('Juego');
        $this->db->where('id', $iIdJuego);
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Método que devuelve la información de la productora de juego
    public function get_productora_juego ($iIdJuego){
        $this->db->select('Productora');
        $this->db->from('Juego');
        $this->db->where('id', $iIdJuego);
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Método que devuelve la información de la imagen de juego
    public function get_imagen_juego ($iIdJuego){
        $this->db->select('Imagen');
        $this->db->from('Juego');
        $this->db->where('id', $iIdJuego);
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Metodo que modifica el nombre del juego
    public function set_name_juego($iId, $sName){
        $data = array('Titulo' => $sName);
        $this->db->where('id', $iId);
        $this->db->update('Juego', $data);
    }
    
    //Metodo que modifica el annio del juego
    public function set_annio_juego($iId, $iAnnio){
        $data = array('Annio' => $iAnnio);
        $this->db->where('id', $iId);
        $this->db->update('Juego', $data);
    }
    
    //Metodo que modifica la descripción del juego
    public function set_descripcion_juego($iId, $sDescripcion){
        $data = array('Descripcion' => $sDescripcion);
        $this->db->where('id', $iId);
        $this->db->update('Juego', $data);
    }
    
    //Metodo que modifica el genero del juego
    public function set_genero_juego($iId, $iGenero){
        $data = array('Genero' => $iGenero);
        $this->db->where('id', $iId);
        $this->db->update('Juego', $data);
    }
    
    //Metodo que modifica la calificacion por edad del juego
    public function set_calificacionEdad_juego($iId, $iCalificacionEdad){
        $data = array('CalificacionEdad' => $iCalificacionEdad);
        $this->db->where('id', $iId);
        $this->db->update('Juego', $data);
    }
    
    //Metodo que modifica la productora del juego
    public function set_productora_juego($iId, $iProductora){
        $data = array('Productora' => $iProductora);
        $this->db->where('id', $iId);
        $this->db->update('Juego', $data);
    }
    
    //Metodo que modifica la imagen del juego
    public function set_imagen_juego($iId, $sImagen){
        $data = array('Imagen' => $sImagen);
        $this->db->where('id', $iId);
        $this->db->update('Juego', $data);
    }
    
    //Metodo que elimina el juego
    public function remove_juego($iId){
        $this->db->where('id', $iId);
        $this->db->delete('Juego');
    }
    
    //------ Búsquedas --------
    public function buscar_valoracion($fMedia){
        $this->db->select('*');
        $this->db->from('Juego');
        $this->db->where('ValoracionMedia', $fMedia);
        $this->db->order_by('Titulo', 'ASC');
        $consulta = $this->db->get();
        
        return $consulta->result_array;
    }
    
    
        
    
    /**
     *          Metodos de Nick
     */
    
    //Método que devuelve todos los nicks
    public function get_nick_all (){
        $this->db->from('Nick');
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Método que devuelve la información de un Nick
    public function get_nick ($iIdJuego, $iIdUsuario){
        $this->db->from('Nick');
        $this->db->where('Juego_id', $iIdJuego);
        $this->db->where('Usuario_id', $iIdUsuario);
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Metodo que añade un nick a la base de datos
    public function add_nick(){
        $this->db->insert('Nick', array(
            //Utilizamos true para evitar inyecciones xss
            'Nick'=>$this->input->post('Nick',TRUE),
            'Usuario_id'=>$this->input->post('Usuario',TRUE),
            'Juego_id'=>$this->input->post('Juego',TRUE)
        ));
    }
    
    //Método que devuelve el id del nick
    public function get_nick_id ($iIdJuego, $iIdUsuario){
        $this->db->select('id');
        $this->db->from('Nick');
        $this->db->where('Juego_id', $iIdJuego);
        $this->db->where('Usuario_id', $iIdUsuario);
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Método que devuelve la información de los nicks que tiene un juego
    public function get_nick_juego ($iIdJuego){
        $this->db->select('Nick, Usuario_id');
        $this->db->from('Nick');
        $this->db->where('Juego_id', $iIdJuego);
        $this->db->order_by('Nick', 'ASC');
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Método que devuelve los nicks que tiene un usuario
    public function get_nick_usuario ($iIdUsuario){
        $this->db->select('Nick, Juego_id');
        $this->db->from('Nick');
        $this->db->where('Usuario_id', $iIdUsuario);
        $this->db->order_by('Nick', 'ASC');
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Método que devuelve en que juegos esta un nick
    //y que usuarios lo utilizan
    public function get_usuario_juego_nick ($sNick){
        $this->db->select('Usuario_id, Juego_id');
        $this->db->from('Nick');
        $this->db->like('Nick', $sNick, 'both');
        $this->db->order_by('Nick', 'ASC');
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Metodo que modifica el nick de un juego de un usuario
    public function set_nick_juego_usuario($iIdUsuario, $iIdJuego, $sNick){
        $data = array('Nick' => $sNick);
        $this->db->where('Juego_id', $iIdJuego);
        $this->db->where('Usuario_id', $iIdUsuario);
        $this->db->update('Nick', $data);
    }
    
    //Metodo que elimina el nick
    public function remove_nick($iId){
        $this->db->where('id', $iId);
        $this->db->delete('Nick');
    }
    
    
        
    
    /**
     *          Metodos de Valoración
     */
    
    //Método que devuelve todas las valoraciones
    public function get_valoracion_all (){
        $this->db->from('Valoracion');
        $this->db->order_by('Fecha', 'ASC');
        $this->db->order_by('Hora', 'ASC');
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Método que devuelve la información de una valoración
    public function get_valoracion ($iIdJuego, $iIdUsuario){
        $this->db->from('Valoracion');
        $this->db->where('Juego_id', $iIdJuego);
        $this->db->where('Usuario_id', $iIdUsuario);
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Metodo que añade una valoración a la base de datos
    public function add_valoracion(){
        $this->db->insert('Valoracion', array(
            //Utilizamos true para evitar inyecciones xss
            'Puntuacion'=>$this->input->post('Puntuacion',TRUE),
            'Comentario'=>$this->input->post('Comentario',TRUE),
            'Fecha'=>$this->input->post('Fecha',TRUE),
            'Hora'=>$this->input->post('Hora',TRUE),
            'Usuario_id'=>$this->input->post('Usuario',TRUE),
            'Juego_id'=>$this->input->post('Juego',TRUE)
        ));
        
        //Calcula la media de valoraciones del juego
        $this->db->select('AVG(Puntuacion) media');
        $this->db->where('id', $this->input->post('Juego',TRUE));
        $fValoracionMedia=$this->db->get('Juego')->row();
        
        //Actualización de la puntuación media del juego
        $data = array('ValoracionMedia' => $fValoracionMedia->media);
        $this->db->where('id', $this->input->post('Juego',TRUE));
        $this->db->update('Juego', $data);
    }
    
    //Método que devuelve el id de una valoracion
    public function get_valoracion_id ($iIdJuego, $iIdUsuario){
        $this->db->select('id');
        $this->db->from('Valoracion');
        $this->db->where('Juego_id', $iIdJuego);
        $this->db->where('Usuario_id', $iIdUsuario);
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Método que devuelve la información de las valoraciones que tiene un juego
    public function get_valoracion_juego ($iIdJuego){
        $this->db->select('Puntuacion, Comentario, Usuario_id');
        $this->db->from('Valoracion');
        $this->db->where('Juego_id', $iIdJuego);
        $this->db->order_by('Fecha', 'ASC');
        $this->db->order_by('Hora', 'ASC');
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Método que devuelve todas las valoraciones que tiene un usuario
    public function get_valoracion_usuario ($iIdUsuario){
        $this->db->select('Puntuacion, Comentario, Juego_id');
        $this->db->from('Valoracion');
        $this->db->where('Usuario_id', $iIdUsuario);
        $this->db->order_by('Fecha', 'ASC');
        $this->db->order_by('Hora', 'ASC');
        $consulta = $this->db->get();
        
        return $consulta->result_array();
    }
    
    //Metodo que modifica la valoración de un juego de un usuario
    public function set_puntuacion_juego_usuario($iIdUsuario, $iIdJuego, $iPuntuacion, $sComentario){
        $data = array('Puntuacion' => $iPuntuacion, 'Comentario' => $sComentario);
        $this->db->where('Juego_id', $iIdJuego);
        $this->db->where('Usuario_id', $iIdUsuario);
        $this->db->update('Valoracion', $data);
    }
    
    //Metodo que elimina la valoracion
    public function remove_valoracion($iId){
        $this->db->where('id', $iId);
        $this->db->delete('Valoracion');
    }
    
    
    
    //------- FUNCIONES ELIMINACION -------
    //Método que devuelve si algun juego esta relacionado con esa productora
    public function get_juego_productora ($iIdProductora){
        $this->db->from('Juego');
        $this->db->where('Productora_id', $iIdProductora);
        $consulta = $this->db->get();
        
        return $consulta->num_rows();
    }
}