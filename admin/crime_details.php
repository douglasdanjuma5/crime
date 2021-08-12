
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Crime Details</title>
	<link rel="icon" href="images/logo.png">
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

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
								<h3>Crime Details</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<tbody>
										<?php $st='closed';
										$query=mysqli_query($con,"select tblcrimes.*,users.fullName as name,category.categoryName as catname from tblcrimes join users on users.id=tblcrimes.userId join category on category.id=tblcrimes.category where tblcrimes.crimeNumber='".$_GET['cid']."'");
										while($row=mysqli_fetch_array($query))
										{

										?>									
										<tr>
											<td><b>Crime Number</b></td>
											<td><?php echo htmlentities($row['crimeNumber']);?></td>
											<td><b> Name of Reporter </b></td>
											<td> <?php echo htmlentities($row['name']);?></td>
											<td><b>Reg Date</b></td>
											<td><?php echo htmlentities($row['regDate']);?>
											</td>
										</tr>

										<tr>
											<td><b>Category </b></td>
											<td><?php echo htmlentities($row['catname']);?></td>
											<td><b>SubCategory</b></td>
											<td> <?php echo htmlentities($row['subcategory']);?></td>
											<td><b>State</b></td>
											<td><?php echo htmlentities($row['state']);?>
											</td>
										</tr>
										<tr>
											<td ><b>Accused Name </b></td>
											<td ><?php echo htmlentities($row['accusedName']);?></td>
											<td ><b>Area Command</b></td>
											<td ><?php echo htmlentities($row['areaCommand']);?></td>
											<td colspan="2"></td>
										</tr>
										<tr>
											<td><b>Security Agency </b></td>
											<td><?php echo htmlentities($row['security']);?></td>
											<td><b>Crime Location</b></td>
											<td><?php echo htmlentities($row['crimeLocation']);?></td > 
											<td ><b>LGA</b></td>
											<td> <?php echo htmlentities($row['lga']);?></td>
											
										</tr>
										<tr>
											<td><b>Crime Details </b></td>
											<td colspan="5"> <?php echo htmlentities($row['crimeDetails']);?></td>
										</tr>
											</tr>
										<tr>
											<td><b>File(if any) </b></td>
											<td colspan="5"> <?php $cfile=$row['crimeFile'];
											if($cfile=="" || $cfile=="NULL")
											{
											echo "File NA";
											}
											else{?>
											<a href="../users/docs/<?php echo htmlentities($row['crimeFile']);?>" target="_blank"/> View File</a>
											<?php } ?></td>
											</tr>

											<tr>
											<td><b>Final Status</b></td>
											
											<td colspan="5"><?php if($row['status']=="")
											{ echo "Pending";
											} else {
										 echo htmlentities($row['status']);
										 }?></td>
											
										</tr>

										<?php $ret=mysqli_query($con,"select crimeremark.remark as remark,crimeremark.status as sstatus,crimeremark.remarkDate as rdate from crimeremark join tblcrimes on tblcrimes.crimeNumber=crimeremark.crimeNumber where crimeremark.crimeNumber='".$_GET['cid']."'");
										while($rw=mysqli_fetch_array($ret))
										{
										?>
										<tr>
										<td><b>Remark</b></td>
										<td colspan="5"><?php echo  htmlentities($rw['remark']); ?> <b>Remark Date :</b><?php echo  htmlentities($rw['rdate']); ?></td>
										</tr>

										<tr>
										<td><b>Status</b></td>
										<td colspan="5"><?php echo  htmlentities($rw['sstatus']); ?></td>
										</tr>
										<?php }?>
										<tr>
											<td><b>Action</b></td>
											
											<td> 
											<?php if($row['status']=="closed"){

												} else {?>
											<a href="javascript:void(0);" onClick="popUpWindow('http://localhost/online_crime/s_admin/updatecrime.php?cid=<?php echo htmlentities($row['crimeNumber']);?>');" title="Update order">
											 <button type="button" class="btn btn-primary">Take Action</button></td>
											</a><?php } ?></td>
											<td colspan="4"> 
											<a href="javascript:void(0);" onClick="popUpWindow('http://localhost/online_crime/s_admin/userprofile.php?uid=<?php echo htmlentities($row['userId']);?>');" title="Update order">
											 <button type="button" class="btn btn-primary">View User Detials</button></a></td>
											
										</tr>
										<?php  } ?>
										
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
</body>
<?php } ?>