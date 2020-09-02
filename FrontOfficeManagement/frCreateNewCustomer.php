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
    'customerName' => array(
      'required' => true,
      'min' => 2,
      'max' => 75
    ),
    'passportNo' => array(
      'required' => true,
      'min' => 2,
      'max' => 8
    ),
    'city' => array(
      'required' => true,
      'min' => 2,
      'max' => 30
    ),
    'address' => array(
      'required' => true,
      'min' => 2,
      'max' => 300
    ),
    'email' => array(
      'required' => true,
      'max' => 50
    ),
    'telephone' => array(
      'required' => true,
      'max' => 12
    ),
    'occupation' => array(
      'min' => 2,
      'max' => 30
    ),
  ));

  if($validation->passed()){
      $residentialCustomer = new ResidentialCustomer();
      try{

        $residentialCustomer->create('residentialcustomer',array(
            'customerName' => Input::get('customerName'),
            'passportNo' => Input::get('passportNo'),
            'country' => Input::get('country'),
            'city' => Input::get('city'),
            'address' => Input::get('address'),
            'email' => Input::get('email'),
            'telephone' => Input::get('telephone'),
            'occupation' => Input::get('occupation')
        ));
            echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                            <span class="badge badge-pill badge-primary">Success</span>
                                                Customer details has been added Successfully!
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
        <strong>Create New Customer</strong>
    </div>
    
    <div class="card-body card-block">
          <form action="" method="post" class="form-horizontal">
            
                    
                                      <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Customer Name</label>
                                            <input id="customerName" name="customerName" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                      </div>
                                      
                                      <div class="form-group">
                                          <label for="cc-payment" class="control-label mb-1">Passport No.</label>
                                          <input id="passportNo" name="passportNo" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                      </div>
                                      
                                      <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="selectSm" class=" form-control-label">Country</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="country" id="country" class="form-control-sm form-control">
                                                        <option value="0">Please select</option>
                                                        <option value="Afganistan">Afganistan</option>
                                                        <option value="Argentina">Argentina</option>
                                                        <option value="Austria">Austria</option>
                                                        <option value="Australia">Australia</option>
                                                        <option value="Bangladesh">Bangladesh</option>
                                                        <option value="Belgium">Belgium</option>
                                                        <option value="Brazil">Brazil</option>
                                                        <option value="Brunei">Brunei</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="China">China</option>
                                                        <option value="Colombia">Colombia</option>
                                                        <option value="Cyprus">Cyprus</option>
                                                        <option value="Denmark">Denmark</option>
                                                        <option value="Egypt">Egypt</option>
                                                        <option value="France">France</option>
                                                        <option value="Finland">Finland</option>
                                                        <option value="Germany">Germany</option>
                                                        <option value="Greece">Greece</option>
                                                        <option value="India">India</option>
                                                        <option value="Italy">Italy</option>
                                                        <option value="Indonesia">Indonesia</option>
                                                        <option value="Japan">Japan</option>
                                                        <option value="Korea - North">Korea - North</option>
                                                        <option value="Korea - South">Korea - South</option>
                                                        <option value="Kuwait">Kuwait</option>
                                                        <option value="Lebenan">Lebenan</option>
                                                        <option value="Libya">Libya</option>
                                                        <option value="Malaysia">Malaysia</option>
                                                        <option value="Maldives">Maldives</option>
                                                        <option value="Mexico">Mexico</option>
                                                        <option value="Netherland">Netherland</option>
                                                        <option value="Newzealand">Newzealand</option>
                                                        <option value="Oman">Oman</option>
                                                        <option value="Pakistan">Pakistan</option>
                                                        <option value="Philipines">Philipines</option>
                                                        <option value="Poland">Poland</option>
                                                        <option value="Qatar">Qatar</option>
                                                        <option value="Russia">Russia</option>
                                                        <option value="SaudiArabia">SaudiArabia</option>
                                                        <option value="Singapore">Singapore</option>
                                                        <option value="South Africa">South Africa</option>
                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                        <option value="Switzerland">Switzerland</option>
                                                        <option value="Thailand">Thailand</option>
                                                        <option value="Ukrain">Ukrain</option>
                                                        <option value="United Kingdom">United Kingdom</option>
                                                        <option value="United States">United States</option>
                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                    </select>
                                                </div>
                                            </div>
                                      
                                      <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">City</label>
                                                <input id="city" name="city" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                      </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Address</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="address" id="address" rows="9" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            
                                            
                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="email" id="email" name="email" placeholder="Enter Email..." class="form-control">
                                                    <span class="help-block">Please enter your email</span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Telephone</label>
                                                <input id="telephone" name="telephone" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Occupation</label>
                                                <input id="occupation" name="occupation" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-secondary">&nbsp; Submit</button>
                
            </div>
              
        </form>
        <form action="frontofficeview.php?tab=availability" method="post" class="form-horizontal">
            
            <div class="card-footer">
                <button type="submit" class="btn btn-secondary">&nbsp; Add Reservation</button>
                
            </div>
            
        </form>
     
        
    </div>
    
</div>
    
    <?php
               $tb = isset($_GET['tab']) ? $_GET['tab'] : '';
                switch($tb) { //switch is just like a bunch of if()s
                    case 'availability': // page2, if changePage has the value of page2
                    include('frroomavailability.php'); //include page2.html
                    break;  //break, witch means stop
                } //end the switch
            ?>
   
</body>
</html>