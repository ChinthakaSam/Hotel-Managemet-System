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
 $username = escape($user->data()->username);
 $employee = DB::getInstance()->query("SELECT * FROM employee WHERE email = '$username'");
    foreach ($employee->results() as $employee) {
        $eid = $employee->empId;
    }
$el = DB::getInstance()->query("SELECT * FROM employeeleave WHERE requestedBy = $eid AND MONTH(startDate)=12 AND YEAR(startDate)=YEAR(CURDATE())");
?>

   <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title"><i class="menu-icon fa fa-sitemap"></i>&nbsp;December Leave History</strong>
                        </div>
                        <div class="card-body">

                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                     <thead>
                      <tr>
                        <th>Leave Id</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Leave Type</th>
                        <th>Approved By</th>
                      </tr>
                    </thead>
                    <tbody>
                        
<?php
if(!$el->count()) {
} else {
    foreach ($el->results() as $el) {
         echo "<tr>";
        echo "<td>";
            echo $el->empLeaveId;
        echo "</td>";
        echo "<td>";
            echo $el->startDate;
        echo "</td>";
         echo "<td>";
            echo $el->endDate;
        echo "</td>";
        echo "<td>";
            echo $el->reason;
        echo "</td>";
        echo "<td>";
            echo $el->status;
        echo "</td>";
        echo "<td>";
        $lt = $el->LeaveType;
        $leave = DB::getInstance()->query("SELECT * FROM leavetype WHERE leaveTypeId = $lt");
                             if(!$leave->count()) {
                                  echo 'No records';
                             } else {
                                foreach ($leave->results() as $leave) {
                                echo $leave->leaveTypeName;
                                }
                            }
        echo "</td>";
        echo "<td>";
            echo $el->approvedBy;
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
        <div class="card-footer" align="right">
        <a href="personalView.php?tab=applyLeave">
        	<button type="submit" class="btn btn-primary btn-sm" style="width:100px;">
        		Back
        	</button>
        </a>
    	</div>
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
                    case 'applyLeave': // page2, if changePage has the value of page2
                    include('leaveApply.php'); //include page2.html
                    break;  //break, witch means stop
                } //end the switch
            ?> 