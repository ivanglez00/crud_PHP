<?php include("includes/header.php") ?>
<?php include("db.php") ?>

<div class="container p-4">
    <h2 class="display-4">Log IN </h2>
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

            <?php
            include("controler.php");
            ?>

            <div class="card card-body">
                <!-- al llenar el formulario nos envia a la pestaña save_task
                 donde te redirecciona a otra si inserta los datos correctamente en la db-->
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="text" name="userName" class="form-control" placeholder="UserName" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="password" class="form-control" placeholder="Password" autofocus>

                    </div>

                    <input type="submit" class="btn btn-success btn-block" name="login" value="log in">
                </form>
            </div>

        </div>


    </div>
</div>












<?php include("includes/footer.php") ?>