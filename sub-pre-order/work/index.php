<!DOCTYPE html>
<html>
    <head>
        <title>SUB PRE-ORDER</title>
        <script src="../js/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h3 align="center">LIST OF ORDER</h3>
            </div>

            <div class="content">
                <div class="grid-container-3">
                    <div class="grid-item-no-border text-left">
                    </div>
                    <div class="grid-item-no-border text-center">
                        <img src="../images/sub-bread.png" alt="Sub Bread" style="width:30%;;">
                    </div>
                    <div class="grid-item-no-border text-right">
                    </div>
                </div>
                <div align="right" style="margin-bottom:5px;">
                    <button type="button" name="add" id="add" class="btn btn-success btn-xs">Add</button>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 10%">Date</th>
                            <th class="text-center" style="width: 10%">Time</th>
                            <th class="text-center" style="width: 50%">Full Name</th>
                            <th class="text-center" style="width: 10%">View</th>
                            <th class="text-center" style="width: 10%">Edit</th>
                            <th class="text-center" style="width: 10%">Delete</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <footer>
            <script type="text/javascript">
                $(document).ready(function () {
                    fetch_data();

                    function fetch_data()
                    {
                        $.ajax({
                            url: "fetch.php",
                            success: function (data) {
                                $('tbody').html(data);
                            }
                        })
                    }

                    $('#add').click(function () {
                        $(location).attr('href', 'http://localhost/sub-pre-order/work/create.php');
                    });

                    $(document).on('click', '.edit', function () {
                        var id = $(this).attr('id');
                        $(location).attr('href', 'http://localhost/sub-pre-order/work/update.php?id=' + id + '');
                    });

                    $(document).on('click', '.view', function () {
                        var id = $(this).attr('id');
                        $(location).attr('href', 'http://localhost/sub-pre-order/work/view.php?id=' + id + '');
                    });

                    $(document).on('click', '.delete', function () {
                        var id = $(this).attr('id');
                        var action = 'delete';

                        if (confirm("Are you sure you want to remove this data?")) {
                            $.ajax({
                                url: "action.php",
                                method: "POST",
                                data: {id: id, action: action},
                                success: function (data) {
                                    fetch_data();
                                    alert("Data Successfully Deleted.");
                                }
                            })
                        }
                    });
                });
            </script>
        </footer>
    </body>
</html>