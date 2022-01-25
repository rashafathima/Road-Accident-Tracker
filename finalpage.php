<?php
$connection = mysqli_connect('localhost', 'root', '', 'road_accident_hotspot');
$result = mysqli_query($connection, "SELECT Vehicle_Type, count(*) as number FROM victim GROUP BY Vehicle_type;");
$query2 = "SELECT COUNT(VID) AS AGE_GROUP, COUNT(CASE WHEN Victim_age BETWEEN 31 AND 45 THEN VID END) AS 31TO45, COUNT(CASE WHEN Victim_age BETWEEN 46 AND 70 THEN VID END) AS 46TO70,  COUNT(CASE WHEN Victim_age BETWEEN 18 AND 30 THEN VID END) AS 18TO30 FROM victim;";
$result2 = mysqli_query($connection, $query2);

//if($result){
//    echo "CONNECTED";
//}
?>
<!DOCTYPE html>
<html>
     <head>
          <title></title>
          <meta charset="UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to fit=no">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>


          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
          <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
          <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

          <link rel="stylesheet" type="text/css" href="css/location.css">

          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
              google.charts.load('current', {'packages':['bar']});
              google.charts.setOnLoadCallback(drawChart);
              function drawChart() {
                  var data = google.visualization.arrayToDataTable([
                      ['Vehicle Type', 'Accidents'],

                      <?php

                          if(mysqli_num_rows($result)> 0){

                              while($row = mysqli_fetch_array($result)){

                                  echo "['".$row['Vehicle_Type']."', '".$row['number']."'],";

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
           google.charts.load('current', {'packages':['bar']});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart()
          {
               var data = google.visualization.arrayToDataTable([
                         ['AGE GROUP', '31TO45', '46TO70', '18TO30'],
                         <?php
                         while($row = mysqli_fetch_array($result2))
                         {
                              echo "['".$row['AGE_GROUP']."', '".$row['31TO45']."', '".$row['46TO70']."', '".$row['18TO30']."'],";
                         }
                         ?>
                    ]);
               var options = {
                     //is3D:true,
                     bars: 'horizontal'
                    };
               var chart = new google.charts.Bar(document.getElementById('barchart_material'));
               chart.draw(data, google.charts.Bar.convertOptions(options),{fontName:'"Raleway", sans-serif'});
          }
          </script>




     </head>
     <style media="screen">
@import url('https://fonts.googleapis.com/css?family=Raleway');
.wrapper {
margin-top: 80px;
margin-bottom: 80px;
font-family: "Raleway", sans-serif;
}

.form-signin {
max-width: 500px;
padding: 15px 35px 45px;
margin: 0 auto;
background-color: #fff;
border: 1px solid rgba(0,0,0,0.1);
border-radius: 2em;
}

.form-signin-heading{
 margin-bottom: 30px;
}

.form-control {
 position: relative;
 font-size: 16px;
 height: 45px;
 padding: 10px;
 box-sizing: border-box;
 border-radius: 1em;

 &:focus {
   z-index: 2;
 }
}

input[type="text"] {
 margin-bottom: -1px;
}
}
     </style>
     <body>
<!--nav bar-->
<nav class="navbar">
       <div class="max-width">
           <div class="logo"><i class="fa fa-car" aria-hidden="true"></i><a href="#"><span>Accident Tracker</span></a></div>
           <ul class="menu">
               <li><a href="">LogOut</a></li>

           </ul>
           <div class="menu-btn">
               <i class="fas fa-bars"></i>
           </div>
       </div>
   </nav>
   <br><br><br><br><br>

          <br /><br />
          <div class="container">
            <br><br><br><br>

            <h2 class="title">Did you just eye Witness an accident?</h2>

            <!--Datatables Jquery Plugin with Php MySql and Bootstrap-->

               <br />
               <div class="table-responsive">
                    <table id="userdata" class="table table-striped table-bordered">

                         <thead>
                              <tr>
                                   <th>Hospital</th>
                                   <th>Pincode</th>
                                   <th>Address</th>
                                   <th>Emergency Number</th>
                              </tr>
                         </thead>
                         <tbody>
                                     <tr>
                                         <td>Cleveland</td>
                                         <td>43973</td>
                                         <td>Cadiz Rd</td>
                                         <td>+12163547758 </td>
                                     </tr>
                                     <tr>
                                       <td>City Hospital</td>
                                       <td>	45424</td>
                                       <td>I-70 E</td>
                                       <td>+12163548862 </td>
                                     <tr>
                                         <td>Maria Hospital</td>
                                         <td>43224</td>
                                         <td>North Fwy S</td>
                                         <td>+12163548866</td>
                                     </tr>
                                     <tr>
                                         <td>Medstar Speciality Hospital</td>
                                         <td>43017</td>
                                         <td>Outerbelt E</td>
                                         <td>+12163548868</td>
                                     </tr>
                                     <tr>
                                         <td>OhioHealth Mansfield Hospital</td>
                                         <td>45176</td>
                                         <td>State Route 32</td>
                                         <td>+12163548899</td>
                                     </tr>
                                     <tr>
                                         <td>Aultman Hospital</td>
                                         <td>45223</td>
                                         <td>I-75 S</td>
                                         <td>+12163548890</td>
                                     </tr>
                                   </tbody>
                    </table>
               </div>
               <br>
               <br>

               <h2 class="title">So the location on our database doesn't exist in real life?!</h2>
               <div class="wrapper">
   <form class="form-signin" method="post" action="deleteloc.php">
     <h2 class="form-signin-heading"><center>Ask Our team to remove it ASAP!</center></h2><br>
           <input type="text" class="form-control" name="Street" placeholder="Street" required="" autofocus="" />
   <br>
                 <input type="text" class="form-control" name="Pincode" placeholder="Pincode" required="" autofocus="" />
   <br>
     <button class="btn btn-lg btn-primary btn-block" name="delete" type="submit" >Request for Deletion!</button>
   </form>
 </div>
          </div>







          <center>
          <div class="container">
          <h2 class="title">Real Time Insights of Total Accidents with respect to the vehicle type</h2>
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
               <h2 class="title" align="center">Real Time Insights of Accident trends among Different Age Groups</h2>
                </div>
              </div>
               <br />
<div id="barchart_material" style="width: 900px; height: 300px;"></div>
          </center>
<br><br><br>

     </body>
</html>
<script>
$(document).ready(function(){
     $('#userdata').DataTable();
});
</script>
<script src="js/script3.js" type="text/javascript"></script>
