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
    'fullName' => array(
      'required' => true,
      'min' => 1,
      'max' => 11
    ),
    'dateOfBirth' => array(
    'required' => true
    ),
    'NIC' => array(
      'required' => true,
      'min' => 2,
      'max' => 10
    )
    /*'contactNumber' => array(
      'required' => true
	  
    )
     */
  ));

  if($validation->passed()){
      $membership = new Membergym();
      try{

         $membership->create('membership',array(
            'fullName' => Input::get('fullName'),
            'gender' => Input::get('gender'),
            'dateOfBirth' => Input::get('dateOfBirth'),
            'NIC' => Input::get('NIC'),
            'contactNumber' => Input::get('telephone'),
            
            
        ));
            echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                            <span class="badge badge-pill badge-primary">Success</span>
                                                details has been added Successfully!
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
     <?php
                echo "Date : ".date("Y/m/d")."<br>";
            ?>
<div class="card">
    <div class="card-header">
        <strong>Create New Member</strong>
    </div>
     
    <div class="card-body card-block">
        <!--<form action="rcView.php?tab=MPayment" method="post" class="form-horizontal">-->
          
                <form action="" method="post" class="form-horizontal">
              
    
            <!--<div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Member ID</label></div>
                <div class="col-12 col-md-9"><input type="text" id="hf-email" name="hf-email" placeholder="Enter Member ID..." class="form-control"></div>
            </div>-->
           <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Full Name</label></div>
                <div class="col-12 col-md-9"><input type="text" id="fullName" name="fullName" placeholder="Enter Full Name..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">NIC Number</label></div>
                <div class="col-12 col-md-9"><input type="text" id="NIC" name="NIC" placeholder="Enter NIC Number..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Date of Birth</label></div>
                <div class="col-12 col-md-9"><input type="text" id="dateOfBirth" name="dateOfBirth" placeholder="Enter Date of Birth..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Contact Number</label></div>
                <div class="col-12 col-md-9"><input type="text" id="telephone" name="telephone" placeholder="Enter Mobile Number..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Gender</label></div>
                <div class="col col-md-9">
                    <div class="form-check-inline form-check">
                        <label for="inline-radio1" class="form-check-label ">
                            <input type="radio" id="gender" name="gender" value="Male" class="form-check-input">Male
                        </label>&nbsp;&nbsp;
                        <label for="inline-radio2" class="form-check-label ">
                            <input type="radio" id="gender" name="gender" value="Female" class="form-check-input">Female
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="card-footer">
                <button type="submit" align="left" class="btn btn-secondary">&nbsp; Submit</button>
            </div>
    
            
        </form>
    </div>
    </div>
     
  <?php/*
               // $tb = isset($_GET['tab']) ? $_GET['tab'] : '';
                //switch($tb) {
                  //      case 'MPayment': // page2, if changePage has the value of page2
                    //include('MPayment.php'); //include page2.html
                    //break;
                    
   
                //} //end the switch
            */?> 
    <div class="card-body card-block">
                <form action="rcView.php?tab=MPayment" method="post" class="form-horizontal">
                <button type="submit"  align="left" class="btn btn-secondary">&nbsp; payment</button>
                    
            
                </form>
    </div>
    
    
    
 
</body>
</html>