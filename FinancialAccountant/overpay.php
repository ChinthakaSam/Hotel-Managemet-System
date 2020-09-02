<?php

require_once 'core/init.php';

?>
<html>
<body>

<?php
//$ual = DB::getInstance()->query("SELECT * FROM allowance");
//$ual = DB::getInstance()->get('employee',array());
$conn = new mysqli('localhost', 'root', '', 'dbhms');
$ual = $conn->query('SELECT * FROM employee');
if ($ual->num_rows > 0) {
    // output data of each row
    while($row = $ual->fetch_assoc()) {
        $emp_id=$row['empId'];
        $emp_name=$row['nameWithInitials'];
    

        
        
    

//die();
?>

   <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title"><i class="menu-icon fa fa-sitemap"></i>&nbsp; Additions</strong>
                        </div>
                        <div class="card-body">

                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Employee id</th>
                        <th>Employee Name</th>
                        <th>Basic Salary</th>
                        <th>Total Additions</th>
                        <th>Total Deductions</th>
                        <th>Net Salary</th>
                        <th>Option</th>
                      </tr>
                    </thead>
                    <tbody>
                        
<?php
//if(!$ual->count()) {
   // echo 'No user';
//} else {
    ///foreach ($ual->results() as $ual) {




        echo "<tr>";
        echo "<td>";
            echo $emp_id;
        echo "</td>";
        echo "<td>";
            echo $emp_name;
        echo "</td>";
        echo "<td>";
        $emp_designation=$row['designation'];
        $basicSalary=0;
        $desig = $conn->query("SELECT basicSalary FROM designation where desId='".$emp_designation."'");
        if ($desig->num_rows > 0) 
        {
            while($desigrow = $desig->fetch_assoc()) 
            {
                echo $basicSalary= $desigrow['basicSalary'];
            }
            
        }
        echo "</td>";

        echo "<td>";
           // $tot_addition=$row['alw_emp'];
        $sumofamountalownce=0;
        $tot_addition = $conn->query("SELECT alw_id FROM alw_emp where emp_id='".$emp_id."'");
        if ($tot_addition->num_rows > 0) 
        {
            while($tot_additionrow = $tot_addition->fetch_assoc()) 
            {
                $tot_addition_final = $conn->query("SELECT allowance.alw_amount FROM allowance where alw_Id='".$tot_additionrow['alw_id']."'");
                
                if ($tot_addition_final->num_rows > 0) 
                    {
                        while($tot_addition_finalrow = $tot_addition_final->fetch_assoc()) 
                        {
                            $sumofamountalownce+=$tot_addition_finalrow['alw_amount'];
                        }
                    }
               
                //die();    
            }
            
        }
         echo $sumofamountalownce;

        echo "</td>";
          echo "<td>";
           // $tot_addition=$row['alw_emp'];
        $sumofamountdedat=0;
        $tot_diductions = $conn->query("SELECT ded_id FROM ded_emp where emp_id='".$emp_id."'");
        if ($tot_diductions->num_rows > 0) 
        {
            while($tot_diductionrow = $tot_diductions->fetch_assoc()) 
            {
                $tot_diductions_final = $conn->query("SELECT * FROM deductions where ded_Id='".$tot_diductionrow['ded_id']."'");
                
                if ($tot_diductions_final->num_rows > 0) 
                    {
                        while($tot_diductions_finalrow = $tot_diductions_final->fetch_assoc()) 
                        {
                            $sumofamountdedat+=$basicSalary*$tot_diductions_finalrow['ded_percen'];
                        }
                    }
               
                //die();    
            }
            
        }
         echo $sumofamountdedat;

        echo "</td>";
        echo "<td>";
        echo $netSalary=$basicSalary+$sumofamountalownce-$sumofamountdedat;
        echo "</td>";
        echo "<td>";
        echo "<a href='TEST.php?tab=inv_overpay' id='$emp_id' class='btn btn-outline-success btn-sm'><i class='fa fa-edit (alias)'></i>&nbsp; Print</a>";
        echo "&nbsp";
        echo "&nbsp";
        
        echo "</td>";
        echo "</tr>";
        }
} else {
    echo "0 results";
}
?>
                    </tbody>   
                  </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

    <!-- Right Panel -->



    <script src="../assets/js/popper.min.js"></script>


    <script src="../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/jszip.min.js"></script>
    <script src="../assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../assets/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>

</body>
</html> 