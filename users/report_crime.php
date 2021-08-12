<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$uid=$_SESSION['id'];
$category=$_POST['category'];
$subcat=$_POST['subcategory'];
$states=$_POST['states'];
$security=$_POST['security'];
$lga=$_POST['lga'];
$crimelocation=$_POST['crimelocation'];
$accusedname=$_POST['accusedname'];
$areacommand=$_POST['areacommand'];
$crimedetials=$_POST['crimedetails'];
$compfile=$_FILES["compfile"]["name"];
move_uploaded_file($_FILES["compfile"]["tmp_name"],"docs/".$_FILES["compfile"]["name"]);
$query=mysqli_query($con,"insert into tblcrimes(userId,category,subcategory,state,security,lga,crimeLocation,accusedName,areaCommand,crimeDetails,crimeFile) values('$uid','$category','$subcat','$states','$security','$lga','$crimelocation','$accusedname','$areacommand','$crimedetials','$compfile')");
// code for show crime number
$sql=mysqli_query($con,"select crimeNumber from tblcrimes  order by crimeNumber desc limit 1");
while($row=mysqli_fetch_array($sql))
{
 $cmpn=$row['crimeNumber'];
}
$complainno=$cmpn;
echo '<script> alert("Your crime report has been successfully filled and your crime number is  "+"'.$complainno.'")</script>';
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="">

    <title>Report Crime</title>
    <link rel="icon" href="images/logo.png">
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script>
    function getCat(val) {
  //alert('val');

  $.ajax({
  type: "POST",
  url: "getsubcat.php",
  data:'catid='+val,
  success: function(data){
    $("#subcategory").html(data);
    
  }
  });
  }
  </script>
  
  </head>

  <body>

<section id="container" >
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>
<section id="main-content">
    <section class="wrapper">
      <h2>Report Crime</h2>
      
      <!-- BASIC FORM ELELEMNTS -->
      <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
              

                <?php if($successmsg)
                {?>
                <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>Well done!</b> <?php echo htmlentities($successmsg);?></div>
                <?php }?>

              <?php if($errormsg)
                {?>
                <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?></div>
                <?php }?>

                <form class="form-horizontal style-form" method="post" name="crime" enctype="multipart/form-data" >

          <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Category of Crime</label>
          <div class="col-sm-4">
          <select name="category" id="category" class="form-control" onChange="getCat(this.value);" required="">
          <option value="">Select Category</option>
          <?php $sql=mysqli_query($con,"select id,categoryName from category ");
          while ($rw=mysqli_fetch_array($sql)) {
            ?>
            <option value="<?php echo htmlentities($rw['id']);?>"><?php echo htmlentities($rw['categoryName']);?></option>
          <?php
          }
          ?>
          </select>
          </div>
          <label class="col-sm-2 col-sm-2 control-label">Sub Category </label>
          <div class="col-sm-4">
          <select name="subcategory" id="subcategory" class="form-control" >
          <option value="">Select Subcategory</option>
          </select>
          </div>
          </div>

          <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">State</label>
          <div class="col-sm-4">
          <select onchange="toggleLGA(this);"name="states" id="states" class="form-control">
            <option value="" selected="selected">- Select -</option>
            <option value="Abia">Abia</option>
            <option value="Adamawa">Adamawa</option>
            <option value="AkwaIbom">AkwaIbom</option>
            <option value="Anambra">Anambra</option>
            <option value="Bauchi">Bauchi</option>
            <option value="Bayelsa">Bayelsa</option>
            <option value="Benue">Benue</option>
            <option value="Borno">Borno</option>
            <option value="Cross River">Cross River</option>
            <option value="Delta">Delta</option>
            <option value="Ebonyi">Ebonyi</option>
            <option value="Edo">Edo</option>
            <option value="Ekiti">Ekiti</option>
            <option value="Enugu">Enugu</option>
            <option value="FCT">FCT</option>
            <option value="Gombe">Gombe</option>
            <option value="Imo">Imo</option>
            <option value="Jigawa">Jigawa</option>
            <option value="Kaduna">Kaduna</option>
            <option value="Kano">Kano</option>
            <option value="Katsina">Katsina</option>
            <option value="Kebbi">Kebbi</option>
            <option value="Kogi">Kogi</option>
            <option value="Kwara">Kwara</option>
            <option value="Lagos">Lagos</option>
            <option value="Nasarawa">Nasarawa</option>
            <option value="Niger">Niger</option>
            <option value="Ogun">Ogun</option>
            <option value="Ondo">Ondo</option>
            <option value="Osun">Osun</option>
            <option value="Oyo">Oyo</option>
            <option value="Plateau">Plateau</option>
            <option value="Rivers">Rivers</option>
            <option value="Sokoto">Sokoto</option>
            <option value="Taraba">Taraba</option>
            <option value="Yobe">Yobe</option>
            <option value="Zamfara">Zamafara</option>
          </select>
          </div>

          <label class="col-sm-2 col-sm-2 control-label">Security Agency</label>
          <div class="col-sm-4">
          <select name="security" required="required" class="form-control">
          <option value="">Select Security Agency</option>
          <?php $sql=mysqli_query($con,"select securityName from security ");
          while ($rw=mysqli_fetch_array($sql)) {
            ?>
            <option value="<?php echo htmlentities($rw['securityName']);?>"><?php echo htmlentities($rw['securityName']);?></option>
          <?php
          }
          ?>

          </select>
          </div>
          </div>

          <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">LGA</label>
          <div class="col-sm-4">
          <select name="lga" id="lga" class="form-control select-lga" required></select>
          </div>

          <label class="col-sm-2 col-sm-2 control-label">Crime Location</label>
          <div class="col-sm-4">
          <input type="text" name="crimelocation" placeholder="Crime Location" class="form-control" require>
          </div>
          </div>
          <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Accused Name</label>
          <div class="col-sm-4">
          <input type="text" name="accusedname" placeholder="Enter Accused Name" class="form-control"  required>
          </div>

          <label class="col-sm-2 col-sm-2 control-label">Area Command</label>
          <div class="col-sm-4">
          <input type="text" name="areacommand" placeholder="Enter Area Command" class="form-control">
          </div>
  
          </div>
          <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Crime Details (max 2000 words) </label>
          <div class="col-sm-6">
          <textarea  name="crimedetails" required="required" cols="10" rows="10" class="form-control" maxlength="2000"></textarea>
          </div>
          </div>
          <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Crime Related Doc(if any) </label>
          <div class="col-sm-6">
          <input type="file" name="compfile" class="form-control" value="">
          </div>
          </div>
            <div class="form-group">
              <div class="col-sm-10" style="padding-left:25% ">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
          </div>
          </div>
          </div>        	
          </section>
            </section>
            </section>

        <?php include("includes/footer.php");?>

          <!-- js placed at the end of the document so the pages load faster -->
          <script src="assets/js/jquery.js"></script>
          <script src="assets/js/bootstrap.min.js"></script>
          <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
          <script src="assets/js/jquery.scrollTo.min.js"></script>
          <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	<script src="assets/js/form-component.js"></script>    
  <script src="scripts/js/lga.min.js"></script>
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>
