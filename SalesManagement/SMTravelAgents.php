<html>
<body>

                                <div class="card-footer">
                                <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#scrollmodal">
                          View All Agents
                      </button>
                                    
                                    <div class ="card-body card-block">
                                        <form action="salesView.php?tab=addagents1" method="post" class="form-horizontal"></form>
                                        
                                         <button type="submit" class="btn btn-secondary" data-dismiss="modal">Add Agents</button>
                                    </div>
                                           
    </div>
    
    <div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="scrollmodalLabel"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                 <div class="card">
                        <div class="card-header">
                            <strong class="card-title">All agents details</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th scope="col">Agent Id</th>
                                  <th scope="col">Agent Name</th>
                                  <th scope="col">Address</th>
                                    <th scope="col">Phone Number</th>                                
                                </tr>
                              </thead>
                            
                              <tbody>
                                <tr>
                                  <th scope="row"></th>
                                  <td><input type="text" name="tx1"></td>
                                  <td><input type="text" name="tx2"></td>
                                    <td><input type="text" name="tx1"></td>
                                  
                                </tr>
                               <tr>
                                  <th scope="row"></th>
                                  <td><input type="text" name="tx1"></td>
                                  <td><input type="text" name="tx2"></td>
                                    <td><input type="text" name="tx1"></td>
                                </tr>
                                  
                              </tbody>
                            </table>
                            
                   </div>     
                       
            </div> 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                                
                            </div>
                        </div>
                    </div>
                                   </div>
                                    
    
                    
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Travel Agents</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th scope="col">Agent Id</th>
                                  <th scope="col">Agent Name</th>
                                  <th scope="col">Address</th>
								  <th scope="col">Phone Number</th>
								  <th scope="col">Total Nights</th>
								  <th scope="col">#</th>
                                </tr>
                              </thead>
                            
                              <tbody>
                                <tr>
                                  <th scope="row"></th>
                                  <td><input type="text" name="tx1"></td>
                                  <td><input type="text" name="tx2"></td>
								  <td><input type="text" name="tx1"></td>
                                  <td><input type="text" name="tx2"></td>
								  <td><input type="button" value="update" name="btn3"></td>
                                  </tr>
                                  
								  <tr>
                                  <th scope="row"></th>
                                  <td><input type="text" name="tx1"></td>
                                  <td><input type="text" name="tx2"></td>
								  <td><input type="text" name="tx1"></td>
                                  <td><input type="text" name="tx2"></td>
								  <td><input type="button" value="update" name="btn3"></td>
                                  </tr>
								  
								  <tr>
                                  <th scope="row"></th>
                                  <td><input type="text" name="tx1"></td>
                                  <td><input type="text" name="tx2"></td>
								  <td><input type="text" name="tx1"></td>
                                  <td><input type="text" name="tx2"></td>
								  <td><input type="button" value="update" name="btn3"></td>
                                  </tr>
                              </tbody>
                            </table>
							
                        </div>
    </div> 
    
     <?php
                $tb = isset($_GET['tab']) ? $_GET['tab'] : '';
                switch($tb) {
                    case 'addagents1':
                    include('SMAddTravelAgents.php'); //include page2.html
                    break;  //break, witch means st  *//*-  

                } //end the switch
            ?>
   
</body>
</html>