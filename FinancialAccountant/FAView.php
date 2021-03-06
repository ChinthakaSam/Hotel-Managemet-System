<?php
require_once 'core/init.php';
    
    $user = new User();
    if($user->isLoggedIn()){
    
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
                       </div></a>
                    
                    </li>
                    <h3 class="menu-title">Payroll Management</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Additions</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="FAView.php?tab=allowance1">Alllowance 1</a></li>

                             <li><i class="fa fa-puzzle-piece"></i><a href="FAView.php?tab=allowance2">Alllowance 2</a></li>
                              <li><i class="fa fa-puzzle-piece"></i><a href="FAView.php?tab=allowancemain">Alllowance Main</a></li>
                              <li><i class="fa fa-puzzle-piece"></i><a href="FAView.php?tab=updateallowance">Update Alllowance </a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Deductions</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="FAView.php?tab=deduction1">Deduction 1</a></li>
                            <li><i class="fa fa-puzzle-piece"></i><a href="FAView.php?tab=deduction2">Deduction 2</a></li>
                            <li><i class="fa fa-puzzle-piece"></i><a href="FAView.php?tab=deductionmain">Deduction Main</a></li>
                            <li><i class="fa fa-puzzle-piece"></i><a href="FAView.php?tab=updatededuction">Update Deduction </a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Salary</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="FAView.php?tab=overpay">Payroll overview</a></li>
                             <li><i class="fa fa-puzzle-piece"></i><a href="FAView.php?tab=F_salary">F_salary</a></li>
                            <li><i class="fa fa-puzzle-piece"></i><a href="FAView.php?tab=Testing">Testing</a></li>
                            <li><i class="fa fa-puzzle-piece"></i><a href="FAView.php?tab=Testing1">Testing1</a></li>
                           
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


                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../images/images1/admin.jpg" class="user-avatar rounded-circle"/>
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="hrManagerView.php?tab=myProfile"><i class="fa fa- user"></i>My Profile</a>
<!--
                                <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                                <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>
-->
                                <a class="nav-link" href="hrManagerView.php?tab=logout"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                    
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->
       <?php } ?>
    <?php
                $tb = isset($_GET['tab']) ? $_GET['tab'] : '';
                switch($tb) { //switch is just like a bunch of if()s
                    default: //default case
                    include('Dashboard.php'); //include page.html
                    break;  //break, witch means stop
                    case 'allowance1': // page2, if changePage has the value of page2
                    include('allowance1.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'allowance2': // page2, if changePage has the value of page2
                    include('allowance2.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'allowancemain': // page2, if changePage has the value of page2
                    include('allowancemain.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'updateallowance': // page2, if changePage has the value of page2
                    include('updateallowance.php'); //include page2.html
                    break;  //break, witch means stop


                    case 'deduction1': // page2, if changePage has the value of page2
                    include('deduction1.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'deduction2': // page2, if changePage has the value of page2
                    include('deduction2.php'); //include page2.html
                    break;  //break, witch means stop

                    case 'deductionmain': // page2, if changePage has the value of page2
                    include('deductionmain.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'updatededuction': // page2, if changePage has the value of page2
                    include('updatededuction.php'); //include page2.html
                    break;  //break, witch means stop
                    

                    case 'overpay': // page2, if changePage has the value of page2
                    include('overpay.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'Testing': // page2, if changePage has the value of page2
                    include('Testing.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'Testing1': // page2, if changePage has the value of page2
                    include('Testing1.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'F_salary': // page2, if changePage has the value of page2
                    include('F_salary.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'dashboard': // page2, if changePage has the value of page2
                    include('Dashboard.php'); //include page2.html
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
