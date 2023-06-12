<?php

include("db.php");

if (!empty($_POST["login"])) {

    if (empty($_POST['userName']) and empty($_POST["password"])) {
      
       // echo'<div class="alert alert-danger"> los campos estan vacios  </div>';
        $_SESSION['message'] = 'los campos estan vacios';
        $_SESSION['message_type']= 'danger';
    } else {
        $usuario = $_POST["userName"];
        $contra = $_POST["password"];

        $sql = $conn->query("select * from users where userName = '$usuario' and password = '$contra'");
        if ($datos = $sql->fetch_assoc()) {
           header("location:index.php");
        } else {
            //echo'<div class="alert alert-danger"> acceso denegado </div>';
            $_SESSION['message'] = 'accesso denegado';
            $_SESSION['message_type']= 'danger';
        }
        
    }
}
