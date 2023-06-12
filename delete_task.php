<?php

include("db.php");

/*primero verificamos que en realidad si se envio 
la variable para despues guardarla en una variable */
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM task where id = $id ";
     $result = mysqli_query($conn,$query);

     //si result no tiene respuesta muestra un mensaje 
     if(!$result){
        die("query filed ");
     }

     //si funciona correcto todo envia el mensaje por session y te redirecciona a index.php 
    $_SESSION['message'] = "task removed successfully";
    $_SESSION['message_type'] = 'danger';
     header("Location:index.php");
}


?>