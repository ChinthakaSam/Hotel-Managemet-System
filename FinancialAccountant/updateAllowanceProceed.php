<?php


require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn()){
    Redirect::to('login.php');
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

  <form action="" method="post">
        
    <?php

          $id = Input::get('id');

                $department = DB::getInstance()->query("SELECT * FROM allowance WHERE alw_id ='$id'");
                if(!$department->count()) {
                                
                             } else {
                                foreach ($department->results() as $department) {
                  
                                    $dd = $department->alw_id;
                                    $ddn = $department->alw_name;
                                    $ddd = $department->alw_amount;
                                    
                                    
                                    echo "<div>";
                                    echo "<table border='1' align='center' class='t'>";
                                    echo "<tr>";
                                    echo "<td>Leave Type ID</td>";
                                    echo "<td><input type='text' id='did' name='did' value='";
                                    echo $dd;
                                    echo "' readonly></td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>Leave Type Name</td>";
                                    echo "<td><input type='text' id='dname' name='dname' value='";
                                    echo $ddn;
                                    echo "'/></td>";
                                    echo "</tr>";
                                     echo "<tr>";
                                    echo "<td>Maximum days</td>";
                                    echo "<td><input type='text' id='dday' name='dday' value='";
                                    echo $ddd;
                                    echo "'/></td>";
                                    echo "</tr>";
                                    echo "</table>";   
                                    echo "</div>";
                                }
                            }
        
?>
<?php
if(Input::exists()){
    if(Token::check(Input::get('token'))){
    
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
    
        ));

        if($validation->passed()){
            //change password
             $did = Input::get('did');
             $dname = Input::get('dname');
              $dday = Input::get('dday');
             $departmentup = DB::getInstance()->query("UPDATE allowance SET alw_name='$dname',alw_amount='$dday' WHERE alw_id ='$did'");
             
                                 echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                            <span class="badge badge-pill badge-primary">Success</span>
                                                 Chaneges saved Successfully!
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                       </div>';

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
  <br><br>
             
         <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Save Changes
                    </button>
                
            </form>
      

</body>
</html>
