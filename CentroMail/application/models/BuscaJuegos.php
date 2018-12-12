<?php
class Busqueda_Juego extends CI_Model{
 public function _construct(){
 parent::_construct();
 }
 
 public function busca_nombre($nombre){
 $ssql= "select * from Juego where titulo=''.$nombre.''order by valoracionMedia";
 $conexion = mysqli_connect("localhost", "root", "", "codeigniter");
 $consulta = mysqli_query($conexion,$ssql);
  return $consulta->result();
 }
  public function busca_valoracion($media){
 $ssql= "select * from Juego where valoracionMedia=''.$media.''order by valoracionMedia";
 $conexion = mysqli_connect("localhost", "root", "", "codeigniter");
 $consulta = mysqli_query($conexion,$ssql);
   return $consulta->result();
 }
 
   public function busca_tipo($tipo){
 $ssql= "select * from Juego where genero=''.$tipo.''order by valoracionMedia";
 $conexion = mysqli_connect("localhost", "root", "", "codeigniter");
 $consulta = mysqli_query($conexion,$ssql);
   return $consulta->result();
 }
    public function busca_edad($edad){
 $ssql= "select * from Juego where calificacionedad=''.$edad.''order by valoracionMedia";
 $conexion = mysqli_connect("localhost", "root", "", "codeigniter");
 $consulta = mysqli_query($conexion,$ssql);
   return $consulta->result();
 }
    public function busca_productora($productora){
 $ssql= "select * from Juego where productora=''.$productora.''order by valoracionMedia";
 $conexion = mysqli_connect("localhost", "root", "", "codeigniter");
 $consulta = mysqli_query($conexion,$ssql);
   return $consulta->result();
 }
 
}
