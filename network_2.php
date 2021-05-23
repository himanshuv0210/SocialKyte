<?php 
include_once("header.php"); 
require_once ("connect.php");

$sql_services = mysqli_query($db, "SELECT * FROM user order by id");
?>

<section class="users_list mt-5">
	<div class="conatiner">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<center><i class="fas fa-user-circle mb-3" style="font-size: 100px;"></i></center>
				<div class="search-box">
				<form class="form-inline my-2 my-lg-0">
	      			<input class="form-control mr-sm-2" type="text" placeholder="Search..." style="width: 90%; border-radius: 50px;">
	      			<button class="btn btn-secondary my-2 my-sm-0" type="submit"><i class="fas fa-sliders-h"></i></button>
	      			<div class="result-display" style="cursor: pointer;"></div>
	    		</form>
	    		</div>
			</div>
		<div class="col-lg-2"></div>	
		</div>
			
	</div>
	
</section>


<?php include_once("footer.php"); ?>