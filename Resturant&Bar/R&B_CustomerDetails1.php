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
    'Cusname' => array(
      'required' => true,
      'min' => 2,
      'max' => 75
    ),
    'pnumber' => array(
      'required' => true,
      'min' => 2,
      'max' => 12
    ),
    'Time' => array(
      'required' => true,
      'min' => 2,
      'max' => 15
   
     ),
    'roomNumber' => array(
      'required' => true,
      'min' => 2,
      'max' => 11
    ),
    'customerType' => array(
      'required' => true,
      'min' => 2,
      'max' => 30
    ),
   
  ));

  if($validation->passed()){
      $restaurantreservation = new AddCustomer();
      try{

        $restaurantreservation->create('restaurantreservation',array(
           'customerName' => Input::get('Cusname'),
            'telephone' => Input::get('pnumber'),
            'date' => date('Y-m-d H:i:s'),
            'mealTime' => Input::get('Time'),
            'roomNumber' => Input::get('roomNumber'),
            'customerType' => Input::get('customerType'),
            'location' => Input::get('location'),
            'tableNumber' => Input::get('tableNumber')
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
                echo "Date :".date("y/m/d")."<br>";
            
            ?>
            
<tr>
    <td><h4 align="center"><u>Restaturant Customer Details</u></h4></td>
    
        
	</tr>


 <div class="card-body card-block">
        <form action="" method="post" class="form-horizontal">
            
            
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">CUSTOMER NAME</label></div>
                <div class="col-12 col-md-9"><input type="text" id="Cusname" name="Cusname" class="form-control"></div>
            </div>
            
            
            
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">PHONE NUMBER</label></div>
                <div class="col-12 col-md-9"><input type="text" id="pnumber" name="pnumber" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label"> MEAL TIME</label></div>
                <div class="col-12 col-md-9"><input type="text" id="Time" name="Time" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label"> ROOM NO</label></div>
                <div class="col-12 col-md-9"><input type="text" id="roomNumber" name="roomNumber" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label"> CUSTOMER TYPE</label></div>
                <div class="col-12 col-md-9"><input type="text" id="customerType" name="customerType" class="form-control"></div>
            </div>
    
                        
                         <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">LOCATION</label></div>
                            <div class="col-12 col-md-9">
                              <select name="location" id="location" class="form-control">
                                <option value="0">Please select</option>
                                <option value="River Side">River Side</option>
                                <option value="InSide">InSide</option>
                                <option value="OutSide">OutSide</option>
                              </select>
                            </div>
                          </div>
                        
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="selectLg" class=" form-control-label">TABLE NUMBER</label></div>
                            <div class="col-12 col-md-9">
                              <select name="tableNumber" id="tableNumber" class="form-control-lg form-control">
                                <option value="0">Please select</option>
                                <option value="1">NO 1</option>
                                <option value="2">NO 2</option>
                                <option value="3">NO 3</option>
                                <option value="4">NO 4</option>
                                <option value="5">NO 5</option>
                                <option value="6">NO 6</option>
                                <option value="7">NO 7</option>
                              </select>
                            </div>
                          </div>
                        
                        
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-ban"></i> Submit
                        </button>
                      
                    
     </form>
    </div>
    </body>
</html>




