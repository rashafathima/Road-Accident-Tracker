 <?php
 $connect = mysqli_connect("localhost", "root", "", "road_accident_hotspot");
 $query ="SELECT * FROM location";
 $result = mysqli_query($connect, $query);
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Webslesson Tutorial | Datatables Jquery Plugin with Php MySql and Bootstrap</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
           <link rel="stylesheet" type="text/css" href="css/location.css">
      </head>
      <body>
           <br /><br />
           <div class="container">

             <!--Datatables Jquery Plugin with Php MySql and Bootstrap-->
                <h3 align="center"></h3>
                <br />
                <div class="table-responsive">
                     <table id="userdata" class="table table-striped table-bordered">
                          <thead>
                               <tr>
                                    <td>LID</td>
                                    <td>Street</td>
                                    <td>Pincode</td>
                                    <td>Zone</td>
                               </tr>
                          </thead>
                          <?php
                          while($row = mysqli_fetch_array($result))
                          {
                               echo '
                               <tr>
                                    <td>'.$row["LID"].'</td>
                                    <td>'.$row["Street"].'</td>
                                    <td>'.$row["Pincode"].'</td>
                                    <td>'.$row["Zone"].'</td>
                               </tr>
                               ';
                          }
                          ?>
                     </table>
                </div>
           </div>
      </body>
 </html>
 <script>
 $(document).ready(function(){
      $('#userdata').DataTable();
 });
 </script>
