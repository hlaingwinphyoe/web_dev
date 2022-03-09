<?php include "template/header.php"; ?>

    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-4">
                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>/category_list.php">Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Category</li>
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
                            <i class="feather-plus-circle text-primary"></i> Add Item
                        </h4>
                        <a href="<?php echo $url; ?>/category_list.php" class="btn btn-outline-primary">
                            <i class="feather-list"></i>
                        </a>
                    </div>
                    <hr>
                    <?php
                        if(isset($_GET['addBtn'])) {
                            categoryCreate();
                        }
                    ?>
                    <form method="get">
                        <div class="form-inline">
                            <input type="text" class="form-control w-50 mr-2" name="message" required>
                            <button class="btn btn-primary" name="addBtn">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include "template/footer.php"; ?>