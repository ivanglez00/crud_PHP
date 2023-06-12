<?php
include("db.php");
// comprobar que los datos se estan enviando a este archivo 
if(isset($_POST['save_task'])){
    $title= $_POST['title'];
    $description = $_POST['description'];
    
    //comprobamos que los valores se envian desde el formulario los puedes imprimir 
    //haces el query para meterlos a la base de datos importando la conexion desde el archivo  db.php

    $query = "INSERT INTO task(title,description) VALUES ('$title','$description')";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("query filed");
    }

    //guarda un mensaje de guardado si se guardo correctamente en la db 
    $_SESSION['message'] = 'saved';
    $_SESSION['message_type']= 'success';

    //muestra un mensaje de guardado pero lo cambiamos por un redirect que nos envia a otra pestaña 
    //echo "saved correctly";
    header("Location: index.php");
}

?>


