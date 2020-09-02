<?php

require_once 'core/init.php';

?>
<html>
<body>

  <!--  <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Inventory Management</a></li>
                            <li><a href="#">Categories</a></li>
                            <li class="active">View Categories</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
 -->
<?php
$udd = DB::getInstance()->query("SELECT * FROM deductions");
?>

   <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title"><i class="menu-icon fa fa-sitemap"></i>&nbsp; Deductions</strong>
                        </div>
                        <div class="card-body">

                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Deduction Name</th>
                        <th>Amount</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody>
                        
<?php
if(!$udd->count()) {
    echo 'No user';
} else {
    foreach ($udd->results() as $udd) {
        echo "<tr>";
        echo "<td>";
            echo $udd->ded_name;
        echo "</td>";
        echo "<td>";
            echo $udd->ded_percen;
        echo "</td>";
        echo "<td>";
        echo "<a href='FAView.php?tab=inv_updateudd' id='$udd->ded_id' class='btn btn-outline-success btn-sm'><i class='fa fa-edit (alias)'></i>&nbsp; Edit</a>";
        echo "&nbsp";
        echo "&nbsp";
        echo "<a href='update_employee.php?id=$udd->ded_id' class='btn btn-outline-danger btn-sm'><i class='fa fa-trash-o'></i>&nbsp; Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
}
?>
                    </tbody>   
                  </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

    <!-- Right Panel -->



    <script src="../assets/js/popper.min.js"></script>


    <script src="../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/jszip.min.js"></script>
    <script src="../assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../assets/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>

</body>
</html> 