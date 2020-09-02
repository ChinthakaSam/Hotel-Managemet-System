<?php
require_once 'core/init.php';

$user = new User();

// var_dump(Token::check(Input::get('token')));
if(!$user->isLoggedIn()){
    Redirect::to('login.php');
}

$username = escape($user->data()->username);

if(Input::exists()){
  $validate = new validate();
  $validation = $validate->check($_POST, array(
    'start_date' => array(
      'required' => true
    ),
    'end_date' => array(
      'required' => true
    ),
    'reason' => array(
      'required' => true,
      'min' => 2,
      'max' => 250
    )
  ));

  if($validation->passed()){

                $current =  date('Y-m-d');
                $ed = Input::get('end_date');
                $sd = Input::get('start_date');
                $lvtype =Input::get('leave_type');
                $lleave1 = DB::getInstance()->query("SELECT * FROM leavetype WHERE leaveTypeId = $lvtype");
                                                foreach ($lleave1->results() as $lleave1) {
                                                    $ln = $lleave1->leaveTypeName;
                                                }

                $username = escape($user->data()->username);
                $employee = DB::getInstance()->query("SELECT * FROM employee WHERE email = '$username'");
                        foreach ($employee->results() as $employee) {
                            $eid = $employee->empId;
                            $lleave = DB::getInstance()->query("SELECT count(*) as ll,MONTH(startDate),MONTH(CURDATE()),YEAR(startDate),YEAR(CURDATE()) FROM employeeleave WHERE requestedBy = $eid AND leavetype=$lvtype AND MONTH(startDate)=MONTH(CURDATE()) AND YEAR(startDate)=YEAR(CURDATE())");
                                                foreach ($lleave->results() as $lleave) {
                                                    $ll = $lleave->ll;
                                                }
                            }

                $letype = DB::getInstance()->query("SELECT * FROM leavetype WHERE leaveTypeId=$lvtype");
                        foreach ($letype->results() as $letype) {
                            $ltid = $letype->leaveTypeId;
                            $mday = $letype->maxDays;
                            }

                if($sd<$current){
                     echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                                <span class="badge badge-pill badge-danger">Fail</span>&nbsp;&nbsp;
                                                Invalid Date! Please select a future date..!
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                      </div>';
                }
                else if($sd > $ed){
                     echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                                <span class="badge badge-pill badge-danger">Fail</span>&nbsp;&nbsp;
                                                Invalid Date! End Date must be a day after starting date..!
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                      </div>';
                }else if($ll>$mday){
                     echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                                <span class="badge badge-pill badge-danger">Fail</span>&nbsp;&nbsp;You have exceeded your '.$ln.' leave!!
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                      </div>';

                }else{

                  $leave = new leave();
                  try{

                    $leave->create('employeeleave',array(
                        'requestedBy' => Input::get('empid'),
                        'depId' => Input::get('depid'),
                        'LeaveType' => Input::get('leave_type'),
                        'startDate' => $sd,
                        'endDate' => $ed,
                        'reason' => Input::get('reason'),
                        'status' => Input::get('approval')
                    ));
                        echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                                        <span class="badge badge-pill badge-primary">Success</span>
                                                            Employee leave aplication has been submitted Successfully!
                                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>';

             
                  } catch(Exception $e){
                      die($e->getMessage());
                  }

            }

  } else {
    foreach($validation->errors() as $error){
      echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                                <span class="badge badge-pill badge-danger">Fail</span>&nbsp;&nbsp;'.
                                                    $error.'
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                      </div>';
    }
  }

}
?>
<html>
<body>
<div style="background-color: white;">
    <div class="card-header">
        <strong>Leave History</strong>
    </div>
    <br>
    <div style="background-color: white;padding-left: 20px;">
    <a href="personalView.php?tab=January"> <button type="submit" class="btn btn-primary btn-sm" style="width:100px;">January</button></a>
    <a href="personalView.php?tab=February"> <button type="submit" class="btn btn-primary btn-sm" style="width:100px;">February</button></a>
    <a href="personalView.php?tab=March"> <button type="submit" class="btn btn-primary btn-sm" style="width:100px;">March</button></a>
    <a href="personalView.php?tab=April"> <button type="submit" class="btn btn-primary btn-sm" style="width:100px;">April</button></a>
    <a href="personalView.php?tab=May"> <button type="submit" class="btn btn-primary btn-sm" style="width:100px;">May</button></a>
    <a href="personalView.php?tab=June"> <button type="submit" class="btn btn-primary btn-sm" style="width:100px;">June</button></a>
    <a href="personalView.php?tab=July"> <button type="submit" class="btn btn-primary btn-sm" style="width:100px;">July</button></a>
    <a href="personalView.php?tab=August"> <button type="submit" class="btn btn-primary btn-sm" style="width:100px;">August</button></a>
    <a href="personalView.php?tab=September "><button type="submit" class="btn btn-primary btn-sm" style="width:100px;">September</button></a>
    <a href="personalView.php?tab=October"> <button type="submit" class="btn btn-primary btn-sm" style="width:100px;">October</button></a>
    <a href="personalView.php?tab=November"> <button type="submit" class="btn btn-primary btn-sm" style="width:100px;">November</button></a>
    <a href="personalView.php?tab=December"> <button type="submit" class="btn btn-primary btn-sm" style="width:100px;">December</button></a>
    </div>
    <br>
