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
    'designation_name' => array(
      'required' => true,
      'min' => 2,
      'max' => 30
    ),
    'basic_salary' => array(
      'required' => true
    ),
    'salary_increment' => array(
      'required' => true
    ),
    'bonus_percentage' => array(
      'required' => true
    ),
    'medical_and_insuarance' => array(
      'required' => true
    ),
    'service_charge_percentage' => array(
      'required' => true
    ),
  ));

  if($validation->passed()){
      $designation = new Designation();
      try{

        $designation->create('designation',array(
            'desName' => Input::get('designation_name'),
            'basicSalary' => Input::get('basic_salary'),
            'salaryIncrement' => Input::get('salary_increment'),
            'bonusAmount' => Input::get('bonus_percentage'),
            'medAndInsAmount' => Input::get('medical_and_insuarance'),
            'serviceChargePercentage' => Input::get('service_charge_percentage')

        ));
            echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                            <span class="badge badge-pill badge-primary">Success</span>
                                                Designation has been created Successfully!
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
<div class="card">
    <div class="card-header">
        <strong>Create New Designation</strong>
    </div>
    
    <div class="card-body card-block">
        <form action="" method="post" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Designation Name</label></div>
                <div class="col-12 col-md-9"><input type="text" id="designation_name" name="designation_name" placeholder="Enter Designation Name..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Basic Salary</label></div>
                <div class="col-12 col-md-9"><input type="text" id="basic_salary" name="basic_salary" placeholder="Enter Basic Salary..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Salary Increment</label></div>
                <div class="col-12 col-md-9"><input type="text" id="salary_increment" name="salary_increment" placeholder="Enter Salary Increment..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Bonus Percentage</label></div>
                <div class="col-12 col-md-9"><input type="text" id="bonus_percentage" name="bonus_percentage" placeholder="Enter bonus Percentage..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Medical and Insuarance Amount</label></div>
                <div class="col-12 col-md-9"><input type="text" id="medical_and_insuarance" name="medical_and_insuarance" placeholder="Enter Medical and Insuarance Amount..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Service Charge Percentage</label></div>
                <div class="col-12 col-md-9"><input type="text" id="service_charge_percentage" name="service_charge_percentage" placeholder="Enter Service Charge Percentage..." class="form-control"></div>
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Add Designation
        </button>
    </div>
        </form>
    </div>
    
</div>
</body>
</html>