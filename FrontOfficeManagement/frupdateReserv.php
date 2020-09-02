<html>
    <body>
            <div class="card">
                <div class="card-header">
                    <strong>Update Reservation</strong>
                                       
                </div>
                        <div class="card-body">
                                    
                                    <div class="card-body card-block">
                                        
                                        <div class="form-group">
                                            <label for="roomNo" class=" form-control-label">Room number</label>
                                            <input type="text" id="roomNo" class="form-control"><br/>
                                            <button type="submit" class="btn btn-secondary">&nbsp; Search</button>
                                        </div>
                                        <div class="form-group">
                                            <label for="reservationId" class=" form-control-label">Reservation ID</label>
                                            <input type="text" id="reservationId" class="form-control"><br/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="street" class=" form-control-label">Date</label>
                                            <input type="date" id="resdate" class="form-control">
                                        </div>
                                        
                                        
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="selectSm" class=" form-control-label">Room Type</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="selectSm" id="SelectLm" class="form-control-sm form-control">
                                                        <option value="0">Please select</option>
                                                        <option value="Deluxe">Deluxe</option>
                                                        <option value="Executive Suite">Executive Suite</option>
                                                        <option value="Presidential Suite">Presidential Suite</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        
                                        <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="paxcount" class=" form-control-label">Number of rooms</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                    
                                        </div>
                                        
                                        <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="paxcount" class=" form-control-label">Pax count</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                    
                                        </div>
                                        
                                        <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="paxcount" class=" form-control-label">Adults</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="col col-md-4">
                                                    <label for="paxcount" class=" form-control-label">Children</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                        </div>
                                        
                                        <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="paxcount" class=" form-control-label">Number of nights</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                    
                                        </div>
                                        
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="selectSm" class=" form-control-label">Meal Plan</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="selectSm" id="SelectLm" class="form-control-sm form-control">
                                                        <option value="0">Please select</option>
                                                        <option value="Deluxe">Full Board</option>
                                                        <option value="Executive Suite">Half Board</option>
                                                        <option value="Presidential Suite">Bed and Breakfast</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        
                                        <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="paxcount" class=" form-control-label">Room rate</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                    
                                        </div>
                                        
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Additional Needs</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="textarea-input" id="textarea-input" rows="9" class="form-control"></textarea>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="street" class=" form-control-label">Check-In</label>
                                            <input type="date" id="checkin" class="form-control">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="street" class=" form-control-label">Check-Out</label>
                                            <input type="date" id="checkin" class="form-control">
                                        </div>
                                        
                                        <div class="row form-group">
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Total Amount</label>
                                                    <input type="text" id="city" class="form-control">
                                                </div>
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
                                
                            
                     </div>
            </div> <!-- .card -->


</body>
</html>
