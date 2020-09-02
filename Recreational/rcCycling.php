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
    'dutation' => array(
    'max' => 12
    ),
    'telephone' => array(
    'required' => true
   
    ),
    
    'bicycleNumber' => array(
      'required' => true,
      'min' => 1,
      'max' => 11
    )
   
     
     
  ));
 if($validation->passed()){
      $cycling = new Cycling();
      try{

        $cycling->create('cycling',array(
            'dutation' => Input::get('dutation'),
            'telephone' => Input::get('telephone'),
            'bicycleNumber' => Input::get('bicycleNumber'),
            
            
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
        <strong>Cycling Appointment</strong>
    </div>
     
    <div class="card-body card-block">
        <!--<form action="rcView.php?tab=inpayment" method="post" class="form-horizontal">-->
         <form action="" method="post" class="form-horizontal">
            
            <!--<div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Reservation ID</label></div>
                <div class="col-12 col-md-9"><input type="text" id="hf-email" name="hf-email" placeholder="Enter Customer ID..." class="form-control"></div>
            </div>
    
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Customer ID</label></div>
                <div class="col-12 col-md-9"><input type="text" id="hf-email" name="hf-email" placeholder="Enter Customer ID..." class="form-control"></div>
            </div>-->
            
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Duration</label></div>
                <div class="col-12 col-md-9"><input type="text" id="dutation" name="dutation" placeholder="Enter duration..." class="form-control"></div>
            </div>
           <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Telephone Number</label></div>
                <div class="col-12 col-md-9"><input type="text" id="telephone" name="telephone" placeholder="Enter Telephone number..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Number of bicycle</label></div>
                <div class="col-12 col-md-9"><input type="text" id="bicycleNumber" name="bicycleNumber" placeholder="Number of bicycle..." class="form-control"></div>
            </div>
           
             
            
            <div class="card-footer">
                <button type="submit" align="left" class="btn btn-secondary">&nbsp; Submit</button>
            </div>
            
            </form>
    </div>
    </div>
       <div class="card-body card-block">
                <form action="rcView.php?tab=inpayment" method="post" class="form-horizontal">
                <button type="submit"  align="left" class="btn btn-secondary">&nbsp; payment</button>
                    
            
                </form>
    </div>
    
      </body>
</html>