<html>
    <body>
        
        <div class="card">
                <div class="card-header">
                    <strong class="card-title">Banquet Availability</strong>
                </div>
            
            <?php
                echo "Date : ".date("Y/m/d")."<br>";
            ?>
            
            <div class="card-body card-block">
                <form action="frontofficeview.php?tab=calendar" method="post" class="form-horizontal">
                    
                   <div class="col-md-4">
                        <div class="feed-box text-center">
                            <section class="card">
                                <div class="card-body">
                                    
                                    <a href="#">
                                        <input type="image" src="../images/grandbanquet.jpg" alt="submit" width="225" height="200">
                                    </a>
                                    <h2>Grand Banquet Hall</h2>
                                    
                                </div>
                            </section>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="feed-box text-center">
                            <section class="card">
                                <div class="card-body">
                                    
                                    <a href="#">
                                        <input type="image" src="../images/river.jpg" alt="submit" width="225" height="200">
                                    </a>
                                    <h2>River Deck</h2>
                                    
                                </div>
                            </section>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="feed-box text-center">
                            <section class="card">
                                <div class="card-body">
                                    
                                    <a href="#">
                                        <input type="image" src="../images/flowercanopy.jpg" alt="submit" width="225" height="200">
                                      <!--  <img src="../images/flowercanopy.jpg" style="width:2250px; height:200px;" alt="" >-->
                                    </a>
                                    <h2>Garden Function</h2>
                                    
                                </div>
                            </section>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
        
        <?php
                $tb = isset($_GET['tab']) ? $_GET['tab'] : '';
                switch($tb) { //switch is just like a bunch of if()s
                    case 'calendar': // page2, if changePage has the value of page2
                    include('frbanquetcalendar.php'); //include page2.html
                    break;  //break, witch means stop
                } //end the switch
            ?>
        
    </body>
</html>