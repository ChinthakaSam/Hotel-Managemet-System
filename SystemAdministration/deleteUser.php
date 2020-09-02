<?php
require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn()){
    Redirect::to('login.php');
}

if(Input::exists()){
    if(Token::check(Input::get('token'))){
        
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array(
                'required' => true
            )
        ));

        if($validation->passed()){
            //change password
                $u = Input::get('username');
                $newuser = DB::getInstance()->query("SELECT id FROM users WHERE username ='$u'");
                if(!$newuser->count()) {
                                  echo '<br><div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" style="width:400px;margin-left:38%;">
                                                <span class="badge badge-pill badge-danger">Fail</span>&nbsp;&nbsp;
                                                No user matches the Input, Please Enter correct username!
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                      </div>';
                             } else {
                                foreach ($newuser->results() as $newuser) {
                  
                                    $x = $newuser->id;
                                  $userdl = DB::getInstance()->delete('users', array('id', '=', $x));
                                  if(!$userdl->count()) {
                                     echo '<br><div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" style="width:400px;margin-left:38%;">
                                                <span class="badge badge-pill badge-danger">Fail</span>&nbsp;&nbsp;
                                                No user matches the Input, Please Enter correct username!
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                      </div>';
                                  }else{
                                     echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                                <span class="badge badge-pill badge-primary">Success</span>
                                                    User has been deleted Successfully!
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                           </div>';
                                   }
                                }
                            }
                

        }else{
            //output errors
            foreach ($validation->errors() as $error) {
                echo '<br><div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" style="width:400px;margin-left:38%;">
                                                <span class="badge badge-pill badge-danger">Fail</span>&nbsp;&nbsp;'.
                                                    $error.'
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                      </div>';
            }
        }
    }
}

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
</head>
<body>
<div class="card">
    <div class="card-header">
        <strong>Delete User</strong>
    </div>
    
    <div class="card-body card-block">
        <form action="" method="post" class="form-horizontal">
              <div class="row form-group">
                <div class="col col-md-3"><label for="password" class=" form-control-label">Username</label></div>
                <div class="col-12 col-md-9"><input type="text" id="username" name="username" placeholder="Enter Current Password..." class="form-control"></div>
            </div>
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            <div class="card-footer" align="right">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Delete User
                </button>
            </div>
        </form>
    </div>
    
</div>

</body>
</html>
