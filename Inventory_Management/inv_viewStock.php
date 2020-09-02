<?php

require_once 'core/init.php';

?>
<html>
<body>

    <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Inventory Management</a></li>
                            <li><a href="#">Genaral Stock</a></li>
                            <li class="active">View Stcok</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

<?php
$recievedItems = DB::getInstance()->query("SELECT * FROM inv_recieved_items");
?>
     
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title"><i class="menu-icon ti ti-package"></i>&nbsp; Stock Items</strong>
                        </div>
                        <div class="card-body">

                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Measuring Unit</th>
                        <th>Unit Price</th>
                        <th>Arrival Date</th>
                        <th>Expiry Date</th>
                        <th>Category</th>
                        <th>Supplier</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody>
                        
<?php
if(!$recievedItems->count()) {
    echo 'No user';
} else {
    foreach ($recievedItems->results() as $recievedItems) {
        echo "<tr>";
        echo "<td>";
            echo $recievedItems->item_id;
        echo "</td>";
        echo "<td>";
            echo $recievedItems->item_name;
        echo "</td>";
        echo "<td>";
            echo $recievedItems->quantity;
        echo "</td>";
        echo "<td>";
            echo $recievedItems->measuring_unit;
        echo "</td>";
        echo "<td>";
            echo $recievedItems->price_per_unit;
        echo "</td>";
        echo "<td>";
            echo $recievedItems->supply_date;
        echo "</td>";
        echo "<td>";
            echo $recievedItems->expiry_date;
        echo "</td>";
        echo "<td>";
            $cat = $recievedItems->cId;
            $dep = DB::getInstance()->query("SELECT * FROM inv_category WHERE cId = $cat");
        if(!$dep->count()) {
            echo 'No user';
        } else {
            foreach ($dep->results() as $dep) {
                    echo $dep->name;
            }
        }
        echo "</td>";
        echo "<td>";
            $sup = $recievedItems->sup_Id;
            $dep = DB::getInstance()->query("SELECT * FROM inv_supplier WHERE sup_Id = $sup");
        if(!$dep->count()) {
            echo 'No user';
        } else {
            foreach ($dep->results() as $dep) {
                    echo $dep->name;
            }
        }
        echo "</td>";                             
        echo "<td>";
        echo "<a href='inv_updateStockItem.php?id=$recievedItems->item_id ' class='btn btn-outline-success btn-sm'><i class='fa fa-edit (alias)'></i>&nbsp; Edit &nbsp &nbsp &nbsp</a>";
        echo "&nbsp";
        echo "&nbsp";
        echo "<a href='inv_deleteStockItem.php?id=$recievedItems->item_id ' class='btn btn-outline-danger btn-sm'><i class='fa fa-trash-o'></i>&nbsp; Discard &nbsp</a>";
        echo "</td>";
        echo "</tr>";
    }
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

            <?php
                $tb = isset($_GET['tab']) ? $_GET['tab'] : '';
                switch($tb) { //switch is just like a bunch of if()s
                    //**********************************************************************
                    //default: //default case
                    //include('Dashboard.php'); //include page.html
                    //break;  //break, witch means stop
                    case 'dashboard': // page2, if changePage has the value of page2
                    include('Dashboard.php'); //include page2.html
                    break;  //break, witch means stop
                    //**********************************************************************
                    case 'inv_viewCategory': // page3, if changePage has the value of page3
                    include('inv_viewCategory.php'); //include page3.html
                    break;  //break, witch means stop
                    case 'inv_addCategory': // page3, if changePage has the value of page3
                    include('inv_addCategory.php'); //include page3.html
                    break;  //break, witch means stop 
                    case 'addCategoryDemo': // page3, if changePage has the value of page3
                    include('addCategoryDemo.php'); //include page3.html
                    break;  //break, witch means stop 
                    case 'inv_updateCategory': // page4, if changePage has the value of page3
                    include('inv_updateCategory.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'inv_deleteCategory': // page4, if changePage has the value of page3
                    include('inv_deleteCategory.php'); //include page4.html
                    break;  //break, witch means stop
                    //**********************************************************************
                    case 'inv_viewSuppliers': // page4, if changePage has the value of page3
                    include('inv_viewSuppliers.php'); //include page4.html
                    break;  //break, witch means stop 
                    case 'inv_addSupplier': // page4, if changePage has the value of page3
                    include('inv_addSupplier.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'addSupplierDemo': // page4, if changePage has the value of page3
                    include('addSupplierDemo.php'); //include page4.html
                    break;  //break, witch means stop 
                    case 'inv_deleteSupplier': // page4, if changePage has the value of page3
                    include('inv_deleteSuppliers.php'); //include page4.html
                    break;  //break, witch means stop 
                    case 'inv_updateSupplier': // page4, if changePage has the value of page3
                    include('inv_updateSupplier.php'); //include page4.html
                    break;  //break, witch means stop 
                    //**********************************************************************
                    //case 'inv_viewStock': // page4, if changePage has the value of page3
                    //include('inv_viewStock.php'); //include page4.html
                    //break;  //break, witch means stop 
                    case 'inv_viewLowStock': // page4, if changePage has the value of page3
                    include('inv_viewLowStock.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'inv_addStockItem': // page4, if changePage has the value of page3
                    include('inv_addStockItem.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'addStockDemo': // page4, if changePage has the value of page3
                    include('iaddStockDemo.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'inv_deleteStockItem': // page4, if changePage has the value of page3
                    include('inv_deleteStockItem.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'inv_updateStockItem': // page4, if changePage has the value of page3
                    include('inv_updateStockItem.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'inv_updateLowStock': // page4, if changePage has the value of page3
                    include('inv_updateLowStock.php'); //include page4.html
                    break;  //break, witch means stop
                    //**********************************************************************
                    case 'inv_viewReqisitions': // page4, if changePage has the value of page3
                    include('inv_viewReqisitions.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'inv_addIssue': // page4, if changePage has the value of page3
                    include('inv_addIssue.php'); //include page4.html
                    break;  //break, witch means stop
                    //**********************************************************************
                    case 'inv_addPOrder': // page4, if changePage has the value of page3
                    include('inv_addPOrder.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'inv_addPOrderNew': // page4, if changePage has the value of page3
                    include('inv_addPOrderNew.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'addPOrderDemo': // page4, if changePage has the value of page3
                    include('addPOrderDemo.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'inv_viewLowStockForPO': // page4, if changePage has the value of page3
                    include('inv_viewLowStockForPO.php'); //include page4.html
                    break;  //break, witch means stop
                    //**********************************************************************
                    case 'IssueReport': // page4, if changePage has the value of page3
                    include('IssueReport.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'arrivalsReport': // page4, if changePage has the value of page3
                    include('arrivalsReport.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'discardReport': // page4, if changePage has the value of page3
                    include('discardReport.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'POrderReport': // page4, if changePage has the value of page3
                    include('POrderReport.php'); //include page4.html
                    break;  //break, witch means stop
                    case 'catReport': // page4, if changePage has the value of page3
                    include('catReport.php'); //include page4.html
                    break;  //break, witch means stop
                    //**********************************************************************


                } //end the switch
            ?> 