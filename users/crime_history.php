<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="">

    <title>Crime History</title>
    <link rel="icon" href="images/logo.png">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link type="text/css" href="css/theme.css" rel="stylesheet">
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <link href="assets/css/table-responsive.css" rel="stylesheet">

  </head>

  <body>
  <section id="container" >
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>

      <section id="main-content">
          <section class="wrapper">
          	<h2>Your Crime Report Hstory</h2>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                          <!-- <section id="unseen"> -->
                            <table class="datatable-1 table table-bordered table-striped	 display" width="100%">
                              <thead>
                              <tr style="text-align: center">
                                  <th style="text-align: center">Crime Number</th>
                                  <th style="text-align: center">Reg Date</th>
                                  <th style="text-align: center">last Updation date</th>
                                  <th style="text-align: center">Agency</th>
                                  <th style="text-align: center">Accused</th>
                                  <th style="text-align: center">State</th>
                                  <th style="text-align: center">LGA</th>
                                  <th style="text-align: center">Status</th>
                                  <th style="text-align: center">Action</th>
                                  
                              </tr>
                              </thead>
                              <tbody>
                              
                              <?php $query=mysqli_query($con,"select * from tblcrimes where userId='".$_SESSION['id']."'");
                            
                            while($row=mysqli_fetch_array($query))
                            {
                              ?>
                              <tr>
                                                         
                                  <td align="center"><?php echo htmlentities($row['crimeNumber']);?></td>
                                  <td align="center"><?php echo htmlentities($row['regDate']);?></td>
                                 <td align="center"><?php echo  htmlentities($row['lastUpdationDate']);?></td>
                                 <td align="center"><?php echo htmlentities($row['security']);?></td>
                                 <td align="center"><?php echo htmlentities($row['accusedName']);?></td>
                                 <td align="center"><?php echo htmlentities($row['state']);?></td>
                                 <td align="center"><?php echo htmlentities($row['lga']);?></td>
                                  <td align="center"><?php 
                                    $status=$row['status'];
                                    if($status=="" or $status=="NULL")
                                    { ?>
                                      <button type="button" class="btn btn-theme04">Pending</button>
                                   <?php }
                                  if($status=="under investigation"){ ?>
                                  <button type="button" class="btn btn-warning">Under Investigation</button>
                                  <?php }
                                  if($status=="closed") {
                                  ?>
                                  <button type="button" class="btn btn-success">Closed Crime Case</button>
                                  <?php } ?>
                                   <td align="center">
                                   <a href="crime_details.php?cid=<?php echo htmlentities($row['crimeNumber']);?>">
                                  <button type="button" class="btn btn-primary">View Details</button></a>
                                   </td>
                                </tr>
                              <?php } ?>
                            
                              </tbody>
                          </table>
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
		</section><! --/wrapper -->
  </section><!-- /MAIN CONTENT -->
<?php include("includes/footer.php");?>
  </section>
  <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<!-- <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script> -->
	<!-- <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script> -->
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="scripts/datatables/jquery.dataTables.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    

  </body>
</html>
<?php } ?>