</div>
<br>
<div class="card">
    <div class="card-header">
        <strong>Leave Count</strong>
    </div>
    <?php
        
         $username = escape($user->data()->username);
                $employee = DB::getInstance()->query("SELECT * FROM employee WHERE email = '$username'");
                        foreach ($employee->results() as $employee) {
                            $eid = $employee->empId;
                            $casualleave = DB::getInstance()->query("SELECT count(*) as cc,MONTH(startDate),MONTH(CURDATE()),YEAR(startDate),YEAR(CURDATE()) FROM employeeleave WHERE requestedBy = $eid AND leavetype=2 AND MONTH(startDate)=MONTH(CURDATE()) AND YEAR(startDate)=YEAR(CURDATE())");
                                    foreach ($casualleave->results() as $casualleave) {
                                        $cc = $casualleave->cc;
                                    }
                             $annualleave = DB::getInstance()->query("SELECT count(*) as ac,MONTH(startDate),MONTH(CURDATE()),YEAR(startDate),YEAR(CURDATE()) FROM employeeleave WHERE requestedBy = $eid AND leavetype=3 AND MONTH(startDate)=MONTH(CURDATE()) AND YEAR(startDate)=YEAR(CURDATE())");
                                    foreach ($annualleave->results() as $annualleave) {
                                        $ac = $annualleave->ac;
                                    }
                             $medicalleave = DB::getInstance()->query("SELECT count(*) as mc,MONTH(startDate),MONTH(CURDATE()),YEAR(startDate),YEAR(CURDATE()) FROM employeeleave WHERE requestedBy = $eid AND leavetype=1 AND MONTH(startDate)=MONTH(CURDATE()) AND YEAR(startDate)=YEAR(CURDATE())");
                                    foreach ($medicalleave->results() as $medicalleave) {
                                        $mc = $medicalleave->mc;
                                    }
                                
                        }
                    
    ?>
    <?php 
    
          $v = date('m');
                switch($v){
                    case '01':
                    $mo = "January";
                    break;
                    case '02':
                    $mo = "February";
                    break;
                    case '03':
                    $mo = "March";
                    break;
                    case '04':
                    $mo = "April";
                    break;
                    case '05':
                    $mo = "May";
                    break;
                    case '06':
                    $mo = "June";
                    break;
                    case '07':
                    $mo = "July";
                    break;
                    case '08':
                    $mo = "August";
                    break;
                    case '09':
                    $mo = "September";
                    break;
                    case '10':
                    $mo = "October";
                    break;
                    case '11':
                    $mo = "November";
                    break;
                    case '12':
                    $mo = "December";
                    break;
                }
    ?>
    <div class="card-body card-block">
        <div class="row form-group">
            <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Month</label></div>
            <div class="col-12 col-md-9"><input type="text" id="medical_leave" name="medical_leave" value="<?php echo $mo ;
            ?>" class="form-control" readonly></div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Medical Leave</label></div>
            <div class="col-12 col-md-9"><input type="text" id="medical_leave" name="medical_leave" value="<?php echo $mc;?>" class="form-control" readonly></div>
        </div>
         <div class="row form-group">
            <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Annual Leave</label></div>
            <div class="col-12 col-md-9"><input type="text" id="annual_leave" name="annual_leave" value="<?php echo $ac;?>" class="form-control" readonly></div>
        </div>
         <div class="row form-group">
            <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Casual Leave</label></div>
            <div class="col-12 col-md-9"><input type="text" id="casual_leave" name="casual_leave" value="<?php echo $cc;?>" class="form-control" readonly></div>
        </div>
    </div> 
