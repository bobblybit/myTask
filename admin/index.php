<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=",.">
    <meta name="keywords" content="">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <title>Admin Dashboard</title>

  <?php include("links.php");?>
</head>

<body>


<!-- page-wrapper Start-->
<div class="page-wrapper">
 

    <!-- Page Body Start-->
    <div class="page-body-wrapper">
<div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Admin</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-8">
                                   <div class="col-md-8 col-md-offset-2">
                                  <iframe width="853" height="480" src="https://www.youtube.com" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                  </div>
                                    </div>

                                    <div class="col-xl-4">
                                            <div class="card o-hidden  widget-cards">
                            <div class="bg-secondary card-body">
                                <div class="media static-top-widget">
                                    <div class="media-body"><span class="m-0">11 June 2020</span>
                                        <h3 class="mb-0">03 :<span class="">1 0&nbsp&nbsp</span><span class="">4 2 PM</span></h3>
                                    </div>
                                    <div class="icons-widgets">
                                        edit
                                        <i data-feather="box"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                                        <div class="table-responsive map-table">
                                              

                                             
                                            <table class="table mb-0">
                                               
                                                <thead>
                                                   echo <tr>
                                                        <th>HEADING ONE</th>
                                                        <th></th>
                                                       <th> <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i>add</a>
                                                       </th>
                                                    </tr>
                                                </thead>
                                                    <?php
                                                require_once "connection.php";
                                                 // Attempt select query execution
                                                  $sql = "SELECT * FROM table_1";
                                                 if($result = mysqli_query($link, $sql)){
                                                   if(mysqli_num_rows($result) > 0){
                                                   echo "<thead>";
                                                    echo "<tr>";
                                                      echo "<th>ID</th>" ;
                                                      echo "<th>Title1</th>";
                                                      echo "<th>Title2</th>";
                                                    echo "<th>Title3</th>";  
                                                    echo "</tr>";
                                               echo "</thead>";
                                               echo "<tbody>";
                                                  while($row = mysqli_fetch_array($result)){
                                                    echo"<tr>";
                                                            echo "<td>".$row['id']."</td>";
                                                       echo "<td>".$row['title1']."</td>";
                                                            echo "<td>".$row['title2']."</td>";
                                                                 echo "<td>".$row['title3']."</td>";
                                                   
                                                    echo"</tr>";
                                             
                                                };
                                               echo "</tbody>";
                                            echo"</table>";
                                               mysqli_free_result($result);
                                         } else{
                                          echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                          }
                                      } else{
                                       echo "Oops! Something went wrong. Please try again later.";
                                      }
 
                                   // Close connection
                                    mysqli_close($link);
                                    ?>
                                   </div>



                                              <table class="table mb-0">


                                                <thead>
                                                    <tr>
                                                     <th>HEADING TWO</th>
                                                        <th></th>
                                                       <th>  <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i>edit</a> </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
 
                                            
                                                <tr>
                                                       <td>AAA</td>
                                                       <td>0000.00</td>
                                                       <td>CCC</td>
                                                      <td>0000.00</td>
                                                   
                                                   </tr>
                                               </tbody>
                                        
                                            </table>
                                              <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>HEADING THREE</th>
                                                        <th></th>
                                                       <th>Edit: icon </th>
                                                    </tr>
                                                </thead>
                                                   <thead>
                                                    <tr>
                                                         <th>TITLE4</th> 
                                                       <th>TITLE5</th>
                                                         <th>TITLE6</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Text Slider4</td>
                                                           <td>Text Slider5</td>
                                                               <td>Text Slider6</td>
                                                   
                                                    </tr>
                                                </tbody>
                                            </table> 

                                        </div>

                                    </div>

                                </div>
                          
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>
        <!-- Page Sidebar Start-->
    <!--     <div class="page-sidebar">
          
        </div>  -->
      
             
                      

        <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 footer-copyright">
                        <p class="mb-0">Copyright 2021 © TaskChallenge All rights reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <p class="pull-right mb-0">Design with<i class="fa fa-heart"></i></p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end-->
    </div>

</div>

<!-- latest jquery-->
<script src="../assets/js/jquery-3.3.1.min.js"></script>

<!-- Bootstrap js-->
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.js"></script>

<!-- feather icon js-->
<script src="../assets/js/icons/feather-icon/feather.min.js"></script>
<script src="../assets/js/icons/feather-icon/feather-icon.js"></script>

<!-- Sidebar jquery-->
<script src="../assets/js/sidebar-menu.js"></script>

<!--chartist js-->
<script src="../assets/js/chart/chartist/chartist.js"></script>


<!-- lazyload js-->
<script src="../assets/js/lazysizes.min.js"></script>

<!--copycode js-->
<script src="../assets/js/prism/prism.min.js"></script>
<script src="../assets/js/clipboard/clipboard.min.js"></script>
<script src="../assets/js/custom-card/custom-card.js"></script>

<!--counter js-->
<script src="../assets/js/counter/jquery.waypoints.min.js"></script>
<script src="../assets/js/counter/jquery.counterup.min.js"></script>
<script src="../assets/js/counter/counter-custom.js"></script>

<!--Customizer admin-->
<script src="../assets/js/admin-customizer.js"></script>

<!--map js-->
<script src="../assets/js/vector-map/jquery-jvectormap-2.0.2.min.js"></script>
<script src="../assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js"></script>

<!--apex chart js-->
<script src="../assets/js/chart/apex-chart/apex-chart.js"></script>
<script src="../assets/js/chart/apex-chart/stock-prices.js"></script>

<!--chartjs js-->
<script src="../assets/js/chart/flot-chart/excanvas.js"></script>
<script src="../assets/js/chart/flot-chart/jquery.flot.js"></script>
<script src="../assets/js/chart/flot-chart/jquery.flot.time.js"></script>
<script src="../assets/js/chart/flot-chart/jquery.flot.categories.js"></script>
<script src="../assets/js/chart/flot-chart/jquery.flot.stack.js"></script>
<script src="../assets/js/chart/flot-chart/jquery.flot.pie.js"></script>
<!--dashboard custom js-->
<script src="../assets/js/dashboard/default.js"></script>

<!--right sidebar js-->
<script src="../assets/js/chat-menu.js"></script>

<!--height equal js-->
<script src="../assets/js/equal-height.js"></script>

<!-- lazyload js-->
<script src="../assets/js/lazysizes.min.js"></script>

<!--script admin-->
<script src="../assets/js/admin-script.js"></script>

</body>
</html>
