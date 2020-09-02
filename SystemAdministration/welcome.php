<?php
		require_once 'core/init.php';
	
//  $sid = Session::get(Config::get('session/session_name'));
?>
<!DOCTYPE html>
<html>
<head>
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MAHAWELI REACH HOTEL</title>
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
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin:0;
            font-size: 17px;
        }

        .container {
            padding-top: 30px;
            position: relative;
            max-width: 350px;
            margin: 0 auto;
            height: 200px;
            border-radius: 25px;
        }

        .container img {vertical-align: middle;}

        .container .content {
            position: absolute;
            bottom: 0;
            color: #000000;
            width: 100%;
            padding-bottom: 30px;
            text-align: center;
        }

        .content{text-align: center;
            background-color: green;}

        
    </style>
    <style>
    .dropbtn {
        background-color: #ffffff;
        color:black;
        padding: 16px;
        font-size: 16px;
        border: none;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {background-color: #ddd;}

    .dropdown:hover .dropdown-content {display: block;}

    .dropdown:hover .dropbtn {background-color: #ffffff;}

    .mp{
        padding-left: 10px;
        padding-right: 10px;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    </style>
</head>
</head>
<body>
    <?php //echo $sid ;
    $user = new User();
    if($user->isLoggedIn()){
    ?>
    <div style="background-color: white;width: auto; height:70px;">
        <div style="width: auto; height:50px; float: left; padding-left:20px;padding-top: 10px;">
            <img src='../images/systemAdministration/welcomelogo.gif' alt='logo' style=''>
        </div>
        <div style=" width: auto; height:70px; float: right; padding-right: 20px;padding-top: 10px;">
            <table border="0">
                <tr>
                    <td>
                        <div class="dropdown">
                          <button class="dropbtn"><?php echo escape($user->data()->name); ?></button>
                          <div class="dropdown-content">
                            <a href="logout.php">Logout</a>
                          </div>
                        </div>
                    </td>  
                    <td >
                        <div style="width: auto; height:50px; float: right; padding-right: 20px;padding-bottom: 10px;">
                                <img src='../images/systemAdministration/user.jpg' alt='logo' style='height:50px; width: 50px;'>
                        </div>
                    </td>
                    
                </tr>
            </table>
        </div>
    </div>
    <div style="background-color: gray;width: auto; height:3px;">
    </div>
        <br><div><table border = "0" align="center"><tr>
    <?php
         if($user->hasPermission('standarduser')){
            echo "
                <td class='mp'><a href='personalview.php'><div class='container' align='center' style='background-color:#C0392B;'>
                  <img src='../images/systemAdministration/personal.png' alt='admin' style='width:25%;''>
                  <div align='center'>
                    <h3>Personal</h3>
                  </div>
                </div></a></td>";
        }
         if($user->hasPermission('salesmanager')){
            echo "
                <td class='mp'><a href='../SalesManagement/salesView.php'><div class='container' align='center' style='background-color:#633974;'>
                  <img src='../images/systemAdministration/income.png' alt='admin' style='width:25%;''>
                  <div align='center'>
                    <h3>Sales & Marketing</h3>
                  </div>
                </div></a></td>";
        }
         if($user->hasPermission('fromanager')){
            echo "
                <td class='mp'><a href='../FrontOfficeManagement/frontOfficeView.php'><div class='container' align='center' style='background-color:#2471A3;'>
                  <img src='../images/systemAdministration/front.png' alt='admin' style='width:25%;''>
                  <div align='center'>
                    <h3>Front Office</h3>
                  </div>
                </div></a></td>";
        }
         if($user->hasPermission('rsmanager')){
            echo "
                <td class='mp'><a href='../Recreational/rcView.php'><div class='container' align='center' style='background-color:#148F77;'>
                  <img src='../images/systemAdministration/gym.png' alt='admin' style='width:25%;''>
                  <div align='center'>
                    <h3>Recreational Services</h3>
                  </div>
                </div></a></td></tr>";
        }
         if($user->hasPermission('restaurentmanager')){
            echo "
                <tr><td class='mp'><a href='../Resturant&Bar/R&B_View.php'><div class='container' align='center' style='background-color:#2ECC71;'>
                  <img src='../images/systemAdministration/food.png' alt='admin' style='width:25%;''>
                  <div align='center'>
                    <h3>Restaurent & Bar</h3>
                  </div>
                </div></a></td>";
        }
         if($user->hasPermission('hkmanager')){
            echo "
                <td class='mp'><a href='index.php'><div class='container' align='center' style='background-color:#F1C40F;'>
                  <img src='../images/systemAdministration/house.png' alt='admin' style='width:25%;''>
                  <div align='center'>
                    <h3>House-Keeping</h3>
                  </div>
                </div></a></td>";
        }
        if($user->hasPermission('admin')){
            echo "
                <td class='mp'><a href='adminView.php'><div class='container' align='center' style='background-color:#F39C12;'>
                  <img src='../images/systemAdministration/adminpanel.png' alt='admin' style='width:25%;''>
                  <div align='center'>
                    <h3>Admin Panel</h3>
                  </div>
                </div></a></td>";
        }
        if($user->hasPermission('hrmanager')){
            echo "
                <td class='mp'><a href='../HRM/hrManagerView.php'><div class='container' align='center' style='background-color:#DC7633;'>
                  <img src='../images/systemAdministration/hr.png' alt='admin' style='width:25%;''>
                  <div align='center'>
                    <h3>HR Management</h3>
                  </div>
                </div></a></td></tr>";
        }
        if($user->hasPermission('accountsmanager')){
            echo "
                <tr><td class='mp'><a href='../FinancialAccountant/FAView.php'><div class='container' align='center' style='background-color:#5D6D7E;'>
                  <img src='../images/systemAdministration/accounting.png' alt='admin' style='width:25%;''>
                  <div align='center'>
                    <h3>Accounts Management</h3>
                  </div>
                </div></a></td>";
        }
        if($user->hasPermission('inventorymanager')){
            echo "
                <td class='mp'><a href='../Inventory_Management/inventoryView.php'><div class='container' align='center' style='background-color:#212F3D;'>
                  <img src='../images/systemAdministration/storehouse.png' alt='admin' style='width:25%;''>
                  <div align='center'>
                    <h3>Inventory Management</h3>
                  </div>
                </div></a></td>";
        }
        ?></tr></table></div><?php
    }else{
    	Redirect::to('login.php');
    }
    ?>
<?php
        if(Session::exists('home')){
        $s = Session::flash('home');
        echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                            <span class="badge badge-pill badge-primary">Success</span>
                                                '. $s .'
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
        }
    ?>
    <script src="../assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/main.js"></script>

</body>
</html>