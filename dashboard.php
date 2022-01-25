<?php
$connection = mysqli_connect('localhost', 'root', '', 'road_accident_hotspot');
$result = mysqli_query($connection, "SELECT Severity, count(Reasons) as number FROM accidents GROUP BY Severity");
$query2 = "SELECT Reasons, count(*) as number FROM accidents GROUP BY Reasons";
$result2 = mysqli_query($connection, $query2);
$query3 = "SELECT COUNT(AID) as acc FROM accidents;";
$result3 = mysqli_query($connection, $query3);
$query4 = "SELECT SUM(Severity) as sev FROM accidents;";
$result4 = mysqli_query($connection, $query4);
$query5 = "SELECT B.Street, B.Pincode, B.Zone, A.Severity, A.Reasons FROM accidents A, location B WHERE A.LID=B.LID;";
$result5 = mysqli_query($connection, $query5);


//if($result){
//    echo "CONNECTED";
//}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/chart.css">
    <meta charset="UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to fit=no">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />









    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Severity', 'Accidents'],

                <?php

                    if(mysqli_num_rows($result)> 0){

                        while($row = mysqli_fetch_array($result)){

                            echo "['".$row['Severity']."', '".$row['number']."'],";

                        }
                    }
                ?>
            ]);
            var options = {
                chart: {
                    width: 600,
                    height: 400,
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options),{fontName:'Roboto'});
        }
    </script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart()
    {
         var data = google.visualization.arrayToDataTable([
                   ['Reasons', 'Number'],
                   <?php
                   while($row = mysqli_fetch_array($result2))
                   {
                        echo "['".$row["Reasons"]."', ".$row["number"]."],";
                   }
                   ?>
              ]);
         var options = {
               //is3D:true,
               pieHole: 0.4
              };
         var chart = new google.visualization.PieChart(document.getElementById('piechart'));
         chart.draw(data, options,{fontName:'"Raleway", sans-serif'});
    }
    </script>
</head>
<body>
  <nav class="navbar">
          <div class="max-width">
              <div class="logo"><i class="fa fa-car" aria-hidden="true"></i><a><span>Accident Tracker</span></a></div>
              <ul class="menu">
                  <li><a href="">LogOut</a></li>

              </ul>
              <div class="menu-btn">
                  <i class="fas fa-bars"></i>
              </div>
          </div>

      </nav>


      <div class="max-width"><br>
          <div class="container">
            <br>
        <h2 class="title" align="center">Number of Accidents Occured</h2>
        <h1 align="center">
          <?php

              if(mysqli_num_rows($result3)> 0){

                  while($row = mysqli_fetch_array($result3)){

                      echo "".$row['acc']."";

                  }
              }
          ?>


        </h1>
        <center><h2 class="title" align="center">Number of Severities Recorded</h2></center>
        <center><h1 align="center">
          <?php

              if(mysqli_num_rows($result4)> 0){

                  while($row = mysqli_fetch_array($result4)){

                      echo "".$row['sev']."";

                  }
              }
          ?>


        </h1>
</center>
<br>
<br>
    </div>


<center>
<div class="container">
<h2 class="title">Real Time Insights of Total Accidents grouped by number of Severities</h2>
</div>
</center>

<center>
  <div class="max-width"><br><br>
      <div class="container">

</div>
<center><div id="columnchart_material" style="width: 500px; height: 500px"></div></center>
</center>

<center>
<div>
      <div class="container">
     <h2 class="title" align="center">Real Time Insights of Distribution of Accidents caused by common Reasons</h2>
      </div>
    </div>
     <br />
     <div align="center" id="piechart" style="width: 900px; height: 500px;"></div>
</center>



             <!--Datatables Jquery Plugin with Php MySql and Bootstrap-->

                <br />
                <div class="table-responsive">
                     <table id="userdata" class="table table-striped table-bordered">

                          <thead>
                               <tr>
                                    <td>Street</td>
                                    <td>Pincode</td>
                                    <td>Zone</td>
                                    <td>Severity</td>
                                    <td>Reasons</td>
                               </tr>
                          </thead>
                          <?php
                          while($row = mysqli_fetch_array($result5))
                          {
                               echo '
                               <tr>
                                    <td>'.$row["Street"].'</td>
                                    <td>'.$row["Pincode"].'</td>
                                    <td class="zone">'.$row["Zone"].'</td>
                                    <td>'.$row["Severity"].'</td>
                                    <td>'.$row["Reasons"].'</td>


                               </tr>
                               ';
                          }
                          ?>
                     </table>
                </div>
                <br>
                <br>




</div>

</body>
</html>
<script>
$(document).ready(function(){
     $('#userdata').DataTable();
});
</script>
<script src="js/script3.js" type="text/javascript"></script>
