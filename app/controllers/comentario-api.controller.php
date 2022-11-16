<?php
require_once './app/models/comentarios.model.php';
require_once './app/views/api.view.php';
class ComentariosApiController {
    private $model;
    private $view;

    private $data;

    public function __construct() {
        $this->model = new ComentariosModel();
        $this->view = new ApiView();
        
        // lee el body del request
        $this->data = file_get_contents("php://input");
    }
    
    private function getData() {
        return json_decode($this->data);}

    public function getAllcomentarios($params = null) {
       
        if(!empty($_GET['sort'])){  
            if($this->model->valueSort($_GET['sort'])==0){
            return  $this->view->response('inserte una columna valida', 404);
            }
        if(isset($_GET['sort'])&& isset($_GET['order'])){   
            if(!empty($_GET['order'])){
                if($_GET['order'] == "DESC"|| $_GET['order']  == "desc" || $_GET['order']  == "ASC"|| $_GET['order']  == "asc"){
                }
                else{
                return $this->view->response("Order mal escrito, prueba escribiendo ASC/asc/DESC/desc o revise la documentacion",400);}
            }
            $comentarios = $this->model->getcomentarios($_GET['sort'],$_GET['order']);
        if(!empty($comentarios))
            $this->view->response($comentarios);
        else
            $this->view->response('No se encontraron comentarios.', 404);
            }
        else{ 
            $this->view->response('Envíe todos los parámetros requeridos.', 400);
            }
            }
        else{
        $comentarios = $this->model->returncomentarios();
        $this->view->response($comentarios,200);
        }
}
public function getcomentario($params = null) {
    try {
        $id = $params[':ID'];
        $comentario = $this->model->getcomentario($id);
        if ($comentario)
        $this->view->response($comentario,200);
        else
        $this->view->response("el comentario con el id $id no existe!", 404);} 
        catch (\Throwable $th) {
        $this->view->response("Error no encontrado", 500);}
}

    public function insertcomentario($params = null) {
        try { 
        $coment = $this->getdata();
        if (empty($coment->comentario) || empty($coment->ID_peliculas)) {
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->model->insertcomentario($coment->comentario, $coment->ID_peliculas);
            $coment = $this->model->getcomentario($id);
            $this->view->response("el comentario fue insertado correctamente", 201);
        }
        
    }catch (\Throwable $e) {
        $this->view->response("el comentario esta siendo asiganado a una pelicula que no existe, agregue la pelicula primero para continuar", 404);}}

    public function deletecomentario($params = null) {
        $id = $params[':ID'];

        $coment = $this->model->getcomentario($id);
        if ($coment) {
            $this->model->delete($id);
            $this->view->response("el comentario con id=$id se elimino correctamente",200);
        } else 
            $this->view->response("el comentario con el id=$id no existe", 404);
    }
}