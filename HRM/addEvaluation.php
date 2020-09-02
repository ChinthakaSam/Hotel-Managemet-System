<?php
require_once 'core/init.php';

$user = new User();

// var_dump(Token::check(Input::get('token')));
if(!$user->isLoggedIn()){
    Redirect::to('../SystemAdministration/login.php');
}
$username = escape($user->data()->username);
if(Input::exists()){
  $validate = new validate();
  $validation = $validate->check($_POST, array(
    'review' => array(
      'required' => true,
      'min' => 2,
      'max' => 200
    )
    
  ));

  if($validation->passed()){
      $evaluation = new Evaluation();
      try{

         $e = Input::get('employee_name');
         $rt = Input::get('review_type');
         if($rt == 'Monthly Review')
         {
                 $rev = DB::getInstance()->query("SELECT * FROM empevaluation 
                    WHERE 
                    reviewType = 'Monthly Review' 
                    AND MONTH(date)=MONTH(CURDATE()) 
                    AND empId=$e ");
                            if(!$rev->count()) {
                                 $evaluation->create('empevaluation',array(
                            'empId' => Input::get('employee_name'),
                            'department' => Input::get('department'),
                            'supervisor' => Input::get('supervisor_name'),
                            'reviewType' => Input::get('review_type'),
                            'review' => Input::get('review'),
                            'scale' => Input::get('scale'),
                            'date' => date('Y-m-d H:i:s')
                        ));
                            echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                                            <span class="badge badge-pill badge-primary">Success</span>
                                                                Employee evaluation has been added Successfully!
                                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>';
                            } else {
                                foreach ($rev->results() as $rev) {
                                   $et = $rev->reviewType;
                                   if ($rt==$et) {
                                         echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                                        <span class="badge badge-pill badge-danger">Fail</span>&nbsp;&nbsp;'.
                                                            $et.' is already existed for this employee!
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>';  
                                        
                                    }
                            
                                }
                            }
            }
            else{
                 $rev = DB::getInstance()->query("SELECT * FROM empevaluation 
                    WHERE 
                    reviewType = 'Annual Review' 
                    AND YEAR(date)=YEAR(CURDATE()) 
                    AND empId=$e ");
                            if(!$rev->count()) {
                                $evaluation->create('empevaluation',array(
                            'empId' => Input::get('employee_name'),
                            'department' => Input::get('department'),
                            'supervisor' => Input::get('supervisor_name'),
                            'reviewType' => Input::get('review_type'),
                            'review' => Input::get('review'),
                            'scale' => Input::get('scale'),
                            'date' => date('Y-m-d H:i:s')
                        ));
                            echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                                            <span class="badge badge-pill badge-primary">Success</span>
                                                                Employee evaluation has been added Successfully!
                                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>';
                            } else {
                                foreach ($rev->results() as $rev) {
                                   $et = $rev->reviewType;
                                   if ($rt==$et) {
                                         echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                                        <span class="badge badge-pill badge-danger">Fail</span>&nbsp;&nbsp;'.
                                                            $et.' is already existed for this employee!
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>';  
                                        
                                    }
                            
                                }
                            }
            }

         
             
        
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
    
        <?php
            $employee = DB::getInstance()->query("SELECT * FROM employee WHERE email = '$username'");
                        if(!$employee->count()) {
                            echo 'No user';
                        } else {
                            foreach ($employee->results() as $employee) {
                                $did = $employee->DepId;
                            }
                        }
        ?>
 
<div class="card">
    <div class="card-header">
        <strong>Employee Performance Review</strong>
    </div>
    
    <div class="card-body card-block">
        <form action="" method="post" class="form-horizontal">
            <p>Please take a minute to give feedback on your employee's performance</p>
            <div class="row form-group">
                <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Employee Name</label></div>
                <div class="col-12 col-md-9">
                    <select name="employee_name" id="employee_name" class="form-control-sm form-control">
                    
                    
                    <?php
                    $employee = DB::getInstance()->query("SELECT * FROM employee WHERE DepId=$did");
                    if(!$employee->count()) {
                        echo 'No user';
                    } else {
                        foreach ($employee->results() as $employee) {
                            echo "<option value='$employee->empId;'>";
                                echo $employee->fullName;
                                echo " - ";
                                $d = $employee->designation;
                                 $de = $employee->DepId;
                                $employee1 = DB::getInstance()->query("SELECT * FROM designation WHERE desId = $d");
                                if(!$employee1->count()) {
                                    echo 'No user';
                                } else {
                                    foreach ($employee1->results() as $employee1) {
                                            echo $employee1->desName;
                                            $desi = $employee1->desId;
                                            
                                    }
                                }
                                
                                $employee2 = DB::getInstance()->query("SELECT * FROM department WHERE depId = $de");
                                if(!$employee2->count()) {
                                    echo 'No user';
                                } else {
                                    foreach ($employee2->results() as $employee2) {
                                         
                                           $depi = $employee2->depId;
                                    }
                                }
                                 
                          
                            echo "</option>";
                          
                        }
                    }
                    ?>
                    </select>
                    <?php
                            echo "<input type='hidden' name='department' id='department' value='$depi'>";
                    ?>
                </div>
            </div>
               
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Supervisor Name</label></div>
                <div class="col-12 col-md-9"><input type="text" id="supervisor_name" name="supervisor_name" value="<?php echo escape($user->data()->name); ?>" class="form-control" readonly></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Performance evaluation in the scale of 1-10</label></div>
                <div class="col-12 col-md-9">
                    <select name='scale' id='scale' class="form-control-sm form-control">
                        <option value=1>1</option>
                        <option value=2>2</option>
                        <option value=3>3</option>
                        <option value=4>4</option>
                        <option value=5>5</option>
                        <option value=6>6</option>
                        <option value=7>7</option>
                        <option value=8>8</option>
                        <option value=9>9</option>
                        <option value=10>10</option>
                        
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Please specify the type of review</label></div><br>
                <div class="col col-md-9">
                    <div class="form-check-inline form-check">
                        <label for="inline-radio1" class="form-check-label ">
                            <input type="radio" id="review_type" name="review_type" value="Annual Review" class="form-check-input" checked>Annual Review
                        </label>&nbsp;&nbsp;
                        <label for="inline-radio2" class="form-check-label ">
                            <input type="radio" id="review_type" name="review_type" value="Monthly Review" class="form-check-input">Monthly Review
                        </label>
                    </div>
                </div>
            </div>
             <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Review</label></div>
                 <div class="col-12 col-md-9"><textarea id="review" name="review" class="form-control"></textarea></div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit Evaluation
                </button>
            </div>
    </form>
    </div>
    
</div>
</body>
</html>