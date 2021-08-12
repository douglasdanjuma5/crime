<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['submit']))
{
	$fullname=$_POST['fullname'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$contactno=$_POST['contactno'];
	$status=1;
	$query=mysqli_query($con,"insert into users(fullName,userEmail,password,contactNo,status) values('$fullname','$email','$password','$contactno','$status')");
    $msg="Registration successfull.";
    { 
        header('location:manage-users.php');
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add New User</title>
	<link rel="icon" href="images/logo.png">
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
            <?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>New User Registration</h3>
							</div>
							    <div class="module-body">
                                    
									<?php if(isset($_POST['submit']))
                                    {?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
                                    <?php } ?>
			                        <form method="post" class="form-horizontal row-fluid"  >
                                                                         
                                            <div class="col-md-6">
                                            <div class="control-group">
                                            <label class="control-label" for="">Full Name</label>
                                            <input type="text" placeholder="Enter your full name"  name="fullname" class="span6 tip" required>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="">Email Address</label>
                                            <input type="text" placeholder="Enter your Email Address"  name="email" class="span6 tip" required>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="">Phone Number</label>
                                            <input type="text" placeholder="Enter your Phone Number"  name="contactno" class="span6 tip" required>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="">Password</label>
                                            <input type="password" placeholder="Enter your Password"  name="password" class="span6 tip" required>
                                        </div>
                                           
                                        </div>
                                    
												<button type="submit" name="submit" id="submit" class="btn btn-primary">Create</button>
											</div>
										</div>
									</form>
							</div>
						</div>
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>
<script src="assets/js/main.js"></script>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="scripts/datatables/jquery.dataTables.js"></script>
    <script src="assets/js/lga.min.js"></script>
    
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>