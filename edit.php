<?php
include("db.php");


/*
1°
verifica primero si llego la variable de id y hace una busqueda para traer los
datos y mostrarlos en el formulario 

*/

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // echo "you can ";
        $row = mysqli_fetch_array($result);
        $title =  $row['title'];
        $description =  $row['description'];

        // echo $title . " " . $description;
    }
}

/*
cuando el usuario envia el formulario toma los datos nuevos del formulario 
y hace un update a la base datos y te redirecciona a index.php
*/

// se envia desde el boton de actualizar con el metodo post 
if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title =  $_POST['title'];
    $description =  $_POST['description'];

    $query = "UPDATE task set title = '$title',description = '$description' WHERE id = $id";

    mysqli_query($conn, $query);

    $_SESSION['message'] = "task updated successfully";
    $_SESSION['message_type'] = 'warning';

    header("Location:index.php");
}


?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">

                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="update title">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control " placeholder="update description"> <?php echo $description ?>      </textarea>
                    </div>
                    <!-- lo enviamos por el metodo post  -->
                    <button class="btn btn-success" name="update">
                        update
                    </button>
                </form>
            </div>

        </div>
    </div>

</div>


<?php include("includes/footer.php") ?>