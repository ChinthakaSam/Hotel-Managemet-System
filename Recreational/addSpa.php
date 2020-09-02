<!DOCTYPE html>
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
    'CustomerName' => array(
    'required' => true,
    'min' => 10,
    'max' => 75
    ),
    'telephone' => array(
    'required' => true, 
    'max' => 12
    )
  ));

  if($validation->passed()){
      $spa = new Spa();
      try{

        $spa->create('spa',array(
            'CustomerName' => Input::get('CustomerName'),
            'serviceType' => Input::get('serviceType'),
            'telephone' => Input::get('telephone'),
            'dateTime' => date('Y-m-d H:i:s'),
            'gender' => Input::get('gender')
            
            
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
<head>
    <title>HTML5/JavaScript Event Calendar</title>
	<!-- demo stylesheet -->
    	<link type="text/css" rel="stylesheet" href="media/layout.css" />

        <link type="text/css" rel="stylesheet" href="themes/calendar_g.css" />
        <link type="text/css" rel="stylesheet" href="themes/calendar_green.css" />
        <link type="text/css" rel="stylesheet" href="themes/calendar_traditional.css" />
        <link type="text/css" rel="stylesheet" href="themes/calendar_transparent.css" />
        <link type="text/css" rel="stylesheet" href="themes/calendar_white.css" />

	<!-- helper libraries -->
	<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>

	<!-- daypilot libraries -->
        <script src="js/daypilot/daypilot-all.min.js" type="text/javascript"></script>

</head>
<body>
    
    
             <?php
                echo "Date : ".date("Y/m/d")."<br>";
            ?>
            
        <div class="card">
            <div class="card-header">
                <strong><h4>Spa Appointment</h4></strong>
            </div>
            
            <div class="card-body card-block">
                
                <form action="" method="post" class="form-horizontal">
              
                    
            <!--<div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Reservation ID</label></div>
                <div class="col-12 col-md-9">
                <input type="text"  id="reservationID"  placeholder="Enter Reservation..." class="form-control" ></div>
            </div>
            
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Customer ID</label></div>
                <div class="col-12 col-md-9">
                <input type="text" name="customer_id"  id="Customer_ID" name="hf-password"  placeholder="Enter the Customer ID ..." class="form-control" ></div>
                
            </div>-->
            
            
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Customer Name</label></div>
                <div class="col-12 col-md-9">
                <input type="text" id="CustomerName" name="CustomerName" placeholder="Customer Name..." class="form-control"></div>
                 
            </div>
            
           <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Telephone Number</label></div>
                <div class="col-12 col-md-9">
                <input type="text" id="telephone" name="telephone" placeholder="Telephone Number..." class="form-control"></div>
            </div>
            
                <div class="row form-group">
                <div class="col col-md-3"><label for="date" class=" form-control-label">Date</label></div>
                <div class="col-12 col-md-9"><input type="date" id="date" name="date" class="form-control"></div>
            </div>
                    
                    <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Service Type</label></div>
                            <div class="col-12 col-md-9">
                              <select name="serviceType" id="serviceType" class="form-control">
                                <option value="1">Massage Therapies</option>
                                <option value="2">Body Treatments</option>
                                <option value="3">Makeup</option>
                                <option value="4">Waxing</option>
                                <option value="5">Facials</option>
                                <option value="6">Nail Treatment</option>
                                <option value="7">Kohler Water Spa Service</option>
                              </select>
                            </div>
                          </div>
                    
                    
                    
             <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Gender</label></div>
                <div class="col col-md-9">
                    <div class="form-check-inline form-check">
                        <label for="inline-radio1" class="form-check-label ">
                            <input type="radio" id="gender" name="gender" value="Male" class="form-check-input" checked>Male
                        </label>&nbsp;&nbsp;
                        <label for="inline-radio2" class="form-check-label ">
                            <input type="radio" id="gender" name="gender" value="Female" class="form-check-input">Female
                        </label>
                    </div>
                </div>
            </div>
            
                    
            <div class="card-footer">
                <button type="submit"  align="left" class="btn btn-secondary">&nbsp; Submit</button>
                    </div>
            
            
                </form> </div>
    </div>
    
                 
            <div class="card-body card-block">
                <form action="rcView.php?tab=inpayment" method="post" class="form-horizontal">
                <button type="submit"  align="left" class="btn btn-secondary">&nbsp; payment</button>
                    
            
                </form>
    </div>
    
    
</body>
</html>

