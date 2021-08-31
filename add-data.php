<?php include "header.php" ?>

<div class="container">
    <div class="row">
        <div class="form">
            <div class="form-header">
                <h1>Add Student</h1>
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

                <form action="/php/upload-img.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Enter Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Upload image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="upload" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>