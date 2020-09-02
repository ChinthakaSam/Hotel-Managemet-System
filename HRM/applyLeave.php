<html>
<body>
<div class="card">
    <div class="card-header">
        <strong>Remaining Leave Count</strong>
    </div>
    
    <div class="card-body card-block">
        <form action="" method="post" class="form-horizontal">
             <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Annual Leave</label></div>
                <div class="col-12 col-md-9"><input type="text" id="hf-password" name="hf-password" value="3" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Casual Leave</label></div>
                <div class="col-12 col-md-9"><input type="text" id="hf-password" name="hf-password" value="2" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Medical Leave</label></div>
                <div class="col-12 col-md-9"><input type="text" id="hf-password" name="hf-password" value="4" class="form-control"></div>
            </div>
    </form>
    </div>
    
</div>
<div class="card">
    <div class="card-header">
        <strong>Leave Application</strong>
    </div>
    
    <div class="card-body card-block">
        <form action="" method="post" class="form-horizontal">
             <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Leave Application Number</label></div>
                <div class="col-12 col-md-9"><input type="text" id="hf-password" name="hf-password" value="LA000000001" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Employee Name</label></div>
                <div class="col-12 col-md-9"><input type="text" id="hf-password" name="hf-password" value="Brian David" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Department</label></div>
                <div class="col-12 col-md-9"><input type="text" id="hf-password" name="hf-password" value="HR Department" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Leave Type</label></div>
                <div class="col-12 col-md-9">
                    <select name="selectSm" id="SelectLm" class="form-control-sm form-control">
                        <option value="Annual Leave">Annual Leave</option>
                        <option value="Casual Leave">Casual Leave</option>
                        <option value="Medical Leave">Medical Leave</option>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Starting Date</label></div>
                <div class="col-12 col-md-9"><input type="date" id="hf-password" name="hf-password" value="" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Ending Date</label></div>
                <div class="col-12 col-md-9"><input type="date" id="hf-password" name="hf-password" value="" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Reason</label></div>
                 <div class="col-12 col-md-9"><textarea id="hf-password" name="hf-password" class="form-control"></textarea></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Approved Status</label></div>
                <div class="col-12 col-md-9">
                    <select name="selectSm" id="SelectLm" class="form-control-sm form-control" disabled>
                        <option value="Pending">Pending</option>
                        <option value="Rejected">Rejected</option>
                        <option value="Approved">Approved</option>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
            </div>
    </form>
    </div>
    
</div>
</body>
</html>