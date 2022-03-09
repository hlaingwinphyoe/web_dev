<table class="table table-hover">
    <thead>
    <tr>
        <td>#</td>
        <td>Name</td>
        <td>Phone</td>
        <td>Control</td>
    </tr>
    </thead>
    <tbody>
    <?php

    require_once "base.php";

    $sql = "SELECT * FROM contacts ORDER BY id DESC ";
    $query = mysqli_query(con(),$sql);

    while ($row = mysqli_fetch_assoc($query)){

    ?>
    <tr class="contact" id="c-<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>">
        <td><?php echo $row['id']; ?></td>
        <td id="name"><?php echo $row['name']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td>
            <button class="btn btn-sm btn-outline-info edit" data-id="<?php echo $row['id']; ?>">
                <i class="fas fa-fw fa-pencil-alt"></i>
            </button>
            <button class="btn btn-sm btn-outline-danger del" data-id="<?php echo $row['id']; ?>">
                <i class="fas fa-fw fa-trash-alt"></i>
            </button>
        </td>
    </tr>
    <?php } ?>
    </tbody>
</table>

