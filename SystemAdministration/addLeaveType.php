<?php
require_once 'core/init.php';

$user = new User();

// var_dump(Token::check(Input::get('token')));
if(!$user->isLoggedIn()){
    Redirect::to('login.php');
}

if(Input::exists()){
  $validate = new validate();
  $validation = $validate->check($_POST, array(
    'name' => array(
      'required' => true,
      'min' => 2,
      'max' => 100
    ),
      'number_of_days' => array(
      'required' => true
    )
  ));

  if($validation->passed()){
      $leavetype = new LeaveType();
      try{

        $leavetype->create('leavetype',array(
            'leaveTypeName' => Input::get('name'),
            'maxDays' => Input::get('number_of_days')
        ));
            echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                            <span class="badge badge-pill badge-primary">Success</span>
                                                Leave Type has been created Successfully!
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
        <strong>Create New Leave Type</strong>
    </div>
    
    <div class="card-body card-block">
        <form action="" method="post" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Leave Name</label></div>
                <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Enter Leave type name Name..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Number of Days</label></div>
                <div class="col-12 col-md-9"><input type="text" id="number_of_days" name="number_of_days" placeholder="Enter number of days ..." class="form-control"></div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Submit
        </button>
    </div>
        </form>
    </div>
    
</div>
</body>
</html>