<?php
    require_once "base.php";
    $id = $_POST['id'];

    $sql = "SELECT * FROM contacts WHERE id=$id";
    $query = mysqli_query(con(),$sql);

    while ($row = mysqli_fetch_assoc($query)){

    ?>
        <div class="d-flex justify-content-between">
            <h4 class="mb-0"><?php echo $row['name']; ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <hr>
        <p>Contact Details</p>

        <p><i class="fas fa-phone mr-2"></i><?php echo $row['phone']; ?></p>
    <?php } ?>


