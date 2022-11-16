<?php

class PeliculasModel {

    private $db;

    public function __construct() {
        $this->db=new PDO('mysql:host=localhost;'.'dbname=tpe_especial; charset=utf8','root','');
    }


    public function getfilms($sort=null, $order=null){
        $query = $this->db->prepare("SELECT * FROM peliculas ORDER BY $sort $order");
        $query->execute();
        $pelis=$query->fetchAll(PDO::FETCH_OBJ);

        return $pelis;
    }

    function valueSort($sort=null){
        $sentencia = $this->db->prepare("SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME = ? AND TABLE_NAME = 'peliculas'");
        $sentencia->execute(array($sort));
        $columna = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return count($columna);}

    public function get($id) {
        $query = $this->db->prepare("SELECT * FROM peliculas WHERE Pelicula_ID = ?");
        $query->execute([$id]);
        $pelicula = $query->fetch(PDO::FETCH_OBJ);
        
        return $pelicula;
    }

    /**
     * Inserta una tarea en la base de datos.
     */
    public function insert($Titulo, $ID_genero, $Duracion , $Fecha_de_estreno) {
        $query = $this->db->prepare("INSERT INTO peliculas (Titulo, ID_genero, Duracion, Fecha_de_estreno) VALUES (?, ?, ?, ?)");
        $query->execute([$Titulo, $ID_genero, $Duracion , $Fecha_de_estreno]);
        return $this->db->lastInsertId();
    }


    /**
     * Elimina una tarea dado su id.
     */
    function delete($id) {
        $querry = $this->db->prepare('DELETE FROM peliculas WHERE Pelicula_ID=?');
        $querry->execute([$id]);
    }
    public function returnpelicula(){
        $query = $this->db->prepare("SELECT * FROM peliculas");
        $query->execute();
        $peliculas=$query->fetchAll(PDO::FETCH_OBJ);

        return $peliculas;
    }


}
