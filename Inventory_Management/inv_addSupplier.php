<?php
require_once 'core/init.php';


if(Input::exists()){
  $validate = new validate();
  $validation = $validate->check($_POST, array(
    'name' => array(
      'name' => 'name',
      'required' => true,
      'min' => 5,
      'max' => 100),
    
    'address' => array(
      'required' => true,
      'min' => 5,
      'max' => 250),

    'contact_person' => array(
      'required' => true,
      'min' => 5,
      'max' => 100),

    'phone' => array(
      'required' => true,
      'min' => 10,
      'numbers' => true,
      'max' => 10),

    'email' => array(
      'required' => true,
      'min' => 10,
      'max' => 200),

    'supplying_category' => array(
      'required' => true),

    'cId' => array(
      'required' => true)
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

        $inventory->create('inv_supplier',array(
            'name' => Input::get('name'),
            'address' => Input::get('address'),
            'contact_person' => Input::get('contact_person'),
            'phone' => Input::get('phone'),
            'email' => Input::get('email'),
            'cId' => Input::get('cId')
        ));

            echo "<div class='sufee-alert alert with-close alert-success alert-dismissible fade show'>
                                            <span class='badge badge-pill badge-success'>Success</span>&nbsp &nbsp
                                                Supplier is successfully added to the database
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
<head>
<script src="inv_js/jquery-3.3.1.min.js"></script>
</head>
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
                            <li><a href="#">Suppliers</a></li>
                            <li class="active">Add New Supplier</li>
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
                        <strong><i class="fa fa-plus-square-o"></i>&nbsp; Add New Supplier</strong>
                        <div align="right"><a class="btn btn-primary" href="addSupplierDemo.php" role="button">Demo</a></div>
                      </div>

                      <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                      <div class="card-body card-block">
                        

                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Supplier's Name</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="name" name="name" autocomplete="off" placeholder="Name" class="form-control"><small class="form-text text-muted">Please enter supplier's name </small></div></div>
                          
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Supplier's Address</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="address" name="address" autocomplete="off" placeholder="Address" class="form-control"><small class="form-text text-muted">Please enter supplier's address </small></div></div>
                            
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Contact Person</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="contact_person" name="contact_person" placeholder="Name" autocomplete="off" class="form-control"><small class="form-text text-muted">Please enter the Name of a contact person </small></div></div>

                            
                            
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Contact Number</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="phone" name="phone" autocomplete="off" placeholder="012 3456789" class="form-control"><small class="form-text text-muted">Please enter Supplier's contact number</small></div>
                          </div>
                            

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email</label></div>
                            <div class="col-12 col-md-9"><input type="email" id="email" name="email" autocomplete="off" placeholder="someone@somemail.com" class="form-control"><small class="form-text text-muted">Please enter supplier's email</small></div>
                          </div>

                          <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Supplying Category</label></div>
                            <div class="col-12 col-md-9">
                              <select name="supplying_category" id="supplying_category" class="form-control">
                                <?php
                                $cats = DB::getInstance()->query("SELECT * FROM inv_category");
                                ?>
                                               
                                                
                                <option value="0">Please select a Category</option>
                                <?php
                                 foreach ($cats->results() as $cat) {
                                                    $catselect = $cat->name;
                                                    echo "<option value='$cat->cId'>";
                                                    echo $catselect;
                                                    echo "</option>";
                                        }
                                ?>
                              </select>
                            </div>
                            </div>
                            
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="text" class=" form-control-label">Category ID</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="cId" name="cId" value="" readonly="" class="form-control"></div>
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
 <script type="text/javascript">
$("#supplying_category").change(function(){
  $("#cId").val($(this).val());
});
 </script>   
</body>
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
                    //case 'inv_addSupplier': // page4, if changePage has the value of page3
                    //include('inv_addSupplier.php'); //include page4.html
                    //break;  //break, witch means stop
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

</html>