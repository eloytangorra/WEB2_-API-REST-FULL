<?php

class ComentariosModel {

    private $db;

    public function __construct() {
        $this->db=new PDO('mysql:host=localhost;'.'dbname=tpe_especial; charset=utf8','root','');
    }

    public function getcomentarios($sort=null, $order=null){
         $query = $this->db->prepare("SELECT * FROM comentarios ORDER BY $sort $order");
         $query->execute();
         $coments=$query->fetchAll(PDO::FETCH_OBJ);
 
         return $coments;
     }

    public function getcomentario($id) {
        $query = $this->db->prepare("SELECT * FROM comentarios WHERE ID = ?");
        $query->execute([$id]);
        $coment = $query->fetch(PDO::FETCH_OBJ);
        
        return $coment;
    }
    function delete($id) {
        $querry = $this->db->prepare('DELETE FROM comentarios WHERE ID=?');
        $querry->execute([$id]);
    }


    public function insertcomentario($comentario, $ID_peliculas) {
        $query = $this->db->prepare("INSERT INTO comentarios(comentario,ID_peliculas) VALUES (?, ?)");
        $query->execute([$comentario, $ID_peliculas]);
        return $this->db->lastInsertId();
    }
    function valueSort($sort=null){
        $sentencia = $this->db->prepare("SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME = ? AND TABLE_NAME = 'comentarios'");
        $sentencia->execute(array($sort));
        $columna = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return count($columna);}

         function validardatos(){

         }
         public function returncomentarios(){
            $query = $this->db->prepare("SELECT * FROM comentarios");
            $query->execute();
            $comentarios=$query->fetchAll(PDO::FETCH_OBJ);
    
            return $comentarios;
        }

}
  
  
  
  
 