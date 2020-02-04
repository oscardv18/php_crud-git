<?php include('db.php'); ?>

<?php include('includes/header.php'); ?>
    
   <div class="container p-4">

    <!-- div de 4 columnas -->

        <div class="col-md-4">

        <?php if (isset($_SESSION['message'])) { ?>
            
            <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">

            <?= $_SESSION['message'] ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>

        <?php session_unset(); /* Esto es para limpiar los datos que tenemos en sesión*/ } ?>
        

            <!-- Tarjeta de BootStrap -->

            <div class="card card-body">

                <form action="save_task.php" method="POST">

                    <div class="form-group">

                        <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>

                    </div>

                    <div class="form-group">

                        <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>

                    </div>

                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save Task">

                </form>

            </div>

        </div>

        <!-- Div de 8 Columnas -->

        <br>

        <div class="col-md-8">

            <table class="table table-bordered">

                <thead>

                    <tr>

                    <th>Title</th>
                    <th>Description</th>
                    <th>Create At</th>
                    <th>Actions</th>

                    </tr>

                </thead>

                <tbody>

                    <?php
                    
                    $query = "SELECT * FROM task";
                    
                    $result_tasks = mysqli_query($conn, $query);

                            while ($rows = mysqli_fetch_array($result_tasks)) {?>
                                
                                <tr>

                                    <td><?php echo $rows['title'] ?></td>
                                    <td><?php echo $rows['description'] ?></td>
                                    <td><?php echo $rows['created_at'] ?></td>
                                    <td>

                                    <a href="edit_task.php?id=<?php echo $rows['id'] ?>">
                                            <i class="fas fa-marker"></i>
                                    </a>

                                    <a href="delete_task.php?id=<?php echo $rows['id'] ?>">
                                        <li class="far fa-trash-alt"></li>
                                    </a>

                                    </td>

                                </tr>

                            <?php  }?>

                    

                </tbody>

            </table>

        </div>

   </div> 
        <!-- Div del Continer -->


<?php include('includes/footer.php'); ?>