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
<script src="inv_js/jquery-3.3.1.min.js"></script>
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
                    
                    <h3 class="menu-title">Inventory Management</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                    <a href="inventoryView.php?tab=dashboard" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-home"></i>Dashboard</a></li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-sitemap"></i>Categories</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-sort-amount-asc"></i><a href="inventoryView.php?tab=inv_viewCategory">View Categories</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="inventoryView.php?tab=inv_addCategory">Add New Category</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti ti-user"></i>Suppliers</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-sort-amount-asc"></i><a href="inventoryView.php?tab=inv_viewSuppliers">View Suppliers</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="inventoryView.php?tab=inv_addSupplier">Add New Supplier</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti ti-package"></i>General Stock</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-sort-amount-asc"></i><a href="inventoryView.php?tab=inv_viewStock">View Stock</a></li>
                            <li><i class="ti ti-face-sad"></i><a href="inventoryView.php?tab=inv_viewLowStock">Low Stock</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="inventoryView.php?tab=inv_addStockItem">Add New Item</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-truck"></i>Transfer/Issue Items</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-sort-amount-asc"></i><a href="inventoryView.php?tab=inv_viewReqisitions">View Requested Items</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-money"></i>Purchase Orders</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-archive"></i><a href="inventoryView.php?tab=inv_viewLowStockForPO">Items to be Ordered</a></li>
                            <li><i class="fa fa-plus-square-o"></i><a href="inventoryView.php?tab=inv_addPOrderNew">Add New Order</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-print"></i>Reports</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-file-text-o"></i><a href="inventoryView.php?tab=IssueReport">Report of Issued Goods</a></li>
                            <li><i class="fa fa-list-alt"></i><a href="inventoryView.php?tab=arrivalsReport">New Arrivals</a></li>
                            <li><i class="fa fa-file-o"></i><a href="inventoryView.php?tab=discardReport">Discarded Items</a></li>
                            <li><i class="fa fa-file-o"></i><a href="inventoryView.php?tab=POrderReport">Purchase Orders</a></li>
                            <li><i class="fa fa-file-o"></i><a href="inventoryView.php?tab=catReport">Item Precentage of Categories</a></li>
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

     <div class="breadcrumbs">
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
                            <li><a href="#">Inventory Management</a></li>
                            <li><a href="#">General Stock</a></li>
                            <li class="active">Update Stock Item Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong><i class="fa fa-edit (alias)"></i>&nbsp; Update stock Item Details</strong>
            </div>
        
        <div class="card-body card-block">
           <form action="" method="post">
        <?php

         $ab = Input::get('id');
                $upstock = DB::getInstance()->query("SELECT * FROM inv_recieved_items WHERE item_id ='$ab'");
                if(!$upstock->count()) {
                                  echo '<br><div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" style="width:400px;margin-left:38%;">
                                                <span class="badge badge-pill badge-danger">Fail</span>&nbsp;&nbsp;
                                                No Stock item matches the Input, Please Enter correct item!
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                      </div>';
                             } else {
                                foreach ($upstock->results() as $upstock) {
                                    
                                    $item_id = $upstock -> item_id;
                                    $item_name = $upstock -> item_name;
                                    $quantity = $upstock -> quantity;
                                    $measuring_unit = $upstock -> measuring_unit;
                                    $price_per_unit = $upstock -> price_per_unit;
                                    $supply_date = $upstock -> supply_date;
                                    $expiry_date = $upstock -> expiry_date; 
                                    
                                    echo "<div class='row form-group'>";
                                    echo "<div class='col col-md-3'><label for='text-input' class=' form-control-label'>Item Name</label></div>";
                                    echo "<div class='col-12 col-md-9'><input type='text' id='item_name' name='item_name' autocomplete='off' value='";
                                    echo $item_name;
                                    echo "' class='form-control'><small class='form-text text-muted'>Please enter item name </small></div></div>";
                            
                                    echo "<div class='row form-group'>";
                                    echo "<div class='col col-md-3'><label for='text-input' class=' form-control-label'>Quantity</label></div>";
                                    echo "<div class='col-12 col-md-9'><input type='text' id='quantity' name='quantity' readonly='' autocomplete='off' value='";
                                    echo $quantity;
                                    echo "' class='form-control'></div></div>";

                                    echo "<div class='row form-group'>";
                                    echo "<div class='col col-md-3'><label for='select' class=' form-control-label'>Select Measuring Unit</label></div>";
                                    echo "<div class='col-12 col-md-9'>";
                                    echo "<select name='measuring_unit' id='measuring_unit' class='form-control'>";
                                    echo "<option value='0'>Please select Measuring Unit</option>";
                                    echo "<option value='Kg'>Kg</option>";
                                    echo "<option value='Ltr'>Ltr</option>";
                                    echo "<option value='Each'>Each</option>";
                                    echo "</select></div></div>";
                            
                                    echo "<div class='row form-group'>";
                                    echo "<div class='col col-md-3'><label for='text-input' class=' form-control-label'>Price Per Unit</label></div>";
                                    echo "<div class='col-12 col-md-9'><input type='text' id='price_per_unit' name='price_per_unit' autocomplete='off' value='";
                                    echo $price_per_unit;
                                    echo "' class='form-control'><small class='form-text text-muted'>Please enter price.</small></div></div>";
                            
                                    echo "<div class='row form-group'>";
                                    echo "<div class='col col-md-3'><label for='email-input' class=' form-control-label'>Arrival Date</label></div>";
                                    echo "<div class='col-12 col-md-9'><input type='date' id='supply_date' name='supply_date' value='";
                                    echo $supply_date;
                                    echo "' class='form-control'><small class='form-text text-muted'>Please enter arrival date</small></div></div>";
                            
                                    echo "<div class='row form-group'>";
                                    echo "<div class='col col-md-3'><label for='email-input' class=' form-control-label'>Expiry Date (OPTIONAL) </label></div>";
                                    echo "<div class='col-12 col-md-9'><input type='date' id='expiry_date' name='expiry_date' value='";
                                    echo $expiry_date;
                                    echo "' class='form-control'><small class='form-text text-muted'>If it is a non-food item or non-chemical you can ignore this field</small></div></div>"; 
                          
                                    echo "<div class='row form-group'>";
                                    echo "<div class='col col-md-3'><label for='select' class=' form-control-label'>Category</label></div>";
                                    echo "<div class='col-12 col-md-9'>";
                                    echo "<select name='cIds' id='cIds' class='form-control'>";
                                
                                    $cats = DB::getInstance()->query("SELECT * FROM inv_category");
          
                                    echo "<option value='0'>Please select Category</option>";
    
                                    foreach ($cats->results() as $cat) {

                                                    echo "<option value='$cat->cId'>";
                                                    echo $cat->name;
                                                    echo "</option>";
                                        }
    
                                    echo "</select></div></div>";

                                    echo "<div class='row form-group'>";
                                    echo "<div class='col col-md-3'><label for='text' class=' form-control-label'>Category ID</label></div>";
                                    echo "<div class='col-12 col-md-9'><input type='text' id='cId_input' name='cId_input' value='' readonly='' class='form-control'></div></div>";
         
                                    echo "<div class='row form-group'>";
                                    echo "<div class='col col-md-3'><label for='select' class=' form-control-label'>Supplier</label></div>";
                                    echo "<div class='col-12 col-md-9'>";
                                    echo "<select name='sup_Ids' id='sup_Ids' class='form-control'>";
                                    
                                
                                    echo "<option value='0'>Please select Supplier</option>";
    
                                    echo "</select></div></div>";
                      
                                    echo "<div class='row form-group'>";
                                    echo "<div class='col col-md-3'><label for='text' class=' form-control-label'>Supplier ID</label></div>";
                                    echo "<div class='col-12 col-md-9'><input type='text' id='sup_Id_input' name='sup_Id_input' value='' readonly='' class='form-control'></div></div>";

                                }
                            }

