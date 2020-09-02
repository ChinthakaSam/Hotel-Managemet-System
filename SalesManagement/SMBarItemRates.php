<?php 
require_once 'core/init.php';

$user = new User();


if(!$user->isLoggedIn()){
    Redirect::to('index.php');
}

include 'database.php';  
 $data = new Databases;  
 $success_message = '';  

$event = DB::getInstance()->query("SELECT * FROM salesitem WHERE departmentName='Bar'");

 if(isset($_POST["submit"]))  
 {  
      $insert_data = array(  
           'itemId'     =>     mysqli_real_escape_string($data->con, $_POST['itemId']),  
          'date'     =>     mysqli_real_escape_string($data->con, $_POST['date']), 
           'item'          =>     mysqli_real_escape_string($data->con, $_POST['item']) ,
            'rate'          =>     mysqli_real_escape_string($data->con, $_POST['rate'])
      );  
      if($data->insert('salesitem', $insert_data))  
      {  
           $success_message = 'Post Inserted';  
      }       
 }  
 if(isset($_POST["edit"]))  
 {  
      $update_data = array(  
           'itemId'     =>     mysqli_real_escape_string($data->con, $_POST['itemId']),  
           'date'     =>     mysqli_real_escape_string($data->con, $_POST['date']),  
           'item'          =>     mysqli_real_escape_string($data->con, $_POST['item']) ,
           'rate'          =>     mysqli_real_escape_string($data->con, $_POST['rate'])
      );  
      $where_condition = array(  
           'itemId'     =>     $_POST["itemId"]  
      );  
      if($data->update("salesitem", $update_data, $where_condition))  
      {  
           header("location:SMMealRates.php?updated=1");  
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
                          if(isset($_GET["itemId"]))  
                          {  
                               $where = array(  
                                    'itemId'     =>     $_GET["itemId"]  
                               );  
                               $single_data = $data->select_where("salesitem", $where);  
                               foreach($single_data as $post)  
                               {  
                     ?>  
                          <label>Item Number</label>  
                          <input type="text" name="itemId" value="<?php echo $post["itemId"]; ?>" class="form-control" />  
                          <br />  
                        <label>Date</label>  
                          <input type="date" name="date" value="<?php echo $post["date"]; ?>" class="form-control" />  
                          <br /> 
                          <label>Item Name</label>  
                          <input type="text" name="item" value="<?php echo $post["item"]; ?>" class="form-control" />  
                          <br />
                        <label>Rate</label>  
                          <input type="text" name="rate" value="<?php echo $post["rate"]; ?>" class="form-control" />  
                          <br /> 
                          <input type="hidden" name="itemId" value="<?php echo $post["itemId"]; ?>" />  
                    <?php
                    if(Input::exists()){
    if(Token::check(Input::get('token'))){
        

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
              'itemId' => array(
              'required' => true,
              'min' => 2,
            ),
            'date' => array(
              'required' => true,
              'min' => 2,
              'max' => 35
            ),
            'item' => array(
              'required' => true
            ),
            'rate' => array(
              'required' => true
            )
        ));

        if($validation->passed()){
            //change password
                 $userup = DB::getInstance()->update('event',$xid, array(
                                        'title' => Input::get('event_name'),
                                        'created_date' => date('Y-m-d H:i:s'),
                                        'priority' => Input::get('priority'),
                                        'description' => Input::get('description')
                                     ));
                                 echo '  <br><br><div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="width:350px;margin-left:38%;">
                                            <span class="badge badge-pill badge-primary">Success</span>
                                                Changes has been saved Successfully!
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
                          <input type="submit" name="edit" class="btn btn-info" value="Edit" />  
                     <?php  
                               }  
                          }  
                     }  
                     else  
                     {  
                     ?> 
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
                     <table class="table table-bordered">  
                          <tr>  
                               <td width="30%">Item Number</td>
                              <td width="10%">Date</td>  
                               <td width="30%">Item Name</td>  
                               <td width="10%">Rate</td>  
                               <td width="10%">Edit</td>
                          </tr>  
                          <?php  
                          $post_data = $data->select('salesitem');  
                          foreach($post_data as $post)  
                          {  
                          ?>  
                          <tr>  
                               <td><?php echo $post["itemId"]; ?></td>
                             <td><?php echo $post["date"]; ?></td>
                                <td><?php echo $post["item"]; ?></td>
                              <td><?php echo $post["rate"]; ?></td>
                               <td><a href="SMMealRates.php?edit=&itemId=<?php echo $post["itemId"]; ?>">Edit</a></td>   
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

                } //end the switch
            ?> 
      </body> 
</html>
