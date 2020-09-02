<?php


require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn()){
    Redirect::to('login.php');
}
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MAHAWELI REACH HOTEL</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../images/title.png">
    <link rel="shortcut icon" href="../images/title.png">

    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="../assets/scss/style.css">
    <link href="../assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <style type="text/css">
        .t td{
            padding-left: 20px;
            height: 50px;
            padding-right: 20px;
        }
        input{
            background-color: transparent;
        }

        input,textarea,select{
            border:0;
            background-color: transparent;
            width: 350px;
        }
    
    </style>
</head>
<body>



        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="../SystemAdministration/welcome.php"><img src="../images/logonew.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="../SystemAdministration/welcome.php"><img src="../images/logo2new.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                     <li class="active">
                        <a href="#"><div align="center">
                       <?php echo escape($user->data()->name); ?>
                        
                       </div
                       ></a>
                    </li>
                    <h3 class="menu-title"></h3><!-- /.menu-title -->
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-pencil-square-o"></i>Leave Management</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="leaveManagementView.php?tab=approveLeave">Approve Leave</a></li>
                        </ul>
                    </li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">5</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                          </div>
                        </div>

                        <div class="dropdown for-message">
                         
                          <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">You have 4 Mails</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="../images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="../images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="../images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="../images/avatar/4.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                          </div>
                        </div>
                    </div>
                </div>


                
            </div>

        </header><!-- /header -->
        <div class="card">
            <div class="card-header">
                <strong>Approve Leave</strong>
            </div>
        
        <div class="card-body card-block">
           <form action="" method="post" class="form-horizontal">

        
    <?php

          $id = Input::get('id');

                $appleave = DB::getInstance()->query("SELECT * FROM employeeleave WHERE empLeaveId ='$id'");
                if(!$appleave->count()) {
                                
                             } else {
                                foreach ($appleave->results() as $appleave) {
                  
                                    $li = $appleave->empLeaveId;
                                    $lsd = $appleave->startDate;
                                    $led = $appleave->endDate;
                                    $lr = $appleave->reason;
                                    $lrb = $appleave->requestedBy;
                                    $ls = $appleave->status;
                                    $lt = $appleave->LeaveType;
                                    $ldi = $appleave->depId;
                                    $lab = $appleave->approvedBy;
              
                                    echo "<div>";
                                    echo "<table border='1' align='center' class='t'>";
                                    echo "<tr>";
                                    echo "<td>Leave Id</td>";
                                    echo "<td><input type='text' id='id' name='lid' value='";
                                    echo $li;
                                    echo "' readonly></td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>Start Date</td>";
                                    echo "<td><input type='text' id='lsdate' name='lsdate' value='";
                                    echo $lsd;
                                    echo "' readonly></td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>End Date</td>";
                                    echo "<td><input type='text' id='ledate' name='ledate' value='";
                                    echo $led;
                                    echo "' readonly></td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>Reason</td>";
                                    echo "<td><input type='text' id='lrea' name='lrea' value='";
                                    echo $lr;
                                    echo "' readonly></td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>Requested By</td>";
                                     $department = DB::getInstance()->query("SELECT * FROM employee WHERE empId = $lrb");
                                    if(!$department->count()) {
                                         echo 'No user';
                                    } else {
                                     foreach ($department->results() as $department) {
                                       $rb = $department->fullName;
                                     }
                                    }
                                    echo "<td><input type='hidden' id='lrby' name='lrby' value='$lrb'><input type='text' id='lrby1' name='lrby1' value='";
                                    echo $rb;
                                    echo "' readonly></td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>Status</td>";
                                    echo "<td><select type='text' id='lsta' name='lsta'>";
                                    echo "<option value='";
                                    echo $ls;
                                    echo "'>";
                                    echo $ls;
                                    echo "</option>";
                                    echo "<option value='Pending'>Pending</option>";
                                    echo "<option value='Approved'>Approved</option>";
                                    echo "<option value='Rejected'>Rejected</option>";
                                    echo "'</select></td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>Leave Type</td>";
                                    $department = DB::getInstance()->query("SELECT * FROM leavetype WHERE leaveTypeId = $lt");
                                    if(!$department->count()) {
                                         echo 'No user';
                                    } else {
                                     foreach ($department->results() as $department) {
                                       $l =$department->leaveTypeName;
                                     }
                                    }
                                    echo "<td><input type='hidden' id='lty' name='lty' value='$lt'><input type='text' id='lty1' name='lty1' value='";
                                    echo $l;
                                    echo "' readonly></td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>Department</td>";
                                    $department = DB::getInstance()->query("SELECT * FROM department WHERE depId = $ldi");
                                     if(!$department->count()) {
                                          echo 'No user';
                                     } else {
                                        foreach ($department->results() as $department) {
                            
                                         $d = $department->depName;
                                        }
                                    }
                                    echo "<td><input type='hidden' id='ldep' name='ldep' value='$ldi'><input type='text' id='ldep1' name='ldep1' value='";
                                    echo $d;
                                    echo "' readonly></td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>Approved By</td>";
                                    echo "<td><input type='text' id='laby' name='laby' value='";
                                    echo escape($user->data()->name);
                                    echo "' readonly></td>";
                                    echo "</tr>";
                                    echo "</table>";   
                                    echo "</div>";
                                }
                            }
        
?>
<?php
if(Input::exists()){
    if(Token::check(Input::get('token'))){
    
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
              'lsta' => array(
              'required' => true)
        ));

        if($validation->passed()){
            //change password
             $lid = Input::get('lid');
             $lsdate = Input::get('lsdate');
             $ledate = Input::get('ledate');
             $lrea = Input::get('lrea');
             $lrby = Input::get('lrby');
             $lsta = Input::get('lsta');
             $lty = Input::get('lty');
             $ldep = Input::get('ldep');
             $laby = Input::get('laby');

             $approveleaveupup = DB::getInstance()->query("UPDATE employeeleave SET startDate='$lsdate', 
                endDate = '$ledate',
                reason = '$lrea',
                requestedBy = '$lrby',
                status = '$lsta',
                 LeaveType = '$lty',
                depId = '$ldep',
                approvedBy = '$laby'
                WHERE empLeaveId ='$lid'");
             
                                 echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                            <span class="badge badge-pill badge-primary">Success</span>
                                                Leave '.$lsta.' Successfully!
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                       </div>';
                                       echo("<meta http-equiv='refresh' content='1'>"); //Refresh by HTTP META
                                    
        }else{
            //output errors
            foreach ($validation->errors() as $error) {
                echo '<br><div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" style="width:400px;margin-left:38%;">
                                                <span class="badge badge-pill badge-danger">Fail</span>&nbsp;&nbsp;'.
                                                    $error.'
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                      </div>';
            }
        }
    
    }
}

?>  
    <br><br>
             <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <div class="card-footer" align="right">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Approve/Reject Leave
                    </button>
                </div>
            </form>
        </div>
    </div>
        <!-- Header-->
       <?php// } ?>
   <?php
                $tb = isset($_GET['tab']) ? $_GET['tab'] : '';
                switch($tb) { //switch is just like a bunch of if()s
                   
                    //************************Leave Management**********************************************
                    case 'approveLeave': // page2, if changePage has the value of page2
                    include('approveLeave.php'); //include page2.html
                    break;  //break, witch means stop
                   
                    
                } //end the switch
            ?> 
       

     

    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="../assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/main.js"></script>


</body>
</html>