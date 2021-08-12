
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
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Super Admin Dashboard</title>
	<link rel="icon" href="images/logo.png">
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

<style>
body, table, input, select, textarea {

}


.graph {
	margin-bottom:1em;
  font:normal 100%/150% arial,helvetica,sans-serif;
}

.graph caption {
	font:bold 150%/120% arial,helvetica,sans-serif;
	padding-bottom:0.33em;
}



@supports (display:grid) {

	@media (min-width:32em) {

		.graph {
			display:block;
      width:600px;
      height:300px;
		}

		.graph caption {
			display:block;
		}

		.graph thead {
			display:none;
		}

		.graph tbody {
			position:relative;
			display:grid;
			grid-template-columns:repeat(auto-fit, minmax(2em, 1fr));
			column-gap:8%;
			align-items:end;
			height:100%;
			margin:3em 0 1em 2.8em;
			padding:0 1em;
			border-bottom:2px solid rgba(0,0,0,0.5);
			background:repeating-linear-gradient(
				180deg,
				rgba(170,170,170,0.7) 0,
				rgba(170,170,170,0.7) 1px,
				transparent 1px,
				transparent 20%
			);
		}

		.graph tbody:before,
		.graph tbody:after {
			position:absolute;
			left:-3.2em;
			width:2.8em;
			text-align:right;
			font:bold 80%/120% arial,helvetica,sans-serif;
		}

		.graph tbody:before {
			content:"100%";
			top:-0.6em;
		}

		.graph tbody:after {
			content:"0%";
			bottom:-0.6em;
		}

		.graph tr {
			position:relative;
			display:block;
		}

		.graph tr:hover {
			z-index:999;
		}

		.graph th,
		.graph td {
			display:block;
			text-align:center;
		}

		.graph tbody th {
			position:absolute;
			top:-3em;
			left:0;
			width:100%;
			font-weight:normal;
			text-align:center;
      		white-space:nowrap;
			text-indent:0;
			/* transform:rotate(-45deg); */
		}

		.graph tbody th:after {
			content:"";
		}

		.graph td {
			width:100%;
			height:100%;
			background:#F63;
			border-radius:0.5em 0.5em 0 0;
			transition:background 0.5s;
		}

		.graph tr:hover td {
			opacity:0.7;
		}

		.graph td span {
			overflow:hidden;
			position:absolute;
			left:50%;
			top:50%;
			width:0;
			padding:0.5em 0;
			margin:-1em 0 0;
			font:normal 85%/120% arial,helvetica,sans-serif;
/* 			background:white; */
/* 			box-shadow:0 0 0.25em rgba(0,0,0,0.6); */
			font-weight:bold;
			opacity:0;
			transition:opacity 0.5s;
      color:white;
		}

		.toggleGraph:checked + table td span,
		.graph tr:hover td span {
			width:4em;
			margin-left:-2em; /* 1/2 the declared width */
			opacity:1;
		}



    


	} /* min-width:32em */

} /* grid only */
</style>
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
									<h3>Crime Chart</h3>
								</div>
								<div class="module-body">
								<table class="graph">
								<tbody>
								<tr style="height:80%">
									<?php
										$rt = mysqli_query($con,"SELECT * FROM tblcrimes where status is null");
										$num1 = mysqli_num_rows($rt);
										{?>
										<?php } ?>
										<th scope="row">Pending Crimes</th>
										<td><?php echo htmlentities($num1); $num1 = mysqli_num_rows($rt);?></td>
								</tr>
								<tr style="height:50%">
										<?php 
										$status="under investigation";                   
										$rt = mysqli_query($con,"SELECT * FROM tblcrimes where status='$status'");
										$num1 = mysqli_num_rows($rt);
										{?>
		
										<?php } ?>
										<th scope="row">Under Investigation</th>
										<td><?php echo htmlentities($num1); ?></td>
								</tr>
								
								<tr style="height:30%">
										<?php 
											$status="closed";                   
										$rt = mysqli_query($con,"SELECT * FROM tblcrimes where status='$status'");
										$num1 = mysqli_num_rows($rt);
										{?>
										<?php } ?>
										<th scope="row">Crime Case Close</th>
										<td><?php echo htmlentities($num1); ?></td>
								</tr>


						
					</tbody>
				</table>
				

		</div>
	</div>

	
	
</div><!--/.content-->
</div><!--/.span9-->
</div>
</div><!--/.container-->
</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>