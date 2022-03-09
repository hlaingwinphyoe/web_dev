<?php include "template/header.php"; ?>

    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-4">
                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>/category_list.php">Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Category</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="feather-plus-circle text-primary"></i> Update Category
                        </h4>
                        <a href="<?php echo $url; ?>/category_list.php" class="btn btn-outline-primary">
                            <i class="feather-list"></i>
                        </a>
                    </div>
                    <hr>
                    <?php
                        $row = categoryShow($_GET['id']);

                        //print_r($row);
                        if (isset($_GET['updateBtn'])){
                            if (categoryUpdate()){
                                echo "<script>location.href = 'category_list.php'</script>";
                            }
                        }


                    ?>
                    <form method="get">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                        <div class="form-inline">
                            <input type="text" class="form-control w-50 mr-2" name="message" value="<?php echo $row['message'] ?>" required>
                            <button class="btn btn-primary" name="updateBtn">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

<?php include "template/footer.php"; ?>