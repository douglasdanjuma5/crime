<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else {
  if(isset($_POST['update']))
  {
$crimenumber=$_GET['cid'];
$status=$_POST['status'];
$remark=$_POST['remark'];
$query=mysqli_query($con,"insert into crimeremark(crimeNumber,status,remark) values('$crimenumber','$status','$remark')");
$sql=mysqli_query($con,"update tblcrimes set status='$status' where crimeNumber='$crimenumber'");

echo "<script>alert('crime details updated successfully');</script>";

  }

 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html">
<html>
<head>
<meta http-equiv="Content-Type" content="t" />
<title>User Profile</title>
<link rel="icon" href="images/logo.png">
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updatecrime" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td  >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <tr height="50">
      <td><b>Crime Number</b></td>
      <td><?php echo htmlentities($_GET['cid']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Status</b></td>
      <td><select name="status" required="required">
      <option value="">Select Status</option>
      <option value="under investigation">Under Investigation</option>
    <option value="closed">Close Crime Case</option>
        
      </select></td>
    </tr>


      <tr height="50">
      <td><b>Remark</b></td>
      <td><textarea name="remark" cols="50" rows="10" required="required"></textarea></td>
    </tr>
    
        <tr height="50">
      <td>&nbsp;</td>
      <td><input type="submit" name="update" value="Submit"></td>
    </tr>

       <tr><td colspan="2">&nbsp;</td></tr>
    
    <tr>
  <td></td>
      <td >   
      <input name="Submit2" type="submit" class="txtbox4" value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>

</table>
 </form>
</div>

</body>
</html>

     <?php } ?>