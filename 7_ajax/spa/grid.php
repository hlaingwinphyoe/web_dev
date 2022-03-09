<div class="card-columns px-3">
    <?php

    require_once "base.php";

    $sql = "SELECT * FROM contacts ORDER BY id DESC ";
    $query = mysqli_query(con(),$sql);

    while ($row = mysqli_fetch_assoc($query)){

        ?>
            <div class="card contact" id="c-<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>">
                <div class="card-body">
                    <div class="text-center">
                        <h4><?php echo $row['name']; ?></h4>
                        <p><?php echo $row['phone']; ?></p>
                        <button class="btn btn-sm btn-outline-info"><i class="fas fa-fw fa-pencil-alt"></i></button>
                        <button class="btn btn-sm btn-outline-danger"><i class="fas fa-fw fa-trash-alt"></i></button>
                    </div>
                </div>
            </div>

    <?php } ?>
</div>