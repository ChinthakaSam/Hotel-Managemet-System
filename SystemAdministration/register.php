<?php
require_once 'core/init.php';

$user = new User();

// var_dump(Token::check(Input::get('token')));
if(!$user->isLoggedIn()){
    Redirect::to('login.php');
}

if(Input::exists()){
    if(Token::check(Input::get('token'))){
        //Input::get('username');
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array(
                'required' => true,
                'min' => 13,
                'max' => 30,
                'unique' => 'users'
            ),
            'password' => array(
                'required' => true,
                'min' => 8
            ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password'
            ),
            'name' => array(
                'required' => true,
                'min' => 5,
                'max' => 50
            )
        ));

        if($validation->passed()){
            //register user
           // $user = new User();

            $salt = Hash::salt(32);

            try{
                 $user->create(array(
                    'username' => Input::get('username'),
                    'password' => Hash::make(Input::get('password'), $salt),
                    'salt' => $salt,
                    'name' => Input::get('name'),
                    'joined' => date('Y-m-d H:i:s'),
                    'group' => Input::get('group')
                 ));  
                 echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                            <span class="badge badge-pill badge-primary">Success</span>
                                                User Created Successfully!
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                 //Session::flash('success', ' Created new user Successfully !');                  
                 //header('Location:index.php');
                 //Redirect::to('index.php');
            }catch(Exception $e){
                die($e->getMessage());
            }       
        }else{
            //output errors
            foreach ($validation->errors() as $error) {
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
}
?>
<html>
<body>
<div class="card">
    <div class="card-header">
        <strong>Create New User</strong>
    </div>
    
    <div class="card-body card-block">
        <form action="" method="post" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="username" class=" form-control-label">Username</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="username" name="username" placeholder="Enter Username..." value="<?php echo escape(Input::get('username')); ?>" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="password" class=" form-control-label">Password</label></div>
                <div class="col-12 col-md-9"><input type="password" id="password" name="password" placeholder="Enter Password..." class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="password_again" class=" form-control-label">Confirm Password</label></div>
                <div class="col-12 col-md-9"><input type="password" id="password_again" name="password_again" placeholder="Confirm Password..." class="form-control"></div>
            </div>
             <div class="row form-group">
                <div class="col col-md-3">
                    <label for="name" class=" form-control-label">Name</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="name" name="name" placeholder="Enter name..." value="<?php echo escape(Input::get('name')); ?>" class="form-control" autocomplete="off">
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3"><label for="selectSm" class=" form-control-label">User Group</label></div>
                <div class="col-12 col-md-9">
                    <select name="group" id="group" class="form-control-sm form-control">
                        <option value="1">HR Manager</option>
                        <option value="2">System Administrator</option>
                        <option value="3">Standard User</option>
                        <option value="4">Inventory Manager</option>
                        <option value="5">House-keeping Manager</option>
                        <option value="6">Accounts Manager</option>
                        <option value="7">Restaurant Manager</option>
                        <option value="8">Re-creational Services Manager</option>
                        <option value="9">Sales Manager</option>
                        <option value="10">Front-Office Manager</option>
                    </select>
                </div>
            </div>

            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            <div class="card-footer" align="right">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Create User
                </button>
            </div>
        </form>
    </div>
    
</div>
</body>
</html>