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
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Inventory Management</a></li>
                            <li><a href="#">General Stock</a></li>
                            <li class="active">Add New Item</li>
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
                        <strong><i class="fa fa-plus-square-o"></i>&nbsp; Add New Item</strong>
                      </div>
                      
                      <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                      <div class="card-body card-block">
                        

                            <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Item Name</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="item_name" name="item_name" placeholder="Name" class="form-control"><small class="form-text text-muted">Please enter item name </small></div></div>
                            
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Quantity</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="units" name="units" placeholder="Qunatity as units" class="form-control"><small class="form-text text-muted">Please enter quantity.</small></div>
                          </div>
                            
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Price Per Unit</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="price_per_unit" name="price_per_unit" placeholder="Price per unit" class="form-control"><small class="form-text text-muted">Please enter price.</small></div>
                          </div>
                            

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Arrival Date</label></div>
                            <div class="col-12 col-md-9"><input type="date" id="supply_date" name="supply_date" placeholder="DD-MM-YY" class="form-control"><small class="form-text text-muted">Please enter arrival date</small></div>
                          </div>
                            
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Expiry Date</label></div>
                            <div class="col-12 col-md-9"><input type="date" id="expiry_date" name="expiry_date" placeholder="DD-MM-YY" class="form-control"><small class="form-text text-muted">Please enter expiry date</small></div>
                          </div>  
    <!--
                         <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Type of item</label></div>
                            <div class="col-12 col-md-9">
                              <select name="type" id="type" class="form-control">
                                <option value="0">Please choose a category</option>
                                <option value="1">Kitchen</option>
                                <option value="2">Bar</option>
                                <option value="3">House Keeping</option>
                              </select>
                            </div>
                          </div>
 -->                           
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Type</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="type" name="type" placeholder="Type" class="form-control"><small class="form-text text-muted">Please enter Type of the item </small></div></div>
                            
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Category</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="category_Id" name="category_Id" placeholder="category" class="form-control"><small class="form-text text-muted">Please enter category's name </small></div></div>
                            
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Supplier's Name</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="supplier_Id" name="supplier_Id" placeholder="Supplier" class="form-control"><small class="form-text text-muted">Please enter supplier's name </small></div></div>
                          

                            
                            
                       
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
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
    
</body>
</html>