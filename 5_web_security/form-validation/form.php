<?php
    session_start();
    require_once "base.php";
    require_once "function.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5">
                <div class="my-5">
                    <div class="card">
                        <div class="card-body">
                            <?php
                                if (isset($_POST['reg'])){
                                    register();
                                }

                            ?>
                            <form method="post" enctype="multipart/form-data">
                                <h4>Register Form</h4>
                                <hr>
                                <div class="form-group mb-3">
                                    <label for="name" class="fw-bold text-primary">Your Name</label>
                                    <input type="text" id="name" class="form-control" name="name" value="<?php echo old('name'); ?>">
                                    <?php if (getError("name")){ ?>
                                        <small class="text-danger fw-bold"><?php echo getError("name") ?></small>
                                    <?php } ?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email" class="fw-bold text-primary">Email</label>
                                    <input type="email" id="email" class="form-control" name="email" value="<?php echo old('email'); ?>">
                                    <?php if (getError("email")){ ?>
                                        <small class="text-danger fw-bold"><?php echo getError("email") ?></small>
                                    <?php } ?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phone" class="fw-bold text-primary">Phone</label>
                                    <input type="number" id="phone" class="form-control" name="phone" value="<?php echo old('phone'); ?>">
                                    <?php if (getError("phone")){ ?>
                                        <small class="text-danger fw-bold"><?php echo getError("phone") ?></small>
                                    <?php } ?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="address" class="fw-bold text-primary">Address</label>
                                    <textarea id="address" class="form-control" name="address"><?php echo old('address'); ?></textarea>
                                    <?php if (getError("address")){ ?>
                                        <small class="text-danger fw-bold"><?php echo getError("address") ?></small>
                                    <?php } ?>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="fw-bold text-primary">Gender</label>
                                    <div class="d-block">
                                        <?php foreach ($genderArr as $g){ ?>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="<?php echo $g; ?>_id" name="gender" class="form-check-input" <?php echo old('gender') == $g ? 'checked':''; ?>  value="<?php echo $g; ?>">
                                                <label class="form-check-label" for="<?php echo $g; ?>_id"><?php echo $g; ?></label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <?php if (getError("gender")){ ?>
                                        <small class="text-danger d-block fw-bold"><?php echo getError("gender") ?></small>
                                    <?php } ?>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="fw-bold text-primary">Skills</label>
                                    <div class="d-block">
                                        <?php foreach ($skillArr as $c){ ?>
                                            <div class="form-check form-check-inline">
                                                <input type="checkbox"
                                                       id="<?php echo $c; ?>_skill"
                                                       name="skill[]"
                                                       class="form-check-input"
                                                       <?php
                                                       if (old("skill")){
                                                           echo in_array($c,old("skill")) ? "checked":"";
                                                       }
                                                       ?>
                                                       value="<?php echo $c; ?>">
                                                <label class="form-check-label" for="<?php echo $c; ?>_skill"><?php echo $c; ?></label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <?php if (getError("skill")){ ?>
                                        <small class="text-danger d-block fw-bold"><?php echo getError("skill") ?></small>
                                    <?php } ?>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="upload" class="fw-bold text-primary">Upload Photo</label>
                                    <input type="file" id="upload" class="form-control" name="upload" value="<?php echo old('upload'); ?>">
                                    <?php if (getError("upload")){ ?>
                                        <small class="text-danger fw-bold"><?php echo getError("upload") ?></small>
                                    <?php } ?>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked="">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Checked checkbox
                                        </label>
                                    </div>
                                    <button class="btn btn-primary" name="reg">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php clearError(); ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>