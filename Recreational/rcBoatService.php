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
    'noOfPassengers' => array(
      'required' => true,
      'min' => 1,
      'max' => 11
    ),
    'boatNumber' => array(
    'required' => true,
    'min' => 1,
    'max' => 11
    ),
   
  ));

  if($validation->passed()){
      $boatservice = new Boat();
      try{

        $boatservice->create('boatservice',array(
            'noOfPassengers' => Input::get('noOfPassengers'),
            'boatNumber' => Input::get('boatNumber'),
            'date' => date('Y-m-d H:i:s')
            
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
        <strong><h4>Boat Service Appointment</h4></strong>
    </div>
            
            <div class="card-body card-block">
        <form action="" method="post" class="form-horizontal">
            
            <!--<div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Reservation ID</label></div>
                <div class="col-12 col-md-9"><input type="text" id="hf-email" name="hf-email" placeholder="Enter Reservation ID..." class="form-control"></div>
            </div>-->
    
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Number Of Passengers</label></div>
                <div class="col-12 col-md-9"><input type="text" id="noOfPassengers" name="noOfPassengers" placeholder="Enter the Number of passengers..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Boat Number</label></div>
                <div class="col-12 col-md-9"><input type="text" id="boatNumber" name="boatNumber" placeholder="Enter the Boat Number..." class="form-control"></div>
            </div>
              <div class="row form-group">
                <div class="col col-md-3"><label for="date" class=" form-control-label">Date</label></div>
                <div class="col-12 col-md-9"><input type="date" id="date" name="date" class="form-control"></div>
            </div>
                  

              <div class="card-footer">
                <button type="submit" align="left" class="btn btn-secondary">&nbsp; Submit</button>
            </div>
    
        
                </form>
                
                
            </div>
    </div>
    
    <?php
                $tb = isset($_GET['tab']) ? $_GET['tab'] : '';
                switch($tb) {
                    case 'inpayment': // page2, if changePage has the value of page2
                    include('IPayment.php'); //include page2.html
                    break;
                }
    ?>  
    <div class="card-body card-block">
                <form action="rcView.php?tab=inpayment" method="post" class="form-horizontal">
                <button type="submit"  align="left" class="btn btn-secondary">&nbsp; payment</button>
                    
            
                </form>
    </div>
    
    
</body>
</html>

