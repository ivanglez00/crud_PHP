<?php include("db.php")  ?>

<?php include("includes/header.php") ?>



<div class="container p-4">

    <div class="row">
        <!-- codigo de la tarjetita y boton de guardar-->
        <div class="col-md-4">
            <!-- boton que sale cuando se guardan los datos correctamente mediante la session 
        que envia un mensaje que se realizo correctamente, importante cerrar la session al final   -->

            <?php if (isset($_SESSION['message'])) {  ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php session_unset();
            } ?>

            <div class="card card-body">
                <!-- al llenar el formulario nos envia a la pestaña save_task
                 donde te redirecciona a otra si inserta los datos correctamente en la db-->
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="task description"></textarea>
                    </div>

                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="save task">
                </form>
            </div>
            <a href="login.php">ir a login</a>
        </div>
        <!-- codigo de la tabla  -->
        <div class="col-md 8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>created at</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $query = "SELECT * FROM task";
                    $result_tasks = mysqli_query($conn, $query);
                        /* en row se guardan todas los datos de la base de datos y recorriendolas
                        se pueden meter en la tabla  */
                    while ($row = mysqli_fetch_array($result_tasks)) { ?>

                        <tr>
                            <td><?php echo $row['title']  ?> </td>
                            <td><?php echo $row['description']  ?> </td>
                            <td><?php echo $row['created_at']  ?> </td>
                            <!-- botones eliminar/modificar dentro del td -->

                            <td>
                                <!-- se le pasa el id para poder modificarlo -->
                                <a href="edit.php?id=<?php  echo $row['id'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete_task.php?id=<?php  echo $row['id'] ?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>

                    <?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>




<?php include("includes/footer.php") ?>