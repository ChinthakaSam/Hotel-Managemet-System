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
    'document_type' => array(
      'required' => true,
      'min' => 2,
      'max' => 100
    )
  ));

  if($validation->passed()){
      $documenttype = new DocumentType();
      try{

        $documenttype->create('documenttype',array(
            'docTypeName' => Input::get('document_type')
        ));
            echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                            <span class="badge badge-pill badge-primary">Success</span>
                                                Document Type has been created Successfully!
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
                        <strong>Add Document Type</strong>
                      </div>
                      <div class="card-body card-block">
                        <form action="" method="post" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Document Type </label></div>
                                <div class="col-12 col-md-9"><input type="text" id="document_type" name="document_type" placeholder="Enter Document Type..." class="form-control"></div>
                            </div>
                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Add Document Type
                              </button>
                              </div>                         
                        </form>
                      </div>
                      
                    </div>
        </div>
    </body>
</html>