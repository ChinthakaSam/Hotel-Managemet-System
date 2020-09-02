<html>
    <head>
        
    </head>
    
    <body>
        
        <script type="text/javascript">
            function myFunction() {
                var txt;
                if (confirm("Press a button!")) {
                    txt = "You pressed OK!";
                } else {
                    txt = "You pressed Cancel!";
                }
            }
        </script>
        
        <div class="card">
        <div class="card-body card-block">
                <form action="frontofficeview.php?tab=roomReservation" method="post" class="form-horizontal">
        <div class="card-body card-block">
            <div class="card-header">
                    <strong>Payments</strong>
                                       
                </div>
            
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Payment ID</label>
                <input id="paymentid" name="resid" type="text" class="form-control" aria-required="true" aria-invalid="false">
            </div>
            <div class="form-group">
                <label for="roomNo" class=" form-control-label">Room number</label>
                <input type="text" id="roomNo" class="form-control">
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Customer ID</label>
                <input id="custid" name="resid" type="text" class="form-control" aria-required="true" aria-invalid="false">
            </div>
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Customer Name</label>
                <input id="custname" name="resid" type="text" class="form-control" aria-required="true" aria-invalid="false">
            </div>
                
           
            
        </div>
        
        <div class="card-body card-block">
            
            <div class="row form-group">
                <div class="col col-sm-5"><label for="input-normal" class=" form-control-label">Room Rate</label></div>
                <div class="col col-sm-6"><input type="text" id="input-normal" name="input-normal" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-sm-5"><label for="input-normal" class=" form-control-label">Restaurent</label></div>
                <div class="col col-sm-6"><input type="text" id="input-normal" name="input-normal" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-sm-5"><label for="input-normal" class=" form-control-label">Bar</label></div>
                <div class="col col-sm-6"><input type="text" id="input-normal" name="input-normal" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-sm-5"><label for="input-normal" class=" form-control-label">Recreational Services</label></div>
                <div class="col col-sm-6"><input type="text" id="input-normal" name="input-normal" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-sm-5"><label for="input-normal" class=" form-control-label">Mini Bar</label></div>
                <div class="col col-sm-6"><input type="text" id="input-normal" name="input-normal" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-sm-5"><label for="input-normal" class=" form-control-label">Other</label></div>
                <div class="col col-sm-6"><input type="text" id="input-normal" name="input-normal" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-sm-5"><label for="input-normal" class=" form-control-label">Total Amount</label></div>
                <div class="col col-sm-6"><input type="text" id="input-normal" name="input-normal" class="form-control"></div>
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
            
        </div>
                    
            </form>
        </div>
        </div>
    </body>
</html>