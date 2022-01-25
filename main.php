 <?php
 $connect = mysqli_connect("localhost", "root", "", "road_accident_hotspot");
 $query ="SELECT * FROM location";
 $result = mysqli_query($connect, $query);
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

    <!--Services Section-->
    <section class="services" id="services">
        <div class="max-width"><br><br><br><br>
            <h1><center>What you can do!</center></h1><br>
            <div class="serv-content">
                <div class="card">
                    <div class="box">
                        <a href="#"><i class="fa fa-globe" aria-hidden="true"></i></a>
                        <div class="text">Hover the Streets of Ohio! Find the ones that are Red zoned! Add the street to our database if you don't find them.</div>
                    </div>
                </div>

                <div class="card">
                    <div class="box">
                        <a href="dashboard.php"><i class="fa fa-motorcycle" aria-hidden="true"></i></a>
                        <div class="text">Find how many accidents your street has experienced! How many of them were affected? What are the causes for majority of the accidents there?</div>
                    </div>
                </div>

                <div class="card">
                    <div class="box">
                        <a href="finalpage.php"><i class="fa fa-road" aria-hidden="true"></i></a>
                        <div class="text">Well Well Well. Did you just eye witness an accident?Call the nearby health service from our feed!</div>
                    </div>
                </div>

            </div>
            <br><br>
        </div>
    </section>



           <br /><br />
           <div class="container">
             <br><br><br><br>

             <h2 class="title">Is your zone accident prone?</h2>

             <!--Datatables Jquery Plugin with Php MySql and Bootstrap-->

                <br />
                <div class="table-responsive">
                     <table id="userdata" class="table table-striped table-bordered">

                          <thead>
                               <tr>
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
                                    <td>'.$row["Street"].'</td>
                                    <td>'.$row["Pincode"].'</td>
                                    <td class="zone">'.$row["Zone"].'</td>
                               </tr>
                               ';
                          }
                          ?>
                     </table>
                </div>
                <br>
                <br>

                <h2 class="title">Couldn't find the location your looking for?</h2>
                <div class="wrapper">
    <form class="form-signin" method="post" action="addloc.php">
      <h2 class="form-signin-heading"><center>Add them to our database!</center></h2><br>
      <input type="text" class="form-control" name="LID" placeholder="Location ID (Ex: L-101)" required="" autofocus="" /> <br>
            <input type="text" class="form-control" name="Street" placeholder="Street" required="" autofocus="" />
    <br>
                  <input type="text" class="form-control" name="Pincode" placeholder="Pincode" required="" autofocus="" />
    <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit" >Proceed to Add!</button>
    </form>
  </div>
           </div>
      </body>
 </html>
 <script>
 $(document).ready(function(){
      $('#userdata').DataTable();
 });
 </script>
 <script src="js/script3.js" type="text/javascript"></script>