</div>
<div class="card">
    <div class="card-header">
        <strong>Leave Application</strong>
    </div>

    <div class="card-body card-block">
        <form action="" method="post" class="form-horizontal">


            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Employee name</label></div>
                <div class="col-12 col-md-9">
                <?php 
                    $employee = DB::getInstance()->query("SELECT * FROM employee WHERE email = '$username'");
                    if(!$employee->count()) {
                        echo 'No user';
                    } else {
                        foreach ($employee->results() as $employee) {
                        	echo "<input type='text' id='empname' name='empname' value='";
                                echo $employee->fullName;
                            echo "' class='form-control'>";
                            echo "<input type='hidden' id='empid' name='empid' value='";
                                echo $employee->empId;
                            echo "' class='form-control'>";

                        }
                    }

 				?>
                	</div>
            	</div>
            	<div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Department Name</label></div>
                <div class="col-12 col-md-9">
                		<?php
                			$did = $employee->DepId;
                            $department = DB::getInstance()->query("SELECT * FROM department WHERE depId = $did");
                             if(!$department->count()) {
                                  echo 'No user';
                             } else {
                                foreach ($department->results() as $department) {
		                           	echo "<input type='text' id='department' name='department' value='";
		                                echo $department->depName;
		                            echo "' class='form-control'>";
		                            echo "<input type='hidden' id='depid' name='depid' value='";
		                                echo $department->depId;
		                            echo "' class='form-control'>";
                                }
                            }
                    ?>
             </div>
            </div>
             <div class="row form-group">
                <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Leave Type</label></div>
                <div class="col-12 col-md-9">
                     
                    <select name="leave_type" id="leave_type" class="form-control-sm form-control">

                    <?php
                    $lv = DB::getInstance()->query("SELECT * FROM leavetype");
                    if(!$lv->count()) {
                        echo 'No user';
                    } else {
                        foreach ($lv->results() as $lv) {
                            echo "<option value='$lv->leaveTypeId;'>";
                                echo $lv->leaveTypeName;
                            echo "</option>";
                        }
                    }
                    ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Starting Date</label></div>
                <div class="col-12 col-md-9"><input type="date" id="start_date" name="start_date" value="" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Ending Date</label></div>
                <div class="col-12 col-md-9"><input type="date" id="end_date" name="end_date" value="" class="form-control"></div>
            </div>
            <div class="row form-group">
               
                <div class="col-12 col-md-9"><input type="hidden" id="approval" name="approval" value="Pending" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Reason</label></div>
                 <div class="col-12 col-md-9"><textarea id="reason" name="reason" class="form-control"></textarea></div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit Leave Application
                </button>
            </div>
    </form>
    </div>
    
</div>
 <?php
                $tb = isset($_GET['tab']) ? $_GET['tab'] : '';
                switch($tb) { //switch is just like a bunch of if()s
                    case 'January': // page2, if changePage has the value of page2
                    include('January.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'February': // page2, if changePage has the value of page2
                    include('February.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'March': // page2, if changePage has the value of page2
                    include('March.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'April': // page2, if changePage has the value of page2
                    include('April.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'May': // page2, if changePage has the value of page2
                    include('May.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'June': // page2, if changePage has the value of page2
                    include('June.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'July': // page2, if changePage has the value of page2
                    include('July.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'August': // page2, if changePage has the value of page2
                    include('August.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'September': // page2, if changePage has the value of page2
                    include('September.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'October': // page2, if changePage has the value of page2
                    include('October.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'November': // page2, if changePage has the value of page2
                    include('November.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'December': // page2, if changePage has the value of page2
                    include('December.php'); //include page2.html
                    break;  //break, witch means stop
                } //end the switch
            ?> 
</body>
</html>