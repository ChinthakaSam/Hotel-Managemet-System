<?php
require_once 'core/init.php';

$user = new User();

// var_dump(Token::check(Input::get('token')));
if(!$user->isLoggedIn()){
    Redirect::to('../SystemAdministration/login.php');
}
$dbhandle = new mysqli('localhost','root','','dbhms');
echo $dbhandle->connect_error;

$query = "SELECT gender,count(*) as number FROM employee GROUP BY gender";
$res = $dbhandle->query($query);

//$cd = DB::getInstance()->query("SELECT gender,count(*) as number FROM employee GROUP BY gender");
?>
<!DOCTYPE html>
<html>
  <head>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['gender', 'number'],
         	<?php
         		/*$data = array();
				foreach ($cd->results() as $row) {
					$data[] = json_encode($row);
				}*/
				while($row = $res->fetch_assoc()){
					echo "['".$row['gender']."',".$row['number']."],";
				}
         	?>
        ]);

        var options = {
          title: 'Gender Pecentages',
          chartArea : {left:100,top:70,width:'100%',height:'80%'}
        };

        var chart_area = document.getElementById('piechart');
        var chart = new google.visualization.PieChart(chart_area);

        google.visualization.events.addListener(chart,'ready',function(){
          chart_area.innerHTML = '<img src = "' + chart.getImageURI() + '" class="img-resposive">';
        });
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="testing" style="padding-left: 350px; background-color: white;"  class="card-body card-block">
      <br>
      <b><?php echo 'Date : '.date('Y-m-d H:m:s'); ?></b>
      <br>
        <div id="piechart" style="width: 900px; height: 500px;"></div>
        <br>
    </div>
        <div>
          <form method="post" id="make_pdf" action="create_pdf.php">
            <input type="hidden" name="hidden_html" id="hidden_html" />
           <div class="card-footer" style="float: right;">
                <button type="button" name="create_pdf" id="create_pdf" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Craete PDF
        </button>
    </div>
          </form>
        </div>
    
  </body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    $('#create_pdf').click(function(){
      $('#hidden_html').val($('#testing').html());
      $('#make_pdf').submit();
    });
  });
</script>