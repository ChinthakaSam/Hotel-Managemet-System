<?php

require_once 'core/init.php';

$user = new User();

// var_dump(Token::check(Input::get('token')));
if(!$user->isLoggedIn()){
    Redirect::to('../SystemAdministration/login.php');
}


?>
<html>
<body>
 
<?php
$e = DB::getInstance()->query("SELECT * FROM employee");
?>

   <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title"><i class="menu-icon fa fa-sitemap"></i>&nbsp; Employee Details</strong>
                        </div>
                        <div class="card-body">

                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Employee ID</th>
                        <th>Title</th>
                        <th>Full Name</th>
                        <th>Department</th>
                        <th>Designation</th>
                      </tr>
                    </thead>
                    <tbody>
                        
<?php
if(!$e->count()) {
    echo 'No user';
} else {
    foreach ($e->results() as $e) {
        echo "<tr>";
        echo "<td>";
            echo $e->empId;
        echo "</td>";
        echo "<td>";
            echo $e->title;
        echo "</td>";
        echo "<td>";
            echo $e->fullName;
        echo "</td>";
        echo "<td>";
        $did = $e->DepId;
        $dep = DB::getInstance()->query("SELECT * FROM department WHERE depId = $did");
        if(!$dep->count()) {
            echo 'No user';
        } else {
            foreach ($dep->results() as $dep) {
                    echo $dep->depName;
            }
        }
        echo "</td>";
         echo "<td>";
            $desid = $e->designation;
            $des = DB::getInstance()->query("SELECT * FROM designation WHERE desId = $desid");
            if(!$des->count()) {
                echo 'No user';
            } else {
                foreach ($des->results() as $des) {
                        echo $des->desName;
                }
            }
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