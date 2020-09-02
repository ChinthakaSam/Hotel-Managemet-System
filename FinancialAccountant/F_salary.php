<?php
require_once 'core/init.php';


$user = new User();

// var_dump(Token::check(Input::get('token')));
/*if(!$user->isLoggedIn()){
    Redirect::to('../SystemAdministration/login.php');}*/
   
?>
 

<?php
$alow_Search = DB::getInstance()->query("SELECT * FROM allowance WHERE alw_name='Transport1'");
//$alow_Search = DB::getInstance()->query("SELECT * FROM allowance");
//$emp =DB::getInstance()->query("SELECT * FROM employee");
//$testadd= DB::getInstance()->query("SELECT emp_id , SUM(alw_amount) as TotalA FROM alw_emp, allowance WHERE alw_emp.alw_id=allowance.alw_id GROUP BY emp_id");
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
                        <th>Allowance name</th>
                        <th>Allowance Amount</th>

                       <!-- <th>Employee name</th>
                        <th>Employee id</th>
                        <th>Basic Salary</th>
                        <th>Total alow_Search</th>-->
                       <!-- <th>Total Deductions</th>-->
                       <!-- <th>Net Salary</th>-->
                        <th>Option</th>
                      </tr>
                    </thead>
                    <tbody>
                        
<?php
if(!$alow_Search->count()) {
    echo 'No user';
} else {
    foreach ($alow_Search->results() as $alow_Search )  {
   
        echo "<tr>";
        echo "<td>";
            echo $allowance->alw_name;
        echo "</td>";
        echo "<td>";
            echo $allowance->alw_amount;
        echo "</td>";
        
       /* echo "<td>";
            echo $alw_emp->TotalD; // total deductions
        echo "</td>";*/
       /* echo "<td>";
            echo $alw_emp->emp_id; //Net Sal
        echo "</td>";*/

        echo "<td>";
       echo "<a href='FAView.php?tab=inv_updateCategory' id='$alow_Search->alw_name' class='btn btn-outline-success btn-sm'><i class='fa fa-edit (alias)'></i>&nbsp; Edit</a>";
        echo "&nbsp";
        echo "&nbsp";
         echo "<a href='FAView.php?id=$alow_Search->alw_name' class='btn btn-outline-danger btn-sm'><i class='fa fa-trash-o'></i>&nbsp; Delete</a>";
        echo "</td>";
       /* echo "<a href='update_employee.php?id=$alow_Search->cId' class='btn btn-outline-danger btn-sm'><i class='fa fa-trash-o'></i>&nbsp; Delete</a>";
        echo "</td>";*/
        echo "</tr>";
   			 
		 </tbody>   
                  </table>
	
}
}
?>
                   
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


