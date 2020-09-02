<?php
require_once 'core/init.php';

$user = new User();

// var_dump(Token::check(Input::get('token')));
if(!$user->isLoggedIn()){
    Redirect::to('../SystemAdministration/login.php');
}
$username = escape($user->data()->username);

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
    <div class="card">
        <div class="card-header">
            <strong class="card-title"><i class="menu-icon fa fa-sitemap"></i>&nbsp; Leave Status Details</strong>
        </div>
        <div class="card-body">
            <div style="background-color: white;padding-left: 20px;">
                <a href="leaveManagementView.php?tab=approveLeave"> <button type="submit" class="btn btn-primary btn-sm" style="width:150px;">Pending Leave</button></a>
                <a href="leaveManagementView.php?tab=rejected"> <button type="submit" class="btn btn-primary btn-sm" style="width:150px;">Rejected Leave </button></a>
                <a href="leaveManagementView.php?tab=approved"> <button type="submit" class="btn btn-primary btn-sm" style="width:150px;">Approved Leave</button></a>
            </div>
            <br>
        </div>
    </div> 
<?php
 $employee = DB::getInstance()->query("SELECT * FROM employee WHERE email = '$username'");
                    if(!$employee->count()) {
                        echo 'No user';
                    } else {
                        foreach ($employee->results() as $employee) {
                            $did = $employee->DepId;
                        }
                    }
$leave = DB::getInstance()->query("SELECT * FROM employeeleave WHERE MONTH(startDate)=MONTH(CURDATE()) AND YEAR(startDate)=YEAR(CURDATE()) AND status = 'Approved' AND depId =$did");
?>

   <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title"><i class="menu-icon fa fa-sitemap"></i>&nbsp; Leave Applications</strong>
                        </div>
                        <div class="card-body">

                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Leave Id</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Reason</th>
                        <th>Requested By </th>
                        <th>Status</th>
                        <th>Leave Type</th>
                        <th>Department</th>
                        <th>Approved By</th>
                        <th>Edit Details</th>
                      </tr>
                    </thead>
                    <tbody>
                        
