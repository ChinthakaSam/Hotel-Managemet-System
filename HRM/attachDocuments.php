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
    'eid' => array(
      'required' => true
    ),
    'document' => array(
      'required' => true
    )
  ));

  if($validation->passed()){
      $attachdocument = new AttachDocument();
      try{

        $attachdocument->create('personaldocument',array(
            'empId' => Input::get('eid'),
            'docType' => Input::get('docTypeName'),
            'attachment' => Input::get('document')
        ));
            echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                            <span class="badge badge-pill badge-primary">Success</span>
                                                Document has been attached Successfully!
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

    </head>
    <body>
         <div class="col-lg-9">
                    <div class="card">
                      <div class="card-header">
                        <strong>Attach Documents</strong>
                      </div>
                      <div class="card-body card-block">
                        <form action="" method="post" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Employee ID</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="eid" name="eid" placeholder="Enter Employee ID..." class="form-control"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Document Type</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="docTypeName" id="docTypeName" class="form-control-sm form-control" >
                                       <?php
                                          $documenttype = DB::getInstance()->query("SELECT * FROM documenttype");
                                          if(!$documenttype->count()) {
                                              echo 'No user';
                                          } else {
                                              foreach ($documenttype->results() as $documenttype) {
                                                  echo "<option value='$documenttype->docTypeId;'>";
                                                      echo $documenttype->docTypeName;
                                                  echo "</option>";
                                              }
                                          }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Document</label></div>
                                <div class="col-12 col-md-9"><input type="file" id="document" name="document" class="form-control-file"></div>
                            </div>
                            <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                      </div>
                        </form>
                      </div>
                      
                    </div>
        </div>
    </body>
</html>