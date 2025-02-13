<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajax With Jquery using jquery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header text-center py-5">
                        <h3>
                            <h2 class="text-primary">PHP-Simple To Do List App</h2>
                            <p class=" response"></p>
                            <hr>
                            <?php
                            if ($this->session->flashdata('succMsg')) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong> <?= $this->session->flashdata('succMsg'); ?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            <?php } ?>
                            <?php
                            if ($this->session->flashdata('errMsg')) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong><?= $this->session->flashdata('errMsg'); ?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            <?php } ?>
                            <form action="<?= base_url('insert_list') ?>" method="post">
                                <div class="input field ">
                                    <input class="mt-3 name" type="text" name="name" id="" required>
                                    <button class="btn btn-primary add_task ">Add Task</button>
                                </div>
                            </form>
                        </h3>
                    </div>
                    <!---->
                    <div class="card-body">
                        <table class="table  table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Task</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php if ($data) {
                                foreach ($data as $key => $row):
                                    ?>
                                    <tbody class="task_data ">
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $row->task ?></td>
                                        <td><?= $row->status ?></td>

                                        <td>
                                            <?php if (isset($row->status)) { ?>
                                                <a href=""></a>
                                            <?php } else { ?><a class="btn btn-success"
                                                    href="<?php echo base_url('update/'), $row->id ?>"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                        <path
                                                            d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                                                    </svg></a><?php } ?>

                                            <button type="button" class="btn btn-danger float-right" data-bs-toggle="modal"
                                                data-bs-target="#user_add">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg>
                                            </button>
                                            <div class="modal fade" id="user_add" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Task Delete</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h1>Are u sure to delete this task</h1>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <a href="<?php echo base_url('delete_task/'), $row->id ?>"
                                                                class="btn btn-primary user-add-ajax">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tbody>
                                <?php endforeach;
                            } ?>
                        </table>
                    </div>
                    <!---->
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js">
</script>
<!--<script>
    $(document).ready(function () {
        $('.add_task').click(function (e) {
            e.preventDefault();
            var name = $('.name').val();
            //alert(name);

            $.ajax({
                type: "POST",
                url: "insert_list",
                data: {
                    'name': name
                },
                success: function (response) {
                    console.log(response);

                    // $('.response').html("<p class='text-danger'>" + response + '</p>')
                }
            });
        });
    });   
</script>-->

</html>