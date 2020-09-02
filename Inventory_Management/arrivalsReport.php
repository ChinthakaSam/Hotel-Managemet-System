<?php
require_once 'core/init.php';


$user = new User();

if(!$user->isLoggedIn()){
    Redirect::to('login.php');
}
?>

<html>
<head>
	<script src="inv_js/jquery-3.3.1.min.js"></script>
</head>
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
                            <li><a href="#">Inventory Management</a><li><a href="#">Reports</a></li>
                            <li class="active">New Arrivals</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
 
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    
                    <div class="card">
                      <div class="card-header">
                        <strong><i class="fa fa-file-text-o"></i>&nbsp; Report of New Arrivals</strong>
                      </div>
                     
                      <form id="data_form" action="arrivalsPdf.php" method="GET" target="_blank" class="form-horizontal">

                      <div class="card-body card-block">
                        
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="name"  class=" form-control-label">Start Date</label></div>
                              <div class="col-12 col-md-9"><input type="date" id="sdate" name="sdate" autocomplete="off" value="" class="form-control" required="" ><small class="form-text text-muted">Please set starting date for search </small></div></div>

                          <div class="row form-group">
                            <div class="col col-md-3"><label for="name"  class=" form-control-label">End Date</label></div>
                              <div class="col-12 col-md-9"><input type="date" id="edate" name="edate" autocomplete="off" value="" class="form-control" required="" ><small class="form-text text-muted">Please set ending date for search </small></div></div>


                        
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm" name="pdf_report" id="pdf_report" >
                          <i class="fa fa-dot-circle-o"></i> Genarate report
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> Reset
                        </button>

                      </form>
                      </div>
                    </div>
    
                    </div>
                </div>
            </div>
    </div>
    
    <script src="../assets/js/popper.min.js"></script>

<script type="text/javascript">

</script>

</body>
</html>