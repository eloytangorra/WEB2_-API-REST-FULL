<?php
require_once './app/models/peliculas.model.php';
require_once './app/views/api.view.php';

class PeliculasApiController {
    private $model;
    private $view;

    private $data;

    public function __construct() {
        $this->model = new PeliculasModel();
        $this->view = new ApiView();
        
        // lee el body del request
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }
  
    
    public function getfilms($params = null) {
        if(!empty($_GET['sort'])){  
            if($this->model->valueSort($_GET['sort'])==0){
            return  $this->view->response('ponga una columna valida', 404);
            }
        if(isset($_GET['sort'])&& isset($_GET['order'])){  
            if(!empty($_GET['order'])){
                if($_GET['order'] == "DESC"|| $_GET['order']  == "desc" || $_GET['order']  == "ASC"|| $_GET['order']  == "asc"){
                }
                else{
                return $this->view->response("Order mal escrito, prueba escribiendo ASC/asc/DESC/desc o revise la documentacion",400);}
            }
        $pelicula = $this->model->getfilms($_GET['sort'],$_GET['order']);
        if(!empty($pelicula))
        $this->view->response($pelicula);
        else
        $this->view->response('No se encontraron peliculas.', 404);
        }else{ 
            $this->view->response('Envíe todos los parámetros requeridos.', 400);
        }
    }else{
        $pelicula = $this->model->returnpelicula();
        $this->view->response($pelicula,200);
    }
}

    public function getfilm($params = null) {
        try {
            $id = $params[':ID'];
            $game = $this->model->get($id);
            if ($game)
            $this->view->response($game);
            else
            $this->view->response("la pelicula con el id $id no existe!", 404);} 
            catch (\Throwable $th) {
            $this->view->response("Error no encontrado", 500);}
    }


    public function deletepelicula($params = null){
        try { 
        $id = $params[':ID'];
        $pelicula = $this->model->get($id);
        if ($pelicula) {
        $this->model->Delete($id);
        $this->view->response("La pelicula con el $id se eliminó", 200);} 
        else{ 
        $this->view->response("La pelicula con el id=$id no existe", 404);}
        }
        catch (\Throwable $e) {
        $this->view->response("la pelicula contiene comentarios, primero eliminelos para poder continuar", 404);}}

    public function insertpelicula($params = null) {
        $pelicula = $this->getData();
        if (empty($pelicula->Titulo) || empty($pelicula->ID_genero) || empty($pelicula->Duracion) || empty($pelicula->Fecha_de_estreno)) {
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->model->insert($pelicula->Titulo, $pelicula->ID_genero, $pelicula->Duracion, $pelicula->Fecha_de_estreno);
            $pelicula = $this->model->get($id);
            $this->view->response("la pelicula se agrego correctamente", 201);
        }
    }
 
   
}