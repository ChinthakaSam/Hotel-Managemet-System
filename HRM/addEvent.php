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
    'title' => array(
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
      $event = new Event();
      try{

        $event->create('event',array(
            'title' => Input::get('title'),
            'created_date' => date('Y-m-d H:i:s'),
            'priority' => Input::get('priority'),
            'description' => Input::get('description')
        ));
            echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                            <span class="badge badge-pill badge-primary">Success</span>
                                                Event has been added Successfully!
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
        <strong>Create New Event</strong>
    </div>
    
    <div class="card-body card-block">
        <form action="" method="post" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Event Name</label></div>
                <div class="col-12 col-md-9"><input type="text" id="title" name="title" placeholder="Enter Event Name..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Event Priority</label></div>
                <div class="col col-md-9">
                    <div class="form-check-inline form-check">
                        <label for="inline-radio1" class="form-check-label ">
                            <input type="radio" id="priority" name="priority" value="High" class="form-check-input">High
                        </label>&nbsp;&nbsp;
                        <label for="inline-radio2" class="form-check-label ">
                            <input type="radio" id="priority" name="priority" value="Medium" class="form-check-input" checked>Medium
                        </label>&nbsp;&nbsp;
                        <label for="inline-radio2" class="form-check-label ">
                            <input type="radio" id="priority" name="priority" value="Low" class="form-check-input">Low
                        </label>&nbsp;&nbsp;
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Description</label></div>
                 <div class="col-12 col-md-9"><textarea id="description" name="description" class="form-control"></textarea></div>
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