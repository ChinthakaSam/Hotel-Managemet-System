<?php
require_once 'core/init.php';

$user = new User();

// var_dump(Token::check(Input::get('token')));
if(!$user->isLoggedIn()){
    Redirect::to('../SystemAdministration/login.php');
}

if(Input::exists()){
  $validate = new validate();
  $validation = $validate->check($_POST, array(
    'allowance_name' => array( //table_col_name
      'required' => true,
      'min' => 1,
      'max' => 100
    ),
    'amount' => array(
      'required' => true,
      /*'min' => 2,
      'max' => 150*/
    ),
  ));

  if($validation->passed()){
      $allowancemain = new allowancemain();
      try{

        $allowancemain->create('allowance',array(
            'alw_name' => Input::get('allowance_name'),
            'alw_amount' => Input::get('amount'),
       
        ));  
            echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                            <span class="badge badge-pill badge-primary">Success</span>
                                                allowancemain details has been added Successfully!
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';

 
      } catch(Exception $e){
          die($e->getMessage());
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
<!--<div class="breadcrumbs">
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
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Inventory Management</a></li>
                            <li><a href="#">General Stock</a></li>
                            <li class="active">Add New Item</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>-->
  
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    
                    <div class="card">
                      <div class="card-header">
                        <strong><i class="fa fa-plus-square-o"></i>&nbsp; Salary Overview</strong>
                      </div>
                      
                      <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                      <div class="card-body card-block">
                        

                         <!-- <div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Allowance ID</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="units" name="units" placeholder="Qunatity as units" class="form-control"><small class="form-text text-muted">Please enter allowance id</small></div>
                          </div>-->


                            <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Addition Name </label></div>
                            <!--item_name-->
                                <div class="col-12 col-md-9"><input type="text" id="allowance_name" name="allowance_name" placeholder="Addition name" class="form-control"><small class="form-text text-muted">Please enter allowance name. </small></div></div>
                            
                            
                            <!--id-   price_per_unit-->
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Amount</label></div>
                            <!--price_per_unit-->
                            <div class="col-12 col-md-9"><input type="text" id="amount" name="amount" placeholder="" class="form-control"><small class="form-text text-muted">Please enter Amount.</small></div>
                          </div>
                            

                      
    <!--
                         <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Type of item</label></div>
                            <div class="col-12 col-md-9">
                              <select name="type" id="type" class="form-control">
                                <option value="0">Please choose a category</option>
                                <option value="1">Kitchen</option>
                                <option value="2">Bar</option>
                                <option value="3">House Keeping</option>
                              </select>
                            </div>
                          </div>
 -->                           
                           

                            
                            
                       
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
    
</body>
</html>