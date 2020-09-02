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
    'date' => array(
      'required' => true
    ),
    'roomNo' => array(
      'required' => true,
      'max' => 11
    ),
    'noOfRooms' => array(
      'required' => true,
      'max' => 11
    ),
    'paxCount' => array(
      'required' => true,
      'max' => 11
    ),
    'adults' => array(
      'required' => true,
        'max' => 11
    ),
    'children' => array(
      'max' => 11
    ),
    'noOfNights' => array(
      'required' => true,
      'max' => 11
    ),
    'roomRate' => array(
      'required' => true
    ),
    'additional' => array(
      'max' => 150
    ),
    'checkIn' => array(
      'required' => true
    ),
    'checkOut' => array(
      'required' => true
    ),
    'totalAmount' => array(
      'required' => true
    ),
  ));

  if($validation->passed()){
      $roomreservation = new RoomReservation();
      try{

        $roomreservation->create('roomreservation',array(
            'date' => Input::get('date'),
            'roomNo' => Input::get('roomNo'),
            'roomType' => Input::get('roomType'),
            'noOfRooms' => Input::get('noOfRooms'),
            'paxCount' => Input::get('paxCount'),
            'adults' => Input::get('adults'),
            'children' => Input::get('children'),
            'noOfNights' => Input::get('noOfNights'),
            'boardType' => Input::get('boardType'),
            'roomRate' => Input::get('roomRate'),
            'additional' => Input::get('additional'),
            'checkIn' => Input::get('checkIn'),
            'checkOut' => Input::get('checkOut'),
            'totalAmount' => Input::get('totalAmount'),
            'status' => Input::get('status'),
          //  'customerId' => Input::get('customerId'),
            'availability' => Input::get('availability')
        ));
            echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                            <span class="badge badge-pill badge-primary">Success</span>
                                                Room details has been added Successfully!
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
    
    <div class="card-body card-block">
        <form action="" method="post" class="form-horizontal">
      <div class="card-header">
                                        <strong>Room Details</strong>
                                       
                                    </div>
                                    
                                        
                                        <div class="form-group">
                                            <label for="street" class=" form-control-label">Date</label>
                                            <input type="date" id="date" name="date" class="form-control">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="roomNo" class=" form-control-label">Room number</label>
                                            <input type="text" id="roomNo" name="roomNo" class="form-control">
                                        </div>
                                        
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="selectRm" class=" form-control-label">Room Type</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="roomType" id="roomType" class="form-control-sm form-control">
                                                        <option value="0">Please select</option>
                                                        <option value="Deluxe">Deluxe</option>
                                                        <option value="Executive Suite">Executive Suite</option>
                                                        <option value="Presidential Suite">Presidential Suite</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        
                                        <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="norooms" class=" form-control-label">Number of rooms</label>
                                                    <input type="text" id="noOfRooms" name="noOfRooms" class="form-control" >
                                                </div>
                                    
                                        </div>
                                        
                                        <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="paxcount" class=" form-control-label">Pax count</label>
                                                    <input type="text" id="paxCount" name="paxCount" class="form-control">
                                                </div>
                                    
                                        </div>
                                        
                                        <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="adults" class=" form-control-label">Adults</label>
                                                    <input type="text" id="adults" name="adults" class="form-control">
                                                </div>
                                                <div class="col col-md-4">
                                                    <label for="children" class=" form-control-label">Children</label>
                                                    <input type="text" id="children" name="children" class="form-control">
                                                </div>
                                        </div>
                                        
                                        <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="nonights" class=" form-control-label">Number of nights</label>
                                                    <input type="text" id="noOfNights" name="noOfNights" class="form-control">
                                                </div>
                                    
                                        </div>
                                        
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="selectMP" class=" form-control-label">Meal Plan</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="boardType" id="boardType" class="form-control-sm form-control">
                                                        <option value="0">Please select</option>
                                                        <option value="fullBoard">Full Board</option>
                                                        <option value="halfBoard">Half Board</option>
                                                        <option value="BnB">Bed and Breakfast</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        
                                        <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="rmrate" class=" form-control-label">Room rate</label>
                                                    <input type="text" id="roomRate" name="roomRate" class="form-control">
                                                </div>
                                    
                                        </div>
                                        
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Additional Needs</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="additional" id="additional" rows="9" class="form-control"></textarea>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="street" class=" form-control-label">Check-In</label>
                                            <input type="date" name="checkIn" id="checkIn" class="form-control">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="street" class=" form-control-label">Check-Out</label>
                                            <input type="date" id="checkOut" name="checkOut" class="form-control">
                                        </div>
                                        
                                        <div class="row form-group">
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Total Amount</label>
                                                    <input type="text" id="totalAmount" name="totalAmount" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="selectSm" class=" form-control-label">Status</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="status" id="status" class="form-control-sm form-control">
                                                        <option value="0">Please select</option>
                                                        <option value="pending">Pending</option>
                                                        <option value="Paid">Paid</option>
                                                       
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                      <!--  <div class="row form-group">
                                                <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Customer ID</label></div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="customerId" name="customerId" class="form-control">
                                                    
                                                   
                                                </div>
                                        </div>-->
            
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="selectRm" class=" form-control-label">Availability</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="availability" id="availability" class="form-control-sm form-control">
                                                        <option value="0">Please select</option>
                                                        <option value="Reserved">Reserved</option>
                                                        <option value="Not Reserved">Not Reserved</option>
                                                        <option value="Occupied">Occupied</option>
                                                        <option value="Pending">Pending</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-secondary">&nbsp; Submit</button>
            </div>
           
        </form>
        
        <form action="frontofficeview.php?tab=roomPayment" method="post" class="form-horizontal">
            <div class="card-footer">
                <button type="submit" class="btn btn-secondary">&nbsp; Go</button>
            </div>
        </form>
          
    </div>
    
</div>
    
    <?php
                $tb = isset($_GET['tab']) ? $_GET['tab'] : '';
                switch($tb) { //switch is just like a bunch of if()s
                    case 'roomPayment': // page2, if changePage has the value of page2
                    include('frpayment.php'); //include page2.html
                    break;  //break, witch means stop
                } //end the switch
            ?>
</body>
</html>