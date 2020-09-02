
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
      'roomNo' => array(
      'required' => true
    ),
    'nicNumber' => array(
      'required' => true,
      'min' => 2,
      'max' => 11
    )
    
  ));

  if($validation->passed()){
      $gym = new Residentialgym();
      try{

        $gym->create('gym',array(
            'roomNo' => Input::get('roomNo'),
            'nicNumber	' => Input::get('nicNumber'),
            'gender' => Input::get('gender'),
            
            
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
        <strong>Residential Customer</strong>
    </div>
    
        <div class="card-body card-block">
         <!--<form action="rcView.php?tab=inpayment" method="post" class="form-horizontal">-->
            <form action="" method="post" class="form-horizontal">
             
            <!-- <div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Reservation ID</label></div>
                <div class="col-12 col-md-9"><input type="text" id="hf-email" name="hf-email" placeholder="Enter Reservation ID..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Customer ID</label></div>
                <div class="col-12 col-md-9"><input type="text" id="hf-email" name="hf-email" placeholder="Enter customer ID..." class="form-control"></div>
            </div>-->
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Room No</label></div>
                <div class="col-12 col-md-9"><input type="text" id="roomNo" name="roomNo" placeholder="Enter Room Number..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">NIC Number</label></div>
                <div class="col-12 col-md-9"><input type="text" id="nicNumber" name="nicNumber" placeholder="Enter NIC Number..." class="form-control"></div>
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

    
 
     //<?php
                //$tb = isset($_GET['tab']) ? $_GET['tab'] : '';
                //switch($tb) {
                    //case 'inpayment': // page2, if changePage has the //value of page2
                    //include('IPayment.php'); //include page2.html
                    //break;
                //}
    //?>
    <div class="card-body card-block">
                <form action="rcView.php?tab=inpayment" method="post" class="form-horizontal">
                <button type="submit"  align="left" class="btn btn-secondary">&nbsp; payment</button>
                    
            
                </form>
    </div>
    
   
</body>
</html>