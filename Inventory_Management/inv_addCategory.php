<?php
require_once 'core/init.php';

if(Input::exists()){
  $validate = new validate();
  $validation = $validate->check($_POST, array(
    'name' => array(
      'name' => 'name',
      'required' => true,
      'min' => 4,
      'max' => 100),

    'description' => array(
      'required' => true,
      'max' => 600)
  ));

  if($validation->passed()){
    echo "<div class='sufee-alert alert with-close alert-success alert-dismissible fade show'>
                                            <span class='badge badge-pill badge-success'>Success</span>&nbsp &nbsp
                                                Validation successed
                                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>";

      $inventory = new Inventory();
      try{

        $inventory->create('inv_category',array(
            'name' => Input::get('name'),
            'description' => Input::get('description')
        ));

            echo "<div class='sufee-alert alert with-close alert-success alert-dismissible fade show'>
                                            <span class='badge badge-pill badge-success'>Success</span>&nbsp &nbsp
                                                Category is successfully added to the database
                                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>";


      } catch(Exception $e){
          die($e->getMessage());
      }



  } else {
    foreach($validation->errors() as $error){
        
        echo "<div class='sufee-alert alert with-close alert-danger alert-dismissible fade show'>
                                            <span class='badge badge-pill badge-danger'>Validation error</span>&nbsp &nbsp
                                                $error
                                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>";
    }
  }
}

?>
<html>
<body>
    
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
                            <li><a href="#">Categories</a></li>
                            <li class="active">Add New Category</li>
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
                        <strong><i class="fa fa-plus-square-o"></i>&nbsp; Add New Category</strong>
                        <div align="right"><a class="btn btn-primary" href="addCategoryDemo.php" role="button">Demo</a></div>
                      </div>
                     
                      <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                      <div class="card-body card-block">
                        
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="name"  class=" form-control-label">Category Name</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Category Name" autocomplete="off" value="" class="form-control"><small class="form-text text-muted">Please enter category Name </small></div></div>
                          
                           <div class="row form-group">
                            <div class="col col-md-3"><label for="description" class=" form-control-label"> Description About The Category</label></div>
                            <div class="col-12 col-md-9"><textarea name="description" id="description" rows="6" placeholder="What kind of items belong to this category..." autocomplete="off" Value="" class="form-control"></textarea></div>
                          </div>

                        
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> Reset
                        </button>

                      </form>
                      </div>
                    </div>
    
                    </div>
                </div>
            </div>
    </div>
    
    <script src="../assets/js/popper.min.js"></script>

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
                    //case 'inv_addCategory': // page3, if changePage has the value of page3
                    //include('inv_addCategory.php'); //include page3.html
                    //break;  //break, witch means stop 
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
                    case 'inv_updateStockItem': // page4, if changePage has the value of page3
                    include('inv_updateStockItem.php'); //include page4.html
                    break;  //break, witch means stop
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
</body>
</html>