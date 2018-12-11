<?php
class Busqueda_Usuario extends CI_Model{
 public function _construct(){
 parent::_construct();
 }
 
// public function busca_nombre($nombtre){
// $ssql= "select * from Usuario where nombre="".$nombre.";
// $conexion = mysqli_connect("localhost", "root", "", "codeigniter");
// $consulta = mysqli_query($conexion,$ssql);
// return $consulta->result();
// }
  public function busca_nick($nick){
 $ssql= "select * from Usuario,Nick where Usuario.id=Nick.Usuario_id and Nick.nick="".$nick.";
 $conexion = mysqli_connect("localhost", "root", "", "codeigniter");
 $consulta = mysqli_query($conexion,$ssql);
 return $consulta->result();
 }

 
}
?>