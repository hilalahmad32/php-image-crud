<?php include "header.php";
include "php/connection.php"; ?>

<div class="container">
    <div class="card">
        <h3>Student ( 10 )</h3>
        <a href="add-data.php" class="btn btn-success">Add Student</a>
    </div>
</div>
<div class="container">
    <?php
    session_start();
    if (isset($_SESSION["success"])) {
    ?>
        <div class="alert-success">
            <h4><?php echo $_SESSION["success"] ?></h4>
        </div>
    <?php
        unset($_SESSION["success"]);
    }

    ?>
</div>
<div class="container">

    <?php

    $sql = "SELECT * FROM student_image";
    $run_sql = mysqli_query($conn, $sql);
    if (mysqli_num_rows($run_sql) > 0) {
    ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Student Name</th>
                        <th>Student Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($run_sql)) {
                    ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row["username"] ?></td>
                            <td><img src="upload/<?php echo $row["images"] ?>" width="70px;70px;" alt=""></td>
                            <td><a href="edit-data.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Edit</a></td>
                            <td><a href="php/delete-data.php?id=<?php echo $row["id"] ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    <?php
    } else {
        echo "<h1>Record Not Found</h1>";
    }
    ?>
</div>


<div class="container">
    <div class="pagination">
        <a href="" class="btn btn-success">1</a>
        <a href="" class="btn btn-success">2</a>
        <a href="" class="btn btn-success">3</a>
        <a href="" class="btn btn-success">4</a>
    </div>
</div>



<?php include "footer.php" ?>