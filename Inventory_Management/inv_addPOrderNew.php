<?php
require_once 'core/init.php';

if(Input::exists()){


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

    'total_price' => array(
      'required' => true,
      'numbers' => true),

    'status' => array(
      'required' => true),

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

    $current =  date('Y-m-d');

            echo "<div class='sufee-alert alert with-close alert-success alert-dismissible fade show'>
                                            <span class='badge badge-pill badge-success'>Success</span>&nbsp &nbsp
                                                Validation successed
                                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>";

      
      $inventory2 = new Inventory();
      try{

        $inventory2->create('inv_orderd_items',array(
            'item_name' => Input::get('item_name'),
            'quantity' => Input::get('quantity'),
            'measuring_unit' => Input::get('measuring_unit'),
            'price_per_unit' => Input::get('price_per_unit'),
            'total_price' => Input::get('total_price'),
            'order_date' => $current,
            'status' => Input::get('status'),
            'cId' => Input::get('cId_input'),
            'sup_Id' => Input::get('sup_Id_input')

        ));

            echo "<div class='sufee-alert alert with-close alert-success alert-dismissible fade show'>
                                            <span class='badge badge-pill badge-success'>Success</span>&nbsp &nbsp
                                                Purchase order is ready for geting approval from accounts depatment!
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
                            <li><a href="#">Purchase Orders</a></li>
                            <li class="active">Add Purchase Order</li>
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
                        <strong><i class="fa fa-plus-square-o"></i>&nbsp; Add Purchase Order</strong>
                        <div align="right"><a class="btn btn-primary" href="addPOrderDemo.php" role="button">Demo</a></div>
                      </div>
                      
                      <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                      <div class="card-body card-block">
                        

                            <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Item Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="item_name" name="item_name" autocomplete="off" value="" class="form-control"><small class="form-text text-muted">Please enter name.</small></div></div>
                            
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Quantity</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="quantity" name="quantity" autocomplete='off' value="" class="form-control"><small class="form-text text-muted">Please enter quantity.</small></div></div>

                            <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Select Measuring Unit</label></div>
                            <div class="col-12 col-md-9">
                            <select name="measuring_unit" id="measuring_unit" class="form-control">
                              <option value="0">Please select Measuring Unit</option>
                                <option value="Kg">Kg</option>
                                <option value="Ltr">Ltr</option>
                                <option value="Each">Each</option>
                            </select></div></div>
                            
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Price Per Unit</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="price_per_unit" name="price_per_unit" autocomplete="off" value="" class="form-control"><small class="form-text text-muted">Please enter unit price.</small></div></div>
                            
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label|">Total Price</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="total_price" name="total_price" readonly=""  value="" class="form-control"></div></div>

                            <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Set Status</label></div>
                            <div class="col-12 col-md-9">
                                <select name="status" id="status" class="form-control">
                                  <option value="0">Please set state</option>
                                  <option value="Pending">Pending</option>
                                </select></div></div>
                          
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Category</label></div>
                            <div class="col-12 col-md-9">
                                <select name="cIds" id="cIds" class="form-control">
                                                    <?php
                                $cats = DB::getInstance()->query("SELECT * FROM inv_category");
                                ?>
                                               
                                                
                                <option value="0">Please select Category</option>
                                <?php
                                 foreach ($cats->results() as $cat) {

                                                    echo "<option value='$cat->cId'>";
                                                    echo $cat->name;
                                                    echo "</option>";
                                        }
                                ?>
                                </select></div></div>

                          <div class="row form-group">
                          <div class="col col-md-3"><label for="text" class=" form-control-label">Category ID</label></div>
                          <div class="col-12 col-md-9"><input type="text" id="cId_input" name="cId_input" value="" readonly="" class="form-control"></div></div>
         
                          <div class="row form-group">
                          <div class="col col-md-3"><label for="select" class=" form-control-label">Supplier</label></div>
                          <div class="col-12 col-md-9">
                          <select name="sup_Ids" id="sup_Ids" class="form-control">
                                   
                                    <option value="0">Please select Supplier</option>
                                  
                                    
                          </select></div></div>
                      
                          <div class="row form-group">
                          <div class="col col-md-3"><label for="text" class=" form-control-label">Supplier ID</label></div>
                          <div class="col-12 col-md-9"><input type="text" id="sup_Id_input" name="sup_Id_input" value="" readonly="" class="form-control"></div></div>

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
<script>

$("#price_per_unit").keyup(function(){

    var units = $("#quantity").val();
    var unitp = $(this).val();

    $("#total_price").val(units * unitp);
});

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

$("#price_per_unit").keyup(function(){

    var units = $("#quantity").val();
    var unitp = $(this).val();

    $("#total_price").val(units * unitp);
});

$("#sup_Ids").change(function(){
  $("#sup_Id_input").val($(this).val());
});



</script> 
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
                    //case 'inv_addPOrderNew': // page4, if changePage has the value of page3
                    //include('inv_addPOrderNew.php'); //include page4.html
                    //break;  //break, witch means stop
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