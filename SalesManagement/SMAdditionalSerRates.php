<?php 
require_once 'core/init.php';

$user = new User();


if(!$user->isLoggedIn()){
    Redirect::to('index.php');
}

include 'database.php';  
 $data = new Databases;  
 $success_message = '';  
 if(isset($_POST["submit"]))  
 {  
      $insert_data = array(  
           'serviceId'     =>     mysqli_real_escape_string($data->con, $_POST['serviceId']),  
           'serviceName'          =>     mysqli_real_escape_string($data->con, $_POST['serviceName']) ,
           'date'     =>     mysqli_real_escape_string($data->con, $_POST['date']),  
           'rate'          =>     mysqli_real_escape_string($data->con, $_POST['rate'])
      );  
      if($data->insert('additionalservices', $insert_data))  
      {  
           $success_message = 'Post Inserted';  
      }       
 }  
 if(isset($_POST["edit"]))  
 {  
      $update_data = array(  
           'serviceId'     =>     mysqli_real_escape_string($data->con, $_POST['serviceId']),  
           'serviceName'          =>     mysqli_real_escape_string($data->con, $_POST['serviceName']) ,
           'date'     =>     mysqli_real_escape_string($data->con, $_POST['date']),  
           'rate'          =>     mysqli_real_escape_string($data->con, $_POST['rate'])
      );  
      $where_condition = array(  
           'serviceId'     =>     $_POST["serviceId"]  
      );  
      if($data->update("additionalservices", $update_data, $where_condition))  
      {  
           header("location:SMAdditionalSerRates.php?updated=1");  
      }  
 }  
 if(isset($_GET["updated"]))  
 {  
      $success_message = 'Entry Updated';  
 }  
?>



<html>
    <head>
    <style type="text/css">
        input,textarea{
            border:0;
            background-color: transparent;
        }
    </style>
