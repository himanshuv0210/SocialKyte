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
				<form class="form-inline my-2 my-lg-0">
	      			<input class="form-control mr-sm-2" type="text" placeholder="Search" style="width: 90%; border-radius: 50px;">
	      			<button class="btn btn-secondary my-2 my-sm-0" type="submit"><i class="fas fa-sliders-h"></i></button>
	    		</form>
	    		<center>
	    		<table class="table table-responsive mt-2 table_view">
				  <tbody>
				  	<?php
			            while ($serve = mysqli_fetch_array($sql_services)) 
			            {
			                $sid = $serve['id'];
			                $serve_name = $serve['u_name'];
			            ?>
				    <tr>
				      <th scope="row"><i class="fas fa-user-circle mb-3" style="font-size: 50px;"></i></th>
				      <td><?=$serve_name; ?></td>
				      <td><i class="fas fa-square-full"></i> &nbsp; <i class="fas fa-square-full"></i>&nbsp;<i class="fas fa-square-full"></i></td>
				      <td><button type="button" class="btn btn-outline-secondary">pricesheet</button></td>
				    </tr>
				    <?php
			            }
			          ?>
				  </tbody>
				</table>
				</center>
			</div>
		<div class="col-lg-2"></div>	
		</div>
			
	</div>
	
</section>


<?php include_once("footer.php"); ?>