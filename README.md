API REST FULL 
Desarrollo de API para el controlar el CRUD de un catalogo de peliculas y sus comentarios correspondientes.

Funcionamiento en tabla peliculas:
 
 Para comprobar el funcionamiento de la API hemos utilizado el servicio POSTMAN. Indicando los siguientes endpoints.
 
 
 * METODO GET

 * listado completo : 
 GET : http://localhost/TPE-ELOY/api/peliculas nos trae el listado completo de las peliculas.
 
 * listado de forma ascendente:
 GET : http://localhost/TPE-ELOY/api/peliculas?sort=Pelicula_ID&order=asc nos trae el listado peliculas ordenado de forma ascendente segun su Pelicula_ID.
 GET :http://localhost/TPE-ELOY/api/peliculas?sort=Titulo&order=asc nos trae el listado peliculas ordenado de forma ascendente segun el Titulo.
 GET :http://localhost/TPE-ELOY/api/peliculas?sort=ID_genero&order=asc nos trae el listado peliculas ordenado de forma ascendente segun el ID_genero.
 GET :http://localhost/TPE-ELOY/api/peliculas?sort=Duracion&order=asc nos trae el listado peliculas ordenado de forma ascendente segun la duracion.
 GET :http://localhost/TPE-ELOY/api/peliculas?sort=Fecha_de_estreno&order=asc nos trae el listado de peliculas ordenado de forma ascendente segun la fecha de estreno.
 
 * listado de forma descendente :
 GET :http://localhost/TPE-ELOY/api/peliculas?sort=Pelicula_ID&order=desc nos trae el listado de peliculas ordenado de forma descendente segun su Pelicula_id.
 GET :http://localhost/TPE-ELOY/api/peliculas?sort=Titulo&order=desc nos trae el listado de peliculas ordenado de forma descendente segun el Titulo.
 GET :http://localhost/TPE-ELOY/api/peliculas?sort=ID_genero&order=desc nos trae el listado de peliculas ordenado de forma descendente segun el ID_genero.
 GET :http://localhost/TPE-ELOY/api/peliculas?sort=Duracion&order=desc nos trae el listado de peliculas ordenados de forma descendente segun la Duracion.
 GET :http://localhost/TPE-ELOY/api/peliculas?sort=Fecha_de_estreno&order=desc nos trae el listado de peliculas ordenado de forma descendente segun la fecha de estreno.
 
 * posibles errores en los GET  
 - que el usuario no escriba de forma correcta "asc"/"ASC" o "desc"/"DESC", se imprimira por pantalla lo siguiente ("Order mal escrito, prueba escribiendo ASC/asc/DESC/desc o revise la documentacion",400).

* METODO GET/:ID
* Pelicula segun id:
 GET : http://localhost/TPE-ELOY/api/peliculas/18 nos traera la pelicula con el ID 18.
 {
    "Pelicula_ID": 18,
    "Titulo": "piratas del caribe",
    "ID_genero": 20,
    "Duracion": 100,
    "Fecha_de_estreno": "2001"
}
 
* posible error:
GET : http://localhost/TPE-ELOY/api/peliculas/24 ese id no existe.
mensaje por pantalla : "la pelicula con el id 24 no existe!".


* METODO DELTE:

* borrar pelicula por id:
DELETE : http://localhost/TPE-ELOY/api/peliculas/21 se eliminara la pelicula con el id 21 de la base de datos.

* error al borrar:
DELETE : http://localhost/TPE-ELOY/api/peliculas/76 ese id no existe y no se puede eliminar.

* error numero dos al borrar: 
DELETE : http://localhost/TPE-ELOY/api/peliculas/19 : ese id tiene comentarios asigandos no se puede eliminar, debe eliminar primero el comentario y despues la pelicula.


* METODO POST
POST : http://localhost/TPE-ELOY/api/peliculas :  
 {
        "Pelicula_ID": 24,
        "Titulo": "NACIONES EN GUERRA",
        "ID_genero": 20,
        "Duracion": 120,
        "Fecha_de_estreno": "2022"
    }
    Mensaje por pantalla : la pelicula se agrego correctamente.

* error posible :
POST : http://localhost/TPE-ELOY/api/peliculas : 
 {
        "Pelicula_ID": 24,
        "Titulo": "NACIONES EN GUERRA",
        "ID_genero": 20,
        "Duracion": 120,
        "Fecha_de_estreno
    }
    Mensaje por pantalla : complete los datos.




* TABLA COMENTARIOS: 

* METODO GET

 * listado completo : 
 GET : http://localhost/TPE-ELOY/api/comentarios traera todos los comentarios que existan.
 
 * listado de forma ascendente:
 GET :http://localhost/TPE-ELOY/api/comentarios?sort=ID&order=asc  trae todos los comentarios ordenados de forma ascendente segun su id.
 GET :http://localhost/TPE-ELOY/api/comentarios?sort=comentario&order=asc trae todos los comentarios ordenados de forma ascendente segun su comentario.
 GET : http://localhost/TPE-ELOY/api/comentarios?sort=ID_peliculas&order=asc trae todos los comentarios ordenados de forma ascendente segun id_pelicula.

 * listado de forma descendente :
 GET :http://localhost/TPE-ELOY/api/comentarios?sort=ID&order=desc  trae todos los comentarios ordenados de forma descendente segun su id.
 GET :http://localhost/TPE-ELOY/api/comentarios?sort=comentario&order=desc trae todos los comentarios ordenados de forma descendente segun su comentario.
 GET : http://localhost/TPE-ELOY/api/comentarios?sort=ID_peliculas&order=desc trae todos los comentarios ordenados de forma descendente segun id_pelicula.

 * posibles errores en los GET  
 - que el usuario no escriba de forma correcta "asc"/"ASC" o "desc"/"DESC", se imprimira por pantalla lo siguiente ("Order mal escrito, prueba escribiendo ASC/asc/DESC/desc o revise la documentacion",400).


* METODO GET/:ID
* Comentario segun id:
GET : http://localhost/TPE-ELOY/api/comentarios/1:
{
    "ID": 1,
    "comentario": "es una pelicula muy mala ",
    "ID_peliculas": 19
}

* posible error:
GET : http://localhost/TPE-ELOY/api/comentarios/24 ese id no existe.
mensaje por pantalla : "el comentario con el id 24 no existe!".



* METODO DELTE:
DELETE : http://localhost/TPE-ELOY/api/comentarios/1 se elimina el comentario con id 1

* error al borrar:
DELETE : http://localhost/TPE-ELOY/api/comentarios/76 ese id no existe y no se puede eliminar.



* METODO POST
POST: http://localhost/TPE-ELOY/api/comentarios :
 {
        "ID": 4,
        "comentario": "nuevo comentario",
        "ID_peliculas": 22
    }
    mensaje por pantalla : el comentario se agrego correctamente.

* posibles errores:
   {
        "ID": 4,
        "comentario": "nuevo comentario",
        "ID_peliculas"
    }
mensaje : complete los datos.

* error posible 2 :
    {
        "ID": 4,
        "comentario": "eeeeee",
        "ID_peliculas": 78
    }
    mensaje : "el comentario esta siendo asiganado a una pelicula que no existe, agregue la pelicula primero para continuar".





















 
