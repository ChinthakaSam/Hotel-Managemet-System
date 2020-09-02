<html>
    <body>
        
        <div class="card">
            <div class="card-header">
                <strong>Banquet Reservation Payments</strong>
            </div>
        </div>
    
    <div class="card-body card-block">
        <form action="" method="post" class="form-horizontal">
            
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Payment ID</label>
                <input id="paymentid" name="resid" type="text" class="form-control" aria-required="true" aria-invalid="false">
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Reservation ID</label></div>
                <div class="col-12 col-md-9"><input type="text" id="hf-email" name="hf-email" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="selectSm" class=" form-control-label">Package</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="selectSm" id="SelectLm" class="form-control-sm form-control">
                        <option value="0">Please select</option>
                        <option value="Deluxe">Gold</option>
                        <option value="Executive Suite">Silver</option>
                        <option value="Presidential Suite">platinum</option>
                                                        
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-4">
                    <label for="adults" class=" form-control-label">Pax Count</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col col-md-4">
                    <label for="children" class=" form-control-label">Amount</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                    <div class="col col-md-4">
                        <label for="paxcount" class=" form-control-label">Additional Services Charges</label>
                        <input type="text" class="form-control">
                    </div>              
            </div>
            <div class="row form-group">
                    <div class="col col-md-4">
                        <label for="paxcount" class=" form-control-label">Total Amount</label>
                        <input type="text" class="form-control">
                    </div>              
            </div>
            
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="selectSm" class=" form-control-label">Status</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="selectSm" id="SelectLm" class="form-control-sm form-control">
                        <option value="0">Please select</option>
                        <option value="pending">Pending</option>
                        <option value="Paid">Paid</option>
                    </select>
                </div>
            </div>
            
        </form>
    </div>
        
        <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Confirmation..!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                   Data saved successfully..!
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
        
        
        <div class="card-footer">
               <!-- <button type="submit" class="btn btn-secondary">&nbsp; Submit</button> -->
                <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#staticModal">
                          Submit
                </button>
            </div>
    </body>
</html>