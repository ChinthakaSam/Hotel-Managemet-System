<?php
require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn()){
    Redirect::to('login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
<style type="text/css">

</style>
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
                            <li><a href="#">Inventory Management</a></li>
                            <li><a href="#">Dashboard</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
 
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12-1">
                   <?php
                   $current = date('Y-m-d');

                   $a = DB::getInstance()->query("SELECT count(cId) as aa FROM inv_category");
                   	foreach ($a->results() as $a) {
                                        $aa = $a->aa;
                                    }

                   $b = DB::getInstance()->query("SELECT count(sup_Id) as bb FROM inv_supplier");
                   	foreach ($b->results() as $b) {
                                        $bb = $b->bb;
                                    }
                   
                   $c = DB::getInstance()->query("SELECT count(item_id) as cc FROM inv_recieved_items");
                   	foreach ($c->results() as $c) {
                                        $cc = $c->cc;
                                    }

                   $d = DB::getInstance()->query("SELECT sum(quantity) as dd FROM inv_recieved_items");
                   	foreach ($d->results() as $d) {
                                        $dd = $d->dd;
                                    }

                   $e = DB::getInstance()->query("SELECT count(item_id) as ee FROM inv_recieved_items WHERE quantity<='10'");
                   	foreach ($e->results() as $e) {
                                        $ee = $e->ee;
                                    }                 
                   $f = DB::getInstance()->query("SELECT count(item_id) as ff FROM inv_recieved_items WHERE MONTH(expiry_date)=MONTH(CURDATE())");
                   	foreach ($f->results() as $f) {
                                        $ff = $f->ff;
                                    }
                   $g = DB::getInstance()->query("SELECT count(req_id) as gg FROM inv_requisitions WHERE status = 'Pending' OR status = 'Suspended'");
                   	foreach ($g->results() as $g) {
                                        $gg = $g->gg;
                                    }

					$h = DB::getInstance()->query("SELECT count(arr_Id) as hh FROM inv_arrivals WHERE MONTH(supply_date)=MONTH(CURDATE())");
                   	foreach ($h->results() as $h) {
                                        $hh = $h->hh;
                                    }
                   ?>
                   <div class="col-sm-12 mb-4">
                        <div class="card-group">
                            <div class="card col-lg-2 col-md-6 no-padding bg-flat-color-1">
                                <div class="card-body">
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="fa fa-sitemap text-light"></i>
                                    </div>

                                    <div class="h4 mb-0 text-light">
                                        <span class="count"><?php echo $aa ?></span>
                                    </div>
                                    <small class="text-uppercase font-weight-bold text-light">Total Categories</small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                                </div>
                            </div>
                            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                                <div class="card-body bg-flat-color-2">
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="fa fa-users text-light"></i>
                                    </div>
                                    <div class="h4 mb-0 text-light">
                                        <span class="count"><?php echo $bb ?></span>
                                    </div>
                                    <small class="text-uppercase font-weight-bold text-light">Total Suppliers</small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                                </div>
                            </div>
                            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                                <div class="card-body bg-flat-color-3">
                                    <div class="h1 text-right mb-4">
                                        <i class="fa fa-list text-light"></i>
                                    </div>
                                    <div class="h4 mb-0 text-light">
                                        <span class="count"><?php echo $cc ?></span>
                                    </div>
                                    <small class="text-light text-uppercase font-weight-bold">Toatal Item Brands</small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                                </div>
                            </div>
                            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                                <div class="card-body bg-flat-color-5">
                                    <div class="h1 text-right text-light mb-4">
                                        <i class="fa fa-dropbox"></i>
                                    </div>
                                    <div class="h4 mb-0 text-light">
                                        <span class="count"><?php echo $dd ?></span>
                                    </div>
                                    <small class="text-uppercase font-weight-bold text-light">Total product Units</small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                                </div>
                            </div>
                            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                                <div class="card-body bg-flat-color-4">
                                    <div class="h1 text-light text-right mb-4">
                                        <i class="fa  fa-warning (alias)"></i>
                                    </div>
                                    <div class="h4 mb-0 text-light"><?php echo $ee ?></div>
                                    <small class="text-light text-uppercase font-weight-bold">Low Stock</small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                                </div>
                            </div>
                            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                                <div class="card-body bg-flat-color-1">
                                    <div class="h1 text-light text-right mb-4">
                                        <i class="fa fa-times-circle-o"></i>
                                    </div>
                                    <div class="h4 mb-0 text-light">
                                        <span class="count"><?php echo $ff ?></span>
                                    </div>
                                    <small class="text-light text-uppercase font-weight-bold">items expires in this month</small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                                </div>
                            </div>
                            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                                <div class="card-body bg-flat-color-5">
                                    <div class="h1 text-right text-light mb-4">
                                        <i class="fa fa-tags"></i>
                                    </div>
                                    <div class="h4 mb-0 text-light">
                                        <span class="count"><?php echo $gg ?></span>
                                    </div>
                                    <small class="text-uppercase font-weight-bold text-light">Pending Requests</small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                                </div>
                            </div>
                            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                                <div class="card-body bg-flat-color-3">
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="fa fa-truck text-light"></i>
                                    </div>
                                    <div class="h4 mb-0 text-light">
                                        <span class="count"><?php echo $hh ?></span>
                                    </div>
                                    <small class="text-uppercase font-weight-bold text-light">Stock Arrivals in this month</small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    


                   </div>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>