if(Input::exists()){
    if(Token::check(Input::get('token'))){
        

    $validate = new Validate();
    $validation = $validate->check($_POST, array(
    'item_name' => array(
      'name' => 'item_name',
      'required' => true,
      'min' => 2,
      'max' => 100),

    'quantity' => array(
      'required' => true,
      'numbers' => true),

    'measuring_unit' => array(
      'required' => true),

    'price_per_unit' => array(
      'required' => true,
      'numbers' => true),

    'supply_date' => array(
      'required' => true),

    'expiry_date' => array(
      'expDate' => 'supply_date',
      'expDateMatch' => date('Y-m-d')),

    'cIds' => array(
      'required' => true),

    'cId_input' => array(
      'required' => true),

    'sup_Ids' => array(
      'required' => true),

    'sup_Id_input' => array(
      'required' => true)
        ));

        if($validation->passed()){

            $c = Input::get('expiry_date');
            if(empty($c)){
                $c = null;
            }

                
            $item_names = Input::get('item_name');
            $quantity = Input::get('quantity');
            $measuring_unit = Input::get('measuring_unit');
            $price_per_unit = Input::get('price_per_unit');
            $supply_date = Input::get('supply_date');
            $expiry_date = $c;
            $cId = Input::get('cId_input');
            $sup_Id = Input::get('sup_Id_input');

                    $catup = DB::getInstance()->query("UPDATE inv_recieved_items SET item_name='$item_names', quantity = '$quantity', measuring_unit='$measuring_unit', price_per_unit='$price_per_unit', supply_date='$supply_date', expiry_date='$expiry_date', cId='$cId', sup_Id='$sup_Id' WHERE item_id='$item_id'");

                    $arrivs = DB::getInstance()->query("UPDATE inv_arrivals SET item_name='$item_names', quantity = '$quantity', measuring_unit='$measuring_unit', supply_date='$supply_date', expiry_date='$expiry_date', cId='$cId', sup_Id='$sup_Id' WHERE item_name='$item_name'");

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
    </div>
             <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Save Changes
                    </button>
                </div>
            </form>
        
    </div>
                        
                        </div>
    
                    </div>
                </div>
            </div>
        <!-- Header-->
       <?php// } ?>
   <?php
                $tb = isset($_GET['tab']) ? $_GET['tab'] : '';
                switch($tb) { //switch is just like a bunch of if()s
                    //**********************************************************************
                    //default: //default case
                    //include('Dashboard.php'); //include page.html
                    //break;  //break, witch means stop
                    case 'dashboard': // page2, if changePage has the value of page2
                    include('Dashboard.php'); //include page2.html
                    break;  //break, witch means stop
                    //**********************************************************************
                    case 'inv_viewCategory': // page3, if changePage has the value of page3
                    include('inv_viewCategory.php'); //include page3.html
                    break;  //break, witch means stop
                    case 'inv_addCategory': // page3, if changePage has the value of page3
                    include('inv_addCategory.php'); //include page3.html
                    break;  //break, witch means stop 
                    case 'addCategoryDemo': // page3, if changePage has the value of page3
                    include('addCategoryDemo.php'); //include page3.html
                    break;  //break, witch means stop 
                    case 'inv_updateCategory': // page4, if changePage has the value of page3
                    include('inv_updateCategory.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'inv_deleteCategory': // page4, if changePage has the value of page3
                    include('inv_deleteCategory.php'); //include page4.html
                    break;  //break, witch means stop
                    //**********************************************************************
                    case 'inv_viewSuppliers': // page4, if changePage has the value of page3
                    include('inv_viewSuppliers.php'); //include page4.html
                    break;  //break, witch means stop 
                    case 'inv_addSupplier': // page4, if changePage has the value of page3
                    include('inv_addSupplier.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'addSupplierDemo': // page4, if changePage has the value of page3
                    include('addSupplierDemo.php'); //include page4.html
                    break;  //break, witch means stop 
                    case 'inv_deleteSupplier': // page4, if changePage has the value of page3
                    include('inv_deleteSuppliers.php'); //include page4.html
                    break;  //break, witch means stop 
                    case 'inv_updateSupplier': // page4, if changePage has the value of page3
                    include('inv_updateSupplier.php'); //include page4.html
                    break;  //break, witch means stop 
                    //**********************************************************************
                    case 'inv_viewStock': // page4, if changePage has the value of page3
                    include('inv_viewStock.php'); //include page4.html
                    break;  //break, witch means stop 
                    case 'inv_viewLowStock': // page4, if changePage has the value of page3
                    include('inv_viewLowStock.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'inv_addStockItem': // page4, if changePage has the value of page3
                    include('inv_addStockItem.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'addStockDemo': // page4, if changePage has the value of page3
                    include('iaddStockDemo.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'inv_deleteStockItem': // page4, if changePage has the value of page3
                    include('inv_deleteStockItem.php'); //include page4.html
                    break;  //break, witch means stop
                    //case 'inv_updateStockItem': // page4, if changePage has the value of page3
                    //include('inv_updateStockItem.php'); //include page4.html
                    //break;  //break, witch means stop
                    case 'inv_updateLowStock': // page4, if changePage has the value of page3
                    include('inv_updateLowStock.php'); //include page4.html
                    break;  //break, witch means stop
                    //**********************************************************************
                    case 'inv_viewReqisitions': // page4, if changePage has the value of page3
                    include('inv_viewReqisitions.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'inv_addIssue': // page4, if changePage has the value of page3
                    include('inv_addIssue.php'); //include page4.html
                    break;  //break, witch means stop
                    //**********************************************************************
                    case 'inv_addPOrder': // page4, if changePage has the value of page3
                    include('inv_addPOrder.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'inv_addPOrderNew': // page4, if changePage has the value of page3
                    include('inv_addPOrderNew.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'addPOrderDemo': // page4, if changePage has the value of page3
                    include('addPOrderDemo.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'inv_viewLowStockForPO': // page4, if changePage has the value of page3
                    include('inv_viewLowStockForPO.php'); //include page4.html
                    break;  //break, witch means stop
                    //**********************************************************************
                    case 'IssueReport': // page4, if changePage has the value of page3
                    include('IssueReport.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'arrivalsReport': // page4, if changePage has the value of page3
                    include('arrivalsReport.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'discardReport': // page4, if changePage has the value of page3
                    include('discardReport.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'POrderReport': // page4, if changePage has the value of page3
                    include('POrderReport.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'catReport': // page4, if changePage has the value of page3
                    include('catReport.php'); //include page4.html
                    break;  //break, witch means stop
                    //**********************************************************************


                } //end the switch
            ?> 
       

     

    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="../assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/main.js"></script>

    <script>
$("#cIds").change(function(){
  $("#cId_input").val($(this).val());
});

$(document).ready(function() {
  $("#cIds").change(function() {
    var c_idss = $(this).val();
    if(c_idss != "") {
      $.ajax({
        url:"getStock.php",
        data:{c_id:c_idss},
        type:'POST',
        success:function(response) {
          var resp = $.trim(response);
          $("#sup_Ids").html(resp);
        }
      });
    } else {
      $("#sup_Ids").html("<option value=''>Please select Supplier</option>");
    }
  });
});

$("#sup_Ids").change(function(){
  $("#sup_Id_input").val($(this).val());
});



</script> 


</body>
</html>