</head>
<body>  
           <br /><br />  
           <div class="container" style="width:700px;">  
                <form method="post">  
                     <?php  
                     if(isset($_GET["edit"]))  
                     {  
                          if(isset($_GET["serviceId"]))  
                          {  
                               $where = array(  
                                    'serviceId'     =>     $_GET["serviceId"]  
                               );  
                               $single_data = $data->select_where("additionalservices", $where);  
                               foreach($single_data as $post)  
                               {  
                     ?>  
                          <label>Package Number</label>  
                          <input type="text" name="serviceId" value="<?php echo $post["serviceId"]; ?>" class="form-control" />  
                          <br />  
                          <label>Package Name</label>  
                          <input type="text" name="serviceName" value="<?php echo $post["serviceName"]; ?>" class="form-control" />  
                          <br /> 
                        <label>Date</label>  
                          <input type="date" name="date" value="<?php echo $post["date"]; ?>" class="form-control" />  
                          <br /> 
                        <label>Rate</label>  
                          <input type="text" name="rate" value="<?php echo $post["rate"]; ?>" class="form-control" />  
                          <br /> 
                          <input type="hidden" name="PackageNo" value="<?php echo $post["PackageNo"]; ?>" />  
                          <input type="submit" name="edit" class="btn btn-info" value="Edit" />  
                     <?php  
                               }  
                          }  
                     }  
                     else  
                     {  
                     ?>  
                          <label>Service Number</label>  
                          <input type="text" name="serviceId" class="form-control" />  
                          <br />  
                          <label>Service Name</label>  
                          <input type="serviceName" class="form-control">  
                          <br /> 
                            <label>Date</label>  
                          <input type="date" name="date" class="form-control" />  
                          <br />  
                            <label>Rate</label>  
                          <input type="text" name="rate" class="form-control" />  
                          <br />  
                          <input type="submit" name="submit" class="btn btn-info" value="Submit" />  
                     <?php  
                     }  
                     ?>  
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
                     <table class="table table-bordered"  border="1">  
                          <tr>  
                               <td width="30%">Service Number</td>  
                               <td width="30%">Service Name</td>  
                               <td width="10%">Date</td>  
                               <td width="10%">Rate</td>  
                               <td width="10%">Edit</td>
                          </tr>  
                          <?php  
                          $post_data = $data->select('additionalservices');  
                          foreach($post_data as $post)  
                          {  
                          ?>  
                          <tr>  
                               <td><?php echo $post["serviceId"]; ?></td>  
                                <td><?php echo $post["serviceName"]; ?></td>
                              <td><?php echo $post["date"]; ?></td>
                              <td><?php echo $post["rate"]; ?></td>
                               <td><a href="SMAdditionalSerRates.php?edit=&serviceId=<?php echo $post["serviceId"]; ?>">Edit</a></td>   
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                    
                    <button><a href="salesView.php">Back</a></button>
                </div>  
           </div>
    
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
    
     <?php
                $tb = isset($_GET['tab']) ? $_GET['tab'] : '';
                switch($tb) { //switch is just like a bunch of if()s
                    default: //default case
                    include('SMDashboard.php'); //include page.html
                    break;  //break, witch means stop
                    case 'bbrates': // page2, if changePage has the value of page2
                    include('SMBBRates.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'hbrates': // page2, if changePage has the value of page2
                    include('SMHBRates.php'); //include page2.html
                    break;  //break, witch means stop
                    case 'fbrates': // page2, if changePage has the value of page2
                    include('SMFBRates.php'); //include page2.html
                    break;  //break, witch means stop    
                    case 'bqrates': // page2, if changePage has the value of page2
                    include('SMBanquetRates.php'); //include page2.html
                    break;  //break, witch means stop     case 'bqrates': // page2, if changePage has the value of page2
                    case 'addserrates':
                    include('SMAdditionalSerRates.php'); //include page2.html
                    break;  //break, witch means stop 
                    case 'roomitemrates':
                    include('SMRoomItemRates.php'); //include page2.html
                    break;  //break, witch means stop 
                    case 'resitemrates':
                    include('SMMealRates.php'); //include page2.html
                    break;  //break, witch means stop     
                    case 'baritemrates':
                    include('SMBarItemRates.php'); //include page2.html
                    break;  //break, witch means st
                    case 'reitemrates':
                    include('SMReCreRates.php'); //include page2.html
                    break;  //break, witch means st 
					case 'addmealitems':
                    include('SMAddMealItem.php'); //include page2.html
                    break;  //break, witch means st 
					case 'addbaritems':
                    include('SMAddBarItem.php'); //include page2.html
                    break;  //break, witch means st 
					case 'deletemealitems':
                    include('SMDeleteMealItem.php'); //include page2.html
                    break;  //break, witch means st 
					case 'deletebaritems':
                    include('SMDeleteBarItems.php'); //include page2.html
                    break;  //break, witch means st 
                    case 'allagents':
                    include('SMTravelAgents.php'); //include page2.html
                    break;  //break, witch means st 
                    case 'addagents':
                    include('SMAddTravelAgents.php'); //include page2.html
                    break;  //break, witch means st 
                    case 'allmealrates':
                    include('SMAllMealRates.php'); //include page2.html
                    break;  //break, witch means st 
                    case 'allbarrates':
                    include('SMAllBarRates.php'); //include page2.html
                    break;  //break, witch means st  *//*-   
                    case 'allroomitemrates':
                    include('SMAllRoomItemRates.php'); //include page2.html
                    break;  //break, witch means st  *//*-     
                    case 'allrecreationalrates':
                    include('SMAllRecreationalRates.php'); //include page2.html
                    break;  //break, witch means st  *//*-      
                    case 'addagents1':
                    include('SMAddTravelAgents.php'); //include page2.html
                    break;  //break, witch means st  *//*-  
                    include('SMAdditionalSerRates.php'); //include page2.html
                    break;
                } //end the switch
            ?> 
      </body> 
</html>
