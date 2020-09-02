<html>
    <body>
        
        <div class="card">
                <div class="card-header">
                    <strong class="card-title">Restaurant Table Reservation</strong>
                </div>
            
          
            <div class="card-body card-block">
                <form action="R&B_View.php?tab=OutSide" method="post" class="form-horizontal">
                    
                   <div class="col-md-4">
                        <div class="feed-box text-center">
                            <section class="card">
                                <div class="card-body">
                                    
                                    <a href="#">
                                        <input type="image" src="../images/O1.jpg" alt="submit" width="225" height="200">
                                    </a>
                                    <h2>OutSide Tables</h2>
                                     <?php
                $tb = isset($_GET['tab']) ? $_GET['tab'] : '';
                switch($tb) { //switch is just like a bunch of if()s
                    case 'OutSide': // page2, if changePage has the value of page2
                    include('R&B_OutSide.php'); //include page2.html
                    break;  //break, witch means stop
                } //end the switch
            ?>
        
                                </div>
                            </section>
                        </div>
                    </div>
             
        
                    
                    <div class="col-md-4">
                        <div class="feed-box text-center">
                            <section class="card">
                                <div class="card-body">
                                    
                                    <a href="#">
                                        <input type="image" src="../images/In2.jpg" alt="submit" width="225" height="200">
                                    </a>
                                    <h2>InSide Tables</h2>
                                    
                                </div>
                            </section>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="feed-box text-center">
                            <section class="card">
                                <div class="card-body">
                                    
                                    <a href="#">
                                        <input type="image" src="../images/Ri.jpg" alt="submit" width="225" height="200">
                                      <!--  <img src="../images/flowercanopy.jpg" style="width:2250px; height:200px;" alt="" >-->
                                    </a>
                                    <h2>RiverSide Tables</h2>
                                    
                                </div>
                            </section>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
        
        
    </body>
</html>