<html>
    <head>
        <link rel="stylesheet" href="../assets/css/calendarStyle.css">
    </head>
    <body>
        
        <div class="card">
                <div class="card-header">
                    <strong class="card-title">Banquet Availability - Calendar</strong>
                </div>
            
            
            
            <div class="card-body card-block">
                <form action="frontofficeview.php?tab=banquetReservation" method="post" class="form-horizontal">
                   
                    <button type="submit" class="btn btn-outline-secondary">&nbsp; Add Reservation</button>
                       <!-- <i class="fa fa-dot-circle-o"></i> Add Reservation
                    </button>-->
                    
                   <div id="calendar"></div>
                        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script> 
                    
                     
                    
                </form>
            </div>
        </div>
        
        <?php
                $tb = isset($_GET['tab']) ? $_GET['tab'] : '';
                switch($tb) { //switch is just like a bunch of if()s
                    case 'banquetReservation': // page2, if changePage has the value of page2
                    include('frbanquetReserv.php'); //include page2.html
                    break;  //break, witch means stop
                } //end the switch
            ?>
        
        <script src="../assets/js/calendar.js"></script>
        
    </body>
</html>