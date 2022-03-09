<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
</head>
<body class="bg-dark">

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card shadow my-5">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <h4>
                        Contacts App
                    </h4>
                    <div class="">
                        <button data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-primary"><i class="fas fa-plus mr-2"></i>New</button>
                        <button class="btn btn-outline-info" onclick="showList()"><i class="fas fa-list"></i></button>
                        <button class="btn btn-outline-success" onclick="showGrid()"><i class="fas fa-th-large"></i></button>
                    </div>

                </div>

                <div class="output">

                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    New Contact <span id="result"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="save.php" method="post" id="addContact">
                    <div class="form-row">
                        <div class="col-12 col-md-6">
                            <label>Name</label>
                            <input type="text" class="form-control" name="contact_name" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">
                    Edit Contact <span id="edit_result"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="edit_contact.php" method="post" id="editContact">
                    <div class="form-row">
                        <div class="col-12 col-md-6">
                            <label>Name</label>
                            <input type="text" class="form-control" name="contact_name" id="edit_name" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" id="edit_phone" required>
                        </div>
                        <input type="hidden" name="id" id="edit_id">
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="result">
    <div class="modal fade" id="aa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body popup">

                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>

    function showGrid(){
        $.get("grid.php",function (data){
            $(".output").html(data);
        })
    }

    function showList(){
        $.get("list.php",function (data){
            $(".output").html(data);
        })
    }

    $("#addContact").on("submit",function (e){
        e.preventDefault();
        let inputs = $(this).serialize();
        // $.ajax({
        //     type : "POST",
        //     url : "save.php",
        //     data : inputs,
        //     success : function (result){
        //         console.log(result);
        //     }
        // })

        $.post($(this).attr("action"),inputs,function (data){
            if(data == "success"){
                $("#result").html("<span class='badge badge-success'><i class='fas fa-check mr-2'></i>Contacts Added Successfully!</span>");
                $("input").val("");
                showList();
            }else{
                $("#result").html("<span class='badge badge-danger'><i class='fas fa-exclamation-triangle mr-2'></i>Contacts Add Fail!</span>");
            }
        })
    });

    showList();

    $(".output").delegate(".del","click",function (){
        let currentDelId = $(this).data("id");
        $.get("delete.php?id="+currentDelId,function (data){
            if (data == "success"){
                showList();
            }
        })

    });

    $(".output").delegate(".edit","click",function (){
        let currentDelId = $(this).data("id");
        $.get("edit.php?id="+currentDelId,function (data){
            let editDetail = JSON.parse(data);
            $("#edit_name").val(editDetail.name);
            $("#edit_phone").val(editDetail.phone);
            $("#edit_id").val(editDetail.id);

            $("#edit").modal("show");
        })
    });

    $("#editContact").on("submit",function (e){
        e.preventDefault();
        let inputs = $(this).serialize();
        // $.ajax({
        //     type : "POST",
        //     url : "save.php",
        //     data : inputs,
        //     success : function (result){
        //         console.log(result);
        //     }
        // })

        $.post($(this).attr("action"),inputs,function (data){
            if(data == "success"){
                $("#edit_result").html("<span class='badge badge-success'><i class='fas fa-check mr-2'></i>Contacts Updated Successfully!</span>");
                $("input").val("");
                showList();
            }else{
                $("#edit_result").html("<span class='badge badge-danger'><i class='fas fa-exclamation-triangle mr-2'></i>Contacts Update Fail!</span>");
            }
        })
    });

    // click popup modal for each detail

    // $(".output").delegate(".contact","click",function (){
    //     let currentId = $(this).data("id");
    //
    //     $.ajax({
    //         type : "POST",
    //         url : "detail.php",
    //         data : {id : currentId},
    //         success : function (result) {
    //             $(".popup").html(result);
    //             $("#aa").modal("show");
    //         }
    //     })
    // });




</script>
</body>
</html>
