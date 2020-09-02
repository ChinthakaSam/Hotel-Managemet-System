<!--<html>
<body>
<div class="card">
    <div class="card-header">
        <strong>Search Employees</strong>
    </div>
    
    <div class="card-body card-block">
        <form action="" method="post" class="form-horizontal">
            
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Department</label></div>
                <div class="col-12 col-md-9"><input type="text" id="hf-email" name="hf-email" placeholder="Enter Department Name..." class="form-control"></div>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Search
        </button>
    </div>
</div>
</body>
</html> -->

<?php
require_once 'core/init.php';


$user = new User();

// var_dump(Token::check(Input::get('token')));
/*if(!$user->isLoggedIn()){
    Redirect::to('../SystemAdministration/login.php');}*/
   
?>
 

<?php
$additions = DB::getInstance()->query("SELECT * FROM allowance");
$emp =DB::getInstance()->query("SELECT * FROM employee");
$testadd= DB::getInstance()->query("SELECT emp_id , SUM(alw_amount) as TotalA FROM alw_emp, allowance WHERE alw_emp.alw_id=allowance.alw_id GROUP BY emp_id");
?>

   <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title"><i class="menu-icon fa fa-usd"></i>&nbsp; Salary Overview</strong>
                           
                            
                        </div>
                        <div class="card-body">

                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <!--<th>Addition id</th>-->
                        <th>Employee name</th>
                        <th>Employee id</th>
                        <th>Basic Salary</th>
                        <th>Total Additions</th>
                       <!-- <th>Total Deductions</th>-->
                       <!-- <th>Net Salary</th>-->
                        <th>Option</th>
                      </tr>
                    </thead>
                    <tbody>
                        
<?php
if(!$additions->count()) {
    echo 'No user';
} else {
    foreach ($additions->results() as $additions )  {
            echo "<tr>";
        echo "<td>";
            echo $emp->callName;
        echo "</td>";
        echo "<td>";
            echo $alw_emp->emp_id;
        echo "</td>";
        echo "<td>";
            echo $employee->budgetIncrement;//basic Salaryyyyyyyyyyyyyyyyyyyyyyyyyy
        echo "</td>";
       echo "<td>";
            echo $testadd->TotalA;
        echo "</td>";
       /* echo "<td>";
            echo $alw_emp->TotalD; // total deductions
        echo "</td>";*/
       /* echo "<td>";
            echo $alw_emp->emp_id; //Net Sal
        echo "</td>";*/

        echo "<td>";
       echo "<a href='FAView.php?tab=inv_updateCategory' id='$additions->alw_name' class='btn btn-outline-success btn-sm'><i class='fa fa-edit (alias)'></i>&nbsp; Edit</a>";
        echo "&nbsp";
        echo "&nbsp";
         echo "<a href='FAView.php?id=$additions->alw_name' class='btn btn-outline-danger btn-sm'><i class='fa fa-trash-o'></i>&nbsp; Delete</a>";
        echo "</td>";
       /* echo "<a href='update_employee.php?id=$additions->cId' class='btn btn-outline-danger btn-sm'><i class='fa fa-trash-o'></i>&nbsp; Delete</a>";
        echo "</td>";*/
        echo "</tr>";
             }
        
    
}
?>
                    </tbody>   
                  </table>
                    <div class="card-footer "> 
                        
                        <div class="float-right">
                        <button type="submit" class="btn btn-primary btn-md ">
                          <i class="fa fa-dot-circle-o"></i> Print
                        </button>
                        <button type="submit" class="btn btn-success btn-md ">
                          <i class="fa fa-dot-circle-o"></i> Approve
                        </button>

                      </div>
                    </div>

                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div>


<!--

<html>  
      <head>  
           <title>Webslesson Tutorial | Select or Fetch Data from Mysql Table using OOPS in PHP</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:700px;">  
                <form method="post">  
                     <label>Post Title</label>  
                     <input type="text" name="post_title" class="form-control" />  
                     <br />  
                     <label>Post Description</label>  
                     <textarea name="post_desc" class="form-control"></textarea>  
                     <br />  
                     <input type="submit" name="submit" class="btn btn-info" value="Submit" />  
                     <span class="text-success">  
                     <?php  
                     if(isset($success_message))  
                     {  
                          echo $success_message;  
                     }  
                     ?>  
                     </span>  
                </form>  
                <br />  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <td width="30%">Post Name</td>  
                               <td width="50">Post Description</td>  
                               <td width="10%">Edit</td>  
                               <td width="10%">Delete</td>  
                          </tr>  
                          <?php  
                          $post_data = $data->select('tbl_posts');  
                          foreach($post_data as $post)  
                          {  
                          ?>  
                          <tr>  
                               <td><?php echo $post["post_title"]; ?></td>  
                               <td><?php echo substr($post["post_desc"], 0, 200); ?></td>  
                               <td><a href="test_class.php?edit=1&post_id=<?php echo $post["post_id"]; ?>">Edit</a></td>  
                               <td><a href="#" id="<?php echo $post["post_id"]; ?>" class="delete">Delete</a></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 -->