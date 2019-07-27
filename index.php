<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>

<main class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>            
            <?php session_unset(); } ?>

            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Título" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Descripción"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Guardar">
                </form>
            </div>           
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Fecha de creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT * FROM task";
                        $result_tasks = mysqli_query($conn,$query);
                        
                        while($row = mysqli_fetch_array($result_tasks)) { ?>
                            <tr>
                                <td><?php echo $row['title'] ?></td>
                                <td><?php echo $row['description'] ?></td>
                                <td><?php echo $row['created_at'] ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                        <i class="fas fa-marker"></i>
                                    </a>
                                    <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger"> 
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
        <!-- CARD
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="https://seeklogo.com/images/R/republic-of-gamers-new-logo-C7B28EBFFE-seeklogo.com.png" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">ASUS ROG</h5>
                    <p class="card-text">For years since its establishment, ASUS aimed to put an ever-greater emphasis on PC gaming.</p>
                    <a href="https://rog.asus.com/index.aspx" class="btn btn-primary">Ir a la página</a>
                </div>
            </div>
        </div> 
        -->
    </div>
</main>

<?php include("includes/footer.php"); ?>