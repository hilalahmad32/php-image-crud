<?php include "header.php" ?>

<div class="container">
    <div class="row">
        <div class="form">
            <div class="form-header">
                <h1>Update Student</h1>
            </div>
            <div class="form-body">
<?php
            session_start();
                if (isset($_SESSION["error"])) {
                ?>
                    <div class="alert-danger">
                        <h4><?php echo $_SESSION["error"] ?></h4>
                    </div>
                <?php
                    unset($_SESSION["error"]);
                }

                ?>
            <?php 
            include "php/connection.php";
            if(isset($_GET["id"])){
                $id=$_GET["id"];

                $sql="SELECT * FROM student_image WHERE id={$id}";
                $run_sql=mysqli_query($conn,$sql);
                if(mysqli_num_rows($run_sql) > 0){
                    while($row=mysqli_fetch_assoc($run_sql)){
                    // problem is that here is messaing {}
            ?>
                <form action="php/update-data.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Enter Username</label>
                        <input type="text" value='<?php echo $row['username'] ?>' name="username" id="username" class="form-control">
                        <input type="hidden" value='<?php echo $row['id'] ?>' name="id" id="id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Upload image</label>
                        <input type="file" name="new_image" id="new_image" class="form-control">
                        <img src="upload/<?php echo $row['images']?>" style='width:70px;height:70px;' alt="">
                        <input type="hidden" value='<?php echo $row['images']?>' name="old_image" id="old_image" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="upload" class="btn btn-success">Update</button>
                    </div>
                </form>
                <?php 
                   }
                }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>