<?php
require_once 'core/init.php';

$user = new User();

// var_dump(Token::check(Input::get('token')));
if(!$user->isLoggedIn()){
    Redirect::to('login.php');
}


?>
<html>
<head>
    <style type="text/css">
        input,textarea{
            border:0;
            background-color: transparent;
        }
    </style>
</head>
<body>
 
<?php
$department = DB::getInstance()->query("SELECT * FROM leavetype");
?>

   <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title"><i class="menu-icon fa fa-sitemap"></i>&nbsp; Leave Type</strong>
                        </div>
                        <div class="card-body">

                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Leave Type Name</th>
                        <th>Max Days</th>
                        <th>Edit Details</th>
                      </tr>
                    </thead>
                    <tbody>
                        
<?php
if(!$department->count()) {
    echo 'No user';
} else {
    foreach ($department->results() as $department) {
        echo "<tr>";
        echo "<td>";
            echo $department->leaveTypeId;
        echo "</td>";
        echo "<td>";
            echo $department->leaveTypeName;
        echo "</td>";
         echo "<td>";
            echo $department->maxDays;
        echo "</td>";
        echo "<td>";
        echo "<a href='editLeaveTypeProceed.php?id=$department->leaveTypeId' class='btn btn-outline-success btn-sm'><i class='fa fa-edit (alias)'></i>&nbsp; Edit</a>";
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
  <?php
                $tb = isset($_GET['tab']) ? $_GET['tab'] : '';
                switch($tb) { //switch is just like a bunch of if()s
                    case 'viewUser': // page2, if changePage has the value of page2
                    include('viewUser.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'addUser': // page2, if changePage has the value of page2
                    include('register.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'myProfile': // page2, if changePage has the value of page2
                    include('myProfile.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'deleteUser': // page2, if changePage has the value of page2
                    include('deleteUser.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'resetPassword': // page2, if changePage has the value of page2
                    include('resetPassword.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'adminView': // page2, if changePage has the value of page2
                    include('adminView.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'logout': // page2, if changePage has the value of page2
                    include('logout.php'); //include page2.html
                    //**********************************************************
                    break;  //break, witch means stop
                    case 'addLeaveType': // page2, if changePage has the value of page2
                    include('addLeaveType.php'); //include page2.html
                    break;  //break, witch means stop
                    /*
                    case 'editLeaveType': // page2, if changePage has the value of page2
                    include('editLeaveType.php'); //include page2.html
                    break;  //break, witch means stop
                    */
                    case 'deleteLeaveType': // page2, if changePage has the value of page2
                    include('deleteLeaveType.php'); //include page2.html
                    break;  //break, witch means 
                    case 'editLeaveTypeProcced': // page2, if changePage has the value of page2
                    include('editLeaveTypeProcced.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'deleteLeaveTypeProceed': // page2, if changePage has the value of page2
                    include('deleteLeaveTypeProceed.php'); //include page2.html
                    break;  //break, witch means stop
                } //end the switch
            ?> 