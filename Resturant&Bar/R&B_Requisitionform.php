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
   /* 'Requisition No' => array(
      'required' => true,
      'min' => 2,
      'max' => 100
    ),
    'Department ID' => array(
      'required' => true,
      'min' => 2,
      'max' => 150
    ),
    'Department Name' => array(
      'required' => true,
      'min' => 2,
      'max' => 200
        
    
   
    ),
    'Approved by' => array(
      'required' => true,
      'min' => 2,
      'max' => 150
    ),
       'Request by' => array(
      'required' => true,
      'min' => 2,
      'max' => 150
   ),*/
 
  ));

  if($validation->passed()){
      $requisitions = new AddReq();
      try{

        $requisitions->create('requisitions',array(
            'reqId' => Input::get('Requisition No'),
            'department' => Input::get('Department Name'),
            'requested_by' => Input::get('Approved by'),
            'approved_by' => Input::get('Request by'),
            
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
       <script>
        var tables = document.getElementsByTagName('table');
            var table = tables[tables.length - 1];
            var rows = table.rows;
            for(var 1 = 0, td; i<rows.length; i++){
                td = document.createElement('td');
                td.appendChild(document.createTextNode(i + 1));
                rows[i].insertBefore(td, rows[i].firstChild);
            }
        </script>
    </head>
    <body>
        <center>
    <form action="" method="post" class="form-horizontal">
        <div class="card">
                <div class="card-header">
                    <strong class="card-title">Requisition Form</strong>
                </div>
            
            <div class="card-body card-block">
                
            
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Requisition No</label></div>
                        
                        <div class="col-12 col-md-9"><input type="text" id="hf-email" name="hf-email" class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Department ID</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-email" name="hf-email" class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Department Name</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-email" name="hf-email" class="form-control"></div>
                    </div>
                
            </div>
        </div>
            
        <div class="card"> 
        
            <table border="3">
                
                <thead>
                    <tr>
                        <th scope="col">Requisition</th>
                        <th scope="col">Quantity</th>
                    </tr>
                    
                </thead>
                <tbody>
                    <tr>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    
                </tbody>
                
            </table>
            
        </div>
        
        
        <div class="card">
            
            <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Approved by</label>
                    <input id="cc-pament" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false">
                    <label for="cc-payment" class="control-label mb-1">Requested by by</label>
                    <input id="cc-pament" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false">
            </div>
            <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Print
                    </button>
                
            </div>
            
        </div>
            </form>
        </center>
        
    </body>
</html>