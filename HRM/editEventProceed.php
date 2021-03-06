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

        input,textarea{
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Employee Details</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="hrManagerView.php?tab=addEmployee">Add Employee</a></li>
                            <li><a href="hrManagerView.php?tab=editEmployee">Edit Employee</a></li>
                            <li><a href="hrManagerView.php?tab=deleteEmployee">Delete Employee</a></li>
                             <li><a href="hrManagerView.php?tab=viewEmployee">View Employee</a></li>
                            
                        </ul>
                    </li>
                    <h3 class="menu-title"></h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-folder"></i>Personal File</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="hrManagerView.php?tab=attachDocuments">Attach Documents</a></li>
                            <li><a href="hrManagerView.php?tab=deleteDocuments">Delete Documents</a></li>
                        </ul>
                    </li>  
                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Employee Documents</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="hrManagerView.php?tab=addDocumentType">Add Document Types</a></li>
                            <li><a href="hrManagerView.php?tab=editDocumentType">Edit Document Types</a></li>
                            <li><a href="hrManagerView.php?tab=deleteDocumentType">Delete Document Types</a></li>
                        </ul>
                    </li>  
                    <h3 class="menu-title"></h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart-o"></i>Employee Evaluation</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="hrManagerView.php?tab=addEvaluation">Add Evaluation</a></li>
                        </ul>
                    </li>  
                     <h3 class="menu-title"></h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-pencil-square-o"></i>Leave Management</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="hrManagerView.php?tab=approveLeave">Approve Leave</a></li>
                        </ul>
                    </li>
                     <h3 class="menu-title"></h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Department Details</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="hrManagerView.php?tab=addDepartment">Add Department</a></li>
                            <li><a href="hrManagerView.php?tab=editDepartment">Edit Department</a></li>
                            <li><a href="hrManagerView.php?tab=deleteDepartment">Delete Department</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title"></h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-certificate"></i>Designation Details</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="hrManagerView.php?tab=addDesignation">Add Designation</a></li>
                            <li><a href="hrManagerView.php?tab=editDesignation">Edit Designation</a></li>
                            <li><a href="hrManagerView.php?tab=deleteDesignation">Delete Designation</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title"></h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-trophy"></i>Training Details</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="hrManagerView.php?tab=addTraining">Add Training</a></li>
                            <li><a href="hrManagerView.php?tab=editTraining">Edit Training</a></li>
                            <li><a href="hrManagerView.php?tab=deleteTraining">Delete Training</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title"></h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Events</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="hrManagerView.php?tab=addEvent">Add Event</a></li>
                            <li><a href="hrManagerView.php?tab=editEvent">Edit Event</a></li>
                            <li><a href="hrManagerView.php?tab=deleteEvent">Delete Event</a></li>
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
                <strong>Edit Event</strong>
            </div>
        
        <div class="card-body card-block">
           <form action="" method="post">
        <?php

         $y = Input::get('id');
                $newy = DB::getInstance()->query("SELECT * FROM event WHERE id ='$y'");
                if(!$newy->count()) {
                                  echo '<br><div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" style="width:400px;margin-left:38%;">
                                                <span class="badge badge-pill badge-danger">Fail</span>&nbsp;&nbsp;
                                                No user matches the Input, Please Enter correct username!
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                      </div>';
                             } else {
                                foreach ($newy->results() as $newy) {
                  
                                    $xid = $newy->Id;
                                    $xtitle = $newy->title;
                                    $xdate = $newy->created_date;
                                    $xpriority = $newy->priority;
                                    $xdes= $newy->description; 
                                    
                                    echo "<div>";
                                    echo "<table border='1' align='center' class='t'>";
                                    echo "<tr>";
                                    echo "<td>Event ID</td>";
                                    echo "<td><input type='text' id='id' name='id' value='";
                                    echo $xid;
                                    echo "' readonly></td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>Event Name</td>";
                                    echo "<td><input type='text' id='event_name' name='event_name' value='";
                                    echo $xtitle;
                                    echo "'/></td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>Event Description</td>";
                                    echo "<td><textarea type='text' id='description' name='description' cols='50' rows='4'>";
                                    echo $xdes;
                                    echo "</textarea></td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>Priority</td>";
                                    echo "<td><input type='text' id='priority' name='priority' value='";
                                    echo $xpriority;
                                    echo "'/></td>";
                                    echo "</tr>";
                                    echo "</table>";   
                                    echo "</div>";
                                }
                            }

if(Input::exists()){
    if(Token::check(Input::get('token'))){
        

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
              'event_name' => array(
              'required' => true,
              'min' => 2,
              'max' => 100
            ),
            'description' => array(
              'required' => true,
              'min' => 2,
              'max' => 250
            ),
            'priority' => array(
              'required' => true
            )
        ));

        if($validation->passed()){
            //change password
                 $userup = DB::getInstance()->update('event',$xid, array(
                                        'title' => Input::get('event_name'),
                                        'created_date' => date('Y-m-d H:i:s'),
                                        'priority' => Input::get('priority'),
                                        'description' => Input::get('description')
                                     ));
                                 echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                            <span class="badge badge-pill badge-primary">Success</span>
                                                Changes has been saved Successfully!
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                       </div>';
                

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
                        <i class="fa fa-dot-circle-o"></i> Save Changes
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
                    case 'approveLeaveProceed': // page2, if changePage has the value of page2
                    include('approveLeaveProceed.php'); //include page2.html
                    break;  //break, witch means stop
                    //************************Leave Management**********************************************
                    case 'approveLeave': // page2, if changePage has the value of page2
                    include('approveLeave.php'); //include page2.html
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
                    /*
                    case 'editEventProceed': // page2, if changePage has the value of page2
                    include('editEventProceed.php'); //include page2.html
                    break;  //break, witch means stop
                    */
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
