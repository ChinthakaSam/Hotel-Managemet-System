<html>
<body>
<div class="card">
    <div class="card-header">
        <strong>Create New User</strong>
    </div>
    
    <div class="card-body card-block">
        <form action="" method="post" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Username</label></div>
                <div class="col-12 col-md-9"><input type="text" id="hf-email" name="hf-email" placeholder="Enter Username..." value="" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="selectSm" class=" form-control-label">User Level</label></div>
                <div class="col-12 col-md-9">
                    <select name="selectSm" id="SelectLm" class="form-control-sm form-control">
                        <option value="HR Manager">HR Manager</option>
                        <option value="Front Office Manager">Front Office Manager</option>
                        <option value="Restaurent Manager">Restaurent Manager</option>
                        <option value="Sales Manager">Sales Manager</option>
                        <option value="Accounts Manager">Accounts Manager</option>
                        <option value="Inventory Manager">Inventory Manager</option>
                        <option value="Housekeeping Manager">Housekeeping Manager</option>
                        <option value="Recreational Services Manager">Recreational Services Manager</option>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Password</label></div>
                <div class="col-12 col-md-9"><input type="password" id="hf-password" name="hf-password" placeholder="Enter Password..." class="form-control"></div>
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Create User
        </button>
    </div>
        </form>
    </div>
    
</div>
</body>
</html>