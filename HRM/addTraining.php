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
    'session_name' => array(
      'required' => true,
      'min' => 2,
      'max' => 100
    ),
     'number_of_trainees' => array(
      'required' => true,
      'min' => 2,
      'max' => 100
    ),
    'description' => array(
      'required' => true,
      'min' => 2,
      'max' => 250
    )
    
  ));

  if($validation->passed()){
      $training = new Training();
      try{

        $training->create('trainingsession',array(
            'tsName' => Input::get('session_name'),
            'created_date' => date('Y-m-d H:i:s'),
            'tsConductedBy' => Input::get('conductedby'),
            'noTrainees' => Input::get('number_of_trainees'),
            'tsDescription' => Input::get('description')
        ));
            echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                            <span class="badge badge-pill badge-primary">Success</span>
                                                Training Session has been added Successfully!
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
        <strong>Create New Training Session</strong>
    </div>
    
    <div class="card-body card-block">
        <form action="" method="post" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Training Session Name</label></div>
                <div class="col-12 col-md-9"><input type="text" id="session_name" name="session_name" value="" placeholder="Enter Training Session Name..." class="form-control"></div>
            </div>
           <div class="row form-group">
                <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Conducted By</label></div>
                <div class="col-12 col-md-9">
                    <select name="conductedby" id="conductedby" class="form-control-sm form-control">
                    <?php
                    $employee = DB::getInstance()->query("SELECT fullname FROM employee");
                    if(!$employee->count()) {
                        echo 'No user';
                    } else {
                        foreach ($employee->results() as $employee) {
                            echo "<option value='$employee->fullname'>";
                                echo $employee->fullname;
                            echo "</option>";
                        }
                    }
                    ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Number of Trainees</label></div>
                <div class="col-12 col-md-9"><input type="text" id="number_of_trainees" name="number_of_trainees" value="" placeholder="Enter Number of Trainees..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Description</label></div>
                 <div class="col-12 col-md-9"><textarea id="description" name="description" class="form-control"></textarea></div>
            </div>
    
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Add Training Session
                </button>
            </div>
    </form>
    </div>
    
</div>
</body>
</html>