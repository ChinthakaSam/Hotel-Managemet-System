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
   'location' => array(
      'required' => true,
      'min' => 2,
      'max' => 50
    ),
    'date' => array(
      'required' => true,
    ),
    'customerName' => array(
      'required' => true,
      'min' => 2,
      'max' => 75
    ),
    'address' => array(
      'required' => true,
      'min' => 2,
      'max' => 300
    ),
    'telephone' => array(
      'required' => true,
      'max' => 12
    ),
    'functionType' => array(
      'required' => true,
      'min' => 2,
      'max' => 30
    ),
    'paxCount' => array(
      'required' => true,
      'max' => 11
    ),
    'startTime' => array(
      'required' => true,
    ),
    'endTime' => array(
      'required' => true,
    ),
    'menuNumber' => array(
      'max' => 11
    ),
      'additional' => array(
      'min' => 2,
      'max' => 150
    ),
  ));

  if($validation->passed()){
      $banquetreservation = new BanquetReservation();
      try{

        $banquetreservation->create('banquetreservation',array(
            'location' => Input::get('location'),
            'date' => Input::get('date'),
            'customerName' => Input::get('customerName'),
            'address' => Input::get('address'),
            'telephone' => Input::get('telephone'),
            'functionType' => Input::get('functionType'),
            'paxCount' => Input::get('paxCount'),
            'startTime' => Input::get('startTime'),
            'endTime' => Input::get('endTime'),
            'menuNumber' => Input::get('menuNumber'),
            'additional' => Input::get('additional'),
            'customerId' => Input::get('customerId'),
            'PackageNo' => Input::get('PackageNo')
        ));
            echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                            <span class="badge badge-pill badge-primary">Success</span>
                                                Reservation details has been added Successfully!
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
                    <strong class="card-title">Banquet Reservation</strong>
            </div>
             <div class="card-body card-block">
                 <form action="" method="post" class="form-horizontal">
                     
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Location</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="location" name="location" class="form-control"></div>
                    </div>
                     
                     
                     <div class="form-group">
                            <label for="street" class=" form-control-label">Date</label>
                            <input type="date" id="date" name="date" class="form-control">
                    </div>
                     
        
        
                    <div class="card">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Customer Name</label>
                                <input id="customerName" name="customerName" type="text" class="form-control" aria-required="true" aria-invalid="false">
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Address</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="address" id="address" rows="9" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Telephone</label>
                                    <input id="telephone" name="telephone" type="text" class="form-control" aria-required="true" aria-invalid="false">
                            </div>

                        </div>
                    </div>
        
        <div class="card">
            <div class="card-body card-block">
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Function Type</label>
                    <input id="functionType" name="functionType" type="text" class="form-control" aria-required="true" aria-invalid="false">
                </div>
                <div class="row form-group">
                    <div class="col col-md-4">
                        <label for="paxcount" class=" form-control-label">Pax count</label>
                        <input type="text" id="paxCount" class="form-control" name="paxCount">
                    </div>              
                </div>
                <div class="form-group">
                    <label for="street" class=" form-control-label">Time</label>
                    <input type="time" id="startTime" name="startTime" class="form-control">
                    <label for="street" class=" form-control-label">to</label>
                    <input type="time" id="endTime" name="endTime" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Menu No</label>
                    <input id="menuNumber" name="menuNumber" type="text" class="form-control" aria-required="true" aria-invalid="false">
                </div>
               <!-- <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Customer ID</label>
                    <input id="customerId" name="customerId" type="text" class="form-control" aria-required="true" aria-invalid="false">
                </div>-->
                <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="selectSm" class=" form-control-label">Package No</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="PackageNo" id="PackageNo" class="form-control-sm form-control">
                                <option value="0">Please select</option>
                                <option value="gold">01</option>
                                <option value="Silver">02</option>
                                <option value="platinum">03</option>
                                                        
                            </select>
                        </div>
                    </div>
                
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                    <strong class="card-title">Additional Services</strong>
            </div>
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-9">
                              <div class="form-check">
                                  <div class="checkbox">
                                  <label for="checkbox1" class="form-check-label ">
                                    <input type="checkbox" id="additional" name="additional" value="bdaycake" class="form-check-input">Birthday Cake
                                  </label>
                                </div><div class="checkbox">
                                  <label for="checkbox2" class="form-check-label ">
                                    <input type="checkbox" id="additional" name="additional" value="cakestructure" class="form-check-input">Cake Structure
                                  </label>
                                </div><div class="checkbox">
                                  <label for="checkbox3" class="form-check-label ">
                                    <input type="checkbox" id="additional" name="additional" value="weddingcakebasket" class="form-check-input">Wedding Cake Baskets
                                  </label>
                                </div><div class="checkbox">
                                  <label for="checkbox4" class="form-check-label ">
                                    <input type="checkbox" id="additional" name="additional" value="poruwa" class="form-check-input">Poruwa
                                  </label>
                                </div><div class="checkbox">
                                  <label for="checkbox5" class="form-check-label ">
                                    <input type="checkbox" id="additional" name="additional" value="setteeback" class="form-check-input">Settee Back
                                  </label>
                                </div>
                                  <div class="checkbox">
                                  <label for="checkbox6" class="form-check-label ">
                                    <input type="checkbox" id="additional" name="additional" value="decos" class="form-check-input">Decorations
                                  </label>
                                </div>
                              </div>
                    </div>
                </div>
            
                
                
            </div>
        </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-secondary">&nbsp; Submit</button>
                </div>
                     
                     </form>
                 
                 <form action="frontofficeview.php?tab=banquetPayment" method="post" class="form-horizontal">
                     <div class="card-footer">
                        <button type="submit" class="btn btn-secondary">&nbsp; Go</button>
                     </div>
                 </form>
                </div>
            
            </div>
        
        <?php
                $tb = isset($_GET['tab']) ? $_GET['tab'] : '';
                switch($tb) { //switch is just like a bunch of if()s
                    case 'banquetPayment': // page2, if changePage has the value of page2
                    include('frbanquetPayment.php'); //include page2.html
                    break; //break, witch means stop
                } //end the switch
            ?>
    </body>
</html>