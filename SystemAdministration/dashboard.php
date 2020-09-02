<!DOCTYPE html>
<?php

require_once 'core/init.php';

$user = new User();

// var_dump(Token::check(Input::get('token')));
if(!$user->isLoggedIn()){
    Redirect::to('../SystemAdministration/login.php');
}


?>
<html>
<head>
	<style type="text/css">
		.wid1{
			background-color: #B5BBC3;
		}
		.wid2{
			background-color: #E9ECF0;
			height: 100px;
		}
		.wid3{
			//background-color: #f0f3f5;
			}
		.High{
			background-color: #F9DCD6;
		}
		.Medium{
			background-color: #C7EEB7;
		}
		.Low{
			background-color: #FACA97;
			}
	</style>
</head>
<body>
 
<?php
$event = DB::getInstance()->query("SELECT * FROM event");
?>

   <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title"> Events</strong>
                        </div>
                        <div class="card-body">
                                          
<?php
if(!$event->count()) {
    echo 'No user';
} else {
    foreach ($event->results() as $event) {
    	/*if($p ='High'){
          	$c = "high";
          }else if($p = 'Medium'){
          	$c = "med"; 
       	  }else{ 
       	  	$c = "low"; 
       	  }*/
    	echo " <table id='bootstrap-data-table' class='table table-striped table-bordered' class='t'>";
        $p = $event->priority;
        echo "<tr><td class='".$p."' >"  ;
        echo "<strong>";
            echo $event->title;
        echo "</strong></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td class='wid2'>";
            echo $event->description;
        echo "</td>";
        echo "</tr>";
        echo "<tr>";
        echo '<td>';
        echo "<h6>Published on : ";
        echo $event->created_date;
        echo "</h6></td>";
        echo "</tr>";
        echo "</table>";
       
    }
}
?>  
                  
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