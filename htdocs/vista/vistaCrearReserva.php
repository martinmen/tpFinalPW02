<?php
include_once ("../header.php");
?>
<!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
<!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>-->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $(document).ready(function () {
        var counter = 0;

        $("#addrow").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";

            cols += '<td><input type="text" class="form-control" name="name' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="mail' + counter + '"/></td>';
            cols += '<td><input type="text" class="form-control" name="phone' + counter + '"/></td>';

            cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="X"></td>';
            newRow.append(cols);
            $("table.order-list").append(newRow);
            counter++;
        });



        $("table.order-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
            counter -= 1
        });


    });



    function calculateRow(row) {
        var price = +row.find('input[name^="price"]').val();

    }

    function calculateGrandTotal() {
        var grandTotal = 0;
        $("table.order-list").find('input[name^="price"]').each(function () {
            grandTotal += +$(this).val();
        });
        $("#grandtotal").text(grandTotal.toFixed(2));
    }
</script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Nueva Reserva</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered order-list" id="myTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <td>Name</td>
                    <td>Gmail</td>
                    <td>Phone</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="col-sm-4">
                        <input type="text" name="name" class="form-control" />
                    </td>
                    <td class="col-sm-4">
                        <input type="mail" name="mail"  class="form-control"/>
                    </td>
                    <td class="col-sm-3">
                        <input type="text" name="phone"  class="form-control"/>
                    </td>
                    <td class="col-sm-2"><a class="deleteRow"></a>

                    </td>
                </tr>
                </tbody>
            </table>
            <div class="col-md-12" style="text-align: right";>
                <input type="button" class="btn btn-primary " id="addrow" value="+" />
            </div>
        </div>
    </div>
</div>

<?php
include("../footer.php");
?>