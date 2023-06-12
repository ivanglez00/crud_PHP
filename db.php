<?php


//iniciar secion para poder tener un mensaje de guardado correctamente 

            if (!isset($_SESSION)) {
                session_start();
            }
           



$conn=mysqli_connect(
    'localhost',
    'root',
    'root',
    'php_mysql_crud'
);

//mensaje para saber si se hizo la conexion correctamente 

// if(isset($conn)){
//     echo "db is disconected";
// }

?>