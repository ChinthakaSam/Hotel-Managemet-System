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
    'reservationType' => array(
      'required' => true,
      'min' => 10,
      'max' => 35
    ),
    'amount' => array(
      'required' => true
    )
    
  ));

  if($validation->passed()){
      $payment = new Memberpayment();
      try{

        $payment->create('payment',array(
            'serviceType' => Input::get('serviceType'),
            'amount' => Input::get('amount'),
           
            
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
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: darkcyan;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
}

input[type=submit]:hover {
    background-color: darkblue;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}
</style>
</head>
<body>
     <?php
                echo "Date : ".date("Y/m/d")."<br>";
            ?>

    <center><h2><b>Member Payments</b></h2></center>
    
    

<div class="container">
  
      <form action="" method="post" class="form-horizontal">
   
      
        <!--<div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Reservation ID</label></div>
                <div class="col-12 col-md-9"><input type="text" id="reservationType" name="reservationType" placeholder="Enter Reservation ID..." class="form-control"></div>
            </div>-->
          
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Reservtion Type</label></div>
                <div class="col-12 col-md-9"><input type="text" id="serviceType" name="serviceType" placeholder="Enter Reservation Type..." class="form-control"></div>
        </div>
  
          
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Amount</label></div>
                <div class="col-12 col-md-9"><input type="text" id="amount" name="amount" placeholder="Enter customer Amount..." class="form-control"></div>
        </div>
  
     
    <div class="card-footer">
                <button type="submit" align="left" class="btn btn-secondary">&nbsp; Submit</button>
            </div>
  </form>
    
</div>

</body>
</html>