<?php
if(!$leave->count()) {
    echo 'No user';
} else {
    foreach ($leave->results() as $leave) {
        echo "<tr>";
        echo "<td>";
            echo $leave->empLeaveId;
        echo "</td>";
        echo "<td>";
            echo $leave->startDate;
        echo "</td>";
         echo "<td>";
            echo $leave->endDate;
        echo "</td>";
        echo "<td>";
            echo $leave->reason;
        echo "</td>";
         echo "<td>";
            $did = $leave->requestedBy;
        $department = DB::getInstance()->query("SELECT * FROM employee WHERE empId = $did");
        if(!$department->count()) {
             echo 'No user';
        } else {
         foreach ($department->results() as $department) {
           echo $department->fullName;
         }
        }
        echo "</td>";
        echo "<td>";
            echo $leave->status;
        echo "</td>";
        echo "<td>";
        $did = $leave->LeaveType;
        $department = DB::getInstance()->query("SELECT * FROM leavetype WHERE leaveTypeId = $did");
        if(!$department->count()) {
             echo 'No user';
        } else {
         foreach ($department->results() as $department) {
           echo $department->leaveTypeName;
         }
        }
        echo "</td>";
         echo "<td>";
          $did  = $leave->depId;
                            $department = DB::getInstance()->query("SELECT * FROM department WHERE depId = $did");
                             if(!$department->count()) {
                                  echo 'No user';
                             } else {
                                foreach ($department->results() as $department) {
                    
                                echo $department->depName;
                                }
                            }
        echo "</td>";
        echo "<td>";
            echo $leave->approvedBy;
        echo "</td>";
        echo "<td>";
        echo "<a href='approveLeaveProceed.php?id=$leave->empLeaveId' class='btn btn-outline-success btn-sm'><i class='fa fa-edit (alias)'></i>&nbsp;Approve/Reject Leave</a>";
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
    <?php
$leave = DB::getInstance()->query("SELECT * FROM employeeleave WHERE MONTH(startDate)=MONTH(CURDATE())+1 AND YEAR(startDate)=YEAR(CURDATE()) AND status = 'Approved' AND depId =$did");
?>

   <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title"><i class="menu-icon fa fa-sitemap"></i>&nbsp; Leave Applications For Next Month</strong>
                        </div>
                        <div class="card-body">

                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Leave Id</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Reason</th>
                        <th>Requested By </th>
                        <th>Status</th>
                        <th>Leave Type</th>
                        <th>Department</th>
                        <th>Approved By</th>
                        <th>Edit Details</th>
                      </tr>
                    </thead>
                    <tbody>
                        
<?php
if(!$leave->count()) {
    echo 'No Data Available';
} else {
    foreach ($leave->results() as $leave) {
        echo "<tr>";
        echo "<td>";
            echo $leave->empLeaveId;
        echo "</td>";
        echo "<td>";
            echo $leave->startDate;
        echo "</td>";
         echo "<td>";
            echo $leave->endDate;
        echo "</td>";
        echo "<td>";
            echo $leave->reason;
        echo "</td>";
         echo "<td>";
            $did = $leave->requestedBy;
        $department = DB::getInstance()->query("SELECT * FROM employee WHERE empId = $did");
        if(!$department->count()) {
             echo 'No user';
        } else {
         foreach ($department->results() as $department) {
           echo $department->fullName;
         }
        }
        echo "</td>";
        echo "<td>";
            echo $leave->status;
        echo "</td>";
        echo "<td>";
        $did = $leave->LeaveType;
        $department = DB::getInstance()->query("SELECT * FROM leavetype WHERE leaveTypeId = $did");
        if(!$department->count()) {
             echo 'No user';
        } else {
         foreach ($department->results() as $department) {
           echo $department->leaveTypeName;
         }
        }
        echo "</td>";
         echo "<td>";
          $did  = $leave->depId;
                            $department = DB::getInstance()->query("SELECT * FROM department WHERE depId = $did");
                             if(!$department->count()) {
                                  echo 'No user';
                             } else {
                                foreach ($department->results() as $department) {
                    
                                echo $department->depName;
                                }
                            }
        echo "</td>";
        echo "<td>";
            echo $leave->approvedBy;
        echo "</td>";
        echo "<td>";
        echo "<a href='approveLeaveProceed.php?id=$leave->empLeaveId' class='btn btn-outline-success btn-sm'><i class='fa fa-edit (alias)'></i>&nbsp;Approve/Reject Leave</a>";
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
                    //******************************************Employee Details******************
                    case 'addEmployee': // page2, if changePage has the value of page2
                    include('addEmployee.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'editEmployee': // page2, if changePage has the value of page2
                    include('editEmployee.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'deleteEmployee': // page2, if changePage has the value of page2
                    include('deleteEmployee.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'editEmployeeProceed': // page2, if changePage has the value of page2
                    include('editEmployeeProceed.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'deleteEmployeeProceed': // page2, if changePage has the value of page2
                    include('deleteEmployeeProceed.php'); //include page2.html
                    break;  //break, witch means stop
                    //******************************Personal File*********************************
                    case 'attachDocuments': // page2, if changePage has the value of page2
                    include('attachDocuments.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'deleteDocumentsProceed': // page2, if changePage has the value of page2
                    include('deleteDocumentsProceed.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'deleteDocuments': // page2, if changePage has the value of page2
                    include('deleteDocuments.php'); //include page2.html
                    break;  //break, witch means stop
                    //***************************Employee Documents*****************************************
                    case 'addDocumentType': // page2, if changePage has the value of page2
                    include('addDocumentType.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'editDocumentType': // page2, if changePage has the value of page2
                    include('editDocumentType.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'editDocumentTypeProceed': // page2, if changePage has the value of page2
                    include('editDocumentTypeProceed.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'deleteDocumentType': // page2, if changePage has the value of page2
                    include('deleteDocumentType.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'deleteDocumentTypeProceed': // page2, if changePage has the value of page2
                    include('deleteDocumentTypeProceed.php'); //include page2.html
                    break;  //break, witch means stop
                    //**************************Employee Evaluation*******************************************
                    case 'addEvaluation': // page2, if changePage has the value of page2
                    include('addEvaluation.php'); //include page2.html
                    break;  //break, witch means stop
                    //************************Leave Management**********************************************
                    
                    case 'approveLeave': // page2, if changePage has the value of page2
                    include('approveLeave.php'); //include page2.html
                    break;  //break, witch means stop
                    
                    case 'approveLeaveProceed': // page2, if changePage has the value of page2
                    include('approveLeaveProceed.php'); //include page2.html
                    break;  //break, witch means stop
                    //************************Department Details************************************
                    case 'addDepartment': // page2, if changePage has the value of page2
                    include('addDepartment.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'editDepartment': // page2, if changePage has the value of page2
                    include('editDepartment.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'editDepartmentProceed': // page2, if changePage has the value of page2
                    include('editDepartmentProceed.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'deleteDepartment': // page2, if changePage has the value of page2
                    include('deleteDepartment.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'deleteDepartmentProceed': // page2, if changePage has the value of page2
                    include('deleteDepartmentProceed.php'); //include page2.html
                    break;  //break, witch means stop
                    //********************Designation Details****************************************
                    case 'addDesignation': // page2, if changePage has the value of page2
                    include('addDesignation.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'editDesignation': // page2, if changePage has the value of page2
                    include('editDesignation.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'deleteDesignation': // page2, if changePage has the value of page2
                    include('deleteDesignation.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'editDesignationProceed': // page2, if changePage has the value of page2
                    include('editDesignationProceed.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'deleteDesignationProceed': // page2, if changePage has the value of page2
                    include('deleteDesignationProceed.php'); //include page2.html
                    break;  //break, witch means stop
                    //******************Training***************************************************
                    case 'addTraining': // page2, if changePage has the value of page2
                    include('addTraining.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'editTraining': // page2, if changePage has the value of page2
                    include('editTraining.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'deleteTraining': // page2, if changePage has the value of page2
                    include('deleteTraining.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'editTrainingProceed': // page2, if changePage has the value of page2
                    include('editTrainingProceed.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'deleteTrainingProceed': // page2, if changePage has the value of page2
                    include('deleteTrainingProceed.php'); //include page2.html
                    break;  //break, witch means stop
                    //*****************Events***************************************************
                    case 'addEvent': // page2, if changePage has the value of page2
                    include('addEvent.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'editEvent': // page2, if changePage has the value of page2
                    include('editEvent.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'deleteEvent': // page2, if changePage has the value of page2
                    include('deleteEvent.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'deleteEventProceed': // page2, if changePage has the value of page2
                    include('deleteEventProceed.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'editEventProceed': // page2, if changePage has the value of page2
                    include('editEventProceed.php'); //include page2.html
                    break;  //break, witch means stop
                    //*********************************************
                    
                    /*
                    case 'approved': // page2, if changePage has the value of page2
                    include('approved.php'); //include page2.html
                    break;  //break, witch means stop
                    */
                    case 'rejected': // page2, if changePage has the value of page2
                    include('rejected.php'); //include page2.html
                    break;  //break, witch means stop
                } //end the switch
            ?>  